<?php
/**
 * Default Events template file.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
get_header(); ?>
<div id="wrapper-content">
  <div class="container">
  <div id="main-content">   
    <div id="content">
      <div class="entry-content"> 
	     <div id="tribe-events-pg-template">
<?php tribe_events_before_html(); ?> 
<?php tribe_get_view(); ?>   
<?php tribe_events_after_html(); ?>
	     </div> <!-- end of tribe-events-pg-template -->
      </div>
    </div> <!-- end of content -->
  </div>
<?php if ($galanight_options_db['galanight_display_sidebar'] != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>