
<?php 
    $html_id = pxl_get_element_id($settings);

    $current_id = get_the_ID();
    $post_type = get_post_type($current_id);
    $posts = null;
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'DESC');
    $limit = $widget->get_setting('limit', 4);

    if($settings['suggested_type'] === 'custom') {
        $source = $widget->get_setting('source', '');
        $post_ids = $widget->get_setting('post_ids', '');
        extract(pxl_get_posts_of_grid($post_type, [
            'source' => $source,
            'orderby' => $orderby,
            'order' => $order,
            'limit' => $limit,
            'post_ids' => $post_ids,
        ]));
    }else {
        $post_category = $post_type === 'post' ? 'category' : $post_type.'-category';
        $term_ids = [];
        $query_args  = [
            'post_type'           => $post_type,
            'posts_per_page'      => $limit,
            'no_found_rows'       => true,
            'order'               => $order,
            'orderby'             => $orderby, 
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ];
        if($settings['suggested_type'] === 'related') {
            $categories = get_the_terms($current_id, $post_category);
            if(!empty($categories)) {
                foreach($categories as $category) {
                    $term_ids[] = $category->term_id;
                }
            }
            if (!empty($term_ids)) {
                $query_args['tax_query'] = [
                    'relation' => 'AND',                     
                    array(
                      'taxonomy' => $post_type.'-category',             
                      'field' => 'id',                  
                      'terms' => $term_ids,  
                      'include_children' => false,           
                      'operator' => 'IN'                
                    ),
                ];
            }
        }
        $query = new WP_Query($query_args);
        $posts = $query->get_posts();
    }

?>
<div class="pxl-recent-post">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <ul class="pxl-item--list">
                <?php if (is_array($posts)) : ?>
                    <?php foreach($posts as $key => $post) : ?>
                        <?php 
                            $post_id = $post->ID; 
                            $current_post = $current_id === $post_id ? 'current-post' : '';
                        ?>
                    <div class="pxl-post-item ">
                        <h5 class="pxl-post--title ">
                            <a class="pxl-item--link pxl-dark-100 <?php echo esc_attr($current_post); ?>" href="<?php echo esc_url(get_permalink( $post_id )); ?>">
                                <?php 
                                    $icon_content = null;
                                    if($post_type === 'service') {
                                        $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                        $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                        $icon_content = !empty($icon_font) ? '<i class="'.esc_attr($icon_font).'"></i>' : $icon_content;
                                        if(!empty($icon_img)) {
                                            $get_icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $icon_img['id'],
                                                'thumb_size' => 'full',
                                            ));
                                        }
                                        $icon_content =  !empty($icon_img['thumbnail']) ? $get_icon_img['thumbnail'] : $icon_content;
                                    }
                                ?>
                                <span class="pxl-item--icon">
                                    <?php if(!empty($settings['pxl_icon']['value'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php elseif(!is_null($icon_content) & empty($settings['pxl_icon']['value'])) : ?>
                                        <?php pxl_print_html($icon_content); ?>
                                    <?php else : ?>
                                        <svg width="33.92" height="37" viewBox="0 0 74 80" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 19.9973V60.0027L36.6667 80L73.3333 60.0027V19.9973L36.6667 0L0 19.9973ZM71.0637 58.7696L36.6667 77.5339L2.26968 58.7696V21.2411L36.6667 2.47688L52.1459 10.9262C44.7694 10.122 32.5586 10.2185 22.9919 17.3489C13.4252 24.4686 8.91984 36.8744 9.57805 54.2019L9.60074 54.7916L36.6667 69.5564L63.7553 54.7809V23.9861L52.6452 30.0442V48.712L37.8015 56.8074V19.8794L36.3376 20.2976C36.1446 20.3512 31.6961 21.6593 27.2475 25.9161C23.1848 29.8191 18.339 37.046 18.4184 49.3339V49.945L36.6667 59.8955L54.9149 49.945V31.2773L61.4856 27.696V53.5371L36.6667 67.0795L11.825 53.5263C11.3144 37.2282 15.536 25.6266 24.3877 19.0323C37.3476 9.3714 56.254 13.6604 57.9336 14.0678L71.0637 21.2304V58.7696ZM35.5318 22.9031V56.8074L20.6881 48.712C20.8357 30.9128 31.5372 24.6294 35.5318 22.9031Z" fill="#20282D"/>
                                        </svg>
                                    <?php endif; ?>
                                </span>
                                <?php echo esc_attr(get_the_title($post_id)); ?>
                            </a>
                        </h5>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <a class="pxl-item--link h6">
                        <span class="pxl-item--group">
                            <span class="pxl-item--title">
                                <?php echo esc_html__('Post Not Found', 'gurus'); ?>
                            </span>
                        </span>
                        <span class="pxl-item--arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M5.90142 16.1234C5.70192 15.9238 5.58984 15.6532 5.58984 15.371C5.58984 15.0888 5.70192 14.8182 5.90142 14.6186L11.1692 9.35086L5.90142 4.08312C5.70757 3.88241 5.60031 3.61359 5.60273 3.33457C5.60516 3.05554 5.71708 2.78863 5.91439 2.59132C6.1117 2.39401 6.37861 2.28209 6.65764 2.27967C6.93666 2.27724 7.20548 2.38451 7.40619 2.57836L13.4263 8.59847C13.6258 8.79804 13.7379 9.06867 13.7379 9.35086C13.7379 9.63304 13.6258 9.90367 13.4263 10.1032L7.40619 16.1234C7.20662 16.3229 6.93599 16.4349 6.65381 16.4349C6.37162 16.4349 6.10099 16.3229 5.90142 16.1234Z" fill="#072032"/>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
