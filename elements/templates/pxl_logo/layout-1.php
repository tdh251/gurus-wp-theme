<?php
if ( ! empty( $settings['logo_link']['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

    if ( $settings['logo_link']['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }

    if ( $settings['logo_link']['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
}
$classes = $settings['pxl_animate'];
$animate_delay = $settings['pxl_animate_delay'];
?>


<div class="pxl-logo <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>ms">
<?php
if(!empty($settings['logo']['id'])) : 
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['logo']['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail    = $img['thumbnail'];
    ?>
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>><?php } ?>
        <?php echo wp_kses_post($thumbnail); ?>
    <?php if ( ! empty( $settings['logo_link']['url'] ) ) { ?></a><?php } ?>
<?php endif; ?>
</div>