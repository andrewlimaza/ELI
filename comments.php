<?php
/**
 * The template for displaying comments
 *
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

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'eli' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'eli'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>
		
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 20,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  => __( 'Reply', 'eli' ),
				) );
			?>
		</ul>

		 <?php 
		 the_comments_pagination( array(
			'prev_text' => __( 'Previous', 'eli' ),
			'next_text' => __( 'Next', 'eli' )
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'eli' ); ?></p>
	<?php
	endif;

	$comments_arg = array(
		'form'	=> array(
			'class' => 'form-horizontal'
			),
		'fields' => apply_filters( 'comment_form_default_fields', array(
				'autor' 				=> '<div class="form-group">' . '<label for="author">' . __( 'Name', 'wp_babobski' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
										'<input id="author" name="author" class="form-control" type="text" value="" size="30" />'.
										'<p id="d1" class="text-danger"></p>' . '</div>',
				'email'					=> '<div class="form-group">' .'<label for="email">' . __( 'Email', 'wp_babobski' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
										'<input id="email" name="email" class="form-control" type="text" value="" size="30" />'.
										'<p id="d2" class="text-danger"></p>' . '</div>',
				'url'					=> '')),
				'comment_field'			=> '<div class="form-group">' . '<label for="comment">' . __( 'Comment', 'wp_babobski' ) . '</label><span>*</span>' .
										'<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea><p id="d3" class="text-danger"></p>' . '</div>',
				'comment_notes_after' 	=> '',
				'class_submit'			=> 'btn btn-default'
			);

	comment_form( $comments_arg );
	?>

</div><!-- #comments -->