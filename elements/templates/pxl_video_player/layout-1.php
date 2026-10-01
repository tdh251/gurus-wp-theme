<?php 
    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $thumbnail = null;
    $thumbnail_url = null;
    if(!empty($settings['image']['url'])) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => $img_size,
        ));
        $thumbnail = $img['thumbnail'];
        $thumbnail_url = $img['url'];
    }
?>
<div class="pxl-video-player pxl-video-player1 pxl-video-<?php echo esc_attr($settings['btn_video_style']); ?> " >
    <div class="pxl-video--inner">
        <?php if($settings['overlay'] == 'true') : ?>
            <div class="pxl-bg--overlay"></div>
        <?php endif; ?>
        <?php if( $settings['image_type'] === 'img' && !is_null($thumbnail)) : ?>
            <div class="pxl-video--image">
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php endif; ?>

        <?php if( $settings['image_type'] === 'bg' && !is_null($thumbnail_url)) : ?>
            <div class="pxl-video--bg">
                <div class="pxl-bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            </div>
        <?php endif; ?>

        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap">
                <a class="pxl-btn-video pxl-action-popup pxl-flex-center <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if ( !empty($settings['video_icon']['value']) ) { ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php } else { ?>
                        <i class="caseicon-play1"></i>
                    <?php } ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>