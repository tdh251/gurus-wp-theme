<?php 
$item_active = !empty($settings['item_active']) ? $settings['item_active'] : 2; 
$is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) ? true : false;
?>
<?php if($is_items): ?>
    <div class="pxl-icon-box-list pxl-icon-box-list1">
        <div class="pxl-icon-box-container pxl-hover-wrap">
            <?php foreach($settings['items'] as $index => $item) : 
                $index = $index + 1; ?>
                <div class="pxl-item pxl-hover-item <?php if($index === $item_active) echo esc_html__('pxl-active', 'gurus'); ?>">
                    <div class="pxl-item--icon pxl-white pxl-flex-center">
                        <?php if ( $item['icon_type'] == 'icon' && !empty($item['pxl_icon']['value'])) : ?>
                            <?php \Elementor\Icons_Manager::render_icon( $item['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        <?php endif; ?>
                        <?php if ( $item['icon_type'] == 'image' && !empty($item['icon_image']['id'])) : ?>
                            <?php $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $item['icon_image']['id'],
                                'thumb_size' => 'full',
                            ));
                            $thumbnail_icon    = $img_icon['thumbnail'];
                            echo pxl_print_html($thumbnail_icon); ?>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-item--content">
                        <h3 class="pxl-item--title pxl-white">
                            <?php echo esc_attr($item['title']) ?>
                        </h3>
                        <div class="pxl-item--desc pxl-white">
                            <?php echo esc_attr($item['desc']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>