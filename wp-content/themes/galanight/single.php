<?php
/**
 * The post template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="container">
  <div id="main-content">
    <article id="content">
      <div class="content-headline">
        <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php galanight_get_breadcrumb(); ?>
      </div>
<?php galanight_get_display_image_post(); ?>
<?php if ( $galanight_options_db['galanight_display_meta_post'] != 'Hide' ) { ?>
        <p class="post-meta">
          <span class="post-info-author"><i class="icon_pencil-edit" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
          <span class="post-info-date"><i class="icon_clock_alt" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) { ?>
          <span class="post-info-comments"><i class="icon_comment_alt" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
<?php } ?>
<?php if ( has_category() ) { ?>
          <span class="post-info-category"><i class="icon_folder-alt" aria-hidden="true"></i> <?php the_category(', '); ?></span>
<?php } ?>
<?php if ( has_tag() ) { ?>
<?php the_tags( '<span class="post-info-tags"><i class="icon_tag_alt" aria-hidden="true"></i> ', ', ', '</span>' ); ?>
<?php } ?>
        </p>
<?php } ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'galanight' ), '<p class="edit-link">', '</p>' ); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'galanight' ) . '</span>', 'after' => '</p>' ) ); ?>
      </div>
<?php endwhile; endif; ?>
<?php if ( $galanight_options_db['galanight_next_preview_post'] != 'Hide' ) { ?>
<?php galanight_prev_next('galanight-post-nav'); ?>
<?php } ?> 
<?php comments_template( '', true ); ?>
    </article> <!-- end of content -->
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>