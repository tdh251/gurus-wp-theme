<?php
$html_id = pxl_get_element_id($settings);
$tax = ['category'];
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
    'post', 
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    $tax
));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
}
$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$col_xs = 12 / intval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$grid_class = 'pxl-grid-inner row';

$filter = $widget->get_setting('filter', 'false');
$filter_type = $widget->get_setting('filter_type', 'normal');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');

$post_type = $widget->get_setting('post_type','post');
$layout = $widget->get_setting('layout_'.$post_type, 'post-1');


$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');

$show_date = $widget->get_setting('show_date');
$show_comment = $widget->get_setting('show_comment');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'View More';
    
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
    'col_xl'          => $col_xl,
    'col_lg'          => $col_lg,
    'col_md'          => $col_md,
    'col_sm'          => $col_sm,
    'col_xs'          => $col_xs,
    'pagination_type' => $pagination_type,
    'show_date'       => $show_date,
    'show_excerpt'       => $show_excerpt,
    'num_words' => $num_words,
    'show_comment'   => $show_comment,
    'show_button'   => $show_button,
    'button_text'   => $button_text,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'    => $pxl_animate,
);

$wrap_attrs = [
    'id'               => $html_id,
    'class'            => trim('pxl-grid pxl-blog-grid pxl-blog-grid-layout1 '.$settings['layout_style']),
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
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'gurus' ). '</div>';
    return;
} ?>

<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?>>
    <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
        <div class="pxl-grid-filter <?php echo esc_attr($filter_type) ?>">
            <div class="pxl--filter-inner">
                <span class="filter-item active" data-filter="*">
                    <?php echo esc_html($filter_default_title); ?>
                </span>
            </div>
        </div>
    <?php endif; ?>
    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
        <?php gurus_get_post_grid($posts, $load_more); ?>
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
    </div>
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination">
            <?php gurus()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more">
            <span class="btn-grid-loadmore btn-slip-primary">
                <span class="pxl-loadmore-text"><?php echo esc_html__('Load More', 'gurus') ?></span>
                <span class="pxl-load-icon"></span>
            </span>
        </div>
    <?php } ?>
</div>