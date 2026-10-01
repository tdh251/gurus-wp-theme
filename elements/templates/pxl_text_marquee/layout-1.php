

<?php 
    $html_id = pxl_get_element_id($settings);
    $opt_transition = $settings['opt_transition'];
    $opt_delay_before_start = $settings['opt_delay_before_start'];
    $opt_direction = $settings['opt_direction'];
    $opt_duplicated = $settings['opt_duplicated'] === 'yes' ? true : false;
    $opt_duration =  empty($settings['opt_duration']) ? 12000 : $settings['opt_duration'];
    $opt_pause_on_hover = $settings['opt_pause_on_hover'] === 'yes' ? true : false;
    $opt_start_visible = $settings['opt_start_visible'] === 'yes' ? true : false;
    $opt_gap = !empty($settings['opt_gap']) ? $settings['opt_gap'] : 30;
    $opts = [
        'css3_easing'                => $opt_transition,
        'delay_before_start'         => (int)$opt_delay_before_start ,
        'direction'                  => $opt_direction,
        'duplicated'                 => (bool)$opt_duplicated, 
        'duration'                   => (int)$opt_duration, 
        'gap'                        => (int)$opt_gap, 
        'pause_on_hover'             => (bool)$opt_pause_on_hover,
        'start_visible'              => (bool)$opt_start_visible
    ];

    $widget->add_render_attribute( 'marquee', [
        'class'         => 'pxl-marquee-inner',
        'data-settings' => wp_json_encode($opts)
    ]);
    $is_new = \Elementor\Icons_Manager::is_migration_allowed();
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']); 
    $stroke = !empty($settings['stroke']) ? 'pxl-text-stroke' : '';
    $gradient = !empty($settings['gradient']) ? 'pxl-text-gradient' : '';
    $classes = $settings['l_style'].' '.$settings['style'].' '.$stroke.' '.$gradient;
?>

<div class="pxl-marquee pxl-text-marquee pxl-text-marquee1 <?php echo esc_attr($classes); ?>">
    <div class="pxl-marquee-container">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'marquee' )); ?>>
            <?php if($is_items): ?>
                <?php foreach($settings['items'] as $key => $item) : ?>
                    <?php 
                        $is_link = false;
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( !empty( $item['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );
                            if ( $item['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }
                            if ( $item['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                            $is_link = true;
                        }
                        $link_attributes = $widget->get_render_attribute_string($link_key);
                    ?>
                    <div class="pxl-item">
                        <?php if(!empty($item['pxl_icon']['value'])): ?>
                            <span class="pxl-item--icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                            </span>
                        <?php endif; ?>
                        <?php if(!empty($item['text'])) : ?>
                            <span class="pxl-item--text ">
                                <?php echo esc_attr($item['text']); ?>
                            </span>
                        <?php endif; ?>

                        <?php if($is_link) : ?>
                            <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                        <?php endif; ?>
                    </div>
                    <?php if($settings['saperator'] === 'dot') : ?>
                        <div class="pxl-item">
                            <span><?php echo esc_html__('.', 'gurus'); ?></span>
                        </div>
                    <?php endif; ?>
                <?php  endforeach; ?> 
            <?php endif; ?>  
        </div>
    </div>
</div> 