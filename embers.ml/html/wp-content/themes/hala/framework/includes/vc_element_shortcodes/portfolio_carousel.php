<?php
vc_map ( array (
	"name" => 'Portfolio Carousel',
	"base" => "portfolio_carousel",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__( 'Extra Elements', 'hala' ), 
	'admin_enqueue_js' => array(Hala_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template", 'hala'),
				"param_name" => "tpl",
				"value" => array(
					"Portfolio style 1" => "tpl1",
					"Portfolio style 2" => "tpl2",
				),
				"description" => esc_html__('Select template of posts display in this element.', 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Large devices", 'hala'),
			"param_name" => "col_lg",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 4", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Medium devices", 'hala'),
			"param_name" => "col_md",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 3", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Small devices", 'hala'),
			"param_name" => "col_sm",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 2", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns Extra small devices", 'hala'),
			"param_name" => "col_xs",
			"value" => "",
			"description" => esc_html__("Please, enter number Columns Extra small devices Phones (<768px) in this element. Default: 1", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Item Space", 'hala'),
			"param_name" => "item_space",
			"value" => "",
			"description" => esc_html__("Please, enter number space between items in this element. Default: 30", 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Loop", 'hala'),
			"param_name" => "loop",
			"value" => array(
				"Enable" => "true",
				"Disable" => "false",
			),
			"description" => esc_html__('Inifnity loop. Duplicate last and first items to get loop illusion.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("autoplay", 'hala'),
			"param_name" => "autoplay",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Autoplay.', 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("SmartSpeed", 'hala'),
			"param_name" => "smartspeed",
			"value" => "",
			"description" => esc_html__("Please, enter number smartSpeed(Speed Calculate. More info to come..) in this element. Default: 500", 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav", 'hala'),
			"param_name" => "nav",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show next/prev buttons.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav Position", 'hala'),
			"param_name" => "nav_position",
			"value" => array(
				"Middle" => "nav-middle",
				"Top" => "nav-top",
				"Bottom" => "nav-bottom",
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			),
			"description" => esc_html__('Select position next/prev buttons.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Nav Direction Position", 'hala'),
			"param_name" => "nav_dir_position",
			"value" => array(
				"center" => "nav-center",
				"right" => "nav-right",
				"left" => "nav-left",
			),
			"dependency" => array(
				"element"=>"nav",
				"value"=> "true"
			),
			"description" => esc_html__('Select direction position next/prev buttons.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots", 'hala'),
			"param_name" => "dots",
			"value" => array(
				"Disable" => "false",
				"Enable" => "true",
			),
			"description" => esc_html__('Show dots navigation.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots Position", 'hala'),
			"param_name" => "dots_position",
			"value" => array(
				"Top" => "dots-top",
				"Bottom" => "dots-bottom",
			),
			"dependency" => array(
				"element"=>"dots",
				"value"=> "true"
			),
			"description" => esc_html__('Select position dots navigation.', 'hala')
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots Direction Position", 'hala'),
			"param_name" => "dots_dir_position",
			"value" => array(
				"center" => "dots-center",
				"Right" => "dots-right",
				"Left" => "dots-left",
			),
			"dependency" => array(
				"element"=>"dots",
				"value"=> "true"
			),
			"description" => esc_html__('Select direction position dots navigation.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Dots and Nav Color", 'hala'),
			"param_name" => "dots_nav_color",
			"value" => array(
				"light" => "dots-nav-light",
				"dark" => "dots-nav-dark",
			),
			"description" => esc_html__('Select color dots and nav.', 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'hala'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'hala' )
		),
		array (
			"type" => "mo_taxonomy",
			"taxonomy" => "portfolio_category",
			"heading" => esc_html__( "Categories", 'hala' ),
			"param_name" => "category",
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( "Note: By default, all your projects will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'hala' )
		),
		array (
			"type" => "textfield",
			"heading" => esc_html__( 'Count', 'hala' ),
			"param_name" => "posts_per_page",
			'value' => '',
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'hala' )
		),
		array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Order by', 'hala' ),
			"param_name" => "orderby",
			"value" => array (
					"None" => "none",
					"Title" => "title",
					"Date" => "date",
					"ID" => "ID"
			),
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'hala' )
		),
		array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Order', 'hala' ),
			"param_name" => "order",
			"value" => Array (
					"None" => "none",
					"ASC" => "ASC",
					"DESC" => "DESC"
			),
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'hala' )
		),
	)
));