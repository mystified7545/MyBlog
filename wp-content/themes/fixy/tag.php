<?php
/* The Template for displaying tag archive page.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */

get_header(); ?>

	<div id="primary" class="primary">
		
		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				
				<ul class="post-header-list">
					<li><i class="icon-tags"></i></li>
					<li><h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'fixy' ), single_tag_title( '', false ) ); ?></h1></li>
				</ul><!-- .post-header-list -->
				
				<?php if ( tag_description() ) : ?>
					<div class="archive-meta"><p style="text-align:justify;"><?php echo tag_description(); ?></p></div>
				<?php endif; ?>
			
			</header><!-- .archive-header -->
			
			<div class="special-search-form">
				<?php fixy_search_form(array('tag_show'=>1,'echo'=>1,'label_show'=>1)); ?>
			</div><!-- .special-search-form -->
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<nav class="pagination">
			<?php fixy_pagination(); ?>
		</nav><!-- .pagination -->
	
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>