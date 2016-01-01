<?php
/**
 * The page template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="container">
  <div id="main-content">   
    <div id="content">
      <div class="content-headline">
        <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php galanight_get_breadcrumb(); ?>
      </div>
<?php galanight_get_display_image_page(); ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'galanight' ), '<p class="edit-link">', '</p>' ); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'galanight' ) . '</span>', 'after' => '</p>' ) ); ?>
      </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
    </div> <!-- end of content -->
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>