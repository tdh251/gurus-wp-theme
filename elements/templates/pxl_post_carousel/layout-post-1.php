<?php
    $html_id = pxl_get_element_id($settings);
    $source    = $widget->get_setting('source_'.$settings['post_type']);
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    $post_ids = $widget->get_setting('post_ids', '');
    $settings['layout']    = $settings['layout_'.$settings['post_type']];

    extract(pxl_get_posts_of_grid('post', [
        'source' => $source,
        'orderby' => $orderby,
        'order' => $order,
        'limit' => $limit,
        'post_ids' => $post_ids,
    ]));

    $pxl_animate = $widget->get_setting('pxl_animate', '');
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

    $img_size = $widget->get_setting('img_size', 'full');

    if($settings['l_post_style'] === 'style-1') {
        $image_size = '558x400';
    }elseif($settings['l_post_style'] === 'style-2') {
        $image_size = '388x388';
    }


    $is_comment_background_gadient = $widget->get_setting('is_comment_background_gadient');
    $is_comment_background_gadient = ($is_comment_background_gadient == 'true') ? 'text-gradient-vertical' : '';

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

    $show_date = !empty($settings['show_date']) || false;
    $show_comment = !empty($settings['show_comment']) || false;
    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = !empty($settings['num_words']) ? $settings['num_words'] : 16;
    $show_button = !empty($settings['show_button']) || false;
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View More';
?>


<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-post-carousel1 <?php echo esc_attr($settings['l_post_style']).' '.$settings['l_post_style1']; ?>" >
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <!--  -->
                <div class="pxl-swiper-wrapper">
                <?php if($settings['slider_row'] == '1') { ?>
                    <?php foreach ($posts as $key => $post):
                        $comment_count = get_comments_number();
                        $post_video_link = get_post_meta($post->ID, 'post_video_link', true); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                        $img_id = get_post_thumbnail_id($post->ID);
                                        $img          = pxl_get_image_by_size( array(
                                            'attach_id'  => $img_id,
                                            'thumb_size' => $image_size
                                        ));
                                        $thumbnail    = $img['thumbnail'];
                                    ?>
                                        <div class="pxl-post--featured hover-imge-effect2">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                            <?php if(!empty($post_video_link)) : ?>
                                                <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                                                <span class="button-video-overlay bg-image"></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-post-holder">
                                        <div class="pxl-post-info">
                                            <div class="pxl-post--meta">
                                                <?php if($show_date): ?>
                                                    <div class="pxl-post--date pxl-p3">
                                                        <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($show_comment): ?>
                                                    <div class="pxl-post--comment">
                                                        <i class="flaticon flaticon-comment pxl-green-1 <?php echo esc_attr($is_comment_background_gadient); ?>"></i>
                                                        <span class="comments-count pxl-p4">
                                                            <?php echo esc_attr($comment_count) ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <h4 class="pxl-post--title pxl-hover-line">
                                                <a class="pxl-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                            </h4>
                                            <?php if($show_excerpt): ?>
                                                <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

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
                    <?php } else { ?>
                        <?php echo '<div class="pxl-swiper-slide">'; $i = 0; foreach ($posts as $key => $post):
                            $comment_count = get_comments_number();
                            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); ?>
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img          = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ));
                                    $thumbnail    = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-post--featured hover-imge-effect2">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                        <?php if(!empty($post_video_link)) : ?>
                                            <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                                            <span class="button-video-overlay bg-image"></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="pxl-post-holder">
                                    <div class="pxl-post-info">
                                        <div class="pxl-post--meta">
                                            <?php if($show_date): ?>
                                                <div class="pxl-post--date pxl-p3">
                                                    <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($show_comment): ?>
                                                <div class="pxl-post--comment">
                                                    <i class="flaticon flaticon-comment pxl-green-1 <?php echo esc_attr($is_comment_background_gadient); ?>"></i>
                                                    <span class="comments-count pxl-p4">
                                                        <?php echo esc_attr($comment_count) ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="pxl-post--title pxl-hover-line">
                                            <a class="pxl-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h4>
                                        <?php if($show_excerpt): ?>
                                            <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($show_button) : ?>
                                        <a class="btn btn-round btn-readmore pxl-post--btn btn-hover-style-2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                                            <i class="flaticon flaticon-plus-normal pxl-btn--icon"></i>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div> 
                            <?php $i++;  
                            if ($i % 2 == 0 && $i != count($posts)) { 
                                echo '</div><div class="pxl-swiper-slide">';
                            } ?>
                        <?php endforeach; echo "</div>"; ?>
                    <?php } ?>
                </div> 
                <!--  -->
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