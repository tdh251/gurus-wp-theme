<?php
    $widget->add_render_attribute( 'counter', [
        'class' => 'pxl-counter--value '.$settings['effect'].'',
        'data-duration' => $settings['duration'],
        'data-startnumber' => $settings['starting_number'],
        'data-endnumber' => $settings['ending_number'],
        'data-to-value' => $settings['ending_number'],
        'data-delimiter' => $settings['thousand_separator_char'],
    ] ); 
    $thumbnail_layer = null;
    $title = !empty($widget->get_settings_for_display('title')) ? $widget->parse_text_editor($settings['title']) : null;
    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    if(!empty($settings['layer']['id'])) {
        $image  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['layer']['id'],
            'thumb_size' => $img_size,
        ));
        $thumbnail_layer = $image['thumbnail'];
    }
    $layer_effect = !empty($settings['layer_effect']) ? $settings['layer_effect'] : '';
?>
<div class="pxl-counter-box pxl-counter-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--container">
        <?php if(!is_null($thumbnail_layer)) : ?>
            <div class="pxl-item--layer <?php echo esc_attr($layer_effect); ?>">
                <?php echo pxl_print_html($thumbnail_layer); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--inner">
            <div class="pxl-item--number pxl-counter--number">
                <?php if(!empty($settings['prefix']) ) : ?>
                    <span class="pxl-item--prefix "><?php echo pxl_print_html($settings['prefix']); ?></span>
                <?php endif ?>
                <span <?php pxl_print_html($widget->get_render_attribute_string('counter')); ?>>
                    <?php echo esc_attr($settings['starting_number']); ?>
                </span>
                <?php if(!empty($settings['suffix'])) : ?>
                    <span class="pxl-item--suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
                <?php endif; ?>
            </div>
            <div class="pxl-item--group">
                <?php if(!is_null($title)) : ?>
                    <div class="pxl-item--title">
                        <?php echo pxl_print_html($settings['title']); ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($settings['desc'])) : ?>
                    <div class="pxl-item--desc">
                        <?php echo pxl_print_html($settings['desc']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="pxl-header-main">
    <div class="pxl-section-menu"></div>
</div>
<div class="pxl-content-main"></div>