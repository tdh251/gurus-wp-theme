<?php
// 'pxl-splitting',
// 'pxl-typography-animation',
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('BR Heading', 'gurus' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
            'typed'
        ),
        'params' => array(
            'sections' => array(
                // Section Content 
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'is_custom_text',
                            'label' => esc_html__('Custom Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'source_type' => 'title',
                            ]
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"]',
                        ),
                        array(
                            'name' => 'is_icon',
                            'label' => esc_html__('Subtitle Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Subtitle', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'is_icon' => '',
                            ]
                        ),
                        array(
                            'name' => 'icon_link',
                            'label' => esc_html__('Link', 'gurus'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ], 
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'is_icon!' => '',
                            ],
                        ),
                    ),
                ),
                // Option Style Title
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Alignment', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--container' => 'justify-content: {{VALUE}}; text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
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
                            'name' => 'title_option', 
                            'label' => esc_html__( 'NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'custom',
                            'options' => [
                                'custom' => esc_html__('Custom', 'gurus'),
                                'default' => esc_html__('Heading 2', 'gurus'),
                                'default1' => esc_html__('Heading 2 Sora Font', 'gurus'),
                                'page-title' => esc_html__('Page Title', 'gurus'),
                                'post-title' => esc_html__('Post Title', 'gurus'),
                                'style-1' =>  esc_html__('Line After Title', 'gurus'),
                                'style-2' =>  esc_html__('Style 2', 'gurus'),
                                'style-3' => esc_html__('Style 3', 'gurus'),
                                'style-4' => esc_html__('Style 4', 'gurus'),
                                'style-5' => esc_html__('Style 5', 'gurus'),
                                'style-6' => esc_html__('Heading 1', 'gurus'),
                                'intro' => esc_html__('Intro Title 1', 'gurus'),
                                'intro2' => esc_html__('Intro Title 2', 'gurus'),
                                'intro3' => esc_html__('Intro Title 3', 'gurus'),
                                'intro4' => esc_html__('Intro Title 4', 'gurus'),
                            ],
                        ),
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
                            'default' => 'h2',
                        ),
                        array(
                            'name' => 'title_position',
                              'label' => esc_html__('Position', 'gurus' ),
                              'type' => \Elementor\Controls_Manager::CHOOSE,
                              'options' => [
                                    'column-reverse' => [
                                      'title' => esc_html__( 'Top', 'gurus' ),
                                      'icon' => 'eicon-v-align-top',
                                    ],
                                    'column' => [
                                        'title' => esc_html__( 'Bottom', 'gurus' ),
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'display: flex; flex-direction: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'is_color_gradient',
                            'label' => esc_html__('Color Gradient', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false'
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                            ],
                            'condition' => [
                                'is_color_gradient!' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Shadow', 'gurus' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_min_height',
                            'label' => esc_html__('Min Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_space_bottom',
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider1', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'title_divider', 
                            'label' => esc_html__( 'DIVIDER', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_line_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_line_width',
                            'label' => esc_html__('Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--title:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider2', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'title_animate_option', 
                            'label' => esc_html__( 'ANIMATION', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                // Option Style Subtitle
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'subtitle_option', 
                            'label' => esc_html__( 'NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'sub_title_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ' ' => esc_html__('Default', 'gurus'),
                                'pxl-subtitle-box-1' => esc_html__('Box 1', 'gurus'),
                                'pxl-subtitle-box-2' => esc_html__('Box 2', 'gurus'),
                                'pxl-subtitle-box-3' => esc_html__('Box 3 - BG Blue', 'gurus'),
                                'pxl-subtitle-box-3--white' => esc_html__('Box 3 - BG White', 'gurus'),
                                'pxl-subtitle-box-4' => esc_html__('Box 4 - Border', 'gurus'),
                                'pxl-subtitle-box-5' => esc_html__('Box 5 - Grey', 'gurus'),
                                'pxl-sutitle-box-6'  => esc_html__('Box 6 ', 'gurus'),
                                'pxl-sutitle-box-6--dark'  => esc_html__('Box 6 Dark', 'gurus'),
                                'pxl-subtitle-box-7' => esc_html__('Box Transparent White', 'gurus'),
                                'pxl-subtitle-box-8' => esc_html__('Box 8', 'gurus'),
                                'pxl-subtitle-line1' => esc_html__('After Devider 1', 'gurus'),
                                'pxl-subtitle-line2' => esc_html__('After Devider 2', 'gurus'),
                                'pxl-subtitle-line3' => esc_html__('After Devider 3', 'gurus'),
                                'pxl-style1'         => esc_html__('Style 1', 'gurus'),
                            ],
                            'default' => ' ',
                        ),
                        array(
                            'name' => 'sub_title_style_1',
                            'label' => esc_html__('Text Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'h1' => esc_html__('Heading 1', 'gurus'),
                                'h2' => esc_html__('Heading 2', 'gurus'),
                                'h3' => esc_html__('Heading 3', 'gurus'),
                                'h4' => esc_html__('Heading 4', 'gurus'),
                                'h5' => esc_html__('Heading 5', 'gurus'),
                                'h6' => esc_html__('Heading 6', 'gurus'),
                                'pxl-p1' => esc_html__('Paragraph 1', 'gurus'),
                                'pxl-p2' => esc_html__('Paragraph 2', 'gurus'),
                                'pxl-p3' => esc_html__('Paragraph 3', 'gurus'),
                                'pxl-p4' => esc_html__('Paragraph 4', 'gurus'),
                                'pxl-p5' => esc_html__('Paragraph 5', 'gurus'),
                                'pxl-p6' => esc_html__('Paragraph 6', 'gurus'),
                                'pxl-b1' => esc_html__('Body Text 1', 'gurus'),
                                'pxl-b2' => esc_html__('Body Text 2', 'gurus'),
                                'pxl-b3' => esc_html__('Body Text 3', 'gurus'),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext',
                        ),
                        array(
                            'name' => 'sub_title_space_top',
                            'label' => esc_html__('Top Spacing', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_space_bottom',
                            'label' => esc_html__('Bottom Spacing', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'subtitle_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_subtitle_divider', 
                            'label' => esc_html__( 'DIVIDER/DOT', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'subtitle_line_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext::after,{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext::before' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'subtitle_divider1', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_subtitle_option', 
                            'label' => esc_html__( 'BOX', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'sub_title_bg_color',
                            'label' => esc_html__('Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext',
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__( 'Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'subtitle_divider2', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_subtitle_animate', 
                            'label' => esc_html__( 'ANIMATION', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate_sub',
                            'label' => esc_html__('Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_sub',
                            'label' => esc_html__('Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    )
                ),
                // Hightligh text
                array(
                    'name' => 'section_style_hightlight',
                    'label' => esc_html__('Hightlight', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'highlight_normal',
                            'label' => esc_html__('NORMAL', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'hightlight_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'hightlight_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'divider9',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'typewriter_effect',
                            'label' => esc_html__('TYPEWRITER', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'hightlight_typewriter',
                            'label' => esc_html__('On/Off', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'texts',
                            'label' => esc_html__('Texts', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'hightlight_typewriter!' => '', 
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 2,
                                ),

                            ),
                            'title_field' => '{{{ text }}}',

                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);