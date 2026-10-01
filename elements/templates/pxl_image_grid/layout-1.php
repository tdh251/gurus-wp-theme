
<?php 
$parallax_hover = !empty($settings['parallax_hover']) ? 'pxl-parallax-hover' : ''; 
$value = 40;
?>
<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-grid pxl-image-grid pxl-image-grid1 ">
        <div class="pxl-grid-inner">
            <?php foreach($settings['items'] as $key => $item) : 
                $thumbnail = null;
                $img_size = !empty($item['img_size']) ? $item['img_size'] : 'full';
                $hide_sm = ($item['hide_sm'] == 'true') ? 'pxl-hiden-sm' : '';
                $hide_xs = ($item['hide_xs'] == 'true') ? 'pxl-hiden-xs' : '';
                
                $value += 10;
                if(!empty($item['image']['id'])) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $item['image']['id'],
                        'thumb_size' => $img_size,
                    ));
                    $thumbnail = $img['thumbnail'];
                }
                ?>
                <div class="pxl-item <?php echo esc_html('elementor-repeater-item-', 'gurus').esc_attr( $item['_id'].' '.$hide_sm.' '.$hide_xs.' '.$item['animate']); ?>">
                    <?php if(!is_null($thumbnail)) : ?>
                        <div class="pxl-item--image <?php echo esc_attr($parallax_hover); ?>" data-parallax-value="<?php echo esc_attr($value); ?>">
                            <?php echo pxl_print_html($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>