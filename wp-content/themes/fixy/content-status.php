<?php
/* The Template for displaying status post format.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
		<div class="post-content">
			<?php the_content(''); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fixy' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!--.post-content-->
		
		<?php edit_post_link( __( '<i class="icon-pencil">Edit</i>', 'fixy' ), '<span class="edit-link">', '</span>' ); ?>

</article>
