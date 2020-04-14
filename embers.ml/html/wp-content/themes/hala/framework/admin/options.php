<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
	/* Add Stylesheet And Script Backend */
	function Hala_custom_admin_scripts(){
		wp_enqueue_script( 'action', Hala_URI_PATH_ADMIN.'/assets/js/action.js', array('jquery'), '', true  );
		wp_enqueue_style( 'style_admin', Hala_URI_PATH_ADMIN.'/assets/css/style_admin.css', false );
	}
	add_action( 'admin_enqueue_scripts', 'Hala_custom_admin_scripts');

    // This is your option name where all the Redux data is stored.
    $opt_name = "hala_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists(  get_template_directory() . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( get_template_directory(). '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
   
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'hala' ),
        'page_title'           => esc_html__( 'Theme Options', 'hala' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'hala' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'hala' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'hala' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'hala' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'hala' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
	 
	// -> START General
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'hala' ),
		'icon'   => 'el-icon-cogs',
		'desc'   => esc_html__( '', 'hala' ),
		'fields' => array(
			array(
                'id'       => 'body_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Layout', 'hala' ),
                'subtitle' => esc_html__( 'Body layout with wide or boxed.', 'hala' ),
                'options'  => array(
                    'wide' => 'Wide',
                    'boxed' => 'Boxed'
                ),
                'default'  => 'wide'
            ),
			array(
				'id'       => 'page_loader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Loader', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable page loader.', 'hala' ),
				'default'  => true,
			),
			array(
				'id'       => 'smooth_scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Smooth Scroll', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable smooth scroll.', 'hala' ),
				'default'  => false,
			),
		)
	) );
	
	// -> START Color
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Color', 'hala' ),
        'id'     => 'color',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-brush',
		'fields' => array(
			
			
			 array(
				'id'       => 'th_theme_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme style', 'hala' ),
				'desc'     => esc_html__( 'Choose a style for your theme.', 'hala' ),
				'options'  => array( 'white' => 'White', 'dark' => 'dark'),
				'default'  => 'white',
			),
			array(
				'id'       => 'th_select_stylesheet',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Stylesheet', 'hala' ),
				'subtitle' => esc_html__( 'Select your themes alternative color scheme.', 'hala' ),
				'options'  => array(
					  'blue.css'    => 'Blue',
					  'green.css'   => 'Green', 
					  'dark_blue.css'  => 'Dark Blue', 
					  'purple.css'  => 'Purple',
					  'gold.css'    => 'Gold & Black', 
					  'black.css'   => 'Black', 
				  ),
				'default'  => 'purple.css',
			),
			array(
				'id'       => 'body_background',
				'type'     => 'background',
				'title'    => esc_html__('Body Background', 'hala'),
				'subtitle' => esc_html__('Body background with image, color, etc.', 'hala'),
				'output'      => array('body'),
			),
			array(
				'id'       => 'th_primary_color',
				'type'     => 'color',
				'title'    => esc_html__('primary color', 'hala'),
				'subtitle' => esc_html__('Controls primary color items, ex: link hovers, highlights, and more. (default: #8657DB).', 'hala'),
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'th_secondary_color',
				'type'     => 'color',
				'title'    => esc_html__('secondary color', 'hala'),
				'subtitle' => esc_html__('Controls secondary color items, ex: link hovers, highlights, and more. (default: #2969B0).', 'hala'),
				'default'  => '',
				'validate' => 'color',
			),
		)
    ) );
	
	// -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'hala' ),
        'id'     => 'typography',
		'desc'   => esc_html__( '', 'hala' ),
		'icon'   => 'el el-font',
        'fields' => array(
            array(
				'id'          => 'body_font',
				'type'        => 'typography', 
				'title'       => esc_html__('Body Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#7e7e7e', 
					'font-weight'  => '400', 
					'font-family' => 'Open Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '23px',
					'letter-spacing' => '0'
				),
			),
			array(
				'id'          => 'h1_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H1 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h1'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '32px', 
					'line-height' => '42px',
					'letter-spacing' => '0.5px'
				),
			),
			array(
				'id'          => 'h2_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H2 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '24px', 
					'line-height' => '36px',
					'letter-spacing' => '0.5px'
				),
			),
			array(
				'id'          => 'h3_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H3 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h3'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '18px', 
					'line-height' => '28px',
					'letter-spacing' => '0.5px'
				),
			),
			array(
				'id'          => 'h4_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H4 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h4'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '18px',
					'letter-spacing' => '0.5px'
				),
			),
			array(
				'id'          => 'h5_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H5 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h5'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '16px',
					'letter-spacing' => '0.5px'
				),
			),
			array(
				'id'          => 'h6_font',
				'type'        => 'typography', 
				'title'       => esc_html__('H6 Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('h6'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#282828', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '12px', 
					'line-height' => '13px',
					'letter-spacing' => '0.5px'
				),
			),
			
        )
    ) );
	
	// -> START Logo
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'hala' ),
        'id'     => 'logo',
		'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-icon-viadeo',
		'fields' => array(
			array(
				'id'       => 'tb_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__('Logo', 'hala'),
				'subtitle' => esc_html__('Select an image file for your logo.', 'hala'),
				'default'  => array('url'	=> Hala_URI_PATH.'/assets/images/logo.png'),
			),
		   array(
				'subtitle' => esc_html__('in pixels.', 'hala'),
				'id' => 'logo_height',
				'title' => 'Logo Height',
				'type' => 'dimensions',
			    'units' => array('px'),
				'width' => false,
				'output' => array('.mo-logo img , .logo img'),
				'default' => array(
				   'height' => '47px',
				)
			),
			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Custom favicon', 'hala' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Upload a 16px x 16px png/ico image that will represent your website\'s favicon', 'hala' ),
				'default'  => array( 'url' => Hala_URI_PATH.'/assets/images/favicon.ico' ),
			),
			
		)
    ) );
	
	// -> START Header
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'hala' ),
        'id'     => 'header',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Header Layout', 'hala'),
				'subtitle' => esc_html__('Select header layout in your site.', 'hala'),
				'options'  => array(
					'header-v1'	=> array(
						'alt'   => 'Header V1',
						'img'   => Hala_URI_PATH.'/assets/images/headers/header-v1.jpg'
					),
					'header-v2'	=> array(
						'alt'   => 'Header V2',
						'img'   => Hala_URI_PATH.'/assets/images/headers/header-v2.jpg'
					),
					'header-v3'	=> array(
						'alt'   => 'Header V3',
						'img'   => Hala_URI_PATH.'/assets/images/headers/header-v3.jpg'
					),
					'header-v4'	=> array(
						'alt'   => 'Header V4',
						'img'   => Hala_URI_PATH.'/assets/images/headers/header-v4.jpg'
					),
				),
				'default' => 'header-v4'
			),
		)
    ) );
	
		// -> START Main Menu
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'hala' ),
        'id'     => 'main_menu',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-icon-list',
    ) );
	
	// -> START Main Menu Header V1
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V1', 'hala' ),
        'id'     => 'main_menu_v1',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v1',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'hala' ),
				'default'  => true,
			),
			array(
				'id'          => 'menu_first_level',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.cd-nav li.cd-selected a, .cd-nav li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#333333', 
					'font-weight'  => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '16px',
					'letter-spacing' => '1.28px'
				),
			),
			
			array(
				'id'       => 'bg_main_menu_v1',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'hala'),
				'default'  => array(
					'background-color' => '#f8f8f8',
				),
				'output'   => array('.mo-header-v1 .mo-header-menu , .cd-nav-container'),
			),
			array(
				'id'       => 'switch_social_v1',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable social icons on nav bar', 'hala' ),
				'desc'     => esc_html__( 'It\'s work only if is enabled canvas menu style', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
			array(
				'id' => 'facebook_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Facebook URL', 'hala' ),
				'desc' => esc_html__('Your Facebook URL', 'hala' ),
			),
			array(
				'id' => 'twitter_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Twitter URL', 'hala' ),
				'desc' => esc_html__('Your Twitter URL', 'hala' ),
			),
			array(
				'id' => 'linkedin_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Linkedin URL', 'hala' ),
				'desc' => esc_html__('Your Linkedin URL', 'hala' ),
			),
			array(
				'id' => 'googleplus_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Googleplus URL', 'hala' ),
				'desc' => esc_html__('Your Googleplus URL', 'hala' ),
			),
			array(
				'id' => 'youtube_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Youtube URL', 'hala' ),
				'desc' => esc_html__('Your Youtube URL', 'hala' ),
			),
			array(
				'id' => 'instagram_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Instagram URL', 'hala' ),
				'desc' => esc_html__('Your Instagram URL', 'hala' ),
			),
			array(
				'id' => 'pinterest_url_v1',
				'type' => 'text',
				'required' => array( 'switch_social_v1', '=', '1' ),
				'title' => esc_html__('Pinterest URL', 'hala' ),
				'desc' => esc_html__('Your Pinterest URL', 'hala' ),
			),
			
		)
    ) );
	
	// -> START Main Menu Header V2
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V2', 'hala' ),
        'id'     => 'main_menu_v2',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v2 .mo-menu-list > ul > li > a , .mo-header-v2 .mo-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#3c3c3c',
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '90px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('Stick First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-stick-active .mo-header-v2 .mo-menu-list > ul > li > a, .mo-stick-active .mo-header-v2 .mo-header-menu .mo_widget_mini_cart .mo-cart-header > a, .mo-stick-active .mo-header-v2 .mo-header-menu .mo-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#333333', 
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v2','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v2',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#232323', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.mo-header-v2 .mo-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v2',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v2 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v2',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.mo-stick-active .mo-header-v2.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v2','=', true),
			),
		   array(
				'id'       => 'cart_header_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable cart header', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		   array(
				'id'       => 'search_header_v2',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable search header', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		)
    ) );
	
	// -> START Main Menu Header V3
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V3', 'hala' ),
        'id'     => 'main_menu_v3',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v3',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v3',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v3 .mo-menu-list > ul > li > a '),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '50px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('Stick First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-stick-active .mo-header-v3 .mo-menu-list > ul > li > a, .mo-stick-active .mo-header-v3 .mo-header-menu .mo_widget_mini_cart .mo-cart-header > a, .mo-stick-active .mo-header-v3 .mo-header-menu .mo-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#333333', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v3','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v3',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-weight'  => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'hala'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v3 .mo-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v3',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v3 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v3',
				'type'     => 'background',
				'title'    => esc_html__('Stick Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.mo-stick-active .mo-header-v3.mo-header-stick .mo-header-menu'),
				'required' => array('stick_main_menu_v3','=', true),
			),
		)
    ) );
	// -> START Main Menu Header V4
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Menu Header V4', 'hala' ),
        'id'     => 'main_menu_v4',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable fixed menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Stick Menu', 'hala' ),
				'subtitle' => esc_html__( 'Enable/Disable stick menu.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-header-v4 .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#fff',
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '60px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('Stick First Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.mo-stick-active .mo-header-v4 .mo-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#fff', 
					'font-weight' => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '60px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v4','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v4',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Level Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a ,
										.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > a,
										.mo-header-v4  .sub-menu > li > a , .mo-header-v2 .sub-menu > li > a '),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#7e7e7e', 
					'font-weight'  => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v4',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: transparent.', 'hala'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.mo-header-v4 .mo-header-menu , .mo-header-v4 .mo-header-top.t_motivo'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v4',
				'type'     => 'background',
				'title'    => esc_html__('Background Sub Level', 'hala'),
				'subtitle' => esc_html__('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'hala'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('
									.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.mo-header-v4 .mo-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
            array(
				'id' => 'contact_info_v4',
				'type' => 'text',
				'title' => esc_html__('Contact Info', 'hala' ),
				'desc' => esc_html__('This content will display if you have "Contact Info".', 'hala' ),
			),
		   array(
				'id'       => 'cart_header_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable cart header', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
		   array(
				'id'       => 'search_header_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable search header', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
			array(
				'id'       => 'switch_social_v4',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable or disable social icons on nav bar', 'hala' ),
				'desc'     => esc_html__( 'It\'s work only if is enabled canvas menu style', 'hala' ),
				'default'  => 1,
				'on'       => 'Enable',
				'off'      => 'Disable',
			),
			array(
				'id' => 'facebook_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Facebook URL', 'hala' ),
				'desc' => esc_html__('Your Facebook URL', 'hala' ),
			),
			array(
				'id' => 'twitter_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Twitter URL', 'hala' ),
				'desc' => esc_html__('Your Twitter URL', 'hala' ),
			),
			array(
				'id' => 'linkedin_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Linkedin URL', 'hala' ),
				'desc' => esc_html__('Your Linkedin URL', 'hala' ),
			),
			array(
				'id' => 'googleplus_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Googleplus URL', 'hala' ),
				'desc' => esc_html__('Your Googleplus URL', 'hala' ),
			),
			array(
				'id' => 'youtube_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Youtube URL', 'hala' ),
				'desc' => esc_html__('Your Youtube URL', 'hala' ),
			),
			array(
				'id' => 'instagram_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Instagram URL', 'hala' ),
				'desc' => esc_html__('Your Instagram URL', 'hala' ),
			),
			array(
				'id' => 'pinterest_url_v4',
				'type' => 'text',
				'required' => array( 'switch_social_v4', '=', '1' ),
				'title' => esc_html__('Pinterest URL', 'hala' ),
				'desc' => esc_html__('Your Pinterest URL', 'hala' ),
			),


		)
    ) );
	
	// -> START Footer
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'hala' ),
        'id'     => 'footer',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'tb_footer_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Footer Layout', 'hala'),
				'subtitle' => esc_html__('Select footer layout in your site.', 'hala'),
				'options'  => array(
					'footer-v1'	=> array(
						'alt'   => 'Footer V1',
						'img'   => Hala_URI_PATH.'/assets/images/footers/footer_v1.jpg'
					),
					'footer-v2'	=> array(
						'alt'   => 'Footer V2',
						'img'   => Hala_URI_PATH.'/assets/images/footers/footer_v2.jpg'
					),
					'footer-v3'	=> array(
						'alt'   => 'Footer V3',
						'img'   => Hala_URI_PATH.'/assets/images/footers/footer_v3.jpg'
					),
				),
				'default' => 'footer-v1'
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V1', 'hala' ),
        'id'     => 'footer_v1',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_margin',
				'title' => esc_html__('Footer Margin', 'hala'),
				'subtitle' => esc_html__('Please, Enter margin.', 'hala'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'margin-top'     => '48px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_padding',
				'title' => esc_html__('Footer Padding', 'hala'),
				'subtitle' => esc_html__('Please, Enter padding.', 'hala'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v1'),
				'default' => array(
					'padding-top'     => '100px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '100px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'    => array('.footer_v1 , .footer_v1 select  , .footer_v1 select option'), 
				'default'  => array(
					'background-color' => '#000',
				)
			),
			array(
				'id'          => 'tb_footer_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 .wg-title , .footer_v1 a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#f8f8f8',
					'font-weight'  => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '',
					'letter-spacing' => ''
				),
			),
			array(
				'id'          => 'tb_footer_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v1 , .footer_v1 p , .footer_v1 a , .footer_v1 h5 , .footer_v1 h6 , .footer_v1 span , .footer_v1 select , .footer_v1 select option , .footer_v1 td, .footer_v1 th , .footer_v1 a:before'),
				'units'       =>'px',
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#f8f8f8',
					'font-weight'  => '400', 
					'font-family' => 'Open Sans', 
					'google'      => true,
					'font-size'   => '14px', 
				),
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V2', 'hala' ),
        'id'     => 'footer_v2',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'tb_footer_v2_margin',
				'title' => esc_html__('Footer Margin', 'hala'),
				'subtitle' => esc_html__('Please, Enter margin.', 'hala'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v2'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v2_padding',
				'title' => esc_html__('Footer Columns Padding', 'hala'),
				'subtitle' => esc_html__('Please, Enter padding.', 'hala'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v2'),
				'default' => array(
					'padding-top'     => '50px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '50px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v2_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'    => array('.footer_v2 , .footer_v2 select  , .footer_v2 select option'), 
				'default'  => array(
					'background-color' => '#000',
				)
			),
			array(
				'id'          => 'tb_footer_v2_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#f8f8f8',
					'font-weight'  => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '16px',
					'letter-spacing' => ''
				),
			),
			array(
				'id'          => 'tb_footer_v2_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v2 , .footer_v2 p , .footer_v2 a , .footer_v2 h5 , .footer_v2 h6 , .footer_v2 span , .footer_v2 select , .footer_v2 select option , .footer_v2 td, .footer_v2 th , .footer_v1 a:before'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#909090',
					'font-weight' => '400', 
					'font-family' => 'Open Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '',
					'letter-spacing' => ''
				),
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer V3', 'hala' ),
        'id'     => 'footer_v3',
        'desc'   => esc_html__( '', 'hala' ),
        'subsection' => true,
		'fields' => array(
		    array(
				'id'             => 'tb_footer_v3_height',
				'type'           => 'dimensions',
				'output'         => array('.footer_v3 .footer-widget-1, .footer_v3 .footer-widget-2, .footer_v3 .footer-widget-3'),
				'width'          => false,
                'height'         => true,
				'units'          => array('em','px'),
				'title'    => esc_html__('Dimensions (Height) Option', 'hala'),
				'subtitle' => esc_html__('Allow your users to choose height, and/or unit.', 'hala'),
				'default'  => array(
					'height'  => '250',
					'units'   => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v3_margin',
				'title' => esc_html__('Footer Margin', 'hala'),
				'subtitle' => esc_html__('Please, Enter margin.', 'hala'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.footer_v3'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'tb_footer_v3_padding',
				'title' => esc_html__('Footer Columns Padding', 'hala'),
				'subtitle' => esc_html__('Please, Enter padding.', 'hala'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.footer_v3'),
				'default' => array(
					'padding-top'     => '0px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '0px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'tb_footer_v3_backgroud',
				'type'     => 'background',
				'title'    => esc_html__('Footer Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'    => array('.footer_v3 , .footer_v3 select  , .footer_v3 select option'), 
				'default'  => array(
					'background-color' => '#000',
				)
			),
			array(
				'id'          => 'tb_footer_v3_title_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options title', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 .wg-title'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#f8f8f8',
					'font-weight'  => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '16px',
					'letter-spacing' => ''
				),
			),
			array(
				'id'          => 'tb_footer_v3_typography',
				'type'        => 'typography', 
				'title'       => esc_html__('Font Options', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.footer_v3 , .footer_v3 p , .footer_v3 a , .footer_v3 h5 , .footer_v3 h6 , .footer_v3 span , .footer_v3 select , .footer_v3 select option , .footer_v3 td, .footer_v3 th , .footer_v3 a:before'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#909090',
					'font-weight' => '400', 
					'font-family' => 'Open Sans', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '',
					'letter-spacing' => ''
				),
			),

		)
    ) );
	/*-----------------------------------------------*
    START Title Bar
    /*-----------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Title Bar', 'hala' ),
        'id'     => 'title_bar',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array(
				'id'             => 'title_bar_height',
				'type'           => 'dimensions',
				'output'         => array('.page-header .mo-title-bar-wrap, .skew-section.page-header'),
				'width'          => false,
                'height'         => true,
				'units'          => array('em','px'),
				'title'    => esc_html__('Dimensions (Height) Option', 'hala'),
				'subtitle' => esc_html__('Allow your users to choose height, and/or unit.', 'hala'),
				'default'  => array(
					'height'  => '700',
					'units'   => 'px', 
				)
			),
		array(
				'id'             => 'title_bar_padding',
				'type'           => 'spacing',
				'output'         => array('.page-header .mo-title-bar'),
				'mode'           => 'padding',
				'units'          => array('em', 'px'),
				'title'    => esc_html__('Padding', 'hala'),
				'subtitle' => esc_html__('Please, Enter padding of title bar.', 'hala'),
				'default'             => array(
					'padding-top'     => '160px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '0px', 
					'padding-left'    => '0px',
					'units'           => 'px', 
				)
			),
			array(
				'id'       => 'tb_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'         => array('.page-header .mo-title-bar-wrap'),
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => Hala_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array(
				'id'       => 'tb_title_bar_bg_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Canvas Style', 'hala' ),
				'subtitle' => esc_html__( 'Select your title bar canvas style.', 'hala' ),
				'options'  => array(
				      'none'  => 'none',
					  'snow'    => 'snow',
					  'particles'   => 'particles', 
					  'animator'  => 'animator', 
				  ),
				'default'  => 'none',
			),
			array( 
				'id'       => 'tb_show_page_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show show page title', 'hala' ),
				'subtitle' => esc_html__( 'Show or not show page title.', 'hala' ),
				'default'  => true,
			),
			array( 
				'id'       => 'tb_show_page_breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show show page breadcrumb', 'hala' ),
				'subtitle' => esc_html__( 'Show or not show page breadcrumb.', 'hala' ),
				'default'  => true,
			),
			array(
				'id'          => 'title_bar_heading',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Heading', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h2'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#ffffff', 
					'font-weight' => '700', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '39px', 
					'line-height' => '45px',
					'letter-spacing' => '1px'
				),
			),
			array(
				'id'          => 'title_bar_path',
				'type'        => 'typography', 
				'title'       => esc_html__('Title Bar Path', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar .mo-path, .page-header .mo-title-bar .mo-path a ,  .woocommerce .mo-page-title-shop, .woocommerce .mo-page-title-shop a'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#ffffff', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '24px',
					'letter-spacing' => '0.64px'
				),
			),
		   	array(
				'id'       => 'title_bar_subtext',
				'type'     => 'text',
				'title'    => esc_html__('Sub Text', 'hala'),
				'subtitle' => esc_html__('Please, Enter sub text of title bar.', 'hala'),
				'default'  => ''
			),
			array(
				'id'          => 'title_bar_subtext_format',
				'type'        => 'typography', 
				'title'       => esc_html__('Sub Text Format', 'hala'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.page-header .mo-title-bar h6'),
				'units'       =>'px',
				'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'hala'),
				'default'     => array(
					'color'       => '#ffffff', 
					'font-weight'  => '400', 
					'font-family' => 'Raleway', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '24px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'       => 'page_breadcrumb_delimiter',
				'type'     => 'text',
				'title'    => esc_html__('Delimiter', 'hala'),
				'subtitle' => esc_html__('Please, Enter Delimiter of page breadcrumb in title bar.', 'hala'),
				'default'  => '-'
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Post', 'hala' ),
        'id'     => 'post_titlebar',
        'desc'   => esc_html__( '', 'hala' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'tb_blog_post_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Archive Titlebar Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'   => array('.archive .mo-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => Hala_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array(
				'id'       => 'tb_post_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Post Titlebar Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'    => array('.single .mo-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => Hala_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
		)
		
    ) );
	// -> START Product Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Product', 'hala' ),
        'id'     => 'product_titlebar',
        'desc'   => esc_html__( '', 'hala' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'tb_product_title_bar_bg',
				'type'     => 'background',
				'title'    => esc_html__('Shop Titlebar Background', 'hala'),
				'subtitle' => esc_html__('background with image, color, etc.', 'hala'),
				'output'    => array('.single-product .mo-title-bar-wrap , .woocommerce-page .mo-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => Hala_URI_PATH.'/assets/images/bg-titlebar-shop.jpg',
				)
			),
		)
    ) );
	// -> START Blog Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog', 'hala' ),
        'id'     => 'blog',
		'desc'   => esc_html__( '', 'hala' ),
		'icon'   => 'el el-icon-file-edit',
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Archive Post', 'hala' ),
        'id'     => 'archive_post',
		'subsection' => true,
        'desc'   => esc_html__( '', 'hala' ),
		'fields' => array(
			array( 
				'id'       => 'tb_blog_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'hala'),
				'subtitle' => esc_html__('Select layout of blog.', 'hala'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => Hala_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => Hala_URI_PATH_ADMIN.'/assets/images/2cr.png'
							)
				),
				'default' => '2cr'
			),
			array(
				'id'       => 'tb_blog_content_col',
				'type'     => 'text',
				'title'    => esc_html__('Content Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-8 col-lg-8 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-8 col-lg-8'
			),
			array(
				'id'       => 'tb_blog_left_sidebar_col',
				'type'     => 'text',
				'title'    => esc_html__('Sidebar Left Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-4 col-lg-4 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-4 col-lg-4',
				'required' => array('tb_blog_layout','=', '2cl')
			),
			array(
				'id'       => 'tb_blog_right_siedebar_col',
				'type'     => 'text',
				'title'    => esc_html__('Sidebar Right Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-4 col-lg-4 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-4 col-lg-4',
				'required' => array('tb_blog_layout','=', '2cr')
			),
			array(
				'id'       => 'tb_blog_post_readmore_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Read More Text', 'hala' ),
				'subtitle' => esc_html__( 'Enter text of label button read more in blog.', 'hala' ),
				'default'  => 'MORE',
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Single Post', 'hala' ),
        'id'     => 'single_post',
        'desc'   => esc_html__( '', 'hala' ),
		'subsection' => true,
		'fields' => array(
			array( 
				'id'       => 'tb_post_layout',
				'type'     => 'image_select',
				'title'    => esc_html__('Select Layout', 'hala'),
				'subtitle' => esc_html__('Select layout of single blog.', 'hala'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => Hala_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => Hala_URI_PATH_ADMIN.'/assets/images/2cr.png'
							)
				),
				'default' => '2cr'
			),
			array(
				'id'       => 'tb_post_content_col',
				'type'     => 'text',
				'title'    => esc_html__('Content Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-8 col-lg-8 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-8 col-lg-8',
			),
			array(
				'id'       => 'tb_post_left_sidebar_col',
				'type'     => 'text',
				'title'    => esc_html__('Left Sidebar Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-12 col-md-4 col-lg-4 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-4 col-lg-4',
				'required' => array('tb_post_layout','=', '2cl')
			),
			array(
				'id'       => 'tb_post_right_siedebar_col',
				'type'     => 'text',
				'title'    => esc_html__('Right Sidebar Column', 'hala'),
				'subtitle' => esc_html__('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-4 col-lg-4 el-class.', 'hala'),
				'default'  => 'col-xs-12 col-sm-12 col-md-4 col-lg-4',
				'required' => array('tb_post_layout','=', '2cr')
			),
			array( 
				'id'       => 'tb_post_show_post_share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show share', 'hala' ),
				'subtitle' => esc_html__( 'Show or not post share on your blog.', 'hala' ),
				'default'  => true,
			),
			array( 
				'id'       => 'tb_post_show_post_nav',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation', 'hala' ),
				'subtitle' => esc_html__( 'Show or not post navigation on your single blog.', 'hala' ),
				'default'  => true,
			),
			array(
				'id'       => 'tb_post_show_post_author',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author', 'hala' ),
				'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'hala' ),
				'default'  => false,
			),
			array(
				'id'       => 'tb_post_show_post_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comment', 'hala' ),
				'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'hala' ),
				'default'  => true,
			),
		)
		
    ) );
	
	// -> START Page
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page', 'hala' ),
        'id'     => 'page',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-pencil',
		'fields' => array(
			array(
				'id'       => 'page_comment',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comment', 'hala' ),
				'subtitle' => esc_html__( 'Show or not page comment on your page.', 'hala' ),
				'default'  => true,
			)
		)
		
    ) );
	
	// -> START Custom CSS
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Custom CSS', 'hala' ),
        'id'     => 'custom_css',
        'desc'   => esc_html__( '', 'hala' ),
        'icon'   => 'el el-icon-css',
		'fields' => array(
			array(
				'id'       => 'custom_css_code',
				'type'     => 'ace_editor',
				'title'    => esc_html__('Custom CSS Code', 'hala'),
				'subtitle' => esc_html__('Quickly add some CSS to your theme by adding it to this block.', 'hala'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default'  => ''
			)
		)
    ) );
	
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'hala' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'hala' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }