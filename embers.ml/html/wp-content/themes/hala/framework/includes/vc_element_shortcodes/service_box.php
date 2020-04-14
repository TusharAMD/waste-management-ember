<?php
vc_map(array(
	"name" => esc_html__("Service Box", 'hala'),
	"base" => "service_box",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'hala'),
			"param_name" => "style",
			"value" => array(
				"Style Icon 1" => "style1",
				"Style Icon 2" => "style2",
				"Style Icon 3" => "style3",
				"Style Icon 4" => "style4",
				"Style Icon 5" => "style5",
			),
			"description" => esc_html__('Select style in this elment.', 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon", 'hala'),
			"param_name" => "icon",
			"value" => "",
			"dependency" => array(
				"element"=>"style",
				"value"=> array('style1', 'style2' , 'style3' )
			),
			"description" => esc_html__("Please, enter class icon in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number Step", 'hala'),
			"param_name" => "number_step",
			"value" => "",
			"dependency" => array(
				"element"=>"style",
				"value"=> array('style4')
			),
			"description" => esc_html__("Please, enter number step in this element.", 'hala')
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'hala'),
			"param_name" => "image_icon",
			"value" => "",
			"dependency" => array(
				"element"=>"style",
				"value"=> array('style5')
			),
			"description" => esc_html__("Select box image in this element.", 'hala')
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