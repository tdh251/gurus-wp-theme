<?php 
    if ( ! empty( $settings['btn_link1']['url'] ) ) {
        $widget->add_render_attribute( 'button', 'href', $settings['btn_link1']['url'] );

        if ( $settings['btn_link1']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['btn_link1']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    if ( ! empty( $settings['btn_link3']['url'] ) ) {
        $widget->add_render_attribute( 'button2', 'href', $settings['btn_link3']['url'] );

        if ( $settings['btn_link3']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['btn_link3']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    if ( ! empty( $settings['btn_link2']['url'] ) ) {
        $widget->add_render_attribute( 'button1', 'href', $settings['btn_link2']['url'] );

        if ( $settings['btn_link2']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['btn_link2']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    $is_coming_soon = ($settings['coming_soon'] === 'true') ? 'coming-soon' : '';
    $btn_text_hover = !empty($settings['btn_text_hover']) ? $settings['btn_text_hover'] : 'View Demo';
?>
<div class="pxl-showcase1 pxl-showcase <?php echo esc_attr($is_coming_soon); ?>">
    <div class="pxl-showcase--content">
        <div class="pxl-item--image">
            <?php if(!empty($settings['image']['id'])) :
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image']['id'],
                    'thumb_size' => 'full',
                ));
                $thumbnail = $img['thumbnail']; ?>
                <?php echo pxl_print_html($thumbnail); ?>
                <div class="pxl-item--overlay"></div>
            <?php endif; ?>

            <?php if(isset($settings['coming_soon']) && $settings['coming_soon'] == 'true') : ?>
                <h1 class="cooming-soon-text"><?php pxl_print_html('Coming<br>Soon', 'gurus')?></h1>
            <?php else: ?>
                <a class="btn pxl-item--btn pxl-item-btn2" <?php pxl_print_html($widget->get_render_attribute_string( 'button1' )); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">
                    <span class="pxl-btn--text"><?php echo esc_html__(' Demo Onepage', 'gurus'); ?></span>
                </a>
                <a class="btn pxl-item--btn pxl-item-btn1" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">
                    <span class="pxl-btn--text"><?php echo esc_html__('Demo Light', 'gurus'); ?></span>
                </a>
                <a class="btn pxl-item--btn" <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">
                    <span class="pxl-btn--text"><?php echo esc_html__('Demo Dark', 'gurus'); ?></span>
                </a>
            <?php endif; ?>
        </div>
        <span class="pxl-item--title"><?php echo esc_html($settings['title']); ?></span>
    </div>
</div>