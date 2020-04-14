<?php
vc_map ( array (
	"name" => 'Heading Box',
	"base" => "heading_box",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__( 'Extra Elements', 'hala' ), 
	"params" => array (
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Use video background?', 'hala' ),
			'param_name' => 'video_bg',
			'description' => esc_html__( 'If checked, video will be used as row background.', 'hala' ),
			'value' => array( esc_html__( 'Yes', 'hala' ) => 'yes' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'YouTube link', 'hala' ),
			'param_name' => 'video_url',
			'value' => 'https://youtu.be/hpeYWdkUtcE',
			// default video url
			'description' => esc_html__( 'Add YouTube link.', 'hala' ),
			'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Parallax', 'hala' ),
			'param_name' => 'parallax',
			'value' => array(
				esc_html__( 'None', 'hala' ) => '',
				esc_html__( 'Parallax', 'hala' ) => 'content-moving'
			),
			'description' => esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'hala' ),
			'dependency' => array(
				'element' => 'video_bg',
				'is_empty' => true,
			),
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'hala' ),
			'param_name' => 'parallax_image',
			'value' => '',
			'description' => esc_html__( 'Select image from media library.', 'hala' ),
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Parallax speed', 'hala' ),
			'param_name' => 'parallax_speed_bg',
			'value' => '1.5',
			'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'hala' ),
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true,
		    ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Static Text Line', 'hala' ),
			'param_name' => 'text_static',
			"value"	=> '',
			'description' => esc_html__( 'Static Headline Text', 'hala' )
		),
		
		array(
			'type' => 'exploded_textarea',
			'heading' => esc_html__( 'animation Text Lines', 'hala' ),
			'param_name' => 'text_animation',
			"value"	=> '',
			'description' => esc_html__( 'animation Text Lines are displayed one after another as slides. Separate each line with linebreaks (Enter)', 'hala' )
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'animation Type', 'hala' ),
			'param_name' => 'type_animation',
			'value' => array(
				esc_html__( 'clip', 'hala' ) => 'clip is-full-width',
				esc_html__( 'slide', 'hala' ) => 'slide',
				esc_html__( 'zoom', 'hala' ) => 'zoom',
				esc_html__( 'push', 'hala' ) => 'push',	
				esc_html__( 'letters type', 'hala' ) => 'letters type',
				esc_html__( 'loading-bar', 'hala' ) => 'loading-bar',
			),
			'description' => esc_html__( '', 'hala' ),
			'dependency' => array(
				'element' => 'text_animation',
				'not_empty' => true,
			),
		),
		
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Content Text Lines", 'hala'),
			"param_name" => "text_content",
			"value" => "",
			"description" => esc_html__("Content Text Lines are displayed one in slides.", 'hala')
		),
		array(
			"type" => "textfield",	       
			"heading" => esc_html__("Button Label", 'hala'),
			"param_name" => "button1_label",
			"description" => esc_html__("button label", 'hala'),
			"value" => "Register Now"
		),
		array(
			"type" => "textfield",	       
			"heading" => esc_html__("Button URL", 'hala'),
			"param_name" => "button1_url",
			"description" => esc_html__("button URL.", 'hala'),
			"value" => "",
			'dependency' => Array('element' => "button1_label", 'not_empty' => true)			
		),
	    array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Scroll Down", 'hala'),
			"param_name" => "scroll_down",
			"group" => esc_html__("Style", 'hala'),
			"value" => array (
				esc_html__( "Yes", 'hala' ) => true
			),
			"description" => esc_html__("Show or not scroll down icon in this element.", 'hala')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("canvas", 'hala'),
			"param_name" => "canvas_snow",
			"group" => esc_html__("Style", 'hala'),
			"description" => esc_html__("Select the canvas design in this element.",'hala'),
			"value" => array(
				esc_html__("None Select", 'hala') => "none",
				esc_html__("snow", 'hala') => "snow",
				esc_html__("particles", 'hala') => "particles",
				esc_html__("canvas animator", 'hala') => "canvas_animator",
			)
		),
		array(
			  "type" => "colorpicker",
			  "holder" => "div",
			  "class" => "",
			  "heading" => esc_html__("Overlay Primary Color", 'hala'),
			  "param_name" => "overlay_color",
			  "value" => esc_html__("", 'hala'),
			  "group" => esc_html__("Style", 'hala'),
			  "description" => esc_html__("", 'hala')
		),
       array(
			  "type" => "colorpicker",
			  "holder" => "div",
			  "class" => "",
			  "heading" => esc_html__("Overlay Second Color", 'hala'),
			  "param_name" => "overlay_second_color",
			  "value" => esc_html__("", 'hala'),
			  "group" => esc_html__("Style", 'hala'),
			  "description" => esc_html__("", 'hala')
		),		
		array(
			  "type" => "colorpicker",
			  "class" => "",
			  "heading" => esc_html__("Text Color", 'hala'),
			  "param_name" => "text_color",
			  "value" => esc_html__("#fff", 'hala'),
			  "group" => esc_html__("Style", 'hala'),
			  "description" => esc_html__("", 'hala')
		  ),
	    array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Text Align', 'hala' ),
				'param_name' => 'des_align',
				'std'     => 'left',
				"group" => esc_html__("Style", 'hala'),
				'value' => array(
						  'Center' => 'text-center',
						  'Right'  => 'text-right',
						  'Left'   => 'text-left',
						  ),
				'description' => esc_html__( '', 'hala' )
		  ),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'hala'),
			"param_name" => "el_class",
			"group" => esc_html__("Style", 'hala'),
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'hala' )
		),
	)
));