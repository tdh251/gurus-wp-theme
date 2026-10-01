<?php 
    $img_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $thumbnail_url = null;
    if(!empty($settings['image']['url'])) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => $img_size,
        ));
        $thumbnail_url = $img['url'];
    }
?>
<div class="pxl-video-player pxl-video-player2 pxl-video-<?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['l_style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner">
        <?php if(!is_null($thumbnail_url)) : ?>
            <div class="pxl-video--bg">
                <div class="pxl-bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            </div>
        <?php endif; ?>
        <!-- Content -->
        <div class="pxl-video--holder">
            <!-- Title -->
            <h2 class="pxl-video--title pxl-hover-line">
                <a class="pxl-item--link pxl-white" href="<?php echo esc_url($settings['video_link']); ?>" ><?php echo esc_html($settings['video_title']) ?></a>
            </h2>
            <div class="pxl-video--content">
                <!-- Button Link Video -->
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
                <div class="pxl-video--meta">
                    <!-- Text Click -->
                    <span class="pxl-btn--text h6 pxl-white"><?php echo esc_html($settings['button_text']) ?></span>
                    <!-- Video Name -->
                    <p class="pxl-video--name h5 ">
                        <a class="pxl-item--link pxl-white" href="<?php echo esc_url($settings['video_link']); ?>" ><?php echo esc_html($settings['video_name']) ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>