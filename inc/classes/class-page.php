<?php

if (!class_exists('Gurus_Page')) {

    class Gurus_Page
    {
        public function get_site_loader(){

            $site_loader = gurus()->get_theme_opt( 'site_loader', false );
           if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader">
                    <div class="pxl-loader-inner">
                        <div class="loading-wave">
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                            <div class="loading-bar"></div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        public function get_page_title(){
            $titles = $this->get_title();
            $pt_mode = gurus()->get_opt('pt_mode');
            $pt_mode_product = gurus()->get_opt('pt_mode_product');
            $ptitle_scroll_opacity = gurus()->get_opt('ptitle_scroll_opacity');
            $ptitle_layout = (int)gurus()->get_opt('ptitle_layout');
            $ptitle_layout_product = (int)gurus()->get_opt('ptitle_layout_product');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) { ?>
                <div id="pxl-page-title-elementor" class="<?php if($ptitle_scroll_opacity == true) { echo 'pxl-scroll-opacity'; } ?>">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php 
            } elseif ($pt_mode_product == 'bd' && $ptitle_layout_product > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' ) ) { ?>
                <?php if(class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_singular('product')) : ?>
                    <div id="pxl-page-title-elementor" class="pxl-page-title-shop <?php if($ptitle_scroll_opacity == true) { echo 'pxl-scroll-opacity'; } ?>">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout_product);?>
                    </div>
                <?php endif; ?>
            <?php } elseif($pt_mode == 'df') {
                $ptitle_breadcrumb_on = gurus()->get_opt( 'ptitle_breadcrumb_on', '1' ); ?>
                <div id="pxl-page-title-default" >
                    <div class="pxl-bg--img pxl--parallax"></div>
                    <h1 class="pxl-page-title"><?php echo gurus_html($titles['title']) ?></h1>
                </div>
            <?php } 
        } 

        public function get_title() {
            $title = '';
            $page_title = gurus()->get_theme_opt('page_title_search_result', 'Search Results');
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'gurus' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404 Error', 'gurus' );
                } elseif ( is_search() ) {
                    $title = $page_title;
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'gurus' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'CASE_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                $entry_label = $entry['label'];

                if(!empty($_GET['blog_title'])) {
                    $blog_title = $_GET['blog_title'];
                    $custom_title = explode('_', $blog_title);
                    foreach ($custom_title as $index => $value) {
                        $arr_str_b[$index] = $value;
                    }
                    $str = implode(' ', $arr_str_b);
                    $entry_label = $str;
                }

                if ( empty( $entry_label ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-hidden" href="%1$s">%2$s<i class="flaticon-arrow-multi"></i></a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry_label )
                    );
                }
                else
                {
                    $sg_post_title = gurus()->get_theme_opt('sg_post_title', 'default');
                    $sg_post_title_text = gurus()->get_theme_opt('sg_post_title_text');
                    if(is_singular('post') && $sg_post_title == 'custom_text' && !empty($sg_post_title_text)) {
                        $entry_label = $sg_post_title_text;
                    }
                    $sg_product_ptitle = gurus()->get_theme_opt('sg_product_ptitle', 'default');
                    $sg_product_ptitle_text = gurus()->get_theme_opt('sg_product_ptitle_text');
                    if(is_singular('product') && $sg_product_ptitle == 'custom_text' && !empty($sg_product_ptitle_text)) {
                        $entry_label = $sg_product_ptitle_text;
                    }
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry_label ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'gurus_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<i class="flaticon flaticon-angles-left"> </i>',
                'next_text' => '<i class="flaticon flaticon-angles-right"> </i>',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
                ?>
                    <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                        <div class="pxl-pagination-links">
                            <?php
                                printf($links);
                            ?>
                        </div>
                    </nav>
                <?php
            endif;
        }
    }
}
