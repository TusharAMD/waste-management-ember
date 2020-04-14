<?php
vc_map(array(
	"name" => esc_html__("Video Fancy Box Button", 'hala'),
	"base" => "video_fancybox_button",
	"category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
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
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("description", 'hala'),
			"param_name" => "description",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'hala')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Video Link", 'hala'),
			"param_name" => "video_link",
			"value" => "",
			"description" => esc_html__("Please, enter video link in this element.", 'hala')
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