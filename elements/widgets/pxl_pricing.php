<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('BR Pricing', 'gurus'),
        'icon' => 'eicon-progress-tracker',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'popular',
                            'label' => esc_html__('Popular', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name' => 'currency',
                            'label' => esc_html__('Currency', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'package',
                            'label' => esc_html__('Package', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_feature',
                    'label' => esc_html__('Feature', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'show_in',
                                    'label' => esc_html__('Show in Card', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => 'Ex: 1-3..',
                                    'description' => esc_html__('Leave blank to apply to all. Separated by "-"', 'gurus'),
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_button',
                    'label' => esc_html__('Button', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Text', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Purchase Now', 'gurus'), 
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'url' => '#',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_popular',
                    'label' => esc_html__('Popular', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'popular_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--popular' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'popular_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--popular',
                        ),
                        array(
                            'name' => 'popular_box_color',
                            'label' => esc_html__('Box Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--popular span' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'popular_box_padding',
                            'label' => esc_html__('Box Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--popular span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_price',
                    'label' => esc_html__('Price', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'color: {{VALUE}};', 
                            ],
                        ),
                        array(
                            'name' => 'price_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price',
                        ),
                        array(
                            'name' => 'currency_size',
                            'label' => esc_html__('Currency Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--price .pxl-item--currency' => 'font-size: {{SIZE}}{{UNIT}};',
                            ]
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_package',
                    'label' => esc_html__('Package', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'package_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--package' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'package_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--package',
                        ),
                    )
                ),

                
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Feature', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-items .pxl-item' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-items .pxl-item',
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-items .pxl-item i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ]
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-items .pxl-item i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pricing .pxl-items .pxl-item svg path' => 'fill: {{VALUE}};',
                            ]
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-btn-wrap .pxl-item--btn' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-btn-wrap .pxl-item--btn',
                        ),
                        array(
                            'name' => 'icon_button_size',
                            'label' => esc_html__('Icon Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-btn-wrap .pxl-item--btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ]
                        ),
                    )
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);