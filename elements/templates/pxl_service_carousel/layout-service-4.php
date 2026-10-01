<?php
    $html_id = pxl_get_element_id($settings);
    $source    = $widget->get_setting('source_'.$settings['post_type']);
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 4);
    $post_ids = $widget->get_setting('post_ids', '');
    $settings['layout']    = $settings['layout_'.$settings['post_type']];
    $select_post_by = $widget->get_setting('select_post_by', '');
    if($select_post_by === 'post_selected'){
        $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
    }else{
        $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    }
    extract(pxl_get_posts_of_grid($settings['post_type'], [
        'source' => $source,
        'orderby' => $orderby,
        'order' => $order,
        'limit' => $limit,
        'post_ids' => $post_ids,
    ]));


    $animate = $widget->get_setting('pxl_animate', '');
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
    $pagination = $widget->get_setting('pagination', false);
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
    $infinite = $widget->get_setting('infinite', false);
    $speed = $widget->get_setting('speed', 500);

    $img_size = $widget->get_setting('img_size');

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
    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : '480x466';
    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = !empty($settings['num_words']) ? $settings['num_words'] : 16;
    $show_button = !empty($settings['show_button']) || false;
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View Details';
    $show_icon = !empty($settings['show_icon']) || false;
    $theme = !empty($settings['theme']) ? 'pxl-theme-dark' : 'pxl-theme-light';

    $classes = $settings['style'].' '.$theme;
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-service-carousel pxl-service-carousel4 pxl-swiper-nogap <?php echo esc_attr($classes); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($posts as $key => $post) : ?>
                        <?php 
                            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );

                            $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                            $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                            $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                            $thumbnail = null;
                            $thumbnail_icon = null;
                            if(!empty($icon_img)) {
                                $is_icon_image = true;
                                $icon_image = pxl_get_image_by_size( array(
                                    'attach_id'  => $icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $thumbnail_icon = $icon_image['thumbnail'];
                            }

                            if(has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))) {
                                $img_id = get_post_thumbnail_id($post->ID);
                                $image    = pxl_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $img_size
                                ));
                                $thumbnail = $image['thumbnail'];
                            }; 
                        ?>
                        <?php if(!is_null($thumbnail)) : ?>
                            <div class="pxl-swiper-slide">
                                <?php if (!is_null($thumbnail)):?>
                                    <div class="pxl-post--featured">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-post--container">
                                    <div class="pxl-post--inner <?php echo esc_attr($animate); ?>" data-wow-duration="1s">
                                        <?php if(!empty($icon_font) && $show_icon) : ?>
                                            <div class="pxl-post--icon">
                                                <i class="<?php echo esc_attr($icon_font); ?>"></i>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!is_null($thumbnail_icon) && $show_icon) : ?>
                                            <div class="pxl-post--icon">
                                                <?php echo wp_kses_post($thumbnail_icon); ?>
                                            </div>
                                        <?php endif;?>
                                        <!-- Title -->
                                        <h3 class="pxl-post--title ">
                                            <a class="pxl-title--link" href="<?php echo esc_url($post_link); ?>">
                                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                                            </a>    
                                        </h3>

                                        <?php if($show_excerpt) : ?>
                                            <div class="pxl-post--excerpt">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($show_button) : ?>
                                            <div class="pxl-btn--wrap">
                                                <a href="<?php echo esc_url($post_link); ?>" class="btn pxl-post--btn pxl-btn-round pxl-btn-small pxl-btn--main">
                                                    <i class="flaticon flaticon-plus-normal"></i>
                                                </a>
                                                <a href="<?php echo esc_url($post_link); ?>" class="btn pxl-post--btn pxl-btn--copy">
                                                    <i class="flaticon flaticon-plus-normal"></i>
                                                    <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <a href="<?php echo esc_url($post_link); ?>" class="pxl-item--link"></a>
                                </div>
                            </div>
                        <?php else : ?>
                            <span class="pxl-message"><?php echo esc_html__("Post needs to have a profile picture", 'gurus') ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div> 
            </div>
            
            <?php if((bool)$pagination): ?>
                <div class="pxl-swiper-dots-wrap pxl-swiper-dots-default">
                    <div class="pxl-swiper-dots "></div>
                </div>
            <?php endif; ?>

            <?php if((bool)$arrows): ?>
                <div class="pxl-swiper-arrow-wrap  pxl-swiper-arrow-default">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
