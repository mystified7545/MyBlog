<?php
/* The Template for displaying archive page.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0

 */

get_header(); ?>

	
	<div class="primary" id="primary">
		<?php if ( have_posts() ) : ?>
			<div class="archive-header">
				<ul class="post-header-list">
					<li><i class="icon-calendar"></i></li>
					<li><h1 class="archive-title">
					<?php
					if ( is_day() ) :
						printf( __( ' Daily Archives: %s', 'fixy' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( ' Monthly Archives: %s', 'fixy' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'fixy' ) ) );
					elseif ( is_year() ) :
						printf( __( ' Yearly Archives: %s', 'fixy' ), get_the_date( _x( 'Y', 'yearly archives date format', 'fixy' ) ) );
					else :
						_e( 'Archives', 'fixy' );
					endif;
					?>
					</h1></li>
				</ul>
			</div>
				<div class="special-search-form"><?php fixy_search_form(array('echo'=>1,'archive_show'=>1,'label_show'=>1)); ?></div>
		
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