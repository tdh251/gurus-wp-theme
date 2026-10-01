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

    $i = 0;
    $show_author = $widget->get_setting('show_author');
    // 

    $show_button = !empty($settings['show_button']) || false;
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View More';
    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = !empty($settings['num_words']) ? $settings['num_words'] : 16;
    $show_date = !empty($settings['show_date']) || false;
    $show_comment = !empty($settings['show_comment']) || false;

    $title_hover_line = !empty($settings['show_title_line']) ? 'pxl-hover-line' : '';
    $display_type = $settings['display_type'];
    $img_size = ($display_type === 'pxl-layout-horizontal') ? '388x388' : '558x400';
    $image_overlay = !empty($settings['image_overlay']) ? 'pxl-image--overlay' : '';
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-news-carousel pxl-news-carousel1 <?php echo esc_attr($display_type); ?>" >
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') : ?>
                        <?php foreach ($posts as $key => $post): ?>
                            <?php 
                                $comment_count = get_comments_number(); 
                                $thumbnail = null;
                                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))){
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $img_size
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                }
                            ?>
                            <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>" data-wow-duration="1.2s">
                                <div class="pxl-post--inner " >
                                    <?php if(!is_null($thumbnail)) : ?>
                                        <div class="pxl-post--featured hover-imge-effect2 <?php echo esc_attr($image_overlay); ?>">
                                            <a class="pxl-image--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-post--content">
                                        <div class="pxl-post--meta">
                                            <?php if($show_date): ?>
                                                <div class="pxl-post--date">
                                                    <span>
                                                        <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="pxl-post--comment pxl-green-1" data-count="<?php echo esc_attr($comment_count); ?>">
                                                <i class="flaticon flaticon-comment"></i>
                                            </div>
                                        </div>
                                        <h4 class="pxl-post--title <?php echo esc_attr($title_hover_line); ?>">
                                            <a class="pxl-title--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                                            </a>
                                        </h4>
                                        <?php if($show_excerpt): ?>
                                            <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_button) : ?>
                                            <a class="btn btn-round btn-readmore pxl-post--btn btn-hover-style-2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                                                <i class="flaticon flaticon-plus-normal pxl-btn--icon"></i>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </div> 
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>" data-wow-duration="1.2s">
                            <?php foreach ($posts as $key => $post) : ?>
                                <?php 
                                    $comment_count = get_comments_number(); 
                                    $thumbnail = null;
                                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))){
                                        $img_id = get_post_thumbnail_id($post->ID);
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $img_id,
                                            'thumb_size' => $img_size
                                        ));
                                        $thumbnail = $img['thumbnail'];
                                    }
                                ?>
                                <div class="pxl-post--inner " >
                                    <?php if(!is_null($thumbnail)) : ?>
                                        <div class="pxl-post--featured hover-imge-effect2 <?php echo esc_attr($image_overlay); ?>">
                                            <a class="pxl-image--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-post--content">
                                        <div class="pxl-post--meta">
                                            <?php if($show_date): ?>
                                                <div class="pxl-post--date">
                                                    <span>
                                                        <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($show_comment): ?>
                                                <div class="pxl-post--comment pxl-green-1" data-count="<?php echo esc_attr($comment_count); ?>">
                                                    <i class="flaticon flaticon-comment"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="pxl-post--title <?php echo esc_attr($title_hover_line); ?>">
                                            <a class="pxl-title--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                                            </a>
                                        </h4>
                                        <?php if($show_excerpt): ?>
                                            <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_button) : ?>
                                            <a class="btn btn-round btn-readmore pxl-post--btn btn-hover-style-2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                                                <i class="flaticon flaticon-plus-normal pxl-btn--icon"></i>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </div> 
                                <?php $i++; ?> 
                                <?php if ($i % 2 === 0 && $i !== count($posts)) : ?> 
                                    </div>
                                    <div class="pxl-swiper-slide">
                                <?php endif; ?>
                            <?php endforeach; ?> 
                        </div>
                    <?php endif; ?>
                </div> 
            </div>
            <?php if((bool)$pagination): ?>
                <div class="pxl-swiper-dots-wrap pxl-swiper-dots-default">
                    <div class="pxl-swiper-dots"></div>
                </div>
            <?php endif; ?>

            <?php if((bool)$arrows): ?>
                <div class="pxl-swiper-arrow-wrap  <?php echo esc_attr($arrow_style); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>