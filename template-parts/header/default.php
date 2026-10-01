<?php
/**
 * Template part for displaying default header layout
 */

$logo_m = gurus()->get_theme_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo.png', 'id' => '' ] );
$p_menu = gurus()->get_page_opt('p_menu');
?>
<header id="pxl-header-default">
    <div id="pxl-header-main" class="pxl-header-main">
        <div class="container">
            <div class="row">
                <div class="pxl-header-branding">
                    <?php
                        if ($logo_m['url']) {
                            printf(
                                '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                esc_url( home_url( '/' ) ),
                                esc_attr( get_bloginfo( 'name' ) ),
                                esc_url( $logo_m['url'] )
                            );
                        }
                    ?>
                </div>
                <div class="pxl-header-menu">
                    <div class="pxl-header-menu-scroll">
                        <div class="pxl-menu-close pxl-hide-xl pxl-close"></div>
                        <div class="pxl-logo-mobile pxl-hide-xl">
                            <?php
                                if ($logo_m['url']) {
                                    printf(
                                        '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                        esc_url( home_url( '/' ) ),
                                        esc_attr( get_bloginfo( 'name' ) ),
                                        esc_url( $logo_m['url'] )
                                    );
                                }
                            ?>
                        </div>
                        <?php gurus_header_mobile_search_form(); ?>
                        <nav class="pxl-header-nav">
                            <?php
                                if ( has_nav_menu( 'primary' ) )
                                {
                                    $attr_menu = array(
                                        'theme_location' => 'primary',
                                        'container'  => '',
                                        'menu_id'    => '',
                                        'menu_class' => 'pxl-menu-primary clearfix',
                                        'link_before'     => '<span>',
                                        'link_after'      => '</span>',
                                        'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
                                    );
                                    if(isset($p_menu) && !empty($p_menu)) {
                                        $attr_menu['menu'] = $p_menu;
                                    }
                                    wp_nav_menu( $attr_menu );
                                } else { 
                                    printf(
                                        '<ul class="pxl-menu-primary pxl-primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
                                        esc_url( admin_url( 'nav-menus.php' ) ),
                                        esc_html__( 'Create New Menu', 'gurus' )
                                    );
                                    ?>
                                <?php }
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="pxl-header-menu-backdrop"></div>
            </div>
        </div>
        <div id="pxl-nav-mobile">
            <div class="pxl-nav-mobile-button pxl-anchor-divider pxl-cursor--cta">
                <span class="pxl-icon-line pxl-icon-line1"></span>
                <span class="pxl-icon-line pxl-icon-line2"></span>
                <span class="pxl-icon-line pxl-icon-line3"></span>
            </div>
        </div>
    </div>
</header>
