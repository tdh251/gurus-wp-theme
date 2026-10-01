<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pie_chart',
        'title' => esc_html__('BR Pie Chart', 'gurus'),
        'icon' => 'far fa-chart-pie-alt',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-pie-chart',
            'gurus-pie-chart',
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'gurus-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'percentage_value',
                            'label' => esc_html__('Percentage Value', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 100,
                            'step' => 1,
                            'default' => 50,
                        ),
                        array(
                            'name' => 'chart_size',
                            'label' => esc_html__('Chart Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 178,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1170,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'counter_suffix',
                            'label' => esc_html__('Counter Suffix', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'align_items',
                              'label' => esc_html__( 'Align Items', 'gurus' ),
                              'type' => \Elementor\Controls_Manager::CHOOSE,
                              'control_type' => 'responsive',
                              'options' => [
                                  'start' => [
                                      'title' => esc_html__( 'Start', 'gurus' ),
                                      'icon' => 'eicon-align-start-h'
                                  ],
                                  'center' => [
                                      'title' => esc_html__( 'Center', 'gurus' ),
                                      'icon' => 'eicon-align-center-h'
                                  ],
                                  'end' => [
                                      'title' => esc_html__( 'End', 'gurus' ),
                                      'icon' => 'eicon-align-end-h'
                                  ],
                              ],
                              'selectors' => [
                                  '{{WRAPPER}} .pxl-pie-chart' => 'align-items: {{VALUE}};',
                              ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item--title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item--title span' => 'text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-item--title',
                        ),
                        array(
                            'name' => 'h_width',
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
                                '{{WRAPPER}} .pxl-pie-chart .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__('Percentage', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_option',
                            'label' => esc_html__('BAR', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after', 
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Color From', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'bar_color_to',
                            'label' => esc_html__('Color To', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'track_option',
                            'label' => esc_html__('TRACK', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after', 
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'chart_option',
                            'label' => esc_html__('CHART', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after', 
                        ),
                        array(
                            'name' => 'chart_line_width',
                            'label' => esc_html__('Line Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 3,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                        ),
                        array(
                            'name' => 'chart_line_cap',
                            'label' => esc_html__('Line Cap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'square' => 'Square',
                                'round' => 'Round',
                            ],
                            'default' => 'square',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_counter',
                    'label' => esc_html__('Counter', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'counter_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-counter--number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-counter--number',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);