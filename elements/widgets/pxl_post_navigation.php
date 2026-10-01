<?php
    pxl_add_custom_widget(
        array(
            'name' => 'pxl_post_navigation',
            'title' => esc_html__('BR Post Navigation', 'gurus' ),
            'icon' => 'eicon-navigation-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'section_content',
                        'label' => esc_html__('Content', 'gurus' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array (
                                'name' => 'type',
                                'label' => esc_html__('Type', 'gurus'),
                                'type' => Elementor\Controls_Manager::SELECT,
                                'default' => 'pagination',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'gurus'),
                                    'navigation' => esc_html__('Navigation', 'gurus'),
                                ]
                            ),
                        ),
                    ),
                ),
            ),
        ),
        gurus_get_class_widget_path()
    )
?>