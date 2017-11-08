<?php
/*
Plugin Name: Admin UX
Version: 0.1-alpha
Description: Add UX improvements to the WordPress Admin area.
Author: awoods
Author URI: http://andrewwoods.net
Plugin URI: https://github.com/andrewwoods/admin-ux
Text Domain: admin-ux
Domain Path: /languages
*/


/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                    INCLUDED FILES                       *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
require_once 'lib/actions.php';
require_once 'lib/filters.php';

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                       CONSTANTS                         *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
define( 'ADMIN_UX_DIR', plugin_dir_path( __FILE__ ) );
define( 'ADMIN_UX_URL', plugin_dir_url( __FILE__ ) );

define( 'ADMIN_UX_ASSETS_DIR', ADMIN_UX_DIR . 'assets/' );
define( 'ADMIN_UX_ASSETS_URL', ADMIN_UX_URL . 'assets/' );

define( 'ADMIN_UX_LIB_DIR', ADMIN_UX_DIR . 'lib/' );

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                        ACTIONS                          *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
add_action( 'admin_footer', 'admin_ux_generate_js_snippet' );
add_action( 'admin_enqueue_scripts', 'admin_ux_load_edit_posts_js' );
add_action( 'login_enqueue_scripts', 'admin_ux_login_styles' );
add_action( 'login_enqueue_scripts', 'admin_ux_login_image_url' );

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                        FILTERS                          *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
add_filter( 'adminux_max_post_title_length', 'admin_ux_title_max_length', 10, 1 );
add_filter( 'login_headerurl', 'admin_ux_login_logo_url' );

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                                                             *
 *                                 FUNCTIONS                                   *
 *                                                                             *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

/**
 * Registered autoload function for the Admin UX classes
 *
 * @param string $class the name-spaced class to autoload.
 */
function admin_ux_autoload( $class ) {
	$plugin_dir = plugin_dir_path( __FILE__ );
	$src_dir = $plugin_dir . 'lib';

	\WPAL\Autoloader::autoload_class( $class, $src_dir );
}

spl_autoload_register( 'admin_ux_autoload' );


/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                                                             *
 *                               MAIN PROGRAM                                  *
 *                                                                             *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

