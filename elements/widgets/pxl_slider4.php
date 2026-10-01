<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider4',
        'title' => esc_html__('BR Slider IV', 'gurus'),
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
                    'label' => esc_html__('Slider', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'logo',
                            'label' => esc_html__( 'Logo', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Slide', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__( 'CONTENT', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'saperator' => 'after',
                                ),
                                array(
                                    'name' => 'background',
                                    'label' => esc_html__( 'Background Slide', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title' ,
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 2,
                                ),
                                array(
                                    'name' => 'subtitle' ,
                                    'label' => esc_html__('Sub Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                 ),
                                 array(
                                    'name' => 'button_content',
                                    'label' => esc_html__( 'BUTTON', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::HEADING,
                                    'saperator' => 'after',
                                ),
                                 array(
                                    'name' => 'btn_text' ,
                                    'label' => esc_html__('Button Text', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                 ),
                                 array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Button Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),

                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    )
                ),
                array(
                    'name' => 'section_content_social',
                    'label' => esc_html__('Socials', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'socials',
                            'label' => esc_html__('Social', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                 array(
                                    'name' => 'social_link',
                                    'label' => esc_html__('Icon Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social_icon',
                                    'label' => esc_html__('Icon', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                        ),
                    )
                ),
                array(
                    'name' => 'section_content_layer',
                    'label' => esc_html__('Layers', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layers',
                            'label' => esc_html__('Layers', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'icon_type',
                                    'label' => esc_html__('Icon Type', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'icon' => esc_html__('Icon', 'gurus'),
                                        'image' => esc_html__('Image', 'gurus'),
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
                                array(                            
                                    'name' => 'h_orientation',
                                    'label' => esc_html__('Horizontal Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'control_type' => 'responsive',
                                    'default' => 'left', 
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
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_left',
                                    'label' => esc_html__('Left', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
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
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_right',
                                    'label' => esc_html__('Right', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
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
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(                            
                                    'name' => 'v_orientation',
                                    'label' => esc_html__('Vertical Orientation', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::CHOOSE,
                                    'default' => 'top', 
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
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => '{{VALUE}}: 0;',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_top',
                                    'label' => esc_html__('Top', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'control_type' => 'responsive',
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
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'offset_bottom',
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
                                    'condition' => [
                                        'v_orientation' => 'bottom',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'dividera',
                                    'type' => \Elementor\Controls_Manager::DIVIDER,
                                ),
                                array(
                                    'name' => 'translate',
                                    'label' => esc_html__('Translate', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => 'Ex: -50%, -50%',
                                    'control_type' => 'responsive',
                                    'description' => 'Enter value with syntax: (size_x)(unit_x), (size_y)(unit_y).',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .pxl-item--content {{CURRENT_ITEM}}' => 'transform: translate({{VALUE}});',
                                    ],
                                ),
                                array(
                                    'name' => 'layer_animate',
                                    'label' => esc_html__('Animate', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => gurus_widget_animate_v2(),
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'layer_animate_delay',
                                    'label' => esc_html__('Delay', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '0',
                                ),
                            ),
                        ),
                    ),
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
                            'name' => 'opt_pagination',
                            'label' => esc_html__('Paginations', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'show_pagination_index',
                            'label' => esc_html__('Show Index', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
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
                            'default' => '',
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

            ),
        ),
    ),
    gurus_get_class_widget_path()
);