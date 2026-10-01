<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_marquee',
        'title' => esc_html__('BR Text Marquee', 'gurus' ),
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
                            'name' => 'stroke',
                            'label' => esc_html__('Stroke', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('On', 'gurus'),
                            'label_off' => esc_html__('Off', 'gurus'),
                            'default' => '',
                        ),
                        array(
                            'name' => 'gradient',
                            'label' => esc_html__('Linear Gradient', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('On', 'gurus'),
                            'label_off' => esc_html__('Off', 'gurus'),
                            'default' => '',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''  => esc_html__('Default', 'gurus'),
                                'text-on-bg' => esc_html__('Text On Background', 'gurus'),
                                'round-box-border' => esc_html__('Round Box Border', 'gurus'),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'l_style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''  => esc_html__('Default', 'gurus'),
                                'text-custom'      => esc_html__('Custom', 'gurus'),
                                'text-dark' => esc_html__('Text Color', 'gurus'),
                                'text-stroke' => esc_html__('Text Stroke', 'gurus'),
                                'text-gradient' => esc_html__('Text Gradient', 'gurus'),
                                'text-gradient1' => esc_html__('Text Gradient Dark', 'gurus'),
                                'text-stroke-gradient' => esc_html__('Text Stroke Gradient', 'gurus')
                            ],
                            'default' => 'text-custom',
                        ),

                        array(
                            'name' => 'saperator',
                            'label' => esc_html__('Saperator', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''  => esc_html__('Space', 'gurus'),
                                'dot' => esc_html__('Dot', 'gurus'),
                            ],
                            'default' => '',
                        ),
                        // List
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Content', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
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
                            'name' => 'opt_gap',
                            'label' => esc_html__('Gap', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'opt_duplicated' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'opt_duration',
                            'label' => esc_html__('Duration', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
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
                            'name' => 'normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee,{{WRAPPER}} .pxl-text-marquee .pxl-item' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Backgroun Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-marquee .pxl-marquee-inner .pxl-item',
                        ),
                        array(
                            'name' => 'divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'spacing_option',
                            'label' => esc_html__('SPACING', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'padding_l',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-marquee-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'margin_l',
                            'label' => esc_html__('Margin', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-marquee-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Text', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text, {{WRAPPER}} .pxl-text-marquee .pxl-item--saperator' => 'color: {{VALUE}};',
                                 
                            ],
                        ),
                        array(
                            'name' => 'text_stroke_color',
                            'label' => esc_html__('Stroke Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text' => '-webkit-text-stroke-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_stroke_width',
                            'label' => esc_html__('Stroke Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text' => 'stroke-width: {{SIZE}}{{UNIT}}; -webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-marquee .pxl-item--text, {{WRAPPER}} .pxl-text-marquee .pxl-item--saperator',
                        ),
                        array(
                            'name' => 'is_text_color_gradient',
                            'label' => esc_html__( 'Is Text Gradient Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'bg_color_gradient_from',
                            'label' => esc_html__( 'Gradient - Color From', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text, 
                                {{WRAPPER}} .pxl-text-marquee.text-custom .pxl-item--text' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'is_text_color_gradient!' => 'false',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_gradient_to',
                            'label' => esc_html__( 'Gradient - Color To', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text, 
                                {{WRAPPER}} .pxl-text-marquee.text-custom .pxl-item--text' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'is_text_color_gradient!' => 'false',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--icon i,
                                {{WRAPPER}} .pxl-text-marquee .pxl-item--icon svg' => 'color: {{VALUE}}; fill: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_stroke_width',
                            'label' => esc_html__('Stroke Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--icon svg path' => 'stroke-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_stroke_color',
                            'label' => esc_html__('Stroke Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--icon svg path' => 'stroke: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Box Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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