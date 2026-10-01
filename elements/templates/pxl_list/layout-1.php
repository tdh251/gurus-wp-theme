<?php
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    $animate_delay = $settings['pxl_animate_delay'].'ms';
    $title = !empty($settings['title']) ? $settings['title'] : null;
    $icon = !empty($settings['pxl_icon']['value']) ? $settings['pxl_icon']['value'] : null;
    $classes = $settings['style_v'].' '.$settings['pxl_animate'];
?>

<?php if($is_items): ?>
    <div class="pxl-list <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
        <div class="pxl-item--container">
            <div class="pxl-item--inner">
                <?php if(!is_null($title)): ?>
                    <h5 class="pxl-item--title <?php echo esc_attr($settings['title_style']); ?>"><?php echo esc_html($title); ?></h5>
                <?php endif; ?>
                <ul class="pxl-item--lists">
                    <?php foreach ($settings['items'] as $key => $item): ?>
                        <?php 
                            $content = !empty($item['content']) ? $item['content'] : null;
                            $item_classes = 'elementor-repeater-item-'.$item['_id'];
                        ?>
                        <li class="pxl-item <?php echo esc_attr($item_classes); ?>">
                            <?php if (!is_null($icon)) : ?>
                                <div class="pxl-item--icon">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                </div>
                            <?php endif; ?>
                            <?php if(!is_null($content)) : ?>
                                <div class="pxl-item--content">
                                    <?php echo pxl_print_html($content)?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>