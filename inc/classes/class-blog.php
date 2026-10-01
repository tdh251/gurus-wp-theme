<?php

if (!class_exists('Gurus_Blog')) {

    class Gurus_Blog
    {
        public function get_archive_meta() {
            $archive_date = gurus()->get_theme_opt( 'archive_date', true );
            $post_comment = gurus()->get_theme_opt( 'post_comment', true );
            if($archive_date) : ?>
                <div class="pxl-post--meta">
                    <?php if($archive_date) : ?>
                        <span class="pxl-post--date pxl-p3">
                            <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart); ?>
                        </span>
                    <?php endif; ?>
                    <?php if($post_comment) : ?>
                        <div class="pxl-post--comment">
                            <i class="flaticon flaticon-comment pxl-green-1"></i>
                            <span class="comments-count pxl-p4">
                                <?php echo comments_number(esc_html__('0', 'gurus'),esc_html__('1', 'gurus'),esc_html__('%', 'gurus')); ?>
                            </span>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function get_post_metas(){
            $post_author = gurus()->get_theme_opt( 'post_author', true );
            if($post_author || $post_date) : ?>
                <div class="pxl-item--meta pxl-flex">
                    <?php if($post_author) : ?>
                        <p class="pxl-item--author pxl-dark-slate">
                        &nbsp;
                            <span>
                                <?php echo esc_html__('By', 'gurus'); ?> 
                            </span>
                            <?php the_author_posts_link(); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = gurus()->get_theme_opt('archive_excerpt_length', '16');
            $gurus_the_excerpt = get_the_excerpt();
            if(!empty($gurus_the_excerpt)) {
                echo wp_trim_words( $gurus_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = gurus()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'gurus' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'gurus_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        public function gurus_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }
        public function get_tagged_in(){
            $tags_list = get_the_tag_list();
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                    printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = gurus()->get_theme_opt( 'social_facebook', true );
            $social_twitter = gurus()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = gurus()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = gurus()->get_theme_opt( 'social_linkedin', true );
            ?>
                <div class="pxl-social-wrap" >
                    <p class="btn btn-social-share ">
                        <?php echo esc_html__('Share', 'gurus'); ?>
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.502 15.0624C16.0643 15.0623 15.6311 15.1508 15.2286 15.3228C14.826 15.4947 14.4625 15.7465 14.16 16.0628L6.64437 11.8343C6.78995 11.2876 6.78995 10.7123 6.64437 10.1656L14.16 5.93703C14.7073 6.50443 15.4427 6.85283 16.2284 6.91695C17.0141 6.98107 17.7962 6.75652 18.4282 6.28536C19.0603 5.8142 19.4988 5.12877 19.6618 4.35746C19.8247 3.58616 19.7008 2.78191 19.3134 2.09539C18.9259 1.40886 18.3014 0.887168 17.5569 0.628036C16.8123 0.368904 15.9989 0.390116 15.2689 0.687698C14.5389 0.98528 13.9424 1.53881 13.5913 2.2446C13.2401 2.95039 13.1583 3.76 13.3612 4.52176L5.84558 8.75032C5.39665 8.28223 4.81794 7.95917 4.18389 7.82269C3.54984 7.68622 2.88946 7.74257 2.2877 7.98449C1.68594 8.22642 1.17032 8.64286 0.807187 9.18024C0.44405 9.71762 0.25 10.3514 0.25 10.9999C0.25 11.6485 0.44405 12.2822 0.807187 12.8196C1.17032 13.357 1.68594 13.7734 2.2877 14.0154C2.88946 14.2573 3.54984 14.3136 4.18389 14.1772C4.81794 14.0407 5.39665 13.7176 5.84558 13.2495L13.3612 17.4781C13.187 18.1341 13.2225 18.8282 13.4628 19.4631C13.7031 20.0979 14.1361 20.6415 14.7011 21.0177C15.2661 21.3939 15.9348 21.5837 16.6131 21.5605C17.2915 21.5374 17.9456 21.3024 18.4837 20.8886C19.0217 20.4748 19.4167 19.9029 19.6132 19.2532C19.8096 18.6034 19.7978 17.9085 19.5792 17.2659C19.3606 16.6233 18.9463 16.0652 18.3944 15.67C17.8426 15.2748 17.1808 15.0624 16.502 15.0624Z" fill="#20282D"/>
                        </svg>
                    </p>
                    <div class="pxl-social-list">
                        <?php if($social_facebook) : ?>
                            <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'gurus'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                        <?php endif; ?>
                        <?php if($social_twitter) : ?>
                            <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'gurus'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                        <?php endif; ?>
                        <?php if($social_pinterest) : ?>
                            <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'gurus'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                        <?php endif; ?>
                        <?php if($social_linkedin) : ?>
                            <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'gurus'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
        }

        public function get_metas_portfolio() {
            ?>
            <div class="pxl-portfolio--metas">
            <?php
                $image_size = 'full';
                if (has_post_thumbnail()) {
                    $image_id = get_post_thumbnail_id(get_the_ID());
                    $image  = pxl_get_image_by_size( array(
                        'attach_id'  => $image_id,
                        'thumb_size' => $image_size,
                        'class' => 'no-lazyload'
                    ) );
                    $thumbnail    = $image['thumbnail'];
                    ?>
                    <div class="pxl-image--feature">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php } ?>
                <div class="pxl-item--date h5 pxl-dark-slate">
                    <?php echo get_the_date('M d, Y . '); ?>
                </div>
                <h1 class="pxl-item--title pxl-dark-300">
                    <?php echo esc_html(get_the_title()); ?> 
                </h1>
            </div>
            <?php
        }

        public function get_info_portfolio() {
            $post_id = get_the_ID();
            $time_start = get_post_meta($post_id, 'timeline_start', true);
        }
        

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
                <div class="pxl--social">
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'gurus'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'gurus'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'gurus'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'gurus'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
                </div>
            <?php
        }
        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                $page_for_posts = get_option( 'page_for_posts' ); ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items pxl-flex-middle">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'gurus-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="caseicon-double-chevron-left"></i><span><?php echo esc_html__('Previous Post', 'gurus'); ?></span></a>
                                <div class="pxl--holder">
                                    <?php if(!empty($prev_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl--meta">
                                        <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ( get_option( 'page_for_posts' ) ) {
                            $post_id = get_option( 'page_for_posts' ); ?>
                            <div class="pxl-item-button">
                                <a href="<?php echo esc_url(get_permalink( $post_id )); ?>"><i class="flaticon-menu-2"></i></a>
                            </div>
                        <?php } ?>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                $next_img_url = wp_get_attachment_image_src($next_img_id, 'gurus-thumb-xs'); ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Post', 'gurus'); ?></span><i class="caseicon-double-chevron-right"></i></a>
                                <div class="pxl--holder">
                                    <div class="pxl--meta">
                                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                    </div>
                                    <?php if(!empty($next_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_post_author_info() { ?>
            <div class="pxl-post--author-info pxl-dflex-nw">
                <div class="pxl-post--author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 280 ); ?></div>
                <div class="pxl-post--author-meta">
                    <?php gurus_get_user_name(); ?>
                    <div class="pxl-post--author-description p2"><?php the_author_meta( 'description' ); ?></div>
                    <?php gurus_get_user_social(); ?>
                </div>
            </div>
        <?php }



        public function get_related_post($post_type, $current_id){
            // $post_related_on = gurus()->get_theme_opt( 'post_related_on', true );

            // if($post_related_on) {
                // global $post;
                // $current_id = $post->ID;
                $posttags = get_the_category($current_id);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => $post_type, 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) { ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'gurus'); ?></h4>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            // }
            wp_reset_postdata();
        }
    }
}
