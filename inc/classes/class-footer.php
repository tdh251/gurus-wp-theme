<?php

if (!class_exists('Gurus_Footer')) {

    class Gurus_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            
            $footer_layout = (int)gurus()->get_opt('footer_layout');
            
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

            // Back To Top
            $back_totop_on = gurus()->get_theme_opt('back_totop_on', true);
            $back_top_top_style = gurus()->get_opt('back_top_top_style', 'style-default');
            if (isset($back_totop_on) && $back_totop_on) : ?>
                <a class="pxl-scroll-top <?php echo esc_attr($back_top_top_style); ?>" href="#">
                    <i class="caseicon-long-arrow-right-three"></i>
                    <svg class="pxl-scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
                        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
                    </svg>
                </a>
            <?php endif;

            // Mouse Move Animation
            gurus_mouse_move_animation();

            // Cookie Policy
            gurus_cookie_policy();

            // Subscribe Popup
            gurus_subscribe_popup();

            // Cart Sidebar
            gurus_hook_anchor_cart();
            
        }
 
    }
}
 