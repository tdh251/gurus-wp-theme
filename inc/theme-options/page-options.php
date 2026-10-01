<?php
 
add_action( 'pxl_post_metabox_register', 'gurus_page_options_register' );
function gurus_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'gurus' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'gurus' ),
					'icon'   => 'el el-cog',
					'fields' => array_merge(
						gurus_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
					            'id'=> 'post_video_link',
					            'type' => 'text',
					            'title' => esc_html__('Video Link', 'gurus'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wrapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'gurus' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'gurus' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        gurus_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'gurus' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'gurus' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						
				        gurus_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						gurus_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'gurus'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'gurus'),
				                    'hide'  => esc_html__('Hide', 'gurus'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				                'id'       => 'page_mobile_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Mobile Style', 'gurus'),
				                'options'  => array(
				                    'inherit'  => esc_html__('Inherit', 'gurus'),
				                    'light'  => esc_html__('Light', 'gurus'),
				                    'dark'  => esc_html__('Dark', 'gurus'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo', 'gurus'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'gurus' ),
				                'options'  => gurus_get_nav_menu_slug(),
				                'default' => '',
				            ),
							array(
							    'id'        => 'background_color_header_m',
							    'type'      => 'color',
							    'title'     => esc_html__('Background Color Header Mobile', 'gurus'),
							    'default'   => '',
							    'transparent' => false,
							    'output'    => array(
							        'background-color' => '#pxl-header-elementor #pxl-header-mobile, #pxl-header-elementor #pxl-header-mobile .pxl-header-menu, #pxl-header-elementor #pxl-header-mobile.style-dark, #pxl-header-elementor #pxl-header-mobile.style-dark .pxl-header-menu',
							    )
							),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'gurus'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'gurus'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'gurus'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'gurus'),
				                ),
				                'default'  => '-1',
				            ),
				            array(
				                'id'       => 'header_margin',
				                'type'     => 'spacing',
				                'mode'     => 'margin',
				                'title'    => esc_html__('Margin', 'gurus'),
				                'width'    => false,
				                'unit'     => 'px',
				                'output'    => array('#pxl-header-elementor .pxl-header-elementor-main'),
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'gurus' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        gurus_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'gurus' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						gurus_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wrapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'gurus' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'gurus' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        gurus_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'gurus'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'gurus'),
				                    'hide'  => esc_html__('Hide', 'gurus'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'gurus'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'gurus'),
				                    'on' => esc_html__('On', 'gurus'),
				                    'off' => esc_html__('Off', 'gurus'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'gurus'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'gurus'),
				                    'style-round' => esc_html__('Round', 'gurus'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'gurus' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
							    'id'        => 'page_body_color',
							    'type'      => 'color',
							    'title'     => esc_html__('Body Background Color', 'gurus'),
							    'default'   => '',
							    'transparent' => false,
							    'output'    => array(
							        'background-color' => 'body',
							    )
							),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'gurus'),
					            'transparent' => false,
					            'default'     => ''
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
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'gurus' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'gurus'),
					        ),
							array(
								'id'        => 'background_color_btn_scroll',
								'type'      => 'color',
								'title'     => esc_html__('Background Color Button Scroll To Top', 'gurus'),
								'default'   => '',
								'transparent' => false,
								'output'    => array(
									'background-color' => '.pxl-scroll-top:before',
								),
							),
					    ),
				    )
				],
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'gurus' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'gurus' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wrapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'gurus' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),

				    )
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'gurus' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        gurus_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'gurus' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'gurus' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        gurus_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'header' => [
					'title'  => esc_html__( 'General', 'gurus' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'gurus'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'gurus'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'gurus'),
					                'image'  => esc_html__('Image', 'gurus'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'gurus'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'gurus'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
							array(
					            'id'=> 'service_feature_list',
					            'type' => 'textarea',
					            'title' => esc_html__('Feature List', 'gurus'),
								'placeholder' => 'Feature 1 | Feature 2 ...',
					            'description' => 'Separated by |',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wrapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'gurus' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),
						gurus_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],

		'pxl-template' => [ 
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'gurus' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'gurus' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'gurus'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'gurus'), 
								'header'       => esc_html__('Header Desktop', 'gurus'),
								'header-mobile'       => esc_html__('Header Mobile', 'gurus'),
								'footer'       => esc_html__('Footer', 'gurus'), 
								'mega-menu'    => esc_html__('Mega Menu', 'gurus'), 
								'page-title'   => esc_html__('Page Title', 'gurus'), 
								'tab' => esc_html__('Tab', 'gurus'),
								'hidden-panel' => esc_html__('Hidden Panel', 'gurus'),
								'popup' => esc_html__('Popup', 'gurus'),
								'page' => esc_html__('Page', 'gurus'),
								'slider' => esc_html__('Slider', 'gurus'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'gurus'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'gurus'), 
								'px-header--transparent'       => esc_html__('Transparent', 'gurus'),
								'pxl-header-sidebar--left' => esc_html__('Left Sidebar', 'gurus'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),
						// Add here
						array(
							'id' => 'header_sidebar_width',
							'type' => 'slider',
							'title' => __( 'Header Sidebar Width' , 'redux_docs_generator' ),
							'compiler' => true,
							'max' => 1000,
							'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'pxl-header-sidebar--left' ),
						),
				        array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'gurus'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'gurus'), 
								'px-header--transparent'       => esc_html__('Transparent', 'gurus'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
				        ),

				        array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'gurus'),
				            'options' => [
				            	'top'       	   => esc_html__('Top', 'gurus'),
				            	'right'       	   => esc_html__('Right', 'gurus'),
				            ],
				            'default' => 'right',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_height',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Height', 'gurus'),
				            'subtitle'       => esc_html__('Ex: 500px (default is auto).', 'gurus'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_boxcolor',
				            'type'        => 'color',
				            'title'       => esc_html__('Box Color', 'gurus'),
				            'transparent' => false,
				            'default'     => '',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 