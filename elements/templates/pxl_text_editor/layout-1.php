<?php
$editor_content = $widget->get_settings_for_display( 'text_ed' );
$editor_content = $widget->parse_text_editor( $editor_content );
$is_text_gadient = !empty($settings['color_gradient']) ? 'text-gradient' : '';
?>
<div class="pxl-text-editor">
	<div class="pxl-item--inner <?php echo esc_attr($settings['text_type'].' '.$settings['pxl_animate']); ?> <?php echo esc_attr($is_text_gadient);  ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<?php echo wp_kses_post($editor_content); ?>		
	</div>
</div>