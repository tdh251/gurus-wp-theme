<?php
if($settings['type'] === 'navigation') :
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous ) {
        return;
    }
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="pxl-post-navigation">
            <div class="pxl--item item--prev pxl-navigation-btn--wrap pxl-navigation--prev">
                <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                    <div class="pxl-item-icon pxl-icon-prev">
                        <a class="pxl-icon-link pxl-arrow--prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                            <i class="flaticon flaticon-arrow-right"></i>
                        </a>
                    </div>

                <?php } ?>
            </div>
            
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="pxl--item item--next pxl-navigation-btn--wrap pxl-navigation--next ">
                    <div class="pxl-item-icon pxl-icon-next">
                        <a class="pxl-icon-link pxl-arrow--next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                            <i class="flaticon flaticon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    <?php } 
endif;?>

<?php 
    if($settings['type'] === 'pagination') : 
?>
    <div class="pxl-grid-pagination">
        Comming Soon
    </div>
<?php endif;