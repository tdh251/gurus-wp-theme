<?php
/**
 * @package Bravis-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">
        <?php
            if ( have_comments() ) : ?>
                <div class="comment-list-wrap">
                    <h3 class="comments-title h3">
                        <?php
                            $comment_count = get_comments_number();
                            if ( 1 === intval($comment_count) ) {
                                echo esc_html__( '1 Comment', 'gurus' );
                            } else {
                                echo esc_html__('Comments', 'gurus').' '.esc_attr( "(".$comment_count. ")" );
                            }
                        ?>
                    </h3>
                    <p class="p2 comment-note"><?php echo esc_html__('Please share your thoughts regarding this blog in the comment section', 'gurus') ?></p>

                    <?php the_comments_navigation(); ?>

                    <ul class="comment-list">
                        <?php
                            wp_list_comments( array(
                                'style'      => 'ul',
                                'short_ping' => true,
                                'callback'   => 'gurus_comment_list',
                                'max_depth'  => 3
                            ) );
                        ?>
                    </ul>

                    <?php the_comments_navigation(); ?>
                </div>
                <?php if ( ! comments_open() ) : ?>
                    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gurus' ); ?></p>
                <?php
                endif;

            endif;

            $args = array(
                    'id_form'           => 'commentform',
                    'id_submit'         => 'submit',
                    'class_submit'         => 'btn btn-form-submit pxl-btn-default pxl-btn-large pxl-btn-bg pxl-btn-dark pxl-hover-default',
                    'title_reply'       => esc_attr__( 'Leave a comment', 'gurus'),
                    'title_reply_to'    => esc_attr__( 'Leave a comment to ', 'gurus') . '%s',
                    'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'gurus'),
                    'submit_button'     => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" />
                                                <span class="pxl-btn--text">%4$s</span>
                                                <i class="pxl-icon--default flaticon flaticon-up-right-arrow"></i>
                                            </button>',
                    'comment_notes_before' => '',
                    'fields' => apply_filters( 'comment_form_default_fields', array(
                            'note' => '<p class="comment-form-note pxl-p2">Your email address will not be published. Required fields are marked *</p>',
                            'author' =>
                            '<div class="row"><div class="comment-form-author col-lg-6 col-md-6 col-sm-6 col-12">'.
                            '<input class="field pxl-b3" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                            '" size="30" placeholder="'.esc_attr__('Name', 'gurus').'"/></div>',

                            'email' =>
                            '<div class="comment-form-email col-lg-6 col-md-6 col-sm-6 col-12">'.
                            '<input class="field pxl-b3" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                            '" size="30" placeholder="'.esc_attr__('Email', 'gurus').'"/></div>',
                    )
                    ),
                    'comment_field' =>  '<div class="comment-form-comment"><textarea class="field pxl-b3" id="comment" name="comment" cols="45" rows="7" placeholder="'.esc_attr__('Message', 'gurus').'" aria-required="true">' .
                    '</textarea></div>',
            );
            '<div class="dohuyn"> ' .
                comment_form($args)
            .'</div>';
        ?>
    </div>