<?php
/* The Template for displaying comments.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<i class="icon-comment"></i>
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'fixy' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
					'reply_text' => __('Reply<i class=" icon-level-up"></i>','fixy')
				) );
			?>
		</ol><!-- .comment-list -->

	<nav class="comment-navigation" >
			<div class="previous-comments"><?php previous_comments_link( __( '<i class="icon-left-open"></i> Older Comments', 'fixy' ) ); ?></div>
			<div class="next-comments"><?php next_comments_link( __( 'Newer Comments <i class="icon-right-open"></i>', 'fixy' ) ); ?></div>
		</nav><!-- .comment-navigation -->	


		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'fixy' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php get_template_part('lib/comment','form'); ?>

</div><!-- #comments -->