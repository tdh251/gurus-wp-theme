<?php 
get_header();

if(is_singular('product')){
    $gurus_sidebar = gurus()->get_sidebar_args(['type' => 'product', 'content_col'=> '12']);
}else{
    $gurus_sidebar = gurus()->get_sidebar_args(['type' => 'shop', 'content_col'=> '9']);
} ?>
<div class="pxl-woocommerce-page">
    <div class="container">
        <div class="row <?php echo esc_attr($gurus_sidebar['wrap_class']) ?>">
            <div id="pxl-content-area" class="<?php echo esc_attr($gurus_sidebar['content_class']) ?>">
                <main id="pxl-content-main">
                    <?php woocommerce_content(); ?>
                </main>
            </div>
    
            <?php if ($gurus_sidebar['sidebar_class'] && !is_singular('product')) : ?>
                <aside id="pxl-sidebar-area"class="<?php echo esc_attr($gurus_sidebar['sidebar_class']) ?>">
                    <div class="pxl-sidebar-sticky">
                        <?php get_sidebar(); ?>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer();