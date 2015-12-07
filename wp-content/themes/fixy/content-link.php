<?php
/* The Template for displaying link post format.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?> " <?php post_class(); ?>>
	<header class="post-header">
		<h3 class="post-title p-name entry-title"><i class="icon-link"></i><a id="link-title" href="<?php echo esc_url( fixy_get_link_url() ); ?>"><?php the_title(); ?></a></h3>
	</header>

	<div class="post-content">
		<?php if ( !is_single() ) : 
					if (get_theme_mod('fixy_auto_excerpt')=='yes'){
						the_excerpt();
					}
					else {
						the_content('<a class="more-link" href="'. get_permalink($post->ID) . '">'.__('... Read More','fixy').'</a>' ); 
					}
			else : ?>
		<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fixy' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php endif; ?>
	</div>

	<?php if ( is_single() ) : ?>
	<div class="post-info">
				
				<?php get_template_part('lib/post','meta'); ?>
			</div>
	<?php endif; ?>
	<?php edit_post_link( __( '<i class="icon-pencil">Edit</i>', 'fixy' ), '<span class="edit-link">', '</span>' ); ?>
</article>

