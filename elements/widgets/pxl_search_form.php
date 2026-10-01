<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_search_form',
        'title' => esc_html__('BR Search Form', 'gurus' ),
        'icon' => 'eicon-site-search',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_search_form/layout-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_search_form/layout-2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'gurus'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_search_form/layout-2.jpg'
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
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'placefolder',
                            'label' => esc_html__('Placefolder', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
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
                                '{{WRAPPER}} .pxl-search-form' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                // Option Style Input
                array(
                    'name' => 'section_style_input',
                    'label' => esc_html__('Input', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array (
                            'name' => 'input_color', 
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR, 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-form .pxl-search-field' => 'color: {{VALUE}};'
                            ] 
                        ),
                        array(
                            'name' => 'input_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-search-form .pxl-search-field',
                        ),
                        array(
                            'name' => 'input_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-search-form .pxl-search-field',
                        ),
                    ),
                ),
                // Option Style Button 
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array (
                            'name' => 'button_color', 
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR, 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-form .pxl-search-submit' => 'color: {{VALUE}};'
                            ] 
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-search-form .pxl-search-submit',
                        ),
                        array (
                            'name' => 'icon_size', 
                            'label' => esc_html__('Icon Size', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SLIDER, 
                            'size_units' => ['px'], 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-form .pxl-search-submit i' => 'font-size: {{SIZE}}{{UNIT}};'
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