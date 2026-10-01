
<?php 
    $html_id = pxl_get_element_id($settings);
    $arrows = $widget->get_setting('opt_arrows', false); 
    $arrow_style = $widget->get_setting('arrow_style', false);
    $pagination = $widget->get_setting('opt_pagination', false); 
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $pagination_style = $widget->get_setting('pagination_style', false);
    $opt_loop = $widget->get_setting('opt_loop', false);

    $opt_auto_play = $widget->get_setting('opt_auto_play', false);
    $delay = $widget->get_setting('delay', false);
    $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);

    $opt_effect = $widget->get_setting('opt_effect');

    $opt_speed = $widget->get_setting('opt_speed', 2000);

    $opt_allow_touch_move = $widget->get_setting('opt_allow_touch_move', false);

    $opts = [
        'opt_arrows'                    => (bool)$arrows,
        'opt_pagination'                => (bool)$pagination,
        'pagination_type'               => $pagination_type,
        'opt_loop'                      => (bool)$opt_loop,
        'opt_auto_play'                 => (bool)$opt_auto_play,
        'delay'                         => (int)$delay,
        'disable_on_interaction'        => (bool)$disable_on_interaction,
        'opt_effect'                    => $opt_effect,
        'opt_speed'                     => (int)$opt_speed,
        'opt_allow_touch_move'          => (bool)$opt_allow_touch_move
    ];
    $widget->add_render_attribute( 'slider', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]);

    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    $bg_content_url = null;
    if(!empty($settings['bg_content']['id'])) {
        $image  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['bg_content']['id'],
            'thumb_size' => 'full',
        ));
        $bg_content_url = $image['url'];
    } 
    $box_title = !empty($settings['box_title']) ? $widget->get_setting('box_title') : null;
    $box_tel = !empty($settings['box_tel']) ? $widget->get_setting('box_tel') : null;
    $is_box_icon = !empty($settings['pxl_icon']) || false;
    $is_box_link = false;
    if (!empty($settings['box_link']['url'])) {
        $widget->add_render_attribute( 'button', 'href', $settings['box_link']['url'] );
        if ( $settings['box_link']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }
        if ( $settings['box_link']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
        $is_box_link = true;
    }

?>

<?php if($is_items): ?>
    <div class="pxl-swiper-slider pxl-slider pxl-slider3 pxl-swiper-nogap">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'slider' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach($settings['items'] as $key => $item) : ?>
                    <?php
                        $bg_slide_url = null;
                        if(!empty($item['bg_slide'])) {
                            $image  = pxl_get_image_by_size( array(
                                'attach_id'  => $item['bg_slide']['id'],
                                'thumb_size' => 'full',
                            ));
                            $bg_slide_url = $image['url'];
                        } 
                        $button_text = !empty($item['button_text']) ? $item['button_text'] : 'View More';
                        $is_btn_link = false;
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $item['button_link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $item['button_link']['url'] );
                            if ( $item['button_link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }
                            if ( $item['button_link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                            $is_btn_link = true;
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );

                        $title = !empty($item['title']) ? $item['title'] : null;
                        $subtitle = !empty($item['subtitle']) ? $item['subtitle'] : null;
                        $desc = !empty($item['desc']) ? $item['desc'] : null;
                    ?>
                    <div class="swiper-slide pxl-swiper-slide">
                        <div class="pxl-slide-inner">
                            <div class="pxl-content--left">
                                <div class="pxl-bg--img" style="background-image: url('<?php if(!is_null($bg_content_url)) echo esc_attr($bg_content_url); ?>')"></div>
                                <div class="pxl-content--container" >
                                    <div class="pxl-content--main">
                                        <?php if(!is_null($subtitle)): ?>
                                            <div class="pxl-item--subtitle h4"><?php pxl_print_html($subtitle); ?></div>
                                        <?php endif; ?>
                                        <!-- Title -->
                                        <?php if(!is_null($title)): ?>
                                            <div class="pxl-item--title"><?php pxl_print_html($title); ?></div>
                                        <?php endif; ?>
                                        <?php if(!is_null($desc)): ?>
                                            <div class="pxl-item--desc pxl-dark-slate"><?php pxl_print_html($desc); ?></div>
                                        <?php endif; ?>
                                        <!-- Content -->
                                        <div class="pxl-content--action">
                                            <a class="pxl-item--btn btn btn-hover-style1" <?php echo implode( ' ', [ $link_attributes ] ); ?> >
                                                <span class="pxl-btn--text"><?php echo esc_html($button_text); ?></span>
                                                <i class="flaticon flaticon-up-right-arrow"></i>
                                            </a>
                                            <div class="pxl-item--box">
                                                <?php if($is_box_icon) : ?>
                                                    <div class="pxl-box--icon pxl-flex-center">
                                                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="pxl-box--content">
                                                    <div class="pxl-box--subtitle pxl-dark-slate"><?php echo esc_html($box_title); ?></div>
                                                    <a class="pxl-box--title" <?php pxl_print_html($widget->get_render_attribute_string('button')); ?>  >
                                                        <span class="pxl-box--tel">
                                                            <?php echo esc_attr($box_tel); ?>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pxl-content--right">
                                <?php if(!is_null($bg_slide_url)) : ?>
                                    <div class="pxl-bg--img" style="background-image: url('<?php echo esc_attr($bg_slide_url); ?>')"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if($pagination == true): ?>
                    <div class="pxl-swiper-dots-wrap <?php echo esc_attr($pagination_style); ?>">
                        <div class="pxl-swiper-dots-container">
                            <div class="pxl-swiper-dots"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($arrows == true): ?>
                <div class="pxl-swiper-arrow-wrap <?php echo esc_attr($arrow_style); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev  pxl-arrow--prev"><i class="far fa-chevron-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next pxl-arrow--next"><i class="far fa-chevron-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<!-- end of hero slider -->


