<?php
/* The Template for category archive page.
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
					<li><i class="icon-folder-open-empty"></i></li>
					<li><h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'fixy' ), single_cat_title( '', false ) ); ?></h1></li>
				</ul>
					<?php if ( category_description() ) : ?>
						<div class="archive-meta"><p style="text-align: justify;"><?php echo category_description(); ?></p></div>
					<?php endif; ?>
					
			</header>
			<div class="special-search-form"><?php fixy_search_form(array('echo'=>1,'cat_show'=>1,'label_show'=>1)); ?></div>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<nav class="pagination">
			<?php fixy_pagination(); ?>
		</nav>
		
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>