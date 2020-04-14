<?php
vc_map(array(
    "name" => 'Google Maps',
    "base" => "maps",
    "category" => esc_html__('Extra Elements', 'hala'),
	"icon" => "tb-icon-for-vc",
    "description" => esc_html__('Google Maps API', 'hala'),
    "params" => array(
	    array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'hala'),
			"param_name" => "tpl",
			"value" => array(
				"full_map" => "full_map",
				"fancybox_map" => "fancybox_map",
			),
			"description" => esc_html__('Select template of maps display in this element.', 'hala')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("fancybox map button", 'hala'),
			"param_name" => "fancybox_map_btn",
			"value" => "GO TO OUR MAP",
			"dependency" => array(
					"element"=>"tpl",
					"value"=> "fancybox_map"
				),
			"description" => esc_html__( "Enter fancybox map button display in this element.", 'hala' )
		),
					
        array(
            "type" => "textfield",
            "heading" => esc_html__('API Key', 'hala'),
            "param_name" => "api",
            "value" => '',
            "description" => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Address', 'hala'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => esc_html__('Enter address of Map', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Coordinate', 'hala'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Click Show Info window', 'hala'),
            "param_name" => "infoclick",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Click a marker and show info window (Default Show).', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Coordinate', 'hala'),
            "param_name" => "markercoordinate",
            "value" => '',
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Title', 'hala'),
            "param_name" => "markertitle",
            "value" => '',
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Enter Title Info windows for marker', 'hala')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__('Marker Description', 'hala'),
            "param_name" => "markerdesc",
            "value" => '',
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Enter Description Info windows for marker', 'hala')
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__('Marker Icon', 'hala'),
            "param_name" => "markericon",
            "value" => '',
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Select image icon for marker', 'hala')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__('Marker List', 'hala'),
            "param_name" => "markerlist",
            "value" => '',
            "group" => esc_html__("Multiple Marker", 'hala'),
            "description" => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Info Window Max Width', 'hala'),
            "param_name" => "infowidth",
            "value" => '200',
            "group" => esc_html__("Marker", 'hala'),
            "description" => esc_html__('Set max width for info window', 'hala')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type", 'hala'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => esc_html__('Select the map type.', 'hala')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style Template", 'hala'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Subtle Grayscale" => "Subtle-Grayscale",
                "Shades of Grey" => "Shades-of-Grey",
                "Blue water" => "Blue-water",
                "Pale Dawn" => "Pale-Dawn",
                "Blue Essence" => "Blue-Essence",
                "Apple Maps-esque" => "Apple-Maps-esque",
            ),
            "group" => esc_html__("Map Style", 'hala'),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Zoom', 'hala'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => esc_html__('zoom level of map, default is 13', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Width', 'hala'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => esc_html__('Width of map without pixel, default is auto', 'hala')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Height', 'hala'),
            "param_name" => "height",
            "value" => '350px',
            "description" => esc_html__('Height of map without pixel, default is 350px', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scroll Wheel', 'hala'),
            "param_name" => "scrollwheel",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Pan Control', 'hala'),
            "param_name" => "pancontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Pan control.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Zoom Control', 'hala'),
            "param_name" => "zoomcontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Zoom Control.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scale Control', 'hala'),
            "param_name" => "scalecontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Scale Control.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Map Type Control', 'hala'),
            "param_name" => "maptypecontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Map Type Control.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Street View Control', 'hala'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Street View Control.', 'hala')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Over View Map Control', 'hala'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                esc_html__("Yes, please", 'hala') => true
            ),
            "group" => esc_html__("Controls", 'hala'),
            "description" => esc_html__('Show or hide Over View Map Control.', 'hala')
        )
    )
));