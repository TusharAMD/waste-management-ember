<?php
vc_map(array(
	"name" => esc_html__("Timeline", 'hala'),
	"base" => "timeline",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon", 'hala'),
			"param_name" => "icon",
			"value" => "",
			"description" => esc_html__("Please, enter class icon in this element.", 'hala')
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'hala'),
			"param_name" => "image_icon",
			"value" => "",
			"description" => esc_html__("Select box image in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Step", 'hala'),
			"param_name" => "number_step",
			"value" => "",
			"description" => esc_html__("Please, enter number step in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'hala'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'hala')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'hala'),
			"param_name" => "content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'hala')
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