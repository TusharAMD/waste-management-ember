<?php
vc_map(array(
	"name" => esc_html__("Demo Item", 'hala'),
	"base" => "demo_item",
	"class" => "tb-demo-item",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Type", 'hala'),
			"param_name" => "type",
			"value" => array(
				"Image" => "image",
				"Gallery" => "gallery",
			),
			"description" => esc_html__('Select type in this elment.', 'hala')
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Image", 'hala'),
			"param_name" => "demo_image",
			"value" => "",
			"dependency" => array(
				"element"=>"type",
				"value"=> array('image')
			),
			"description" => esc_html__("Select image for demo item.", 'hala')
		),
		array(
			"type" => "attach_images",
			"class" => "",
			"heading" => esc_html__("Gallery", 'hala'),
			"param_name" => "demo_gallery",
			"value" => "",
			"dependency" => array(
				"element"=>"type",
				"value"=> array('gallery')
			),
			"description" => esc_html__("Select images for demo item.", 'hala')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'hala'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title for demo item.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Demo Link", 'hala'),
			"param_name" => "demo_link",
			"value" => "",
			"description" => esc_html__("Please, enter demo link for demo item.", 'hala')
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