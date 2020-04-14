<?php
/**
 * Plugin Name:	Di Multipurpose Demo Importer
 * Description:	Import demos of Di Multipurpose theme.
 * Version:		1.0.1
 * Author:		Di Themes
 * Author URI:	https://dithemes.com
 * License:		GPLv2 or later
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: di-multipurpose-demo-importer
 * Domain Path: /languages
 *
 */

// Exit if directly accessed files.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants.

define( 'DMDI_VERSION' , '1.0.1' );

define( 'DMDI_FILE', __FILE__ );
define( 'DMDI_PATH', wp_normalize_path( plugin_dir_path( DMDI_FILE ) ) );

define( 'DMDI_URL', plugin_dir_url( DMDI_FILE ) );

define( 'DMDI_BASENAME', plugin_basename( DMDI_FILE ) );
define( 'DMDI_DIR_NAME', dirname( DMDI_BASENAME ) );

// Make sure di-multipurpose or it's child theme is active.
if( wp_get_theme()->Template == 'di-multipurpose' ) {

	// Load text domain.
	add_action( 'init', 'dmdi_load_plugin_textdomain' );
	function dmdi_load_plugin_textdomain() {
		load_plugin_textdomain( 'di-multipurpose-demo-importer', false, DMDI_PATH . 'languages' );
	}

	// Load the init file.
	require( DMDI_PATH . 'inc/init.php' );

}
