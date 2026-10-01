<?php 
    $label = ($settings['label']);
    $classes = ($settings['style'].' '.$settings['hover_style'].' pxl-layout-'.$settings['layout_type'].' '.$settings['pxl_animate']);
    $animate_delay = ($settings['pxl_animate_delay']);
    $tmp_class = $settings['hover_style'] === 'hover-scale-bg' ? 'pxl-hover-scale' : '';
?>

<div class="pxl-social-share <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>ms">
    <div class="pxl-social--inner">
        <?php if(!empty($label)) : ?>
            <h3 class="el-empty"><?php echo esc_html($label) ; ?></h3>
        <?php endif; ?>
        <div class="pxl-items " >
            <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): 
                foreach($settings['items'] as $key => $item) :
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
                    <a class="pxl-item pxl-link pxl-white <?php echo esc_attr($tmp_class); ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php (!empty($item['pxl_icon'])) ? \Elementor\Icons_Manager::render_icon( $item['pxl_icon'], [ 'aria-hidden' => 'true' ] ) : null; ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

