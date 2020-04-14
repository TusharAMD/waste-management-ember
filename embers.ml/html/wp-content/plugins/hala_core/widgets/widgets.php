<?php
require_once hala_DIR.'/widgets/widget-posts-list.php';
require_once hala_DIR.'/widgets/widget-tabs.php';
require_once hala_DIR.'/widgets/widget-slider.php';
require_once hala_DIR.'/widgets/widget-work.php';
require_once hala_DIR.'/widgets/widget-post.php';
require_once hala_DIR.'/widgets/widget-ads.php';
require_once hala_DIR.'/widgets/widget-social.php';
require_once hala_DIR.'/widgets/widget-instagram.php';
require_once hala_DIR.'/widgets/widget-flickr.php';
if (class_exists('Woocommerce')) {
	require_once hala_DIR.'/widgets/widget-woo_filter.php';

}