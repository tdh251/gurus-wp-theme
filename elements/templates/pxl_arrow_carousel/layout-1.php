<?php 

$animate_delay = $settings['pxl_animate_delay'].'ms';
$classes = $settings['style'].' '.$settings['hover_style'].' '.$settings['pxl_animate'];
?>

<div class="pxl-navigation-carousel <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
    <div class="pxl-nav--inner pxl-swiper-arrow-wrap">
        <div class="pxl-navigation-arrow pxl-navigation-arrow-prev pxl-arrow--prev"><i class="flaticon flaticon-arrow-right"></i></div>
        <div class="pxl-navigation-arrow pxl-navigation-arrow-next pxl-arrow--next"><i class="flaticon flaticon-arrow-right"></i></div>
    </div>
</div>