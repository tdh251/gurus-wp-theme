<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_column_chart',
        'title' => esc_html__('BR Column Chart', 'gurus' ),
        'icon' => 'eicon-align-end-v',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_v_axis', 
                            'label' => esc_html__('VERTICAL AXIS', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'max_y',
                            'label' => esc_html__('Max Value', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'defautl' => 265,
                        ),
                        array(
                            'name' => 'chart_height',
                            'label' => esc_html__('Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--inner' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'content_h_axis', 
                            'label' => esc_html__('HORIZONTAL AXIS', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'chart_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--inner ' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'value',
                                    'label' => esc_html__('Value', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => '',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'normal_option', 
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--container' => 'background-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'space',
                            'label' => esc_html__('Space', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-column-chart .pxl-item-horizontal-axis' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'min_height',
                            'label' => esc_html__('Min Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--container' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-column-chart .pxl-item--container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider4',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'colunm_option', 
                            'label' => esc_html__('COLUMN', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => ['gradient'],
                            'selector' => '{{WRAPPER}} .pxl-column-chart .pxl-item--col',
                        ),
                        array(
                            'name' => 'divider3',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'active_option', 
                            'label' => esc_html__('ACTIVE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'background_active',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => ['gradient'],
                            'selector' => '{{WRAPPER}} .pxl-column-chart .pxl-item--col.pxl-item--active',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);