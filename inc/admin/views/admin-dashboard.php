<main>

	<div class="pxl-dashboard-wrap">

		<?php include_once( get_template_directory() . '/inc/admin/views/admin-tabs.php' ); ?>
	 
		<div class="pxl-row">
			<div class="pxl-col pxl-col-4">
				<div class="pxl-dsb-box-wrap pxl-dsb-box featured-box">
					<h4 class="pxl-dsb-title-heading"><?php esc_html_e( 'Unlock Premium Features', 'gurus' ); ?></h4>
					<?php include_once( get_template_directory() . '/inc/admin/views/admin-featured.php' ); ?>
				</div>
			</div>    
		 	<div class="pxl-col pxl-col-4">
		 		<div class="pxl-dsb-box-wrap pxl-dsb-box activation-box">
			 		<h4 class="pxl-dsb-title-heading"><?php esc_html_e( 'Theme Activation', 'gurus' ); ?></h4>
					<?php include_once( get_template_directory() . '/inc/admin/views/admin-registration.php' ); ?>
				</div>
			</div>	
			<div class="pxl-col pxl-col-4">
				<div class="pxl-dsb-box-wrap pxl-dsb-box system-info-box">
					<h4 class="pxl-dsb-title-heading"><?php esc_html_e( 'System status', 'gurus' ); ?></h4>
					<?php include_once( get_template_directory() . '/inc/admin/views/admin-system-info.php' ); ?>
				</div>
			</div> 
	 		 
		</div> 
 
	</div> 

</main>
