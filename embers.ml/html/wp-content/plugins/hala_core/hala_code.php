<?php
/*
 * Plugin Name: hala Core
 * Plugin URI: http://motivoweb
 * Description: This is a plugin required for wordpress theme from motivoweb 
 * Version: 1.1
 * Author: motivoweb
 * Author URI: http://motivoweb
 * License: GPLv1 or later
 * Text Domain: motivoweb
 */
define( 'hala_DIR', plugin_dir_path(__FILE__) );
define( 'hala_URI', plugin_dir_url(__FILE__) );
define( 'hala_INCLUDES', hala_DIR . "_inc/" );
define( 'hala_ADMIN', hala_DIR . "admin/" );
define( 'hala_ADMIN_URI', hala_URI . "admin/" );
define( 'hala_CSS', hala_URI . "assets/css/" );
define( 'hala_JS', hala_URI . "assets/js/" );
define( 'hala_IMAGES', hala_URI . "assets/images/" );

/* Autoupdate */
/*require_once hala_INCLUDES . 'plugin-update-checker-3.1/plugin-update-checker.php';

/* include functions.php */
require hala_INCLUDES . 'functions.php';

/* include Redux Options */
require hala_DIR . 'admin/admin-init.php';

/*-----------------------------------------------*
Widgets
/*-----------------------------------------------*/
require_once hala_DIR.'widgets/abstract-widget.php';
require_once hala_DIR.'widgets/widgets.php';

/* use class hala_core */
new hala_core;

/* class hala_core */
class hala_core
{
	function __construct()
	{
		add_action( 'init', array( $this, 'hala_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_hala_core_style' ) );
	}

	function hala_init()
	{
		
	}
	
	function load_hala_core_style() {
        wp_register_style( 'hala_core_admin_css', hala_URI . '/assets/css/hala_core.admin.css', false, '1.0.0' );
        wp_enqueue_style( 'hala_core_admin_css' );

        wp_register_script( 'hala_core_admin_js', hala_URI . '/assets/js/jquery.hala_core.admin.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'hala_core_admin_js' );
		wp_localize_script( 'hala_core_admin_js', 'hala_object', array( 'ajax_url' => admin_url('admin-ajax.php') ) );
	}
}