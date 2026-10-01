<?php
/**
 * @package Bravis-Themes
 */

    // $message = '';
    $bg_img_url = gurus()->get_theme_opt( 'bg_img_404_page', ['url' => get_template_directory_uri().'/assets/img/bg-404-error-page.jpg', 'id' => '' ] );
    $subtitle= gurus()->get_theme_opt('404_subtitle', 'Page Not Found');
    $message = gurus()->get_theme_opt('404_message', 'Oops! The page you are looking for does not exist. It might have been moved or deleted.');
    $show_search_form = gurus()->get_theme_opt('404_show_search_form', true);
    $button_text = gurus()->get_theme_opt('404_button_text', 'Go to home');
get_header(); 
?>
    <div id="pxl-content-area" class="pxl-content-area ">
        <main id="pxl-content-main">
            <div class="pxl-bg--img" style="background-image: url('<?php if(!empty($bg_img_url['url'])) echo esc_url($bg_img_url['url']); ?>')"></div>
            <div class="pxl-container">
                <div class="pxl-error-inner">
                    <div class="pxl-error--404 pxl-white"><?php echo esc_html('404', 'gurus'); ?></div>
                    <div class="pxl-error--subtitle pxl-white"><?php echo esc_html($subtitle); ?></div>
                    <div class="pxl-error--message pxl-white pxl-p2"><?php echo esc_html($message); ?></div>
                    <?php if($show_search_form) : ?>
                        <div class="pxl-form-group">
                            <form role="search" method="get" class="pxl-search-form pxl-search-form2" action="<?php echo esc_url(home_url( '/' )); ?>" >
                                <div class="pxl-search-form--inner">
                                    <div class="pxl-searchform-wrap">
                                    <input type='text' class='pxl-search-field pxl-p3 pxl-white' placeholder='<?php echo esc_attr__('Search Here', 'gurus'); ?>' name='s' />
                                    <button type="submit" class="pxl-search-submit btn pxl-white h6 pxl-btn-default pxl-hover-default">
                                            <span class="pxl-btn--text"><?php echo esc_html__('Search', 'gurus'); ?></span>
                                            <i class="pxl-icon--default flaticon flaticon-up-right-arrow" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn pxl-item--btn pxl-btn-default pxl-btn-xl pxl-btn-border pxl-btn-light pxl-hover-default">
                        <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                        <i class="pxl-icon--default flaticon flaticon-up-right-arrow" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </main>
    </div>
<?php get_footer();
