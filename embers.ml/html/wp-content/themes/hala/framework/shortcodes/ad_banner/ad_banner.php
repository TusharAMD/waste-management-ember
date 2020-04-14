<?php
function Hala_ad_banner_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'image' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	
    $class = array();
	$class[] = 'mo-ad-banner-wrap';
	$class[] = $el_class;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="widget-content">
              <div class="widget-post">
				<div class="overlay-top"></div>
				<?php
					if($image) {
						echo '<figure class="widget-image">  '.wp_get_attachment_image($image, 'full') .'</figure>';
						if($content) echo '<div class="widget-post-detail"><div class="mo-ad-post-detail">'.$content.'</div></div>';
					}
				?>
                </div>
			</div>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('ad_banner', 'Hala_ad_banner_func');}