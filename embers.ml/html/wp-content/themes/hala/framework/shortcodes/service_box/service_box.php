<?php
function Hala_service_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'style' => 'style1',
		'icon' => '',
		'image_icon' => '',
		'number_step' => '',
		'title' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $class = array();
	$class[] = 'service';
	$class[] = $style;
	$class[] = $el_class;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
				<?php 
					if($icon && ($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4')) {
						echo '<div class="icon-wrap"><i class="'.esc_attr($icon).'"></i></div>';
					}
					if($style == 'style5') {
						$attachment_image = wp_get_attachment_image_src($image_icon, 'full', false); 
						if($attachment_image[0]) {
							if($style == 'style5') echo '
							<div class="thumb-service">
								<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_html($title).'"/>
							</div>';
							
						}
					} ?>
		  <div class="title-wrap">
          <?php if($title) echo '<h4>'.esc_html($title).'</h4>';
		  		echo '<span class="step-number">'.esc_html($number_step).'</span>';
                if($content)echo '<div class="content">'.$content.'</div>'; ?>
          </div>
		</div>
        <div class="clearfix"></div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('service_box', 'Hala_service_box_func');}