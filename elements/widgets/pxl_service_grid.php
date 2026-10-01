<?php
$pt_supports = ['service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_service_grid',
        'title' => esc_html__('BR Service Grid', 'gurus' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                                'default'  => 'service',
                                'description' => 'This widget only applies to service layout 6', 
                            ),
                            array(
                                'name'     => 'layout_service',
                                'label'    => esc_html__( 'Select Template', 'gurus' ),
                                'type'     => 'layoutcontrol',
                                'default' => 'service-6',
                                'options'  => [
                                    'service-6' => [
                                        'label' => esc_html__( 'Layout 6', 'gurus' ),
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout6.jpg'
                                    ],
                                    'service-9' => [
                                        'label' => esc_html__( 'Layout 6', 'gurus' ),
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/service-layout9.jpg'
                                    ],
                                ],
                                'prefix_class' => 'pxl-post-layout-',
                            ),
                        ),
                        // gurus_get_post_grid_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'tab_source',
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
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'gurus' ),
                                'false' => esc_html__('Disable', 'gurus' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name'    => 'filter_type',
                            'label'   => esc_html__('Filter Type', 'gurus' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'normal'  => esc_html__('Normal', 'gurus' ),
                                'ajax' => esc_html__('Ajax', 'gurus' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'gurus' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'gurus' ),
                                'loadmore' => esc_html__('Loadmore', 'gurus' ),
                                'false' => esc_html__('Disable', 'gurus' ),
                            ],
                        ),
                        // 
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns: Screen <= 575', 'gurus' ),
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
                            'label' => esc_html__('Columns: Screen <= 767', 'gurus' ),
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
                            'label' => esc_html__('Columns: Screen <= 991', 'gurus' ),
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns: Screen <= 1199', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns: Screen <= 1399', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'col-66' => 'Column 66%',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns: Screen => 1400', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'col-66' => 'Column 66%',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'description' => 'Default: 15',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-item' => 'padding:{{SIZE}}px;',
                                '{{WRAPPER}} .pxl-grid .pxl-post--inner' => 'margin-bottom:0px;',
                                '{{WRAPPER}} .pxl-grid .pxl-grid-masonry' => 'margin: -{{SIZE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns: Screen <= 575', 'gurus' ),
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
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns: Screen <= 767', 'gurus' ),
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
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns: Screen <= 991', 'gurus' ),
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
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns: Screen <= 1199', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns: Screen <= 1399', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xxl_m',
                                    'label' => esc_html__('Columns: Screen => 1400', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout_service!' => 'service-9',
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout_service!' => 'service-9',
                            ],
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button!' => '',
                                'layout_service!' => 'service-9',
                            ],
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout_service!' => 'service-9',
                            ],
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 16,
                            'condition' => [
                                'show_excerpt!' => '',
                                'layout_service!' => 'service-9',
                            ],
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout_service' => 'service-9',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_testimonial',
                    'label' => esc_html__('Testimonial', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'condition' => [
                        'layout_service' => ['service-6']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Auto play', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'delay',
                            'label' => esc_html__('Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'autoplay!' => '',
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause On Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pause_on_interaction',
                            'label' => esc_html__('Pause On Interaction', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'loop',
                            'label' => esc_html__('Loop', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Speed', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                        ),
                    ),
                ),
                // 
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Item First', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout_service' => ['service-6']
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'item_first',
                            'label' => esc_html__('Item First', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2,
                            'label_block' => true , 
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"]',
                            'condition' => [
                                'item_first!' => '',
                            ],
                        ),
                        array(
                            'name' => 'subtitle',
                            'label' => esc_html__('Subtitle', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true , 
                            'condition' => [
                                'item_first!' => '',
                            ],
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true , 
                            'rows' => 3,
                        ), 
                    ),
                ),
                array(
                    'name' => 'section_content_testimonial',
                    'label' => esc_html__('Testimonial', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout_service' => ['service-6']
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'testimonial_icon',
                            'label' => esc_html__('Icon', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'bg_testimonial',
                            'label' => esc_html__('Background', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 3,
                                ),
                                array(
                                    'name' => 'client',
                                    'label' => esc_html__('Client', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => 'true',
                                    'placeholder' => 'Ex: Tai Smile.',
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => 'true',
                                    'placeholder' => 'Ex: CEO of MDS Ltd.',
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(  
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-custom .pxl-grid-inner' => 'margin: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid-custom .pxl-item--post, {{WRAPPER}} .pxl-grid-custom .pxl-item--first' => 'padding: {{SIZE}}{{UNIT}}',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_item_post',
                    'label' => esc_html__('Item Post', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array(  
                        array(
                            'name' => 'normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--container' => 'background-color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'min_height',
                            'label' => esc_html__('Min Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--container' => 'min-height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_normal',
                            'label' => esc_html__('CONTENT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'content_max_width',
                            'label' => esc_html__('Max Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner' => 'max-width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'icon_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'icon_filter',
                            'label' => esc_html__('Filters', 'gurus' ),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--icon img',
                        ),
                        array(
                            'name' => 'icon_width',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--icon img' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--icon img' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_box_style',
                    'label' => esc_html__('Box', 'mouno' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover',
                                        ),
                                        array(
                                            'name' => '_box_hover_border_color',
                                            'label' => esc_html__('Border Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
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
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--title',
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'title_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'title_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'title_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--title',
                                        ),
                                        array(
                                            'name' => 'title_text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--title',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--title',
                                        ),
                                        array(
                                            'name' => 'title_hover_text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--title',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_category_style',
                    'label' => esc_html__('Category', 'mouno' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => 'service-9',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'category_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--category',
                        ),
                        array(
                            'name' => 'category_text_shadow',
                            'label' => esc_html__('Text Shadow', 'mouno' ),
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--category',
                        ),
                        array(
                            'name' => 'category_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'category_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'category_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a',
                                        ),
                                        array(
                                            'name' => 'cateogry_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a',
                                        ),
                                        array(
                                            'name'         => 'cateogry_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a',
                                        ),
                                        array(
                                            'name' => 'cateogry_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'cateogry_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--category > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'category_hover',
                                    'label' => esc_html__('Hover', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'category_hover_color',
                                            'label' => esc_html__('Text Color', 'mouno' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a',
                                        ),
                                        array(
                                            'name' => 'category_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a',
                                        ),
                                        array(
                                            'name'         => 'category_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'mouno' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a',
                                        ),
                                        array(
                                            'name' => 'category_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--category > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_excerpt',
                    'label' => esc_html__('Excertp', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'excerpt_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--excerpt' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--excerpt',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_btn',
                    'label' => esc_html__('Button', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'btn_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .btn.pxl-post--btn' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .btn.pxl-post--btn',
                        ),
                        array(
                            'name' => 'btn_border',
                            'label' => esc_html__('Border', 'gurus' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .btn.pxl-post--btn',
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--btn.btn' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--btn.btn' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .btn.pxl-post--btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Featured', 'mouno' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => 'service-9',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'featured_h',
                            'label' => esc_html__('Height', 'mouno'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--img' => "height: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'featured_max_h',
                            'label' => esc_html__('Max Height', 'mouno'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-post--img' => "max-height: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'featured_divider',
                            'type' => 'divider',
                        ),
                        array(
                            'name' => 'featured_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'featured_normal',
                                    'label' => esc_html__('Normal', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'featured_opacity',
                                            'label' => esc_html__('Opacity', 'mouno' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_css_filter', 
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_border', 
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_box_shadow', 
                                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'featured_hover',
                                    'label' => esc_html__('Hover/Active', 'mouno' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'featured_hover_h',
                                            'label' => esc_html__('Height', 'mouno'),
                                            'type' => 'slider',
                                            'size_units' => ['px', 'custom'],
                                            'separator' => 'before',
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1000,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img' => "height: {{SIZE}}{{UNIT}};",
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_opacity',
                                            'label' => esc_html__('Opacity', 'mouno' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_css_filter', 
                                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border', 
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_box_shadow', 
                                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_hover_padding',
                                            'label' => esc_html__('Padding', 'mouno' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service-grid .pxl-post--inner:hover .pxl-post--img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_item_first',
                    'label' => esc_html__('Item First', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'item_first_title_normal',
                            'label' => esc_html__('TITLE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'item_first_title_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--title' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'item_first_title_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--title',
                        ),
                        array(
                            'name' => 'item_first_title_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                            'separator' => 'after', 
                        ),
                        array(
                            'name' => 'item_first_title_animate',
                            'label' => esc_html__('Animate', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => gurus_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'item_first_title_animate_delay',
                            'label' => esc_html__('Delay', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'item_first_title_highlight_normal',
                            'label' => esc_html__('HIGHLIGHT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'item_first_title_highlight_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'item_first_title_highlight_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--title .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'divider',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'item_first_subtitle_normal',
                            'label' => esc_html__('SUBTITLE', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'item_first_subtitle_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--subtitle' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'item_first_subtitle_box_color',
                            'label' => esc_html__('Box Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--subtitle .pxl-item--subtext' => 'background-color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'item_first_subtitle_box_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--subtitle .pxl-item--subtext' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_first_subtitle_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--subtitle',
                        ),
                        array(
                            'name' => 'item_first_subtitle_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'item_first_desc_normal',
                            'label' => esc_html__('DESCRIPTION', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'item_first_desc_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--desc' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'item_first_desc_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--first .pxl-item--desc',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_item_testimonial',
                    'label' => esc_html__('Testimonial', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout_service!' => 'service-9',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'testimonial_layout_normal',
                            'label' => esc_html__('NORMAL', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_overlay_color',
                            'label' => esc_html__('Background/Overlay', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-container:after ' => 'background-color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'testimonial_min_height',
                            'label' => esc_html__('Min Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-container' => 'min-height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'testimonial_padding',
                            'label' => esc_html__('Padding', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'testimonial_border_radius',
                            'label' => esc_html__('Border Radius', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'testimonial_inner_normal',
                            'label' => esc_html__('CONTENT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_inner_max_width',
                            'label' => esc_html__('Max Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-slide-content' => 'max-width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider6',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'testimonial_icon_normal',
                            'label' => esc_html__('ICON/SVG', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_icon_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon svg path' => 'fill: {{VALUE}};' ,
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon' => 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'testimonial_icon_font_size',
                            'label' => esc_html__('Font Size', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon svg' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'testimonial_icon_width',
                            'label' => esc_html__('Width', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'testimonial_icon_height',
                            'label' => esc_html__('Height', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon svg' => 'height: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'testimonial_icon_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider5',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'testimonial_content_normal',
                            'label' => esc_html__('CONTENT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_content_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--content' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'testimonial_content_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--content',
                        ),

                        array(
                            'name' => 'divider3',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'testimonial_client_normal',
                            'label' => esc_html__('CLIENT', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_client_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--client' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'testimonial_client_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--client',
                        ),
                        array(
                            'name' => 'testimonial_client_spacing_bottom',
                            'label' => esc_html__('Spacing Bottom', 'gurus'),
                            'type' => Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--client' => 'margin-bottom: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                        array(
                            'name' => 'divider4',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'testimonial_position_normal',
                            'label' => esc_html__('POSITION', 'gurus'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'testimonial_position_color',
                            'label' => esc_html__('Color', 'gurus'),
                            'type' => Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--position' => 'color: {{VALUE}};' ,
                            ],
                        ),
                        array(
                            'name' => 'testimonial_position_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service-grid .pxl-item--testimonial .pxl-swiper-slide .pxl-item--position',
                        ),


                    ),
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);