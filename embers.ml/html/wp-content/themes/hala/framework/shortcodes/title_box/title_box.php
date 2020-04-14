<?php
function Hala_title_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
	    'style_separator' => 'separator',
		'title' => '',
		'subtitle' => '',
    ), $atts));
    ob_start();?>
	<div class="center title-section wow fadeInDown">
      <?php if($subtitle) echo '<h5>'.esc_html($subtitle).'</h5>';
	   if($title) echo '<h3 class="lrg">'.esc_html($title).'</h3>';
	   echo '<div class="'.esc_attr($style_separator).'"><span><i></i></span> </div>';?>
    </div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('title_box', 'Hala_title_box_func');}