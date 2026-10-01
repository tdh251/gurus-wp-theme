<?php
$p_menu = gurus()->get_page_opt('p_menu');

$main_menu = !empty($p_menu) ? $p_menu : $settings['menu'];
$menu_item_icon = !empty($settings['pxl_icon']['value']) ? $settings['pxl_icon']['value'] : '';

$animate_delay = ($settings['pxl_animate_delay'].'ms');

$main_menu_classes = $settings['horizontal_layout_style'].' '.$settings['hover_active_style'];
$sub_menu_classes = $settings['horizontal_sublevel_layout_style'].' '.$settings['sub_show_effect'].' '.$settings['hover_active_submenu_style'];
$menu_type = !empty($settings['menu_type']) ? 'pxl-layout-horizontal' : 'pxl-layout-vertical';
$classes = $main_menu_classes.' '.$sub_menu_classes.' '.$settings['menu_mega_type'].' '.$menu_type.' '.$settings['pxl_animate']; ?> 

<?php if(!empty($main_menu)) : ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($classes); ?>" data-wow-delay="<?php echo esc_attr($animate_delay); ?>">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'walker'     => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
            'link_before'     => '<span class="pxl-menu-item-text">',
            'link_after'      => '<span class="pxl-item-menu-icon pxl-hide '.$menu_item_icon.'"></span></span>',
            'menu'        => wp_get_nav_menu_object($settings['menu']))
        ); ?>
    </div>
<?php elseif( has_nav_menu( 'primary' ) ) : ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($classes); ?>">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'link_before'     => '<span class="pxl-menu-item-text">',
            'link_after'      => '</span><span class="pxl-item-menu-icon pxl-hide '.$menu_item_icon.'"></span></span>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php endif; ?>