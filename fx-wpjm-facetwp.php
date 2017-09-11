<?php
/**
 * Plugin Name: f(x) WPJM FacetWP
 * Plugin URI: http://genbumedia.com/plugins/{SLUG}/
 * Description: PoC, WPJM FacetWP bridge.
 * Version: 1.0.0
 * Author: David Chandra Purnama
 * Author URI: http://shellcreeper.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: {PLUGIN FOLDER NAME}
 * Domain Path: /languages/
 *
 * @author David Chandra Purnama <david@genbumedia.com>
 * @copyright Copyright (c) 2017, Genbu Media
**/

// Kill it if access directy.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/* Constants.
------------------------------------------ */

define( 'FX_WPJM_FACETWP_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'FX_WPJM_FACETWP_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FX_WPJM_FACETWP_FILE', __FILE__ );
define( 'FX_WPJM_FACETWP_PLUGIN', plugin_basename( __FILE__ ) );
define( 'FX_WPJM_FACETWP_VERSION', '1.0.0' );


/* Init.
------------------------------------------ */

add_action( 'plugins_loaded', 'fx_wpjm_facetwp_init' );

/**
 * WPJM FacetWP Init.
 *
 * @since 1.0.0
 */
function fx_wpjm_facetwp_init() {

	// Check requirements before loading.
	if ( class_exists( 'FacetWP' ) && class_exists( 'WP_Job_Manager' ) ) {
		require_once( FX_WPJM_FACETWP_PATH . 'includes/class-fx-wpjm-facetwp.php' );
	}
}

