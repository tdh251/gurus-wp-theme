<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_video_player',
        'title' => esc_html__('BR Video Button', 'gurus' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt'
        ),
        'params' => array(
            'sections' => array(
                // Layout
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_video_player/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_video_player/layout2.jpg'
                                ]
                            ],
                        ),
                    ),
                ),

                // Content
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'l_style',
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'video-style1' => esc_html__('BG Overlay 1', 'gurus'),
                                'video-style2' => esc_html__('BG Overlay 2', 'gurus')
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => esc_html__('Image', 'gurus'),
                                'bg' => esc_html__('Background', 'gurus'),
                            ],
                            'default' => 'img',
                            'condition' => [
                                'layout' => '1'
                            ]
                        ),
                        array(
                            'name' => 'bg_fixed',
                            'label' => esc_html__('BG Fixed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                            'condition' => [
                                'image_type' => 'bg'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--inner .pxl-video--bg .pxl-bg-image' => 'background-attachment: fixed;'
                            ]
                        ),
                        array(
                            'name' => 'video_title',
                            'label' => esc_html__('Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'video_name',
                            'label' => esc_html__('Video Name', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Link', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0'
                        ),
                        array(
                            'name' => 'video_icon',
                            'label' => esc_html__('Video Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),



                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--inner .pxl-video--bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'image_min_height',
                            'label' => esc_html__('Min Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--inner img' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),

                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),


                        array(
                            'name' => 'alignment',
                              'label' => esc_html__( 'Alignment', 'gurus' ),
                              'type' => \Elementor\Controls_Manager::CHOOSE,
                              'control_type' => 'responsive',
                              'options' => [
                                  'start' => [
                                      'title' => esc_html__( 'Left', 'gurus' ),
                                      'icon' => 'eicon-justify-start-h',
                                  ],
                                  'center' => [
                                      'title' => esc_html__( 'Center', 'gurus' ),
                                      'icon' => 'eicon-justify-center-h',
                                  ],
                                  'end' => [
                                      'title' => esc_html__( 'Right', 'gurus' ),
                                      'icon' => 'eicon-justify-end-h',
                                  ],
                              ],
                              'selectors' => [
                                  '{{WRAPPER}} .pxl-video-player' => 'justify-content: {{VALUE}};',
                              ],
                        ),

                        array(
                            'name'         => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'gurus' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-video-player .pxl-video--bg'
                        ),
                        array(
                            'name' => 'overlay', 
                            'label' => esc_html__('Overlay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false'
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__( 'Overlay Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-bg--overlay' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_video_style',
                            'label' => esc_html__('Button Video Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'BG White',
                                'style2' => 'Border',
                                'style3' => 'Border2'
                            ],
                            'default' => 'style1',
                        ),

                        array(
                            'name' => 'img_border_radius',
                            'label' => esc_html__('Image Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--bg, {{WRAPPER}} .pxl-video-player .pxl-video--bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '2'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-video--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-video--title',
                        ),
                        array(
                            'name' => 'title_max_w',
                            'label' => esc_html__('Max Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-video--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),


                array(
                    'name' => 'section_style_name',
                    'label' => esc_html__('Video Name', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '2'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'name_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-video--name a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'name_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-video--name',
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Text', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '2'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-btn--text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-video-player .pxl-video--holder .pxl-btn--text',
                        ),
                    )
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);