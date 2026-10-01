<?php 
$template = (int)$widget->get_setting('content_template','0');
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'gurus_hook_anchor_hidden_panel' );
	} 
}

$classes = $settings['hover_style'].' '.$settings['style'];
?>
<div class="pxl-hidden-panel-button pxl-anchor-button pxl-atc-popup">
	<div class="pxl-button <?php echo esc_attr($classes); ?>">
		<?php if(!empty($settings['pxl_icon']['value'])) : ?>
			<div class="pxl-btn-icon">
				<?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
			</div>
		<?php else : ?>
			<div class="pxl-btn-icon icon-default">
				<div class="pxl-item--dot dot1  pxl-bg-white"></div>
				<div class="pxl-item--dot dot2  pxl-bg-white"></div>
				<div class="pxl-item--dot dot3 pxl-bg-white"></div>
				<div class="pxl-item--dot dot4 pxl-bg-white"></div>
				<div class="pxl-item--dot dot5 pxl-bg-white"></div>
				<div class="pxl-item--dot dot6 pxl-bg-white"></div>
				<div class="pxl-item--dot dot7 pxl-bg-white"></div>
				<div class="pxl-item--dot dot8 pxl-bg-white"></div>
				<div class="pxl-item--dot dot9 pxl-bg-white"></div>
			</div>
		<?php endif; ?>
	</div>
</div>
