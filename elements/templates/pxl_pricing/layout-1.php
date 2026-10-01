<?php 
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );
    
        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
        }
    
        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
        }
    }
?>
<div class="pxl-pricing pxl-pricing1">
    <div class="pxl-pricing--inner">
        <div class="pxl-item--shape"></div>
        <div class="pxl-item--popular">
            <span><?php echo esc_html($settings['popular']); ?></span>
        </div>
        <div class="pxl-item--price"><?php echo esc_html($settings['price']); ?><span class="pxl-item--currency"><?php echo esc_html($settings['currency']); ?></span></div>
        <div class="pxl-item--package"><?php echo esc_html($settings['package']); ?></div>
        <?php if($is_items): ?>
            <div class="pxl-item--feature">
                <ul class="pxl-items">
                    <?php foreach($settings['items'] as $item): ?>
                        <li class="pxl-item">
                            <?php if ( !empty( $settings['pxl_icon'] )) : ?>
                                <?php  \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php endif; ?>
                            <span class="pxl-item--text"><?php echo esc_html($item['text']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="pxl-btn-wrap">
            <a class="btn pxl-item--btn btn-hover-style1" <?php !empty( $settings['btn_link']['url'] ) ? pxl_print_html($widget->get_render_attribute_string( 'btn_link' )) : ''; ?>>
                <span class="pxl-btn--text"><?php echo esc_html($settings['btn_text']) ?></span>
                <?php if ( !empty( $settings['btn_icon'] )) : ?>
                    <?php  \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>

