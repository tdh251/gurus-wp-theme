<?php if(!empty($settings['percentage_value'])) : 
    $main_color = gurus()->get_opt('primary_color', '#97BAC7');
    $bar_color_from = !empty($settings['bar_color']) ? ($settings['bar_color']) : $main_color;
    $bar_color_to = !empty($settings['bar_color_to']) ? ($settings['bar_color_to']) : $main_color;
    $track_color = !empty($settings['track_color']) ? $settings['track_color'] : '#E1F2F2'; 
?>
    <div class="pxl-pie-chart pxl-pie-chart1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-item--holder">
            <div class="pxl-item--value pxl-percentage" 
                style="min-height: <?php echo esc_attr($settings['chart_size']['size']); ?>px;" 
                data-size="<?php echo esc_attr($settings['chart_size']['size']); ?>" 
                data-bar-color-from="<?php echo esc_attr($bar_color_from); ?>" 
                data-bar-color-to="<?php echo esc_attr($bar_color_to); ?>" 
                data-track-color="<?php echo esc_attr($track_color); ?>" 
                data-line-width="<?php echo esc_attr($settings['chart_line_width']['size']); ?>" data-line-cap="<?php echo esc_attr($settings['chart_line_cap']); ?>" 
                data-percent="-<?php echo esc_attr($settings['percentage_value']); ?>">
            </div>
            <!--  -->
            <?php if(!empty($settings['percentage_value'])) : ?>
                <div class="pxl-counter--number">
                    <span class="pxl-counter--value" data-duration="2000" 
                        data-to-value="<?php echo esc_attr($settings['percentage_value']); ?>" 
                        data-delimiter="">1</span>
                    <span class="pxl-counter--suffix"><?php echo esc_html($settings['counter_suffix']); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <h5 class="pxl-item--title"><span><?php echo pxl_print_html($settings['title']); ?></span></h5>
    </div>
<?php endif; ?>