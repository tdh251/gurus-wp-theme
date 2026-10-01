<?php
/**
 * @package Bravis-Themes
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-6 col-sm-12'); ?>>
    <div class="pxl-post--inner">
        <?php if (has_post_thumbnail()) {
            echo '<div class="pxl-post--featured hover-imge-effect3">'; ?>
                <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('gurus-portfolio'); ?></a>
            <?php echo '</div>';
        } ?>
        <div class="pxl-post--overlay"></div>
        <div class="pxl-post--holder">
            <div class="pxl-holder--inner">
                <div class="pxl-post--icon">
                    <i class="flaticon-right-up"></i>
                </div>
                <h5 class="pxl-post--title"><?php echo esc_html(get_the_title($post->ID)); ?></h5>
            </div>
        </div>
        <a class="pxl-post--link" href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title(); ?>"></a>
    </div>
</article>