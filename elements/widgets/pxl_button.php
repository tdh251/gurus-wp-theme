<?php
$templates_df = ['0' => esc_html__('None', 'gurus')];
$templates = $templates_df + gurus_get_templates_option('page') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'gurus'),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'btn_type',
                            'label' => esc_html__('Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-btn-default',
                            'options' => [
                                'pxl-btn-default' => esc_html__('Default', 'gurus' ),
                                'pxl-btn-icon' => esc_html__('Icon', 'gurus' ),
                                'pxl-btn-link' => esc_html__('Link', 'gurus'),
                                'pxl-btn-anchor' => esc_html__('Anchor', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'btn_link_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-btn-default',
                            'options' => [
                                'pxl-btn-default' => esc_html__('Default', 'gurus' ),
                                'pxl-btn-underline' => esc_html__('Underline', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_type' => 'pxl-btn-link',
                            ],
                        ),
                        array(
                            'name' => 'btn_style1',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-btn-large',
                            'options' => [
                                'pxl-btn-small' => esc_html__('Small', 'gurus' ),
                                'pxl-btn-medium' => esc_html__('Medium', 'gurus' ),
                                'pxl-btn-large' => esc_html__('Large', 'gurus' ),
                                'pxl-btn-xl' => esc_html__('XL', 'gurus' ),
                                'pxl-btn-xxl' => esc_html__('XXL', 'gurus' ),
                                '' => esc_html__('Custom', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_type!' => 'pxl-btn-link',
                            ],
                        ),
                        array(
                            'name' => 'btn_style2',
                            'label' => esc_html__('Style 1', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-btn-border',
                            'options' => [
                                'pxl-btn-border' => esc_html__('Border', 'gurus' ),
                                'pxl-btn-bg' => esc_html__('Background', 'gurus' ),
                                '' => esc_html__('Custom', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_type!' => 'pxl-btn-link',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_gradient',
                            'label' => esc_html__('Background Gradient', 'gurus'),
                            'type' => Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                            'condition' => [
                                'btn_style2' => 'pxl-btn-bg',
                                'btn_type!' => 'pxl-btn-link',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_from',
                            'label' => esc_html__('Color From', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'btn_bg_gradient!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => '--gradient-color-from: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'bg_color_to',
                            'label' => esc_html__('Color To', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'btn_bg_gradient!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => '--gradient-color-to: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_style4',
                            'label' => esc_html__('Style 2', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Rounded', 'gurus' ),
                                'pxl-btn-normal' => esc_html__('Not Rouded', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_type!' => 'pxl-btn-link',
                            ],
                        ),
                        array(
                            'name' => 'btn_style3',
                            'label' => esc_html__('Style 3', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-btn-dark',
                            'options' => [
                                'pxl-btn-dark' => esc_html__('Dark', 'gurus' ),
                                'pxl-btn-light' => esc_html__('Light', 'gurus' ),
                                '' => esc_html__('Custom', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_bg_gradient' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Text', 'gurus'),
                            'type' => Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'placeholder' => 'Ex: Learn More...',
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ], 
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'description' => 'Icon default is arrow up right',
                            'condition' => [
                                'show_icon!' => '',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Normal', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'alignment',
                            'label' => esc_html__( 'Alignment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'gurus' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'gurus' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-item--inner' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'btn_bg_gradient' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn, {{WRAPPER}} .pxl-button .btn .pxl-icon--default, 
                                {{WRAPPER}} .pxl-button .btn .pxl-icon--default:after' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'btn_filter_blur',
                            'label' => esc_html__('Blur', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});'
                            ],
                        ),
                        array(
                            'name' => 'btn_icon_size',
                            'label' => esc_html__('Icon Size', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'btn_gap',
                            'label' => esc_html__('Gap', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'gap: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
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
                                '{{WRAPPER}} .pxl-button .btn' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'btn_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn:after',
                            'condition' => [
                                'btn_style2' => 'pxl-btn-border',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_hover',
                    'label' => esc_html__('Hover', 'gurus'),
                    'tab' => Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_hover_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-hover-default',
                            'options' => [
                                'pxl-hover-default' => esc_html__('Default', 'gurus' ),
                                '' => esc_html__('Custom', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_bg_gradient' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_style_btn_gradient',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-hover-default',
                            'options' => [
                                'pxl-hover-default' => esc_html__('Default', 'gurus' ),
                                'pxl-hover-scale-text' => esc_html__('Scale Text', 'gurus' ),
                                '' => esc_html__('Custom', 'gurus' ),
                            ],
                            'condition' => [
                                'btn_bg_gradient!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'btn_bg_gradient' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};' ,
                                '{{WRAPPER}} .pxl-button .btn .pxl-icon--default:after' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_filter_blur',
                            'label' => esc_html__('Blur', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});'
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn:hover:after',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);