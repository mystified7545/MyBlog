<?php
/**
 * The archive template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="container">
  <div id="main-content" class="post-loop">
    <div class="content-headline">
      <h1 class="entry-headline"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'galanight' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'galanight' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'galanight' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'galanight' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'galanight' ) ) . '</span>' );
					else :
						_e( 'Archive', 'galanight' );
					endif;
				?></h1>
<?php galanight_get_breadcrumb(); ?>
    </div>
    <div id="content"> 
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
    </div> <!-- end of content -->
<?php galanight_content_nav( 'nav-below' ); ?>
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>