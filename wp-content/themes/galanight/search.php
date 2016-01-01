<?php
/**
 * The search results template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="container">
  <div id="main-content" class="post-loop">
    <div class="content-headline">
      <h1 class="entry-headline"><?php printf( __( 'Search Results for: %s', 'galanight' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<?php galanight_get_breadcrumb(); ?>
    </div>
    <div id="content"> 
<p class="number-of-results"><?php _e( '<strong>Number of Results</strong>: ', 'galanight' ); ?><?php echo $wp_query->found_posts; ?></p>
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" id="nav-below" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'galanight' ); ?></h2>
      <div class="nav-wrapper">
        <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'galanight' ),
	'next_text' => __( 'Next &rarr;', 'galanight' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
<?php endif; ?>

<?php else : ?>
  <div class="container">
  <div id="main-content">
    <div class="content-headline">
      <h1 class="entry-headline"><?php _e( 'Nothing Found', 'galanight' ); ?></h1>
<?php galanight_get_breadcrumb(); ?>
    </div>
    <div id="content">
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'galanight' ); ?></p><?php get_search_form(); ?>
<?php endif; ?>
    </div> <!-- end of content -->
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>