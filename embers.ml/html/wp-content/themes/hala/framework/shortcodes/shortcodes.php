<?php
$elements = array(
	'video',
	'video_fancybox_button',
	'counter_up',
	'service_box',
	'title_box',
	'image_carousel',
	'ad_banner',
	'map',
	'blog',
	'blog_masonry',
	'portfolio_carousel',
	'portfolio_grid',
	'team',
	'team_carousel',
	'testimonial_carousel',
	'image_rotate',
    'timeline',
	'package_box',
	'demo_item',
	'heading_box'
);
foreach ($elements as $element) {
	include Hala_ABS_PATH_FR .'/shortcodes/'. $element .'/'. $element.'.php';
}
if(class_exists('Woocommerce')){
	$wooshops = array(
		'product_grid',
		'product_carousel',
	);
	
	foreach ($wooshops as $wooshop) {
		include Hala_ABS_PATH_FR .'/shortcodes/'. $wooshop .'/'. $wooshop.'.php';
	}
}


