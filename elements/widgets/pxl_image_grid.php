<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_grid',
        'title' => esc_html__('BR Image Grid', 'gurus'),
        'icon' => 'eicon-gallery-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Partner', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'max_width',
                                    'label' => esc_html__('Max Width', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 3000,
                                        ],
                                    ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'flex: 0 1 {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'max_height',
                                    'label' => esc_html__('Max Height', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 3000,
                                        ],
                                    ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}} .pxl-item--image' => 'max-height: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'hide_sm',
                                    'label' => esc_html__('Hide <=767px', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'false',
                                ),
                                array(
                                    'name' => 'hide_xs',
                                    'label' => esc_html__('Hide <=576px', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'false',
                                ),
                                array(
                                    'name' => 'parallax_hover',
                                    'label' => esc_html__('Parllax Hover', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'true',
                                ),
                                 
                                array(
                                    'name' => 'animate',
                                    'label' => esc_html__('Animate', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => gurus_widget_animate_v2(),
                                    'default' => '',
                                ),
                            ),
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-grid .pxl-grid-inner' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'direction',
                            'label' => esc_html__('Direction', 'gurus'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'row' => [
                                    'title' => esc_html__( 'Row', 'gurus' ),
                                    'icon' => 'eicon-navigation-horizontal',
                                ],
                                'column' => [
                                    'title' => esc_html__( 'Column', 'gurus' ),
                                    'icon' => 'eicon-navigation-vertical',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-grid .pxl-grid-inner' => 'flex-direction: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'wrap',
                            'label' => esc_html__('Wrap', 'gurus'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'wrap' => [
                                    'title' => esc_html__( 'Wrap', 'gurus' ),
                                    'icon' => 'eicon-wrap',
                                ],
                                'nowrap' => [
                                    'title' => esc_html__( 'Nowrap', 'gurus' ),
                                    'icon' => 'eicon-nowrap',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-grid .pxl-grid-inner' => 'flex-wrap: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'align_horizontal',
                            'label' => esc_html__( 'Alignment Horizontal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Left', 'gurus' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Right', 'gurus' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-grid .pxl-grid-inner' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'align_vertical',
                            'label' => esc_html__( 'Alignment Vertical', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Top', 'gurus' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Middle', 'gurus' ),
                                    'icon' => 'eicon-v-align-middle',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Bottom', 'gurus' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-grid .pxl-grid-inner' => 'align-item: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);