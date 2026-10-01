<?php
$pt_supports = ['portfolio'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_accordion',
        'title' => esc_html__('BR Post Accordion', 'gurus' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'gurus' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => gurus_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        gurus_get_post_accordion_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'gurus' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'gurus' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        gurus_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        gurus_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'gurus' ),
                                    'ID' => esc_html__('ID', 'gurus' ),
                                    'author' => esc_html__('Author', 'gurus' ),
                                    'title' => esc_html__('Title', 'gurus' ),
                                    'rand' => esc_html__('Random', 'gurus' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'gurus' ),
                                    'asc' => esc_html__('Ascending', 'gurus' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Display', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array( 
                        array(
                            'name' => 'image_size' ,
                            'label' => esc_html__('Image Size', 'gurus'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: 556x585 or thumnail...', 
                        ),
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Item Active', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name' => 'highlight_title' ,
                            'label' => esc_html__('Highlight Title', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt!' => '',
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button!' => '',
                            ],
                        ),
                    )
                ),

                // Style
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'l_portfolio_style',
                            'label' => esc_html__('General', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'light',
                            'options' => [
                                'dark' => esc_html__('Dark', 'gurus' ),
                                'light' => esc_html__('Light', 'gurus' ),
                            ],
                        ),
                        array(
                            'name' => 'justify_content_h',
                            'label' => esc_html__( 'Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'label_block' => true,
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-v'
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-justify-center-v'
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Bottom', 'gurus' ),
                                    'icon' => 'eicon-justify-end-v'
                                ],
                                'space-between' => [
                                    'title' => esc_html__( 'Space Between', 'gurus' ),
                                    'icon' => 'eicon-justify-space-between-v'
                                ],
                                'space-around' => [
                                    'title' => esc_html__( 'Space Around', 'gurus' ),
                                    'icon' => 'eicon-justify-space-around-v'
                                ],
                                'space-evenly' => [
                                    'title' => esc_html__( 'Space Evenly', 'gurus' ),
                                    'icon' => 'eicon-justify-space-evenly-v'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-accordion .pxl-item--main' => 'justify-content: {{VALUE}};',
                            ],
                        ),

                    )
                ),

                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_max_height',
                            'label' => esc_html__('Max Height', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-portfolio-accordion .pxl-item--main .pxl-item--title' => 'max-height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_excerpt',
                    'label' => esc_html__('Excerpt', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--excerpt',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_category',
                    'label' => esc_html__('Category', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'catalog_bg_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--category ' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'catalog_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--category a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'catalog_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--category a',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button ', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--btn ' => 'background-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--btn' => 'color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
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
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--btn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
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
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--main .pxl-item--btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                    ),
                ),


                array(
                    'name' => 'section_style_item_active',
                    'label' => esc_html__('Item Active', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => '_normal',
                            'label' => esc_html__('GENERAL', 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Content Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-accordion .pxl-item--active .pxl-item--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_active',
                            'label' => esc_html__('TITLE', 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_active_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-accordion .pxl-item--inner.pxl-item--active .pxl-item--holder .pxl-item--title a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_active_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-portfolio-accordion .pxl-item--inner.pxl-item--active .pxl-item--holder .pxl-item--title a',
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'btn_normal',
                            'label' => esc_html__('BUTTON NORMAL', 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'btn_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn:after',
                        ),
                        array(
                            'name' => 'btn_hover',
                            'label' => esc_html__('BUTTON HOVER', 'gurus'),
                            'type' => Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_hover_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn:hover' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn:hover' => 'color: {{VALUE}};' ,
                                '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn .pxl-icon--default:after' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-accordion .pxl-item .pxl-item--inner.pxl-item--active .pxl-item--btn:hover:after',
                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);