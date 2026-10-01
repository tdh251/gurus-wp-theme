<?php 
    $template = (int)$widget->get_setting('content_template','0');
    if($template > 0 ){
        if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
            add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'gurus_hook_anchor_hidden_panel' );
        } 
    }
    $classes = $settings['style'];
?>
<div class="pxl-button-anchor">
    <div class="pxl-item--container">
        <div class="pxl-item--inner">
            <button class="btn pxl-item--button pxl-button-toggle <?php echo esc_attr($classes); ?>">
                <?php if(!empty($settings['pxl_icon']['value'])) : ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                <?php else : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="2" cy="2" r="2" fill="white"/>
                        <circle cx="12" cy="2" r="2" fill="white"/>
                        <circle cx="22" cy="2" r="2" fill="white"/>
                        <circle cx="2" cy="12" r="2" fill="white"/>
                        <circle cx="12" cy="12" r="2" fill="white"/>
                        <circle cx="22" cy="12" r="2" fill="white"/>
                        <circle cx="2" cy="22" r="2" fill="white"/>
                        <circle cx="12" cy="22" r="2" fill="white"/>
                        <circle cx="22" cy="22" r="2" fill="white"/>
                    </svg>
                <?php endif; ?>
            </button>
        </div>
    </div>
</div>
