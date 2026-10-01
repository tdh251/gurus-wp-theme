
<?php 
    if ( ! empty( $settings['icon_link']['url'] ) ) {
        $widget->add_render_attribute( 'icon_link', 'href', $settings['icon_link']['url'] );

        if ( $settings['icon_link']['is_external'] ) {
            $widget->add_render_attribute( 'icon_link', 'target', '_blank' );
        }

        if ( $settings['icon_link']['nofollow'] ) {
            $widget->add_render_attribute( 'icon_link', 'rel', 'nofollow' );
        }
    }
    $animate_delay = $settings['pxl_animate_delay'].'ms';
    $style = $settings['style'];

    $classes = $style.' '.$settings['pxl_animate'];   
    $icon_type = $settings['icon_type'] === 'icon' && !empty($settings['pxl_icon']['value']) ? 0 : (
            $settings['icon_type'] === 'image' && !empty($settings['icon_image']['id']) ? 1 : (
            $settings['icon_type'] === 'number' && !empty($settings['index']) ? 2 : null ) );
?>
<div class="pxl-icon-box pxl-icon-box1 <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
    <div class="pxl-item--inner">
        <!-- Show icon -->
        <?php if ( !is_null($icon_type) && $icon_type === 0 ) : ?>
            <div class="pxl-item--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ) ?>
            </div>
        <?php endif; ?>
        <?php if ( !is_null($icon_type) && $icon_type === 1 ) : ?>
            <div class="pxl-item--icon">
                <?php $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                ));
                $thumbnail_icon    = $img_icon['thumbnail'];
                pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>



        <?php if( !is_null($icon_type) && $icon_type === 2) : ?>
            <div class="pxl-item--icon pxl-item--index h5 pxl-white pxl-bg-dark-300"><?php echo esc_html($settings['index']) ?></div>
        <?php endif ?>

        <!-- Content -->
        <div class="pxl-item--content">
            <!-- Title -->
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <?php pxl_print_html($settings['title']); ?>
            </<?php echo esc_attr($settings['title_tag']); ?>>
            <!-- Description -->
            <div class="pxl-item--description el-empty">
                <?php pxl_print_html($settings['desc']); ?>
            </div>
            <!-- Link -->
            <?php if ( !empty( $settings['icon_link']['url'] )) : ?>
                <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>></a>
            <?php endif; ?>
        </div>        
    </div>
</div>






<!--  -->
