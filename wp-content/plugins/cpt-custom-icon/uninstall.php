<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   FSCPTCustomIcon_Admin
 * @author    Firdaus Zahari <firdaus@fsylum.net>
 * @license   GPL-2.0+
 * @link      http://fsylum.net
 * @copyright 2014 Firdaus Zahari
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wp_post_types;
$plugin_opts = get_options('fs-cpt-custom-icon-opts');

foreach( $plugin_opts as $post_type => $opt ) {

    $args = $wp_post_types[ $post_type ];

    if( isset( $opt['old_icon'] ) && !empty( $opt['old_icon'] ) ) {
        $args->menu_icon = $opt['old_icon'];
    } else {
        $args->menu_icon = '';
    }

    $wp_post_types[ $post_type ] = $args;
}