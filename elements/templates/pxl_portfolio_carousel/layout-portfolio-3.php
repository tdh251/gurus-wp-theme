<?php
    $html_id = pxl_get_element_id($settings);
    $tax = ['portfolio-category'];
    $select_post_by = $widget->get_setting('select_post_by', '');
    $post_type = $settings['post_type'] ?? 'post';
    $post_ids = ($select_post_by === 'post_selected') ? $widget->get_setting('source_'.$post_type.'_post_ids', '') : [];
    $source = ($select_post_by !== 'post_selected') ? $widget->get_setting('source_'.$post_type, '') : [];
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);


    extract(pxl_get_posts_of_grid(
        $post_type, 
        [
            'source' => $source, 
            'orderby' => $orderby, 
            'order' => $order, 
            'limit' => $limit, 
            'post_ids' => $post_ids
        ],
        $tax
    ));

    $filter_default_title = $widget->get_setting('filter_default_title', 'All Case');
    // Grid
    $col_xs = $widget->get_setting('col_xs', '');
    $col_sm = $widget->get_setting('col_sm', '');
    $col_md = $widget->get_setting('col_md', '');
    $col_lg = $widget->get_setting('col_lg', '');
    $col_xl = $widget->get_setting('col_xl', '');
    $col_xxl = $widget->get_setting('col_xxl', '');
    $slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

    $drap = $widget->get_setting('drap', false);
    // Animation
    $animate = $widget->get_setting('pxl_animate');
    $animate_delay = $widget->get_setting('animate_delay', 0);

    // Display
    $show_category = !empty($settings['show_category']) || false;
    $num_words = !empty($settings['num_words']) ? $settings['num_words'] : 27;
    $num_categories = $settings['num_categories'] ?? '';
    $title_hover_style = $settings['title_hover_style']  ?? '';

    $pause_on_hover = !empty($settings['pause_on_hover']) || false;
    $autoplay = !empty($settings['autoplay']) || false;
    $autoplay_speed = !empty($settings['autoplay_speed']) ? $settings['autoplay_speed'] : 5000;
    $infinite = !empty($settings['infinite']) || false;
    $speed = !empty($settings['speed']) ? $settings['speed'] : 500;
    $arrows = !empty($settings['arrows']) || false;
    $pagination = !empty($settings['pagination']) || false;
    $pagination_type = $settings['pagination_type'];
    $slides_to_scroll = !empty($settings['slides_to_scroll']) ? $settings['slides_to_scroll'] : 1;


    $opts = [
        'slide_direction'               => 'horizontal',
        'slide_percolumn'               => 1, 
        'slide_mode'                    => 'slide', 
        'slides_to_show_xxl'            => (int)$col_xxl,
        'slides_to_show'                => (int)$col_xl,
        'slides_to_show_lg'             => (int)$col_lg,
        'slides_to_show_md'             => (int)$col_md,
        'slides_to_show_sm'             => (int)$col_sm,
        'slides_to_show_xs'             => (int)$col_xs,
        'slides_to_scroll'              => (int)$slides_to_scroll,
        'arrow'                         => $arrows,
        'pagination'                    => $pagination,
        'pagination_type'               => $pagination_type,
        'autoplay'                      => $autoplay,
        'pause_on_hover'                => $pause_on_hover,
        'pause_on_interaction'          => true,
        'delay'                         => $autoplay_speed,
        'loop'                          => $infinite,
        'speed'                         => $speed
    ];
    $widget->add_render_attribute( 'carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]);
?>

<div class="pxl-post-carousel pxl-portfolio-carousel pxl-portfolio-carousel3 pxl-swiper-slider pxl-swiper-nogap">
    <div class="pxl-swiper-filter">
        <div class="pxl-filter-inner">
            <span class="filter-item active" data-count="<?php echo esc_attr(count($posts)); ?>" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php 
                    $category_arr = explode('|', $category); 
                    $current_term = get_term_by('slug', $category_arr[0], $category_arr[1]); 
                    $_is = false;
                    $count = 0;
                    foreach($posts as $post) {
                        $terms = get_the_terms($post->ID, $post_type . '-category');
                        if ($terms && !is_wp_error($terms)) { 
                            foreach($terms as $term) {
                                if ($current_term && $current_term->slug === $term->slug) {
                                    $_is = true; 
                                    $count++; 
                                }
                            }
                        }
                    }
                ?>
                <?php if($_is) : ?>
                    <span class="filter-item" data-count="<?php echo esc_attr($count); ?>" data-filter="<?php echo esc_attr($current_term->slug); ?>">
                        <?php echo esc_html($current_term->name); ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($posts as $key => $post): ?>
                    <?php             
                        $thumbnail_url = null;
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => 'full',
                            ));
                            $thumbnail_url  = $img['url'];
                        }
                        $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
                        $delay = $key * $animate_delay;
                    ?>
                    <div class="pxl-swiper-slide <?php echo esc_attr($settings['pxl_animate'].' '.$filter_class); ?>" data-wow-delay="<?php echo esc_attr($delay.'ms'); ?>">
                        <div class="pxl-post--container ">
                            <div class="pxl-post--inner" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                                <div class="pxl-overlay--hover"></div>
                                <div class="pxl-post--content">
                                    <h6 class="pxl-post--title <?php echo esc_attr($title_hover_style); ?>">
                                        <a class="pxl-title--link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <?php echo esc_html(get_the_title($post->ID)); ?>
                                        </a>
                                    </h6>
                                    <div class="pxl-post--category">
                                        <?php 
                                            the_terms( $post->ID, 'portfolio-category', '', ' , ' ); 
                                        ?>
                                    </div>
                                </div>
                                <a class="pxl-item--link" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

