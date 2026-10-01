<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('BR Nav Carousel', 'gurus'),
        'icon' => 'eicon-animation',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'style-grey-color' => esc_html__('Grey Color', 'gurus')
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow' => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow' => 'background-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow',
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'gurus' ),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-nav--inner' => 'justify-content: {{VALUE}};',
                            ],
                        ),

                    ),
                ),
                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'hover_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'btn-hover-bg-green1' => esc_html__('Backround Color Green', 'gurus'),
                                'btn-hover-bg-gray' => esc_html__('Backround Color Gray', 'gurus')
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover' => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'background_color_hover',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover' => 'background-color: {{VALUE}};',
                            ]
                        ),
                        array(
                            'name' => 'border_hover',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);