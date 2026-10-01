<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('BR Icon Box', 'gurus' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        // array(
                        //     'name' => 'layout',
                        //     'label' => esc_html__('Templates', 'gurus' ),
                        //     'type' => 'layoutcontrol',
                        //     'default' => '1',
                        //     'options' => [
                        //         '1' => [
                        //             'label' => esc_html__('Layout 1', 'gurus'),
                        //             'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout-1.jpg'
                        //         ],
                        //     ],
                        // ),
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
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'icon_link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => esc_html__('Icon', 'gurus'),
                                'image' => esc_html__('Image', 'gurus'),
                                'number' => esc_html__('Number', 'gurus')
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
                            'name' => 'index',
                            'label' => esc_html__('Index', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'show_label' => true,
                            'condition' => [
                                'icon_type' => 'number'
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
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => esc_html__('Default', 'gurus'),
                                'round-box-icon' => esc_html__('Round Box Icon 1', 'gurus'),
                                'round-box-icon2' => esc_html__('Round Box Icon 2', 'gurus'),
                                'round-box-icon3' => esc_html__('Round Box Icon 3', 'gurus'),
                                'round-box-icon4' => esc_html__('Round Box Icon 3', 'gurus'),
                                'style-vertical1' => esc_html__('Vertical Style 1', 'gurus'),
                                'round-box-icon4' => esc_html__('Round Box Number', 'gurus'),
                                'round-box-icon5' => esc_html__('Round Box Number 2', 'gurus'),
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'layout_type',
                            'label' => esc_html__( 'Layout Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'row',
                            'options' => [
                                'row' => esc_html__( 'Horizontal', 'gurus' ),
                                'column' => esc_html__( 'Vertical', 'gurus' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' =>  'flex-direction: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_position',
                              'label' => esc_html__( 'Title Position', 'gurus' ),
                              'type' => \Elementor\Controls_Manager::CHOOSE,
                              'options' => [
                                    'column-reverse' => [
                                      'title' => esc_html__( 'Bottom', 'gurus' ),
                                      'icon' => 'eicon-v-align-bottom',
                                    ],
                                    'column' => [
                                        'title' => esc_html__( 'Top', 'gurus' ),
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--content' => 'display: flex; flex-direction: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Text Alignment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'gurus' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'gurus' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'text-align: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner' => 'max-width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--title',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--description',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--content' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_min_width',
                            'label' => esc_html__('Box Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_min_height',
                            'label' => esc_html__('Box Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_width',
                            'label' => esc_html__( 'Border Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'box_border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'is_ring_effect' ,
                            'label' => esc_html__('Ring Effect', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false' ,
                        ),
                    ),

                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);