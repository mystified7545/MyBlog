<?php
/**
 * @package Catch Themes
 * @subpackage Simple_Catch_Pro
 * @since Simple Catch Pro 1.0
 */

/**
 * Set the default values for all the settings. If no user-defined values
 * is available for any setting, these defaults will be used.
 */
global $simplecatch_options_defaults;
$simplecatch_options_defaults = array(
 	'featured_logo_header' 			=> get_template_directory_uri().'/images/logo-head.png',
	'remove_header_logo'			=> '0',
 	'remove_site_title'				=> '0',
 	'remove_site_description'		=> '0',
 	'featured_logo_footer' 			=> get_template_directory_uri().'/images/logo-foot.png',
 	'remove_footer_logo'			=> '0',
 	'fav_icon'						=> get_template_directory_uri().'/images/favicon.ico',
	'remove_fav_icon'				=> '1',
	'web_clip'						=> '',
	'color_scheme'					=> 'default',
	'heading_color'					=> '#444444',
 	'meta_color'					=> '#999999',
 	'text_color'					=> '#555555',
 	'link_color'					=> '#000000',
 	'widget_heading_color'			=> '#666666',
 	'widget_text_color'				=> '#666666',
	'reset_color'					=> '2',
 	'exclude_slider_post'			=> '0',
 	'front_page_category'			=> array(),
	'sidebar_layout'				=> 'right-sidebar',
	'reset_layout'					=> '2',
 	'slider_qty'					=> 3,
	'select_slider_type'			=> 'image-slider',
	'enable_slider'					=> 'enable-slider-homepage',
 	'featured_slider'				=> array(),
	'featured_image_slider_image'	=> array(),
	'featured_image_slider_link' 	=> array(),
	'featured_image_slider_title' 	=> array(),
	'featured_image_slider_content' => array(),
 	'remove_noise_effect'			=> '0',
 	'transition_effect'				=> 'fade',
 	'transition_delay'				=> 4,
 	'transition_duration'			=> 1,
 	'social_facebook'				=> '',
 	'social_twitter'				=> '',
 	'social_googleplus'				=> '',
 	'social_pinterest'				=> '',
 	'social_youtube'				=> '',
 	'social_vimeo'					=> '',
 	'social_linkedin'				=> '',
 	'social_slideshare'				=> '',
 	'social_foursquare'				=> '',
 	'social_flickr'					=> '',
 	'social_tumblr'					=> '',
 	'social_deviantart'				=> '',
 	'social_dribbble'				=> '',
 	'social_myspace'				=> '',
 	'social_wordpress'				=> '',
 	'social_rss'					=> '',
 	'social_delicious'				=> '',
 	'social_lastfm'					=> '',
	'social_instagram'				=> '',
	'social_github'					=> '',
	'social_vkontakte'				=> '',
	'social_myworld'				=> '',
	'social_odnoklassniki'			=> '',
	'social_goodreads'				=> '',
	'social_skype'					=> '',
	'social_soundcloud'				=> '',
	'social_email'				=> '',
 	'custom_css'					=> '',
 	'google_verification'			=> '',
 	'yahoo_verification'			=> '',
 	'bing_verification'				=> '',
 	'analytic_header'				=> '',
 	'analytic_footer'				=> '',
 	'sidebar_layout'				=> 'right-sidebar',
 	'more_tag_text'					=> 'Continue Reading &rarr;',
 	'search_display_text'			=> 'Type KeyWord',
 	'search_button_text'			=> 'Search',
 	'excerpt_length'				=> 30,
	'feed_url'						=> '',
	'footer_code'					=> '<div class="copyright">[footer-image] Copyright &copy; [the-year] <span>[site-link]</span>. All Right Reserved.</div><div class="powered-by">Powered by: [wp-link] | Theme: [theme-link]</div>',
	'reset_footer'					=> '2'
);
global $simplecatch_options_settings;
$simplecatch_options_settings = simplecatch_options_set_defaults( $simplecatch_options_defaults );

function simplecatch_options_set_defaults( $simplecatch_options_defaults ) {
	$simplecatch_options_settings = array_merge( $simplecatch_options_defaults, (array) get_option( 'simplecatch_options', array() ) );
	return $simplecatch_options_settings;
}


/**
 * Returns an array of color schemes registered
 *
 * @since Simple Catch 3.0
 */
function simplecatch_color_schemes() {
	$options = array(
		'default' 		=> __( 'Default (Light)', 'simple-catch' ),
		'dark'			=> __( 'Dark', 'simple-catch' ),
		'brown'			=> __( 'Brown', 'simple-catch' ),
	);

	return apply_filters( 'simplecatch_color_schemes', $options );
}

/**
 * Returns an array of sidebar layout options
 *
 * @since Simple Catch 3.0
 */
function simplecatch_sidebar_layout_options() {
	$options = array(
		'right-sidebar' 		=> __( 'Content on Left ', 'simple-catch' ),
		'left-sidebar' 			=> __( 'Content on Right', 'simple-catch' ),
		'no-sidebar'			=> __( 'No Sidebar', 'simple-catch' ),
		'no-sidebar-full-width' => __( 'No Sidebar, Full Width', 'simple-catch' )
	);

	return apply_filters( 'simplecatch_sidebar_layout_options', $options );
}

/**
 * Returns an array of slider transition effects
 *
 * @since Simple Catch 3.0
 */
function simplecatch_transition_effects() {
	$options = array(
		'fade'			=> __( 'fade', 'simple-catch' ),
		'wipe' 			=> __( 'wipe', 'simple-catch' ),
		'scrollUp' 		=> __( 'scrollUp', 'simple-catch' ),
		'scrollDown'	=> __( 'scrollDown', 'simple-catch' ),
		'scrollUp' 		=> __( 'scrollUp', 'simple-catch' ),
		'scrollLeft'	=> __( 'scrollLeft', 'simple-catch' ),
		'scrollRight'	=> __( 'scrollRight', 'simple-catch' ),
		'blindX' 		=> __( 'blindX', 'simple-catch' ),
		'blindY' 		=> __( 'blindY', 'simple-catch' ),
		'blindZ' 		=> __( 'blindZ', 'simple-catch' ),
		'cover' 		=> __( 'cover', 'simple-catch' ),
		'shuffle' 		=> __( 'shuffle', 'simple-catch' ),
	);

	return apply_filters( 'simplecatch_transition_effects', $options );
}