<?php
    $html_id = pxl_get_element_id($settings);
    $source    = $widget->get_setting('source_'.$settings['post_type']);
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    $post_ids = $widget->get_setting('post_ids', '');
    $settings['layout']    = $settings['layout_'.$settings['post_type']];
    $select_post_by = $widget->get_setting('select_post_by', '');
    if($select_post_by === 'post_selected'){
        $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
    }else{
        $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    }
    extract(pxl_get_posts_of_grid('service', [
        'source' => $source,
        'orderby' => $orderby,
        'order' => $order,
        'limit' => $limit,
        'post_ids' => $post_ids,
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
    $animate = $settings['pxl_animate'];
    $animate_delay = $settings['pxl_animate_delay'];
    $show_icon = !empty($settings['show_icon']) || false;
    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = !empty($settings['num_words']) ? $settings['num_words'] : 16;
    $show_button = !empty($settings['show_button']) || false;
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View Details';
    $theme = !empty($settings['theme']) ? 'pxl-theme-dark' : 'pxl-theme-light';
    $classes = $settings['style'].' '.$theme;
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-service-carousel pxl-service-carousel1 <?php echo esc_attr($classes); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') : ?>
                        <?php foreach ($posts as $key => $post): ?>
                            <?php                                    
                                $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
                                $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                $thumbnail_icon = null;
                                if($show_icon == 'true' && $icon_type === 'image' && !empty($icon_img)) {
                                    $is_icon_image = true;
                                    $icon_image = pxl_get_image_by_size( array(
                                        'attach_id'  => $icon_img['id'],
                                        'thumb_size' => 'full',
                                    ));
                                    $thumbnail_icon = $icon_image['thumbnail'];
                                }
                            ?>
                            <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
                                <div class="pxl-post--container" >
                                    <div class="pxl-post--inner">
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
                                            <div class="pxl-post--excerpt pxl-three-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <a class="pxl-item--link" href="<?php echo esc_url($post_link); ?>"></a>  
                                    </div>
                                </div>  
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
                            <?php foreach ($posts as $key => $post): ?>
                                <?php 
                                    $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                    $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                    $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                    $thumbnail_icon = null;
                                    if($show_icon == 'true' && $icon_type === 'image' && !empty($icon_img)) {
                                        $is_icon_image = true;
                                        $icon_image = pxl_get_image_by_size( array(
                                            'attach_id'  => $icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $thumbnail_icon = $icon_image['thumbnail'];
                                    } 
                                    $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );

                                ?>
                                <div class="pxl-post--container">
                                    <div class="pxl-post--inner">
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
                                        <a class="pxl-item--link" href="<?php echo esc_url($post_link); ?>"></a>  
                                    </div>

                                </div>   
                                <?php $i++; ?> 
                                <?php if ($i % 2 == 0 && $i != count($posts)) : ?> 
                                    </div><div class="pxl-swiper-slide">
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
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