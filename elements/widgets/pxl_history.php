<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_history',
        'title' => esc_html__('BR History', 'gurus'),
        'icon' => 'eicon-history',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
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
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'timeline-alternating',
                            'options' => [
                                'timeline-alternating' => esc_html__('Interleaving', 'gurus'),
                                'timeline-single-side' => esc_html__('Single Side 1', 'gurus'),
                                'timeline-single-side2' => esc_html__('Single Side 2', 'gurus'),
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
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history .pxl-item--inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Line Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history.timeline-single-side .pxl-item--inner::after,
                                 {{WRAPPER}} .pxl-history.timeline-single-side2 .pxl-item--inner::after' => 'border-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_box_number',
                    'label' => esc_html__('BOX INDEX', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history .pxl-item--number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history .pxl-item--number' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-history .pxl-item--number',
                        ),

                    ),
                    
                ),

                // Option Style Title - Layout 2
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-history .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_spacer_bottom',
                            'label' => esc_html__('Spacer Bottom', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-history .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-history .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-history .pxl-item--content',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);