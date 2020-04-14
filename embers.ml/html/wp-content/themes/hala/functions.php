<?php
/*-----------------------------------------------*
Define THEME
/*-----------------------------------------------*/
if (!defined('Hala_URI_PATH')) define('Hala_URI_PATH', get_template_directory_uri());
if (!defined('Hala_ABS_PATH')) define('Hala_ABS_PATH', get_template_directory());
if (!defined('Hala_URI_PATH_FR')) define('Hala_URI_PATH_FR', Hala_URI_PATH.'/framework');
if (!defined('Hala_ABS_PATH_FR')) define('Hala_ABS_PATH_FR', Hala_ABS_PATH.'/framework');
if (!defined('Hala_URI_PATH_ADMIN')) define('Hala_URI_PATH_ADMIN', Hala_URI_PATH_FR.'/admin');
if (!defined('Hala_ABS_PATH_ADMIN')) define('Hala_ABS_PATH_ADMIN', Hala_ABS_PATH_FR.'/admin');
/*-----------------------------------------------*
Register Default Fonts
/*-----------------------------------------------*/
function Hala_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'hala' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat|Raleway:400,500,700|Hind|Crimson+Text|Open+Sans|Lato:400,400Italic,600,700,700Italic,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*-----------------------------------------------*
Enqueue Style , Script
/*-----------------------------------------------*/
function hala_enqueue_scripts() {
	global $hala_options;
	wp_enqueue_style( 'hala-fonts', Hala_fonts_url(), array(), '1.0.0');
	wp_enqueue_style( 'bootstrap', Hala_URI_PATH. '/assets/css/bootstrap.min.css' , array(), '3.3.6');
	wp_enqueue_style( 'hala-plugins-fonts', Hala_URI_PATH. '/assets/css/fonts.css' , array(), '4.6.1');
	wp_enqueue_style( 'hala-plugins', Hala_URI_PATH. '/assets/css/plugins.css' , array(), '4.6.1');
	wp_enqueue_style( 'hala-core-wp', Hala_URI_PATH. '/assets/css/core.min.css', array(), '');
	wp_enqueue_style( 'hala-style-css', Hala_URI_PATH.'/assets/css/style.css', false );
	wp_enqueue_style( 'hala-wp-custom-style', Hala_URI_PATH . '/assets/css/wp_custom_style.css', false);
    /* script */
	wp_enqueue_script( 'bootstrap-js', Hala_URI_PATH.'/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'hala-plugins-js', Hala_URI_PATH.'/assets/js/plugins.js', array( 'jquery' ), '2.8.3', true );
	if(isset($hala_options["smooth_scroll"])&&$hala_options["smooth_scroll"]) {
	   wp_enqueue_script( 'smoothscroll-js', Hala_URI_PATH.'/assets/js/smoothscroll.min.js', array( 'jquery' ), '', true );
	}
	wp_enqueue_script( 'hala-custom-js', Hala_URI_PATH. '/assets/js/custom.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'hala_enqueue_scripts' );
/*-----------------------------------------------*
Framework , Theme Options
/*-----------------------------------------------*/
if( function_exists( 'hala_redux_setup' ) ) {
	hala_redux_setup( Hala_ABS_PATH_ADMIN.'/options.php' );
}
require_once (Hala_ABS_PATH_ADMIN.'/index.php');
require_once Hala_ABS_PATH_FR . '/includes.php';

/* Init Functions */
function hala_init() {
	global $hala_options;
	require_once Hala_ABS_PATH_FR.'/presets.php';
}
add_action( 'init', 'hala_init' );
/* This theme styles the visual editor to resemble the theme style */
function hala_after_setup_theme() {
	add_action( 'wp_enqueue_scripts', 'hala_enqueue_scripts', 99 );
	add_editor_style( 'framework/admin/assets/css/hala-editor.css' );
	if ( is_rtl() ) {
		add_editor_style( 'framework/admin/assets/css/hala-editor-rtl.css' );
	}
}
add_action( 'after_setup_theme', 'hala_after_setup_theme' );
/*-----------------------------------------------*
Template Functions
/*-----------------------------------------------*/
require_once Hala_ABS_PATH_FR . '/template-functions.php';
require_once Hala_ABS_PATH_FR . '/templates/post-favorite.php';
require_once Hala_ABS_PATH_FR . '/templates/post-functions.php';
/*-----------------------------------------------*
Register Sidebar
/*-----------------------------------------------*/
if (!function_exists('Hala_RegisterSidebars')) {
	function Hala_RegisterSidebars(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'hala'),
			'id' => 'hala-main-sidebar',
		    'description'   => esc_html__( 'This is default sidebar.', 'hala' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Left Sidebar', 'hala'),
			'id' => 'hala-left-sidebar',
			'description'   => esc_html__( 'This is blog left sidebar.', 'hala' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => esc_html__('Blog Right Sidebar', 'hala'),
			'id' => 'hala-right-sidebar',
			'description'   => esc_html__( 'This is blog right sidebar.', 'hala' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(4, array(
			'name' => esc_html__('Footer Widget %d', 'hala'),
			'id' => 'hala-footer-widget',
			'description'   => esc_html__( 'This is footer widget sidebar.', 'hala' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => esc_html__('Shop Right Sidebar', 'hala'),
				'id' => 'hala-shop-right-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action( 'widgets_init', 'Hala_RegisterSidebars' );
/*-----------------------------------------------*
WooCommerce
/*-----------------------------------------------*/
if (class_exists('Woocommerce')) {
    require_once Hala_ABS_PATH.'/woocommerce/wc-template-function.php';
    require_once Hala_ABS_PATH.'/woocommerce/wc-template-hooks.php';
}