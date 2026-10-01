<?php if(isset($settings['progressbar']) && !empty($settings['progressbar'])): ?>
    <div class="pxl-progressbar pxl-progressbar-1 <?php echo esc_attr(' pxl-d-'.$settings['display']. ' pxl-progressbar-'.$settings['style'] ); ?>">
        <?php foreach ($settings['progressbar'] as $key => $progressbar): ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class="pxl--meta ">
                    <h5 class="pxl--title el-empty pxl-mr-20 pxl-dark-100"><?php pxl_print_html($progressbar['title']); ?></h5>
                    <div class="pxl--percentage pxl-dark-100 h6"><?php echo esc_html($progressbar['percent']['size']); ?>%</div>
                </div>
                <div class="pxl-progressbar--wrap ">
                    <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>