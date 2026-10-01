<?php 
/* Start Section */
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_controls' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_overlay_color' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_overlay_img' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_divider' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_particles' );
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_effect_image' );
add_action( 'elementor/element/section/section_structure/after_section_end', 'gurus_add_custom_section_background_parallax' );

function gurus_add_custom_section_controls( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_pxl',
        [
            'label' => esc_html__( 'Gurus General Settings', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header-mobile') {
          
        $element->add_control(
            'pxl_header_type',
            [
                'label' => esc_html__( 'Header Type', 'gurus' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'gurus' ),
                    'sticky'      => esc_html__( 'Header Sticky', 'gurus' ),
                ),
                'default'      => '',
            ]
        );
    }

    $element->add_control(
        'row_scroll_fixed',
        [
            'label'   => esc_html__( 'Column Fixed', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'gurus' ),
                'fixed'   => esc_html__( 'Yes', 'gurus' ),
            ),
            'prefix_class' => 'pxl-row-scroll-',
            'default'      => 'none',      
        ]
    );

    $element->add_control(
        'row_zoom_point',
        [
            'label'   => esc_html__( 'Zoom Point', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'description' => 'Background color displayed on scroll.',
            'options' => array(
                'false'        => esc_html__( 'No', 'gurus' ),
                'true'   => esc_html__( 'Yes', 'gurus' ),
            ),
            'default'      => 'false',
            'prefix_class' => 'pxl-zoom-point-',      
        ]
    );

    $element->add_control(
        'pxl_section_overflow',
        [
            'label'   => esc_html__( 'Overflow', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'visible'        => esc_html__( 'Visible', 'gurus' ),
                'hidden'   => esc_html__( 'Hidden', 'gurus' ),
            ),
            'default'      => 'visible', 
            'separator' => 'after',
            'prefix_class' => 'pxl-section-overflow-'     
        ]
    );

    $element->add_control(
        'pxl_section_fixed_scroll',
        [
            'label'   => esc_html__( 'Section Fixed Scroll', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'gurus' ),
                'top'        => esc_html__( 'Top', 'gurus' ),
                'bottom'   => esc_html__( 'Bottom', 'gurus' ),
            ),
            'default'      => 'none', 
            'separator' => 'after',
            'prefix_class' => 'pxl-section-fix-'     
        ]
    );

    $element->add_control(
        'pxl_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'gurus' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => false,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );

    $element->add_control(
        'pxl_parallax_bg_img_overlay',
        [
            'label' => esc_html__( 'Background Overlay Color', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'hide_in_inner' => false,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-color: {{VALUE}};',
            ],
        ]
    );

    $element->add_responsive_control(
        'pxl_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'center center' => esc_html__( 'Center Center', 'gurus' ),
                'center left'   => esc_html__( 'Center Left', 'gurus' ),
                'center right'  => esc_html__( 'Center Right', 'gurus' ),
                'top center'    => esc_html__( 'Top Center', 'gurus' ),
                'top left'      => esc_html__( 'Top Left', 'gurus' ),
                'top right'     => esc_html__( 'Top Right', 'gurus' ),
                'bottom center' => esc_html__( 'Bottom Center', 'gurus' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'gurus' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'gurus' ),
                'initial'       =>  esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
     
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_bg_pos_custom_y.SIZE}}{{pxl_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{pxl_parallax_bg_pos_custom_x.SIZE}}{{pxl_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'auto' => esc_html__( 'Auto', 'gurus' ),
                'cover'   => esc_html__( 'Cover', 'gurus' ),
                'contain'  => esc_html__( 'Contain', 'gurus' ),
                'initial'    => esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_parallax_bg_size' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'gurus' ),
            'label_on' => esc_html__( 'Custom', 'gurus' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_responsive_control(
            'pxl_parallax_pos_left',
            [
                'label' => esc_html__( 'Left', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_top',
            [
                'label' => esc_html__( 'Top', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_parallax_pos_right',
            [
                'label' => esc_html__( 'Right', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
    $element->end_popover();

    $element->add_control(
        'pxl_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'gurus' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'gurus' ),
            'label_on' => esc_html__( 'Custom', 'gurus' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_control(
            'pxl_parallax_bg_img_effect_x',
            [
                'label' => esc_html__( 'TranslateX', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_y',
            [
                'label' => esc_html__( 'TranslateY', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_z',
            [
                'label' => esc_html__( 'TranslateZ', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_x',
            [
                'label' => esc_html__( 'Rotate X', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_x',
            [
                'label' => esc_html__( 'Scale X', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_y',
            [
                'label' => esc_html__( 'Scale Y', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_z',
            [
                'label' => esc_html__( 'Scale Z', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale',
            [
                'label' => esc_html__( 'Scale', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_from_scroll_custom',
            [
                'label' => esc_html__( 'Scroll From (px)', 'gurus' ).' (350) from offset top',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_section_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-section-bg-parallax',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_section_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );

    $element->add_control(
        'full_content_with_space',
        [
          'label' => esc_html__( 'Full Content with space from?', 'gurus' ),
          'type'         => \Elementor\Controls_Manager::SELECT,
                'prefix_class' => 'pxl-full-content-with-space-',
                'options'      => array(
                    'none'    => esc_html__( 'None', 'gurus' ),
                    'start'   => esc_html__( 'Start', 'gurus' ),
                    'end'     => esc_html__( 'End', 'gurus' ),
                ),
                'default'      => 'none',
                'condition' => [
                    'layout' => 'full_width'
                ]
        ]
    );
       
    $element->add_control(
        'pxl_container_width',
        [
                'label' => esc_html__('Container Width', 'gurus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1200,
                'condition' => [
                  'layout' => 'full_width',
                    'full_content_with_space!' => 'none'
                ]           
        ]
    );
      
    $element->end_controls_section();
};
function gurus_add_custom_section_overlay_color( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_overlay_color',
        [
            'label' => esc_html__( 'Gurus Overlay Color', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'pxl_color_offset',
        [
            'label'   => esc_html__( 'Overlay Color', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'gurus' ),
                'full'   => esc_html__( 'Full', 'gurus' ),
                'skew'   => esc_html__( 'Skew', 'gurus' ),
                'container' => esc_html__( 'Container', 'gurus' ),
            ),
            'prefix_class' => 'pxl-bg-color-',
            'default'      => 'none',
        ]
    );

    $element->add_responsive_control(
        'overlay_left_space',
        [
            'label' => esc_html__('Overlay Left Space', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px','%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['full'],
            ],
        ]
    );

    $element->add_responsive_control(
        'overlay_right_space',
        [
            'label' => esc_html__('Overlay Right Space', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px','%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['full'],
            ],
        ]
    );

    $element->add_control(
        'offset_color',
        [
            'label' => esc_html__('Overlay Color', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color, {{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color, {{WRAPPER}}.pxl-bg-color-skew .pxl-section-overlay-color' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['full','skew'],
            ],
        ]
    );

    $element->add_control(
        'overlay_broder_radius',
        [
            'label' => esc_html__('Overlay Border Radius', 'gurus' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color, {{WRAPPER}}.pxl-bg-color-full .pxl-section-overlay-color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['full'],
            ],
        ]
    );
      
    $element->end_controls_section();
};

function gurus_add_custom_section_overlay_img( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_overlay_img',
        [
            'label' => esc_html__( 'Gurus Overlay Image', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'pxl_overlay_display',
        [
            'label'   => esc_html__( 'Overlay Image', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'gurus' ),
                'image'   => esc_html__( 'Yes', 'gurus' ),
            ),
            'prefix_class' => 'pxl-section-overlay-',
            'default'      => 'none',
        ]
    );

    $element->add_control(
        'pxl_overlay_img',
        [
            'label'   => esc_html__( 'Select Image 1', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'condition' => [
                'pxl_overlay_display' => ['image'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageLeft .bg-image' => 'background-image: url( {{URL}} );',
            ],
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_position',
        [
            'label' => esc_html__( 'Background Position - Image 1', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'center center' => esc_html__( 'Center Center', 'gurus' ),
                'center left'   => esc_html__( 'Center Left', 'gurus' ),
                'center right'  => esc_html__( 'Center Right', 'gurus' ),
                'top center'    => esc_html__( 'Top Center', 'gurus' ),
                'top left'      => esc_html__( 'Top Left', 'gurus' ),
                'top right'     => esc_html__( 'Top Right', 'gurus' ),
                'bottom center' => esc_html__( 'Bottom Center', 'gurus' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'gurus' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'gurus' ),
                'initial'       =>  esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageLeft .bg-image' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_overlay_img[url]!' => ''
            ]     
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_left_broder_radius',
        [
            'label' => esc_html__('Border Radius - Image 1', 'gurus' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageLeft .bg-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_img[url]!' => ''
            ]
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_left_margin',
        [
            'label' => esc_html__('Margin - Image 1', 'gurus' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageLeft' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_img[url]!' => ''
            ]
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_width_left',
        [
            'label' => esc_html__('Width Image 1', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ '%', 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1920,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageLeft' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_display' => ['image'],
                'pxl_overlay_img[url]!' => ''
            ],  
        ]
    );

    $element->add_control(
        'pxl_overlay_img2',
        [
            'label'   => esc_html__( 'Select Image 2', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'condition' => [
                'pxl_overlay_display' => ['image'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight .bg-image' => 'background-image: url( {{URL}} );',
            ],
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_right_position',
        [
            'label' => esc_html__( 'Background Position - Image 2', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'center center' => esc_html__( 'Center Center', 'gurus' ),
                'center left'   => esc_html__( 'Center Left', 'gurus' ),
                'center right'  => esc_html__( 'Center Right', 'gurus' ),
                'top center'    => esc_html__( 'Top Center', 'gurus' ),
                'top left'      => esc_html__( 'Top Left', 'gurus' ),
                'top right'     => esc_html__( 'Top Right', 'gurus' ),
                'bottom center' => esc_html__( 'Bottom Center', 'gurus' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'gurus' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'gurus' ),
                'initial'       =>  esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight .bg-image' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_overlay_img2[url]!' => ''
            ]      
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_right_broder_radius',
        [
            'label' => esc_html__('Border Radius - Image 2', 'gurus' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight .bg-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_img2[url]!' => ''
            ]
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_right_margin',
        [
            'label' => esc_html__('Margin - Image 2', 'gurus' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_img2[url]!' => ''
            ]
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_width_right',
        [
            'label' => esc_html__('Width Image 2', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ '%', 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1920,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_overlay_display' => ['image'],
                'pxl_overlay_img2[url]!' => ''
            ],  
        ]
    );

    $element->add_responsive_control(
        'pxl_overlay_img_offset_left',
        [
            'label' => esc_html__('Offset Left - Image 2', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 10000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-overlay--image.pxl-overlay--imageRight .bg-image' => 'margin-left: -{{SIZE}}{{UNIT}}; width: calc(100% + {{SIZE}}{{UNIT}});',
            ],
            'condition' => [
                'pxl_overlay_img2[url]!' => ''
            ],  
        ]
    );
      
    $element->end_controls_section();
};

function gurus_add_custom_section_divider( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_divider',
        [
            'label' => esc_html__( 'Gurus Divider', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'row_divider',
        [
            'label'   => esc_html__( 'Divider', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'None', 'gurus' ),
                'rounded-top'   => esc_html__( 'Rounded Top', 'gurus' ),
                'angle-top'   => esc_html__( 'Angle Top Left', 'gurus' ),
                'angle-top-right'   => esc_html__( 'Angle Top Right', 'gurus' ),
                'angle-bottom-left'   => esc_html__( 'Angle Bottom Left', 'gurus' ),
                'angle-bottom'   => esc_html__( 'Angle Bottom Right', 'gurus' ),
                'angle-top-bottom'   => esc_html__( 'Angle Top & Bottom Right', 'gurus' ),
                'angle-top-bottom-left'   => esc_html__( 'Angle Top & Bottom Left', 'gurus' ),
                'wave-animation-top'   => esc_html__( 'Wave Animation Top', 'gurus' ),
                'wave-animation-bottom'   => esc_html__( 'Wave Animation Bottom 1', 'gurus' ),
                'wave-animation-bottom2'   => esc_html__( 'Wave Animation Bottom 2', 'gurus' ),
                'curved-top'   => esc_html__( 'Curved Top', 'gurus' ),
                'curved-bottom'   => esc_html__( 'Curved Bottom', 'gurus' ),
                'vertical1'   => esc_html__( 'Divider Vertical', 'gurus' ),
                'curved-arrow'   => esc_html__( 'Curved Arrow', 'gurus' ),
                'curved-arrow-inner-top'   => esc_html__( 'Curved Arrow Inner Top', 'gurus' ),
                'curved-arrow-inner-bottom'   => esc_html__( 'Curved Arrow Inner Bottom', 'gurus' ),
                'divider-border'   => esc_html__( 'Divider Broder Top/Bottom', 'gurus' ),
                'gurus-divider1'   => esc_html__( 'Gurus Divider 1', 'gurus' ),
                'gurus-divider2'   => esc_html__( 'Gurus Divider 2', 'gurus' ),
                'gurus-divider3'   => esc_html__( 'Gurus Divider 3', 'gurus' ),
            ),
            'prefix_class' => 'pxl-row-divider-active pxl-row-divider-',
            'default'      => '',
        ]
    );

    $element->add_control(
        'divider_color',
        [
            'label' => esc_html__('Divider Color', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-wave-parallax > use, {{WRAPPER}} .pxl-curved-arrow, {{WRAPPER}} .pxl-curved-arrow-inner-top, {{WRAPPER}} .pxl-curved-arrow-inner-bottom, {{WRAPPER}} .pxl-row-divider-top, {{WRAPPER}} .pxl-row-divider-bottom' => 'fill: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-divider-vertical > div' => 'background-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'row_divider!' => ['gurus-divider1','gurus-divider3'],
            ], 
        ]
    );

    $element->add_control(
        'divider_color_top',
        [
            'label' => esc_html__('Divider Color Top', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-row-divider-top' => 'fill: {{VALUE}} !important;',
            ],
            'condition' => [
                'row_divider' => ['gurus-divider1','gurus-divider3'],
            ], 
        ]
    );

    $element->add_control(
        'divider_color_bottom',
        [
            'label' => esc_html__('Divider Color Bottom', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-row-divider-bottom' => 'fill: {{VALUE}} !important;',
            ],
            'condition' => [
                'row_divider' => ['gurus-divider1','gurus-divider3'],
            ], 
        ]
    );

    $element->add_responsive_control(
        'divider_height',
        [
            'label' => esc_html__('Divider Height', 'gurus' ),
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
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-section-waves, {{WRAPPER}} .pxl-row-svg' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'row_divider!' => ['vertical1','curved-arrow','curved-arrow-inner-top','curved-arrow-inner-bottom','divider-border','gurus-divider1','gurus-divider2','gurus-divider3'],
            ],     
        ]
    );
      
    $element->end_controls_section();
};

function gurus_add_custom_section_particles( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_particles',
        [
            'label' => esc_html__( 'Gurus Particles', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_particles_display',
        [
            'label'   => esc_html__( 'Particles', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',  
        ]
    );

    $element->add_control(
        'number',
        [
                'label' => esc_html__('Number', 'gurus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,      
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],     
        ]
    );

    $element->add_control(
        'size',
        [
                'label' => esc_html__('Size', 'gurus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3, 
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],           
        ]
    );

    $element->add_control(
        'size_random',
        [
                'label' => esc_html__('Size Random', 'gurus'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'false',
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],   
        ]
    );

    $element->add_control(
        'move_direction',
        [
            'label'   => esc_html__( 'Move Direction', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'gurus' ),
                'top'        => esc_html__( 'Top', 'gurus' ),
                'top-right'        => esc_html__( 'Top Right', 'gurus' ),
                'right'        => esc_html__( 'Right', 'gurus' ),
                'bottom-right'        => esc_html__( 'Bottom Right', 'gurus' ),
                'bottom'        => esc_html__( 'Bottom', 'gurus' ),
                'bottom-left'        => esc_html__( 'Bottom Left', 'gurus' ),
                'left'        => esc_html__( 'Left', 'gurus' ),
                'top-left'        => esc_html__( 'Top Left', 'gurus' ),
            ),
            'default'      => 'none',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],  
        ]
    );

    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'particle_color', 
        [
            'label' => esc_html__('Color', 'gurus' ),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );
    $element->add_control(
        'particle_color_item',
        [
            'label' => esc_html__('Color', 'gurus'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'condition' => [
                'row_particles_display' => ['yes'],
            ],    
        ]
    );
      
    $element->end_controls_section();
};

function gurus_add_custom_section_effect_image( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_effect_image',
        [
            'label' => esc_html__( 'Gurus Effect Images', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $repeater_img = new \Elementor\Repeater();

    $repeater_img->add_control(
        'item_image', 
        [
            'label' => esc_html__('Image', 'gurus' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]
    );

    $repeater_img->add_control(
        'image_position', 
        [
            'label' => esc_html__('Image Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'p-top-left' => 'Top Left',
                'p-top-right' => 'Top Right',
                'p-bottom-left' => 'Bottom Left',
                'p-bottom-right' => 'Bottom Right',
            ],
            'default' => 'p-top-left',
        ]
    );

    $repeater_img->add_control(
        'image_position_top', 
        [
            'label' => esc_html__('Top Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'default' => [
                'size' => 0,
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-effect-images {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_position' => ['p-top-left', 'p-top-right'],
            ],
        ]
    );

    $repeater_img->add_control(
        'image_position_left', 
        [
            'label' => esc_html__('Left Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'default' => [
                'size' => 0,
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-effect-images {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_position' => ['p-top-left', 'p-bottom-left'],
            ],
        ]
    );

    $repeater_img->add_control(
        'image_position_bottom', 
        [
            'label' => esc_html__('Bottom Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'default' => [
                'size' => 0,
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-effect-images {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_position' => ['p-bottom-left', 'p-bottom-right'],
            ],
        ]
    );

    $repeater_img->add_control(
        'image_position_right', 
        [
            'label' => esc_html__('Right Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'default' => [
                'size' => 0,
                'unit' => '%',
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-effect-images {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_position' => ['p-top-right', 'p-bottom-right'],
            ],
        ]
    );

    $repeater_img->add_control(
        'effect_image', 
        [
            'label' => esc_html__('Image Effect', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => 'None',
                'pxl-image-spin' => 'Spin',
                'pxl-image-bounce' => 'Bounce',
                'slide-up-down' => 'Slide Up Down',
                'slide-top-to-bottom' => 'Slide Top To Bottom ',
                'pxl-image-effect2' => 'Slide Bottom To Top ',
                'slide-right-to-left' => 'Slide Right To Left ',
                'slide-left-to-right' => 'Slide Left To Right ',
                'pxl-parallax-scroll' => 'Parallax Scroll',
                'pxl-parallax-hover' => 'Parallax Hover',
            ],
            'default' => '',
        ]
    );
    
    $repeater_img->add_control(
        'parallax_scroll_type', 
        [
            'label' => esc_html__('Parallax Scroll Type', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'y' => 'Effect Y',
                'x' => 'Effect X',
                'z' => 'Effect Z',
            ],
            'default' => 'y',
            'condition' => [
                'effect_image' => 'pxl-parallax-scroll',
            ],
        ]
    );

    $repeater_img->add_control(
        'parallax_scroll_value', 
        [
            'label' => esc_html__('Parallax Scroll Value', 'gurus' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '80',
            'description' => esc_html__('Enter number.', 'gurus' ),
            'condition' => [
                'effect_image' => 'pxl-parallax-scroll',
            ],
        ]
    );

    $repeater_img->add_control(
        'parallax_hover_value', 
        [
            'label' => esc_html__('Parallax Hover Value', 'gurus' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '40',
            'description' => esc_html__('Enter number.', 'gurus' ),
            'condition' => [
                'effect_image' => 'pxl-parallax-hover',
            ],
        ]
    );

    
    $repeater_img->add_responsive_control(
        'image_max_width', 
        [
            'label' => esc_html__('Max Width', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'control_type' => 'responsive',
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-effect-images {{CURRENT_ITEM}}' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $repeater_img->add_control(
        'image_display', 
        [
            'label' => esc_html__('Hide on Screen <= 1400px', 'gurus'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ]
    );

    $repeater_img->add_control(
        'image_display_md', 
        [
            'label' => esc_html__('Hide on Screen <= 1200px', 'gurus'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ]
    );

    $repeater_img->add_control(
        'image_display_sm', 
        [
            'label' => esc_html__('Hide on Screen <= 767px', 'gurus'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ]
    );

    $element->add_control(
        'row_effect_images',
        [
            'label'   => esc_html__( 'Images', 'gurus' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater_img->get_controls(),
            'default' => [],
        ]
    );
      
    $element->end_controls_section();
};

function gurus_add_custom_section_background_parallax( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'section_background_parallax',
        [
            'label' => esc_html__( 'Background Parallax', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $element->add_control(
        'bg_parallax',
        [
            'label' => esc_html__( 'Rellax Background Image', 'gurus' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => false,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ],
    );
    $element->add_responsive_control(
        'bg_parallax_height',
        [
            'label' => esc_html__('Height', 'gurus' ),
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
                '{{WRAPPER}} ' => 'height: {{SIZE}}{{UNIT}};',
            ],     
        ]
    );
    $element->add_responsive_control(
        'bg_parallax_value',
        [
            'label' => esc_html__('Parralax Value', 'gurus' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'control_type' => 'responsive',
            'min' => -10,
            'max' => 10,
        ]
    );
    $element->add_responsive_control(
        'bg_parallax_z_index', 
        [
            'label' => esc_html__('Z-Index', 'gurus' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'z-index: {{VALUE}}',
            ],
        ],
    );
    $element->end_controls_section();
}


/* End Section */

/* Start Column */
add_action( 'elementor/element/column/layout/after_section_end', 'gurus_add_custom_columns_controls' ); 
function gurus_add_custom_columns_controls( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'columns_pxl',
        [
            'label' => esc_html__( 'Gurus General Settings', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'col_content_align',
        [
            'label'   => esc_html__( 'Column Content Align', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''           => esc_html__( 'Default', 'gurus' ),
                'start'           => esc_html__( 'Start', 'gurus' ),
                'center'           => esc_html__( 'Center', 'gurus' ),
                'end'           => esc_html__( 'End', 'gurus' ),
            ),
            'default' => '',
            'prefix_class' => 'pxl-col-align-'
        ]
    );

    $element->add_control(
        'col_sticky',
        [
            'label'   => esc_html__( 'Column Sticky', 'gurus' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'           => esc_html__( 'No', 'gurus' ),
                'sticky' => esc_html__( 'Yes', 'gurus' ),
            ),
            'default' => 'none',
            'prefix_class' => 'pxl-column-'
        ]
    );

    $element->add_control(
        'col_sticky_offset_top',
        [
            'label' => esc_html__( 'Sticky Offset Top', 'gurus' ),
            'type' => 'text',
            'description' => esc_html__('Enter number.', 'gurus' ),
            'default'  => '30',
            'selectors' => [
                '{{WRAPPER}}.pxl-column-sticky' => 'top: {{VALUE}}'.'px',
            ],
            'condition' => [
                'col_sticky' => 'sticky'
            ]
        ]
    );

    $element->add_control(
        'pxl_column_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'gurus' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );



    $element->add_responsive_control(
        'pxl_column_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'center center' => esc_html__( 'Center Center', 'gurus' ),
                'center left'   => esc_html__( 'Center Left', 'gurus' ),
                'center right'  => esc_html__( 'Center Right', 'gurus' ),
                'top center'    => esc_html__( 'Top Center', 'gurus' ),
                'top left'      => esc_html__( 'Top Left', 'gurus' ),
                'top right'     => esc_html__( 'Top Right', 'gurus' ),
                'bottom center' => esc_html__( 'Bottom Center', 'gurus' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'gurus' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'gurus' ),
                'initial'       =>  esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
     
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_column_parallax_bg_pos_custom_y.SIZE}}{{pxl_column_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{pxl_column_parallax_bg_pos_custom_x.SIZE}}{{pxl_column_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'gurus' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'gurus' ),
                'auto' => esc_html__( 'Auto', 'gurus' ),
                'cover'   => esc_html__( 'Cover', 'gurus' ),
                'contain'  => esc_html__( 'Contain', 'gurus' ),
                'initial'    => esc_html__( 'Custom', 'gurus' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_column_parallax_bg_size' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_column_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'gurus' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'gurus' ),
            'label_on' => esc_html__( 'Custom', 'gurus' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_responsive_control(
            'pxl_column_parallax_pos_left',
            [
                'label' => esc_html__( 'Left', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_column_parallax_pos_top',
            [
                'label' => esc_html__( 'Top', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_column_parallax_pos_right',
            [
                'label' => esc_html__( 'Right', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_column_parallax_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'gurus' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-column-bg-parallax' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
    $element->end_popover();

    $element->add_control(
        'pxl_column_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'gurus' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'gurus' ),
            'label_on' => esc_html__( 'Custom', 'gurus' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_x',
            [
                'label' => esc_html__( 'TranslateX', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_y',
            [
                'label' => esc_html__( 'TranslateY', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_z',
            [
                'label' => esc_html__( 'TranslateZ', 'gurus' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_x',
            [
                'label' => esc_html__( 'Rotate X', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z', 'gurus' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_x',
            [
                'label' => esc_html__( 'Scale X', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_y',
            [
                'label' => esc_html__( 'Scale Y', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale_z',
            [
                'label' => esc_html__( 'Scale Z', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_img_effect_scale',
            [
                'label' => esc_html__( 'Scale', 'gurus' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_column_parallax_bg_from_scroll_custom',
            [
                'label' => esc_html__( 'Scroll From (px)', 'gurus' ).' (350) from offset top',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_column_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_column_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-column-bg-parallax',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );

    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'gurus'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'gurus' ),
            'label_off' => esc_html__( 'No', 'gurus' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );

    
    $element->add_responsive_control(
        'pxl_column_parallax_bg_img_height',
        [
            'label' => esc_html__( 'Background Height', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}}' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $element->end_controls_section();
}

add_action( 'elementor/element/column/layout/after_section_end', 'gurus_add_custom_column_background_parallax' ); 
function gurus_add_custom_column_background_parallax( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'col_rellax_parralax',
        [
            'label' => esc_html__( 'Rellax Background Parallax', 'gurus' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $element->add_control(
        'rellax_background',
        [
            'label' => esc_html__( 'Rellax Background Image', 'gurus' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => false,
            'selectors' => [
                '{{WRAPPER}} .pxl-rellax-parallax' => 'background-image: url( {{URL}} );',
            ],
        ],
    );

    $element->add_responsive_control(
        'rellax_overflow', 
        [
            'label' => esc_html__('Overflow', 'gurus' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__('Default', 'gurus'),
                'hidden' => esc_html('Hidden', 'gurus'), 
                'auto' => esc_html('Auto', 'gurus'), 
            ],
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .elementor-widget-wrap' => 'overflow: {{VALUE}};',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_background_height',
        [
            'label' => esc_html__('Height', 'gurus' ),
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
                '{{WRAPPER}}' => 'min-height: {{SIZE}}{{UNIT}};',
            ],    
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_value', 
        [
            'label' => esc_html__('Value', 'gurus' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => -4,
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_bg_top',
        [
            'label' => esc_html__('Top', 'gurus' ),
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
                '{{WRAPPER}} .pxl-rellax-parallax' => 'top: {{SIZE}}{{UNIT}};',
            ],     
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_bg_right',
        [
            'label' => esc_html__('Right', 'gurus' ),
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
                '{{WRAPPER}} .pxl-rellax-parallax' => 'right: {{SIZE}}{{UNIT}};',
            ],     
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_bg_bottom',
        [
            'label' => esc_html__('Bottom', 'gurus' ),
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
                '{{WRAPPER}} .pxl-rellax-parallax' => 'bottom: {{SIZE}}{{UNIT}};',
            ],   
            'condition' => [
                'rellax_background[url]!' => '',
            ],  
        ],
    );
    $element->add_responsive_control(
        'rellax_bg_left',
        [
            'label' => esc_html__('Left', 'gurus' ),
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
                '{{WRAPPER}} .pxl-rellax-parallax' => 'left: {{SIZE}}{{UNIT}};',
            ],     
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );
    $element->add_responsive_control(
        'rellax_background_z_index', 
        [
            'label' => esc_html__('Z-Index', 'gurus' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} .pxl-rellax-parallax' => 'z-index: {{VALUE}}',
            ],
            'condition' => [
                'rellax_background[url]!' => '',
            ],
        ],
    );

    $element->end_controls_section();
}

/* End Column */

add_action( 'elementor/element/after_add_attributes', 'gurus_custom_el_attributes', 10, 1 );
function gurus_custom_el_attributes($el){
    if( 'section' !== $el->get_name() ) {
        return;
    }
    $settings = $el->get_settings();

    $pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

    if( isset( $settings['stretch_section']) && $settings['stretch_section'] == 'section-stretched') 
        $pxl_container_width = $pxl_container_width - 30;

    $pxl_container_width = $pxl_container_width.'px';

    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'start' ) {
       
        $el->add_render_attribute( '_wrapper', 'style', 'padding-left: calc( (100% - '.$pxl_container_width.')/2);');
    }
    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'end' ) {
       
          $el->add_render_attribute( '_wrapper >', 'style', 'padding-right: calc( (100% - '.$pxl_container_width.')/2);');
    }
    if( 'section' == $el->get_name() ) {
        if ( isset( $settings['pxl_header_type'] ) && !empty($settings['pxl_header_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-'.$settings['pxl_header_type']);
        }
    }
}

add_filter( 'pxl-custom-section/before-render', 'gurus_custom_section_before_render', 10, 3 );
function gurus_custom_section_before_render($html ,$settings, $el) {
    if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_parallax_bg_from_scroll_custom'];
        }
         
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-section-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }

    if(!empty($settings['row_divider'])) {
        if($settings['row_divider'] == 'angle-top' || $settings['row_divider'] == 'angle-bottom' || $settings['row_divider'] == 'angle-top-right' || $settings['row_divider'] == 'angle-bottom-left') {
            $html .=  '<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
        }
        if($settings['row_divider'] == 'angle-top-bottom' || $settings['row_divider'] == 'angle-top-bottom-left') {
            $html .=  '<svg class="pxl-row-angle pxl-row-angle-top" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg><svg class="pxl-row-angle pxl-row-angle-bottom" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
        }
        if($settings['row_divider'] == 'wave-animation-top' || $settings['row_divider'] == 'wave-animation-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 150" fill="#fff"><path d="M 0 26.1978 C 275.76 83.8152 430.707 65.0509 716.279 25.6386 C 930.422 -3.86123 1210.32 -3.98357 1439 9.18045 C 2072.34 45.9691 2201.93 62.4429 2560 26.198 V 172.199 L 0 172.199 V 26.1978 Z"><animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z; M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z; M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z; M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate></path></svg>';
        }
        if($settings['row_divider'] == 'wave-animation-bottom2') {
            $pxl_uniqid = uniqid();
            $html .=  '<svg class="pxl-section-waves pxl-section-waves1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto"><defs><path id="pxl-gentle-wave-'.$pxl_uniqid.'" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" /></defs><g class="pxl-wave-parallax"><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="0" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="3" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="5" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="7" /></g></svg>';
        }
        if($settings['row_divider'] == 'curved-top' || $settings['row_divider'] == 'curved-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 128" version="1.1" preserveAspectRatio="none" style="fill:#ffffff"><path stroke-width="0" d="M-1,126a3693.886,3693.886,0,0,1,1921,2.125V-192H-7Z"></path></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow') {
            $html .=  '<svg class="pxl-curved-arrow pxl-curved-arrow-top" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg><svg class="pxl-curved-arrow pxl-curved-arrow-bottom" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow-inner-top') {
            $html .=  '<svg class="pxl-curved-arrow-inner-top" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow-inner-bottom') {
            $html .=  '<svg class="pxl-curved-arrow-inner-bottom" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'vertical1') {
            $html .=  '<div class="pxl-divider-vertical"><div class="pxl-section-line1"></div><div class="pxl-section-line2"></div><div class="pxl-section-line3"></div><div class="pxl-section-line4"></div><div class="pxl-section-line5"></div><div class="pxl-section-line6"></div></div>';
        }

        if($settings['row_divider'] == 'divider-border') {
            $html .=  '<div class="pxl-divider-border"><div class="pxl-divider-border-top"></div><div class="pxl-divider-border-bottom"></div></div>';
        }

        /* Gurus */
        if($settings['row_divider'] == 'gurus-divider1') {
            $html .=  '<svg class="pxl-row-svg pxl-row-divider-top" version="1.0" viewBox="0 0 4500 160" xmlns="http://www.w3.org/2000/svg"><g transform="translate(0 160) scale(.1 -.1)"><path d="m0 1582c0-16 17-23 98-40 53-12 153-26 222-32 69-5 177-16 240-25 403-56 603-75 791-75 58 0 130-10 220-30 147-32 370-66 694-105 116-14 244-29 285-35 102-12 227-27 400-45 245-25 342-36 412-46 37-5 106-9 155-10 48 0 97-4 108-8s34-5 52-1c17 4 134-1 260-11 125-10 327-26 448-34 243-18 292-31 319-82 13-26 23-31 83-42 98-17 418-7 574 18 135 22 461 33 564 20 245-30 327-43 375-60 156-55 241-71 435-80 105-5 224-15 265-24 210-41 1223-63 2178-45 625 11 655 11 680-7 25-16 50-18 287-15 180 2 315-2 440-13 185-16 224-26 403-96 68-27 79-29 165-23 59 4 106 2 132-5 39-11 310-59 465-81 41-6 102-15 135-21 206-32 943-109 1045-109 20 0 53-9 75-20 21-11 65-25 98-31 34-7 71-22 87-36 18-15 55-29 102-38 40-8 120-28 178-45 270-78 504-116 836-134 127-8 240-18 252-25 26-14 888-8 1002 8 73 9 249 21 623 41 100 5 233 17 296 26 100 15 127 15 226 4 182-21 355 3 500 70 35 16 84 30 118 32 44 4 64 11 85 30 41 38 65 48 122 48 28 0 86 9 129 20 54 14 102 20 157 18 64-2 96 2 169 25 52 17 145 35 220 44 72 8 168 23 215 33 47 11 112 23 145 29s85 15 115 20c579 104 632 111 856 115 186 4 289 14 409 41 71 16 203 58 235 75 73 39 110 44 275 42 152-3 163-2 230 24 62 23 78 25 135 18 94-11 195-10 275 4 43 7 180 12 351 12 181 0 338 6 445 16 196 19 374 14 533-16 120-22 218-25 311-10 33 5 138 15 235 21 96 6 209 16 250 23 49 9 85 10 105 4 17-5 113-9 215-8s311-2 465-5c286-7 484 1 955 41 194 16 303 15 465-6 429-53 1184-97 2070-120 215-6 552-16 750-23 198-6 403-11 455-10s167 3 255 5c147 3 163 1 200-18 47-25 162-38 345-39 69 0 131-4 137-8 12-8 59-17 188-38 88-14 521-59 660-69 66-5 140-14 165-19 26-6 103-8 180-4 79 3 175 0 230-6 52-7 129-14 170-17s140-19 220-34c80-16 206-36 280-45s169-25 210-35c225-57 427-74 718-61 66 3 78 1 137-29 64-33 66-33 123-20 31 6 94 23 139 37 80 24 86 25 181 13 76-10 126-10 225-1 70 6 155 11 188 11 55 0 96 11 109 30 3 4 19 15 37 24 26 13 64 16 210 16 98 0 212-5 253-11 43-6 204-9 380-7 470 4 473 4 512-20 31-19 40-20 103-11 50 7 77 16 95 33 14 13 34 27 46 30 11 4 293 8 625 10s681 9 774 15c179 12 428 45 473 63 18 6 96 8 227 3 164-5 206-4 235 8 53 22 246 32 547 29l273-3 137 64c284 134 407 153 745 117 77-8 163-8 305-1 179 9 208 13 303 43l105 32 410-1c267-1 442-6 502-14 71-10 101-10 131-1 72 22 192 15 274-15l73-27 425-1c234 0 590 6 792 14 280 11 382 12 425 3 32-6 102-20 156-32 109-22 367-28 442-10 22 5 99 14 170 20 205 15 387 37 423 50 32 12 110 10 284-6 46-4 89-1 135 9 37 9 88 19 113 22s57 8 73 11l27 6v354 354h-22500c-21849 0-22500-1-22500-18z"/></g></svg><svg class="pxl-row-svg pxl-row-divider-bottom" version="1.0" viewBox="0 0 4500 160" xmlns="http://www.w3.org/2000/svg"><g transform="translate(0 160) scale(.1 -.1)"><path d="m14556 1508c-10-6-123-16-250-24-332-18-566-56-836-134-58-17-138-37-178-45-47-9-84-23-102-38-16-14-53-29-87-36-33-6-77-20-98-31-22-11-55-20-75-20-102 0-839-77-1045-109-33-6-94-15-135-21-155-22-426-70-465-81-26-7-73-9-132-5-86 6-97 4-165-23-179-70-218-80-403-96-125-11-260-15-440-13-237 3-262 1-287-15-25-18-55-18-680-7-955 18-1968-4-2178-45-41-9-160-19-265-24-194-9-279-25-435-80-48-17-130-30-375-60-103-13-429-2-564 20-156 25-476 35-574 18-60-11-70-16-83-42-27-51-76-64-319-82-121-8-323-24-448-34-126-10-243-15-260-11-18 4-41 3-52-1s-60-8-108-8c-49-1-118-5-155-10-70-10-167-21-412-46-173-18-298-33-400-45-41-6-169-21-285-35-324-39-547-73-694-105-90-20-162-30-220-30-188 0-388-19-791-75-63-9-171-20-240-25-69-6-169-20-223-32-80-17-97-24-97-40 0-17 651-18 22500-18h22500v354 354l-27 6c-16 3-48 8-73 11s-76 13-113 22c-46 10-89 13-135 9-174-16-252-18-284-6-36 13-218 35-423 50-71 6-148 15-170 20-75 18-333 12-442-10-54-12-124-26-156-32-43-9-145-8-425 3-202 8-558 14-792 14l-425-1-73-27c-82-30-202-37-274-15-30 9-60 9-131-1-60-8-235-13-502-14l-410-1-105 32c-95 30-124 34-303 43-142 7-228 7-305-1-338-36-461-17-745 117l-137 64-273-3c-301-3-494 7-547 29-29 12-71 13-235 8-131-5-209-3-227 3-45 18-294 51-473 63-93 6-442 13-774 15s-614 6-625 10c-12 3-32 17-46 30-18 17-45 26-95 33-63 9-72 8-103-11-39-24-42-24-512-20-176 2-337-1-380-7-41-6-155-11-253-11-146 0-184 3-210 16-18 9-34 20-37 24-13 19-54 30-109 30-33 0-118 5-188 11-99 9-149 9-225-1-95-12-101-11-181 13-45 14-108 31-139 37-57 13-59 13-123-20-59-30-71-32-137-29-291 13-493-4-718-61-41-10-136-26-210-35s-200-29-280-45c-80-15-179-31-220-34s-118-10-170-17c-55-6-151-9-230-6-77 4-154 2-180-4-25-5-99-14-165-19-139-10-572-55-660-69-129-21-176-30-188-38-6-4-68-8-137-8-183-1-298-14-345-39-37-19-53-21-200-18-88 2-203 4-255 5s-257-4-455-10c-198-7-535-17-750-23-886-23-1641-67-2070-120-162-21-271-22-465-6-471 40-669 48-955 41-154-3-363-6-465-5s-198-3-215-8c-20-6-56-5-105 4-41 7-154 17-250 23-97 6-202 16-235 21-93 15-191 12-311-10-159-30-337-35-533-16-107 10-264 16-445 16-171 0-308 5-351 12-80 14-181 15-275 4-57-7-73-5-135 18-67 26-78 27-230 24-165-2-202 3-275 42-32 17-164 59-235 75-120 27-223 37-409 41-224 4-277 11-856 115-30 5-82 14-115 20s-98 18-145 29c-47 10-143 25-215 33-75 9-168 27-220 44-73 23-105 27-169 25-55-2-103 4-157 18-43 11-101 20-129 20-57 0-81 10-122 48-21 19-41 26-85 30-34 2-83 16-118 32-145 67-318 91-500 70-99-11-126-11-226 4-63 9-195 21-294 26-370 20-552 32-625 41-111 15-980 21-1004 7z"/></g></svg>';
        }
        if($settings['row_divider'] == 'gurus-divider2') {
            $html .=  '<svg class="pxl-row-svg pxl-row-divider-top" version="1.0" viewBox="0 0 1920 121" xmlns="http://www.w3.org/2000/svg"><g transform="translate(0 121) scale(.1 -.1)"><path d="m0 819v-391l47 7c27 4 140 10 253 14 199 7 207 7 275-16 39-13 99-31 134-39 41-10 80-27 109-50 25-18 51-34 59-34 22 0 95-40 130-71 58-50 100-56 211-29 54 13 117 24 142 25 52 1 188 63 232 107 15 14 49 34 75 43 27 10 75 30 108 45 93 42 148 52 245 45 84-7 86-8 127-50 22-24 51-45 64-47s34-18 47-38c23-34 24-35 91-33 51 1 79 8 116 27 26 14 58 26 70 26 28 0 100 55 142 108 41 51 72 59 129 31 48-23 74-15 74 22 0 10 12 26 26 36 15 10 48 37 74 61 26 23 52 42 57 42 17 0 141 154 168 208 28 56 48 72 90 72 16 0 49 17 83 44 101 78 159 94 253 72 43-10 72-11 102-4 40 9 85 7 155-7 35-8 52 3 168 113l56 52h-2056-2056v-391z"/><path d="m4140 1205c0-3 6-16 14-28 7-12 19-44 26-72 25-100 42-135 83-168 40-31 43-32 146-32 85 0 118 5 166 23 32 12 78 22 100 22 59 0 159 61 199 122 17 26 35 48 40 48s18 8 28 17c13 11 37 17 73 18l55 1 7-36c8-43 29-97 42-104 5-3 43 6 84 21 90 33 107 27 163-49 20-26 42-48 51-48 8 0 54-13 101-29 60-20 116-31 181-35 68-4 104-12 128-26 22-13 52-20 83-20 27 0 69-8 92-19 24-10 65-26 91-34 63-21 220-114 277-164 25-22 55-45 68-52s22-21 22-35c0-13 9-31 20-41 18-17 26-17 63-8 48 13 128 1 147-22 10-12 17-11 51 0 22 8 50 21 62 30 12 8 35 15 52 15 21 0 40 9 55 25 18 19 34 25 67 25 36 0 54 8 99 41 31 22 77 47 102 56 26 8 62 22 80 31l32 17 40-45c22-25 45-58 52-73 14-31 121-100 173-113 17-4 48-26 70-48 58-58 123-108 167-128 21-9 41-23 44-31 4-11 28-14 98-15 92-1 108-5 176-43 19-10 47-19 61-19s50-17 80-39c103-73 134-84 219-78 43 3 84 0 94-5 30-17 68-16 113 0l43 16 27-32 28-32 49 15c66 20 108 19 139-5 21-17 29-18 57-8 25 8 48 8 96-1 34-7 78-10 96-6 67 13 134 38 178 66 25 15 77 37 115 48 39 11 93 32 120 46 38 20 59 25 87 21 35-6 39-4 67 38 17 24 37 46 45 49s16 18 18 34c3 27 5 28 68 31 38 1 84-4 112-13 67-22 93-19 112 10 10 15 26 25 39 25 17 0 28 10 40 36 21 43 73 68 126 59 34-6 39-2 111 70 41 41 81 75 89 75 25 0 84-21 142-51 60-31 116-37 149-17 16 10 24 10 40 0 13-8 64-12 152-12 115 0 142 4 201 24 64 23 70 24 105 9 20-8 82-19 138-24 124-11 176-26 189-56 5-13 14-23 19-23s14-7 20-15c6-9 48-31 94-49 68-28 84-31 93-20 6 8 29 17 51 20 21 4 41 10 44 15s31 6 62 3c39-4 71-1 102 10 25 9 57 16 73 16 15 0 36 9 48 21 26 26 44 20 139-44 125-84 205-75 347 41 50 40 62 46 102 45 25-1 98-19 161-41 102-35 117-38 136-26 12 8 28 12 36 9 9-4 33 3 54 14 21 12 46 21 55 21 8 0 26 11 39 25 40 42 109 58 219 51 69-5 109-2 141 7 44 14 45 15 48 60 4 53 36 87 82 87 15 0 39 9 53 20 33 26 41 25 66-8l20-27 31 38c54 65 78 72 228 72h134l29-33c16-18 38-32 51-32 53 0 100-23 158-76l59-56 57 12c83 17 121 45 127 93 7 52 48 102 114 139 30 17 59 41 64 54 4 13 12 24 16 25 59 8 77 3 83-20 4-20 15-27 58-36 55-13 106-50 98-72-13-32 14-17 49 28 21 28 63 70 94 93 31 24 65 53 75 65 24 26 41 27 73 1 14-11 36-20 48-20 60 0 219-120 227-171 2-17 17-26 71-44 42-13 80-34 100-53 37-36 55-39 98-16 17 8 43 14 57 13 15-2 48 5 75 15 39 16 62 18 140 12 50-4 107-7 126-7 24 1 50-11 96-44 35-25 72-45 82-45s61 48 118 110c143 158 191 196 260 205 30 3 57 11 60 16 8 12 59 11 72-2 7-7 23-7 53 2 34 10 43 10 50-1 5-8 30-14 62-16 97-4 213-20 233-30 73-39 115-54 148-54 31 0 39-4 47-25 8-20 14-24 38-19s34-1 64-34c19-21 37-45 40-53 4-11 29-7 129 16 141 32 290 45 314 25 8-7 15-23 15-36 0-17 6-24 19-24 10 0 24-7 31-15s18-15 25-15 18-6 25-14c10-13 19-10 65 20 30 19 62 34 72 34s49 21 87 47c113 79 119 82 180 89 57 7 60 6 85-24 22-25 42-34 124-54 54-13 100-22 102-19 3 2 5 107 5 233v228h-7530c-4142 0-7530-2-7530-5z"/></g></svg>';
        }
        if($settings['row_divider'] == 'gurus-divider3') {
            $html .=  '<svg class="pxl-row-svg pxl-row-divider-top" version="1.0" viewBox="0 0 3200 376" xmlns="http://www.w3.org/2000/svg"><g transform="translate(0 376) scale(.1 -.1)"><path d="m0 1905v-1854l33 6c113 21 213 81 399 239 168 141 194 160 234 170 16 4 54 30 84 58 30 29 75 66 100 83 50 34 149 73 184 73 31 0 62 36 156 185 146 232 197 293 299 361 23 15 49 40 57 55 19 38 17 153-6 324-44 322-55 467-43 575 10 86 9 107-4 138-20 49-12 130 20 202 24 53 75 206 185 551 54 168 77 214 129 247 32 22 38 22 463 22 338 0 464-4 592-17 200-22 312-22 403-3 109 23 540 20 616-4 55-18 56-17 103 5 46 21 60 22 310 23l261 1 101 52c126 64 199 80 287 64 81-16 136-35 225-77 128-61 195-64 382-19 84 20 118 23 295 21 162-1 206-4 225-16 20-13 53-15 160-14 74 2 160 6 190 9 66 8 201 52 295 95 74 34 137 47 180 36 14-4 56-34 91-67 64-60 66-61 107-53 23 4 242 8 487 9 379 2 456 5 520 19 207 48 234 34 265-131 9-47 87-114 161-137 32-10 71-27 86-37 14-11 33-19 41-19 20 0 157-45 209-69 24-11 52-21 63-23 13-2 24-17 33-45 11-34 19-43 45-49 25-5 34-2 49 16 10 12 18 28 18 35 0 18-26 128-45 189-34 112-12 179 79 238 56 36 65 39 116 35 30-3 80-11 110-17 51-11 60-11 104 10 132 60 199 22 286-159 149-310 184-357 302-410 169-77 184-86 251-153 67-68 67-68 123-68 70 0 149-36 198-90l36-40v56c0 30 7 110 16 177 17 126 14 291-6 372-17 69-24 248-11 273 24 44 73 56 241 56 85 0 180-5 210-12 36-7 188-12 433-14l378-3 5-25c18-88 12-82 114-109 84-22 114-24 253-23 175 2 194-3 241-58 14-17 33-48 43-68 47-103 73-113 144-54 85 69 146 161 193 292 35 95 42 107 74 124 50 25 660 38 1047 21 170-7 194-10 236-32 96-48 188-63 390-63 293 0 364-22 477-147 37-40 73-73 80-73 8 0 25 9 39 20 17 14 41 20 73 20 48 0 56-7 73-62 4-12 24-18 82-23 69-7 78-6 99 14 26 25 44 26 72 7 15-11 67-15 215-18 154-3 200-7 222-19 15-9 67-53 115-98s105-92 127-104c30-17 41-30 46-56 11-51 31-65 104-69 77-5 147 15 208 59 80 58 97 62 292 65 282 4 514 13 720 30 165 13 194 17 220 36 39 29 88 28 119-1 34-32 68-22 160 45 122 89 167 107 273 112 69 3 96 8 106 21 8 9 24 56 35 105 12 49 30 103 40 120l18 31h110c61 1 127 7 150 14 28 9 81 12 175 9 118-4 145-8 227-36 52-18 104-32 115-32 12 0 55 16 94 35 76 37 136 45 176 24 12-7 45-33 72-59 70-65 118-85 315-130 52-12 109-31 125-43 26-19 43-22 115-21 138 1 235 46 316 146 28 34 61 58 128 92 109 54 173 72 314 86 59 6 146 15 193 20 112 13 209 13 304-1 78-10 174 0 202 23 19 15 68 4 167-37 63-26 119-41 190-51 141-19 180-17 229 7 65 34 151 35 292 5 145-32 206-32 315-5 82 21 84 21 214 4 72-10 157-21 190-24l58-6 37-75c20-41 43-78 52-84 12-7 31 3 80 42 134 109 248 149 390 138 261-20 283-20 303 3 11 11 28 21 38 21 22 0 80 28 134 65 34 23 46 25 153 25 64 0 134 6 156 12s76 13 119 15c85 5 96 0 96-48 0-14 6-34 14-45 14-19 15-19 43 2 15 11 51 31 78 44 47 23 60 25 235 25 119 1 195 5 213 13 19 8 105 12 268 12 232 0 243-1 322-26 45-15 111-40 147-57 146-66 224-76 323-38 118 44 184 53 367 53 150 1 185-2 246-21 88-26 142-26 218-1 56 19 90 20 728 20l669 1 45-26 45-27 602 5c440 2 611 7 637 16 53 18 181 18 221-1 27-13 44-15 84-7 225 45 472 67 845 78 185 5 293 12 307 19 27 15 289 16 298 2 3-6 13-10 21-10 11 0 14 19 14 95v95h-16000-16000v-1855z"/></g></svg><svg class="pxl-row-svg pxl-row-divider-bottom" version="1.0" viewBox="0 0 3200 152" xmlns="http://www.w3.org/2000/svg"><g transform="translate(0 152) scale(.1 -.1)"><path d="m21065 1509c-54-4-158-14-230-23-71-8-213-20-315-26s-212-17-245-25c-64-15-148-18-230-7-102 14-275-27-331-79-11-10-41-22-66-25-34-5-54-15-78-40-26-28-39-34-71-34-22 0-69-9-105-21-50-16-71-19-93-11-24 8-43 4-112-24-46-18-104-36-129-40-78-10-181-32-295-62-60-16-182-46-270-67-88-20-189-44-224-52s-78-13-97-10c-55 9-253-10-343-34-77-19-141-46-241-99-28-15-58-19-154-20-107 0-124-3-172-26-54-26-54-26-123-11-62 14-73 14-117 0-37-11-120-17-329-23-154-5-314-14-355-20-81-13-205-2-305 26-27 7-70 15-95 16-43 2-243-20-400-44-89-14-315-12-530 4-129 9-191 8-375-6-121-9-256-21-300-26-243-29-251-29-341-14-422 69-812 98-1894 140-223 9-450 15-505 14-238-6-270-4-301 18-32 22-138 37-240 33-40-1-85 5-125 18-81 26-291 61-479 81-58 6-130 16-160 23-30 6-116 11-190 12-137 2-324 25-415 51-72 21-225 54-251 54-12 0-66 14-120 31-182 56-301 70-460 54-75-8-98-1-141 38-21 19-26 19-80 7-32-8-73-23-90-33-29-17-45-18-138-12-136 10-333-10-355-35-44-49-139-59-340-35-118 14-188 16-380 10-229-7-236-6-262 14-23 18-35 20-81 15-43-5-57-11-65-28-18-39-75-48-265-40-187 7-734-10-850-26-96-14-172-29-231-47-48-15-69-15-250 2-24 3-58-3-85-15-64-26-186-36-399-32l-182 4-93-59c-201-129-295-150-523-113-121 19-337 2-423-35-89-37-169-43-471-33-322 11-338 11-420 3-59-6-70-4-115 21l-50 27-270 5c-149 2-326-1-395-7s-204-14-300-17c-172-7-177-6-260 21-114 36-244 43-387 22-60-9-160-24-223-32-63-9-139-23-168-32-35-10-70-13-100-9-143 19-150 19-231-3-44-12-114-23-156-24l-75-2v-367-368h16000 16000v40c0 44-2 45-31 29-16-8-42-3-122 25-61 21-131 37-174 40-40 4-121 15-180 26s-144 27-188 35c-129 25-223 34-330 35-82 0-118 6-200 30-99 31-158 44-330 75-49 9-110 20-135 25s-92 16-150 25c-136 20-215 33-292 45-35 6-94 15-133 20-38 5-113 16-165 24-117 18-216 27-340 31-52 2-133 8-180 14s-161 17-254 26-181 21-195 28-34 28-43 47c-11 22-28 38-45 42-49 13-342 7-397-9-28-8-127-18-221-23-152-9-180-7-275 11-144 27-162 32-265 75-82 34-101 38-221 45-71 4-168 17-215 28-177 41-902 61-1561 42-391-12-418-12-443 5-23 15-58 17-278 20-294 2-340 10-477 79-88 44-97 47-150 41-38-4-71-2-105 9-143 44-508 115-795 155-80 11-175 24-212 30-37 5-89 10-116 10-36 0-59 7-86 25-20 14-43 25-51 25-24 0-69 24-87 46-10 12-35 24-56 28-35 5-93 25-177 61-127 54-357 101-542 111-65 3-134 10-153 15s-114 12-210 15c-96 2-193 6-215 7-22 2-85 0-140-4z"/></g></svg>';
        }
    }

    if($settings['pxl_color_offset'] == 'full' || $settings['pxl_color_offset'] == 'skew' ) {
        $html .=  '<div class="pxl-section-overlay-color"></div>';
    }

    if( $settings['row_zoom_point'] == 'true' ) {
        $html .=  '<div class="pxl-zoom-point-wrap"><div class="pxl-zoom-point" data-offset="250" data-scale-mount="30"><div class="pxl-item--overlay" data-scroll-zoom=""></div></div></div>';
    }

    if($settings['pxl_overlay_display'] == 'image' && !empty($settings['pxl_overlay_img']['url'])) {
        $html .=  '<div class="pxl-overlay--image pxl-overlay--imageLeft"><div class="bg-image"></div></div>';
    }

    if($settings['pxl_overlay_display'] == 'image' && $settings['pxl_overlay_img2']['url']) {
        $html .=  '<div class="pxl-overlay--image pxl-overlay--imageRight"><div class="bg-image"></div></div>';
    }

    if(!empty($settings['row_particles_display']) && $settings['row_particles_display'] == 'yes') {
        wp_enqueue_script('particles-background');
        $s_random = '';
        if($settings['size_random'] == 'yes') {
            $s_random = 'true';
        } else {
            $s_random = 'false';
        }
        $colors = [];
        foreach($settings['particle_color_item'] as $values) {
            $colors[] = $values['particle_color'];
        }
        if(empty($colors)) {
            $colors = ["#b73490","#006b41","#cd3000","#608ecb","#ffb500","#6e4e00","#6b541b","#305686","#00ffb4","#8798ff","#0044c1"];
        }
        $el->add_render_attribute( 'color', 'data-color', json_encode($colors) );
        $html .= '<div id="pxl-row-particles-'.uniqid().'" class="pxl-row-particles" data-number="'.$settings['number'].'" data-size="'.$settings['size'].'" data-size-random="'.$s_random.'" data-move-direction="'.$settings['move_direction'].'" '.$el->get_render_attribute_string( 'color' ).'></div>';
    }

    if(isset($settings['row_effect_images']) && !empty($settings['row_effect_images']) && count($settings['row_effect_images'])):
        $html .= '<div class="pxl-section-effect-images">';
            foreach ($settings['row_effect_images'] as $key => $value):
                $item_image = isset($value['item_image']) ? $value['item_image'] : '';
                $effect_image = isset($value['effect_image']) ? $value['effect_image'] : '';
                $image_display = isset($value['image_display']) ? $value['image_display'] : '';
                $image_display_md = isset($value['image_display_md']) ? $value['image_display_md'] : '';
                $image_display_sm = isset($value['image_display_sm']) ? $value['image_display_sm'] : '';
                $parallax_scroll_type = isset($value['parallax_scroll_type']) ? $value['parallax_scroll_type'] : '';
                $parallax_scroll_value = isset($value['parallax_scroll_value']) ? $value['parallax_scroll_value'] : '';
                $hidde_class = '';
                if($image_display !== 'false') {
                   $hidde_class = 'pxl-hide-sr-lg';
                }
                $hidde_class_md = '';
                if($image_display_md !== 'false') {
                   $hidde_class_md = 'pxl-hide-sr-md';
                }
                $hidde_class_sm = '';
                if($image_display_sm !== 'false') {
                   $hidde_class_sm = 'pxl-hide-sr-sm';
                }
                $effects = [];
                if($parallax_scroll_type == 'y' && !empty($parallax_scroll_value)){
                    $effects['y'] = (int)$parallax_scroll_value;
                }
                if($parallax_scroll_type == 'x' && !empty($parallax_scroll_value)){
                    $effects['x'] = (int)$parallax_scroll_value;
                }
                if($parallax_scroll_type == 'z' && !empty($parallax_scroll_value)){
                    $effects['z'] = (int)$parallax_scroll_value;
                }
                $data_parallax = json_encode($effects);

                wp_enqueue_script( 'pxl-parallax-move-mouse');
                $parallax_hover_value = isset($value['parallax_hover_value']) ? $value['parallax_hover_value'] : '';

                $html .= '<img data-parallax-value="'.esc_attr($parallax_hover_value).'" data-parallax="'.esc_attr($data_parallax).'" class="pxl-item--image elementor-repeater-item-'.$value['_id'].' '.$effect_image.' '.$hidde_class.' '.$hidde_class_md.' '.$hidde_class_sm.'" src="'.$item_image['url'].'" />';
            endforeach;
        $html .= '</div>';
    endif;
    if(!empty($settings['bg_parallax']['url'])){
        wp_enqueue_script( 'rellax');
        $parralax_value = !empty($settings['bg_parallax_value']) ? $settings['bg_parallax_value'] : -4;
        $html .= '<div class="pxl-section-bg-parallax pxl-rellax-parallax" data-rellax-speed="'.(string)$parralax_value.'"></div>';
    }
    return $html;
}
add_filter( 'pxl-custom-column/before-render', 'gurus_custom_column_before_render', 10, 3 );
function gurus_custom_column_before_render($html, $settings, $el){
    if(!empty($settings['pxl_column_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_column_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_column_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_column_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_column_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_column_parallax_bg_from_scroll_custom'];
        }
         
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-column-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }
    if(!empty($settings['rellax_background']['url'])){
        wp_enqueue_script( 'rellax');

        $html .= '<div class="pxl-bg-col-parallax pxl-rellax-parallax" data-rellax-speed="'.esc_attr($settings['rellax_value']).'" ></div>';
    }

    return $html;
}