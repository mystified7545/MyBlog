<?php
/**
 * @package Catch Themes
 * @subpackage Simple Catch
 * @since Simple Catch 3.0
 */


if( ! function_exists( 'simplecatch_is_favicon_active' ) ) :
	/**
	* Return true if no core site icon is present
	*
	* @since Simple Catch 3.0
	*/
	function simplecatch_is_site_icon_active( $control ) {
		//Check if has_site_icon function exists. If it does not, WP version is less than 4.3
		if ( function_exists( 'has_site_icon' ) ) { 
			//Return true if core site icon is not present, else return false
			return !has_site_icon();
		}
		else {		
			return true;
		}
	}
endif;


if( ! function_exists( 'simplecatch_is_feed_url_present' ) ) :
	/**
	* Return true if feed url is present
	*
	* @since Simple Catch 3.0
	*/
	function simplecatch_is_feed_url_present( $control ) {
		global $simplecatch_options_settings;
    
    	$options = $simplecatch_options_settings;
		
		return ( isset( $options['feed_url'] ) && '' != $options['feed_url'] );
	}
endif;


if( ! function_exists( 'simplecatch_is_header_code_present' ) ) :
	/**
	* Return true if header code is present
	*
	* @since Simple Catch 3.0
	*/
	function simplecatch_is_header_code_present( $control ) {
		global $simplecatch_options_settings;
    
    	$options = $simplecatch_options_settings;
		
		return ( isset( $options['analytic_header'] ) && '' != $options['analytic_header'] );
	}
endif;


if( ! function_exists( 'simplecatch_is_footer_code_present' ) ) :
	/**
	* Return true if footer code is present
	*
	* @since Simple Catch 3.0
	*/
	function simplecatch_is_footer_code_present( $control ) {
		global $simplecatch_options_settings;
    
    	$options = $simplecatch_options_settings;

		return ( isset( $options['analytic_footer'] ) && '' != $options['analytic_footer'] );
	}
endif;