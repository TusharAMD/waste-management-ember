<?php
function Hala_timeline_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => '',
		'image_icon' => '',
		'number_step' => '',
		'title' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $class = array();
	$class[] = 'timeline-box';
	$class[] = $el_class;
    ob_start();
    ?> 
     <div class="timeline-line">
		<div class="<?php echo esc_attr(implode('', $class)); ?>">
				<?php 
					if($icon) { echo '<i class="'.esc_attr($icon).'"></i>';	}
					
						$attachment_image = wp_get_attachment_image_src($image_icon, 'full', false); 
						if($attachment_image[0]) {
							 echo '
							<div class="thumb-timeline">
								<div style="background: url('.esc_url($attachment_image[0]).') no-repeat scroll center center /;"></div>
							</div>';
						}
		        if($title) echo '<div class="timeline-title">'.esc_html($title).'</div>';
                if($content)echo '<div class="timeline-details">'.$content.'</div>'; 
				if($content)echo '<span>'.esc_html($number_step).'</span>';
		   ?>
		</div>
      </div> 
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('timeline', 'Hala_timeline_func');}