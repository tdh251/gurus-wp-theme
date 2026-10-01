<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_social_share',
        'title' => esc_html__('BR Social Share', 'gurus'),
        'icon' => 'eicon-share',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'label',
                            'label' => esc_html__('Label', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Social', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'font_size',
                                    'label' => esc_html__('Font Size', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{CURRENT}}' => 'font-size: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                            ),
                        ),

                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'normal', 
                            'label' => esc_html__( 'NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-default',
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'), 
                                'style-round-box1' => esc_html__('Round Box 1', 'gurus'), 
                                'style-round-box2' => esc_html__('Round Box 2', 'gurus'), 
                                'style-round-box3' => esc_html__('Round Box Light Blue', 'gurus'), 
                                'style-round-box4' => esc_html__('Round Box Green', 'gurus'), 
                                'style-round-box5' => esc_html__('Round Box Transparent', 'gurus'), 
                            ]
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'color: {{VALUE}};',
                            ]
                        ),
                        array(
                            'name' => 'rotate_item',
                            'label' => esc_html__('Rotate', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive', 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item i' => 'transform: rotate({{VALUE}}deg);',
                            ]
                        ),
                        array(
                            'name' => 'font_size',
                            'label' => esc_html__('Font Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'normal_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'layout', 
                            'label' => esc_html__( 'LAYOUT', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'layout_type',
                            'label' => esc_html__('Layout Type', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'horizontal', 
                            'options' => [
                                'vertical' => esc_html__('Vertical', 'gurus'),
                                'horizontal' => esc_html__('Horizontal', 'gurus')
                            ],
                         ),
                        array(
                            'name' => 'justify_content_h',
                            'label' => esc_html__( 'Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'label_block' => true, 
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => ' eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'gurus' ),
                                    'icon' => ' eicon-justify-end-h',
                                ],
                                'space-between' => [
                                    'title' => esc_html__( 'Space Between', 'gurus' ),
                                    'icon' => 'eicon-justify-space-between-h',
                                ],
                                'space-around' => [
                                    'title' => esc_html__( 'Space Around', 'gurus' ),
                                    'icon' => 'eicon-justify-space-around-h',
                                ],
                                'space-evenly' => [
                                    'title' => esc_html__( 'Space Evenly', 'gurus' ),
                                    'icon' => 'eicon-justify-space-evenly-h',
                                ],
                            ],
                            'condition' => [
                                'layout_type' => 'horizontal',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-items' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'align_items_v',
                            'label' => esc_html__( 'Align Items', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-align-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-align-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'gurus' ),
                                    'icon' => 'eicon-align-end-h',
                                ],
                                'stretch' => [
                                    'title' => esc_html__( 'Right', 'gurus' ),
                                    'icon' => 'eicon-align-stretch-h',
                                ],
                            ],
                            'condition' => [
                                'layout_type' => 'vertical',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-items' => 'align-items: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-items' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'box', 
                            'label' => esc_html__( 'BOX', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'background-color: {{VALUE}};',
                            ]
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_hover',
                    'label' => esc_html__('Hover', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'hover_style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'hover-default',
                            'options' => [
                                'hover-default' => esc_html__('Default', 'gurus'), 
                                'hover-scale-bg' => esc_html__('Scale Background', 'gurus'), 
                            ]
                        ),
                        array(
                            'name' => 'hover_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-item:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-social--inner .pxl-item:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'hover_style' => 'hover-default',
                            ],
                        ),
                        array(
                            'name' => 'hover_bg_color2',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-share .pxl-social--inner .pxl-item.pxl-hover-scale:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'hover_style' => 'hover-scale-bg',
                            ],
                        ),
                    )
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);