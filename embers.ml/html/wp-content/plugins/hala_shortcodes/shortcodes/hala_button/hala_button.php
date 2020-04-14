<?php
vc_map(
	array(
		"name" => __( "hala Button", TBBS_NAME ),
	    "base" => "hala_button",
	    "class" => "vc-hala-button",
	    "icon" => "tb-icon-for-vc",
		"category" => __ ( 'Extra Elements', TBBS_NAME ),
	    "params" => array(
	    	array(
				'type' => 'el_id',
				'param_name' => 'element_id',
				'settings' => array(
					'auto_generate' => true,
				),
				'heading' => __( 'Element ID', TBBS_NAME ),
				'description' => __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', TBBS_NAME ),
				'group' => __( 'Source Settings', TBBS_NAME ),
				),
			array(
	            'type' => 'textfield',
	            'heading' => __( 'Extra Class',TBBS_NAME ),
	            'param_name' => 'class',
	            'value' => '',
	            'description' => __( '',TBBS_NAME ),
	            'group' => __( 'Template', TBBS_NAME )
	            ),
			array(
	            'type' => 'btbs_supper_template',
	            'heading' => __( 'Template', TBBS_NAME ),
	            'param_name' => 'template',
	            'shortcode' => basename( __FILE__, '.php' ),
	            'group' => __( 'Template', TBBS_NAME ),
	        	),
	    	)
		)
	);

class WPBakeryShortCode_hala_button extends WPBakeryShortCode
{
	protected function content( $atts, $content = null )
	{
		$atts = shortcode_atts( array(
				'element_id'	=> '',
				'template'		=> '',
				'class' 		=> '',
			    ), $atts);
		
		return tbbs_LoadTemplate( basename( __FILE__, '.php' ), $atts, $content );
	}
}

/**
 * tbbs_halaBlockIconParams
 * 
 */
function tbbs_halaButtonParams()
{
 	return array(
 		array(
			'name' => 'link',
			'title' => __( 'Link', TBLG_NAME ),
			'type' => 'link',
			'value' => array( 'text' => '', 'url' => '' ),
			),
		array(
			'name' => 'icon_font_class',
			'title' => __( 'Icon Font Class', TBLG_NAME ),
			'type' => 'text',
			'value' => '',
			'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="https://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website" target="_blank">line icons</a>, ...',
			),
 		array(
			'name' => 'size',
			'title' => __( 'Size', TBBS_NAME ),
			'type' => 'select',
			'value' => 'medium',
			'options' => array(
				array(
					'value' => 'small',
					'text' => 'Small',
					),
				array(
					'value' => 'medium',
					'text' => 'Medium',
					),
				array(
					'value' => 'large',
					'text' => 'Large',
					),
				)
			),
			
			
		array(
			'name' => 'position',
			'title' => __( 'Button Position', TBBS_NAME ),
			'type' => 'select',
			'value' => 'text-center',
			'options' => array(
			   array(
					'value' => 'text-left',
					'text' => 'Left',
					),
			   array(
					'value' => 'text-center',
					'text' => 'center',
					),
				array(
					'value' => 'text-right',
					'text' => 'Right',
					),
				)
			),
			
			
 		array(
			'name' => 'position_icon',
			'title' => __( 'Position Icon', TBBS_NAME ),
			'type' => 'select',
			'value' => 'right',
			'options' => array(
				array(
					'value' => 'right',
					'text' => 'Right',
					),
				array(
					'value' => 'left',
					'text' => 'Left',
					),
				)
			),
		array(
			'name' => 'layout',
			'title' => __( 'Layout', TBBS_NAME ),
			'type' => 'select',
			'value' => 'default',
			'options' => array(
				array(
					'value' => 'primary',
					'text' => 'primary',
					),
				array(
					'value' => 'line',
					'text' => 'Light',
					),
				)
			),
		);
}