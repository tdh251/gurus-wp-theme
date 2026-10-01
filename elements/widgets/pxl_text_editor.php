<?php
// Register Text Editor
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_editor',
        'title' => esc_html__('BR Text Editor', 'gurus'),
        'icon' => 'eicon-text',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Text Editor', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text_ed',
                            'label' => '',
                            'type' => Controls_Manager::WYSIWYG,
                            'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'gurus' ),
                            'description' => 'Create Highlight text width shortcode: [pxl_highlight text="Text Demo"]',
                        ),
                        array(
                          'name' => 'align',
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'gurus' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 't_width',
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
                                '{{WRAPPER}} .pxl-text-editor .pxl-item--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                        ]
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__( 'Text', 'gurus' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_type',
                            'label' => esc_html__('Text Style', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ' ' => esc_html__('Default', 'gurus'),
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
                            'default' => ' ',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'color_gradient' => '', 
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_gradient',
                            'label' => esc_html__('Color Gradient', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'color_gradient_from',
                            'label' => esc_html__( 'Gradient - Color From', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'color_gradient!' => '', 
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => '--gradient-color-from: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_gradient_to',
                            'label' => esc_html__( 'Gradient - Color To', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'color_gradient!' => '', 
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => '--gradient-color-to: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor p',
                        ),
                        array(
                            'name' => 'white_space',
                            'label' => esc_html__('White Space', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''  => esc_html__('Wrap', 'gurus'),
                                'nowrap' => esc_html__('Nowrap', 'gurus'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor p' => 'white-space: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__( 'Link', 'gurus' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__( 'Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__( 'Color Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Typography', 'gurus' ),
                            'selector' => '{{WRAPPER}} .pxl-text-editor a',
                            'control_type' => 'group',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_highlight',
                    'label' => esc_html__('Highlight', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'highlight_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_box_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'highlight_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor .pxl-text--highlight',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);