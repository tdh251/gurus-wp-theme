<?php
$html_id = pxl_get_element_id($settings);
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');

$col_xxl = 12 / intval($col_xxl);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);



$item_class = "pxl-grid-item col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$grid_sizer = "col-xxl-{$col_xxl} col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '427x358';
$btn_text_hover = !empty($settings['btn_text_hover']) ? $settings['btn_text_hover'] : 'View Demo';

?>

<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-grid pxl-showcase2 pxl-showcase ">
        <div class="pxl-showcase-inner pxl-grid-inner row">
            <?php foreach($settings['items'] as $key => $item) : 
                $title = isset($item['title']) ? $item['title'] : '';
                $thumbnail = null;
                $is_coming_soon = !empty($item['item_coming_soon']) || false;
                if(!empty($item['image']['id'])) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $item['image']['id'],
                        'thumb_size' => $image_size,
                    ));
                    $thumbnail = $img['thumbnail'];
                }
                
                $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                if ( ! empty( $item['btn_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $item['btn_link']['url'] );

                    if ( $item['btn_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $item['btn_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );

                $link_key_one_page = $widget->get_repeater_setting_key( 'item_link_one_page', 'value', $key );
                if ( ! empty( $item['item_link_one_page']['url'] ) ) {
                    $widget->add_render_attribute( $link_key_one_page, 'href', $item['item_link_one_page']['url'] );

                    if ( $item['item_link_one_page']['is_external'] ) {
                        $widget->add_render_attribute( $link_key_one_page, 'target', '_blank' );
                    }

                    if ( $item['item_link_one_page']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key_one_page, 'rel', 'nofollow' );
                    }
                }
                $link_attributes_one_page = $widget->get_render_attribute_string( $link_key_one_page );

                $link_key_home_dark = $widget->get_repeater_setting_key( 'item_link_home_dark', 'value', $key );
                if ( ! empty( $item['item_link_home_dark']['url'] ) ) {
                    $widget->add_render_attribute( $link_key_home_dark, 'href', $item['item_link_home_dark']['url'] );

                    if ( $item['item_link_home_dark']['is_external'] ) {
                        $widget->add_render_attribute( $link_key_home_dark, 'target', '_blank' );
                    }

                    if ( $item['item_link_home_dark']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key_home_dark, 'rel', 'nofollow' );
                    }
                }
                $link_attributes_home_dark = $widget->get_render_attribute_string( $link_key_home_dark );
                $animate = $item['item_animate'];
                ?>
                <div class="<?php echo esc_attr($item_class.' elementor-repeater-item-'.esc_attr( $item['_id'] )); ?>" >
                    <h4 class="pxl-item--title"><?php echo esc_html($title); ?></h4>
                    <div class="pxl-item-content <?php echo esc_attr($animate); ?> <?php if($is_coming_soon) echo esc_html__('coming-soon', 'gurus');?>" data-wow-delay="0ms">
                        <?php if(!is_null($thumbnail)) : ?>
                            <div class="pxl-item--image">
                                <?php echo pxl_print_html($thumbnail); ?>
                                <?php if(!$is_coming_soon) : ?>
                                    <a class="btn pxl-item--btn pxl-item-btn2" <?php echo implode( ' ', [ $link_attributes_one_page ] ); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">                              
                                        <span class="pxl-btn--text"><?php echo esc_html__('One Page', 'gurus') ?></span>
                                    </a>
                                    <a class="btn pxl-item--btn pxl-item-btn1" <?php echo implode( ' ', [ $link_attributes ] ); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">                              
                                        <span class="pxl-btn--text"><?php echo esc_html__('Home Light', 'gurus') ?></span>
                                    </a>
                                    <a class="btn pxl-item--btn " <?php echo implode( ' ', [ $link_attributes_home_dark ] ); ?> data-text="<?php echo esc_attr($btn_text_hover); ?>">                              
                                        <span class="pxl-btn--text"><?php echo esc_html__('Home Dark', 'gurus') ?></span>
                                    </a>
                                <?php endif ?>
                            </div>
                        <?php endif; ?>
                        <svg class="pxl-shape1 pxl-item--shape" data-speed = "2.5" width="276" height="276" viewBox="0 0 276 276" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.2" filter="url(#filter0_d_1_439)">
                            <circle cx="138" cy="134" r="134" fill="url(#paint0_linear_1_439)"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_1_439" x="0" y="0" width="276" height="276" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_439"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_439" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear_1_439" x1="138" y1="0" x2="138" y2="268" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#65BBBB"/>
                            <stop offset="1" stop-color="#6F8DA3"/>
                            </linearGradient>
                            </defs>
                        </svg>
                        <svg class="pxl-shape2 pxl-item--shape" width="276" data-speed = "2.5" height="276" viewBox="0 0 276 276" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.2" filter="url(#filter0_d_1_439)">
                            <circle cx="138" cy="134" r="134" fill="url(#paint0_linear_1_439)"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_1_439" x="0" y="0" width="276" height="276" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_439"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_439" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear_1_439" x1="138" y1="0" x2="138" y2="268" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#65BBBB"/>
                            <stop offset="1" stop-color="#6F8DA3"/>
                            </linearGradient>
                            </defs>
                        </svg>
                        <?php if($is_coming_soon) : ?>
                            <div class="pxl-item-coming-soon">
                                <h1><span><?php echo pxl_print_html('Coming <br> Soon'); ?></span></h1>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>