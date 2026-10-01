<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'gurus')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('BR Navigation Menu', 'gurus'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'menu_type',
                            'label' => esc_html__('Type', 'gurus'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Hozorital', 'gurus'),
                            'label_off' => esc_html__('Vertical', 'gurus'),
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'gurus' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'gurus' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'gurus' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'float: none;',
                            ],
                        ),
                    ),
                ),
                // Main Menu
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('Main Menu', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'menu_normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'horizontal_layout_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'gurus'),
                                'style-custom' => esc_html__('Custom', 'gurus'),
                                'style1' => esc_html__('Style 1', 'gurus'),
                                'style2' => esc_html__('Style 2', 'gurus'),
                            ],
                            'default' => 'style-default',
                        ),                        
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a',
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'gurus' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacer',
                            'label' => esc_html__('Item Spacer', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-layout-horizontal .pxl-menu-primary > li' => 'padding-inline: {{SIZE}}{{UNIT}}; ',
                                '{{WRAPPER}} .pxl-layout-horizontal .pxl-menu-primary' => 'margin-inline: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-layout-vertical .pxl-menu-primary > li' => 'padding-block: {{SIZE}}{{UNIT}} !important;',
                                '{{WRAPPER}} .pxl-layout-vertical .pxl-menu-primary' => 'margin-block: -{{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'megamenu_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'megamenu_option', 
                            'label' => esc_html__( 'Mega Menu', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'menu_mega_type',
                            'label' => esc_html__('Menu Mega Type', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pxl-mega-full-width' => 'Full Width',
                                'pxl-mega-boxed' => 'Boxed',
                            ],
                            'default' => 'pxl-mega-full-width',
                        ),
                        array(
                            'name' => 'menu_mega_box_width',
                            'label' => esc_html__('Menu Mega Box Width', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 4000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.pxl-mega-boxed .pxl-megamenu > .sub-menu' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'menu_mega_type' => 'pxl-mega-boxed',
                            ],
                        ),

                        array(
                            'name' => 'menu_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'menu_hover', 
                            'label' => esc_html__( 'HOVER', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'hover_active_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'hover-default' => esc_html__('Default', 'gurus'),
                                'hover-underline' => esc_html__('Underline', 'gurus'),
                                'hover-double-underline' => esc_html__('Double Underline', 'gurus'),
                                'hover-dot-popup' => esc_html__('Dot Popup', 'gurus'),
                            ],
                            'default' => 'hover-default',
                        ),
                        array(
                            'name' => 'fr_hover_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li:hover > a, 
                                {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a:not(.is-one-page), 
                                {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a:not(.is-one-page), 
                                {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a.pxl-onepage-active' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'line_height',
                            'label' => esc_html__('Line Height', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after ,
                                {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hover-underline', 'hover-double-underline', 'hover-double-line'],
                            ]
                        ),
                        array(
                            'name' => 'first_line_color', 
                            'label' => esc_html__('First Line Color', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hover-underline', 'hover-double-underline', 'hover-double-line'],
                            ]
                        ),
                        array(
                            'name' => 'first_line_vertical_position', 
                            'label' => esc_html__('First Line Position', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'top' => [
                                    'title' => esc_html__( 'Top', 'gurus' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'bottom' => [
                                    'title' => esc_html__( 'Bottom', 'gurus' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after' => '{{VALUE}}: 0;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hover-underline', 'hover-double-underline', 'hover-double-line'],
                            ]
                        ),
                        array(
                            'name' => 'first_line_top_position',
                            'label' => esc_html__('Top', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => ['min' => 0,'max' => 100],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'first_line_vertical_position' => 'top'
                            ]
                        ),
                        array(
                            'name' => 'first_line_bottom_position',
                            'label' => esc_html__('Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => ['min' => 0,'max' => 100],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:after' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'first_line_vertical_position' => 'bottom'
                            ]
                        ),
                        array(
                            'name' => 'second_line_color', 
                            'label' => esc_html__('Second Line Color', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hover-double-underline'],
                            ]
                        ),
                        array(
                            'name' => 'second_line_vertical_position', 
                            'label' => esc_html__('Second Line Position', 'gurus'), 
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'top' => [
                                    'title' => esc_html__( 'Top', 'gurus' ),
                                    'icon' => 'eicon-v-align-top',
                                ],
                                'bottom' => [
                                    'title' => esc_html__( 'Bottom', 'gurus' ),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:before' => '{{VALUE}}: 0;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hover-double-underline'],
                            ]
                        ),
                        array(
                            'name' => 'second_line_top_position',
                            'label' => esc_html__('Top', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => ['min' => 0,'max' => 100],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:before' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'second_line_vertical_position' => 'top'
                            ]
                        ),
                        array(
                            'name' => 'second_line_bottom_position',
                            'label' => esc_html__('Bottom', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => ['min' => 0,'max' => 100],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a:before' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'second_line_vertical_position' => 'bottom'
                            ]
                        ),
                    ),
                ),

                // Style Sublevel
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Menu', 'gurus'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'submenu_normal', 
                            'label' => esc_html__( 'Normal', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'horizontal_sublevel_layout_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-style-default' => esc_html__('Default', 'gurus'),
                                'sub-style-custom' => esc_html__('Custom', 'gurus'),
                            ],
                            'default' => 'sub-style-default',
                        ),    
                        array(
                            'name' => 'sub_show_effect',
                            'label' => esc_html__('Show Effect', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-effect-fade' => 'Fade',
                                'show-effect-slideup' => 'Slide Up',
                                'show-effect-dropdown' => 'Dropdown',
                                'show-effect-slidedown' => 'Slide Down 3D',
                            ],
                            'default' => 'show-effect-slideup',
                        ),
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'gurus' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'sub_bg_color',
                            'label' => esc_html__('Box Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu:not(.pxl-mega-menu), {{WRAPPER}} .pxl-menu-primary .children' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_item_spacing',
                            'label' => esc_html__('Item Spacing', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'submenu_divider', 
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'submenu_hover', 
                            'label' => esc_html__( 'Hover', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'hover_active_submenu_style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-hover-left-line' => esc_html__('Line on Left', 'gurus'),
                            ],
                            'default' => 'sub-hover-left-line',
                        ),
                        array(
                            'name' => 'hover_sub_color',
                            'label' => esc_html__('Color', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}}  .pxl-nav-menu.sub-style-default .sub-menu > li .pxl-menu-item-text::before' => 'background-color: {{VALUE}};',
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