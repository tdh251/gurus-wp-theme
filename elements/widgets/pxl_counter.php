<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('BR Counter', 'gurus'),
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
                                    'label' => esc_html__('Layout 1', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/counter1.webp'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/counter2.webp'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/counter3.webp'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'gurus' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/counter4.webp'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__('Enter title here.', 'gurus'),
                        ),

                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'gurus'),
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
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
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
                            'description' => esc_html__('Select image icon.', 'gurus'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
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
                                '{{WRAPPER}} .pxl-counter1 .pxl-counter--inner' => 'text-align: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
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
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''       => esc_html__('Custom', 'gurus'), 
                                'style-1' => esc_html__('Box Light Blue', 'gurus'), 
                                'style-2' => esc_html__('Style 2', 'gurus'), 
                                'style-3' =>  esc_html__('Style 3', 'gurus'),
                                'style-4' =>  esc_html__('Style 4', 'gurus'),
                                'style-5' =>  esc_html__('Style 5', 'gurus'),
                                'box-shadow' => esc_html__('Box Shadow', 'gurus'),
                                'box-border2' => esc_html__('Box White', 'gurus'),
                                
                            ],
                            'default' => '',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'flex_dir',
                            'label' => esc_html__('Direction', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'row' => [
                                    'title' => esc_html__('Row', 'gurus'),
                                    'icon' => 'eicon-arrow-right',
                                ],
                                'column' => [
                                    'title' => esc_html__('Column', 'gurus'),
                                    'icon' => 'eicon-arrow-down',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner'=> 'flex-direction: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',

                            'default' => '',
                            'options' => [
                                ''  =>  esc_html__('Default', 'gurus'),
                                'start' => esc_html__('Start', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'end' => esc_html__('End', 'gurus'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner'=> 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',

                            'default' => '',
                            'options' => [
                                ''  =>  esc_html__('Default', 'gurus'),
                                'start' => esc_html__('Start', 'gurus'),
                                'center' => esc_html__('Center', 'gurus'),
                                'end' => esc_html__('End', 'gurus'),
                                'stretch' => esc_html__('Stretch', 'gurus'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner'=> 'align-items: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'style_l2',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'box-default'       => esc_html__('Default', 'gurus'), 
                                'box-linear-gradient' => esc_html__('Box Linear Gradient', 'gurus'), 
                                'box-white' => esc_html__('Box White', 'gurus'),
                            ],
                            'default' => 'box-default',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__( 'Background Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style_l2!' => 'box-linear-gradient',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--container, 
                                {{WRAPPER}} .pxl-counter4 .pxl-counter--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_gradient_from',
                            'label' => esc_html__( 'Color From', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_l2' => 'box-linear-gradient',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_gradient_to',
                            'label' => esc_html__( 'Color To', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_l2' => 'box-linear-gradient',
                            ],
                        ),
                        array(
                            'name' => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'gurus' ),
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--container'
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'inner_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'inner_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--title',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_border_radius', 
                            'label' => esc_html__( 'Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'box_icon_border', 
                            'label' => esc_html__( 'Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--icon' 
                        ),
                        array(
                            'name' => 'box_icon_height',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_icon_width',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'widht: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_top',
                            'label' => esc_html__('Top Spacer', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'padding-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_bottom',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_number',
                    'label' => esc_html__('Number', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'color_gradient',
                            'label' => esc_html__('Color Gradient', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'color_gradient_from',
                            'label' => esc_html__( 'Color From', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'color_gradient!' => '',
                            ],
                        ),
                        array(
                            'name' => 'color_gradient_to',
                            'label' => esc_html__( 'Color To', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'color_gradient!' => '',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number',
                        ),

                        array(
                            'name' => 'prefix_suffix_color',
                            'label' => esc_html__('Prefix/Suffix Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix, {{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'number_color_type' => ['color'],
                            ],
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Animation Duration', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min' => 100,
                            'step' => 100,
                        ),
                        array(
                            'name' => 'number_space_top',
                            'label' => esc_html__('Top Spacer', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'number_space_bottom',
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
                                '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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