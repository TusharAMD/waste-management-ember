<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
	global $hala_options;
	if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
			<link rel="shortcut icon" href="<?php $favicon=$hala_options["favicon"]; echo esc_url($favicon['url']); ?>" type="image/x-icon">
	<?php } 
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
		$page_loader = (isset($hala_options["page_loader"])&&$hala_options["page_loader"])?$hala_options["page_loader"]: false;
		if($page_loader) echo '
		<div id="loading">
		  <div id="loading-center">
			<div class="loading">
			  <h3>'. esc_html__( 'Loading', 'hala' ) .'</h3>
			  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
		  </div>
		</div>'; 
		Hala_Header(); ?>