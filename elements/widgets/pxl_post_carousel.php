<?php
$pt_supports = ['post','portfolio','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('BR Post Carousel', 'gurus' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'gurus' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => gurus_get_post_type_options($pt_supports),
                                'default'  => 'post',
                                'description' => esc_html__( 'Use Post Layout 2 in BR News Carousel<br> Portfolio Layout 2 in BR Portfolio Carousel<br> Service Layout 4 + 5 in BR Service Carousel', 'gurus' ),
                            ) ,
                        ),
                        gurus_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'gurus' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'gurus' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        gurus_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        gurus_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'gurus' ),
                                    'ID' => esc_html__('ID', 'gurus' ),
                                    'author' => esc_html__('Author', 'gurus' ),
                                    'title' => esc_html__('Title', 'gurus' ),
                                    'rand' => esc_html__('Random', 'gurus' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'gurus' ),
                                    'asc' => esc_html__('Ascending', 'gurus' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'heading1',
                            'label' => esc_html__('GRID', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'slider_row',
                            'label' => esc_html__('Rows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'gurus'), 
                                '2' => esc_html__('2', 'gurus')
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_md_custom',
                            'label' => esc_html__('Columns MD Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_md' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_lg_custom',
                            'label' => esc_html__('Columns LG Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_lg' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xl_custom',
                            'label' => esc_html__('Columns XL Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_xl' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),

                        array(
                            'name' => 'col_xxl_custom',
                            'label' => esc_html__('Columns XXL Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_xxl' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15px',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide' => 'padding:0 {{SIZE}}px;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin:0 -{{SIZE}}px;',
                            ],
                        ),

                        array(
                            'name' => 'heading2',
                            'label' => esc_html__('CAROUSEL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'arrow_style',
                            'label' => esc_html__('Arrow Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-default',
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                            ],
                            'condition' => [
                                'arrows!' => ''
                            ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination!' => ''
                            ]
                        ),
                        array(
                            'name' => 'pagination_style',
                            'label' => esc_html__('Pagination Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Dot Blue Color', 'gurus'),
                                'style2' => esc_html__('Dot White Color', 'gurus'),
                                'style3' => esc_html__('Dot Gray Color', 'gurus'),
                                'style4' => esc_html__('Divider Black Color', 'gurus'),
                                'style5' => esc_html__('Dot Dark Color', 'gurus'),
                            ],
                            'condition' => [
                                'pagination!' => '',
                                'pagination_type' => 'bullets',
                            ]
                        ),

                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay!' => ''
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'show_image',
                            'label' => esc_html__('Show Image', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'show_comment',
                            'label' => esc_html__('Show Comment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),

                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_layout' ,
                    'label' => esc_html__('General', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'is_image_hover',
                            'label' => esc_html__('Image Bacground Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'image_hover',
                            'label' => esc_html__('Upload', 'gurus'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'is_image_hover' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'l_post_style',
                            'label' => esc_html__('Display', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => esc_html__('Vertical', 'gurus'),
                                'style-2' => esc_html__('Horizontal', 'gurus')
                            ],
                            'default' => 'style-1',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'l_post_style1',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'layout-gray-color' => esc_html__('Box Gray', 'gurus'),
                                'layout-dark-color' => esc_html__('Box Dark', 'gurus'),
                                'layout-dark-blue-color' => esc_html__('Box Dark Blue', 'gurus'),
                            ],
                            'default' => 'default',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'l_portfolio_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'gadient-color' => esc_html__('Gradient Color', 'gurus'),
                                'dark-blue-color' => esc_html__('Dark Blue Color', 'gurus'),
                            ],
                            'default' => 'default',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'l_service_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'box-shadow' => esc_html__('Box Shadow', 'gurus'),
                            ],
                            'default' => 'default',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'l_service_style1',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'dark', 
                            'options' => [
                                'light' => esc_html__('Light', 'gurus'),
                                'dark' => esc_html__('Dark', 'gurus'),
                                'no-border-dark' => esc_html__('No Border Dark', 'gurus'),
                            ],
                            'default' => 'default',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner, 
                                {{WRAPPER}} .pxl-swiper-slider.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder .pxl-post-title:after' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'background_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner:hover, 
                                {{WRAPPER}} .pxl-swiper-slider.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-shape-trapezoidal:after,
                                {{WRAPPER}} .pxl-swiper-slider.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-shape-trapezoidal:before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                    )
                ),


                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--title , 
                                {{WRAPPER}} .pxl-swiper-slider .pxl-post--holder:not(.pxl-post--hover) .pxl-post--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hover ',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner .pxl-post--title , 
                                {{WRAPPER}} .pxl-swiper-slider .pxl-post--holder.pxl-post--hover .pxl-post-title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--title, {{WRAPPER}} .pxl-swiper-slider .pxl-post--holder:not(.pxl-post--hover) .pxl-post--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_excerpt',
                    'label' => esc_html__('Excerpt', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--excerpt, 
                                {{WRAPPER}} .pxl-swiper-slider .pxl-post--holder:not(.pxl-post--hover) .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner:hover .pxl-post--excerpt, 
                                {{WRAPPER}} .pxl-swiper-slider .pxl-post--inner .pxl-post--holder .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--holder:not(.pxl-post--hover) .pxl-post--excerpt, {{WRAPPER}} .pxl-swiper-slider .pxl-post--excerpt',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ), 
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.pxl-swiper-slider .pxl-post--inner .pxl-post--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '.pxl-swiper-slider .pxl-post--inner .pxl-post--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '.pxl-swiper-slider .pxl-post--inner .pxl-post--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ), 
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__('IMAGE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ), 
                        array(
                            'name' => 'icon_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '.pxl-swiper-slider .pxl-post--inner .pxl-post--icon img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_filter',
                            'label' => esc_html__('Filter', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '.pxl-swiper-slider .pxl-post--inner .pxl-post--icon img',
                        ), 
                    ),
                ),
                array(
                    'name' => 'section_style_date',
                    'label' => esc_html__('Date', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'date_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner .pxl-post-holder .pxl-post-info .pxl-post--meta .pxl-post--date' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--inner .pxl-post-holder .pxl-post-info .pxl-post--meta .pxl-post--date:before' => 'background-color: {{VALUE}} !important;'
                            ],
                        ),
                        array(
                            'name' => 'date_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--date',
                        ),
                    ),
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                ]
                            ],
                        ],
                    ]
                ),
                array(
                    'name' => 'section_style_comment',
                    'label' => esc_html__('Comment', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'comment_text_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--comment ' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'is_comment_background_gadient',
                            'label' => esc_html__('Background Gadient', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'comment_background_color',
                            'label' => esc_html__('Background Color CC', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--comment i' => 'color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'is_comment_background_gadient!' => 'false',
                            ]
                        ),
                        array(
                            'name' => 'comment_text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--comment .comments-count',
                        ),
                    ),
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                    ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                ]
                            ],
                        ],
                    ]
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn:hover, 
                                {{WRAPPER}} .pxl-swiper-slider.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-group .btn-trapezoidal' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn:hover, 
                                {{WRAPPER}} .pxl-swiper-slider.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-group .btn-trapezoidal' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn',
                        ),
                        array(
                            'name' => 'button_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_border_type',
                            'label' => esc_html__( 'Border Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'gurus' ),
                                'solid' => esc_html__( 'Solid', 'gurus' ),
                                'double' => esc_html__( 'Double', 'gurus' ),
                                'dotted' => esc_html__( 'Dotted', 'gurus' ),
                                'dashed' => esc_html__( 'Dashed', 'gurus' ),
                                'groove' => esc_html__( 'Groove', 'gurus' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_border_width',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'button_border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'button_border_color',
                            'label' => esc_html__( 'Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'button_border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'button_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .btn.pxl-post--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);