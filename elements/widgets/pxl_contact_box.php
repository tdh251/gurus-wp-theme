<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_box',
        'title' => esc_html__('BR Contact Box', 'gurus' ),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-parallax-move-mouse',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'gurus' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_contact_box/layout-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_contact_box/layout-1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'address',
                            'label' => esc_html__('Addess', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'row' => 3,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'map',
                            'label' => esc_html__('Image', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'l_normal', 
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'theme',
                            'label' => esc_html__('Dark/Light', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Dark', 'gurus'),
                            'label_off' => esc_html__('Light', 'gurus'),
                            'default' => '',
                            'condition' => [
                                'style' => 'contact-box-default',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'contact-box-default',
                            'options' => [
                                'contact-box-default' => esc_html__('Default', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'effect',
                            'label' => esc_html__('Effect', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('None', 'gurus'),
                                'pxl-parallax-hover' => esc_html__('Hover Parallax', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'parllax_value',
                            'label' => esc_html__('Parllax Value', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 45,
                            'condition' => [
                                'effect' => 'pxl-parallax-hover',
                            ],
                        ),
                        array(
                            'name' => 'content_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--content' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_border-radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{WRAPPER}} .pxl-contact-box .pxl-item--content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'gurus' ),
                                    'icon' => 'eicon-shrink',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'gurus' ),
                                    'icon' => 'eicon-grow',
                                ],
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
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
                            'condition' => [
                                'layout' => '1',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--container' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'l_hover', 
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'hover_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'hover-default',
                            'options' => [
                                'hover-default' => esc_html__('Default', 'gurus'),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_normal', 
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-box .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_top_spacer',
                            'label' => esc_html__('Top Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_bottom_spacer',
                            'label' => esc_html__('Bottom Spacer', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_hover', 
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'desc_normal', 
                            'label' => esc_html__( 'NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-box .pxl-item--desc',
                        ),
                        array(
                            'name' => 'max_width_desc',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--desc' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'desc_hover', 
                            'label' => esc_html__( 'HOVER', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_address',
                    'label' => esc_html__('Address', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '2'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'address_normal', 
                            'label' => esc_html__( 'NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'address_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--address' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'address_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-contact-box .pxl-item--address',
                        ),
                        array(
                            'name' => 'address_alignment',
                            'label' => esc_html__('Alignment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'label' => esc_html__('Default', 'gurus'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'label' => esc_html__('Center', 'gurus'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'label' => esc_html__('Right', 'gurus'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'label' => esc_html__('Justify', 'gurus'),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--address' => 'text-align: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'max_width_address',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--address' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'address_hover', 
                            'label' => esc_html__( 'HOVER', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'icon_normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_icon', 
                            'label' => esc_html__( 'Box Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_min_width',
                            'label' => esc_html__('Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
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
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border',
                            'label' => esc_html__( 'Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' =>  '{{WRAPPER}} .pxl-contact-box .pxl-item--icon',
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-box .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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