<?php
/* The Template for displaying pages.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */

get_header(); ?>

	<div class="primary" id="primary">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?> article" <?php post_class(); ?>>
					
					<header class="post-header">
						<h1 class="post-title"><?php the_title(); ?></h1>
					</header><!--post-header-->	
	
					<div class="post-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fixy' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!--.post-content-->	
					<?php edit_post_link( __( '<i class="icon-pencil">Edit</i>', 'fixy' ), '<span class="edit-link">', '</span>' ); ?>
				</article><!--Article-->	

				<?php comments_template(); ?>
		
			<?php endwhile; ?>

		</div><!--.primary-->	
<?php get_footer(); ?>