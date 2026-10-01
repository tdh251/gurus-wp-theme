<?php
    $html_id = pxl_get_element_id($settings);
    $tax = ['service-category'];
    $select_post_by = $widget->get_setting('select_post_by', '');
    $source = $post_ids = [];
    if($select_post_by === 'post_selected'){
        $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
    }else{
        $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    }
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    extract(pxl_get_posts_of_grid(
        'service', 
        ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
        $tax
    ));
    $filter_default_title = $widget->get_setting('filter_default_title', 'All');


    $grid_class = 'pxl-grid-inner';

    $filter = $widget->get_setting('filter', 'false');
    $filter_type = $widget->get_setting('filter_type', 'normal');
    $filter_alignment = $widget->get_setting('filter_alignment', 'center');
    $pagination_type = $widget->get_setting('pagination_type', 'pagination');

    $post_type = $widget->get_setting('post_type', 'service');
    $layout = $widget->get_setting('layout_'.$post_type, 'service-1');


    $show_button = $widget->get_setting('show_button', true);
    $button_text = $widget->get_setting('button_text', 'View More');
    $num_words = $widget->get_setting('num_words', 25);
    $show_excerpt = $widget->get_setting('show_excerpt', true);
    $show_icon = $widget->get_setting('show_icon', true);
    $item_first = !empty($settings['item_first']) || false;
    $editor_title = $widget->get_settings_for_display('title');
    $editor_title = $widget->parse_text_editor( $editor_title ); 

    $load_more = array(
        'tax'             => $tax,
        'post_type'       => $post_type,   
        'layout'          => $layout,
        'startPage'       => $paged,
        'maxPages'        => $max,
        'total'           => $total,
        'filter'          => $filter,
        'filter_type'     => $filter_type,
        'perpage'         => $limit,
        'nextLink'        => $next_link,
        'source'          => $source,
        'orderby'         => $orderby,
        'order'           => $order,
        'limit'           => $limit,
        'post_ids'        => $post_ids,
        'pagination_type' => $pagination_type,
        'show_excerpt'    => $show_excerpt,
        'show_icon'       => $show_icon,
        'num_words'       => $num_words,
        'show_button'     => $show_button,
        'button_text'     => $button_text,
        'item_first'      => $item_first,
        'title'           => $editor_title,
        'subtitle'        => $settings['subtitle'],
        'desc'            => $settings['desc'],  
        'item_first_title_animate'       => $settings['item_first_title_animate'],
        'item_first_title_animate_delay' => $settings['item_first_title_animate_delay'],
        'html_id'         => $html_id,
    );

    $wrap_attrs = [
        'id'               => $html_id,
        'class'            => trim('pxl-grid-custom pxl-service-grid pxl-service-grid-layout6'),
        'data-start-page'  => $paged,
        'data-max-pages'   => $max,
        'data-total'       => $total,
        'data-perpage'     => $limit,
        'data-next-link'   => $next_link
    ];

    if ($pagination_type != 'false'){
        $wrap_attrs['data-loadmore'] = json_encode($load_more);
    }

    $widget->add_render_attribute( 'wrapper', $wrap_attrs );
    
    if( count($posts) <= 0){
        echo '<div class="pxl-no-post-grid black h1">'.esc_html__( 'No Post Found', 'gurus' ). '</div>';
        return;
    } 

    $autoplay = !empty($settings['autoplay']) || false;
    $delay = (isset($settings['delay']) && !empty($settings['delay'])) ? $settings['delay'] : 1500;
    $pause_on_hover = !empty($settings['pause_on_hover']) || false;
    $pause_on_interaction = !empty($settings['pause_on_interaction']) || false;
    $loop = !empty($settings['loop']) || false;
    $speed = !empty($settings['speed']) ? $settings['speed'] : 1000;


    $opts = [
        'slide_direction'               => 'horizontal',
        'slide_percolumn'               => 1, 
        'slide_percolumnfill'           => 1, 
        'slide_mode'                    => 'slide', 
        'slides_to_show'                => 1,
        'slides_to_show_xxl'            => 1,  
        'slides_to_show_lg'             => 1, 
        'slides_to_show_md'             => 1, 
        'slides_to_show_sm'             => 1, 
        'slides_to_show_xs'             => 1, 
        'slides_to_scroll'              => 1,  
        'slides_gutter'                 => 30, 
        'arrow'                         => false,
        'pagination'                    => false,
        'pagination_type'               => 'bullet',
        'autoplay'                      => $autoplay,
        'pause_on_hover'                => $pause_on_hover,
        'pause_on_interaction'          => $pause_on_interaction,
        'delay'                         => $delay,
        'loop'                          => $loop,
        'speed'                         => $speed
    ];
    $widget->add_render_attribute( 'carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]);
    $is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;

    $background_url = null;
    if(!empty($settings['bg_testimonial']['id'])) {
        $background_image  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['bg_testimonial']['id'],
            'thumb_size' => 'full',
        ));
        $background_url = $background_image['url'];
    } 
?>
<div <?php pxl_print_html($widget->get_render_attribute_string('wrapper')) ?>>
    <div class="<?php echo esc_attr($grid_class); ?>">
        <?php gurus_get_post_grid($posts, $load_more); ?>
        <?php if($is_items): ?>
            <div class="pxl-item--post pxl-item--testimonial">
                <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel5 pxl-swiper-nogap">
                    <div class="pxl-carousel-inner pxl-item--inner">
                        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?> style="background-image: url('<?php if(!is_null($background_url)) echo esc_attr($background_url); ?>')">
                            <div class="pxl-swiper-wrapper">
                                <?php foreach($settings['items'] as $key => $item) : ?>
                                    <div class="pxl-swiper-slide">
                                        <div class="pxl-slide-content">
                                            <div class="pxl-content-top">
                                                <?php if (!empty($settings['testimonial_icon']['value'])) : ?>
                                                    <div class="pxl-item--icon">
                                                        <?php \Elementor\Icons_Manager::render_icon( $settings['testimonial_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="pxl-item--icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="61" height="43" viewBox="0 0 61 43" fill="none">
                                                            <path d="M35.8445 43.0002H58.4095C59.3791 43.0002 60.165 42.2144 60.165 41.2447V18.6797C60.165 17.71 59.3791 16.9241 58.4095 16.9241H48.8828V1.75581C48.8828 0.786594 48.0969 0.000244141 47.1272 0.000244141H41.4856C40.7299 0.000244141 40.0592 0.48394 39.8206 1.2008L34.1794 18.1247C34.1195 18.3034 34.0889 18.4909 34.0889 18.6797V41.2447C34.0889 42.2144 34.8748 43.0002 35.8445 43.0002Z" fill="white"/>
                                                            <path d="M1.99681 43.0002H24.5618C25.5315 43.0002 26.3174 42.2144 26.3174 41.2447V18.6797C26.3174 17.71 25.5315 16.9241 24.5618 16.9241H15.0347V1.75581C15.0347 0.786594 14.2488 0.000244141 13.2791 0.000244141H7.63795C6.88223 0.000244141 6.21155 0.48394 5.97245 1.2008L0.33131 18.1247C0.271877 18.3034 0.241245 18.4909 0.241245 18.6797V41.2447C0.241245 42.2144 1.02714 43.0002 1.99681 43.0002Z" fill="white"/>
                                                        </svg>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="pxl-item--content"><?php echo esc_html($item['content']); ?></div>
                                            </div>
                                            <div class="pxl-content-bottom">
                                                <h4 class="pxl-item--client"><?php echo esc_html($item['client']); ?></h4>
                                                <div class="pxl-item--position"><?php echo esc_html($item['position']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?> 
    </div>
</div>