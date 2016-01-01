<?php
/**
 * The main template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="container">
  <div id="main-content" class="post-loop">
<?php if ( $galanight_options_db['galanight_display_site_description'] != 'Hide' ) { ?>
    <div class="content-headline">
      <h1 class="entry-headline"><?php bloginfo( 'description' ); ?></h1>
    </div>
<?php } ?>   
    <section class="home-latest-posts">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
    </section>  
<?php galanight_content_nav( 'nav-below' ); ?> 
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>