<?php
    $html_id = pxl_get_element_id($settings);


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

    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : '827x528';
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    $title_info1 = !empty($settings['title_info1']) ? $settings['title_info1'] : 'Client: ';
    $title_info2 = !empty($settings['title_info2']) ? $settings['title_info2'] : 'Finish Day: ';
    $title_info3 = !empty($settings['title_info3']) ? $settings['title_info3'] : 'Total Value: ';
    $title_line = !empty($settings['title_line']) ? 'pxl-hover-line' : '';
    $show_category = !empty($settings['show_category']) || false;
    $show_button = !empty($settings['show_button']) || false;
    $show_divider = !empty($settings['show_divider']) || false;
    $show_info1 = !empty($settings['show_info1']) || false;
    $show_info2 = !empty($settings['show_info2']) || false;
    $show_info3 = !empty($settings['show_info3']) || false;
?>

<?php if ($is_items): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-portfolio-carousel pxl-portfolio-carousel2">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['items'] as $key => $post) : ?>
                        <?php 
                            $thumbnail = null;
                            if(!empty($post['image_featured']['id'])) {
                                $img_id = $post['image_featured']['id'];
                                $image    = pxl_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $img_size
                                ));
                                $thumbnail = $image['thumbnail'];
                            }; 
                            if ( ! empty( $post['link']['url'] ) ) {
                                $widget->add_render_attribute( 'post_link', 'href', $post['link']['url'] );
                                if ( $post['link']['is_external'] ) {
                                    $widget->add_render_attribute( 'post_link', 'target', '_blank' );
                                }
                                if ( $post['link']['nofollow'] ) {
                                    $widget->add_render_attribute( 'post_link', 'rel', 'nofollow' );
                                }
                            }
                            $title = !empty($post['title']) ? $post['title'] : '';
                            $category = !empty($post['category']) ? $post['category'] : '';
                            $category_slug = (!empty($category)) ? sanitize_title($category) : '#';
                            $info1 = !empty($post['info1']) ? $post['info1'] : '';
                            $info2 = !empty($post['info2']) ? $post['info2'] : '';
                            $info3 = !empty($post['info3']) ? $post['info3'] : '';

                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--container">
                                <div class="pxl-post--inner <?php echo esc_attr($animate); ?>" data-wow-duration="1s">
                                    <?php if(!is_null($thumbnail)) : ?>
                                        <div class="pxl-post--featured">
                                            <?php pxl_print_html($thumbnail); ?>
                                        </div>
                                    <?php endif ?>

                                    <div class="pxl-post--content">
                                        <?php if($show_category) : ?>
                                            <div class="pxl-post--category">
                                                <a class="pxl-category--link" href="<?php echo esc_url("/category/" . $category_slug); ?>">
                                                    <?php echo esc_attr($category); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <h4 class="pxl-post--title <?php echo esc_attr($title_line); ?>">
                                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'post_link' )); ?> class="pxl-title--link">
                                                <?php echo esc_attr($title); ?>
                                            </a>
                                        </h4>
                                        <?php if($show_divider) : ?>
                                            <hr class="pxl-item--divider">
                                        <?php endif; ?>
                                        <div class="pxl-post--meta">
                                            <?php if($show_info1) : ?>
                                                <div class="pxl-post--info">
                                                    <span class="pxl-text--highlight"><?php echo esc_html($title_info1); ?></span>
                                                    <?php echo esc_attr($info1); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($show_info2) : ?>
                                                <div class="pxl-post--info">
                                                    <span class="pxl-text--highlight"><?php echo esc_html($title_info2); ?></span>
                                                    <?php echo esc_attr($info2); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($show_info3) : ?>
                                                <div class="pxl-post--info">
                                                    <span class="pxl-text--highlight"><?php echo esc_html($title_info3); ?></span>
                                                    <?php echo esc_attr($info3); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($show_button) : ?>
                                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'post_link' )); ?> class="btn pxl-post--link pxl-post--btn">
                                                <?php if(!empty($settings['btn_icon']['value'])) : ?>
                                                    <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                <?php else : ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                                        <g clip-path="url(#clip0_1_3279)">
                                                            <path d="M1.75614 2.0659C1.50497 2.0659 1.29475 1.98127 1.12548 1.812C0.956215 1.64274 0.871582 1.43525 0.871582 1.18954C0.871582 0.943829 0.956215 0.736341 1.12548 0.567074C1.29475 0.397806 1.50497 0.313173 1.75614 0.313173H16.3841C16.6352 0.313173 16.8454 0.397806 17.0147 0.567074C17.184 0.736341 17.2686 0.946559 17.2686 1.19773V15.8256C17.2686 16.0768 17.184 16.287 17.0147 16.4563C16.8454 16.6256 16.638 16.7102 16.3922 16.7102C16.1465 16.7102 15.9391 16.6256 15.7698 16.4563C15.6005 16.287 15.5159 16.0768 15.5159 15.8256V3.31083L2.3786 16.4481C2.20387 16.6228 1.99366 16.7102 1.74795 16.7102C1.50224 16.7102 1.29475 16.6256 1.12548 16.4563C0.956215 16.287 0.871582 16.0796 0.871582 15.8338C0.871582 15.5881 0.958945 15.3779 1.13367 15.2032L14.271 2.0659H1.75614Z" fill="white"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1_3279">
                                                            <rect width="16.397" height="16.397" fill="white" transform="matrix(1 0 0 -1 0.871582 16.7102)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php if((bool)$pagination): ?>
                <div class="pxl-swiper-dots-wrap pxl-swiper-dots-default" >
                    <div class="pxl-swiper-dots "></div>
                </div>
            <?php endif; ?>

            <?php if((bool)$arrows): ?>
                <div class="pxl-swiper-arrow-wrap <?php echo esc_attr($settings['arrows_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['arrows_animate_delay']); ?>">
                    <div class="btn pxl-swiper-arrow pxl-swiper-arrow-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="39" viewBox="0 0 72 39" fill="none">
                            <path d="M31.5 12.5C31.5 13.242 30.767 14.35 30.025 15.28C29.071 16.48 27.931 17.527 26.624 18.326C25.644 18.925 24.456 19.5 23.5 19.5M23.5 19.5C24.456 19.5 25.645 20.075 26.624 20.674C27.931 21.474 29.071 22.521 30.025 23.719C30.767 24.65 31.5 25.76 31.5 26.5M23.5 19.5H47.5" stroke="white"/>
                        </svg>
                    </div>
                    <div class="btn pxl-swiper-arrow pxl-swiper-arrow-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="39" viewBox="0 0 72 39" fill="none">
                            <path d="M40.5 12.5C40.5 13.242 41.233 14.35 41.975 15.28C42.929 16.48 44.069 17.527 45.376 18.326C46.356 18.925 47.544 19.5 48.5 19.5M48.5 19.5C47.544 19.5 46.355 20.075 45.376 20.674C44.069 21.474 42.929 22.521 41.975 23.719C41.233 24.65 40.5 25.76 40.5 26.5M48.5 19.5H24.5" stroke="white"/>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
