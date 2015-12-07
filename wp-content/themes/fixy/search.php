
<?php
/**
 * Template Name: Search Page
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */


get_header(); ?>
	
<div class="primary" id="primary">
		
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<ul class="post-header-list">
					<li><i class="icon-search"></i></li>
					<li><h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'fixy' ), get_search_query() ); ?></h1></li>
				</ul><!--.post-header-list-->
			</header><!--.page-header-->
			
			<div class="special-search-form">
				<?php fixy_search_form(array('echo'=>1,
											'archive_show'=>1,
											'cat_show'=>1,
											'tag_show'=>1,
											'author_show'=>1,
											'label_show'=>1,
											'advance_show'=>0)); ?>
			</div><!--.special-search-form-->
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		
		<nav class="pagination">
			<?php fixy_pagination(); ?>
		</nav><!--.primary-->
		
</div><!--.primary-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>