<?php
    $button_text = (!empty($settings['button_text'])) ? $settings['button_text'] : 'Search';
    $placeholder = (!empty($settings['placefolder'])) ? $settings['placefolder'] : 'Search Here';
?>
<form role="search" method="get" class="pxl-search-form pxl-search-form2 <?php echo esc_attr($settings['pxl_animate']); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-search-form--inner">
        <div class="pxl-searchform-wrap">
            <input type="text" class="pxl-search-field pxl-p3 pxl-white" placeholder="<?php echo esc_attr($placeholder); ?>" name="s" />
            <button type="submit" class="pxl-search-submit btn pxl-white h6 pxl-btn-default pxl-hover-default">
                <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                <?php if($settings['pxl_icon']['value']) : ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                <?php else: ?>
                    <i class="pxl-icon--default flaticon flaticon-up-right-arrow"></i>
                <?php endif; ?>
            </button>
        </div>
    </div>
</form>