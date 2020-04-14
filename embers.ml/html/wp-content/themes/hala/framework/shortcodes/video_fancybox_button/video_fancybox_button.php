<?php
function Hala_video_fancybox_button_func($atts) {
    extract(shortcode_atts(array(
        'title' => '',
		'description' => '',
        'video_link' => '',
        'el_class' => ''
    ), $atts));
    $class = array();
	$class[] = 'mo-video-fancybox';
	$class[] = $el_class;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php 
				if($title) echo '<h5 class="wow fadeInDown"><span class="divider right"></span>'.esc_html($title).'<span class="divider left"></span></h5> '; 
				if($description) echo '<h3>'.esc_html($description).'</h3>'; 
				if($video_link) echo '<a class="lightbox-video" href="'.esc_url($video_link).'"><i class="fa fa-play" aria-hidden="true"></i> </a>';
			?>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('video_fancybox_button', 'Hala_video_fancybox_button_func');}