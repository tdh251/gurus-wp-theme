<?php
    $html_id = pxl_get_element_id($settings);
    $select_post_by = $widget->get_setting('select_post_by', '');
    $source = $post_ids = [];
    if($select_post_by === 'post_selected'){
        $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
    }else{
        $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    }
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 4);
    $settings['layout'] = $settings['layout_'.$settings['post_type']];

    $highlight_length = $widget->get_setting('highlight_title', 2);
    $highlight_title = null;

    extract(pxl_get_posts_of_grid('portfolio', [
        'source' => $source,
        'orderby' => $orderby,
        'order' => $order,
        'limit' => $limit,
        'post_ids' => $post_ids,
    ]));

    $image_size = $widget->get_setting('img_size');
    $image_size = !empty($img_size) ? $img_size : '556x585';
    $show_category = !empty($settings['show_category']) || false;
    $show_excerpt = !empty($settings['show_excerpt']) || false;
    $num_words = $widget->get_setting('num_words', 25);
    $show_button = !empty($settings['show_button']) || false;
    $button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View More';
    $item_active = !empty($settings['item_active']) ? $settings['item_active'] : 1;
?>
<?php if (is_array($posts)): ?>
    <div class="pxl-post-accordion pxl-portfolio-accordion pxl-portfolio-accordion1 <?php echo esc_attr($settings['l_portfolio_style']) ?>">
        <?php foreach ($posts as $index=>$post): ?>
            <?php
                $title = !empty(get_the_title($post->ID)) ? get_the_title($post->ID) : null; 
                $title_tmp = $title;
                if($highlight_length != 0 && !is_null($title)) {
                    $title_words = explode(" ", $title);
                    $title_length = count($title_words);
                    $highlight_title = array_slice($title_words, $title_length - $highlight_length , $highlight_length );
                    $highlight_title = implode(' ', $highlight_title);
                    $title = str_replace($highlight_title, '', $title);
                    $title_tmp = $title.'<span class="pxl-title--highlight">'.$highlight_title.'</span>';
                    $active = ($index === $item_active) ? 'active' : '';
                } 
            ?> 
            <div class="pxl-item <?php echo esc_attr($active); ?>">
                <!-- None active -->
                <div class="pxl-item--inner pxl-item--main">
                    <!-- Viewmore button -->
                    <a class="btn btn-viewmore pxl-item--btn pxl-white pxl-btn-default pxl-hover-default" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                        <i class="pxl-icon--default flaticon flaticon-up-right"></i>
                    </a>
                    <!-- Title -->
                    <h3 class="pxl-item--title pxl-white">
                        <?php echo esc_attr($title.' '.$highlight_title); ?>
                    </h3>
                </div>
                <!-- Active -->
                <div class="pxl-item--inner pxl-item--active">
                    <!-- Image background feature-->
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--featured hover-imge-effect2">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>

                    <!-- Content -->
                    <div class="pxl-item--holder">
                        <div class="pxl-item--content">
                            <!-- Category -->
                            <?php if($show_category): ?>
                                <div class="pxl-item--category link-none pxl-b3 pxl-white">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h2 class="pxl-item--title pxl-white pxl-hover-line">
                                <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php pxl_print_html($title_tmp); ?>
                                </a>
                            </h2>
                            <!-- Excerpt -->
                            <?php if($show_excerpt): ?>
                                <div class="pxl-item--excerpt pxl-white">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Viewmore button -->
                             <?php if($show_button): ?>
                                <a class="btn pxl-item--btn pxl-btn-default pxl-btn-large pxl-btn-border pxl-btn-light pxl-hover-default" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>    
                                    <i class="pxl-icon--default flaticon flaticon-up-right-arrow"></i>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div> 
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>