<?php
/**
 * The WooCommerce pages template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
  <div class="container">
  <div id="main-content">
    <div id="content">
      <div class="content-headline">
        <h1 class="entry-headline"><?php if ( !is_product() ) { woocommerce_page_title(); } else { the_title(); } ?></h1>
<?php galanight_get_breadcrumb(); ?>
      </div> 
      <div class="entry-content">
<?php woocommerce_content(); ?>
      </div>
    </div> <!-- end of content -->
  </div>
<?php if ( is_product() ) { ?>
<?php if ($galanight_options_db['galanight_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php }} else { ?>
<?php if ($galanight_options_db['galanight_display_sidebar_archives'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php }} ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>