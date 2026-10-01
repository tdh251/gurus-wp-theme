
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
    $animate_delay = $settings['pxl_animate_delay'].'ms';
    $title_tag = $settings['title_tag'];
    $theme = !empty($settings['theme']) ? 'pxl-theme-dark' : 'pxl-theme-light';
    $classes = $settings['style'].' '.$settings['hover_style'].' '.$theme.' '.$settings['pxl_animate'];   
?>
<div class="pxl-contact-box pxl-contact-box1 <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <?php if (!empty($settings['pxl_icon'])) : ?>
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ) ?>
                </div>
            <?php endif; ?>
            <div class="pxl-item--content">
                <div class="pxl-item--desc ">
                    <?php pxl_print_html($settings['desc']); ?>
                </div>
                <<?php echo esc_attr($title_tag); ?> class="pxl-item--title">
                    <?php pxl_print_html($settings['title']); ?>
                </<?php echo esc_attr($title_tag); ?>>
                <?php if ($is_link):?>
                    <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>></a>
                <?php endif; ?>
            </div>        
        </div>
    </div>
</div>






<!--  -->
