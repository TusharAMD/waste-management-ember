<?php
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay primary color", 'hala' ),
		"param_name" 	=> "mo_bg_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Custom Options", 'hala'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( primary color ) in this row.", 'hala' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Gradient Overlay second color", 'hala' ),
		"param_name" 	=> "mo_bg_second_overlay",
		"value" 		=> "",
		"group"         => esc_html__("Custom Options", 'hala'),
		"description" 	=> esc_html__( "Select color Gradient background overlay ( second color ) in this row.", 'hala' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Background Fixed", 'hala' ),
		"param_name" 	=> "mo_bg_fixed",
		"value" 		=> "",
		"group"         => esc_html__("Custom Options", 'hala'),
		"description" 	=> esc_html__( "Enable background fixed in this row.", 'hala' )
) );
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Icon", 'hala' ),
		"param_name" 	=> "icon",
		"value" 		=> "",
		"group"         => esc_html__("Icon", 'hala'),
		"description" 	=> esc_html__( "Enter class icon in this custom heading. EX: fa fa-heart", 'hala' )
) );
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textarea",
		"class" 		=> "",
		"heading" 		=> esc_html__( "Custom CSS", 'hala' ),
		"param_name" 	=> "custom_css",
		"value" 		=> "",
		"description" 	=> esc_html__( "Enter style in this custom heading. EX: line-height: 24px; letter-spacing: 0.04em; ...", 'hala' )
) );