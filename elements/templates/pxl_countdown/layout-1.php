<?php
$default_settings = [
    'date' => '2030/10/10',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$month = esc_html__('Month', 'gurus');
$months = esc_html__('Months', 'gurus');
$day = esc_html__('DAYS', 'gurus');
$days = esc_html__('DAYS', 'gurus');
$hour = esc_html__('HOURS', 'gurus');
$hours = esc_html__('HOURS', 'gurus');
$minute = esc_html__('MINS', 'gurus');
$minutes = esc_html__('MINS', 'gurus');
$second = esc_html__('SEC', 'gurus');
$seconds = esc_html__('SEC', 'gurus');
?>
<div class="pxl-countdown-wrap">
	<div class="pxl-countdown pxl-countdown-layout1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" 
		data-month="<?php echo esc_attr($month) ?>"
		data-months="<?php echo esc_attr($months) ?>"
		data-day="<?php echo esc_attr($day) ?>"
		data-days="<?php echo esc_attr($days) ?>"
		data-hour="<?php echo esc_attr($hour) ?>"
		data-hours="<?php echo esc_attr($hours) ?>"
		data-minute="<?php echo esc_attr($minute) ?>"
		data-minutes="<?php echo esc_attr($minutes) ?>"
		data-second="<?php echo esc_attr($second) ?>"
		data-seconds="<?php echo esc_attr($seconds) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-countdown-inner" data-count-down="<?php echo esc_attr($date);?>"></div>
	</div>
</div>