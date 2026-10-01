<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'gurus')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('BR Contact Form', 'gurus'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
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
                                        'label' => esc_html__('Layout 1', 'gurus'),
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_contact_form/layout1.jpg'
                                    ],
                                    '2' => [
                                        'label' => esc_html__('Layout 2', 'gurus'),
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_contact_form/layout2.jpg'
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
                                'name' => 'loader',
                                'label' => esc_html__('Loader', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                            array(
                                'name' => 'loader_style',
                                'label' => esc_html__('Loader Style', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'dark',
                                'options' => [
                                    'dark' => esc_html__('Dark', 'gurus'),
                                    'light' => esc_html__('Light', 'gurus'),
                                    'gradient' => esc_html__('Gradient', 'gurus'),
                                ],
                                'condition' => [
                                    'loader!' => ''
                                ]
                            ),
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style',
                        'label' => esc_html__('General', 'gurus'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array( 
                            array(
                                'name' => 'normal',
                                'label' => esc_html__('NORMAL', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'bg_color',
                                'label' => esc_html__('Background', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bg_border',
                                'label' => esc_html__('Border', 'gurus' ),
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7',
                            ),
                            array(
                                'name' => 'backdrop_filter',
                                'label' => esc_html__('Background Blur', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                                ],
                                'condition' => [
                                    'layout' => '2',
                                ],
                            ),
                            array(
                                'name' => 'alignment',
                                'label' => esc_html__( 'Alignment', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'default' => 'center',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7' => 'justify-content: {{VALUE}};',
                                ],
                            ),

                            array(
                                'name' => 'l_padding',
                                'label' => esc_html__('Padding', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form.pxl-contact-form2 .wpcf7' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'layout' => '2',
                                ],
                            ),
                            array(
                                'name' => 'l_border_radius',
                                'label' => esc_html__('Border Radius', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form.pxl-contact-form2 .wpcf7 ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'layout' => '2',
                                ],
                            ),
                            array(
                                'name' => 'group_input',
                                'label' => esc_html__('INPUT GROUP', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'group_gap',
                                'label' => esc_html__('Gap', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl-form-wrap .pxl-item--group' => 'gap: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'group_wrap',
                                'label' => esc_html__('Wrap', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'control_type' => 'responsive',
                                'options' => [
                                    'nowrap' => [
                                        'label' => esc_html__('No Wrap', 'gurus'), 
                                        'icon' => 'eicon-nowrap'
                                    ],
                                    'wrap' => [
                                        'label' => esc_html__('Wrap', 'gurus'), 
                                        'icon' => 'eicon-wrap'
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl-form-wrap .pxl-item--group' => 'flex-wrap: {{VALUE}};',
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
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-form' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                    // Optipon Style Input
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'gurus'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_normal',
                                'label' => esc_html__('NORMAL', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), 
                                    {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Typography', 'gurus' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), 
                                {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight',
                            ),
                            array(
                                'name' => 'input_bg_color',
                                'label' => esc_html__('Background Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), 
                                    {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'         => 'input_box_shadow',
                                'label'        => esc_html__( 'Box Shadow', 'gurus' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), 
                                {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight'
                            ),
                            array(
                                'name'         => 'input_border',
                                'label'        => esc_html__( 'Border', 'gurus' ),
                                'type'         => \Elementor\Group_Control_Border::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-acceptance), 
                                                    {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight'
                            ),
                            array(
                                'name' => 'input_border_radius',
                                'label' => esc_html__('Border Radius', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'input_height',
                                'label' => esc_html__('Height', 'gurus' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_width',
                                'label' => esc_html__('Max Width', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 900,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_padding',
                                'label' => esc_html__('Padding Input', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), 
                                    {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_margin',
                                'label' => esc_html__('Margin', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                        ),
                    ),
                    // Option Style Area 
                    array (
                        'name' => 'section_style_textarea' ,
                        'label' => esc_html__('Textarea', 'gurus'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'textarea_normal',
                                'label' => esc_html__('NORMAL', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                            ),
                            array(
                                'name' => 'textarea_color',
                                'label' => esc_html__('Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_typography',
                                'label' => esc_html__('Typography', 'gurus' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea, 
                        ',
                            ),
                            array(
                                'name' => 'textarea_bg_color',
                                'label' => esc_html__('Background Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'         => 'textarea_box_shadow',
                                'label'        => esc_html__( 'Box Shadow', 'gurus' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit)'
                            ),
                            array(
                                'name'         => 'textarea_border',
                                'label'        => esc_html__( 'Border', 'gurus' ),
                                'type'         => \Elementor\Group_Control_Border::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-acceptance)'
                            ),
                            array(
                                'name' => 'textarea_border_radius',
                                'label' => esc_html__('Border Radius', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'textarea_height',
                                'label' => esc_html__('Height', 'gurus' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_width',
                                'label' => esc_html__('Max Width', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 900,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_padding',
                                'label' => esc_html__('Padding Input', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'textarea_margin',
                                'label' => esc_html__('Margin', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                        )
                    ),
                

                    array(
                        'name' => 'tab_style_button',
                        'label' => esc_html__('Button', 'gurus'),
                        'tab' => Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'btn_normal_heading',
                                'label' => esc_html__('NORMAL', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'btn_bg_gradient',
                                'label' => esc_html__('Background Gradient', 'gurus'),
                                'type' => Elementor\Controls_Manager::SWITCHER,
                                'default' => '',
                            ),
                            array(
                                'name' => 'btn_bg_color',
                                'label' => esc_html__('Background Color', 'gurus'),
                                'type' => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'background-color: {{VALUE}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_color',
                                'label' => esc_html__('Color', 'gurus'),
                                'type' => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit .pxl-icon--default:before' => 'color: {{VALUE}};' ,
                                ],
                            ),
                            array(
                                'name' => 'btn_typography',
                                'label' => esc_html__('Typography', 'gurus' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit',
                            ),
                            array(
                                'name' => 'btn_icon_size',
                                'label' => esc_html__('Icon Size', 'gurus'),
                                'type' => Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px', '%'],
                                'range' => [
                                    'px' => [
                                        'min' => 1,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit i' => 'font-size: {{SIZE}}{{UNIT}};'
                                ],
                            ),
                            array(
                                'name' => 'divider1',
                                'type' => Elementor\Controls_Manager::DIVIDER,
                            ),
                            array(
                                'name' => 'btn_size_heading',
                                'label' => esc_html__('SIZE', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'btn_gap',
                                'label' => esc_html__('Gap', 'gurus'),
                                'type' => Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px', '%'],
                                'range' => [
                                    'px' => [
                                        'min' => 1,
                                        'max' => 500,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'gap: {{SIZE}}{{UNIT}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_width',
                                'label' => esc_html__('Width', 'gurus'),
                                'type' => Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px', '%'],
                                'range' => [
                                    'px' => [
                                        'min' => 1,
                                        'max' => 500,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'width: {{SIZE}}{{UNIT}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_height',
                                'label' => esc_html__('Height', 'gurus'),
                                'type' => Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px', '%'],
                                'range' => [
                                    'px' => [
                                        'min' => 1,
                                        'max' => 500,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'height: {{SIZE}}{{UNIT}};'
                                ],
                            ),
                            array(
                                'name' => 'divider2',
                                'type' => Elementor\Controls_Manager::DIVIDER,
                            ),
                            array(
                                'name' => 'btn_border_heading',
                                'label' => esc_html__('BORDER', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'btn_border',
                                'label' => esc_html__('Border', 'gurus' ),
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit:after',
                            ),
                            array(
                                'name' => 'btn_border_radius',
                                'label' => esc_html__('Border Radius', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'divider3',
                                'type' => Elementor\Controls_Manager::DIVIDER,
                            ),
                            array(
                                'name' => 'btn_spacer_heading',
                                'label' => esc_html__('SPACING', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_margin',
                                'label' => esc_html__('Margin', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'divider4',
                                'type' => Elementor\Controls_Manager::DIVIDER,
                            ),
                            array(
                                'name' => 'btn_position_heading',
                                'label' => esc_html__('POSITION', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => '{{VALUE}}: 0;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'left: {{SIZE}}{{UNIT}};right: auto;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => '{{VALUE}}: 0;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                                ],
                            ),
                            array(
                                'name' => 'divider5',
                                'type' => Elementor\Controls_Manager::DIVIDER,
                            ),
                            array(
                                'name' => 'btn_hover_heading',
                                'label' => esc_html__('HOVER', 'gurus'),
                                'type' => Elementor\Controls_Manager::HEADING,
                            ),
                            array(
                                'name' => 'btn_hover_bg_color',
                                'label' => esc_html__('Background Color', 'gurus'),
                                'type' => Elementor\Controls_Manager::COLOR,
                                'condition' => [
                                    'btn_bg_gradient' => '',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit:hover, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit:hover' => 'background-color: {{VALUE}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_hover_color',
                                'label' => esc_html__('Color', 'gurus'),
                                'type' => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit:hover, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit:hover, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit .pxl-icon--default:after' => 'color: {{VALUE}};' ,

                                ],
                            ),
                            array(
                                'name' => 'btn_hover_border',
                                'label' => esc_html__('Border', 'gurus' ),
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7 .wpcf7-submit:hover, 
                                    {{WRAPPER}} .pxl-contact-form .wpcf7 .btn-submit:hover:after',
                            ),
                        ),
                    ),
                    array(
                        'name' => 'extra',
                        'label' => esc_html__('Extra', 'gurus'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'notification_normal',
                                'label' => esc_html__('NOTIFICATION', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'notification_color',
                                'label' => esc_html__('Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'notification_box_color',
                                'label' => esc_html__('Box Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'notification_typography',
                                'label' => esc_html__('Typography', 'gurus' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output',
                            ),
                            array(
                                'name' => 'notification_padding',
                                'label' => esc_html__('Padding', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'notification_border_radius',
                                'label' => esc_html__('Border Radius', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form .wpcf7-response-output' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'error_normal',
                                'label' => esc_html__('ERROR MESAGE', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'error_color',
                                'label' => esc_html__('Color', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-not-valid-tip' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'error_typography',
                                'label' => esc_html__('Typography', 'gurus' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-not-valid-tip',
                            ),
                            array(
                                'name' => 'error_spacer_top',
                                'label' => esc_html__('Spacer Top', 'gurus' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-not-valid-tip' => 'margin-top: {{SIZE}}{{UNIT}};',
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
}