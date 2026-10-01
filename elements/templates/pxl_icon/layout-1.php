<?php 
    $classes = esc_attr($settings['style'].' '.$settings['pxl_animate']);
    $animate_delay = esc_attr($settings['pxl_animate_delay']);
?>

<div class="pxl-icon pxl-icon1 <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>ms">
    <div class="pxl-icon--container">
        <div class="pxl-item">
            <?php if ( !empty( $settings['pxl_icon'] ) ) : ?>
                <span class="pxl-item--icon pxl-flex-center">
                    <?php  \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
            <?php endif; ?>
            <?php if ( !empty( $settings['text'] ) ) : ?>
                <span class="pxl-item--text"><?php echo pxl_print_html($settings['text']) ?></span>
            <?php endif; ?>
            <?php if ( !empty( $settings['link']['url'] )) : ?>
                <a class="pxl-item--link" <?php pxl_print_html(gurus_render_link_attributes($settings['link'])); ?>></a>
            <?php endif; ?>
        </div>
    </div>
</div>