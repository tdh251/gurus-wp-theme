<?php
$btn_gadient = !empty($settings['btn_bg_gradient']) ? 'btn-gadient' : ' ';
$is_loader = $settings['loader'];
if(class_exists('WPCF7') && !empty($settings['form_id'])) : ?>
    <div class="pxl-contact-form pxl-contact-form1 <?php echo esc_attr($btn_gadient.' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $settings['form_id'] ).'"]'); ?>
        <?php if($is_loader === 'true') : ?>
            <div class="pxl-form-loader <?php echo esc_attr($settings['loader_style']) ?>">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
                <div class="bar7"></div>
                <div class="bar8"></div>
                <div class="bar9"></div>
                <div class="bar10"></div>
                <div class="bar11"></div>
                <div class="bar12"></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
