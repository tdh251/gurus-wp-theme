<?php
/**
 * @package Bravis-Themes
 */
get_header();
$gurus_sidebar = gurus()->get_sidebar_args(['type' => 'page', 'content_col'=> '8']);
if(class_exists('\Elementor\Plugin') && !$gurus_sidebar['sidebar_class']){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor() ) {
        $classes = 'elementor-container';
    } else {
        $classes = 'container';
    }
} else {
    $classes = 'container';
}
?>
<div class="<?php echo esc_attr($classes); ?>">
    <div class="row <?php echo esc_attr($gurus_sidebar['wrap_class']) ?>">
        <div id="pxl-content-area" class="<?php echo esc_attr($gurus_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content', 'page' );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
        <?php if ($gurus_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($gurus_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php dynamic_sidebar( 'sidebar-page' ); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php get_footer();