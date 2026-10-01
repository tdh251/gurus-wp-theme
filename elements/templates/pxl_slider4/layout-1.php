<?php 
    $html_id = pxl_get_element_id($settings);
    $arrows = $widget->get_setting('opt_arrows', false); 
    $pagination = $widget->get_setting('opt_pagination', false); 
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $opt_loop = $widget->get_setting('opt_loop', false);
    $opt_auto_play = $widget->get_setting('opt_auto_play', false);
    $delay = $widget->get_setting('delay', 1500);
    $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
    $opt_effect = $widget->get_setting('opt_effect', 'fade');
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

    $logo_thumbnail = null;
    if(!empty($settings['logo']['id'])) {
        $image = pxl_get_image_by_size( array(
            'attach_id'  => $settings['logo']['id'],
            'thumb_size' => 'full',
        ));
        $logo_thumbnail = $image['thumbnail'];
    } 
    $show_pagination_index = !empty($settings['show_pagination_index']) ? '' : 'pxl-hide-pagination-index';
    $count_slides = count($settings['items']) ?? 0;
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;
    $is_socials = isset($settings['socials']) && !empty($settings['socials']) && count($settings['socials']) || false;
    $is_layers = isset($settings['layers']) && !empty($settings['layers']) && count($settings['layers']) || false;
?>


<?php if($is_items): ?>
    <div class="pxl-swiper-slider pxl-slider pxl-slider4 pxl-swiper-nogap">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'slider' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach($settings['items'] as $key => $item) : ?>
                    <?php 
                        $link_attributes = gurus_render_link_attributes($item['btn_link']);
                        $background_url = null;
                        if(!empty($item['background']['id'])) {
                            $image  = pxl_get_image_by_size( array(
                                'attach_id'  => $item['background']['id'],
                                'thumb_size' => 'full',
                            ));
                            $background_url = $image['url'];
                        } 
                        $title = !empty($item['title']) ? $widget->parse_text_editor($item['title']) : 'Add title here.';
                        $subtitle = !empty($item['subtitle']) ? $widget->parse_text_editor($item['subtitle']) : 'Add subtitle here.';
                        $btn_text = !empty($item['btn_text']) ? $item['btn_text'] : 'Contact Us'; 
                        $btn_icon = !empty($item['btn_icon']['value']) || false;
                    ?>
                    <div class="swiper-slide pxl-swiper-slide">
                        <div class="pxl-slide-container">
                            <div class="pxl-item--content">
                                <div class="pxl-content--left">
                                    <div class="pxl-content--inner">
                                        <div class="pxl-item--subtitle">
                                            <span class="pxl-subtitle--text"><?php pxl_print_html($subtitle); ?></span>
                                        </div>
                                        <h1 class="pxl-item--title">
                                            <span class="pxl-title--text"><?php pxl_print_html($title); ?></span>
                                        </h1>
                                        <a class="btn pxl-item--btn pxl-btn-default pxl-btn-normal pxl-btn-border pxl-btn-light pxl-hover-default" <?php pxl_print_html($link_attributes); ?>>
                                            <span class="pxl-btn--text"><?php echo esc_html($btn_text); ?></span>
                                            <?php if(!empty($item['btn_icon']['value'])) : ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $item['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                            <?php else: ?>
                                                <i class="pxl-icon--default flaticon flaticon-up-right-arrow"></i>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="pxl-content--right">
                                    <div class="pxl-item--bg" style="background-image: url('<?php echo esc_attr($background_url); ?>')"></div>
                                    <div class="pxl-item--overlay"></div>
                                    <a class="btn pxl-item--btn" <?php pxl_print_html($link_attributes); ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none">
                                            <path d="M41.5176 41.5V1.5" stroke="white" stroke-width="1.77778"/>
                                            <path d="M41.8037 1.5L1.80371 1.5" stroke="white" stroke-width="1.77778"/>
                                            <path d="M41.5176 1.5L1.51758 41.5" stroke="white" stroke-width="1.77778"/>                          
                                        </svg> 
                                    </a>
                                </div>
                                <?php if($is_layers) : ?>
                                    <?php foreach($settings['layers'] as $key => $layer) : ?>
                                        <?php 
                                            $thumbnail_icon = null;
                                            if(!empty($layer['icon_image']))
                                            $img_icon  = pxl_get_image_by_size( 
                                                array(
                                                    'attach_id'  => $layer['icon_image']['id'],
                                                    'thumb_size' => 'full',
                                                ));
                                            $thumbnail_icon = $img_icon['thumbnail'];
                                        ?>
                                        <?php if(!empty($layer['pxl_icon']['value'])) : ?>
                                            <div class="pxl-item--layer <?php echo 'elementor-repeater-item-'.esc_attr($layer['_id']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $layer['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ) ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!is_null($thumbnail_icon)) : ?>
                                            <div class="pxl-item--layer <?php echo esc_attr('pxl-layer-'.$key) ?> <?php echo 'elementor-repeater-item-'.esc_attr($layer['_id'].' '.$layer['layer_animate']); ?>" data-wow-delay="<?php echo esc_attr($layer['layer_animate_delay']); ?>">
                                                <?php pxl_print_html($thumbnail_icon); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-item--sidebar">
            <div class="pxl-item--logo">
                <a class="pxl-logo--link" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo wp_kses_post($logo_thumbnail); ?>
                </a>
            </div>
            <div class="pxl-item--pagination pxl-section-active" >
                <?php if($count_slides !== 0) : ?>
                    <?php for($i=1;$i<=$count_slides;$i++) : ?>
                        <?php $active = $i===1 ? 'active' : ''; ?>
                        <span class="pxl-item--index pxl-toggle-active <?php echo esc_attr($active); ?>" data-index="<?php echo esc_attr($i); ?>">
                            <?php echo esc_attr('0'.(string)$i); ?>
                        </span>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <?php if($is_socials): ?>
                <div class="pxl-social--list ">
                    <?php foreach($settings['socials'] as $key => $social) : ?>
                        <?php 
                            $link_social = $widget->get_repeater_setting_key( 'social_link', 'value', $key );
                            if ( ! empty( $social['social_link']['url'] ) ) {
                                $widget->add_render_attribute( $link_social, 'href', $social['social_link']['url'] );
                                if ( $social['social_link']['is_external'] ) {
                                    $widget->add_render_attribute( $link_social, 'target', '_blank' );
                                }
                                if ( $social['social_link']['nofollow'] ) {
                                    $widget->add_render_attribute( $link_social, 'rel', 'nofollow' );
                                }
                            }
                            $link_attributes = $widget->get_render_attribute_string( $link_social );
                        ?>
                        <a class="btn pxl-item--social pxl-hover-scale" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php if(!empty($social['social_icon']['value'])) : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $social['social_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if((bool)$pagination): ?>
                <div class="pxl-swiper-dots-wrap pxl-swiper-dots-default <?php echo esc_attr($show_pagination_index); ?>">
                    <div class="pxl-swiper-dots"></div>
                </div>
            <?php endif; ?>

            <?php if((bool)$arrows): ?>
                <div class="pxl-swiper-arrow-wrap ">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>
    </div>
<?php endif; ?>