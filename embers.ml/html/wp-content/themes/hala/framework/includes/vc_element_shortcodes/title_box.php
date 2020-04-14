<?php
vc_map(array(
	"name" => esc_html__("Title Box", 'hala'),
	"base" => "title_box",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
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
			"heading" => esc_html__("Subtitle", 'hala'),
			"param_name" => "subtitle",
			"value" => "",
			"description" => esc_html__("Please, enter subtitle in this element.", 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style Separator", 'hala'),
			"param_name" => "style_separator",
			"value" => array(
				"Style 1" => "separator",
				"Style 2" => "separator_sec",
				"Style 3" => "separator_third",
			),
			"description" => esc_html__('Select style separator in this elment.', 'hala')
		),
	)
));