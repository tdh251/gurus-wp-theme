<?php
/**
 * @package Bravis-Themes
 */
get_header();
?>
    <div id="pxl-content-area" class="pxl-content-area">
        <main id="pxl-content-main">
            <?php while ( have_posts() ) {
                the_post(); ?>
                <article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                        the_content();

                        wp_link_pages( array(
                            'before'      => '<div class="page-links">',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ));
                    ?>
                </article>

                <?php
                // Hiển thị phần bình luận nếu cần
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            } ?>
        </main>
    </div>
<?php get_footer() ?>


