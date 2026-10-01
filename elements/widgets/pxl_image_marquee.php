<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_marquee',
        'title' => esc_html__('BR Image Marquee', 'gurus' ),
        'icon' => 'eicon-code-highlight',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'marquee',
            'pxl-marquee',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'img_size', 
                            'label' =>  esc_html__( 'Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__( 'Upload Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                        ),
                        // array(
                        //     'name' => 'max_width',
                        //     'label' => esc_html__('Max Width', 'gurus' ),
                        //     'type' => \Elementor\Controls_Manager::SLIDER,
                        //     'range' => [
                        //         'px' => [
                        //             'min' => 0,
                        //             'max' => 3000,
                        //         ],
                        //     ],
                        //     'control_type' => 'responsive',
                        //     'selectors' => [
                        //         '{{WRAPPER}} .pxl-image-marquee .pxl-item img' => 'max-width: {{VALUE}}{{UNIT}};',
                        //     ],
                        // ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'opt_transition',
                            'label' => esc_html__('Transection', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'linear' => esc_html__('Linear', 'gurus')
                            ],

                            'default' => 'linear',
                        ),
                        array(
                            'name' => 'opt_delay_before_start',
                            'label' => esc_html__('Delay Before Start', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'max' => 100000,
                            'description' => 'Time unit is ms.'
                        ),
                        array(
                            'name' => 'opt_direction',
                            'label' => esc_html__('Direction', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'top' => esc_html__('Top', 'gurus'),
                                'right' => esc_html__('Right', 'gurus'),
                                'bottom' => esc_html__('Bottom', 'gurus'),
                                'left' => esc_html__('Left', 'gurus')
                            ],
                            'default' => 'left',
                        ),
                        array(
                            'name' => 'opt_duplicated',
                            'label' => esc_html__('Duplicated', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'no',
                            'return_value' => 'yes',
                            'description' => 'Should the marquee be duplicated to show an effect of continuous flow.'
                        ),
                        array(
                            'name' => 'opt_duration',
                            'label' => esc_html__('Duration', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'max' => 100000,
                            'description' => 'Time unit is ms.'
                        ),
                        array(
                            'name' => 'opt_pause_on_hover',
                            'label' => esc_html__('Pause On Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'no',
                            'return_value' => 'yes',
                            'description' => 'Pause the marquee on hover.'
                        ), 
                        array(
                            'name' => 'opt_start_visible',
                            'label' => esc_html__('Start Visible', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'return_value' => 'yes',
                            'default' => 'no',
                            'description' => 'The marquee will be visible from the start.'
                        ), 
                    ),
                ),
                array(
                    'name' => 'section_style_layout',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-marquee .pxl-marquee-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'margin',
                            'label' => esc_html__('Margin', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-marquee .pxl-marquee-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);