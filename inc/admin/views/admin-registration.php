<?php
	$dev_mode = (defined('DEV_MODE') && DEV_MODE); 
	 
	$license = trim( get_option( gurus()->get_slug() . '_purchase_code' ) );

	$active = get_option( gurus()->get_slug() . '_purchase_code_status', false ) === 'valid';
	if( $dev_mode === true) $active = true;

	$register = new Gurus_Register;

	$pxl_server_info = apply_filters( 'pxl_server_info', ['docs_url' => 'https://doc.bravisthemes.com/', 'support_url' => 'https://bravisthemes.ticksy.com/'] ) ; 
?>
<?php if ($active): ?> 
	<div class="pxl-dsb-box-head"> 
		<div class="pxl-dsb-confirmation success">
			<h6><?php echo esc_html__( 'Thanks for the verification!', 'gurus' ) ?></h6>
			<p><?php echo esc_html__( 'You can now enjoy and build great websites. Looking for help? Visit', 'gurus' ) ?> <a href="<?php echo esc_url($pxl_server_info['support_url']) ?>" target="_blank"><?php echo esc_html__( 'submit a ticket', 'gurus' ) ?></a>.</p>
		</div> 

		<div class="pxl-dsb-deactive">
			<form method="POST" action="<?php echo admin_url( 'admin.php?page=pxlart' )?>">
				<input type="hidden" name="action" value="removekey"/>
				<button class="btn button" type="submit"><?php esc_html_e( 'Remove Purchase Code', 'gurus' ) ?></button>
			</form>
		</div> 
	</div> 
<?php else: ?>
	<?php $register->messages(); ?>
	  
<?php endif; ?>
 