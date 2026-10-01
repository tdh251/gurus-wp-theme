<?php
// Register Logo Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box_list',
        'title' => esc_html__('BR Icon Box List', 'gurus' ),
        'icon' => 'eicon-collapse',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Active', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 5,
                                ),
                                array(
                                    'name' => 'icon_type',
                                    'label' => esc_html__('Icon Type', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'icon' => 'Icon',
                                        'image' => 'Image',
                                    ],
                                    'default' => 'icon',
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'icon_type' => 'image',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_l',
                    'label' => esc_html__('Layout', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'l_dislay',
                            'label' => esc_html__('Display', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ' ' => esc_html__('Row', 'gurus'),
                                'column' => esc_html__('Column', 'gurus'),
                            ],
                            'control_type' => 'responsive',
                            'default' => ' ',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'flex-direction: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'start' => esc_html__('Start', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'end' => esc_html__('End', 'gurus'),
                            ],
                            'control_type' => 'responsive',
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'align-items: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'start' => esc_html__('Start', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'end' => esc_html__('End', 'gurus'),
                            ],
                            'control_type' => 'responsive',
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'justify-content: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'box_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-list .pxl-item',
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'active_hover',
                            'label' => esc_html__('HOVER/ACTIVE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'box_color_from',
                            'label' => esc_html__('Box Color From', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => '--gradient-color-from: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'box_color_to',
                            'label' => esc_html__('Box Color To', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item' => '--gradient-color-to: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'box_border_active',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-list .pxl-item.pxl-active, {{WRAPPER}} .pxl-icon-box-list .pxl-item:hover',
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--title' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'title_color_active',
                            'label' => esc_html__('Hover/Active Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item.pxl-active .pxl-item--title, 
                                {{WRAPPER}} .pxl-icon-box-list .pxl-item:hover .pxl-item--title' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--title',
                        ),
                        array(
                            'name' => 'spacing_bottom',
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
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_desc',
                    'label' => esc_html__('Desc', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--desc' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'desc_color_hover',
                            'label' => esc_html__('Color Hover/Active', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item.pxl-active .pxl-item--desc,
                                {{WRAPPER}} .pxl-icon-box-list .pxl-item:hover .pxl-item--desc' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--desc',
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--icon' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color_from',
                            'label' => esc_html__('Box Color From', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--icon' => '--gradient-color-from: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color_to',
                            'label' => esc_html__('Box Color To', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--icon' => '--gradient-color-to: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item--icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'icon_active_hover',
                            'label' => esc_html__('HOVER/ACTIVE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'icon_color_active',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item.pxl-active .pxl-item--icon,
                                {{WRAPPER}} .pxl-icon-box-list .pxl-item:hover .pxl-item--icon' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color_hover',
                            'label' => esc_html__('Box Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-list .pxl-item:hover .pxl-item--icon:after,
                                {{WRAPPER}} .pxl-icon-box-list .pxl-item.pxl-active .pxl-item--icon:after' => 'background-color: {{VALUE}};'
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