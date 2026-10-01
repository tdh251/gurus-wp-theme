    <?php
    /**
     * @package Bravis-Themes
     */
    get_header();
    $post_id = get_the_ID();
    $post_type = 'service';
    ?>
    <div class="container">
        <!-- <div class="row"> --> 

            <div id="pxl-content-area" class="">
                <main id="pxl-content-main">
                    <?php while ( have_posts() ) {
                        the_post(); ?>
                        <article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl--service'); ?>>
                            <?php 
                            the_content();

                            wp_link_pages( array(
                                'before'      => '<div class="page-links">',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) ); ?>
                        </article><!-- #post -->
                        <?php if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    } ?>
                </main>
            </div>

        <!-- </div> -->
    </div> 
<?php get_footer(); ?>

