<?php
/*
* The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0

 */

get_header(); ?>

		<div class="primary" id="primary">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<nav class="post-navigation">
					<span class="previous-post"><?php previous_post_link( '%link', __('<i class="icon-left-open"></i> %title','fixy') ); ?></span>
					<span class="next-post"><?php next_post_link( '%link', __('%title <i class="icon-right-open"></i>','fixy') ); ?></span>
				</nav><!-- .post-navigation -->
	
				<?php comments_template(); ?>

			<?php endwhile; ?>
			
		</div><!-- .primary -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>