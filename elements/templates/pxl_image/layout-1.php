<?php 
    if ( ! empty( $settings['image_link']['url'] ) ) {
        $widget->add_render_attribute( 'image_link', 'href', $settings['image_link']['url'] );

        if ( $settings['image_link']['is_external'] ) {
            $widget->add_render_attribute( 'image_link', 'target', '_blank' );
        }

        if ( $settings['image_link']['nofollow'] ) {
            $widget->add_render_attribute( 'image_link', 'rel', 'nofollow' );
        }
    }
    $html_id = pxl_get_element_id($settings); 
    if($settings['img_effect'] == 'pxl-image-parallax') { wp_enqueue_script( 'pxl-parallax-move-mouse'); }

    $animate_delay = $settings['pxl_animate_delay'].'ms';
    $parallax_hidden_class = $settings['hide_parallax_sm'] == 'true' ? 'pxl-disable-parallax-sm' : ''; 
    $img_hidden_lg_class = $settings['img_display'] == 'true' ? 'pxl-hide-sr-lg' : ''; 
    $img_effect = !empty($settings['img_effect']) ? $settings['img_effect'] : ''; 
    $classes = esc_attr($img_effect.' '.$parallax_hidden_class.' '.$img_hidden_lg_class.' '.$settings['pxl_animate']);

    $max_tilt = '';
    $speed_tilt = '';
    $perspective_tilt = '';
    $is_effect_tilt = false;
    if($img_effect === 'pxl-image-tilt') {
        $is_effect_tilt = true;
        $max_tilt = esc_attr($settings['max_tilt']);
        $speed_tilt = esc_attr($settings['speed_tilt']);
        $perspective_tilt = esc_attr($settings['perspective_tilt']);
    }
    $parallax_value = !empty($settings['parallax_value']) ? $settings['parallax_value'] : 0;
    $parallax_scroll_type = '';
    $parallax_scroll_value_x = '';
    $is_parallax = false;
    $data_parallax = '';
    if($img_effect === 'pxl-parallax-scroll') {
        $is_parallax = true;
        $parallax_scroll_type = esc_attr($settings['parallax_scroll_type']);
        $parallax_scroll_value_x = esc_attr($settings['parallax_scroll_value_x']);
        $data_parallax = esc_attr('{"'.$parallax_scroll_type.'":'.$parallax_scroll_value_x.'}');
    } 

    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $image_id = '';
    $source_type = $settings['source_type'];
    $is_source_type = null;

    if ($source_type == 'f_img' && has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id(get_the_ID());
        $is_source_type = false;
    } elseif ($source_type == 's_img' && !empty($settings['image']['id'])) {
        $is_source_type = true;
        $image_id = $settings['image']['id'];
    }

    if(!empty($image_id)) {
        $image  = pxl_get_image_by_size( array(
            'attach_id'  => $image_id,
            'thumb_size' => $image_size,
            'class' => 'no-lazyload'
        ) );
        $thumbnail    = $image['thumbnail'];
        $thumbnail_url    = $image['url'];
    }

    $is_bg_gradient = !empty($settings['linear_gradient']) || false;
    $is_overlay_color = !empty($settings['overlay']) || false;
    $layers = isset($settings['layers']) && !empty($settings['layers']) && count($settings['layers']);
?>
<div id="<?php echo esc_attr($html_id); ?>"  class="pxl-image-single <?php echo esc_attr($classes); ?>"  data-wow-delay="<?php echo esc_attr($animate_delay); ?>" 
     <?php if($is_effect_tilt) { echo 'data-maxtilt="' . esc_attr($max_tilt) . '" data-speedtilt="' . esc_attr($speed_tilt) . '" data-perspectivetilt="' . esc_attr($perspective_tilt) . '"'; } ?> 
     <?php if($is_parallax) { echo 'data-parallax="' . esc_attr($data_parallax) . '"'; } ?>
     data-parallax-value = "<?php echo esc_attr($parallax_value); ?>">
    <div class="pxl-item--inner" data-wow-delay="120ms">
        <?php if(!is_null($is_source_type)) : ?>
            <?php if ($settings['image_type'] === 'bg') : ?>
                <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            <?php else: ?>
                <div class="pxl-item--image" >
                    <?php if ( ! empty( $settings['image_link']['url'] ) ) { ?><a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'image_link' )); ?>><?php } ?>
                        <?php echo wp_kses_post($thumbnail); ?>
                    <?php if ( ! empty( $settings['image_link']['url'] ) ) { ?></a><?php } ?>
                </div>
            <?php endif; ?>
            <?php  if($is_overlay_color) pxl_print_html('<div class="pxl-overlay-color"></div>'); ?>
            <?php if($is_bg_gradient) pxl_print_html('<div class="pxl-bg-gradient"></div>'); ?>
            <?php if($layers) : ?>
                <?php foreach($settings['layers'] as $key => $layer) : ?>
                    <?php 
                        $thumbnail_icon = null;
                        if(!empty($layer['icon_image']))
                        $img_icon  = pxl_get_image_by_size( 
                            array(
                                'attach_id'  => $layer['icon_image']['id'],
                                'thumb_size' => 'full',
                            ));
                        $thumbnail_icon = $img_icon['thumbnail'];
                    ?>
                    <?php if(!empty($layer['pxl_icon']['value'])) : ?>
                        <div class="pxl-item--layer <?php echo 'elementor-repeater-item-'.esc_attr($layer['_id']); ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $layer['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ) ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!is_null($thumbnail_icon)) : ?>
                        <div class="pxl-item--layer <?php echo 'elementor-repeater-item-'.esc_attr($layer['_id'].' '.$layer['layer_animate']); ?>" data-wow-delay="<?php echo esc_attr($layer['layer_animate_delay']); ?>">
                            <?php echo pxl_print_html($thumbnail_icon); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(is_singular('portfolio') && $settings['source_type'] == 'f_img' && has_post_thumbnail()) : ?>
            <!-- if (has_post_thumbnail()) {
                $img_id = get_post_thumbnail_id(get_the_ID());
            } -->
        <?php endif; ?>
    </div>
</div>
