<?php
vc_map(array(
	"name" => esc_html__("Image Rotate", 'hala'),
	"base" => "image_rotate",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'hala'),
			"param_name" => "image",
			"value" => "",
			"description" => esc_html__("Select box image in this element width:215px and height:215px.", 'hala')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Overlay", 'hala'),
			"param_name" => "show_overlay",
			"value" => array (
				esc_html__( "Yes, please", 'hala' ) => true
			),
			"description" => esc_html__("Show or not Overlay in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("title", 'hala'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'hala')
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