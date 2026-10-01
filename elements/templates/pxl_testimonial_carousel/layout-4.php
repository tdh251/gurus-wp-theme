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
$drap = $widget->get_setting('drap', false);
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => 1,
    'slides_to_show_xxl'            => (int)$col_xxl,
    'slides_to_show_xl'             => (int)$col_xl,
    'slides_to_show_lg'             => (int)$col_lg,
    'slides_to_show_md'             => (int)$col_md,
    'slides_to_show_sm'             => (int)$col_sm,
    'slides_to_show_xs'             => (int)$col_xs,
    'slides_to_scroll'              => 1,
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
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel4 <?php echo esc_attr($settings['l_style']) ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $icon = isset($value['icon']) ? $value['icon'] : '';
                        $thumbnail_avatar = null;
                        if(!empty($value['avatar']['id'])) {
                            $avatar  = pxl_get_image_by_size( array(
                                'attach_id'  => $value['avatar']['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_avatar = $avatar['thumbnail'];
                        }
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--avatar">
                                    <?php if(!is_null($thumbnail_avatar)) : ?>
                                        <?php pxl_print_html($thumbnail_avatar); ?>
                                    <?php endif; ?>
                                    <?php if ( $value['icon_type'] == 'icon' && !empty($value['pxl_icon']['value'])) : ?>
                                        <div class="pxl-item--icon">
                                            <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                    
                                <div class="pxl-item--desc">
                                    <?php echo pxl_print_html($desc); ?>
                                </div>

                                <h4 class="pxl-item--title "><?php echo pxl_print_html($title); ?></h4>
                                <?php if(!empty($position)) : ?>
                                    <span class="pxl-item--position pxl-p4"><?php echo pxl_print_html($position); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots-wrap">
                <div class="pxl-swiper-dots"></div>
            </div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 58 58" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.2845 0L0.000270844 28.2843L0.628719 28.9127L0.202332 29.3391L28.4866 57.6234L29.7437 56.3663L2.97684 29.5995L57.3994 29.5995L57.3994 27.8217L2.97702 27.8217L29.5416 1.25708L28.2845 0Z" fill="#474A53"/>
                    </svg>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="59" height="58" viewBox="0 0 59 58" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M29.7897 0L58.0739 28.2843L57.4455 28.9127L57.8719 29.3391L29.5876 57.6234L28.3305 56.3663L55.0974 29.5995L0.674805 29.5995L0.674806 27.8217L55.0972 27.8217L28.5326 1.25708L29.7897 0Z" fill="#474A53"/>
                    </svg>
                </div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>