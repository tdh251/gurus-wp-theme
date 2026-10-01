<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('BR Team Carousel', 'gurus'),
        'icon' => 'eicon-lock-user',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_carousel/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'l_style', 
                            'label' => esc_html__('Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__(' Default', 'gurus'), 
                                'pxl-wavy-style' => esc_html__('Wavy', 'gurus'), 
                                'style-1' => esc_html__('Style 1', 'gurus'),
                                'style-2' => esc_html__('Style 2', 'gurus')
                            ]
                        ),
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Content', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link Details', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'gurus' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),

                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'slider_row',
                            'label' => esc_html__('Rows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'gurus'), 
                                '2' => esc_html__('2', 'gurus')
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
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
                            'default' => '2',
                            'options' => [
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide' => 'padding:0 {{SIZE}}px !important;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin:0 -{{SIZE}}px !important;',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
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
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
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
                                'pagination' => 'true'
                            ]
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
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('Box', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_bg_color',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner',
                                        ),
                                        array(
                                            'name' => 'box_filter',
                                            'label' => esc_html__('Filter', 'gurus' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--image',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_bg_color_hover',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover',
                                        ),
                                        array(
                                            'name' => '_box_hover_border_color',
                                            'label' => esc_html__('Border Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_filter_hover',
                                            'label' => esc_html__('Filter', 'gurus' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_content_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_content_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_content_bg_color',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-content--inner',
                                        ),
                                        array(
                                            'name' => 'box_content_filter',
                                            'label' => esc_html__('Filter', 'gurus' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner',
                                        ),
                                        array(
                                            'name' => 'box_content_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-content--inner',
                                        ),
                                        array(
                                            'name'         => 'box_content_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-content--inner',
                                        ),
                                        array(
                                            'name' => 'box_content_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-content--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_content_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-content--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_content_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_content_bg_color_hover',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner',
                                        ),
                                        array(
                                            'name' => '_box_content_hover_border_color',
                                            'label' => esc_html__('Border Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_content_filter_hover',
                                            'label' => esc_html__('Filter', 'gurus' ),
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover',
                                        ),
                                        array(
                                            'name' => 'box_content_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner',
                                        ),
                                        array(
                                            'name'         => 'box_content_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner',
                                        ),
                                        array(
                                            'name' => 'box_content_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_content_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-content--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
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
                            'name' => 'overlay',
                            'label' => esc_html__('Overlay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--overlay' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'overlay_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--overlay' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
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
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--title',
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
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_color_hover',
                            'label' => esc_html__('Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner:hover .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--position',
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
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_bg_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border_type',
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
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border_width',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'iconbox_border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border_color',
                            'label' => esc_html__( 'Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'iconbox_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team-carousel .pxl-item--inner .pxl-item--social .pxl-social--link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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