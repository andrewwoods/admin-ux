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
add_action( 'admin_footer', 'generate_js_snippet' );
add_action( 'admin_enqueue_scripts', 'admin_ux_load_edit_posts_js' );

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                        FILTERS                          *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
add_filter( 'adminux_max_post_title_length', 'adminux_title_max_length', 10, 1 );


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
function adminux_autoload( $class ) {
	$plugin_dir = plugin_dir_path( __FILE__ );
	$src_dir = $plugin_dir . 'lib';

	\WPAL\Autoloader::autoload_class( $class, $src_dir );
}

spl_autoload_register( 'adminux_autoload' );


/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                                                             *
 *                               MAIN PROGRAM                                  *
 *                                                                             *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

