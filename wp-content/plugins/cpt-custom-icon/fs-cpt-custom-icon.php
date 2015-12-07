<?php
/**
 * @package   FSCPTCustomIcon
 * @author    Firdaus Zahari <firdaus@fsylum.net>
 * @license   GPL-2.0+
 * @link      http://fsylum.net
 * @copyright 2014 Firdaus Zahari
 *
 * Plugin Name:       CPT Custom Icon
 * Plugin URI:        http://fsylum.net
 * Description:       Easily change custom post type icon on dashboard menu
 * Version:           1.0.1
 * Author:            Firdaus Zahari
 * Author URI:        http://fsylum.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'class/class-fs-cpt-custom-icon-admin.php' );
    register_activation_hook( __FILE__, array( 'FSCPTCustomIcon_Admin', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'FSCPTCustomIcon_Admin', 'deactivate' ) );
	add_action( 'plugins_loaded', array( 'FSCPTCustomIcon_Admin', 'get_instance' ) );
}
