<?php
defined( 'ABSPATH' ) or exit( -1 );

/**
 * Author Information widgets
 *
 */

if(!function_exists('pxl_register_wp_widget')) return;
add_action( 'widgets_init', function(){
    pxl_register_wp_widget( 'PXL_Contact_Info_Widget' );
});
class PXL_Contact_Info_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'pxl_contact_info_widget',
            esc_html__('Gurus Contact Info', 'gurus'),
            array('description' => esc_html__('Show Author Information', 'gurus'),)
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $bg_box_id = !empty($instance['bg_box']) ? $instance['bg_box'] : '';
        $bg_box_url = wp_get_attachment_image_url($bg_box_id, '');
        $phone_number = !empty($instance['phone_number']) ? $instance['phone_number'] : '';
        $phone_link = !empty($instance['phone_link']) ? $instance['phone_link'] : '';
        $description = !empty($instance['description']) ? $instance['description'] : '';
         
        ?>
        <div class="pxl-contact-info-widget bg-image" style="background-image: url(<?php echo esc_url($bg_box_url)?>); ?>);">
            <div class="content-inner">
                <div class="pxl-item--icon"><i class="flaticon-telephone-1 el-effect-zigzag"></i></div>
                <?php if (!empty($phone_number)): ?>
                    <div class="pxl-phone--number"><?php echo esc_html($phone_number);?></div>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <div class="pxl-item--desc"><?php echo gurus_html(nl2br($description)); ?></div>
                <?php endif; ?>
                <?php if (!empty($phone_link)): ?>
                    <a href="<?php echo esc_attr($phone_link); ?>" class="pxl-phone--link"></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['bg_box'] = strip_tags($new_instance['bg_box']);
        $instance['phone_number'] = strip_tags($new_instance['phone_number']);
        $instance['phone_link'] = strip_tags($new_instance['phone_link']);
        $instance['description'] = strip_tags($new_instance['description']);
         
        return $instance;
    }

    function form($instance)
    {
        $bg_box = isset($instance['bg_box']) ? esc_attr($instance['bg_box']) : '';
        $phone_number = isset($instance['phone_number']) ? esc_html($instance['phone_number']) : '';
        $phone_link = isset($instance['phone_link']) ? esc_html($instance['phone_link']) : '';
        $description = isset($instance['description']) ? esc_html($instance['description']) : '';
        ?>
        <div class="author-image-wrap">
            <label for="<?php echo esc_url($this->get_field_id('bg_box')); ?>"><?php esc_html_e('Author Image', 'gurus'); ?></label>
            <input type="hidden" class="widefat hide-image-url"
                   id="<?php echo esc_attr($this->get_field_id('bg_box')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('bg_box')); ?>"
                   value="<?php echo esc_attr($bg_box) ?>"/>
            <div class="pxl-show-image">
                <?php
                if ($bg_box != "") {
                    ?>
                    <img src="<?php echo wp_get_attachment_image_url($bg_box) ?>">
                    <?php
                }
                ?>
            </div>
            <?php
            if ($bg_box != "") {
                ?>
                <a href="#" class="pxl-select-image pxl-btn" style="display: none;"><?php esc_html_e('Select Image', 'gurus'); ?></a>
                <a href="#" class="pxl-remove-image pxl-btn"><?php esc_html_e('Remove Image', 'gurus'); ?></a>
                <?php
            } else {
                ?>
                <a href="#" class="pxl-select-image pxl-btn"><?php esc_html_e('Select Image', 'gurus'); ?></a>
                <a href="#" class="pxl-remove-image pxl-btn" style="display: none;"><?php esc_html_e('Remove Image', 'gurus'); ?></a>
                <?php
            }
            ?>
        </div>
         
        <p>
            <label for="<?php echo esc_url($this->get_field_id('phone_number')); ?>"><?php esc_html_e( 'Phone Number', 'gurus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_number') ); ?>" type="text" value="<?php echo esc_attr( $phone_number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('phone_link')); ?>"><?php esc_html_e( 'Phone Link', 'gurus' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_link') ); ?>" type="text" value="<?php echo esc_attr( $phone_link ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('description')); ?>"><?php esc_html_e('Description', 'gurus'); ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo wp_kses_post($description); ?></textarea>
        </p>
        <?php
    }

} 