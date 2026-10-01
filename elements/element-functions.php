<?php 

/**
 * Swipper Lib
*/
if(!function_exists('gurus_elements_scripts')){
    add_action( 'wp_enqueue_scripts', 'gurus_elements_scripts');
    function gurus_elements_scripts() {  
        $theme = wp_get_theme( get_template() );
        wp_register_script( 'gsap', get_template_directory_uri() . '/assets/js/libs/gsap.min.js', array( 'jquery' ), '3.12.5', true );
        wp_register_script( 'pxl-scroll-trigger', get_template_directory_uri() . '/assets/js/libs/scroll-trigger.js', array( 'jquery' ), '3.12.5', true );
        wp_register_script( 'pxl-splitText', get_template_directory_uri() . '/assets/js/libs/split-text.js', array( 'jquery' ), '3.12.5', true );
        wp_register_script( 'pxl-bundled-lenis', get_template_directory_uri() . '/assets/js/libs/bundled-lenis.min.js', array( 'jquery' ), '1.0.0', true );
        wp_register_script( 'pxl-nice-scroll', get_template_directory_uri() . '/assets/js/libs/nice-scroll.min.js', array( 'jquery' ), '3.7.6', true );
        
        wp_register_script('gurus-particle', get_template_directory_uri() . '/elements/widgets/js/particle.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-parallax', get_template_directory_uri() . '/elements/widgets/js/parallax.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-post-grid', get_template_directory_uri() . '/elements/widgets/js/grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
        wp_localize_script('pxl-post-grid', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_register_script('pxl-swiper', get_template_directory_uri() . '/elements/widgets/js/carousel.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        // Ceatran
        
        wp_register_script('pxl-slider', get_template_directory_uri() . '/elements/widgets/js/slider.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-slick', get_template_directory_uri() . '/elements/widgets/js/slick.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-counter', get_template_directory_uri() . '/elements/widgets/js/counter.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-accordion', get_template_directory_uri() . '/elements/widgets/js/accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-tabs', get_template_directory_uri() . '/elements/widgets/js/tabs.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-progressbar', get_template_directory_uri() . '/elements/widgets/js/progressbar.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-countdown', get_template_directory_uri() . '/elements/widgets/js/countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-pie-chart', get_template_directory_uri() . '/assets/js/libs/pie-chart.min.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('gurus-pie-chart', get_template_directory_uri() . '/elements/widgets/js/pie-chart.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        
        wp_enqueue_script('gurus-elementor', get_template_directory_uri() . '/elements/widgets/js/elementor.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    }
}

/**
 * Extra Elementor Icons
*/
if(!function_exists('gurus_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'gurus_register_custom_icon_library');
    function gurus_register_custom_icon_library($tabs){
        $custom_tabs = [
            'pxl_icon1' => [
                'name' => 'flaticon',
                'label' => esc_html__( 'Gurus', 'gurus' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon-nanotechnology',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.js',
                'native' => true,
            ],

        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}
 
/**
 * Get class widget path
*/
if(!function_exists('gurus_get_class_widget_path')){
    function gurus_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'].'/elementor-widget/';
        if(!is_dir($cls_path)) {
            wp_mkdir_p( $cls_path );
        }
        return $cls_path;
    }
}

/**
 * Get post type options
*/
function gurus_get_post_type_options($pt_supports=[]){
    $post_types = get_post_types([
        'public'   => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'header',
        'footer',
        'mega-menu',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;

        if(!empty($pt_supports) && in_array($post_type->name, $pt_supports)){
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        }else{
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }

    if(!empty($pt_supports))
        return $result_some;
    else   
        return $result_any;
}


/**
 * Start Post Grid Functions
*/
function gurus_get_post_grid_layout($pt_supports = []){
    $post_types  = gurus_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'gurus' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => gurus_get_grid_layout_options($name),
            'prefix_class' => 'pxl-post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;   
}

function gurus_get_grid_layout_options($post_type_name){
    $option_layouts = [];
    switch ($post_type_name) {
        case 'post':  
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/post-layout1.jpg'
                ],
            ];
            break;

        case 'portfolio':
            $option_layouts = [
                'portfolio-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/portfolio-layout1.jpg'
                ],
            ];
            break;

        case 'service':  
            $option_layouts = [
                'service-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout1.jpg'
                ],
                'service-2' => [
                    'label' => esc_html__( 'Layout 2', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout2.jpg'
                ],
                'service-3' => [
                    'label' => esc_html__( 'Layout 3', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout3.jpg'
                ],
                'service-4' => [
                    'label' => esc_html__( 'Layout 4', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout4.jpg'
                ],
                'service-5' => [
                    'label' => esc_html__( 'Layout 5', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout5.jpg'
                ],
                'service-6' => [
                    'label' => esc_html__( 'Layout 6', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout6.jpg'
                ],
                'service-9' => [
                    'label' => esc_html__( 'Layout 9', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout9.jpg'
                ],
            ];
            break;

    }
    return $option_layouts;
}

function gurus_get_grid_term_by_post_type($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]); 
    $post_types  = gurus_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
         
        $taxonomy = get_object_taxonomies($name, 'names');
        
        if($name == 'post') $taxonomy = ['category'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'gurus' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function gurus_get_grid_ids_by_post_type($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = gurus_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = gurus_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'gurus'), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

/**
 * End Post Grid Functions
*/


/**
 * Start Post Carousel Functions
*/
function gurus_get_post_carousel_layout($pt_supports = []){
    $post_types  = gurus_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'gurus' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => gurus_get_carousel_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;   
}

function gurus_get_carousel_layout_options($post_type_name){
    $option_layouts = [];
    switch ($post_type_name) {
        case 'portfolio':
            $option_layouts = [
                'portfolio-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/portfolio-layout1.jpg'
                ],
                'portfolio-2' => [
                    'label' => esc_html__( 'Layout 2', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/portfolio-layout2.jpg'
                ],
                'portfolio-3' => [
                    'label' => esc_html__( 'Layout 2', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/portfolio-layout3.jpg'
                ],
            ];
            break;
        case 'service':
            $option_layouts = [
                'service-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout1.jpg'
                ],
                'service-2' => [
                    'label' => esc_html__( 'Layout 2', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout2.jpg'
                ],
                'service-3' => [
                    'label' => esc_html__( 'Layout 3', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout3.jpg'
                ],
                'service-4' => [
                    'label' => esc_html__( 'Layout 4', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout4.jpg'
                ],
                'service-5' => [
                    'label' => esc_html__( 'Layout 5', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout5.jpg'
                ],
                'service-7' => [
                    'label' => esc_html__( 'Layout 7', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout7.jpg'
                ],
                'service-8' => [
                    'label' => esc_html__( 'Layout 8', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout8.jpg'
                ],
            ];
            break;
        case 'post':  
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/post-layout1.jpg'
                ],
                'post-2' => [
                    'label' => esc_html__( 'Layout 2', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/post-layout2.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}



/**
 * Start Post Accordion Functions
*/
function gurus_get_post_accordion_layout($pt_supports = []){
    $post_types  = gurus_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'gurus' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'portfolio-1',
            'options'  => gurus_get_accordion_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;   
}

function gurus_get_accordion_layout_options($post_type_name){
    $option_layouts = [];
    switch ($post_type_name) {
        case 'portfolio':
            $option_layouts = [
                'portfolio-1' => [
                    'label' => esc_html__( 'Layout 1', 'gurus' ),
                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_accordion/portfolio-layout1.jpg'
                ],
            ];
            break;
    }
    return $option_layouts;
}

function gurus_get_carousel_term_by_post_type($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types  = gurus_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
         
        $taxonomy = get_object_taxonomies($name, 'names');
        
        if($name == 'post') $taxonomy = ['category'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'gurus' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}
/**
 * End Post Carousel Functions
*/

/**
 * Animation List
*/

function gurus_widget_animate() {
    $gurus_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'bounce-top wow' => 'bounceTop',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipCase' => 'flipCase',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomInSmall' => 'zoomInSmall',
        'wow zoomIn' => 'zoomInBig',
        'wow zoomOut' => 'zoomOut',
        'wow skewIn' => 'skewInLeft',
        'wow skewInRight' => 'skewInRight',
        'wow skewInBottom' => 'skewInBottom',
        'wow skewInTop' => 'skewInTop',
        'wow RotatingY' => 'RotatingY',
        'wow PXLfadeInUp' => 'PXLfadeInUp',
        'fadeInPopup' => 'fadeInPopup',
        'wow pxl-expanding-line-effect' => 'Expanding Line Effect',  
    );
    return $gurus_animate;
}

function gurus_widget_animate_v2() {
    $gurus_animate_v2 = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipCase' => 'flipCase',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomInSmall' => 'zoomInSmall',
        'wow zoomIn' => 'zoomInBig',
        'wow zoomOut' => 'zoomOut',
        'wow skewIn' => 'skewInLeft',
        'wow skewInRight' => 'skewInRight',
        'wow skewInBottom' => 'skewInBottom',
        'wow skewInTop' => 'skewInTop',
        'wow RotatingY' => 'RotatingY',
        'wow PXLfadeInUp' => 'PXLfadeInUp',
        'wow TextOutlineAnimation' => 'Text Outline Animation',
        'pxl-split-text split-in-fade' => 'Slip Text In Fade',
        'pxl-split-text split-in-right' => 'Slip Text In Right',
        'pxl-split-text split-in-left'  => 'Slip Text In Left',
        'pxl-split-text split-in-up'    => 'Slip Text In Up',
        'pxl-split-text split-in-down'  => 'Slip Text In Down',
        'pxl-split-text split-in-rotate'  => 'Slip Text In Rotate',
        'pxl-split-text split-in-scale'  => 'Slip Text In Scale',
        'wow shewDeviderBottom' => 'shewDeviderBottom',
    );
    return $gurus_animate_v2;
}

/**
 * Pagram Animation
*/
if(!function_exists('gurus_widget_animation_settings')){
    function gurus_widget_animation_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => []
        ]);
        return array(
            'name'      => 'section_animation',
            'label'     => esc_html__('Animation', 'gurus'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name' => 'pxl_animate',
                        'label' => esc_html__('Bravis Animate', 'gurus' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => gurus_widget_animate(),
                        'default' => '',
                    ),
                    array(
                        'name' => 'pxl_animate_delay',
                        'label' => esc_html__('Animate Delay', 'gurus' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '0',
                        'description' => 'Enter number. Default 0ms',
                    ),
                )
            )
        );
    }
}

if(!function_exists('gurus_widget_color_type')){
    function gurus_widget_color_type($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name' => $args['prefix'] .'_color_type',
                'label' => esc_html__('Color Type', 'gurus' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => 'Normal',
                    'gradient' => 'Gradient',
                ],
                'default' => 'normal',
            ),

            array(
                'name' => $args['prefix'] .'_normal_color',
                'label' => esc_html__('Normal Color', 'gurus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => 'color: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'].'_color_type' => ['normal'],
                ],
            ),

            array(
                'name'        => $args['prefix'].'_gradient_color',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'gurus' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition' => [
                    $args['prefix'].'_color_type' => ['gradient'],
                ],
            ),
            array(
                'name'        => $args['prefix'].'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'gurus' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'].'_gradient_color_from',
                'label' => esc_html__('From', 'gurus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'].'_gradient_color_to',
                'label' => esc_html__('To', 'gurus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name'        => $args['prefix'].'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'gurus' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}

/*
    Render link to elementor option
*/
if(!function_exists('gurus_render_link_attributes')){
    function gurus_render_link_attributes($link) {
        $ouput = '';
        if (!empty($link['url'])) {
            $ouput = 'href="' . esc_url($link['url']) . '"';
            if ($link['is_external']) {
                $ouput .= ' target="_blank"';
            }
            if ($link['nofollow']) {
                $ouput .= ' rel="nofollow"';
            }
            if (!empty($link['custom_attributes'])) {
                $custom_attributes = explode(',', $link["custom_attributes"]);
                foreach ($custom_attributes as $attr) {
                    list($key, $value) = explode('|', $attr);
                    $ouput .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
                }
            }
        }
        return $ouput;
    }
}

// Get Icon Service
function gurus_get_service_icon($post_id) {
    global $wp_filesystem;
    if(!isset($post_id) || empty($post_id)) return;
    $icon_content = '';
    $icon_type = get_post_meta($post_id, 'service_icon_type', true);
    $icon_normal = get_post_meta($post_id, 'service_icon_font', '');
    $icon_img = get_post_meta($post_id, 'service_icon_img', true); 

    if (!empty($icon_normal) && $icon_type === 'icon') {
        $icon_normal = implode(' ', $icon_normal);
        $icon_content = '<i class="' . $icon_normal . '"></i>';
        return $icon_content;
    }

    if (!empty($icon_img) && $icon_type === 'image') {
        if((pathinfo($icon_img['url'], PATHINFO_EXTENSION) === 'svg')) {
            $icon_urls = explode('uploads', $icon_img['url']);
            $upload_dir = wp_upload_dir();
            $icon_path = $upload_dir['basedir']. $icon_urls[1] ;
            $icon_content = $wp_filesystem->get_contents( $icon_path );
        }else {
            $get_img = pxl_get_image_by_size( array(
                'attach_id'  => $icon_img['id'] ?? '',
                'thumb_size' => 'full',
                'class' => 'no-layzyload',
            ));
            $icon_content = $get_img['thumbnail'];
        }
    }
    return $icon_content;
}