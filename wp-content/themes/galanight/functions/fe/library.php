<?php 
/**
 * Library of Theme options functions.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/

// Display Breadcrumb navigation
function galanight_get_breadcrumb() { 
global $galanight_options_db;
		if ($galanight_options_db['galanight_display_breadcrumb'] != 'Hide') { ?>
		<?php if (function_exists( 'bcn_display' ) && !is_front_page()) { echo '<p class="breadcrumb-navigation">'; ?><?php bcn_display(); ?><?php echo '</p>'; } ?>
<?php } 
} 

// Display featured images on single posts
function galanight_get_display_image_post() { 
global $galanight_options_db;
		if ($galanight_options_db['galanight_display_image_post'] == '' || $galanight_options_db['galanight_display_image_post'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function galanight_get_display_image_page() { 
global $galanight_options_db;
		if ($galanight_options_db['galanight_display_image_page'] == '' || $galanight_options_db['galanight_display_image_page'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
} ?>