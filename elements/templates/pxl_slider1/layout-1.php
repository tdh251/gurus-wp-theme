
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
?>

<?php if($is_items): ?>
    <div class="pxl-swiper-slider pxl-slider pxl-slider1 pxl-swiper-nogap">
        <!-- <div class="pxl-carousel-inner"> -->
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'slider' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach($settings['items'] as $key => $item) : ?>
                        <?php 
                            $background_url = null;
                            if(!empty($item['background']['id'])) {
                                $background_image  = pxl_get_image_by_size( array(
                                    'attach_id'  => $item['background']['id'],
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
                            $title = !empty($item['title']) ? $widget->parse_text_editor($item['title']) : null;
                            $subtitle = !empty($item['subtitle']) ? $widget->parse_text_editor($item['subtitle']) : null;
                            $quote = !empty($item['quote']) ? $item['quote'] : null; 
                            $is_icon = !empty($item['pxl_icon']['value']) || false;
                        ?>
                        <div class="swiper-slide pxl-swiper-slide">
                            <div class="pxl-slide-inner">
                                <div class="pxl-slide--bg">
                                    <?php if(!is_null($background_url)) : ?>
                                        <div class="pxl-bg--image" data-background="<?php echo esc_attr($background_url); ?>" style="background-image: url('<?php echo esc_attr($background_url); ?>')"></div> 
                                    <?php endif; ?>
                                    <div class="pxl-bg--overlay"></div>
                                </div>
                                <div class="pxl-slide-container">
                                    <div class="pxl-slide-content">
                                        <div class="pxl-content--top">
                                            <?php if(!is_null($title)) : ?>
                                                <h2 class="pxl-item--title"><?php pxl_print_html($title); ?></h2>
                                            <?php endif; ?>
                                            <?php if(!is_null($subtitle)) : ?>
                                                <p class="pxl-item--subtitle pxl-p1 pxl-white" data-wow-delay="1000ms"><?php pxl_print_html($subtitle); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pxl-content--bottom">
                                            <?php if ($is_icon) : ?>
                                                <a class="pxl-item--link pxl-flex-center" data-wow-delay="1000ms" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                    <?php \Elementor\Icons_Manager::render_icon( $item['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if(!is_null($quote)) : ?>
                                                <p class="pxl-item--quote h3 pxl-white"><?php pxl_print_html($quote); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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
        <!-- </div> -->
    </div>
<?php endif; ?>
<!-- end of hero slider -->


