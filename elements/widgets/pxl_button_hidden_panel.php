<?php
$templates_df = ['0' => esc_html__('None', 'gurus')];
$templates = $templates_df + Gurus_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button_hidden_panel',
        'title' => esc_html__('BR Button Hidden Panel', 'gurus' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'gurus'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus') ,
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'round-box' => esc_html__('Style 1', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'font_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button.pxl-anchor-button .pxl-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),     
                        array(
                            'name' => 'width',
                            'label' => esc_html__('Width', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-anchor-button .pxl-button' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-anchor-button .pxl-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),  
                        
                        array(
                            'name' => 'btn_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'btn_normal',
                                    'label' => esc_html__('Normal', 'ainus' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'color',
                                            'label' => esc_html__('Color', 'gurus') ,
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button .pxl-item--dot' =>  'background-color: {{VALUE}};', 
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button i' => 'color: {{VALUE}};',
                                            ]
                                        ),    
                                        array(
                                            'name' => 'btn_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-anchor-button .pxl-button',
                                        ),
                                        array(
                                            'name' => 'btn_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-anchor-button .pxl-button',
                                        ),
                                        array(
                                            'name'         => 'btn_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'ainus' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-anchor-button .pxl-button',
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'ainus' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_padding',
                                            'label' => esc_html__('Padding', 'ainus' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'btn_hover',
                                    'label' => esc_html__('Hover', 'ainus' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'hover_style',
                                            'label' => esc_html__('Hover Style', 'gurus') ,
                                            'type' => \Elementor\Controls_Manager::SELECT,
                                            'default' => 'hover-default',
                                            'options' => [
                                                'hover-default' => esc_html__('Default', 'gurus'),
                                                'hover-style1' => esc_html__('Style 1', 'gurus'),
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hove_color',
                                            'label' => esc_html__('Color', 'ainus' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-button-wrapper .button:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover',
                                        ),
                                        array(
                                            'name' => '_btn_hover_border_color',
                                            'label' => esc_html__('Border Color', 'ainus' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_anim',
                                            'label' => esc_html__( 'Hover Animation', 'ainus' ),
                                            'type' => 'hover_animation',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover',
                                        ),
                                        array(
                                            'name'         => 'btn_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'ainus' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'ainus' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_padding',
                                            'label' => esc_html__('Padding', 'ainus' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-anchor-button .pxl-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    Gurus_get_class_widget_path()
);