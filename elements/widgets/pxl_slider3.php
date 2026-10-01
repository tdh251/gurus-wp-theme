<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider3',
        'title' => esc_html__('BR Slider III', 'gurus'),
        'icon' => 'eicon-post-slider',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'bg_content',
                            'label' => esc_html__( 'Background Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Slide', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'bg_slide',
                                    'label' => esc_html__( 'Background Slide', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title' ,
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'subtitle' ,
                                    'label' => esc_html__('Sub Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                 ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Desc', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'button_text' ,
                                    'label' => esc_html__('Button Text', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'button_link' ,
                                    'label' => esc_html__('Button Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    )
                ),
                array(
                    'name' => 'section_content_contact',
                    'label' => esc_html__('Contact', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'box_title' ,
                            'label' => esc_html__('Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'box_tel' ,
                            'label' => esc_html__('Telephone', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'box_link' ,
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
                    )
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Options', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'opt_arrows',
                            'label' => esc_html__('Arrows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'arrow_style',
                            'label' => esc_html__('Arrow Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-default',
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                            ],
                            'condition' => [
                                'opt_arrows!' => '',
                            ],
                        ),
                        array(
                            'name' => 'opt_pagination',
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
                                'opt_pagination!' => ''
                            ]
                        ),
                        array(
                            'name' => 'show_divider_pagination',
                            'label' => esc_html__('Show Divider', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                            'condition' => [
                                'opt_pagination!' => '',
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
                                'opt_pagination!' => '',
                                'pagination_type' => 'bullets',
                            ]
                        ),
                        array(
                            'name' => 'opt_loop',
                            'label' => esc_html__('Loop', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        
                        array(
                            'name' => 'opt_auto_play',
                            'label' => esc_html__('Auto Play', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'delay' ,
                            'label' => esc_html__('Delay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'opt_auto_play!' => ''
                            ]
                        ),
                        array(
                            'name' => 'disable_on_interaction',
                            'label' => esc_html__('Disable On Interaction', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'opt_auto_play!' => ''
                            ]
                        ),
                        array(
                            'name' => 'opt_effect' ,
                            'label' => esc_html__('Effect', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'fade' ,
                            'options' => [
                                'slide' => esc_html__('Slide', 'gurus'),
                                'fade' => esc_html__('Fade', 'gurus'),
                                'cube' => esc_html__('Cube', 'gurus'),
                                'coverflow' => esc_html__('Coverflow', 'gurus'),
                                'flip' => esc_html__('Flip', 'gurus'),
                                'cards' => esc_html__('Cards', 'gurus'),
                                'creative' => esc_html__('Creative', 'gurus'),
                            ]
                        ),
                        array(
                            'name' => 'opt_speed' ,
                            'label' => esc_html__('Speed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                        ),
                        array(
                            'name' => 'opt_allow_touch_move' ,
                            'label' => esc_html__('Allow Touch Move', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'title_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--title',
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_subtitle',
                    'label' => esc_html__('Subtitle', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => '_divider',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'subtitle_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--subtitle' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--subtitle',
                        ),
                        array(
                            'name' => 'subtitle_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'subtitle_divider_option',
                            'label' => esc_html__('DIVIDER', 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'subtitle_divider_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--subtitle:before' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_divider_width',
                            'label' => esc_html__( 'Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 2000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--subtitle:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'desc_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--desc' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--desc',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'btn_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn:hover' => 'outline-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--btn',
                        ),
                        array(
                            'name' => 'btn_icon_size',
                            'label' => esc_html__('Icon Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Icon Box', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'box_title_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('TITLE', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_title_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--title' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'box_title_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-box--title',
                        ),
                        array(
                            'name' => 'box_subtitle_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_subtitle_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('SUBTITLE', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_subtitle_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--subtitle' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'box_subtitle_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-box--subtitle',
                        ),
                        array(
                            'name' => 'box_icon_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_icon_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('ICON', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_icon_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--icon' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_divider1',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_icon_option1',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('BOX ICON', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_icon_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--icon' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--icon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-box--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_border',
                            'label' => esc_html__('Border', 'gurus'),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-box--icon',
                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);