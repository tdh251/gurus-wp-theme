<?php
    $particle = !empty($settings['show_particle']) ? 'pxl-item--particle' : '';
    $particle_position = '';
    if($settings['particle_position'] === 'left') {
        $particle_position = 'pxl-particle-left';
    }elseif($settings['particle_position'] === 'center') {
        $particle_position = 'pxl-particle-center';
    }else{
        $particle_position = 'pxl-particle-right';
    }
    $classes = $particle.' '.$particle_position.' '.$settings['animate'].' '.$settings['particle_animation'];
?>
<div class="pxl-divider <?php echo esc_attr($classes); ?>"></div>