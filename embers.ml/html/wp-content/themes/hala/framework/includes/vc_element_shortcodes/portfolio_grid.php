<?php
vc_map ( array (
	"name" => 'Portfolio grid',
	"base" => "portfolio_grid",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__( 'Extra Elements', 'hala' ), 
	"params" => array (
		array(
		"type"      => "textfield",
		"class"     => "",
		"heading"   => esc_html__("Keyword for All Projects Filter", 'hala'),
		"param_name"=> "all_filter",
		"value"     => "All",
		"description" => esc_html__("Replace the default \"All\" keyword for the initial filter with another one.", 'hala')
        ),
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Template", 'hala'),
				"param_name" => "tpl",
				"value" => array(
					"Portfolio style 1" => "grid",
					"Portfolio style 2" => "grid2",
				),
				"description" => esc_html__('Select template of posts display in this element.', 'hala')
		),
		array (
			"type" => "textfield",
			"heading" => esc_html__( 'Count', 'hala' ),
			"param_name" => "posts_per_page",
			'value' => '',
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'hala' )
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column", 'hala'),
			"param_name" => "column",
			"value" => array(
				"3 column" => "col-3",
				"4 column" => "col-4",
			),
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__('The number of column to display on portfolio page.', 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("margin", 'hala'),
			"param_name" => "margin",
			"value" => "",
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__("Please, enter value in this element. Default: 5", 'hala')
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