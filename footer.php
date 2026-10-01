<?php
/**
 * @package Bravis-Themes
 */
?>
		</div><!-- #main -->

			<?php if(!is_404()) { 
				gurus()->footer->getFooter();
			}?>
			<?php do_action( 'pxl_anchor_target'); ?>
		</div><!-- #wapper -->
	<?php wp_footer(); ?>
	</body>
</html>
