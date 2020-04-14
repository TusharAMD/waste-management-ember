<?php
if(class_exists('Woocommerce')){
	vc_map ( array (
		"name" => 'Product Carousel',
		"base" => "product_carousel",
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
					"Template 1" => "tpl1",
					"Template 2" => "tpl2",
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
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Show", 'hala' ),
					"param_name" => "show",
					"value" => array (
							"All Products" => "all_products",
							"Featured Products" => "featured",
							"On-sale Products" => "onsale",
					),
					"group" => esc_html__("Build Query", 'hala'),
					"description" => esc_html__( "Select show product type in this elment", 'hala' )
			),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Product Count", 'hala'),
                "param_name" => "number",
                "value" => "",
				"group" => esc_html__("Build Query", 'hala'),
				"description" => esc_html__('Please, enter number of post per page. Show all: -1.', 'hala')
            ),
            array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order by', 'hala' ),
				"param_name" => "orderby",
				"value" => array (
						"None" => "none",
						"Date" => "date",
						"Price" => "price",
						"Random" => "rand",
						"Selling" => "selling",
						"Rated" => "rated",
				),
				"group" => esc_html__("Build Query", 'hala'),
				"description" => esc_html__( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'hala' )
			),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order', 'hala'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
				"group" => esc_html__("Build Query", 'hala'),
                "description" => esc_html__('Order ("None", "Asc", "Desc") in this element.', 'hala')
            ),
            
		)
	));
}