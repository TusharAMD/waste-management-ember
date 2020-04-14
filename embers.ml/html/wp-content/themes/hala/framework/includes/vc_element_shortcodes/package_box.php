<?php
vc_map ( array (
		"name" => 'Package box',
		"base" => "Package_box",
		"icon" => "tb-icon-for-vc",
		"category" => esc_html__( 'Extra Elements', 'hala' ), 
		"params" => array (
		            
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Style", 'hala'),
						"param_name" => "style",
						"value" => array(
							"Style 1" => "style1",
							"Style 2" => "style2",
						),
						"description" => esc_html__('Select style in this elment.', 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Title", 'hala'),
						"param_name" => "title",
						"value" => "",
						"description" => esc_html__("Please, enter Box Title in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("price", 'hala'),
						"param_name" => "price",
						"value" => "",
						"description" => esc_html__("Please, enter price in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("period", 'hala'),
						"param_name" => "period",
						"value" => "/ month",
						"description" => esc_html__("Please, enter period in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Icon", 'hala'),
						"param_name" => "icon",
						"value" => "",
						"description" => esc_html__("Please, enter class icon in this element.", 'hala')
					),
					array(
						"type" => "textarea_html",
						"class" => "",
						"heading" => esc_html__("Content", 'hala'),
						"param_name" => "content_package",
						"value" => "",
						"description" => esc_html__("Please, enter features in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Button Label", 'hala'),
						"param_name" => "button_Label",
						"value" => "ORDER NOW",
						"description" => esc_html__("Please, enter button Label in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Button url", 'hala'),
						"param_name" => "button_url",
						"value" => "#",
						"description" => esc_html__("Please, enter button url in this element.", 'hala')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Extra Class", 'hala'),
						"param_name" => "el_class",
						"value" => "",
						"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'hala' )
					),
		)
));