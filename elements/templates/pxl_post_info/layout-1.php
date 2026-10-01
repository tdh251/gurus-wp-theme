<?php
    $post_id = get_the_ID(); 
    $show_date = (bool)$settings['show_date'];
    $show_title = (bool)$settings['show_title'];
    $show_client = (bool)$settings['show_client'];
    $show_timeline = (bool)$settings['show_timeline'];
    $show_service = (bool)$settings['show_service'];

    $timeline_start = $settings['timeline_start'];
    $timeline_end = $settings['timeline_end'];

    $year_start = date('Y', strtotime($timeline_start));
    $year_end = date('Y', strtotime($timeline_end));

    $style = $settings['style'];
    $time_line = (string) $year_start. ' - ' .$year_end;
    $author_name = get_the_author();
?>
<div class="pxl-post-info pxl-portfolio-layout1 <?php echo esc_attr($style) ;?>">
    <div class="pxl-post--inner">
        <?php if(!empty($settings['label'])): ?>
            <h2 class="pxl-label"><?php echo esc_html($settings['label']) ?></h2>
        <?php endif; ?>
        <ul class="pxl-list--info">
            <?php if($show_date) : ?>
                <li class="pxl-post-item">
                    <h4 class="pxl-info--name pxl-post--date"><?php if($style === 'default') echo esc_html__('Date: ', 'gurus'); ?>
                        <span class="pxl-info--content "><?php echo esc_html(get_the_date()); ?></span>
                    </h4>
                </li>
            <?php endif; ?>
            <?php if($show_title) : ?>
                <li class="pxl-post-item">
                    <h1 class="pxl-info--name pxl-post--title"><?php echo esc_html(get_the_title()); ?></span></h1>
                </li>
            <?php endif; ?>
            <?php if($show_client) : ?>
                <li class="pxl-post-item ">
                    <h4 class="pxl-info--name"><?php echo esc_html__('Client: ', 'gurus') ?>
                        <span class="pxl-info--content"><?php echo esc_html($author_name); ?></span>
                    </h4>
                </li>
            <?php endif; ?>
            <?php if($show_timeline) : ?>
                <li class="pxl-post-item ">
                    <h4 class="pxl-info--name"><?php echo esc_html__('Timeline: ', 'gurus') ?>
                        <span class="pxl-info--content"><?php echo esc_html($time_line); ?></span>
                    </h4>
                </li>
            <?php endif; ?>
            <?php if($show_service) : ?>
                <li class="pxl-post-item">
                    <h4 class="pxl-info--name"><?php echo esc_html__('Service: ', 'gurus') ?>
                        <span class="pxl-info--content"><?php the_terms($post_id, 'portfolio-category', '', ', ', ''); ?></span>
                    </h4>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>