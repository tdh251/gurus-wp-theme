<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('BR Icon', 'gurus'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2, 
                            'label_block' => true,
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
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus') ,
                                'style1' => esc_html__('Style 1', 'gurus'), 
                                'style2' => esc_html__('Style 2', 'gurus'),
                                'style3' => esc_html__('Box Color', 'gurus'),
                            ],
                            'default' => 'style-default'
                        ),
                        array(
                            'name' => 'justify_content',
                              'label' => esc_html__( 'Justify Content', 'gurus' ),
                              'type' => \Elementor\Controls_Manager::CHOOSE,
                              'control_type' => 'responsive',
                              'options' => [
                                  'start' => [
                                      'title' => esc_html__( 'start', 'gurus' ),
                                      'icon' => 'eicon-justify-start-h'
                                  ],
                                  'center' => [
                                      'title' => esc_html__( 'Center', 'gurus' ),
                                      'icon' => 'eicon-justify-center-h'
                                  ],
                                  'end' => [
                                      'title' => esc_html__( 'End', 'gurus' ),
                                      'icon' => 'eicon-justify-end-h'
                                  ],
                              ],
                              'selectors' => [
                                  '{{WRAPPER}} .pxl-icon .pxl-item' => 'justify-content: {{VALUE}};',
                              ],
                        ),
                        array(
                            'name' => 'align_items',
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
                                  '{{WRAPPER}} .pxl-icon .pxl-item' => 'align-items: {{VALUE}};',
                              ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-icon .pxl-item' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'hover', 
                            'label' => esc_html__( 'Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'hover_style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'color' => esc_html__('Color', 'gurus') ,
                            ],
                            'default' => 'color'
                        ),
                        array(
                            'name' => 'hover_color',
                            'label' => esc_html__( 'Color ', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item:hover, 
                                {{WRAPPER}} .pxl-icon .pxl-item:hover svg' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),

                // Style Text
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Text', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon1 .pxl-item',
                        ),

                        array(
                            'name' => 'text_max_width',
                            'label' => esc_html__('Max Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-icon .pxl-item' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'text_hover', 
                            'label' => esc_html__( 'Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),

                        array(
                            'name' => 'text_hover_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item:hover' => 'color: {{VALUE}};',
                            ],
                        ),

                    ),
                ),
                // Style Icon
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item i, {{WRAPPER}} .pxl-icon .pxl-item svg' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color',
                            'label' => esc_html__( 'Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item .pxl-item--icon' => 'background-color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-icon1 .pxl-item i' => 'font-size: {{SIZE}}{{UNIT}};',
                                ' {{WRAPPER}} .pxl-icon1 .pxl-item svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'gurus' ),
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
                                ' {{WRAPPER}} .pxl-icon1 .pxl-item .pxl-item--icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_hover', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'icon_hover_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item:hover i' => 'color: {{VALUE}}; ',
                                '{{WRAPPER}} .pxl-icon .pxl-item:hover svg' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color_hover',
                            'label' => esc_html__( 'Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon .pxl-item:hover .pxl-item--icon' => 'background-color: {{VALUE}};',
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