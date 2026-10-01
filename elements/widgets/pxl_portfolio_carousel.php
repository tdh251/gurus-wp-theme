<?php
$pt_supports = ['portfolio'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_portfolio_carousel',
        'title' => esc_html__('BR Portfolio Carousel', 'gurus'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'section_layout',
                    'label'    => esc_html__( 'Layout', 'gurus' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Post Type', 'gurus' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => gurus_get_post_type_options($pt_supports),
                                'default'  => 'portfolio'
                            ) 
                        ),
                        gurus_get_post_carousel_layout($pt_supports),
                    ),
                ),
                
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                    ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-2']],
                                ],
                            ],
                        ],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'content_title_info',
                            'label' => esc_html__('INFO', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_info1',
                            'label' => esc_html__('Title Info 1', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_info2',
                            'label' => esc_html__('Title Info 2', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_info3',
                            'label' => esc_html__('Title Info 3', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'content_button',
                            'label' => esc_html__('BUTTON', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'content_post',
                            'label' => esc_html__('POST', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 2,
                                ),
                                array(
                                    'name' => 'category',
                                    'label' => esc_html__('Category', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'info1',
                                    'label' => esc_html__('Info 1', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'info2',
                                    'label' => esc_html__('Info 2', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'info3',
                                    'label' => esc_html__('Info 3', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'gurus'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ], 
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'image_featured',
                                    'label' => esc_html__( 'Image Featured', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),

                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        // Icon 
                    ),
                ),

                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                    ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1', 'portfolio-3']],
                                ],
                            ],
                        ],
                    ],
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
                            ) ,
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
                    'name' => 'section_carousel_grid',
                    'label' => esc_html__('Grid', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_md_custom',
                            'label' => esc_html__('Columns MD Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_md' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_lg_custom',
                            'label' => esc_html__('Columns LG Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_lg' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xl_custom',
                            'label' => esc_html__('Columns XL Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_xl' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'custom' => 'custom',
                            ],
                        ),

                        array(
                            'name' => 'col_xxl_custom',
                            'label' => esc_html__('Columns XXL Custom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number.',
                            'condition' => [
                                'col_xxl' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15px',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-slide' => 'padding: {{SIZE}}px;',
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin: -{{SIZE}}px;',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_carousel_option',
                    'label' => esc_html__('Options', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'carousel_option',
                            'label' => esc_html__('CAROUSEL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination!' => ''
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay!' => '',
                            ],
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'gurus'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'divider9',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'arrows_option',
                            'label' => esc_html__('ARROWS', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show/Hide', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'arrow_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow svg path' => 'stroke: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'arrow_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'arrow_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow',
                        ),
                        array(
                            'name' => 'arrows_hover',
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'arrow_hover_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow:hover svg path' => 'stroke: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'arrow_hover_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow:hover' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'arrow_hover_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow:hover',
                        ),
                        array(
                            'name' => 'arrows_animate_option', 
                            'label' => esc_html__( 'ANIMATION', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'arrows_animate',
                            'label' => esc_html__('Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'arrows_animate_delay',
                            'label' => esc_html__('Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_divider',
                            'label' => esc_html__('Show Divider', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_info1',
                            'label' => esc_html__('Show Info 1', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_info2',
                            'label' => esc_html__('Show Info 2', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_info3',
                            'label' => esc_html__('Show Info 3', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(   
                        array(
                            'name' => '_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),                    
                        array(
                            'name' => 'negative_margin',
                            'label' => esc_html__('Negative Margin', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-carousel-inner' => 'margin: -{{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'inner_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'inner_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner:hover, 
                                {{WRAPPER}} .pxl-portfolio-carousel.pxl-portfolio-carousel3 .pxl-overlay--hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'spacer_bottom',
                            'label' => esc_html__('Spacer Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner ' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider8',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ), 
                        array(
                            'name' => 'content_normal',
                            'label' => esc_html__('CONTENT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),       
                        array(
                            'name' => 'content_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => '{{VALUE}}: 0;',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'left: {{SIZE}}{{UNIT}};right: auto;',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => '{{VALUE}}: 0;',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
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
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                            ],
                        ),
                        array(
                            'name' => 'translate',
                            'label' => esc_html__('Translate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: -50%, -50%',
                            'control_type' => 'responsive',
                            'description' => 'Enter value with syntax: (size_x)(unit_x), (size_y)(unit_y). Default -50%, -50%',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--content' => 'transform: translate({{VALUE}});',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_filter',
                    'label' => esc_html__('Filter', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                    ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-3']],
                                ],
                            ],
                        ],
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'filter_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'filter_justify_content',
                            'label' => esc_html__('Justify Content', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Start', 'gurus' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'gurus' ),
                                    'icon' => 'eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'End', 'gurus' ),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_gap',
                            'label' => esc_html__('Gap', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner .filter-item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_num_color',
                            'label' => esc_html__('Number Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner .filter-item:after' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner .filter-item',
                        ),
                        array(
                            'name' => 'filter_num_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner .filter-item:after',
                        ),

                        array(
                            'name' => 'filter_hover',
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'filter_color_hover',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner .filter-item:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'filter_num_color_hover',
                            'label' => esc_html__('Number Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-filter-inner:hover .filter-item:after' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_image',
                    'label' => esc_html__('Image Featured', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'image_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'image_filter',
                            'label' => esc_html__('Filter', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-portfolio-carousel .pxl-post--featured img',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'title_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title',
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_hover',
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'title_color_hover',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_line',
                            'label' => esc_html__('Show Line', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'line_color_hover',
                            'label' => esc_html__('Line Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'title_line!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title a' => 'background-image: linear-gradient(transparent calc(100% - 1px), {{VALUE}} 1px);',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_category',
                    'label' => esc_html__('Category', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'category_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'category_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category .pxl-category--link' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'category_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category .pxl-category--link',
                        ),
                        array(
                            'name' => 'category_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider3',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'box_category_normal',
                            'label' => esc_html__('BOX', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'box_category_shadow',
                            'label' => esc_html__('Shadow', 'gurus' ),
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category .pxl-category--link',
                        ),
                        array(
                            'name' => 'box_category_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category .pxl-category--link' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_category_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--category .pxl-category--link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_divider',
                    'label' => esc_html__('Divider', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'divider_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-item--divider' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'divider_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-item--divider' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-item--divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_meta',
                    'label' => esc_html__('Meta', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array( 
                        array(
                            'name' => 'meta_normal',
                            'label' => esc_html__('GENERAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'meta_item_spacing',
                            'label' => esc_html__('Item Spacing', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--info + .pxl-post--info' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider5',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'meta_title_normal',
                            'label' => esc_html__('TITLE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'meta_title_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--info .pxl-text--highlight' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'meta_title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--info .pxl-text--highlight',
                        ),
                        array(
                            'name' => 'divider4',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'meta_text_normal',
                            'label' => esc_html__('TEXT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'meta_text_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--info' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'meta_text_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--info',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ), 
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn svg rect' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider6',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ), 
                        array(
                            'name' => 'btn_icon_normal',
                            'label' => esc_html__('ICON/SVG', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ), 
                        array(
                            'name' => 'btn_icon_size',
                            'label' => esc_html__('Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_svg_width',
                            'label' => esc_html__('Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_svg_height',
                            'label' => esc_html__('Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider7',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ), 
                        array(
                            'name' => 'btn_hover',
                            'label' => esc_html__('HOVER', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ), 
                        array(
                            'name' => 'btn_hover_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn:hover svg path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn:hover svg rect' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--btn:hover' => 'background-color: {{VALUE}};',
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