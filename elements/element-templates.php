<?php 
 
if(!function_exists('gurus_get_post_grid')){
    function gurus_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                gurus_get_post_grid_layout1($posts, $settings);
                break;

            case 'portfolio-1':
                gurus_get_portfolio_grid_layout1($posts, $settings);
                break;
                
            case 'service-1':
                gurus_get_service_grid_layout1($posts, $settings);
                break;
            case 'service-2':
                gurus_get_service_grid_layout2($posts, $settings);
                break;
            case 'service-3':
                gurus_get_service_grid_layout3($posts, $settings);
                break;
            case 'service-5':
                gurus_get_service_grid_layout5 ($posts, $settings);
                break;
            case 'service-6':
                gurus_get_service_grid_layout6 ($posts, $settings);
                break;
            case 'service-9':
                gurus_get_service_grid_layout9 ($posts, $settings);
                break;
            default:
                return false;
                break;
        }
    }
}

// -------------------------------------------------- Post Grid -------------------------------------------------------
//--------------------------------------------------
function gurus_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    if (is_array($posts)):
        $images_size = !empty($img_size) ? $img_size : '388x388';
        $button_text = empty($button_text) ? 'View More' : $button_text;
        foreach ($posts as $key => $post):
            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); 
            $comment_count = get_comments_number();
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; 

            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
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
                                <?php if($show_date == 'true'): ?>
                                    <div class="pxl-post--date pxl-p3">
                                        <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_comment == 'true'): ?>
                                    <div class="pxl-post--comment">
                                        <i class="flaticon flaticon-comment pxl-green-1"></i>
                                        <span class="comments-count pxl-p4">
                                            <?php echo esc_attr($comment_count) ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h4 class="pxl-post--title pxl-hover-line">
                                <a class="" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                            </h4>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if($show_button == 'true'): ?>
                            <div class="pxl-post-btn--wrap">
                                <a class="btn btn-round pxl-post--btn btn-hover-style-2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span class="pxl-btn--text"><?php echo esc_html($button_text) ?></span>
                                    <i class="flaticon flaticon-plus-normal"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Post Grid
//--------------------------------------------------

//-------------------------------------------------- Portfolio Grid -------------------------------------------------------
// Portfolio Layout 1
function gurus_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '380x477';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner">
                        <!-- Image background feature-->
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="pxl-post-bg--img hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            </div>
                        <?php endif; ?>
                        <!-- Content -->
                        <div class="pxl-post--holder">
                            <div class="pxl-post--content">
                                <!-- Title -->
                                <h5 class="pxl-post-title">
                                    <a class="pxl-white" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                        <?php echo esc_attr(get_the_title($post->ID)); ?>
                                    </a>
                                </h5>
                                <!-- Viewmore button -->
                                <?php if($show_button == 'true'): ?>
                                    <div class="pxl-post-wrap--btn">
                                        <a class="btn btn-trapezoidal btn-readmore pxl-green-1" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <i class="flaticon flaticon-arrow-right"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="pxl-post--holder pxl-post--hover">
                            <div class="pxl-post--content">
                                <div class="pxl-group">
                                    <div class="pxl-shape-trapezoidal"></div>
                                    <!-- Viewmore button -->
                                    <?php if($show_button == 'true'): ?>
                                        <div class="pxl-post-wrap--btn">
                                            <a class="btn btn-trapezoidal btn-readmore pxl-green-1" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <i class="flaticon flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Category -->
                                <?php if($show_category == 'true'): ?>
                                    <div class="pxl-post--category link-none pxl-b3">
                                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Title -->
                                <h5 class="pxl-post-title ">
                                    <a class="pxl-dark-100" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                        <?php echo esc_attr(get_the_title($post->ID)); ?>
                                    </a>
                                </h5>
                                <!-- Excerpt -->
                                <?php if($show_excerpt == 'true'): ?>
                                    <div class="pxl-post--excerpt pxl-p3 pxl-dark-100 pxl-three-line">
                                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------


//-------------------------------------------------- Service Grid -------------------------------------------------------
// Service Layout 1
function gurus_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '410x485';
    $button_text = empty($button_text) ? 'View More' : $button_text;
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xxl-{$col_xxl_m} col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            

            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post-bg--img"><?php echo wp_kses_post($thumbnail); ?></div>
                    <?php endif; ?>

                    <!-- Shape image feature -->
                    <?php if ($show_image ==='true' && has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post--img pxl-post--hover">
                            <div class="pxl-post-img--inner">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        </div>
                        <div class="pxl-post--img">
                            <a href="<?php echo esc_url($post_link); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <!-- Info service -->
                    <div class="pxl-post--holder">
                        <!-- Icon is i tag-->
                        <?php if($show_icon == 'true' && $icon_type === 'icon' && !empty($icon_font)) : ?>
                            <div class="pxl-post-icon">
                                <i class="<?php echo esc_attr($icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <!-- Icon is img tag -->
                        <?php 
                            if($show_icon == 'true' && $icon_type === 'image' && !empty($icon_img)) : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                if(!empty($icon_img['thumbnail'])) :
                                    $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                                    <div class="pxl-post--icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                        <?php 
                                endif; 
                            endif;
                        ?>
                        <!-- Title -->
                        <h3 class="pxl-post--title pxl-dark-slate pxl-dark-slate pxl-hover-line">
                            <a class="" href="<?php echo esc_url($post_link); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>    
                        </h3>
                        <!-- Show Excerpt -->
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-post-excerpt pxl-p2 pxl-dark-slate pxl-two-line">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Hover-->
                    <div class="pxl-post--holder pxl-post--hover">
                        <!-- Icon is i tag-->
                        <?php if($show_icon == 'true' && $icon_type === 'icon' && !empty($icon_font)) : ?>
                            <div class="pxl-post-icon">
                                <i class="<?php echo esc_attr($icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <!-- Icon is img tag -->
                        <?php if($show_icon == 'true' && $icon_type === 'image' && !empty($icon_img) && !empty($icon_img['thumbnail'])) : ?>
                            <div class="pxl-post--icon pxl-icon--img">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Title -->
                        <h3 class="pxl-post--title pxl-dark-slate pxl-dark-slate pxl-hover-line">
                            <a class="" href="<?php echo esc_url($post_link); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>    
                        </h3>
                        <!-- Show Excerpt -->
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-post--excerpt pxl-p2 pxl-dark-slate pxl-two-line">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Show Button -->
                        <?php if($show_button == 'true'): ?>
                            <div class="pxl-post-btn--wrap">
                                <a class="btn btn-readmore btn-small pxl-post--btn pxl-b2 pxl-white" href="<?php echo esc_url($post_link); ?>">
                                    <span class="pxl-btn--text"><?php echo esc_html($button_text) ?></span>
                                    <i class="flaticon flaticon-plus-normal white"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>    
            </div>
        <?php endforeach;
    endif;
}

// Service Layout 2
function gurus_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '570x360';
    $button_text = !empty($button_text) ? $button_text : 'View More';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );

            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner   <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--holder">
                        <!-- Show Icon Service -->
                        <?php if($icon_type === 'icon' && !empty($icon_font) && $show_icon === 'true')  : ?>
                            <div class="pxl-post-icon pxl-flex-center">
                                <i class="<?php echo esc_attr($icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <!-- Show Image Icon Service -->
                        <?php 
                            if($icon_type === 'image' && !empty($icon_img) && $show_icon === 'true') : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                if(!empty($icon_img['thumbnail'])) :
                                    $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                                    <div class="pxl-post--icon pxl-flex-center">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                        <?php 
                                endif; 
                            endif;
                        ?>
                        <!-- Title -->
                        <h4 class="pxl-post--title pxl-hover-line">
                            <a class="" href="<?php echo esc_url($post_link); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>    
                        </h4>
                        <!-- Show Excerpt -->
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-post--excerpt pxl-p3 pxl-dark-slate">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Show Button ViewMore -->
                        <?php if($show_button === 'true') : ?>
                            <div class="pxl-post-btn--wrap">
                                <a class="btn btn-readmore pxl-post--btn btn-hover btn-round pxl-dark-100 btn-hover-style-2" href="<?php echo esc_url($post_link); ?>">
                                    <span class="pxl-btn--text "><?php echo esc_html($button_text); ?></span>
                                    <i class="flaticon flaticon-plus-medium"></i>
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>    
            </div>

        <?php endforeach;
    endif;
}

// Service Layout 3
function gurus_get_service_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '522x522';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $num = $key + 1;
            $index = ($num < 10) ? '0'.(string)$num : $num; 
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
    
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
    
            $img_id = get_post_thumbnail_id($post->ID);
            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );

            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post-inner   <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <!-- Background Image Feature -->
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post-image--featured">
                            <a href="<?php echo esc_url($post_link); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <div class="pxl-post-bg--overlay"></div>
                            <div class="pxl-post-color--linear">
                                <svg class="" width="1200" height="345" viewBox="0 0 1200 345" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="1200" height="345" fill="url(#paint0_linear_108_10620)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_108_10620" x1="247.868" y1="334" x2="247.868" y2="44.0208" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="<?php echo esc_attr($color1); ?>"/>
                                            <stop offset="0.194999" stop-color="<?php echo esc_attr($color2); ?>" stop-opacity="0.994429"/>
                                            <stop offset="0.349999" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0.87"/>
                                            <stop offset="0.474999" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0.887321"/>
                                            <stop offset="0.629999" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0.76"/>
                                            <stop offset="0.764999" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0.482703"/>
                                            <stop offset="0.879999" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0.246487"/>
                                            <stop offset="1" stop-color="<?php echo esc_attr($color3); ?>" stop-opacity="0"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post-holder pxl-white">
                        <div class="pxl-post-holder--left">
                            <p class="pxl-post--index"><?php  echo esc_attr($index) ?></p>
                            <h4 class="pxl-post--title pxl-white">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </h4>
                        </div>
                        <a class="btn btn-readmore pxl-post--btn pxl-white" href="<?php echo esc_url($post_link); ?>">
                            <svg class="pxl-item--svg " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <rect width="32" height="1" fill="white"/>
                                <rect x="31" y="32" width="32" height="1" transform="rotate(-90 31 32)" fill="white"/>
                                <path d="M2 31L31.5 0.5" stroke="white"/>
                            </svg>
                        </a>
                    </div>
                    <a class="pxl-item--link" href="<?php echo esc_url($post_link); ?>"></a>
                </div>    
            </div>
        <?php endforeach;
    endif;

}

// Service Layout 5
function gurus_get_service_grid_layout5($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '570x446';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
    
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
    
            $img_id = get_post_thumbnail_id($post->ID);?>

            <?php if((!empty($title) || !empty($subtitle) || !empty($desc)) && $key === 0) : ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--first <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="pxl-post-image--featured">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item--inner">
                            <div class="pxl-item--group <?php echo esc_attr($pxl_animate_item_first); ?>" data-wow-duration=<?php echo esc_attr($pxl_animate_delay_item_first);?>>
                                <div class="pxl-item--subtitle pxl-subtitle-box-2"><?php echo esc_html($subtitle); ?></div>
                                <h1 class="pxl-item--title"><?php echo wp_kses_post($title); ?></h1>
                            </div>
                            <p class="pxl-p2 pxl-item--desc"><?php echo esc_html($desc); ?></p>
                        </div>
                    </div>    
                </div>
            <?php endif ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner   <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <!-- Background Image Feature -->
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post-image--featured hover-imge-effect2">
                            <a href="<?php echo esc_url($post_link); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post--holder ">
                        <h4 class="pxl-post--title">
                            <a href="<?php echo esc_url($post_link); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h4>
                        <a class="btn btn-readmore pxl-post--btn" href="<?php echo esc_url($post_link); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <rect x="-0.000976562" width="32" height="1" fill="#989898"/>
                                <rect x="30.999" y="32" width="32" height="1" transform="rotate(-90 30.999 32)" fill="#989898"/>
                                <path d="M1.99902 31L31.499 0.5" stroke="#989898"/>
                            </svg>
                        </a>
                    </div>
                </div>    
            </div>
        <?php endforeach;
    endif;
}

function get_icon_service($post, &$check) {
    $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
    $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
    $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
    $thumbnail_icon = null;

    if (is_array($icon_img) && isset($icon_img['id'])) {
        $icon_image = pxl_get_image_by_size(array(
            'attach_id'  => $icon_img['id'],
            'thumb_size' => 'full',
        ));

        if (is_array($icon_image) && isset($icon_image['thumbnail'])) {
            $thumbnail_icon = $icon_image['thumbnail'];
            $check = false;
            return $thumbnail_icon;
        }
    }

    return $icon_font;
}

// Service Layout 6
function gurus_get_service_grid_layout6($posts = [], $settings = []){ 
    extract($settings);
    $num_words = 25;
    
    if (is_array($posts)):
        foreach ($posts as $key => $post): ?>
            <?php
                $item_class = "pxl-item--post";
                if(!empty($tax))
                    $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                else 
                    $filter_class = '';
                $check = true;
                $icon = get_icon_service($post, $check);
                $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );

            ?>
            <?php if($item_first && $key === 0) : ?>
                <div class="pxl-item--first" >
                    <div class="pxl-item--container">
                        <div class="pxl-item--inner">
                            <div class="pxl-item--subtitle">
                                <span class="pxl-item--subtext">
                                    <?php echo esc_attr($subtitle); ?>
                                </span>
                            </div>
                            <h1 class="pxl-item--title <?php echo esc_attr($item_first_title_animate); ?>" data-wow-delay="<?php echo esc_attr($item_first_title_animate_delay); ?>">
                                <?php pxl_print_html($title); ?>
                            </h1>
                            <div class="pxl-item--desc">
                                <?php echo esc_attr($desc); ?>
                            </div>
                        </div>
                    </div>   
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--container">
                    <div class="pxl-post--inner">    
                        <div class="pxl-content--top">
                            <?php if(!empty($icon)) : ?>
                                <div class="pxl-post--icon">
                                    <?php if($check) : ?>
                                        <i class="<?php echo esc_attr($icon); ?>"></i>
                                    <?php else: ?>
                                        <?php echo wp_kses_post($icon); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <h4 class="pxl-post--title">
                                <a class="pxl-title--link" href="<?php echo esc_url($post_link); ?>">
                                    <?php echo esc_attr(get_the_title($post->ID)); ?>
                                </a>
                            </h4>
                            <div class="pxl-post--excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        </div>     
    
                        <a class="btn pxl-post--btn pxl-btn-round pxl-btn-medium" href="<?php echo esc_url($post_link); ?>">
                            <i class="flaticon flaticon-plus-normal"></i>
                        </a>
                    </div>
                    <a class="pxl-item--link" href="<?php echo esc_url($post_link); ?>"></a>
                </div>   
            </div>
        <?php endforeach;
    endif;
}

function gurus_get_service_grid_layout9($posts = [], $settings = []){ 
    extract($settings);
    $images_size = 'full';
    $button_text = empty($button_text) ? 'View More' : $button_text;
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            
            $item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xxl-{$col_xxl_m} col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            

            $post_link = !empty(get_post_meta($post->ID, 'service_external_link', true)) ? get_post_meta($post->ID, 'service_external_link', true) : get_permalink( $post->ID );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <!-- Info service -->
                    <div class="pxl-post--holder">
                        <!-- Title -->
                        <h3 class="pxl-post--title">
                            <span class="">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </span>    
                        </h3>
                        <?php if($show_category == true) : ?>
                            <div class="pxl-post--category">
                                <?php the_terms($post->ID, 'service-category', '', ''); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post--img"><?php echo wp_kses_post($thumbnail); ?></div>
                    <?php endif; ?>
                    <a  href="<?php echo esc_url($post_link); ?>" class="pxl-item--link"></a>
                </div>    
            </div>
        <?php endforeach;
    endif;
}
// End Service Grid
//-------------------------------------------------


add_action( 'wp_ajax_gurus_load_more_post_grid', 'gurus_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_gurus_load_more_post_grid', 'gurus_load_more_post_grid' );
function gurus_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'gurus'));
        }
    
        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;
       
        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', $settings['paged']);
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => $source,
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
                'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
            ],
            $settings['tax']
        ));

        ob_start();
            gurus_get_post_grid($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination' ){ 
            ob_start();
                gurus()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'gurus'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        var_dump($e->getMessage());
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}
 