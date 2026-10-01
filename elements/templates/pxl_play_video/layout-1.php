<?php 
    $thumbnail_url = $settings['image']['url'] ?? '';
    $is_image = false;
    if(!empty($settings['image']['id'])) {
        $image  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => 'full',
            'class' => 'no-lazyload'
        ) );
        $thumbnail_url = $image['url'];
    }
    $image_type = !empty($settings['image_type']) || false;
    $overlay = !empty($settings['overlay']) || false;
    $btn_classes = $settings['btn_style'];
?>

<div class="pxl-play-video pxl-play-video1">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <div class="pxl-item--group">
                <div class="pxl-item--bg" style = "background-image: url('<?php echo esc_attr($thumbnail_url); ?>')"></div>
                <?php if($overlay) : ?>
                    <div class="pxl-item--overlay"></div>
                <?php endif; ?>
            </div>
            <a class="btn pxl-item--btn pxl-btn-video pxl-btn-play pxl-action-popup <?php echo esc_attr($btn_classes); ?>"  href="<?php echo esc_url($settings['video_link']); ?>">
                <?php if (!empty($settings['pxl_icon']['value'])) : ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                <?php else : ?>
                    <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33.5 17.4019C35.5 18.5566 35.5 21.4434 33.5 22.5981L5.00001 39.0526C3.00001 40.2073 0.500006 38.7639 0.500006 36.4545L0.500007 3.54552C0.500007 1.23611 3.00001 -0.20726 5.00001 0.947441L33.5 17.4019Z" fill="white"/>
                    </svg>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>