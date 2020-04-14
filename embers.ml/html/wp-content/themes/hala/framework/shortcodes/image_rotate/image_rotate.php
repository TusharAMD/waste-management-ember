<?php
function Hala_image_rotate_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'image' => '',
		'show_overlay' => 0,
		'title' => '',
		'el_class' => '',
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
	$random_id = 'fullscreen-'.rand(1,9999);
	
    $class = array();
	$class[] = '';
	$class[] = $el_class;
    ob_start();
    ?>
       <div class="item-rotate<?php echo esc_attr(implode(' ', $class)); ?>">
       <?php
			if($image) {
					if($show_overlay){ 
					  echo '<div class="overlay"></div>';
					 }
					echo '<div class="img-rotate">';
						if($title) echo '<h3 class="logo-about">'.esc_html($title).'</h3>';
						$attachment = wp_get_attachment_image_src ( $image, 'full' );
						echo '<img class="img-about" src="'.esc_url($attachment[0]).'" alt="'.esc_attr($title).'"/>';
					echo '</div>';
			}
		?>
      </div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('image_rotate', 'Hala_image_rotate_func');}