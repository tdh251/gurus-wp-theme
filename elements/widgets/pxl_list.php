<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('BR List', 'gurus'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
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
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'item_align_v',
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
                                        '{{WRAPPER}} .pxl-list {{CURRENT_ITEM}}' => 'align-items: {{VALUE}}',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                        // Icon 
                    ),
                ),
                // Option Style Layout 
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'display',
                            'label' => esc_html__('Display', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'default' => 'block',
                            'options' => [
                                'block' => esc_html__('Vertical', 'gurus'),
                                'inline-flex' => esc_html__('Horizontal', 'gurus')
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'display: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'style_v',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'list-default',
                            'options' => [
                                'list-default' => esc_html__('Default', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'wrap',
                            'label' => esc_html__('Wrap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'default' => 'wrap',
                            'condition' => [
                                'display' => 'inline-flex',
                            ],
                            'options' => [
                                'wrap' => [
                                    'label' => esc_html__('Center', 'gurus'),
                                    'icon' => 'eicon-wrap'
                                ],
                                'nowrap' => [
                                    'label' => esc_html__('End', 'gurus'),
                                    'icon' => 'eicon-nowrap',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'flex-wrap: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'default' => 'center',
                            'condition' => [
                                'display' => 'inline-flex',
                            ],
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
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'align-items: {{VALUE}}',
                                '{{WRAPPER}} .pxl-list .pxl-item' => 'margin:0',
                            ],
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'default' => 'start',
                            'label_block' => true,
                            'condition' => [
                                'display' => 'inline-flex',
                            ],
                            'options' => [
                                'start' => [
                                    'label' => esc_html__('Start', 'gurus'),
                                    'icon' => 'eicon-justify-start-h'
                                ],
                                'center' => [
                                    'label' => esc_html__('Center', 'gurus'),
                                    'icon' => 'eicon-justify-center-h'
                                ],
                                'end' => [
                                    'label' => esc_html__('End', 'gurus'),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                                'space-between' => [
                                    'label' => esc_html__('Space Between', 'gurus'),
                                    'icon' => 'eicon-justify-space-between-h',
                                ],
                                'space-around' => [
                                    'label' => esc_html__('End', 'gurus'),
                                    'icon' => 'eicon-justify-space-around-h',
                                ],
                                'space-evenly' => [
                                    'label' => esc_html__('End', 'gurus'),
                                    'icon' => 'eicon-justify-space-evenly-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'justify-content: {{VALUE}}',
                            ],
                        ),

                        // 
                        // 
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'condition' => [
                                'display' => 'inline-flex',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing_top',
                            'label' => esc_html__('Item Spacing', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'condition' => [
                                'display' => 'block',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item + .pxl-item' => 'margin-top: {{SIZE}}{{UNIT}};',
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
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--lists' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('None', 'gurus'),
                                'title-divider-right' => esc_html__('Divider on Right', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'title_divider_color',
                            'label' => esc_html__('Divider Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'title_style' => 'title-divider-right',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--title:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'condition' => [
                                'title_style' => 'title-divider-right',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--title' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Spacing', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                // Option Style Content
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-item--content',
                        ),
                    ),
                ),
                // Option Style Icon
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'current_item_align',
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
                                '{{WRAPPER}} .pxl-list .pxl-item' => 'align-items: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
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
                                '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
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