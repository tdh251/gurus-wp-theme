<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider1',
        'title' => esc_html__('BR Slider I', 'gurus'),
        'icon' => 'eicon-slider-device',
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
                            'name' => 'items',
                            'label' => esc_html__('Slide', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'background',
                                    'label' => esc_html__( 'Background Slide', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title' ,
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'subtitle' ,
                                    'label' => esc_html__('Sub Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                 ),
                                array(
                                    'name' => 'quote' ,
                                    'label' => esc_html__('Quote', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Icon Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
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
                            'label' => esc_html__('Paginations', 'gurus'),
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
                                'opt_pagination!' => '',
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
                            'default' => 'slide' ,
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
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( ),
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
                        array(
                            'name' => 'title_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'title_highlight_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('HIGHLIGHT', 'gurus'),
                        ),
                        array(
                            'name' => 'title_highlight_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'title_highlight_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'title_divider1',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'shape_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('SHAPE', 'gurus'),
                        ),
                        array(
                            'name' => 'title_shape_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'title_shape_width',
                            'label' => esc_html__( 'Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_shape_height',
                            'label' => esc_html__( 'Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after', 
                        ),

                        array(                            
                            'name' => 'shape_h_orientation',
                            'label' => esc_html__('Horizontal Orientation', 'gurus'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'label' => esc_html__('Left', 'gurus'), 
                                    'icon' => 'eicon-h-align-left'
                                ],
                                'right' => [
                                    'label' => esc_html__('Right', 'gurus'), 
                                    'icon' => 'eicon-h-align-right'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_left',
                            'label' => esc_html__('Left', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'condition' => [
                                'h_orientation' => 'left',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'left: {{SIZE}}{{UNIT}};right: auto;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_right',
                            'label' => esc_html__('Right', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'condition' => [
                                'h_orientation' => 'right',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                            ],
                        ),
                        array(                            
                            'name' => 'shape_v_orientation',
                            'label' => esc_html__('Vertical Orientation', 'gurus'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'top' => [
                                    'label' => esc_html__('Top', 'gurus'), 
                                    'icon' => 'eicon-v-align-top'
                                ],
                                'bottom' => [
                                    'label' => esc_html__('Bottom', 'gurus'), 
                                    'icon' => 'eicon-v-align-bottom'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_top',
                            'label' => esc_html__('Top', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'condition' => [
                                'v_orientation' => 'top',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_bottom',
                            'label' => esc_html__('Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'condition' => [
                                'v_orientation' => 'bottom',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                            ],
                        ),
                        array(
                            'name' => 'title_shape_translate',
                            'label' => esc_html__('Translate', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: -50%, -50%',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--title .pxl-title--highlight:after' => 'transform: translate({{VALUE}});',
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_subtitle',
                    'label' => esc_html__('Subtitle', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
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
                    )
                ),


                array(
                    'name' => 'section_style_quote',
                    'label' => esc_html__('Quote', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'quote_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'quote_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--quote' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'quote_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--quote',
                        ),
                        array(
                            'name' => 'quote_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'quote_highlight_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('HIGHLIGHT', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'quote_highlight_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--quote .pxl-title--highlight' => 'color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'quote_highlight_typography',
                            'label' => esc_html__('Typography', 'gurus'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--quote .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'quote_divider2',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'quote_dividers_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('DIVIDER', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'divider_quote_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--quote:after' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'divider_quote_width',
                            'label' => esc_html__( 'Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--quote:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),

            ),
        ),
    ),
    gurus_get_class_widget_path()
);