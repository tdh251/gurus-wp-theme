

<?php 
    $html_id = pxl_get_element_id($settings);
    $opt_transition = $settings['opt_transition'];
    $opt_delay_before_start = $settings['opt_delay_before_start'];
    $opt_direction = $settings['opt_direction'];
    $opt_duplicated = $settings['opt_duplicated'] === 'yes' ? true : false;
    $opt_duration =  empty($settings['opt_duration']) ? 10000 : $settings['opt_duration'];
    $opt_pause_on_hover = $settings['opt_pause_on_hover'] === 'yes' ? true : false;
    $opt_start_visible = $settings['opt_start_visible'] === 'yes' ? true : false;
    $opts = [
        'css3_easing'                => $opt_transition,
        'delay_before_start'         => (int)$opt_delay_before_start ,
        'direction'                  => $opt_direction,
        'duplicated'                 => (bool)$opt_duplicated, 
        'duration'                   => (int)$opt_duration, 
        'gap'                        => 30, 
        'pause_on_hover'             => (bool)$opt_pause_on_hover,
        'start_visible'              => (bool)$opt_start_visible
    ];

    $widget->add_render_attribute( 'marquee', [
        'class'         => 'pxl-marquee-inner',
        'data-settings' => wp_json_encode($opts)
    ]);

    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : '454x231';
    $animate = $settings['pxl_animate'];
    $animate_delay = $settings['pxl_animate_delay'].'ms';
?>

<div class="pxl-marquee pxl-image-marquee pxl-image-marquee1 <?php echo esc_attr($animate); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
    <div class="pxl-marquee-container">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'marquee' )); ?>>
            <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): 
                foreach($settings['items'] as $key => $item) :
                // Get link
                $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $item['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );
                    if ( $item['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }
                    if ( $item['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                    <div class="pxl-item">
                        <a class="pxl-item--link  <?php echo 'pxl-item-'.$item['_id']; ?>" <?php echo implode( '#', [ $link_attributes ] ); ?>>      
                            <?php if (!empty($item['image']['id'])) : ?>
                                <div class="pxl-item--image">
                                    <?php $image = pxl_get_image_by_size( array(
                                        'attach_id'  => $item['image']['id'],
                                        'thumb_size' => $img_size,
                                    ));
                                    $thumbnail = $image['thumbnail'];
                                    echo pxl_print_html($thumbnail); ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div> 