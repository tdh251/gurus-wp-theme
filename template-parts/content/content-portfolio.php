<?php
/**
 * @package Bravis-Themes
 */
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl--portfolio'); ?>>
    <div class="pxl-entry-content clearfix">
        
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="pxl-page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>
</article>