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
$arrow_style = $widget->get_setting('arrow_style', ' ');
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pagination_style = $widget->get_setting('pagination_style', 'style1');

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
    'slides_to_show'                => 2,
    'slides_to_show_xxl'            => $col_xxl,
    'slides_to_show_xl'            => $col_xl,
    'slides_to_show_lg'             => $col_lg,
    'slides_to_show_md'             => $col_md,
    'slides_to_show_sm'             => $col_sm,
    'slides_to_show_xs'             => $col_xs,
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


$pxl_animate = esc_attr($settings['pxl_animate']);
$animate_delay = esc_attr($settings['pxl_animate_delay'].'ms');
$classes = esc_attr($settings['style']);


if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel1 pxl-swiper-boxshadow <?php echo esc_attr($classes); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $is_icon_normal = $value['icon_type'] == 'icon' && !empty($value['pxl_icon']['value']) ? true : false;
                        $is_icon_image = $value['icon_type'] == 'image' && !empty($value['icon_image']['id']) ? true : false;
                        $thumbnail_icon = null;
                        if($is_icon_image) {
                            $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $value['icon_image']['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_icon = $img_icon['thumbnail'];
                        }
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
                                <!-- Show icon -->
                                <?php if ( $is_icon_normal ) : ?>
                                    <div class="pxl-item--icon pxl-flex-center">
                                        <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $is_icon_image && !is_null($thumbnail_icon) ) : ?>
                                    <div class="pxl-item--icon pxl-flex-center">
                                        <?php echo pxl_print_html($thumbnail_icon); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Content -->
                                <div class="pxl-item--holder">
                                    <!-- Description -->
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <div class="pxl-item--meta">
                                        <!-- Title -->
                                        <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                        <!-- Position -->
                                        <?php if(!empty($position)) : ?>
                                            <span class="pxl-item--position pxl-p4"><?php echo pxl_print_html($position); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots-wrap <?php echo esc_attr($pagination_style); ?>">
                <div class="pxl-swiper-dots "></div>
            </div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap  <?php echo esc_attr($arrow_style); ?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
