<?php
$templates_df = ['0' => esc_html__('None', 'gurus')];
$templates = $templates_df + Gurus_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button_anchor',
        'title' => esc_html__('BR Button Anchor', 'gurus' ),
        'icon' => 'eicon-anchor',
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
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'gurus'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),               
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'normal',
                            'label' => esc_html__("NORMAL", 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                            'sperator' => 'after',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus') ,
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'gurus'),
                                'pxl-btn-search1' => esc_html__('Button Search - Border', 'gurus'),
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-anchor .pxl-item--button' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .pxl-button-anchor .pxl-item--button svg circle' => 'fill: {{VALUE}}',
                            ]
                        ),   
                        array(
                            'name' => 'border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button-anchor .pxl-item--button:after',
                        ),
                        array(
                            'name' => 'font_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-anchor .pxl-item--button' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-button-anchor .pxl-item--button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),      
                        array(
                            'name' => 'divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'hover',
                            'label' => esc_html__("HOVER", 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                            'sperator' => 'after',
                        ), 
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__('Border Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-anchor .pxl-item--button:before' => 'border-color: {{VALUE}}',
                            ]
                        ),             
                    ),
                ),
            ),
        ),
    ),
    Gurus_get_class_widget_path()
);