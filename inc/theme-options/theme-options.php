<?php
add_action('after_setup_theme', 'theme_options_setup', 1);
function theme_options_setup() { 
    if (!class_exists('ReduxFramework')) {
        return;
    }
    $opt_name = gurus()->get_option_name();
    $version = gurus()->get_version();
    
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => '', //$theme->get('Name'),
        // Name that appears at the top of your panel
        'display_version'      => $version,
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__('Theme Options', 'gurus'),
        'page_title'           => esc_html__('Theme Options', 'gurus'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        'show_options_object' => false,
        // OPTIONAL -> Give you extra features
        'page_priority'        => 80,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'pxlart', //class_exists('Gurus_Admin_Page') ? 'case' : '',
        // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'pxlart-theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
    
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        ),
    );
    
    Redux::SetArgs($opt_name, $args);
    
    /*--------------------------------------------------------------
    # General
    --------------------------------------------------------------*/
    
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('General', 'gurus'),
        'icon'   => 'el-icon-home',
        'fields' => array(
            
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Colors', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields' => array(
            array(
                'id'          => 'primary_color',
                'type'        => 'color',
                'title'       => esc_html__('Primary Color', 'gurus'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'secondary_color',
                'type'        => 'color',
                'title'       => esc_html__('Secondary Color', 'gurus'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'third_color',
                'type'        => 'color',
                'title'       => esc_html__('Third Color', 'gurus'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'          => 'dark_color',
                'type'        => 'color',
                'title'       => esc_html__('Dark Color', 'gurus'),
                'transparent' => false,
                'default'     => ''
            ),
            array(
                'id'      => 'link_color',
                'type'    => 'link_color',
                'title'   => esc_html__('Link Colors', 'gurus'),
                'default' => array(
                    'regular' => '',
                    'hover'   => '',
                    'active'  => ''
                ),
                'output'  => array('a')
            ),
            array(
                'id'          => 'gradient_color',
                'type'        => 'color_gradient',
                'title'       => esc_html__('Gradient Color', 'gurus'),
                'transparent' => false,
                'default'  => array(
                    'from' => '',
                    'to'   => '', 
                ),
            ),
            array(
                'id'      => 'body_text_color',
                'type'    => 'color',
                'title'   => esc_html__('Body Color', 'gurus'),
                'default'     => '',
                'output'  => array('body'),
                'transparent' => false,
                'required' => array( 0 => 'pxl_body_typography', 1 => '!=', 2 => 'google-font' ),
            ),
            array(
                'id'      => 'heading_text_color',
                'type'    => 'color',
                'title'   => esc_html__('Heading Color', 'gurus'),
                'default'     => '',
                'output'  => array('h1,h2,h3,h4,h5,h6'),
                'transparent' => false,
                'required' => array( 0 => 'pxl_heading_typography', 1 => '!=', 2 => 'google-font' ),
            ),
    
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Favicon', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'title'    => esc_html__('Favicon', 'gurus'),
                'default'  => '',
                'url'      => false
            ),
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Mouse', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mouse_move_animation',
                'type'     => 'switch',
                'title'    => esc_html__('Mouse Move Animation', 'gurus'),
                'default'  => false
            ),
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Loader', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'site_loader',
                'type'     => 'switch',
                'title'    => esc_html__('Loader', 'gurus'),
                'default'  => false
            ),
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Cookie Policy', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'cookie_policy',
                'type'     => 'button_set',
                'title'    => esc_html__('Cookie Policy', 'gurus'),
                'options'  => array(
                    'show' => esc_html__('Show', 'gurus'),
                    'hide' => esc_html__('Hide', 'gurus'),
                ),
                'default'  => 'hide',
            ),
            array(
                'id'      => 'cookie_policy_description',
                'type'    => 'text',
                'title'   => esc_html__('Description', 'gurus'),
                'default' => '',
                'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'          => 'cookie_policy_description_typo',
                'type'        => 'typography',
                'title'       => esc_html__('Description Font', 'gurus'),
                'google'      => true,
                'font-backup' => false,
                'all_styles'  => true,
                'line-height'  => true,
                'font-size'  => true,
                'text-align'  => false,
                'color'  => false,
                'output'      => array('.pxl-cookie-policy .pxl-item--description'),
                'units'       => 'px',
                'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'      => 'cookie_policy_btntext',
                'type'    => 'text',
                'title'   => esc_html__('Button Text', 'gurus'),
                'default' => '',
                'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'    => 'cookie_policy_link',
                'type'  => 'select',
                'title' => esc_html__( 'Button Link', 'gurus' ), 
                'data'  => 'page',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
            ),
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Subscribe', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'subscribe',
                'type'     => 'button_set',
                'title'    => esc_html__('Subscribe', 'gurus'),
                'options'  => array(
                    'show' => esc_html__('Show', 'gurus'),
                    'hide' => esc_html__('Hide', 'gurus'),
                ),
                'default'  => 'hide',
            ),
            array(
                'id'      => 'subscribe_layout',
                'type'    => 'select',
                'title'   => esc_html__('Layout', 'gurus'),
                'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','gurus'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
                'options' => gurus_get_templates_option('popup'),
                'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'    => 'popup_effect',
                'type'  => 'select',
                'title' => esc_html__('Popup Effect', 'gurus'),
                'options' => [
                    'fade'           => esc_html__('Fade', 'gurus'),
                    'fade-slide'           => esc_html__('Fade Slide', 'gurus'),
                    'zoom'           => esc_html__('Zoom', 'gurus'),
                ],
                'default' => 'fade',
                'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
            ),
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Smooth Scroll', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'smooth_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Smooth Scroll', 'gurus'),
                'options'  => array(
                    'on' => esc_html__('On', 'gurus'),
                    'off' => esc_html__('Off', 'gurus'),
                ),
                'default'  => 'off',
            ),
        )
    ));
    
    
    /*--------------------------------------------------------------
    # Header
    --------------------------------------------------------------*/
    
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Header', 'gurus'),
        'icon'   => 'el el-indent-left',
        'fields' => array_merge(
            gurus_header_opts(),
            array(
                array(
                    'id'       => 'sticky_scroll',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Sticky Scroll', 'gurus'),
                    'options'  => array(
                        'pxl-sticky-stt' => esc_html__('Scroll To Top', 'gurus'),
                        'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'gurus'),
                    ),
                    'default'  => 'pxl-sticky-stb',
                ),
            )
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Mobile', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array_merge(
            gurus_header_mobile_opts(),
            array(
                array(
                    'id'       => 'mobile_display',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Display', 'gurus'),
                    'options'  => array(
                        'show'  => esc_html__('Show', 'gurus'),
                        'hide'  => esc_html__('Hide', 'gurus'),
                    ),
                    'default'  => 'show'
                ),
                array(
                    'id'       => 'opt_mobile_style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Style', 'gurus'),
                    'options'  => array(
                        'light'  => esc_html__('Light', 'gurus'),
                        'dark'  => esc_html__('Dark', 'gurus'),
                    ),
                    'default'  => 'light',
                    'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
                ),
                array(
                    'id'       => 'sticky_header_m',
                    'type'     => 'switch',
                    'title'    => esc_html__('Sticky', 'gurus'),
                    'default'  => 'false',
                    'description' => 'Only applies to default mobile header.',
                ),
                array(
                    'id'       => 'logo_m',
                    'type'     => 'media',
                    'title'    => esc_html__('Logo Dark in Menu Sidebar', 'gurus'),
                     'default' => array(
                        'url'=>get_template_directory_uri().'/assets/img/logo.png'
                    ),
                    'url'      => false,
                    'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
                ),
                array(
                    'id'       => 'logo_light_m',
                    'type'     => 'media',
                    'title'    => esc_html__('Logo Light in Menu Sidebar', 'gurus'),
                    'default' => array(
                        'url'=>get_template_directory_uri().'/assets/img/logo-light.png'
                    ),
                    'url'      => false,
                    'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
                ),
                array(
                    'id'       => 'logo_height',
                    'type'     => 'dimensions',
                    'title'    => esc_html__('Logo Height', 'gurus'),
                    'width'    => false,
                    'unit'     => 'px',
                    'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
                    'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
                ),
                array(
                    'id'       => 'search_mobile',
                    'type'     => 'switch',
                    'title'    => esc_html__('Search Form', 'gurus'),
                    'default'  => true,
                    'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
                ),
                array(
                    'id'      => 'search_placeholder_mobile',
                    'type'    => 'text',
                    'title'   => esc_html__('Search Text Placeholder', 'gurus'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: Search...', 'gurus'),
                    'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
                )
            )
        )
    ));
    
    /*--------------------------------------------------------------
    # Page Title area
    --------------------------------------------------------------*/
    
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Page Title', 'gurus'),
        'icon'   => 'el-icon-map-marker',
        'fields' => array_merge(
            gurus_page_title_opts(),
            array(
                array(
                    'id'       => 'ptitle_scroll_opacity',
                    'title'    => esc_html__('Scroll Opacity', 'gurus'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
            )
        )
    ));
    
    
    /*--------------------------------------------------------------
    # Footer
    --------------------------------------------------------------*/
    
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Footer', 'gurus'),
        'icon'   => 'el el-website',
        'fields' => array_merge(
            gurus_footer_opts(),
            array(
                array(
                    'id'       => 'back_totop_on',
                    'type'     => 'switch',
                    'title'    => esc_html__('Button Back to Top', 'gurus'),
                    'default'  => false,
                ),
                array(
                    'id'       => 'footer_fixed',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Footer Fixed', 'gurus'),
                    'options'  => array(
                        'on' => esc_html__('On', 'gurus'),
                        'off' => esc_html__('Off', 'gurus'),
                    ),
                    'default'  => 'off',
                ),
            ) 
        )
        
    ));
    
    /*--------------------------------------------------------------
    # WordPress default content
    --------------------------------------------------------------*/
    
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog', 'gurus'),
        'icon'  => 'el-icon-pencil',
        'fields'     => array(
        )
    ));
    
    
    
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog Archive', 'gurus'),
        'icon'  => 'el-icon-pencil',
        'subsection' => true,
        'fields'     => array_merge(
            gurus_sidebar_pos_opts([ 'prefix' => 'blog_']),
            array(
                array(
                    'id'       => 'archive_date',
                    'title'    => esc_html__('Date', 'gurus'),
                    'subtitle' => esc_html__('Display the Date for each blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true,
                ),
                array(
                    'id'       => 'post_comment',
                    'title'    => esc_html__('Comment', 'gurus'),
                    'subtitle' => esc_html__('Display the Comment for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'      => 'featured_img_size',
                    'type'    => 'text',
                    'title'   => esc_html__('Featured Image Size', 'gurus'),
                    'default' => '',
                    'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                ),
                array(
                    'id'      => 'archive_excerpt_length',
                    'type'    => 'text',
                    'title'   => esc_html__('Excerpt Length', 'gurus'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: 16', 'gurus'),
                ),
                array(
                    'id'      => 'archive_readmore_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Read More Text', 'gurus'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: Read more', 'gurus'),
                ),
            )
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Post', 'gurus'),
        'icon'       => 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array_merge(
            gurus_sidebar_pos_opts([ 'prefix' => 'post_']),
            array(
                array(
                    'id'       => 'sg_post_title',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Page Title Type', 'gurus'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'gurus'),
                        'custom_text' => esc_html__('Custom Text', 'gurus'),
                    ),
                    'default'  => 'default',
                ),
                array(
                    'id'      => 'sg_post_title_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Page Title Text', 'gurus'),
                    'default' => 'Blog Details',
                    'required' => array( 0 => 'sg_post_title', 1 => 'equals', 2 => 'custom_text' ),
                ),
    
                array(
                    'id'       => 'post_date',
                    'title'    => esc_html__('Date', 'gurus'),
                    'subtitle' => esc_html__('Display the Date for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_author',
                    'title'    => esc_html__('Author', 'gurus'),
                    'subtitle' => esc_html__('Display the Author for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_tag',
                    'title'    => esc_html__('Tags', 'gurus'),
                    'subtitle' => esc_html__('Display the Tag for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'post_navigation',
                    'title'    => esc_html__('Navigation', 'gurus'),
                    'subtitle' => esc_html__('Display the Navigation for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
                array(
                    'id'       => 'post_author_info',
                    'title'    => esc_html__('Author Info', 'gurus'),
                    'subtitle' => esc_html__('Display the Author info for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
                array(
                    'title' => esc_html__('Social', 'gurus'),
                    'type'  => 'section',
                    'id' => 'social_section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'post_social_share',
                    'title'    => esc_html__('Social', 'gurus'),
                    'subtitle' => esc_html__('Display the Social Share for blog post.', 'gurus'),
                    'type'     => 'switch',
                    'default'  => false,
                ),
                array(
                    'id'       => 'social_facebook',
                    'title'    => esc_html__('Facebook', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_twitter',
                    'title'    => esc_html__('Twitter', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_pinterest',
                    'title'    => esc_html__('Pinterest', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'social_linkedin',
                    'title'    => esc_html__('LinkedIn', 'gurus'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
                ),
            )
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Search Results', 'gurus'),
        'icon'  => 'eicon-search-results',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'page_title_search_result',
                'type'    => 'text',
                'title'   => esc_html__('Page Title', 'gurus'),
                'default' => '',
                'subtitle' => esc_html__('Default: Search Results', 'gurus'),
            ),
        )
    ));
    
    /*--------------------------------------------------------------
    # 404 Page
    --------------------------------------------------------------*/
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('404 Error Page', 'gurus'),
        'icon'       => 'eicon-error-404',
        'fields'     => array(
            array(
                'id'       => 'bg_img_404_page',
                'type'     => 'media',
                'title'    => esc_html__('Background Image', 'gurus'),
                'default' => array(
                    'url'=>  get_template_directory_uri().'/assets/img/bg-404-error-page.jpg'
                ),
                'url'      => false
            ),
            array(
                'id'      => '404_subtitle',
                'type'    => 'text',
                'title'   => esc_html__('Subtitle Page', 'gurus'),
                'default' => '',
                'placeholder' => esc_html__('Ex: Page Not Found...', 'gurus'),
            ),
            array(
                'id'      => '404_message',
                'type'    => 'text',
                'title'   => esc_html__('Message', 'gurus'),
                'default' => '',
            ),
            array(
                'id'      => '404_button_text',
                'type'    => 'text',
                'title'   => esc_html__('Button text', 'gurus'),
                'placeholder' => esc_html__('Ex: Go to home', 'gurus'),
                'default' => '',
            ),
            array(
                'id'       => '404_show_search_form',
                'title'    => esc_html__('Show Search Form', 'gurus'),
                'subtitle' => esc_html__('Display Search Form in 404 Page.', 'gurus'),
                'type'     => 'switch',
                'default'  => true
            ),
        )
    ));
    /*--------------------------------------------------------------
    # Shop
    --------------------------------------------------------------*/
    if(class_exists('Woocommerce')) {
        Redux::setSection($opt_name, array(
            'title'  => esc_html__('Shop', 'gurus'),
            'icon'   => 'el el-shopping-cart',
            'fields'     => array_merge(
                gurus_page_title_opts_product()
            )
        ));
    
    
        Redux::setSection($opt_name, array(
            'title' => esc_html__('Product Archive', 'gurus'),
            'icon'  => 'el-icon-pencil',
            'subsection' => true,
            'fields'     => array_merge(
                gurus_sidebar_pos_opts([ 'prefix' => 'shop_']),
                array(
                    array(
                        'id'      => 'shop_featured_img_size',
                        'type'    => 'text',
                        'title'   => esc_html__('Featured Image Size', 'gurus'),
                        'default' => '',
                        'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                    ),
                    array(
                        'title'         => esc_html__('Products displayed per row', 'gurus'),
                        'id'            => 'products_columns',
                        'type'          => 'slider',
                        'subtitle'      => esc_html__('Number product to show per row', 'gurus'),
                        'default'       => 3,
                        'min'           => 2,
                        'step'          => 1,
                        'max'           => 5,
                        'display_value' => 'text',
                    ),
                    array(
                        'title'         => esc_html__('Products displayed per page', 'gurus'),
                        'id'            => 'product_per_page',
                        'type'          => 'slider',
                        'subtitle'      => esc_html__('Number product to show', 'gurus'),
                        'default'       => 9,
                        'min'           => 3,
                        'step'          => 1,
                        'max'           => 50,
                        'display_value' => 'text'
                    ),
                )
            )
        ));
    
        Redux::setSection($opt_name, array(
            'title' => esc_html__('Single Product', 'gurus'),
            'icon'  => 'el-icon-pencil',
            'subsection' => true,
            'fields'     => array_merge(
                array(
                    array(
                        'id'       => 'single_img_size',
                        'type'     => 'dimensions',
                        'title'    => esc_html__('Image Size', 'gurus'),
                        'unit'     => 'px',
                    ),
                    array(
                        'id'       => 'sg_product_ptitle',
                        'type'     => 'button_set',
                        'title'    => esc_html__('Page Title Type', 'gurus'),
                        'options'  => array(
                            'default' => esc_html__('Default', 'gurus'),
                            'custom_text' => esc_html__('Custom Text', 'gurus'),
                        ),
                        'default'  => 'default',
                    ),
                    array(
                        'id'      => 'sg_product_ptitle_text',
                        'type'    => 'text',
                        'title'   => esc_html__('Page Title Text', 'gurus'),
                        'default' => 'Shop Details',
                        'required' => array( 0 => 'sg_product_ptitle', 1 => 'equals', 2 => 'custom_text' ),
                    ),
                    array(
                        'id'       => 'product_title',
                        'type'     => 'switch',
                        'title'    => esc_html__('Product Title', 'gurus'),
                        'default'  => false
                    ),
                    array(
                        'id'       => 'product_social_share',
                        'type'     => 'switch',
                        'title'    => esc_html__('Social Share', 'gurus'),
                        'default'  => false
                    ),
                )
            )
        ));
    }
    
    
    /*--------------------------------------------------------------
    # Typography
    --------------------------------------------------------------*/
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Typography', 'gurus'),
        'icon'   => 'el-icon-text-width',
        'fields' => array(
            array(
                'id'       => 'pxl_body_typography',
                'type'     => 'select',
                'title'    => esc_html__('Body Font Type', 'gurus'),
                'options'  => array(
                    'default-font'  => esc_html__('Default Font', 'gurus'),
                    'google-font'  => esc_html__('Google Font', 'gurus'),
                ),
                'default'  => 'default-font',
            ),
    
            array(
                'id'          => 'font_body',
                'type'        => 'typography',
                'title'       => esc_html__('Body Google Font', 'gurus'),
                'google'      => true,
                'font-backup' => false,
                'all_styles'  => true,
                'line-height'  => true,
                'font-size'  => true,
                'text-align'  => false,
                'output'      => array('body'),
                'units'       => 'px',
                'required' => array( 0 => 'pxl_body_typography', 1 => 'equals', 2 => 'google-font' ),
                'force_output' => true
            ),
    
            array(
                'id'       => 'pxl_heading_typography',
                'type'     => 'select',
                'title'    => esc_html__('Heading Font Type', 'gurus'),
                'options'  => array(
                    'default-font'  => esc_html__('Default Font', 'gurus'),
                    'google-font'  => esc_html__('Google Font', 'gurus'),
                ),
                'default'  => 'default-font',
            ),
            
            array(
                'id'          => 'font_heading',
                'type'        => 'typography',
                'title'       => esc_html__('Heading Google Font', 'gurus'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'font-backup'  => false,
                'font-style'  => false,
                'output'      => array('h1,h2,h3,h4,h5,h6,.ft-heading-default'),
                'units'       => 'px',
                'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
                'force_output' => true
            ),
    
            array(
                'id'          => 'theme_default',
                'type'        => 'typography',
                'title'       => esc_html__('Theme Default', 'gurus'),
                'google'      => true,
                'font-backup' => false,
                'all_styles'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'color'  => false,
                'font-style'  => false,
                'font-weight'  => false,
                'text-align'  => false,
                'units'       => 'px',
                'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
                'force_output' => true
            ),
    
        )
    ));
    
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Extra Post Type', 'gurus'),
        'icon'       => 'el el-briefcase',
        'fields'     => array(
            array(
                'title' => esc_html__('Portfolio', 'gurus'),
                'type'  => 'section',
                'id' => 'post_portfolio',
                'indent' => true,
            ),
            array(
                'id'       => 'portfolio_display',
                'type'     => 'switch',
                'title'    => esc_html__('Portfolio', 'gurus'),
                'default'  => true
            ),
            array(
                'id'       => 'sg_portfolio_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'gurus'),
                'options'  => array(
                    'default' => esc_html__('Default', 'gurus'),
                    'custom_text' => esc_html__('Custom Text', 'gurus'),
                ),
                'default'  => 'default',
                'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'      => 'sg_portfolio_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'gurus'),
                'default' => 'Single Portfolio',
                'required' => array( 0 => 'sg_portfolio_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'      => 'portfolio_slug',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Slug', 'gurus'),
                'default' => '',
                'desc'     => 'Default: portfolio',
                'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'      => 'portfolio_name',
                'type'    => 'text',
                'title'   => esc_html__('Portfolio Name', 'gurus'),
                'default' => '',
                'desc'     => 'Default: Portfolio',
                'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'    => 'archive_portfolio_link',
                'type'  => 'select',
                'title' => esc_html__( 'Custom Archive Page Link', 'gurus' ), 
                'data'  => 'page',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'title' => esc_html__('Service', 'gurus'),
                'type'  => 'section',
                'id' => 'post_service',
                'indent' => true,
            ),
            array(
                'id'       => 'service_display',
                'type'     => 'switch',
                'title'    => esc_html__('Service', 'gurus'),
                'default'  => true
            ),
            array(
                'id'       => 'sg_service_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'gurus'),
                'options'  => array(
                    'default' => esc_html__('Default', 'gurus'),
                    'custom_text' => esc_html__('Custom Text', 'gurus'),
                ),
                'default'  => 'default',
                'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'      => 'sg_service_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'gurus'),
                'default' => 'Single Service',
                'required' => array( 0 => 'sg_service_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'      => 'service_slug',
                'type'    => 'text',
                'title'   => esc_html__('Service Slug', 'gurus'),
                'default' => '',
                'desc'     => 'Default: service',
                'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'      => 'service_name',
                'type'    => 'text',
                'title'   => esc_html__('Service Name', 'gurus'),
                'default' => '',
                'desc'     => 'Default: Services',
                'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
            array(
                'id'    => 'archive_service_link',
                'type'  => 'select',
                'title' => esc_html__( 'Custom Archive Page Link', 'gurus' ), 
                'data'  => 'page',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
                'force_output' => true
            ),
        )
    ));
}