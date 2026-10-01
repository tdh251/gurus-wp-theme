
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
    $is_boxs =  isset($settings['boxs']) && !empty($settings['boxs']) && count($settings['boxs']) || false;
?>

<?php if($is_items): ?>
    <section class="pxl-swiper-slider pxl-slider pxl-slider2 pxl-swiper-nogap">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'slider' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach($settings['items'] as $key => $item) : ?>
                    <?php 
                        $background_url = null;
                        if(!empty($item['bg_slide']['id'])) {
                            $background_image  = pxl_get_image_by_size( array(
                                'attach_id'  => $item['bg_slide']['id'],
                                'thumb_size' => 'full',
                            ));
                            $background_url = $background_image['url'];
                        } 
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $item['icon_link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $item['icon_link']['url'] );

                            if ( $item['icon_link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $item['icon_link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );

                        $current_slide = $key + 1;
                        $title = !empty($item['title']) ? $widget->parse_text_editor($item['title']) : null;
                        $is_icon = !empty($item['pxl_icon']['value']) || false;
                    ?>
                    <div class="swiper-slide pxl-swiper-slide">
                        <div class="pxl-slide-bg">
                            <div class="pxl-bg--img"  style="background-image: url('<?php if(!is_null($background_url)) echo esc_attr($background_url); ?>'); "></div>
                            <div class="pxl-bg--overlay"></div>
                        </div>
                        <div class="pxl-slide-container">  
                            <div class="pxl-slide-inner" >                   
                                <div class="pxl-item--heading">
                                    <?php if(!is_null($title)) : ?>
                                        <div class="pxl-item--title"><?php echo pxl_print_html($title); ?></div>
                                    <?php endif; ?>
                                    <?php if (!is_null($is_icon)) : ?>
                                        <a class="pxl-item--link pxl-flex-center" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                            <span class="pxl-item--icon pxl-flex-center">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if($is_boxs) : ?>
                                    <div class="pxl-item--boxs">
                                        <?php foreach ($settings['boxs'] as $key=>$box) : ?>
                                            <?php 
                                                $box_title = !empty($box['box_title']) ? $widget->parse_text_editor($box['box_title']) : null;  
                                                $box_desc = !empty($box['box_desc']) ? $widget->parse_text_editor($box['box_desc']) : null;
                                                $is_box_icon = !empty($box['box_icon']['value']) || false;
                                            ?>
                                            <?php if($box['show_in'] === $current_slide || $box['show_in'] === 0): ?>
                                                <div class="pxl-item--box">
                                                    <h1 class="pxl-box--title pxl-white">
                                                        <?php if ($is_box_icon) : ?>
                                                            <span class="pxl-box--icon pxl-flex-center">
                                                                <?php \Elementor\Icons_Manager::render_icon( $box['box_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if (!is_null($box_title)) : ?>
                                                            <span class="pxl-box-title--text"><?php echo pxl_print_html($box_title); ?></span>
                                                        <?php endif; ?>
                                                    </h1>
                                                    <?php if(!is_null($box_desc)) : ?>
                                                        <div class="pxl-box--desc h5 pxl-white">
                                                            <?php echo pxl_print_html($box_desc); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if($pagination == true): ?>
                <div class="pxl-swiper-dots-wrap <?php echo esc_attr($pagination_style); ?>">
                    <div class="pxl-swiper-dots"></div>
                </div>
            <?php endif; ?>
            <?php if($arrows == true): ?>
                <div class="pxl-swiper-arrow-wrap <?php echo esc_attr($arrow_style); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev  pxl-arrow--prev"><i class="far fa-chevron-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next pxl-arrow--next"><i class="far fa-chevron-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- end of hero slider -->


