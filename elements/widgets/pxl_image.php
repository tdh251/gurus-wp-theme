<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image',
        'title' => esc_html__('BR Image', 'gurus' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt',
            'pxl-tweenmax',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                's_img' => 'Select Image',
                                'f_img' => 'Featured Image',
                            ],
                            'default' => 's_img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Upload', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'source_type' => ['s_img'],
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => '{{VALUE}}: 0;',
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => '{{VALUE}}: 0;',
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'dividera',
                                    'type' => \Elementor\Controls_Manager::DIVIDER,
                                ),
                                array(
                                    'name' => 'offset_x',
                                    'label' => esc_html__('Transform X', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px','%','em','rem', 'custom' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 1,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'transform: translateX({{SIZE}}{{UNIT}});',
                                    ],
                                ),
                                array(
                                    'name' => 'translate',
                                    'label' => esc_html__('Translate', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => 'Ex: -50%, -50%',
                                    'control_type' => 'responsive',
                                    'description' => 'Enter value with syntax: (size_x)(unit_x), (size_y)(unit_y).',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-image-single .pxl-item--inner {{CURRENT_ITEM}}' => 'transform: translate({{VALUE}});',
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
                                    'description' => 'Enter number. Default 0ms',
                                ),
                            ),
                        ),
                    ),
                ),


                array(
                    'name' => 'tab_content_overlay',
                    'label' => esc_html__('Overlay', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'overlay',
                            'label' => esc_html__('Overlay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Overlay Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-overlay-color' => 'background-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'overlay!' => ''
                            ]
                        ),
                        array(
                            'name' => 'overlay_z_index',
                            'label' => esc_html__('Overlay Z Index', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-overlay-color' => 'z-index: {{VALUE}};'
                            ],
                            'condition' => [
                                'overlay!' => ''
                            ]
                        ),
        
        
                        array(
                            'name' => 'linear_gradient',
                            'label' => esc_html__('Gradient', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'bg_linear_gradient',
                            'label' => esc_html__('Group Background', 'gurus'),
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => ['gradient'],
                            'selector' => '{{WRAPPER}} .pxl-image-single .pxl-bg-gradient',
                            'condition' => [
                                'linear_gradient!' => ''
                            ]
                        ),
                        array(
                            'name' => 'linear_gradient_z_index',
                            'label' => esc_html__('Overlay Z Index', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-overlay-color' => 'z-index: {{VALUE}};'
                            ],
                            'condition' => [
                                'linear_gradient!' => ''
                            ]
                        ),
                    ),
                ),

                
                array(
                    'name' => 'tab_style_img',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'image_align',
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
                                '{{WRAPPER}} .pxl-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_revert',
                            'label' => esc_html__('Revert', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                '' => esc_html('None', 'gurus'),
                                'scaleX' => esc_html__('X', 'gurus' ),
                                'scaleY' => esc_html__('Y', 'gurus' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'transform: {{VALUE}}(-1);',
                            ],
                        ),
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'auto' => [
                                    'title' => esc_html__( 'Auto', 'gurus' ),
                                    'icon' => 'eicon-justify-space-around-h',
                                ],
                                '100%' => [
                                    'title' => esc_html__( 'Full', 'gurus' ),
                                    'icon' => 'eicon-grow',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'width: {{VALUE}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'filter_img',
                            'label' => esc_html__('Filter Image', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-single .pxl-item--image img' 
                        ),
                        array(
                            'name'         => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'gurus' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-image-single img'
                        ),
                        array(
                            'name' => 'opacity',
                            'label' => esc_html__('Opacity', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%' ],
                            'description' => esc_html__('Min: 0% and max: 100%', 'gurus'), 
                            'default'    => [
                                'unit' => '%'
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'opacity: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_max_width',
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
                                '{{WRAPPER}} .pxl-image-single img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__('Max Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
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
                                '{{WRAPPER}} .pxl-image-single img' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'unit' => ['px', '%'],  
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--bg, {{WRAPPER}} .pxl-image-single img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border',
                            'label' => esc_html__( 'Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-single img',
                        ),

                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img, {{WRAPPER}} .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_display',
                            'label' => esc_html__('Hide on Screen <= 1400px', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_effect',
                    'label' => esc_html__('Effect', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'img_effect',
                            'label' => esc_html__('Image Effect', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'pxl-image-effect1' => 'Zigzag',
                                'pxl-image-tilt' => 'Tilt',
                                'pxl-image-spin' => 'Spin',
                                'pxl-image-zoom' => 'Zoom 1',
                                'pxl-image-zoom2' => 'Zoom 2',
                                'pxl-image-bounce' => 'Bounce',
                                'slide-up-down' => 'Slide Up Down',
                                'slide-in-tr'    => 'Slide Top Right To Bottom Left' ,
                                'slide-in-bl'   => 'Slide Bottom Left To Top Right',
                                'slide-top-to-bottom' => 'Slide Top To Bottom ',
                                'pxl-image-effect2' => 'Slide Bottom To Top ',
                                'slide-right-to-left' => 'Slide Right To Left ',
                                'slide-left-to-right' => 'Slide Left To Right ',
                                'pxl-hover1' => 'ZoomIn',
                                'pxl-hover2' => 'ZoomOut',
                                'pxl-animation-round' => 'Round',
                                'pxl-parallax-hover' => 'Parallax Hover',
                                'pxl-parallax-scroll' => 'Parallax Scroll',
                                'pxl-parallax-background' => 'Parallax Background'
                            ],
                            'default' => '',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'parallax_scroll_type',
                            'label' => esc_html__('Parallax Scroll Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'y' => 'Effect Y',
                                'x' => 'Effect X',
                                'z' => 'Effect Z',
                            ],
                            'default' => 'y',
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),
                        array(
                            'name' => 'parallax_scroll_value_x',
                            'label' => esc_html__('Parallax Value', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                            'default' => '80',
                        ),
                        array(
                            'name' => 'top',
                            'label' => esc_html__('Top', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%', 'px' ],
                            'default'    => [
                                'unit' => 'px'
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--image img' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),
                        array(
                            'name' => 'right',
                            'label' => esc_html__('Right', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%', 'px' ],
                            'default'    => [
                                'unit' => 'px'
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--image img' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),
                        array(
                            'name' => 'bottom',
                            'label' => esc_html__('Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%', 'px' ],
                            'default'    => [
                                'unit' => 'px'
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--image img' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),
                        array(
                            'name' => 'left',
                            'label' => esc_html__('Left', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%', 'px' ],
                            'default'    => [
                                'unit' => 'px'
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-item--image img' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),

                        array(
                            'name' => 'parallax_value',
                            'label' => esc_html__('Parallax Value', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-parallax-hover',
                            ],
                            'default' => '40',
                        ),
                        array(
                            'name' => 'max_tilt',
                            'label' => esc_html__('Max Tilt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '10',
                        ),
                        array(
                            'name' => 'speed_tilt',
                            'label' => esc_html__('Speed Tilt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '400',
                        ),
                        array(
                            'name' => 'perspective_tilt',
                            'label' => esc_html__('Perspective Tilt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '1000',
                        ),
                        array(
                            'name' => 'speed_effect',
                            'label' => esc_html__('Speed', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single, {{WRAPPER}} .pxl-image-single img' => 'animation-duration: {{SIZE}}ms;',
                            ],
                            'condition' => [
                                'img_effect!' => ['pxl-image-tilt','pxl-hover1','pxl-parallax-scroll'],
                            ],
                            'description' => 'Enter number, unit is ms.',
                        ),
                        array(
                            'name' => 'hide_parallax_sm',
                            'label' => esc_html__('Disable Parallax on Mobile <= 767px', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'img_effect' => ['pxl-parallax-scroll'],
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