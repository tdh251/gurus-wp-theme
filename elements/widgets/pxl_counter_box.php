<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter_box',
        'title' => esc_html__('BR Counter Box', 'gurus'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'gurus-counter',
        ),
        'params' => array(
            'sections' => array(
                // array(
                //     'name' => 'section_layout',
                //     'label' => esc_html__('Layout', 'gurus' ),
                //     'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                //     'controls' => array(
                //         array(
                //             'name' => 'layout',
                //             'label' => esc_html__('Templates', 'gurus' ),
                //             'type' => 'layoutcontrol',
                //             'default' => '1',
                //             'options' => [
                //                 '1' => [
                //                     'label' => esc_html__('Layout 1', 'gurus' ),
                //                     'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout1.jpg'
                //                 ],

                //             ],
                //         ),
                //     ),
                // ),

                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'content_general',
                            'label' => esc_html__('GENERAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Prefix', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Suffix', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Separator', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ',' => 'Comma',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'content_number',
                            'label' => esc_html__('NUMBER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Duration', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min' => 100,
                            'step' => 100,
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'content_layer',
                            'label' => esc_html__('LAYER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'layer',
                            'label' => esc_html__( 'Layer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'layer_effect',
                            'label' => esc_html__('Effect', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'pxl-image-effect1' => 'Zigzag',
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
                                'pxl-animation-round' => 'Round',
                            ],
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'effect',
                            'label' => esc_html__('Effect', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'effect-default' => 'Default',
                                'effect-slide' => 'Slide',
                            ],
                            'default' => 'effect-default',
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style_l2!' => 'box-linear-gradient',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--container' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'gurus' ),
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-item--container'
                        ),
                        array(
                            'name' => 'content_max_width',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_min_height',
                            'label' => esc_html__('Min Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_number',
                    'label' => esc_html__('Number', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_style',
                            'label' => esc_html__('NUMBER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-item--number',
                        ),
                        array(
                            'name' => 'affix_color',
                            'label' => esc_html__('Affix Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--number .pxl-item--suffix, 
                                {{WRAPPER}} .pxl-counter-box .pxl-item--number .pxl-item--prefix' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_spacing_bottom',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                            'name' => 'title_style',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'highlight_style',
                            'label' => esc_html__('HIGHLIGHT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'title_highlight_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_highlight_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--title .pxl-title--highlight',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_style',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'saperator' => 'after',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-item--inner .pxl-item--desc',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);