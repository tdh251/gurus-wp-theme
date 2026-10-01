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
    $animate_delay = $widget->get_setting('pxl_animate_delay', 0);
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

    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = $widget->get_setting('num_words', 15);
    $show_button = !empty($settings['show_button']) || false;
    $button_text = $widget->get_setting('button_text', 'Show Case');
    $show_icon = !empty($settings['show_icon']) || false;
    
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-service-carousel pxl-service-carousel8">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($posts as $key => $post) : ?>
                        <?php 
                            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
                            $service_icon = gurus_get_service_icon($post->ID);
                            $delay = $key * $animate_delay;
                            $num_of_highlight_text = 1;
                            $title_words = explode(' ', get_the_title($post->ID));
                            $insert_position = count($title_words) - $num_of_highlight_text;
                            if (isset($title_words[$insert_position])) {
                                $title_words[$insert_position] = '<span class="pxl-text-highlight">' . $title_words[$insert_position];
                            }
                            $title_words[] = '</span>';
                            $title = implode(' ', $title_words);
                        ?>
                            <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>"  data-wow-duration="1.2s" data-wow-delay="<?php echo esc_attr($delay.'ms'); ?>">
                                <div class="pxl-post--container">
                                    <div class="pxl-post--inner  " >
                                        <div class="pxl-post--main">
                                            <?php if($show_icon) : ?>
                                                <div class="pxl-post--icon">
                                                    <?php pxl_print_html($service_icon); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="pxl-post--content">
                                                <h3 class="pxl-post--title ">
                                                    <span class="pxl-title--text">
                                                        <?php pxl_print_html($title); ?>
                                                    </span>    
                                                </h3>
                                                <?php if($show_excerpt) : ?>
                                                    <div class="pxl-post--excerpt">
                                                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if($show_button) : ?>
                                                <div class="pxl-btn--wrap">
                                                    <span class="btn pxl-post--btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12">
                                                            <rect x="0.5" y="5" width="12" height="2" fill="currentcolor"/>
                                                            <rect x="7.5" width="12" height="2" transform="rotate(90 7.5 0)" fill="currentcolor"/>
                                                        </svg>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pxl-post--hover" >
                                            <div class="pxl-post--category">
                                                <?php the_terms($post->ID, 'service-category', '', ''); ?>
                                            </div>
                                            <div class="pxl-post--featured">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                                        $img_id = get_post_thumbnail_id($post->ID);
                                                        $img = pxl_get_image_by_size( array(
                                                            'attach_id'  => $img_id,
                                                            'thumb_size' => 'full',
                                                            
                                                        ));
                                                        $thumbnail    = ($img) ? $img['thumbnail'] : '';
                                                        pxl_print_html($thumbnail);
                                                    endif; ?>
                                                </a>
                                            </div>
                                            <a class="pxl-post--btn" href="<?php echo esc_url($post_link); ?>">
                                                <span class="pxl-btn-text">
                                                    <?php echo esc_html($button_text); ?>
                                                </span>
                                                <span class="pxl-btn-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                        <path d="M0.862427 12.275L11.8098 1.32764" stroke="#002B2B" stroke-width="1.48668"/>
                                                        <path d="M0.862549 1.44922H11.6883" stroke="#002B2B" stroke-width="1.48668"/>
                                                        <path d="M11.6881 12.275V1.44922" stroke="#002B2B" stroke-width="1.48668"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
