<?php
/**
 * @package Bravis-Themes
 */
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="pxl-entry-content clearfix">
        <?php
            the_content();
            gurus()->page->get_link_pages();
        ?>
    </div> 
</article> 
