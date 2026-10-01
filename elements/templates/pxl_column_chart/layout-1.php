<?php 
    $ticks = 4;
    $max_y = !empty($settings['max_y']) ? (float)$settings['max_y'] : 0;
    $tick_tmp = $max_y/$ticks;
    $chart_height = !empty($settings['chart_height']['size']) ? (float)$settings['chart_height']['size'] : 265.0;
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    $count_items = count($settings['items']);
    $ratio = $chart_height/$max_y;    
?>
<div class="pxl-column-chart">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <?php if($max_y !== 0) : ?>
                <div class="pxl-item-vertical-axis">
                    <?php for($i=0; $i<$ticks+1; $i++) : ?>
                        <?php $tick_val = round($i*$tick_tmp, 1); ?>
                        <span class="pxl-item--tick">
                            <?php echo esc_attr($tick_val); ?>
                        </span>
                    <?php endfor; ?>
                </div>
                <?php if($is_items) : ?>
                    <div class="pxl-item-horizontal-axis">
                        <?php  foreach($settings['items'] as $key=>$item) : ?>
                            <?php 
                                $height = (string)($item['value']*$ratio).'px'; 
                                $title = !empty($item['title']) ? $item['title'] : 'NaN';
                                $active = !empty($item['active']) ? 'pxl-item--active' : '';
                            ?>
                            <div class="pxl-item--col wow pxl-expand-column <?php echo esc_attr($active); ?>" data-value="<?php echo esc_attr($title); ?>" 
                            style = "max-height: <?php echo esc_attr($height);?>;"></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>