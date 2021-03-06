<?php
/**
 *  Plugin loader
 *
 * @package LOGINCUST
 * @author Themeisle
 * @since 1.0.0
 */

/**
 * Plugin Name: Custom Login Page Customizer
 * Plugin URI: https://themeisle.com/plugins/login-customizer/
 * Description: Custom Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! Awesome, right?
 * Author: Hardeep Asrani
 * Author URI:  https://themeisle.com/
 * Version: 2.0.0
 * WordPress Available:  yes
 * Requires License:    no
 */

define( 'LOGINCUST_VERSION', '2.0.0' );
define( 'LOGINCUST_FREE_PATH', plugin_dir_path( __FILE__ ) );
define( 'LOGINCUST_FREE_URL', plugin_dir_url( __FILE__ ) );

require_once( LOGINCUST_FREE_PATH . 'vendor/autoload.php' );
require_once( LOGINCUST_FREE_PATH . 'setup.php' );
require_once( LOGINCUST_FREE_PATH . 'inc/include-page-template.php' );
require_once( LOGINCUST_FREE_PATH . 'inc/customizer/customizer.php' );

function login_customizer_register_sdk( $products ) {
	$products[] = __FILE__;

	return $products;
}

add_filter( 'themeisle_sdk_products', 'login_customizer_register_sdk', 10, 1 );

/**
 * Add link to Login Customizer in Appearances menu
 */
function logincust_admin_link() {

	// Get global submenu
	global $submenu;

	// Generate the redirect url.
	$options = get_option( 'login_customizer_settings', array() );

	$url = add_query_arg(
		array(
			'autofocus[panel]' => 'logincust_panel',
			'url' => rawurlencode( get_permalink( $options['page'] ) ),
		),
		admin_url( 'customize.php' )
	);

	// Add Login Customizer as a menu item
	$submenu['themes.php'][] = array( 'Login Customizer', 'manage_options', $url, 'login-customizer' );

}

add_action( 'admin_menu', 'logincust_admin_link' );
