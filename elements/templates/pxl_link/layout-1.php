<?php
    global $wp;
    $html_id = pxl_get_element_id($settings); 
    $color_gadient_class = ($settings['icon_color_type'] == 'gradient') ? 'pxl-icon-color-gradient' : '';
    $title_gradient_class = ($settings['is_title_gradient'] === "true") ? 'text-gradient' : '';
?>
<div class="pxl-links">
    <div class="pxl-container">
        <?php if(!empty($settings['title'])) : ?>
            <h3 class="pxl-title pxl-empty <?php echo esc_attr($settings['title_style'].' '.$title_gradient_class) ?>"><?php echo pxl_print_html($settings['title']); ?></h3>
        <?php endif; ?>

        <?php if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): 
            $current_url_path = home_url( add_query_arg( array(), $wp->request ) ); ?>
            <ul id="pxl-link-<?php echo esc_attr($html_id) ?>" class="pxl-items pxl-link-l1 <?php echo esc_attr($settings['hover_link_style'].' '.$settings['link_style']); ?>">
                <?php foreach ($settings['link'] as $key => $link):
                        $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                        $widget->add_render_attribute( $icon_key, [
                            'class' => $link['pxl_icon'],
                            'aria-hidden' => 'true',
                        ] );
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $link['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );
    
                            if ( $link['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }
    
                            if ( $link['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        $active_cls = '' ;
                        $current_id = get_the_ID();
                        if( $current_id > 0 ){
                            $current_url = get_the_permalink( $current_id, false );
                            if( $link['link']['url'] == $current_url || $link['link']['url'].'/' == $current_url || $link['link']['url'] == $current_url.'/')
                                $active_cls = 'active';
                        }
                        if( $link['link']['url'] == $current_url_path || $link['link']['url'].'/' == $current_url_path || $link['link']['url'] == $current_url_path.'/')
                            $active_cls = 'active';
                        $text = $widget->parse_text_editor( $link['text'] ); ?>
                        <li class="pxl-item <?php echo esc_attr($active_cls.' elementor-repeater-item-'.$link['_id'].' '.$settings['pxl_animate'])?>">
                            <a class="pxl-item--link  <?php echo esc_attr($color_gadient_class); ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                <?php (!empty($link['pxl_icon'])) ? \Elementor\Icons_Manager::render_icon( $link['pxl_icon'], [ 'aria-hidden' => 'true' ], 'i' ) : ''; ?>
                                <?php if(!empty($text)) : ?>
                                    <span><?php echo pxl_print_html($text); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>