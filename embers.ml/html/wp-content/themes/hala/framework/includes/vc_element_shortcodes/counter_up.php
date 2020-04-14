<?php
vc_map(array(
	"name" => esc_html__("Counter Up", 'hala'),
	"base" => "counter_up",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
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
			"description" => esc_html__("Please, enter title in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon", 'hala'),
			"param_name" => "icon",
			"value" => "",
			"dependency" => array(
				"element"=>"style",
				"value"=> array('style2')
			),
			"description" => esc_html__("Please, enter class icon in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Number", 'hala'),
			"param_name" => "number",
			"value" => "",
			"description" => esc_html__("Please, enter number in this element.", 'hala')
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