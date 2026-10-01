<?php

/**

 * Include the TGM_Plugin_Activation class.

 */

get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );



add_action( 'tgmpa_register', 'gurus_register_required_plugins' );

function gurus_register_required_plugins() {

    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );

    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] ) ; 

    $default_path = $pxl_server_info['plugin_url'];  

    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';

    $plugins = array(



        array(

            'name'               => esc_html__('Redux Framework', 'gurus'),

            'slug'               => 'redux-framework',

            'required'           => true,

            'logo'        => $images . '/redux.png',

            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'gurus' ),

        ),



        array(

            'name'               => esc_html__('Elementor', 'gurus'),

            'slug'               => 'elementor',

            'required'           => true,

            'logo'        => $images . '/elementor.png',

            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'gurus' ),

        ),



        array(

            'name'               => esc_html__('Bravis Addons', 'gurus'),

            'slug'               => 'bravis-addons',

            'source'             => 'bravis-addons.zip',

            'required'           => true,

            'logo'        => $images . '/bravis-addons.png',

            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Gurus WordPress Theme.', 'gurus' ),

        ),

  

        array(

            'name'               => esc_html__('Contact Form 7', 'gurus'),

            'slug'               => 'contact-form-7',

            'required'           => true,

            'logo'        => $images . '/contact-f7.png',

            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'gurus' ),

        ),
        

        array(

            'name'               => esc_html__('WooCommerce', 'gurus'),

            'slug'               => "woocommerce",

            'required'           => true,

            'logo'        => $images . '/woo.png',

            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'gurus' ),

        ),


        array(

            'name'               => esc_html__('Variation Swatches for WooCommerce', 'gurus'),

            'slug'               => "woo-variation-swatches",

            'required'           => false,

            'logo'        => $images . '/woo-smart-compare.png',

            'description' => esc_html__( 'Variation Swatches is easy to use WooCommerce product variation swatches plugin.', 'gurus' ),

        ),



        array(

            'name'               => esc_html__('Wishlist for WooCommerce', 'gurus'),

            'slug'               => "woo-smart-wishlist",

            'required'           => false,

            'logo'        => $images . '/woo-smart-wishlist.png',

            'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'gurus' ),

        ),
    );

 



    $config = array(

        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.

        'menu'         => 'tgmpa-install-plugins', // Menu slug.

        'is_automatic' => true,

    );



    tgmpa( $plugins, $config );



}