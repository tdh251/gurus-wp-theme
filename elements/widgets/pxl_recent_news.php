<?php
$current_id = get_the_ID();
$post_type = get_post_type($current_id);
$term_opts = pxl_get_grid_term_options($post_type);
pxl_add_custom_widget(
    array(
        'name' => 'pxl_recent_news',
        'title' => esc_html__('BR Recent Post', 'gurus' ),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'solarva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'pxl_icon',
                                'label' => esc_html__('Icon', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                            ),
                            array(
                                'name' => 'suggested_type',
                                'label' => esc_html__('Suggested Type', 'solarva' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'custom',
                                'options' => [
                                    'custom' => esc_html__('Custom Posts', 'solarva' ),
                                    'related' => esc_html__('Related Posts', 'solarva' ),
                                    'recent' => esc_html__('Recent Posts', 'solarva' ),
                                ],
                            ),
                        ),
                        array(
                            array(
                                'name' => 'source',
                                'label' => esc_html__('Select Categories', 'gurus' ),
                                'type' => \Elementor\Controls_Manager::SELECT2,
                                'multiple' => true,
                                'options' => $term_opts,
                                'condition' => [
                                    'suggested_type' => 'custom',
                                ],
                            ),
                        ),
                        array(                            
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'solarva' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'DESC',
                                'options' => [
                                    'DESC' => esc_html__('Descending', 'solarva' ),
                                    'ASC' => esc_html__('Ascending', 'solarva' ),
                                ],
                            ),
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'solarva' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'solarva' ),
                                    'ID' => esc_html__('ID', 'solarva' ),
                                    'author' => esc_html__('Author', 'solarva' ),
                                    'title' => esc_html__('Title', 'solarva' ),
                                    'rand' => esc_html__('Random', 'solarva' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Limit', 'solarva' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 6,
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'general_opts',
                            'label' => esc_html__('General', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
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
                                '{{WRAPPER}} .pxl-recent-post .pxl-post-item + .pxl-post-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-recent-post .pxl-post-item .pxl-post--title',
                        ),
                        array(
                            'name' => 'general_divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'title_opts',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-recent-post .pxl-post-item .pxl-post--title',
                        ),
                        array(
                            'name' => 'title_divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'icon_opts',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link svg rect' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_wrap_w',
                            'label' => esc_html__('Icon Wrap Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link .pxl-item--icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link' => 'transform: translateX(calc(-{{SIZE}}{{UNIT}} - 15px))',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link i' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'svg_w',
                            'label' => esc_html__('SVG Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link svg' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'svg_h',
                            'label' => esc_html__('SVG Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link svg' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'img_w',
                            'label' => esc_html__('Icon IMG Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link img' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'img_h',
                            'label' => esc_html__('Icon IMG Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-item--link img' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'img_filter',
                            'label' => esc_html__('Filters', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-recent-post .pxl-item--link img',
                            'description' => esc_html__('Use to change icon image color', 'gurus'),
                        ),
                        
                        array(
                            'name' => 'icon_divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'hover_opts',
                            'label' => esc_html__('Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_color_hover',
                            'label' => esc_html__('Title Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link:hover i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link:hover svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-recent-post .pxl-post--title .pxl-item--link:hover svg rect' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_filter_hover',
                            'label' => esc_html__('Img Filters', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-recent-post .pxl-item--link:hover img',
                        ),
                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);