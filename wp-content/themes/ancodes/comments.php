<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="commenttitle">
    Comments
</div>


	<?php if ( have_comments() ) : ?>





            <?php
    //wp_list_comments( 'type=comment&callback=mytheme_comment' );
    ?>
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>



	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>



	<?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '
         ' . ( $req ? ' ' : '' ) .
            '<input class="w-input commentnamefield" placeholder="Enter your name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
        'email'  =>  ( $req ? ' ' : '' ) .
            '<input class="w-input commentnamefield" placeholder="Enter your email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
    );

    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit',
        'name_submit'       => 'submit',
        'title_reply'       => '',
        'title_reply_to'    => '',
        'cancel_reply_link' => __( 'Cancel Reply' ),
        'label_submit'      => 'Submit',

        'class_submit'         => 'w-button commentsubmit', // Строка. С 4.1. class атрибут для submit элемента.
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />', // формат кнопки submit. C 4.2.
        'format'            => 'xhtml',

        'comment_field' =>  '<p class="comment-form-comment"><textarea class="w-input commenttextarea"  id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
            '</textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
            sprintf(
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                admin_url( 'profile.php' ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">Your email address will not be published</p>',

        'comment_notes_after' => '<p class="form-allowed-tags">' .
            sprintf(
                __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
                ' <code>' . allowed_tags() . '</code>'
            ) . '</p>',

        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );



    ?>

<!--
<div class="commenttitle">Comments</div>
<div class="singlecomment">
    <div class="commentname">John, 2 may 2016:</div>
    <div class="commenttxt">Here is my outstanding and genious comment special for Effi Mora</div>
    <div class="replylink">Reply</div>
    <div class="singlecomment">
        <div class="commentname">John, 2 may 2016:</div>
        <div class="commenttxt">Here is my outstanding and genious comment special for Effi Mora</div>
        <div class="replylink">Reply</div>
    </div>
</div>
-->
<div class="commenttitle">Add your comment</div>
<div class="w-form commentfieldcontainer">
    <?php  comment_form($args);?>
<!--
    <form id="email-form-2" name="email-form-2" data-name="Email Form 2">
        <input class="w-input commentnamefield" id="name" type="text" placeholder="Enter your name" name="name" data-name="Name">
        <textarea class="w-input commenttextarea" id="field" placeholder="Enter your comment" name="field" required="required"></textarea>
        <input class="w-button commentsubmit" type="submit" value="Submit" data-wait="Please wait...">
    </form>
    -->
    <div class="w-form-done">
        <p>Thank you! Your submission has been received!</p>
    </div>
    <div class="w-form-fail">
        <p>Oops! Something went wrong while submitting the form</p>
    </div>
</div>