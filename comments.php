<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comment on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'materialpress' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php materialpress_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol>

		<?php materialpress_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'materialpress' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
