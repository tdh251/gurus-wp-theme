<?php
$pt_supports = ['service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_service_carousel',
        'title' => esc_html__('BR Service Carousel', 'gurus'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'section_layout',
                    'label'    => esc_html__( 'Layout', 'gurus' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Post Type', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => gurus_get_post_type_options($pt_supports),
                                'default'  => 'service'
                            ) ,
                            array(
                                'name'     => 'layout_service',
                                'label'    => esc_html__( 'Select Template', 'gurus' ),
                                'type'     => 'layoutcontrol',
                                'default' => 'service-1',
                                'options'  => [
                                    'service-1' => [
                                        'label' => esc_html__( 'Layout 1', 'gurus' ),
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout1.jpg'
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
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/service-layout8.webp'
                                    ],
                                ],
                                'prefix_class' => 'pxl-post-layout-',
                            ),
                        ),
                        // gurus_get_post_carousel_layout($pt_supports),
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
                            ) ,
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
                    'name' => 'section_carousel_grid',
                    'label' => esc_html__('Grid', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'slider_row',
                            'label' => esc_html__('Rows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'gurus'), 
                                '2' => esc_html__('2', 'gurus')
                            ],
                            'condition' => [
                                'layout_service!' => ['8'],
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
                    ),
                ),

                array(
                    'name' => 'section_carousel_option',
                    'label' => esc_html__('Options', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                            ],
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
                                'autoplay!' => '',
                            ],
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
                            'condition' => [
                                'layout_service!' => ['service-8'],
                            ],
                        ),
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => true,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-4', 'service-7', 'service-8']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt!' => '',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-4', 'service-7', 'service-8']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-4', 'service-7', 'service-8']],
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button!' => '',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-4', 'service-7', 'service-8']],
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_feature_list',
                            'label' => esc_html__('Show Feature List', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_number',
                            'label' => esc_html__('Show Number', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-5']]
                                        ],
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => ['service-8'],
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'theme',
                            'label' => esc_html__('Dark/Light', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Dark', 'gurus'),
                            'label_off' => esc_html__('Light', 'gurus'),
                            'default' => 'true',
                            'condition' => [
                                'style' => 'pxl-service-default',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-service-default', 
                            'options' => [
                                'pxl-service-default' => esc_html__('Default', 'gurus'),
                                'pxl-service-style1' => esc_html__('Style 1', 'gurus'),
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => '!in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Divider Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-slide' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--divider' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'align_items_v',
                            'label' => esc_html__('Align Items', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'label' => esc_html__('Start', 'gurus'),
                                    'icon' => 'eicon-align-start-v'
                                ],
                                'center' => [
                                    'label' => esc_html__('Center', 'gurus'),
                                    'icon' => 'eicon-align-center-v'
                                ],
                                'end' => [
                                    'label' => esc_html__('End', 'gurus'),
                                    'icon' => 'eicon-align-end-v',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--container' => 'align-items: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => '!in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'min_height',
                            'label' => esc_html__('Min Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--bg img' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => '!in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'max_height',
                            'label' => esc_html__('Max Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--bg img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => '!in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'inner_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--main' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'inner_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-7']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'inner_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_box_style',
                    'label' => esc_html__('Box', 'mouno' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => ['service-8']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'box_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover',
                                        ),
                                        array(
                                            'name' => '_box_hover_border_color',
                                            'label' => esc_html__('Border Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner .pxl-post--hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_image',
                    'label' => esc_html__('Image Featured', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => '!in', 'value' => ['service-7', 'service-8']],
                                ],
                            ],
                        ],
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'image_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'image_filter',
                            'label' => esc_html__('Filter', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--featured',
                        ),
                        array(
                            'name' => 'image_overlay_h',
                            'label' => esc_html__('OVERLAY', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'overlay',
                            'label' => esc_html__('Overlay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'bg_overlay',
                            'label' => esc_html__('Overlay', 'gurus' ),
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'types' => ['basic', 'color', 'gradient'],
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--featured:after,{{WRAPPER}} .pxl-post-carousel .pxl-item--overlay',
                        ),
                        array(
                            'name' => 'image_overlay_index',
                            'label' => esc_html__('Z Index', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--featured a:after, 
                                {{WRAPPER}} .pxl-post-carousel .pxl-item--overlay' => 'z-index: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_overlay!' => '',
                            ],
                        ),
                        array(
                            'name' => 'image_hover',
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'image_filter_hover',
                            'label' => esc_html__('Filter', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner:hover .pxl-post--featured',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_service_icon',
                    'label' => esc_html__('Service Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service' => ['service-8']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'service_icon_filter',
                            'label' => esc_html__('Filter', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon',
                        ),
                        array(
                            'name' => 'service_icon_size',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => ['service-8']
                    ],
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
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--icon, 
                                {{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--icon svg' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner:hover .pxl-post--icon, 
                                {{WRAPPER}} .pxl-service-carousel .pxl-post--inner:hover .pxl-post--icon svg' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color',
                            'label' => esc_html__('Box Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_border_radius',
                            'label' => esc_html__('Box Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_padding',
                            'label' => esc_html__('Box Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_width_hover',
                            'label' => esc_html__('Width Hover', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--hover .pxl-post--icon img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_filter',
                            'label' => esc_html__('Filter', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--icon img',
                        ), 
                        array(
                            'name' => 'icon_filter_hover',
                            'label' => esc_html__('Filter Hover', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner:hover .pxl-post--icon img, {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--icon img',
                        ), 
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--title',
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'title_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'title_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'title_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--title',
                                        ),
                                        array(
                                            'name' => 'title_text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--title',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-carousel:not(.pxl-service-carousel7):not(.pxl-service-carousel8) .pxl-post--inner .pxl-post--title:hover, 
                                            {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-carousel:not(.pxl-service-carousel7):not(.pxl-service-carousel8) .pxl-post--inner .pxl-post--title:hover, 
                                            {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--title',
                                        ),
                                        array(
                                            'name' => 'title_hover_text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-carousel:not(.pxl-service-carousel7):not(.pxl-service-carousel8) .pxl-post--inner .pxl-post--title:hover, 
                                            {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--title',
                                        ),
                                        array(
                                            'name' => 'show_title_line',
                                            'label' => esc_html__('Show Line', 'gurus' ),
                                            'type' => \Elementor\Controls_Manager::SWITCHER,
                                            'default' => 'true',
                                        ),
                                        array(
                                            'name' => 'line_color_hover',
                                            'label' => esc_html__('Line Color', 'gurus'),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'condition' => [
                                                'show_title_line!' => '',
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title > a, 
                                                {{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title > span' => 'background-image: linear-gradient(transparent calc(100% - 1px), {{VALUE}} 1px);',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Featured', 'mouno' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => ['service-8'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'featured_h',
                            'label' => esc_html__('Height', 'mouno'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => "height: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'featured_max_h',
                            'label' => esc_html__('Max Height', 'mouno'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => "max-height: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'featured_max_w',
                            'label' => esc_html__('Max Width', 'mouno'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => "max-width: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'featured_divider',
                            'type' => 'divider',
                        ),
                        array(
                            'name' => 'featured_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'featured_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'featured_opacity',
                                            'label' => esc_html__('Opacity', 'mouno' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_css_filter', 
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_border', 
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_box_shadow', 
                                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--featured' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'featured_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'featured_hover_h',
                                            'label' => esc_html__('Height', 'mouno'),
                                            'type' => 'slider',
                                            'size_units' => ['px', 'custom'],
                                            'separator' => 'before',
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1000,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured' => "height: {{SIZE}}{{UNIT}};",
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_opacity',
                                            'label' => esc_html__('Opacity', 'mouno' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_css_filter', 
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border', 
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_box_shadow', 
                                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--inner:hover .pxl-post--hover .pxl-post--featured' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_category',
                    'label' => esc_html__('Category', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service' => ['service-8'],
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'category_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--category a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'category_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--category a',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_excerpt',
                    'label' => esc_html__('Excerpt', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel:not(.pxl-service-carousel7) .pxl-post--inner:hover .pxl-post--excerpt, 
                                {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel .pxl-post--inner .pxl-post--excerpt',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_btn',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => ['service-8'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel:not(.pxl-service-carousel7) .pxl-post--inner:hover .pxl-post--btn, 
                                {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel:not(.pxl-service-carousel7) .pxl-post--inner:hover .pxl-post--btn, 
                                {{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn',
                        ),
                        
                    ),
                ),

                array(
                    'name' => 'tab_btn_style',
                    'label' => esc_html__('Button', 'mouno' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => ['service-8'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'button_box_size',
                            'label' => esc_html__('Box Size', 'mouno' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_h',
                            'label' => esc_html__('Height', 'mouno' ),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_icon_sz',
                            'label' => esc_html__('Icon Size', 'mouno' ),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn i ' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn',
                        ),
                        array(
                            'name' => 'button_text_shadow',
                            'label' => esc_html__('Text Shadow', 'mouno' ),
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn',
                        ),
                        array(
                            'name' => 'button_control',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'button_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'button_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn',
                                        ),
                                        array(
                                            'name' => 'button_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn',
                                        ),
                                        array(
                                            'name'         => 'button_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn'
                                        ),
                                        array(
                                            'name' => 'button_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--main .pxl-post--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'button_hover',
                                    'label' => esc_html__('Hover', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'button_hover_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_icon_color',
                                            'label' => esc_html__('Icon Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn .pxl-btn-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn',
                                        ),
                                        array(
                                            'name' => 'button_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn',
                                        ),
                                        array(
                                            'name'         => 'button_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn',
                                        ),
                                        array(
                                            'name' => 'button_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_h_hover',
                                            'label' => esc_html__('Hover', 'gurus'),
                                            'type' => 'heading',
                                        ),
                                        array(
                                            'name' => 'button_hover_color_hover',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_icon_color_hover',
                                            'label' => esc_html__('Icon Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn:hover .pxl-btn-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_bg_hover',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-carousel8 .pxl-post--hover .pxl-post--btn:hover',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_feature_list',
                    'label' => esc_html__('Features', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-7']],
                                ],
                            ],
                        ],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'feature_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--feature' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_divider_color',
                            'label' => esc_html__('Divider Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--feature' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-carousel.pxl-service-carousel7 .pxl-post--hover .pxl-post--feature',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);