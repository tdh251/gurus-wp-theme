
<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-grid pxl-feature-grid pxl-feature-grid1 ">
        <div class="pxl-grid-inner">
            <?php foreach($settings['items'] as $key => $item) : 
                $thumbnail = null;
                $img_size = !empty($item['img_size']) ? $item['img_size'] : 'full';
                if(!empty($item['image']['id'])) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $item['image']['id'],
                        'thumb_size' => $img_size,
                    ));
                    $thumbnail = $img['thumbnail'];
                }?>
                <div class="pxl-item  <?php echo 'wow fadeInUp elementor-repeater-item-'.esc_attr( $item['_id']); ?>">
                    <?php if(!is_null($thumbnail)) : ?>
                        <div class="pxl-item--image">
                            <?php echo pxl_print_html($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <span class="pxl-item--title"><?php echo esc_html($item['title']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>