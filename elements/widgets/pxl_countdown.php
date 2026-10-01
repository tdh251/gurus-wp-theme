<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('BR Countdown', 'gurus' ),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'gurus-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'gurus'),
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'gurus' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                    ),
                ),
                gurus_widget_animation_settings(),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);