
<?php 
    $is_link = false; 
    if ( !empty( $settings['link']['url'] )) {
        $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );
        if ( $settings['link']['is_external'] ) {
            $widget->add_render_attribute( 'link', 'target', '_blank' );
        }
        if ( $settings['link']['nofollow'] ) {
            $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
        $is_link = true;
    }

    $thumbnail_url = null;
    if(!empty($settings['map']['id'])) {
        $image = pxl_get_image_by_size( array(
            'attach_id'  => $settings['map']['id'],
            'thumb_size' => 'full',
            'class' => 'no-lazyload'
        ) );
        $thumbnail    = $image['thumbnail'];
        $thumbnail_url    = $image['url'];
    }
    $animate_delay = $settings['pxl_animate_delay'].'ms';
    $title_tag = $settings['title_tag'];
    $parallax_wrap = ($settings['effect'] === 'pxl-parallax-hover') ? 'pxl-parallax-hover-wrap' : '';
    $parallax_value = $settings['parllax_value'] ?? 0;
    $theme = !empty($settings['theme']) ? 'pxl-theme-dark' : 'pxl-theme-light';
    $classes = $settings['style'].' '.$settings['hover_style'].' '.$theme.' '.$parallax_wrap.' '.$settings['pxl_animate'];  
    
?>
<div class="pxl-contact-box pxl-contact-box2  <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
    <div class="pxl-item--container">
        <div class="pxl-item--inner" style="background-image: url('<?php echo pxl_print_html($thumbnail_url); ?>')">
            <div class="pxl-item--content <?php echo esc_attr($settings['effect']); ?>" data-parallax-value="<?php echo esc_attr($parallax_value); ?>">
                <<?php echo esc_attr($title_tag); ?> class="pxl-item--title">
                    <?php pxl_print_html($settings['title']); ?>
                </<?php echo esc_attr($title_tag); ?>>
                <div class="pxl-item--address ">
                    <?php pxl_print_html($settings['address']); ?>
                </div>
                <?php if ($is_link):?>
                    <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>></a>
                <?php endif; ?>
            </div>        
        </div>
    </div>
</div>






<!--  -->
