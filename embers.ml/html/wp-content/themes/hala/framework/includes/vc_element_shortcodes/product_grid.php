<?php
if(class_exists('Woocommerce')){
    vc_map(array(
        "name" => esc_html__("Product Grid", 'hala'),
        "base" => "products_grid",
        "class" => "tb-products-grid",
        "category" => esc_html__('Extra Elements', 'hala'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Template", 'hala'),
                "param_name" => "tpl",
                "value" => array(
					"Template 1" => "tpl1",
					"Template 2" => "tpl2"
                ),
                "description" => esc_html__('Select template in this elment.', 'hala')
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Columns", 'hala'),
                "param_name" => "columns",
                "value" => array(
                    "4 Columns" => "4",
                    "3 Columns" => "3",
                    "2 Columns" => "2",
                    "1 Column" => "1",
                ),
				"description" => esc_html__('Select columns in this elment.', 'hala')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Pagination', 'hala'),
                "param_name" => "show_pagination",
                "value" => array(
                    esc_html__("Yes, please", 'hala') => 1
                ),
                "description" => esc_html__('Show or hide pagination in this element.', 'hala')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Extra Class", 'hala'),
                "param_name" => "el_class",
                "value" => "",
				"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'hala' )
            ),
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Show", 'hala' ),
					"param_name" => "show",
					"value" => array (
							"All Products" => "all_products",
							"Featured Products" => "featured",
							"On-sale Products" => "onsale",
					),
					"group" => esc_html__("Build Query", 'hala'),
					"description" => esc_html__( "Select show product type in this elment", 'hala' )
			),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Product Count", 'hala'),
                "param_name" => "number",
                "value" => "",
				"group" => esc_html__("Build Query", 'hala'),
				"description" => esc_html__('Please, enter number of post per page. Show all: -1.', 'hala')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Hide Free', 'hala'),
                "param_name" => "hide_free",
                "value" => array(
                    esc_html__("Yes, please", 'hala') => 1
                ),
				"group" => esc_html__("Build Query", 'hala'),
                "description" => esc_html__('Hide free product in this element.', 'hala')
            ),
			array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Hidden', 'hala'),
                "param_name" => "show_hidden",
                "value" => array(
                    esc_html__("Yes, please", 'hala') => 1
                ),
				"group" => esc_html__("Build Query", 'hala'),
                "description" => esc_html__('Show Hidden product in this element.', 'hala')
            ),
            array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order by', 'hala' ),
				"param_name" => "orderby",
				"value" => array (
						"None" => "none",
						"Date" => "date",
						"Price" => "price",
						"Random" => "rand",
						"Selling" => "selling",
						"Rated" => "rated",
				),
				"group" => esc_html__("Build Query", 'hala'),
				"description" => esc_html__( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'hala' )
			),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order', 'hala'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
				"group" => esc_html__("Build Query", 'hala'),
                "description" => esc_html__('Order ("None", "Asc", "Desc") in this element.', 'hala')
            ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt Length", 'hala'),
				"param_name" => "excerpt_lenght",
				"value" => "",
				"group" => esc_html__("Template", 'hala'),
				"description" => esc_html__("Please, Enter number excerpt lenght of post in this element. Default: 11", 'hala')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt More", 'hala'),
				"param_name" => "excerpt_more",
				"value" => "",
				"group" => esc_html__("Template", 'hala'),
				"description" => esc_html__("Please, Enter text excerpt more of post in this element. Default: . ", 'hala')
			),
        )
    ));
}