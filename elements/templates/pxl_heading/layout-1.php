<?php
	$html_id = pxl_get_element_id($settings);

	$editor_title = $widget->parse_text_editor( $settings['title'] ?? '' ); 
	$title_tag = $settings['title_tag'];

	$animate_subtitle_delay = $settings['pxl_animate_delay_sub'].'ms';
	$animate_title_delay = $settings['pxl_animate_delay'];

	$text_gradient_class = ($settings['is_color_gradient'] === 'true') ? 'text-gradient' : '';
	// classes
	$subtitle_classes = $settings['pxl_animate_sub'];
	$title_classes = 'pxl-heading-'.$settings['h_title_style'].' '.$text_gradient_class.' '.$settings['pxl_animate'];
	$typewriter = !empty($settings['hightlight_typewriter']) ? 'pxl-typewriter-effect' : '';

	$classes = $typewriter.' '.$settings['sub_title_style'];

	$is_singular = false;
	$title_text = ($settings['source_type'] == 'text' && !empty($editor_title)) ? wp_kses_post($editor_title) : '';
	$is_editor_title = !empty($title_text) ? true : false;

	$is_custom_title = (bool)$settings['is_custom_text'];

	$is_texts = (isset($settings['texts']) && !empty($settings['texts']) && count($settings['texts'])) || false;
	$texts = [];
	if($is_texts) {
		foreach($settings['texts'] as $text) {
			$texts[] = $text['text'];
		}
		$texts = wp_json_encode($texts);
	}
	// 
	$sg_post_title = gurus()->get_theme_opt('sg_post_title', 'default');
	$sg_post_title_text = gurus()->get_theme_opt('sg_post_title_text');

	$sg_product_ptitle = gurus()->get_theme_opt('sg_product_ptitle', 'default');
	$sg_product_ptitle_text = gurus()->get_theme_opt('sg_product_ptitle_text');

	$sg_service_title = gurus()->get_theme_opt('sg_service_title', 'default');
	$sg_service_title_text = gurus()->get_theme_opt('sg_service_title_text');

	$sg_portfolio_title = gurus()->get_theme_opt('sg_portfolio_title', 'default');
	$sg_portfolio_title_text = gurus()->get_theme_opt('sg_portfolio_title_text');
	if($is_custom_title) {
		// Check exists singular
		if(is_singular('post') && $sg_post_title == 'custom_text' && !empty($sg_post_title_text) && $settings['source_type'] == 'title') {
			$title_text = $sg_post_title_text;
			$is_singular = true;
			$is_editor_title = false;
		}elseif(is_singular('portfolio') && $sg_portfolio_title == 'custom_text' && !empty($sg_portfolio_title_text) && $settings['source_type'] == 'title') {
			$title_text = $sg_portfolio_title_text;
			$is_singular = true;
			$is_editor_title = false;
		}elseif(is_singular('service') && $sg_service_title == 'custom_text' && !empty($sg_service_title_text) && $settings['source_type'] == 'title') {
			$title_text = $sg_service_title_text;
			$is_singular = true;
			$is_editor_title = false;
		}elseif(is_singular('product') && $sg_product_ptitle == 'custom_text' && !empty($sg_product_ptitle_text) && $settings['source_type'] == 'title') {
			$title_text = $sg_product_ptitle_text;
			$is_singular = true;
			$is_editor_title = false;
		}
	}else {
		if(is_single() && $settings['source_type'] == 'title') {
			$title_text = get_the_title();
			$is_singular = true;
			$is_editor_title = false;
		}
	}
	// 

	if ( ! empty( $settings['icon_link']['url'] ) ) {
		$widget->add_render_attribute( 'icon_link', 'href', $settings['icon_link']['url'] );
		if ( $settings['icon_link']['is_external'] ) {
			$widget->add_render_attribute( 'icon_link', 'target', '_blank' );
		}
		if ( $settings['icon_link']['nofollow'] ) {
			$widget->add_render_attribute( 'icon_link', 'rel', 'nofollow' );
		}
	}

?>

<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-heading <?php echo esc_attr($classes); ?>" >
	<div class="pxl-heading--container" >
		<div class="pxl-heading--inner">
			<?php if(!empty($settings['sub_title'])) : ?>
				<div class="pxl-item--subtitle <?php echo esc_attr($subtitle_classes); ?>" data-wow-delay="<?php echo esc_attr($animate_subtitle_delay); ?>">
					<span class="pxl-item--subtext <?php echo esc_attr($settings['sub_title_style_1']); ?>">
						<?php echo esc_attr(pxl_print_html($settings['sub_title'])); ?>
					</span>
				</div>
			<?php endif; ?>
			<?php if(!empty($settings['pxl_icon'])) : ?>
				<div class="pxl-item--subtitle <?php echo esc_attr($subtitle_classes); ?>" data-wow-delay="<?php echo esc_attr($animate_subtitle_delay); ?>">
					<a class="pxl-item--icon" <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>>
						<?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ) ?>
					</a>
				</div>
			<?php endif; ?>
			<<?php echo esc_attr($title_tag); ?> class="pxl-item--title <?php echo esc_attr($title_classes); ?>" data-wow-delay="<?php echo esc_attr($animate_title_delay.'ms'); ?>">
				<?php if($is_singular || $is_editor_title) echo pxl_print_html($title_text); ?>
				<?php if( !$is_singular && $settings['source_type'] == 'title') : 
					$titles = gurus()->page->get_title();
					if(!empty($_GET['blog_title'])) {
						$blog_title = $_GET['blog_title'];
						$custom_title = explode('_', $blog_title);
						foreach ($custom_title as $index => $value) {
							$arr_str_b[$index] = $value;
						}
						$str = implode(' ', $arr_str_b);
						echo wp_kses_post($str);
					} else {
						pxl_print_html($titles['title']);
					}?>
				<?php endif; ?>	
				<?php if($is_texts) : ?>
					<span class="pxl-typewriter-text pxl-title--highlight" data-texts="<?php echo esc_attr($texts); ?>"></span>
				<?php endif; ?>
			</<?php echo esc_attr($title_tag); ?>>
		</div>
		
	</div>
</div>
