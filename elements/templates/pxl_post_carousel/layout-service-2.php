<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout'] = $settings['layout_'.$settings['post_type']];
$select_post_by = $widget->get_setting('select_post_by', '');
$select_posts = ($select_post_by === 'post_selected') ? $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '') : $source  = $widget->get_setting('source_'.$settings['post_type'], '');

extract(pxl_get_posts_of_grid('service', [
    'source' => $select_posts,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $select_posts,
]));


$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = (int)$widget->get_setting('col_md', '');
if($col_md == 'custom') {
    $col_md = $widget->get_setting('col_md_custom', '');
}
$col_lg = (int)$widget->get_setting('col_lg', '');
if($col_lg == 'custom') {
    $col_lg = $widget->get_setting('col_lg_custom', '');
}
$col_xl = (int)$widget->get_setting('col_xl', '');
if($col_xl == 'custom') {
    $col_xl = $widget->get_setting('col_xl_custom', '');
}
$col_xxl = (int)$widget->get_setting('col_xxl', '');
if($col_xxl == 'custom') {
    $col_xxl = $widget->get_setting('col_xxl_custom', '');
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

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

$img_size = $widget->get_setting('img_size');
$img_size = !empty($img_size) ? $img_size : 'full';

$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View More';
$show_icon = $widget->get_setting('show_icon');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
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

$pxl_animate = $widget->get_setting('pxl_animate', '');
$animate_delay = $settings['pxl_animate_delay'].'ms';
$is_style_noborder = ($settings['l_service_style1'] === 'no-border-dark' || $settings['l_service_style1'] === 'no-border-light') || false;
$classes = $settings['l_service_style1'].' '.'pxl-swiper-nogap'.' '.$pxl_animate;
?>


<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel2 <?php echo esc_attr($classes); ?>"  data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($posts as $key => $post):
                        $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $is_icon = ($icon_type === 'icon' && !empty($icon_font) && $show_icon === 'true') || false;
                        $is_image = ($icon_type === 'image' && !empty($icon_img) && $show_icon === 'true') || false; 
                        $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-flex-center pxl-post--inner">
                                <?php if($is_style_noborder) : ?>
                                    <a class="pxl-item--link" href="<?php echo esc_url($post_link); ?>"></a>  
                                <?php endif; ?>  
                                <div class="pxl-post--container">
                                    <!-- Show Icon Service -->
                                    <?php if($is_icon) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($is_image) : 
                                            $icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $icon_img['id'],
                                                'thumb_size' => $img_size,
                                        ));
                                            if(!empty($icon_img['thumbnail'])) :
                                                $icon_thumbnail = $icon_img['thumbnail']; ?>
                                                <div class="pxl-post--icon">
                                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                                </div>
                                    <?php endif; endif;?>
                                    <div class="pxl-item--content">
                                        <!-- Title -->
                                        <h4 class="pxl-post--title pxl-hover-line" data-title="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                                            <?php if(!$is_style_noborder) : ?>
                                                <a class="pxl-dark-100" href="<?php echo esc_url($post_link); ?>">
                                                    <?php echo esc_attr(get_the_title($post->ID)); ?>
                                                </a>    
                                            <?php endif; ?>
                                        </h4>
                                        <!-- Show Excerpt -->
                                        <?php if($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--excerpt pxl-p3 pxl-dark-slate pxl-three-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <!-- Show Button ViewMore -->
                                        <?php if($show_button === 'true') : ?>
                                            <div class="pxl-post-btn--wrap">
                                                <a class="btn btn-view-more pxl-post--btn pxl-dark-100 pxl-btn--hover" href="<?php echo esc_url($post_link); ?>">
                                                    <i class="flaticon flaticon-plus-medium"></i>
                                                    <span class="pxl-btn--text "><?php echo esc_html( $button_text ,'gurus') ?></span>
                                                </a>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    <?php endforeach; ?>
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
    </div>
<?php endif; ?>