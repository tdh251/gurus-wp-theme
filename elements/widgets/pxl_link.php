<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_link',
        'title' => esc_html__('BR Links', 'gurus'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'display',
                            'label' => esc_html__('Display', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'column' =>  esc_html__('Vertical', 'gurus'),
                                'row' => esc_html__('Horizontal', 'gurus'),
                            ],
                            'default' => 'column',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-items' => 'flex-direction: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                    'row' => 2,
                                    'description' => 'Create Highlight text with shortcode: [highlight text="Text"]',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'pxl_icon_font_size',
                                    'label' => esc_html__('Icon Size', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-links {{CURRENT_ITEM}} .pxl-item--link  i' => 'font-size: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .pxl-links {{CURRENT_ITEM}} .pxl-item--link svg' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'item_align_v',
                                      'label' => esc_html__( 'Align Items', 'gurus' ),
                                      'type' => \Elementor\Controls_Manager::CHOOSE,
                                      'control_type' => 'responsive',
                                      'options' => [
                                          'start' => [
                                              'title' => esc_html__( 'Top', 'gurus' ),
                                              'icon' => 'eicon-align-start-v'
                                          ],
                                          'center' => [
                                              'title' => esc_html__( 'Middle', 'gurus' ),
                                              'icon' => 'eicon-align-center-v'
                                          ],
                                          'end' => [
                                              'title' => esc_html__( 'Bottom', 'gurus' ),
                                              'icon' => 'eicon-align-end-v'
                                          ],
                                      ],
                                      'selectors' => [
                                          '{{WRAPPER}} .pxl-links {{CURRENT_ITEM}} .pxl-item--link' => 'align-items: {{VALUE}};',
                                      ],
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-items' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'l_width',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-items' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'justify_content_h',
                            'label' => esc_html__( 'Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'label_block' => true,
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-h'
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-justify-center-h'
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Bottom', 'gurus' ),
                                    'icon' => 'eicon-justify-end-h'
                                ],
                                'space-between' => [
                                    'title' => esc_html__( 'Space Between', 'gurus' ),
                                    'icon' => 'eicon-justify-space-between-h'
                                ],
                                'space-around' => [
                                    'title' => esc_html__( 'Space Around', 'gurus' ),
                                    'icon' => 'eicon-justify-space-around-h'
                                ],
                                'space-evenly' => [
                                    'title' => esc_html__( 'Space Evenly', 'gurus' ),
                                    'icon' => 'eicon-justify-space-evenly-h'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-items' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                                'style1' => esc_html__('Style 1', 'gurus'),
                                'style2' => esc_html__('Style 2', 'gurus'),
                                'style3' => esc_html__('Style 3', 'gurus'),
                                'style4' => esc_html__('Style 4', 'gurus'),
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'is_title_gradient',
                            'label' => esc_html__('Color Gradient', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false'
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-title' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-links .pxl-title',
                        ),
                        array(
                            'name' => 'title_bottom_space',
                            'label' => esc_html__('Bottom Space', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Link', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'link_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                                'style1' => esc_html__('Paragraph 1', 'gurus'),
                                'style2' => esc_html__('Paragraph 2', 'gurus')
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links a:not(:hover)' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-links a',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link_hover',
                    'label' => esc_html__('Link Hover', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'hover_link_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                                'style-hover-divider1' => esc_html__('Divider 1', 'gurus'),
                                'style-hover-divider2' => esc_html__('Divider 2', 'gurus'),
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links .pxl-item--link:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-links .pxl-item--link:after, {{WRAPPER}} .pxl-links .pxl-item--link:before' => 'background-color: {{VALUE}};'

                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        gurus_widget_color_type([
                            'prefix' => 'icon',
                            'selectors_class' => '.pxl-links a i',
                        ]),
                        array(
                            array(
                                'name' => 'icon_align_vertical',
                                'label' => esc_html__( 'Alignment Vertical', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Top', 'gurus' ),
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'gurus' ),
                                        'icon' => 'eicon-v-align-middle',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'Bottom', 'gurus' ),
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-links .pxl-item--link' => 'align-items: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_font_size',
                                'label' => esc_html__('Font Size', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-links .pxl-item--link i' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-links .pxl-item--link svg' => 'height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_width',
                                'label' => esc_html__('Box Width', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-link a i' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);