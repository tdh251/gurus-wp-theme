<?php
// Register Logo Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_divider',
        'title' => esc_html__('BR Divider', 'gurus' ),
        'icon' => 'eicon-divider',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#223035',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'background-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'type_width',
                            'label' => esc_html__('Type Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                '100vw' =>  [
                                    'title' => esc_html__('Full Screen', 'gurus'),
                                    'icon' => 'eicon-grow',
                                ],
                                'auto' =>  [
                                    'title' => esc_html__('Auto', 'gurus'),
                                    'icon' => 'eicon-shrink',
                                ],
                                '100%' =>  [
                                    'title' => esc_html__('Custom', 'gurus'),
                                    'icon' => 'eicon-custom',
                                ],
                            ],
                            'default' => 'auto', 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'width',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 3000
                                ],
                            ],
                            'condition' => [
                                'type_width' => '100%',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 1000
                                ],
                            ],
                            'default' => [
                                'size' => '1',
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'spacing_top',
                            'label' => esc_html__('Spacing Top', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'animate',
                            'label' => esc_html__('Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => esc_html__('None', 'gurus'),
                                'wow pxl-grow-rtl' => esc_html__('Grow Right To Left', 'gurus'),
                                'wow pxl-grow-ltr' => esc_html__('Grow Left To Right', 'gurus'),
                            ],
                            'default' => 'none', 
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_particle',
                    'label' => esc_html__('Particle', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'show_particle',
                            'label' => esc_html__('Show Particle', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER, 
                            'default' => '',
                        ),
                        array(
                            'name' => 'particle_position',
                            'label' => esc_html__('Position', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'right',
                            'options' => [
                                'left' => esc_html__('Left', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'right' => esc_html__('Right', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'particle_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'background-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'particle_width',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 3000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 1, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_translate',
                            'label' => esc_html__('Translate', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: -50%, -50%',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'transform: translate({{VALUE}});',
                            ],
                        ),
                        array(
                            'name' => 'particle_z_index',
                            'label' => esc_html__('Z Index', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 9999,
                            
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'z-index: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'particle_animation',
                            'label' => esc_html__('Animation', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => esc_html__('None', 'gurus'),
                                'pxl-oscillating-rtl' => esc_html__('Oscillating Right To Left', 'gurus'),
                                'pxl-oscillating-ltr' => esc_html__('Oscillating Left To Right', 'gurus'),
                            ],
                            'default' => 'none', 
                        ),
                        array(
                            'name' => 'particle_animation_duration',
                            'label' => esc_html__('Duration', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'description' => 'Unit default is ms',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider.pxl-item--particle:after' => 'animation-duration: {{VALUE}}ms;',
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