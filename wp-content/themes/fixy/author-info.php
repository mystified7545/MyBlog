<?php
/* The Template for displaying author information.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>

<div class="author-info">
	<h2 class="author-title">
		<?php if(get_the_author_meta( 'user_url',get_the_author_meta( 'ID' ))) :  ?>
			<a class="author-link" href="<?php echo esc_url( get_the_author_meta( 'user_url',get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'About %s', 'fixy' ), get_the_author() ); ?>
			</a>
		<?php else: ?>
			<?php printf( __( 'About %s', 'fixy' ), get_the_author() ); ?>
		<?php endif; ?>
	</h2>
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<p class="author-bio" style="text-align:justify;">
			<?php the_author_meta( 'description' ); ?>
		</p>
	</div><!-- .author-description -->
</div><!-- .author-info -->