<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_background_parallax',
        'title' => esc_html__('BR Background Parallax', 'gurus'),
        'icon' => 'eicon-background',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'rellax'
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'bg_img',
                            'label' => esc_html__('Background', 'mouno' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'bg_link',
                            'label' => esc_html__('Link', 'mouno' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        
                        array(
                            'name' => 'parallax_value',
                            'label' => esc_html__('Parallax Value', 'mouno' ),
                            'placeholder' => esc_html__('Ex: -4', 'gurus'),
                            'default' => '-4',
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),

                        array(
                            'name' => 'bg_top',
                            'label' => esc_html__('Top', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'top: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'bg_bottom',
                            'label' => esc_html__('Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'background_position',
                            'label' => esc_html__('Background Position', 'solarva'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                ''      => esc_html__('Default', 'solarva'),
                                'left top' => esc_html__('Left Top', 'solarva'),
                                'left center' => esc_html__('Left Center', 'solarva'),
                                'left bottom' => esc_html__('Left Bottom', 'solarva'),
                                'center top' => esc_html__('Center Top', 'solarva'),
                                'center center' => esc_html__('Center Center', 'solarva'),
                                'center bottom' => esc_html__('Center Bottom', 'solarva'),
                                'right top' => esc_html__('Right Top', 'solarva'),
                                'right center' => esc_html__('Right Center', 'solarva'),
                                'right bottom' => esc_html__('Right Bottom', 'solarva'),
                                'custom'      => esc_html__('Custom', 'solarva'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'background-position: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'bg_position_custom',
                            'label' => esc_html__('Custom', 'gurus'),
                            'type' => Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Ex: 50% 50%', 'gurus'),
                            'condition' => [
                                'background_position' => 'custom',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'background-position: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'background_repeat',
                            'label' => esc_html__('Background Repeat', 'solarva'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                ''      => esc_html__('Default', 'solarva'),
                                'no-repeat' => esc_html__('No Repeat', 'solarva'),
                                'repeat' => esc_html__('Repeat', 'solarva'),
                                'repeat-x' => esc_html__('Repeat-X', 'solarva'),
                                'repeat-y' => esc_html__('Repeat-Y', 'solarva'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'background-repeat: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'background_size',
                            'label' => esc_html__('Background Size', 'solarva'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                ''      => esc_html__('Default', 'solarva'),
                                'auto' => esc_html__('Auto', 'solarva'),
                                'cover' => esc_html__('Cover', 'solarva'),
                                'contain' => esc_html__('Contain', 'solarva'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper .pxl-item--background' => 'background-size: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'bg_w',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'bg_h_type',
                            'label' => esc_html__('Height Type', 'gurus'),
                            'type' => Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Custom', 'gurus'),
                                '100%' => esc_html__('100%', 'gurus'),
                            ],
                            'default' => '100%',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper' => 'height: {{VALUE}};',
                                '{{WRAPPER}} ' => 'height: {{VALUE}}',
                                '{{WRAPPER}} .elementor-widget-container' => 'height: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'bg_h',
                            'label' => esc_html__('Min Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'condition' => [
                                'bg_h_type' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper' => 'min-height: {{SIZE}}{{UNIT}};height: 100%;',
                                '{{WRAPPER}} ' => 'height: 100%',
                                '{{WRAPPER}} .elementor-widget-container' => 'height: 100%',
                            ],
                        ),
                        array(
                            'name' => 'bg_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-background-parallax-wrapper',
                        ),
                        array(
                            'name' => 'bg_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background-parallax-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path(),
);