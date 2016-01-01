<?php
/**
 * The tag archive template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if ( have_posts() ) : ?>
  <div class="container">
  <div id="main-content" class="post-loop">
    <div class="content-headline">
      <h1 class="entry-headline"><?php printf( __( 'Tag Archive: %s', 'galanight' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php galanight_get_breadcrumb(); ?>
    </div>
<?php if ( tag_description() ) : ?><div class="archive-meta"><?php echo tag_description(); ?></div><?php endif; ?>
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