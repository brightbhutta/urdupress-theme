<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Urdu News
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

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '&ldquo;%2$s&rdquo; ایک تبصرہ', '%1$s تبصرے &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'unews' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( ' تبصروں میں نیویگیشن', 'unews' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'گزشتہ تبصرے', 'unews' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'حالیہ تبصرے', 'unews' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( ' تبصروں میں نیویگیشن', 'unews' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'گزشتہ تبصرہ', 'unews' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'اگلا تبصرہ', 'unews' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'تبصرے بند ہیں', 'unews' ); ?></p>
	<?php endif; ?>

	<?php 
	$comment_args = array( 'title_reply'=>'اپنا تبصرہ بھیجیں',

'fields' => apply_filters( 'comment_form_default_fields', array(

'author' => '<div class="comment-form-field">' . '<label for="author">' . __( 'آپکا نام' ) . '<span>*</span></label>' .

        '<input id="author" name="author" type="text" class="field" wrap="soft" onKeyPress="processKeypresses()" onClick="storeCaret(this)" onKeyUp="storeCaret(this)" onkeydown="processKeydown()" onFocus="setEditor(this)" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" /></div>',   

    'email'  => '<div class="comment-form-field">' .

                '<label for="email">' . __( 'آپکا ای میل ایڈریس' ) . '<span>*</span></label> ' .

                '<input id="email" name="email" type="text" class="field" value="' . esc_attr(  $commenter['comment_author_email'] ) . ' " size="40" />'.'</div>',

    'url'    => '' ) ),

    'comment_field' => '<div class="comment-form-field">' .

                '<label for="comment">' . __( 'اپنا تبصرہ لکھیں' ) . '</label>' .

                '<textarea id="comment" class="field" name="comment" cols="35" rows="4" wrap="soft" onKeyPress="processKeypresses()" onClick="storeCaret(this)" onKeyUp="storeCaret(this)" onkeydown="processKeydown()" onFocus="setEditor(this)" draggable="false" style="font-size:24px; font-family:Jameel Nastaleeq;"></textarea>' .

                '</div>',

    'comment_notes_after' => '',
	'comment_notes_before' => '<h4 class="email-note">آپکا ای میل ایڈریس شائع نہیں کیا جائے گا</h4>',
	'label_submit' => 'تبصرہ بھیجیں',

);
	comment_form( $comment_args ); 
?>

</div><!-- #comments -->
