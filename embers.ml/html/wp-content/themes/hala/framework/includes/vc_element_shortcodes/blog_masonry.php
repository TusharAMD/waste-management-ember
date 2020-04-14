<?php
vc_map ( array (
		"name" => 'Blog Masonry',
		"base" => "blog_masonry",
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
								"Grid Image Middle" => "grid",
								"Grid Image Left"   => "grid2",
								"Grid Image Right"  => "grid3",
								"Grid Image with overlay" => "grid4",
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
							),
							"description" => esc_html__('Select columns display in this element.', 'hala')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show Pagination", 'hala'),
						"param_name" => "show_pagination",
						"value" => array (
							esc_html__( "Yes, please", 'hala' ) => true
						),
						"description" => esc_html__("Show or not pagination in this element.", 'hala')
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
							"taxonomy" => "category",
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
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Excerpt Length", 'hala'),
						"param_name" => "excerpt_lenght",
						"value" => "",
						"group" => esc_html__("Template", 'hala'),
						"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 38", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Excerpt More", 'hala'),
						"param_name" => "excerpt_more",
						"value" => "",
						"group" => esc_html__("Template", 'hala'),
						"description" => esc_html__("Please, Enter text excerpt more of post in this element. Default: .", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Readmore Text", 'hala'),
						"param_name" => "readmore_text",
						"value" => "",
						"group" => esc_html__("Template", 'hala'),
						"description" => esc_html__("Please, Enter text of label button readmore in this element. Default: MORE", 'hala')
					),
		)
));