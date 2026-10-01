<?php
    $col_xs = $widget->get_setting('col_xs', '');
    $col_sm = $widget->get_setting('col_sm', '');
    $col_md = (int)$widget->get_setting('col_md', '');
    if($col_md == 'custom') {
        $col_md = $widget->get_setting('col_md_custom', '');
    }
    $col_lg = (int)$widget->get_setting('col_lg', '');
    if($col_lg == 'custom') {
        $col_lg = $widget->get_setting('col_lg_custom', '');
    }
    $col_xl = (int)$widget->get_setting('col_xl', '');
    if($col_xl == 'custom') {
        $col_xl = $widget->get_setting('col_xl_custom', '');
    }
    $col_xxl = (int)$widget->get_setting('col_xxl', '');
    if($col_xxl == 'custom') {
        $col_xxl = $widget->get_setting('col_xxl_custom', '');
    }
    $slides_to_scroll = $widget->get_setting('slides_to_scroll');
    $arrows = $widget->get_setting('arrows', false);  
    $pagination = $widget->get_setting('pagination', false);
    $pagination_type = $widget->get_setting('pagination_type', 'bullets');
    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
    $infinite = $widget->get_setting('infinite', false);  
    $speed = $widget->get_setting('speed', 500);
    $drap = $widget->get_setting('drap', false);
    $opts = [
        'slide_direction'               => 'horizontal',
        'slide_percolumn'               => 1, 
        'slide_percolumnfill'           => 1, 
        'slide_mode'                    => 'slide', 
        'slides_to_show'                => $col_xl,
        'slides_to_show_xxl'            => $col_xxl,  
        'slides_to_show_lg'             => $col_lg, 
        'slides_to_show_md'             => $col_md, 
        'slides_to_show_sm'             => (int)$col_sm, 
        'slides_to_show_xs'             => (int)$col_xs, 
        'slides_to_scroll'              => (int)$slides_to_scroll,  
        'slides_gutter'                 => 30, 
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

    $bg_gradient = !empty($settings['bg_gradient']) ? 'pxl-bg-gradient' : '';
?>

<?php
if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-swiper-slider pxl-iconbox-carousel pxl-layout-carousel1 <?php echo esc_attr($bg_gradient); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['items'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $value['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );
        
                            if ( $value['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }
        
                            if ( $value['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <!-- Show icon -->
                                <?php if ( $value['icon_type'] == 'icon' && !empty($value['pxl_icon']['value'])) : ?>
                                    <div class="pxl-item--icon pxl-flex-center">
                                        <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $value['icon_type'] == 'image' && !empty($value['icon_image']['id']) ) : ?>
                                    <div class="pxl-item-icon pxl-flex-center">
                                        <?php $img_icon  = pxl_get_image_by_size( array(
                                                'attach_id'  => $value['icon_image']['id'],
                                                'thumb_size' => 'full',
                                            ) );
                                            $thumbnail_icon    = $img_icon['thumbnail'];
                                        echo pxl_print_html($thumbnail_icon); ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Link -->
                                <?php if ( !empty( $value['link']['url'] )) : ?>
                                    <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                                <?php endif; ?>
                                <!-- Content -->
                                <div class="pxl-item--holder">
                                    <h4 class="pxl-item--title pxl-white el-empty"><?php echo pxl_print_html($title); ?></h4>
                                    <div class="pxl-item--desc pxl-white pxl-p3 el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <div class="pxl-icon--hover">
                                        <svg class="icon-main" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <rect width="32" height="1" fill="white"/>
                                            <rect x="31" y="32" width="32" height="1" transform="rotate(-90 31 32)" fill="white"/>
                                            <path d="M2 31L31.5 0.5" stroke="white"/>
                                        </svg>
                                        <svg class="icon-copy" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <rect width="32" height="1" fill="#223035"/>
                                            <rect x="31" y="32" width="32" height="1" transform="rotate(-90 31 32)" fill="#223035"/>
                                            <path d="M2 31L31.5 0.5" stroke="#223035"/>
                                        </svg>
                                    </div>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots-wrap pxl-swiper-dots-default">
                <div class="pxl-swiper-dots"></div>
            </div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-1">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev pxl-arrow--prev"></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next pxl-arrow--next"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
