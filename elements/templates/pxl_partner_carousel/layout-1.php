<?php
    $col_xs = $widget->get_setting('col_xs', '');
    $col_sm = $widget->get_setting('col_sm', '');
    $col_md = $widget->get_setting('col_md', '');
    $col_lg = $widget->get_setting('col_lg', '');
    $col_xl = $widget->get_setting('col_xl', '');
    $col_xxl = $widget->get_setting('col_xxl', '');
    if($col_xxl == 'inherit') {
        $col_xxl = $col_xl;
    }
    $slides_to_scroll = $widget->get_setting('slides_to_scroll');
    $arrows = $widget->get_setting('arrows', false);  
    $pagination = $widget->get_setting('pagination', false);
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
    $infinite = $widget->get_setting('infinite', false);  
    $speed = $widget->get_setting('speed', 500);
    $animate = $widget->get_setting('item_animate', '');  
    $item_animate_delay = $widget->get_setting('item_animate_delay', 0);
    $opts = [
        'slide_direction'               => 'horizontal',
        'slide_percolumn'               => 3, 
        'slide_mode'                    => 'slide', 
        'slides_to_show'                => (int)$col_xl, 
        'slides_to_show_xxl'            => (int)$col_xxl, 
        'slides_to_show_lg'             => (int)$col_lg, 
        'slides_to_show_md'             => (int)$col_md, 
        'slides_to_show_sm'             => (int)$col_sm, 
        'slides_to_show_xs'             => (int)$col_xs, 
        'slides_to_scroll'              => (int)$slides_to_scroll,
        'arrow'                         => (bool)$arrows,
        'pagination'                    => (bool)$pagination,
        'pagination_type'               => $pagination_type,
        'autoplay'                      => (bool)$autoplay,
        'pause_on_hover'                => (bool)$pause_on_hover,
        'pause_on_interaction'          => true,
        'delay'                         => (int)$autoplay_speed,
        'loop'                          => (bool)$infinite,
        'speed'                         => (int)$speed
    ];
    $widget->add_render_attribute( 'carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]);
    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $spacing = empty($settings['spacing']) ? 'pxl-none-spacing' : '';
    $border = empty($settings['border']) ? 'pxl-none-border' : '';
    $is_items = isset($settings['partner']) && !empty($settings['partner']) && count($settings['partner']);
    $classes = $spacing.' '.$border;
?>

<?php  if($is_items): ?>
    <div class="pxl-swiper-slider pxl-partner-carousel pxl-partner-carousel1 <?php echo esc_attr($classes); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['partner'] as $key => $value): ?>
                        <?php 
                            $delay = $key * $item_animate_delay;
                        ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>" data-wow-delay="<?php echo esc_attr($delay.'ms'); ?>">
                            <div class="pxl-item--inner" >
                                <div class="pxl-item--logo">
                                    <?php if(!empty($value['logo']['id']) && $value['logo_type'] === 'image') : ?>
                                        <?php 
                                            $img_logo = pxl_get_image_by_size( array(
                                                'attach_id'  => $value['logo']['id'],
                                                'thumb_size' => $img_size,
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail_logo = $img_logo['thumbnail'];
                                            echo wp_kses_post($thumbnail_logo); 
                                        ?>
                                    <?php endif; ?>
                                    <?php if(!empty($value['pxl_icon']['value']) && $value['logo_type'] === 'icon') : ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                    <?php endif; ?>
                                </div>
                                <a class="pxl-item--link" <?php pxl_print_html(gurus_render_link_attributes($value['link'])); ?>></a>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
