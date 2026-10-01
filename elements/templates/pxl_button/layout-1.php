<?php
    $html_id = pxl_get_element_id($settings);
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );
        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }
        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    $bg_gradient = !empty($settings['btn_bg_gradient']) ? 'pxl-btn-gradient' : '';
    $btn_text = !empty($settings['btn_text']) ? $settings['btn_text'] : 'View More';
    $animate_delay = $settings['pxl_animate_delay'].'ms' ?? '0ms';
    $btn_link_style = !empty($settings['btn_link_style']) ? $settings['btn_link_style'] : '';
    $btn_hover_style_btn_gradient = !empty($settings['btn_hover_style_btn_gradient']) ? $settings['btn_hover_style_btn_gradient'] : '';
    $show_icon = !empty($settings['show_icon']) || false;
    $classes = $settings['btn_type'].' '.$settings['btn_style1'].' '.$settings['btn_style2'].' '.$settings['btn_style3'].' '.$settings['btn_style4'].' '.$settings['btn_hover_style'].' '.$btn_link_style.' '.$btn_hover_style_btn_gradient.' '.$settings['pxl_animate'].' '.$bg_gradient;
?>
<div class="pxl-button">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <a class="btn pxl-item--button <?php echo esc_attr($classes); ?>" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($animate_delay); ?>" data-text="<?php echo esc_attr($btn_text); ?>">
                <span class="pxl-btn--text"><?php echo esc_html($btn_text); ?></span>
                <?php if($show_icon) : ?>
                    <?php if(!empty($settings['btn_icon']['value'])) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php else : ?>
                        <i class="pxl-icon--default flaticon flaticon-up-right-arrow"></i>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>

