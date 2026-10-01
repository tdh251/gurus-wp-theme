<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_progressbar',
        'title' => esc_html__( 'BR Progress Bar', 'gurus' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-progressbar',
            'gurus-progressbar',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(

                        array(
                            'name' => 'progressbar',
                            'label' => esc_html__( 'Progress Bar', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'item_max_width',
                            'label' => esc_html__('Item Max Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--item' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_layout',
                    'label' => esc_html__( 'Layout', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'display' ,
                            'label' => esc_html__('Display', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => ' ',
                            'options' => [
                                ' ' => esc_html__('Vertical', 'gurus'),
                                'horizontal' => esc_html__('Horizontal', 'gurus')
                            ]
                        ),
                        array(
                            'name' => 'spacer',
                            'label' => esc_html__('Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'bar_border_type!' => ' ',
                            ]
                        ),
                        array(
                            'name' => 'aligment' ,
                            'label' => esc_html__('Alignment', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => ' ',
                            'options' => [
                                ' ' => esc_html__('Default', 'gurus'),
                                'start' => esc_html__('Horizontal', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'end' => esc_html__('End', 'gurus'),
                                'space-between' => esc_html__('Space Between', 'gurus'),
                                'space-around' => esc_html__('Space Around', 'gurus'),
                                'space-evenly' => esc_html__('Space Evenly', 'gurus'),
                            ],
                            'condition' => [
                                'display' => 'horizontal'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar' => 'justify-content: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'style' ,
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => ' ',
                            'options' => [
                                ' ' => esc_html__('Default', 'gurus'),
                                'dark' => esc_html__('Dark ', 'gurus'),
                                'light' =>esc_html__('Light Blue', 'gurus'),
                                'light2' =>esc_html__('Light Green', 'gurus'),
                            ]
                        ),
                        array(
                            'name' => 'wrap',
                            'label' => esc_html__('Wrap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'default' => 'wrap',
                            'options' => [
                                'wrap' => esc_html__('Wrap', 'gurus'),
                                'nowrap' => esc_html__('No Wrap', 'gurus')
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar.pxl-d-horizontal' => 'flex-wrap: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'item_space_vertical',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'display!' => 'horizontal'
                            ]
                        ),
                        array(
                            'name' => 'item_space_horizontal',
                            'label' => esc_html__('Row Gap', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-progressbar.pxl-d-horizontal' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'display' => 'horizontal'
                            ]
                        ),
                        array(
                            'name' => 'item_space_horizontal2',
                            'label' => esc_html__('Column Gap', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-progressbar.pxl-d-horizontal' => 'column-gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'display' => 'horizontal'
                            ]
                        ),
                    )

                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__( 'Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}}  .pxl-progressbar .pxl--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__( 'Percentage', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'percentage_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percentage_typography',
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .pxl--percentage',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_bar',
                    'label' => esc_html__( 'Bar', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_border_type',
                            'label' => esc_html__( 'Border Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ' ' => esc_html__( 'None', 'gurus' ),
                                'solid' => esc_html__( 'Solid', 'gurus' ),
                                'double' => esc_html__( 'Double', 'gurus' ),
                                'dotted' => esc_html__( 'Dotted', 'gurus' ),
                                'dashed' => esc_html__( 'Dashed', 'gurus' ),
                                'groove' => esc_html__( 'Groove', 'gurus' ),
                            ],
                            'default' => ' ',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_border_width',
                            'label' => esc_html__('Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'bar_border_type!' => ' ',
                            ]
                        ),
                        array(
                            'name' => 'bar_border_color',
                            'label' => esc_html__( 'Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'bar_border_type!' => ' ',
                            ]
                        ),
                        array(
                            'name' => 'bar_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl-progressbar--wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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