<?php
/* The Template for displaying video post format.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="post-header">
			
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<div class="featured-post">
					<?php _e( '<i class="icon-star">Featured</i>', 'fixy' ); ?>
				</div><!--.featured-post-->
			<?php endif; ?>
		
			<?php if ( is_single() ) : ?>
				<h1 class="post-title p-name entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h3 class="post-title p-name entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php endif;  ?>
				
			<div class="post-info">
				<?php get_template_part('lib/post','meta'); ?>
			</div><!--.post-info-->
		
		</header><!--.post-header-->
	
		<div class="post-content">
			<?php the_content(''); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fixy' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!--.post-content-->
		
		<?php edit_post_link( __( '<i class="icon-pencil">Edit</i>', 'fixy' ), '<span class="edit-link">', '</span>' ); ?>
</article><!--.article-->
