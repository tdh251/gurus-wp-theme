<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider2',
        'title' => esc_html__('BR Slider II', 'gurus'),
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
                        // layout 2 content
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
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Icon Link', 'gurus'),
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
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_box',
                    'label' => esc_html__('Boxs', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'boxs',
                            'label' => esc_html__('Box', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'box_title' ,
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => 3,
                                ),
                                array(
                                    'name' => 'box_desc' ,
                                    'label' => esc_html__('Description', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 2,
                                    
                                ),
                                array(
                                    'name' => 'box_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'show_in',
                                    'label' => esc_html__('Show In Slide', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'default' => 1,
                                    'description' => 'Default displayed in slide 1. The value 0 will be displayed in all slides', 
                                ),
                            ),
                            'title_field' => '{{{ box_title }}}',
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
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                    )
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
                        array(
                            'name' => 'title_divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                            'separator' => 'before',
                        ),

                        array(
                            'name' => 'title_highlight_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('HIGHLIGHT', 'gurus'),
                            'separator' => 'after',
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
                        )
                    )
                ),





                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'box_option',
                            'type' => Elementor\Controls_Manager::HEADING,
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--boxs .pxl-item--box' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--boxs .pxl-item--box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_filter_blur',
                            'label' => esc_html__('Blur', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--boxs .pxl-item--box' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                            ],
                        ),
                        array(
                            'name' => 'box_max_width',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-item--boxs .pxl-item--box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),

            ),
        ),
    ),
    gurus_get_class_widget_path()
);