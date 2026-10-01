
<?php 
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
?>
<?php if($is_items): ?>
    <div class="pxl-history <?php echo esc_attr($settings['style']) ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach($settings['items'] as $key=>$item) : 
            $index = $key + 1;?>
            <div class="pxl-item--container">
                <div class="pxl-item--inner">
                    <!-- Show index -->
                    <div class="pxl-item--index pxl-flex-center">
                        <p class="pxl-item--number pxl-flex-center h5 pxl-white pxl-bg-blue-1 "> <?php echo esc_attr($index); ?></p>
                    </div>
                    <div class="pxl-item--info">
                        <!-- Title -->
                        <h4 class="pxl-item--title el-empty pxl-dark-100"><?php pxl_print_html($item['title']); ?></h4>
                        <!-- Description -->
                        <div class="pxl-item--content el-empty pxl-dark-slate pxl-p3">
                            <?php echo pxl_print_html($item['content']); ?>
                        </div>
                    </div>     
                </div>
            </div>
        <?php endforeach; ?>   
    </div>
<?php endif; ?>