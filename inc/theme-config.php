<?php if(!function_exists('gurus_configs')){
    function gurus_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'gurus'), 
                    'value' => gurus()->get_opt('primary_color', '#223035')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'gurus'), 
                    'value' => gurus()->get_opt('secondary_color', '#38464A')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'gurus'), 
                    'value' => gurus()->get_opt('third_color', '#20282D')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'gurus'), 
                    'value' => gurus()->get_opt('dark_color', '#01062e')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'gurus'), 
                    'value' => gurus()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => gurus()->get_opt('link_color', ['regular' => '#223035'])['regular'],
                'color-hover'   => gurus()->get_opt('link_color', ['hover' => '#0b3f66'])['hover'],
                'color-active'  => gurus()->get_opt('link_color', ['active' => '#0b3f66'])['active'],
            ],
            'gradient' => [
                'color-from' => gurus()->get_opt('gradient_color', ['from' => '#65BBBB'])['from'],
                'color-to' => gurus()->get_opt('gradient_color', ['to' => '#6F8DA3'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('gurus_inline_styles')) {
    function gurus_inline_styles() {  
        $theme_colors      = gurus_configs('theme_colors');
        $link_color        = gurus_configs('link');
        $gradient_color    = gurus_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  gurus_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 