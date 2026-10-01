<?php
// Register Logo Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_logo',
        'title' => esc_html__('BR Logo', 'gurus' ),
        'icon' => 'eicon-logo',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'logo',
                            'label' => esc_html__('Logo', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'logo_link',
                            'label' => esc_html__('Link', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'logo_align',
                            'label' => esc_html__('Alignment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'gurus' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'gurus' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'gurus' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
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