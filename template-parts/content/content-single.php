<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravis-Themes
 */
$post_tag = gurus()->get_theme_opt( 'post_tag', true );
$post_navigation = gurus()->get_theme_opt( 'post_navigation', false );
$post_social_share = gurus()->get_theme_opt( 'post_social_share', false );
$tags_list = get_the_tag_list();
$sg_post_title = gurus()->get_theme_opt('sg_post_title', 'default');
$post_author_info = gurus()->get_theme_opt( 'post_author_info', false );
$post_date = gurus()->get_theme_opt( 'post_date', true );
$post_category = gurus()->get_theme_opt( 'post_category', true );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <div class="pxl-item--holder h5">
        <div class="pxl-item--group">
            <?php if($post_date) : ?>
                <div class="pxl-item--date">
                    <?php echo get_the_date('M d, Y . '); ?>
                </div>
            <?php endif; ?>
            <?php gurus()->blog->get_post_metas(); ?>
        </div>
        <h1 class="pxl-item--title pxl-dark-300">
            <?php echo get_the_title(); ?> 
        </h1>
    </div>
    <div class="pxl-item--content clearfix">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>

    <?php if($post_tag && $tags_list || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { gurus()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { gurus()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_author_info) { gurus()->blog->get_post_author_info(); } ?>
    <?php if($post_navigation) { gurus()->blog->get_post_nav(); } ?>
</article>