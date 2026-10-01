<?php
$pt_supports = ['post','portfolio','service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('BR Post Grid', 'gurus' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                                'description' => esc_html__( 'Use Service Layout 6 in BR Service Grid', 'gurus' ),
                            ) 
                        ),
                        gurus_get_post_grid_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'tab_source',
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
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'gurus' ),
                                'false' => esc_html__('Disable', 'gurus' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name'    => 'filter_type',
                            'label'   => esc_html__('Filter Type', 'gurus' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'normal'  => esc_html__('Normal', 'gurus' ),
                                'ajax' => esc_html__('Ajax', 'gurus' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'gurus' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'gurus' ),
                                'loadmore' => esc_html__('Loadmore', 'gurus' ),
                                'false' => esc_html__('Disable', 'gurus' ),
                            ],
                        ),
                        // 
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns: Screen <= 575', 'gurus' ),
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
                            'label' => esc_html__('Columns: Screen <= 767', 'gurus' ),
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
                            'label' => esc_html__('Columns: Screen <= 991', 'gurus' ),
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns: Screen <= 1199', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns: Screen <= 1399', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'col-66' => 'Column 66%',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns: Screen => 1400', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'col-66' => 'Column 66%',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-item' => 'padding:{{SIZE}}px;',
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner' => 'margin-bottom:0px;',
                                '{{WRAPPER}} .pxl-grid .pxl-grid-masonry, {{WRAPPER}} .pxl-grid .pxl-grid-inner' => 'margin: -{{SIZE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns: Screen <= 575', 'gurus' ),
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
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns: Screen <= 767', 'gurus' ),
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
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns: Screen <= 991', 'gurus' ),
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
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns: Screen <= 1199', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns: Screen <= 1399', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xxl_m',
                                    'label' => esc_html__('Columns: Screen => 1400', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_display',
                    'label' => esc_html__('Display', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_image',
                            'label' => esc_html__('Show Shape Image', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
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
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-4']]
                                        ]
                                    ],
                                ],
                            ]
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
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']],
                                        ]
                                    ],
                                ],
                            ]
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
                                        ]
                                    ],
                                ],
                            ]
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
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-4']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-5']],
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-4']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'gurus' ),
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
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-4']],
                                        ],
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 16,
                            'separator' => 'after',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-2']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ],
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-4']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ],
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                // 
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Item First', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 3,
                            'label_block' => true , 
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"]',
                        ),
                        array(
                            'name' => 'subtitle',
                            'label' => esc_html__('Sub Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true , 
                            'rows' => 3,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true , 
                            'rows' => 5,
                        ), 
                    ),
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-5']],
                                ],
                            ],
                        ],
                    ]
                ),
                array(
                    'name' => 'section_style_layout',
                    'label' => esc_html__('Layout', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'layout_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => esc_html__('Style Hozorital', 'gurus'),
                                'style-2' => esc_html__('Style Vertical', 'gurus')
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'background_color',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner .pxl-post--holder',
                        ),
                        array(
                            'name' => 'background_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner .pxl-post--holder',
                        ),
                        array(
                            'name'         => 'background_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'ainus' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner .pxl-post--holder',
                        ),
                        array(
                            'name' => 'background_border_radius',
                            'label' => esc_html__('Border Radius', 'ainus' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner .pxl-post--holder' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
                            ],
                        ),
                        array(
                            'name' => 'background_padding',
                            'label' => esc_html__('Padding', 'ainus' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner .pxl-post--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'layout_hover_bg',
                            'label' => esc_html__('Hover', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'background_color_hover',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-grid:not(.pxl-service-grid-layout5):not(.pxl-service-grid-layout1) .pxl-post--inner:hover, 
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout5 .pxl-post--inner:hover .pxl-post--holder,
                                {{WRAPPER}} .pxl-grid.pxl-service-grid-layout1 .pxl-post--inner:hover .pxl-post--hover.pxl-post--img .pxl-post-img--inner:after',
                        ),

                        array(
                            'name' => 'overlay_heading',
                            'label' => esc_html__('Overlay Linear', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'color1_overlay_linear',
                            'label' => esc_html__('Color 1', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#6F8DA3',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'color2_overlay_linear',
                            'label' => esc_html__('Color 2', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#69A7B0', 
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'color3_overlay_linear',
                            'label' => esc_html__('Color 3', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#65BBBB', 
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-3']],
                                        ],
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_item_first',
                    'label' => esc_html__('Item First', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(

                        array(
                            'name' => 'item_title_color',
                            'label' => esc_html__('Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_title_typography',
                            'label' => esc_html__('Title Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--title',
                        ),
                        array(
                            'name' => 'item_subtitle_color',
                            'label' => esc_html__('Sub Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_subtitle_typography',
                            'label' => esc_html__('Sub Title Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--subtitle',
                        ),
                        array(
                            'name' => 'box_subtitle_bg_color',
                            'label' => esc_html__('Box Subtitle Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--subtitle' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_desc_color',
                            'label' => esc_html__('Description Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'item_desc_typography',
                            'label' => esc_html__('Description Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--first .pxl-item--desc',
                        ),
                        array(
                            'name' => 'pxl_animate_item_first',
                            'label' => esc_html__('BR Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_item_first',
                            'label' => esc_html__('Animate Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
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
                                '{{WRAPPER}} .pxl-grid .pxl-post--title , 
                                {{WRAPPER}} .pxl-grid .pxl-post--holder:not(.pxl-post--hover) .pxl-post--title, 
                                {{WRAPPER}} .pxl-service-grid-layout1 .pxl-post--holder:not(.pxl-post--hover) .pxl-post--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hover ',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner:hover .pxl-post--title , 
                                {{WRAPPER}} .pxl-grid .pxl-post--holder.pxl-post--hover .pxl-post-title, 
                                {{WRAPPER}} .pxl-service-grid-layout1 .pxl-post--holder.pxl-post--hover .pxl-post--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--title, 
                            {{WRAPPER}} .pxl-grid .pxl-post--holder:not(.pxl-post--hover) .pxl-post--title',
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
                                '{{WRAPPER}} .pxl-grid .pxl-post--excerpt, 
                                {{WRAPPER}} .pxl-grid .pxl-post--holder:not(.pxl-post--hover) .pxl-post--excerpt,
                                {{WRAPPER}} .pxl-service-grid-layout1 .pxl-post--inner .pxl-post--holder .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner:hover .pxl-post--excerpt, 
                                {{WRAPPER}} .pxl-grid .pxl-post--inner .pxl-post--holder .pxl-post--excerpt,
                                {{WRAPPER}} .pxl-service-grid-layout1 .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-post--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--holder:not(.pxl-post--hover) .pxl-post--excerpt, {{WRAPPER}} .pxl-grid .pxl-post--excerpt',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-post--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_img',
                            'label' => esc_html__('Filter Image', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--icon img' 
                        ),
                        array(
                            'name' => 'filter_img_hover',
                            'label' => esc_html__('Filter Image', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--inner:hover .pxl-post--icon img, 
                            {{WRAPPER}} .pxl-service-grid-layout1 .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-post--icon img' ,
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
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner .pxl-post-holder .pxl-post-info .pxl-post--meta .pxl-post--date' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner .pxl-post-holder .pxl-post-info .pxl-post--meta .pxl-post--date:before' => 'background-color: {{VALUE}} !important;'
                            ],
                        ),
                        array(
                            'name' => 'date_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--date',
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
                                '{{WRAPPER}} .pxl-grid .pxl-post--comment .comments-count' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'comment_background_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-post--comment i' => 'color:{{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'comment_text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--comment .comments-count',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn:hover, 
                                {{WRAPPER}} .pxl-grid.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-group .btn-trapezoidal' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn:hover, 
                                {{WRAPPER}} .pxl-grid.pxl-portfolio-carousel .pxl-post--inner .pxl-post--holder.pxl-post--hover .pxl-group .btn-trapezoidal' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_border_width',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'border-color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-grid .btn.pxl-post--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

            ),
        ),
    ),
    gurus_get_class_widget_path()
);