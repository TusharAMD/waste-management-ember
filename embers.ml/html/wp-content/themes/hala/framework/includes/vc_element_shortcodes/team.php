<?php
vc_map ( array (
	"name" => 'Team',
	"base" => "team",
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
				"Template 3" => "tpl3",
			),
			"description" => esc_html__('Select template of posts display in this element.', 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Columns", 'hala'),
			"param_name" => "columns",
			"value" => array(
				"4 Columns" => "4",
				"3 Columns" => "3",
				"2 Columns" => "2",
				"1 Column" => "1",
			),
			"description" => esc_html__('Select columns display in this element.', 'hala')
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
			"taxonomy" => "team-type",
			"heading" => esc_html__( "Categories", 'hala' ),
			"param_name" => "category",
			"group" => esc_html__("Build Query", 'hala'),
			"description" => esc_html__( "Note: By default, all your team will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'hala' )
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