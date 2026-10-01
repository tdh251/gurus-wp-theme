<?php
    $html_id = pxl_get_element_id($settings);
    $col_xs = $widget->get_setting('col_xs', '');
    $col_sm = $widget->get_setting('col_sm', '');
    $col_md = $widget->get_setting('col_md', '');
    $col_lg = $widget->get_setting('col_lg', '');
    $col_xl = $widget->get_setting('col_xl', '');
    $col_xxl = $widget->get_setting('col_xxl', '');
    if($col_xxl == 'inherit') {
        $col_xxl = $col_xl;
    }
    $slides_to_scroll = $widget->get_setting('slides_to_scroll');
    $arrows = $widget->get_setting('arrows', false);  

    $arrows = $widget->get_setting('arrows', false);  
    $arrow_style = $widget->get_setting('arrow_style', ' ');
    $pagination = $widget->get_setting('pagination', false);
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $pagination_style = $widget->get_setting('pagination_style', 'style1');

    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
    $infinite = $widget->get_setting('infinite', false);  
    $speed = $widget->get_setting('speed', 500);
    $drap = $widget->get_setting('drap', false);  
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $animate = $widget->get_setting('pxl_animate', '');
    $animate_delay = $widget->get_setting('pxl_animate_delay', 0);
    $opts = [
        'slide_direction'               => 'horizontal',
        'slide_percolumn'               => 1, 
        'slide_mode'                    => 'slide', 
        'slides_to_show'                => (int)$col_xl,
        'slides_to_show_xxl'            => (int)$col_xxl, 
        'slides_to_show_lg'             => (int)$col_lg, 
        'slides_to_show_md'             => (int)$col_md, 
        'slides_to_show_sm'             => (int)$col_sm, 
        'slides_to_show_xs'             => (int)$col_xs, 
        'slides_to_scroll'              => (int)$slides_to_scroll,
        'arrow'                         => (bool)$arrows,
        'pagination'                    => (bool)$pagination,
        'pagination_type'               => $pagination_type,
        'autoplay'                      => (bool)$autoplay,
        'pause_on_hover'                => (bool)$pause_on_hover,
        'pause_on_interaction'          => true,
        'delay'                         => (int)$autoplay_speed,
        'loop'                          => (bool)$infinite,
        'speed'                         => (int)$speed
    ];
    $widget->add_render_attribute( 'carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]); 

    $is_items = isset($settings['team']) && !empty($settings['team']) && count($settings['team']);
    $overlay = !empty($settings['overlay']) || false;
?>
<?php if($is_items):  ?>
    <div class="pxl-swiper-slider pxl-team pxl-team-carousel pxl-team-carousel1 pxl-team-layout1 <?php echo esc_attr($settings['l_style']) ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') { ?>
                        <?php foreach ($settings['team'] as $key => $value):
                            $name = isset($value['title']) ? $value['title'] : '';
                            $position = isset($value['position']) ? $value['position'] : '';
                            $image = isset($value['image']) ? $value['image'] : '';
                            $social = isset($value['social']) ? $value['social'] : '';
                            $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
                            if ( ! empty( $value['item_link']['url'] ) ) {
                                $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                                if ( $value['item_link']['is_external'] ) {
                                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                                }

                                if ( $value['item_link']['nofollow'] ) {
                                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                }
                            }
                            $link_attributes = $widget->get_render_attribute_string( $link_key ); 
                            $delay = $key * $animate_delay;
                            ?>

                            <div class="pxl-swiper-slide <?php echo esc_attr($animate); ?> <?php echo esc_html__('pxl-slide-', 'gurus').esc_attr($key + 1) ;?>" 
                            <?php if($animate_delay != 0) : ?> data-wow-delay="<?php echo esc_attr($delay).'ms'; ?>" <?php endif; ?>>
                                <div class="pxl-item--inner">
                                    <?php if(!empty($image['id'])) : 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => $image_size,
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail']; ?>
                                        <div class="pxl-item--image hover-imge-effect2">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                            <?php if ($settings['overlay']) : ?>
                                                <div class="pxl-item--overlay"></div>
                                            <?php endif; ?>
                                            <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ]); ?>></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-item--content">
                                        <div class="pxl-content--inner">
                                            <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ]); ?>></a>
                                            <div class="pxl-content--group">
                                                <h3 class="pxl-item--title"><?php echo pxl_print_html($name); ?></h3>
                                                <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                            </div>
                                            <?php if(!empty($social)): 
                                                $team_social = json_decode($social, true); ?>
                                                <div class="pxl-item--social">
                                                    <?php foreach ($team_social as $item): ?>
                                                        <a class="pxl-social--link" href="<?php echo esc_url($item['url']); ?>" target="_blank">
                                                            <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <?php echo '<div class="pxl-swiper-slide">'; $i = 0; ?>
                        <?php foreach ($settings['team'] as $key => $value):
                            $name = isset($value['title']) ? $value['title'] : '';
                            $position = isset($value['position']) ? $value['position'] : '';
                            $image = isset($value['image']) ? $value['image'] : '';
                            $social = isset($value['social']) ? $value['social'] : '';
                            $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
                            if ( ! empty( $value['item_link']['url'] ) ) {
                                $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                                if ( $value['item_link']['is_external'] ) {
                                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                                }

                                if ( $value['item_link']['nofollow'] ) {
                                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                }
                            }
                            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                            <div class="pxl-item--inner">
                                <?php if(!empty($image['id'])) : 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail']; ?>
                                    <div class="pxl-item--image hover-imge-effect2">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <?php if ($settings['overlay']) : ?>
                                            <div class="pxl-item--overlay"></div>
                                        <?php endif; ?>
                                        <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ]); ?>></a>
                                    </div>
                                <?php endif; ?>

                                <div class="pxl-item--content">
                                    <div class="pxl-content--inner">
                                        <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ]); ?>></a>
                                        <div class="pxl-content--group">
                                            <h3 class="pxl-item--title"><?php echo pxl_print_html($name); ?></h3>
                                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                        </div>
                                        <?php if(!empty($social)): 
                                            $team_social = json_decode($social, true); ?>
                                            <div class="pxl-item--social">
                                                <?php foreach ($team_social as $item): ?>
                                                    <a class="pxl-social--link" href="<?php echo esc_url($item['url']); ?>" target="_blank">
                                                        <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++;  
                            if ($i % 2 == 0 && $i != count($settings['team'])) { 
                                echo '</div><div class="pxl-swiper-slide">';
                            } ?>
                        <?php endforeach; echo "</div>"; ?>
                    <?php } ?>

                    <!-- End -->

                </div>
            </div>
            
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots-wrap <?php echo esc_attr($pagination_style); ?>">
                    <div class="pxl-swiper-dots "></div>
                </div>
            <?php endif; ?>

            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap  <?php echo esc_attr($arrow_style); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
<?php endif; ?>
