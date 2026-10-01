<?php
    pxl_add_custom_widget(
        array(
            'name' => 'pxl_post_info',
            'title' => esc_html__('BR Post Info', 'gurus' ),
            'icon' => 'eicon-image',
            'categories' => array('pxltheme-core'),
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
                                        'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_info/portfolio-layout1.jpg'
                                    ],
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'section_content',
                        'label' => esc_html__('Content', 'gurus' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array (
                                'name' => 'style', 
                                'label' => esc_html__('Style', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'default' => esc_html__('Default', 'gurus'),
                                    'style1' => esc_html__('Style 1', 'gurus'),
                                ]
                            ),
                            array (
                                'name' => 'label', 
                                'label' => esc_html__('Title', 'gurus'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                            ),
                            array (
                                'name' => 'timeline_start', 
                                'label' => esc_html__('Start Time', 'gurus'),
                                'type' => \Elementor\Controls_Manager::DATE_TIME,
                                'label_block' => true,
                            ),
                            array (
                                'name' => 'timeline_end', 
                                'label' => esc_html__('End Time', 'gurus'),
                                'type' => \Elementor\Controls_Manager::DATE_TIME,
                                'label_block' => true,
                            )
                        ),
                    ),

                    array(
                        'name' => 'section_settings',
                        'label' => esc_html__('Settings', 'gurus' ),
                        'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                        'controls' => array(
                            array (
                                'name' => 'show_date', 
                                'label' => esc_html__('Show Date', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                            array (
                                'name' => 'show_title', 
                                'label' => esc_html__('Show Title', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                            array (
                                'name' => 'show_client', 
                                'label' => esc_html__('Show Client', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                            array (
                                'name' => 'show_timeline', 
                                'label' => esc_html__('Show Timeline', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                            array (
                                'name' => 'show_service', 
                                'label' => esc_html__('Show Date', 'gurus'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true'
                            ),
                        ),
                    ),
                ),
            ),
        ),
        gurus_get_class_widget_path()
    )
?>