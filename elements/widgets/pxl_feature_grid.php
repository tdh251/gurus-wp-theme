<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_feature_grid',
        'title' => esc_html__('BR Feature Grid', 'gurus'),
        'icon' => 'eicon-gallery-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'gurus' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Feature', 'gurus'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'gurus' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true, 
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    )
                ),
            ),
        ),
    ),
    gurus_get_class_widget_path()
);