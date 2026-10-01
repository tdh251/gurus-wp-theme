<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('BR Showcase', 'gurus'),
        'icon' => 'eicon-parallax',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'gurus' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_showcase/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_showcase/layout2.jpg'
                                ],
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => '1'
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1'
                            ],
                        ),
                        array(
                            'name' => 'btn_link1',
                            'label' => esc_html__('Link Light Page', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'layout' => '1'
                            ],
                        ),
                        array(
                            'name' => 'btn_link3',
                            'label' => esc_html__('Link Home Dark', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'layout' => '1'
                            ],
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Link One Page', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'layout' => '1'
                            ],
                        ),
                        array(
                            'name' => 'coming_soon',
                            'label' => esc_html__('Coming Soon', 'gurus'),
                            'type' => Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'btn_text_hover',
                            'label' => esc_html__('Button Text Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'gurus' ),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase2 .pxl-grid-inner' => 'justify-content: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2'
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Page', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '2'
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'item_coming_soon',
                                    'label' => esc_html__('Coming Soon', 'gurus'),
                                    'type' => Elementor\Controls_Manager::SWITCHER,
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'content_heading', 
                                    'label' => esc_html__( 'Content', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'separator' => 'before',
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true
                                ),
                                array(
                                    'name' => 'link_heading', 
                                    'label' => esc_html__( 'Links', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'separator' => 'before',
                                ),
                                array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Link Muplti Page', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'item_link_one_page',
                                    'label' => esc_html__('Link One Page', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],

                                ),
                                array(
                                    'name' => 'item_link_home_dark',
                                    'label' => esc_html__('Link Home Dark', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'shape_heading1', 
                                    'label' => esc_html__( 'Shape 1 Position', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'separator' => 'before',
                                ),
                                array(                            
                                    'name' => 'h_orientation',
                                    'label' => esc_html__('Horizontal Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'control_type' => 'responsive',
                                    'options' => [
                                        'left' => [
                                            'label' => esc_html__('Left', 'gurus'), 
                                            'icon' => 'eicon-h-align-left'
                                        ],
                                        'right' => [
                                            'label' => esc_html__('Right', 'gurus'), 
                                            'icon' => 'eicon-h-align-right'
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_left',
                                    'label' => esc_html__('Left', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'h_orientation' => 'left',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_right',
                                    'label' => esc_html__('Right', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'h_orientation' => 'right',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(                            
                                    'name' => 'v_orientation',
                                    'label' => esc_html__('Vertical Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'control_type' => 'responsive',
                                    'options' => [
                                        'top' => [
                                            'label' => esc_html__('Top', 'gurus'), 
                                            'icon' => 'eicon-v-align-top'
                                        ],
                                        'bottom' => [
                                            'label' => esc_html__('Bottom', 'gurus'), 
                                            'icon' => 'eicon-v-align-bottom'
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_top',
                                    'label' => esc_html__('Top', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'v_orientation' => 'top',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_bottom',
                                    'label' => esc_html__('Bottom', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'v_orientation' => 'bottom',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape1' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'shape_heading2', 
                                    'label' => esc_html__( 'Shape 2 Position', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'separator' => 'before',
                                ),
                                array(                            
                                    'name' => 'h_orientation1',
                                    'label' => esc_html__('Horizontal Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'control_type' => 'responsive',
                                    'options' => [
                                        'left' => [
                                            'label' => esc_html__('Left', 'gurus'), 
                                            'icon' => 'eicon-h-align-left'
                                        ],
                                        'right' => [
                                            'label' => esc_html__('Right', 'gurus'), 
                                            'icon' => 'eicon-h-align-right'
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_left1',
                                    'label' => esc_html__('Left', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'h_orientation1' => 'left',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_right1',
                                    'label' => esc_html__('Right', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'h_orientation1' => 'right',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(                            
                                    'name' => 'v_orientation1',
                                    'label' => esc_html__('Vertical Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'control_type' => 'responsive',
                                    'options' => [
                                        'top' => [
                                            'label' => esc_html__('Top', 'gurus'), 
                                            'icon' => 'eicon-v-align-top'
                                        ],
                                        'bottom' => [
                                            'label' => esc_html__('Bottom', 'gurus'), 
                                            'icon' => 'eicon-v-align-bottom'
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_top1',
                                    'label' => esc_html__('Top', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'v_orientation1' => 'top',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_bottom1',
                                    'label' => esc_html__('Bottom', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'v_orientation1' => 'bottom',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-showcase {{CURRENT_ITEM}} .pxl-shape2' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'dividerb',
                                    'type' => \Elementor\Controls_Manager::DIVIDER,
                                ),
                                array(
                                    'name' => 'item_animate',
                                    'label' => esc_html__('Animate', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => gurus_widget_animate_v2(),
                                    'default' => 'wow fadeInUp',
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Settings', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            
                        ),
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
                                '{{WRAPPER}} .pxl-grid .pxl-grid-masonry' => 'margin-left: -{{SIZE}}px;margin-right: -{{SIZE}}px;',
                            ],
                        ),
                    ),
                ),

            ),
        ),
    ),
    gurus_get_class_widget_path()
);