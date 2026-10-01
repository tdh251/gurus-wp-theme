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
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '410x506';


?>
<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid1 pxl-team-layout1 ">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['items'] as $key => $item):
    			$name = isset($item['name']) ? $item['name'] : '';
                $position = isset($item['position']) ? $item['position'] : '';
                $image = isset($item['image']) ? $item['image'] : '';
                $social = isset($item['social']) ? $item['social'] : '';
                $link_key = $widget->get_repeater_setting_key( 'link', 'item', $key );
                if ( ! empty( $item['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );
                    if ( $item['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }
                    if ( $item['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                <div class="<?php echo esc_attr($item_class); ?>">
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
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
