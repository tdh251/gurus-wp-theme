<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('BR Testimonial Carousel', 'gurus'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                    'label' => esc_html__('Layout 1', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style' ,
                            'label'=> esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ' ' => esc_html__('Default', 'gurus') ,
                                'box-color--light' => esc_html__('Box Color Light', 'gurus'),
                                'box-color-off-white' => esc_html__('Box Color Dark', 'gurus')
                            ],
                            'default' => ' ',
                            'condition' => [
                                'layout' => '1',
                            ]
                        ),
                        array(
                            'name' => 'l_style' ,
                            'label'=> esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'box-color-on-top' => esc_html__('Default', 'gurus') ,
                                'box-color--gradient' => esc_html__('Box Color Gradient', 'gurus'),
                                'box-color--dark' => esc_html__('Box Color Dark', 'gurus'),
                            ],
                            'default' => 'box-color-on-top',
                            'condition' => [
                                'layout' => '2',
                            ]
                        ),
                        array(
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'avatar',
                                    'label' => esc_html__('Avatar', 'gurus'), 
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'icon_type',
                                    'label' => esc_html__('Icon Type', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'icon' => 'Icon',
                                        'image' => 'Image',
                                    ],
                                    'default' => 'icon',
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'icon_type' => 'image',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_box_top_color',
                            'label' => esc_html__('Box Top Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-content--top' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_type',
                            'label' => esc_html__( 'Border Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'gurus' ),
                                'solid' => esc_html__( 'Solid', 'gurus' ),
                                'double' => esc_html__( 'Double', 'gurus' ),
                                'dotted' => esc_html__( 'Dotted', 'gurus' ),
                                'dashed' => esc_html__( 'Dashed', 'gurus' ),
                                'groove' => esc_html__( 'Groove', 'gurus' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_width',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'box_border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'box_border_color',
                            'label' => esc_html__( 'Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),


                array(
                    'name' => 'section_style_avatar',
                    'label' => esc_html__('Avatar', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'avatar_w',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--avatar img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'avatar_h',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--avatar img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'avt_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--avatar img',
                        ),
                        array(
                            'name' => 'avt_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--avatar img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                // 
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_position',
                    'label' => esc_html__('Position', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc',
                        ),
                        array(
                            'name' => 'desc_max_w',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_bg_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border',
                            'label' => esc_html__( 'Icon Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selectors' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item--icon',
                        ),
                        array(
                            'name' => 'iconbox_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                // General Active 
                array(
                    'name' => 'section_style_active',
                    'label' => esc_html__('Active', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color_active',
                            'label' => esc_html__('Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_color_active',
                            'label' => esc_html__('Position Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_color_active',
                            'label' => esc_html__('Desc Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),

                        // icon Active
                        array(
                            'name' => 'icon_color_active',
                            'label' => esc_html__('Icon Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size_active',
                            'label' => esc_html__('Icon Font Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_bg_color_active',
                            'label' => esc_html__('IconBox Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border_type_active',
                            'label' => esc_html__( 'Icon Border Type', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selectors' => '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--icon',
                        ),


                        array(
                            'name' => 'iconbox_border_radius_active',
                            'label' => esc_html__('Icon Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        // Box

                        array(
                            'name' => 'box_bg_color_active',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'box_border_type_active',
                            'label' => esc_html__( 'Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selectors' => '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--inner',
                        ),

                        array(
                            'name' => 'box_border_radius_active',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .swiper-slide-active .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                // General Hover 
                array(
                    'name' => 'section_style_hover',
                    'label' => esc_html__('Hover', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_box_top_color_hover',
                            'label' => esc_html__('Box Top Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-content--top' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hover',
                            'label' => esc_html__('Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_color_hover',
                            'label' => esc_html__('Position Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_color_hover',
                            'label' => esc_html__('Desc Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),

                        // icon Active
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size_hover',
                            'label' => esc_html__('Icon Font Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_bg_color_hover',
                            'label' => esc_html__('IconBox Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        // Box
                        array(
                            'name' => 'box_bg_color_hover',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_type_hover',
                            'label' => esc_html__( 'Border Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'gurus' ),
                                'solid' => esc_html__( 'Solid', 'gurus' ),
                                'double' => esc_html__( 'Double', 'gurus' ),
                                'dotted' => esc_html__( 'Dotted', 'gurus' ),
                                'dashed' => esc_html__( 'Dashed', 'gurus' ),
                                'groove' => esc_html__( 'Groove', 'gurus' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_width_hover',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'box_border_type_hover!' => '',
                            ],
                        ),
                        array(
                            'name' => 'box_border_color_hover',
                            'label' => esc_html__( 'Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'box_border_type_hover!' => '',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius_hover',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                // Settings Carousel
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15px',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide' => 'padding:0 {{SIZE}}px;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin:0 -{{SIZE}}px;',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'arrows_color',
                            'label' => esc_html__('Arrow Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [ 
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow' => 'color: {{VALUE}};'
                                ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination!' => ''
                            ]
                        ),
                        array(
                            'name' => 'show_divider_pagination',
                            'label' => esc_html__('Show Divider', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                            'condition' => [
                                'pagination!' => '',
                                'pagination_type' => 'bullets',
                            ],
                        ),
                        array(
                            'name' => 'pagination_style',
                            'label' => esc_html__('Pagination Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Dot Blue Color', 'gurus'),
                                'style2' => esc_html__('Dot White Color', 'gurus'),
                                'style3' => esc_html__('Dot Gray Color', 'gurus'),
                                'style4' => esc_html__('Divider Black Color', 'gurus'),
                                'style5' => esc_html__('Dot Dark Color', 'gurus'),
                            ],
                            'condition' => [
                                'pagination!' => '',
                                'pagination_type' => 'bullets',
                            ]
                        ),
                        array(
                            'name' => 'pagination_spacing_top',
                            'label' => esc_html__('Pagination Spacing Top', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots-wrap ' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'pagination_bg_color',
                            'label' => esc_html__('Pagination Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots-wrap .pxl-swiper-dots' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'pagination_divider_color',
                            'label' => esc_html__('Pagination Divider Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots-wrap .pxl-swiper-dots:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay!' => ''
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'center_slide',
                            'label' => esc_html__('Center', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);