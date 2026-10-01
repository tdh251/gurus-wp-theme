<?php
/**
 * @package Bravis-Themes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php 
        $header_layout = gurus()->get_opt('header_layout');
        $post_header = get_post($header_layout);
        $header_type = get_post_meta( $post_header->ID, 'header_type', true );
        $header_sidebar_w =  get_post_meta( $post_header->ID, 'header_sidebar_width', 168 ) ?? 0;
    ?>
    <div id="pxl-wrapper" class="pxl-wrapper <?php echo esc_attr($header_type); ?>">
        <?php 
        	gurus()->page->get_site_loader();
            gurus()->header->getHeader();
            if(!is_404()) {
                gurus()->page->get_page_title();
            }
        ?>
    <div id="pxl-main" class="<?php if(is_404()) echo esc_html__('pxl-404-error-page', 'gurus');?>" <?php if($header_type === 'pxl-header-sidebar--left') : ?> style="padding-left: <?php  echo esc_attr($header_sidebar_w.'px'); ?>;" <?php endif; ?>>
