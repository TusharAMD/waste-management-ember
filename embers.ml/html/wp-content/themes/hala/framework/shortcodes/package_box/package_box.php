<?php
function Hala_package_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    "style" => 'style1',
		"title" => '',
		"price" => '$99',
		"period" => '/ month',
		"icon" => '',
		"content_package" => '',
		"button_label" => 'ORDER NOW',
		"button_url" => '#',
		"el_class" => '',
		
    ), $atts));
	$content_package = wpb_js_remove_wpautop($content_package, true);
    $class = array();
	$class[] = 'pricing-item';
	$class[] = $style;
	$class[] = $el_class;
    ob_start();
    ?> 
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php if($icon) { echo '<span class="icon-plan"><i class="'.esc_attr($icon).'"></i></span>'; }
			 if($title) echo '<h3>'.esc_html($title).'</h3>'; ?>
            <div class="divider primary"></div>
            <div class="pricing-price">
               <div class="pricing-anim pricing-anim-1"> 
                  <?php if($price) echo '<span class="pricing-currency">'.esc_html($price).'</span>'; 
				   if($period) echo '<span class="pricing-anim pricing-anim-2"><span class="pricing-period">'.esc_html($period).'</span></span>'; ?>
               </div>
            </div>
            <?php if($content_package) echo _($content_package); ?>
            <a class="button" href="<?php if($button_url) echo esc_url($button_url); ?>"><?php if($button_label) echo esc_html($button_label); ?></a>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('Package_box', 'Hala_package_box_func');}