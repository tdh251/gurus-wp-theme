<?php
/**
 * @package Bravis-Themes
 */
$archive_readmore_text = gurus()->get_theme_opt('archive_readmore_text', esc_html__('View more', 'gurus'));
$featured_img_size = gurus()->get_theme_opt('featured_img_size', '900x384');
$archive_category = gurus()->get_theme_opt( 'archive_category', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--standard pxl-blog-grid-layout1 style-2'); ?>>
<div class="pxl-post-item">
    <div class="pxl-post--inner">
        <?php if (has_post_thumbnail()) {
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $featured_img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            echo '<div class="pxl-post--featured hover-imge-effect2">'; ?>
                <a href="<?php echo esc_url( get_permalink()); ?>"><?php echo pxl_print_html($thumbnail); ?></a>
            <?php echo '</div>';
        } ?>
    
        <div class="pxl-post-holder">
            <div class="pxl-post-info">
                    <!-- Archive Meta: Date, Comment Count -->
                    <?php gurus()->blog->get_archive_meta(); ?>
                    
                    <!-- Title -->
                    <h4 class="pxl-post--title pxl-hover-line">
                        <a class="pxl-link" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>
                    </h4>

                    <!-- Excerpt -->
                    <div class="pxl-post--excerpt pxl-p2 pxl-two-line">
                        <?php
                            gurus()->blog->get_excerpt();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links">',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
                        ?>
                    </div>
                </div>
                <!-- Links post -->
                <a class="btn btn-round btn-readmore pxl-post--btn btn-hover-style-2" href="<?php echo esc_url(get_permalink()); ?>">
                    <span class='pxl-btn--text'><?php echo esc_html($archive_readmore_text); ?></span>
                <i class="flaticon flaticon-plus-normal pxl-btn--icon"></i>
                </a>
            </div>
        </div>
</div>
</article>