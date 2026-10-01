<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

class Gurus_CSS_Generator {
	/**
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	function __construct() {
		$this->opt_name = gurus()->get_option_name();  
		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = (defined('THEME_DEV_MODE_SCSS') && THEME_DEV_MODE_SCSS);  
 
		add_filter( 'pxl_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'gurus_enqueue' ), 20 );
	}

	function init() {

		if ( ! class_exists( 'scssc' ) ) {
			return;
		}

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'gurus_generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->gurus_generate_file_options();
		} );
	}

	function gurus_generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
            $this->gurus_generate_file_options();
			$this->gurus_generate_file();
		}
	}

    function gurus_generate_file_options() {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );
        $_options = $scss_dir . '_options.scss';
        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->gurus_options_output() )
        ) );
    }

	function gurus_generate_file() {
		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';
        $css_iframe_dir  = get_template_directory() . '/assets/css/iframe/';

		$this->scssc = new scssc();
		$this->scssc->setImportPaths( $scss_dir );

		$css_file = $css_dir . 'style.css';

		$this->scssc->setFormatter( 'scss_formatter' );
		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "style.scss"' ) )
		) );
	}

	protected function print_scss_opt_colors($variable,$param){
        if(is_array($variable)){
            $k = [];
            $v = [];
            foreach ($variable as $key => $value) {
                $k[] = str_replace('-', '_', $key);
                $v[] = 'var(--'.str_replace(['#',' '], [''],$key).'-color)';
            }
            if($param === 'key'){
                return implode(',', $k);
            }else{
                return implode(',', $v);
            }
            
        } else {
            return $variable;
        }
    }

	protected function gurus_options_output() {
		$theme_colors                    = gurus_configs('theme_colors');
        $links                           = gurus_configs('link');
        $gradients                       = gurus_configs('gradient');
		ob_start();

		printf('$gurus_theme_colors_key:(%s);',$this->print_scss_opt_colors($theme_colors,'key'));
        printf('$gurus_theme_colors_val:(%s);',$this->print_scss_opt_colors($theme_colors,'val'));
        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }

        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }
         
        // link color
        foreach ($links as $key => $value) {
            printf('$link_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--link-'.$key.')');
        }

        // gradient color
        foreach ($gradients as $key => $value) {
            printf('$gradient_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--gradient-'.$key.')');
        }

        /* Font */
        $theme_default = gurus()->get_theme_opt('theme_default');
        if(isset($theme_default['font-family'])) {
            if($theme_default['font-family'] == false) {
                echo '
                    $ft_theme_default: "DM Sans";
                ';
            } else {
                echo '
                    $ft_theme_google: '.$theme_default["font-family"].';
                ';
            }
        }
  
		return ob_get_clean();
	}


        /* Inline CSS */
    function gurus_enqueue() {
        $css = $this->render_css_custom();
        if ( !empty( $css ) ) {
            wp_add_inline_style( 'pxl-style', $css );
        }
    }
    function render_css_custom() {
        $header_layout = gurus()->get_opt('header_layout');
        $post_header = get_post($header_layout);
        $header_type = get_post_meta($post_header->ID, 'header_type', true);
        $header_sidebar_w = get_post_meta($post_header->ID, 'header_sidebar_width', true) ?? 0; 
        
        ob_start();
        if ($header_type === 'pxl-header-sidebar--left') {
            printf(
                '#pxl-wrapper #pxl-footer-elementor, #pxl-wrapper #pxl-main, #pxl-wrapper #pxl-page-title-elementor, #pxl-wrapper #pxl-main { padding-left: %spx; }',
                esc_attr($header_sidebar_w)
            );
            
            printf(
                '#pxl-wrapper #pxl-header-elementor { width: %spx; max-width: %spx; }',
                esc_attr($header_sidebar_w),
                esc_attr($header_sidebar_w)
            );
        }
    
        return ob_get_clean();
    }
    



}

new Gurus_CSS_Generator();