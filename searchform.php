<?php
/**
 * Search Form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php esc_attr_e('Search Products...', 'gurus'); ?>" name="s" class="search-field p2" />
    	<button type="submit" class="btn search-submit"><i class="flaticon flaticon-loupe"></i></button>
    </div>
</form>