<form role="search" method="get" class="pxl-search-form pxl-search-form1 <?php echo esc_attr($settings['pxl_animate']); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-searchform-wrap">
    	<button type="submit" class="pxl-search-submit pxl-dark-slate btn"><i class="flaticon-loupe "></i></button>
		<input type="text" class="pxl-search-field pxl-p6" placeholder="<?php if(!empty($settings['email_placefolder'])) { echo esc_attr($settings['email_placefolder']); } else { esc_attr_e('Search...', 'gurus'); } ?>" name="s" />
    </div>
</form>
