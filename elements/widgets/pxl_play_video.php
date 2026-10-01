<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_play_video',
        'title' => esc_html__('BR Play Video', 'gurus' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt',
            'rellax'
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_video_player/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_video_player/layout2.jpg'
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
                            'name' => 'video_link',
                            'label' => esc_html__('Link', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0'
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Upload', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Button Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(    
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--inner' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-play-video .pxl-item--inner',
                        ),
                        array(
                            'name' => 'bg_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_overlay',
                    'label' => esc_html__('Overlay', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'overlay_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'overlay',
                            'label' => esc_html__('Show/Hide', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Background', 'gurus'),
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'condition' => [
                                'overlay!' => '',
                            ],
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-play-video .pxl-item--overlay',
                        ),
                        array(
                            'name' => 'overlay_filters',
                            'label' => esc_html__('Filters', 'gurus'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'condition' => [
                                'overlay!' => '',
                            ],
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-play-video .pxl-item--overlay',
                        ),
                        array(
                            'name' => 'overlay_normal_s',
                            'label' => esc_html__('SIZE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'shape_w',
                            'label' => esc_html__('Width', 'solarva'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'shape_h',
                            'label' => esc_html__('Height', 'solarva'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'shape_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'overlay_normal_',
                            'label' => esc_html__('POSITION', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(                            
                            'name' => 'shape_h_orientation',
                            'label' => esc_html__('Horizontal Orientation', 'solarva'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'label' => esc_html__('Left', 'solarva'), 
                                    'icon' => 'eicon-h-align-left'
                                ],
                                'right' => [
                                    'label' => esc_html__('Right', 'solarva'), 
                                    'icon' => 'eicon-h-align-right'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_left',
                            'label' => esc_html__('Left', 'solarva' ),
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
                                'shape_h_orientation' => 'left',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'left: {{SIZE}}{{UNIT}};right: auto;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_right',
                            'label' => esc_html__('Right', 'solarva' ),
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
                                'shape_h_orientation' => 'right',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                            ],
                        ),
                        array(                            
                            'name' => 'shape_v_orientation',
                            'label' => esc_html__('Vertical Orientation', 'solarva'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'top' => [
                                    'label' => esc_html__('Top', 'solarva'), 
                                    'icon' => 'eicon-v-align-top'
                                ],
                                'bottom' => [
                                    'label' => esc_html__('Bottom', 'solarva'), 
                                    'icon' => 'eicon-v-align-bottom'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_top',
                            'label' => esc_html__('Top', 'solarva' ),
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
                                'shape_v_orientation' => 'top',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
                            ],
                        ),
                        array(
                            'name' => 'shape_offset_bottom',
                            'label' => esc_html__('Bottom', 'solarva' ),
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
                                'shape_v_orientation' => 'bottom',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--overlay' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl-btn-default' => esc_html__('Default', 'gurus')
                            ],
                            'default' => 'pxl-btn-default',
                        ),
                        array(
                            'name' => 'btn_blur',
                            'label' => esc_html__('Blur', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'backdrop-filter: blur({{VALUE}}px);',
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play svg path' => 'fill: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-play-video .pxl-btn-play',
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'btn_size',
                            'label' => esc_html__('SIZE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_font_size',
                            'label' => esc_html__('Font Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-btn-play' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'btn_positon',
                            'label' => esc_html__('POSITION', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(                            
                            'name' => 'h_orientation',
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'offset_left',
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => 'left: {{SIZE}}{{UNIT}};right: auto;',
                            ],
                        ),
                        array(
                            'name' => 'offset_right',
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                            ],
                        ),
                        array(                            
                            'name' => 'v_orientation',
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => '{{VALUE}}: 0;',
                            ],
                        ),
                        array(
                            'name' => 'offset_top',
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
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
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
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'condition' => [
                                'v_orientation' => 'bottom',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                            ],
                        ),
                        array(
                            'name' => 'translate',
                            'label' => esc_html__('Translate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: -50%, -50%',
                            'control_type' => 'responsive',
                            'description' => 'Enter value with syntax: (size_x)(unit_x), (size_y)(unit_y). Default -50%, -50%',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-play-video .pxl-item--btn' => 'transform: translate({{VALUE}});',
                            ],
                        ),
                        array(
                            'name' => 'divider3',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);