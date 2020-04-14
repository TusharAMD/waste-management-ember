<?php
function Hala_heading_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'video_bg'         => '',
		'video_url'        => 'https://youtu.be/hpeYWdkUtcE',
		'parallax'         => '',
		'parallax_image'   => '',
		'parallax_speed_bg'=> '1.5',
		'text_static'      => '',
		'text_animation'   => '',
		'type_animation'   => 'clip',
		'text_content'     => '',
		'button1_label'    => 'Register Now',
		'button1_url'      => '#',
		'scroll_down'      => '',
		'canvas_snow'      => '',
		'overlay_color'    => '',
		'overlay_second_color'  => '',
		'text_color'       => '',
		'des_align'        => 'Center',
		'el_class'         => ''
    ), $atts));
    extract( $atts );
	$random_id = 'fullscreen-'.rand(1,9999);
	$content = wpb_js_remove_wpautop($content, true);
	$css_classes = array(
		'vc_row',
		'wpb_row', 
		'vc_row-fluid',
		 $el_class
    );
    $wrapper_attributes = array();
    ob_start();
/* Background Overlay */
$style_overlay = '';
if($overlay_color) $style_overlay  = 'background: '.$overlay_color.';  background: -webkit-linear-gradient(left, '.$overlay_color.' 0%, '.$overlay_second_color.' 100%);   background: -moz-linear-gradient(left, '.$overlay_color.' 0%, '.$overlay_second_color.' 100%);   background: -o-linear-gradient(left, '.$overlay_color.' 0%, '.$overlay_second_color.' 100%);
  background: -ms-linear-gradient(left,'.$overlay_color.' 0%, '.$overlay_second_color.' 100%);  background: linear-gradient(to left, '.$overlay_color.' 0%, '.$overlay_second_color.' 100%); ';
$style_text_color = '';
$style_border_color = '';
if($text_color) $style_text_color  = ' color: '.$text_color.'; ';
if($text_color) $style_border_color  = ' border: 2px solid '.$text_color.'; ';

wp_enqueue_script( 'headline-js', Hala_URI_PATH.'/assets/js/animated-headline.js', array( 'jquery' ), '', true );
if( $canvas_snow =='snow'){
	wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/let_it_snow.js', array( 'jquery' ), '', true );
}
elseif( $canvas_snow =='particles'){
	wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/particles.min.js', array( 'jquery' ), '', true );
}
elseif( $canvas_snow =='canvas_animator'){
	wp_enqueue_script( 'canvas', Hala_URI_PATH. '/assets/js/canvas-animator.js', array( 'jquery' ), '', true );
}
    
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_url ) );
if ( $has_video_bg ) {
    $css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}
if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="'. $parallax_speed_bg .' "'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
}
if ( ! empty( $parallax_image ) ) {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	$wrapper_attributes[] = 'data-vc-parallax-image="'.$parallax_image_src.'"';
}
if ( ! empty( $video_bg )) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . $video_url . '"';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes ) ) );
   $output = '';
?>
<div class="header-box" id="header-box">
    <div class="skew-section">
  <div <?php if( $canvas_snow == 'particles'){ echo 'id="particle-ground"'; }?> class="hero parallax wrapper <?php echo esc_attr($css_class); ?>" <?php echo implode( ' ', $wrapper_attributes ); ?> >
    <?php 
    if( $canvas_snow == 'snow'){
    echo '<canvas class="snow"></canvas>'; 
    }
    elseif( $canvas_snow =='canvas_animator'){
        echo '<canvas id="demo-canvas"></canvas>'; 
    }
      echo '<div class="mo-vc-row-ovelay" style="'.($style_overlay).'"></div>'; ?>
        <div class="container parallax-container reskew">
          <div class="<?php echo esc_attr($des_align); ?> cd-intro">
            <h1 class="cd-headline <?php echo esc_attr($type_animation); ?>" style=" <?php echo esc_attr($style_text_color) ;?> !important;">       
                   <?php if ( ! empty( $text_static )) {
                   echo '<span>'. esc_html( $text_static ) .'</span>'; 
                } 
				 if ( ! empty( $text_animation )) { ?>
                <span class="cd-words-wrapper">
                    <?php 
                    $dynamic_lines = explode(',',$text_animation);
                    foreach($dynamic_lines as $dynamic_line) {
                        echo '<b class="is-visible">'. esc_html($dynamic_line) .'</b>';
                    } ?>
                </span>
               <?php } ?>  
            </h1>
            <?php if($text_content) echo '<h3  style="'. esc_attr($style_text_color) .'">'. $text_content.'</h3>';
			if($button1_label) echo '<a href="'.esc_url($button1_url).'" class="btn" style="'.esc_attr($style_border_color . $style_text_color) .'"><i class="fa fa-long-arrow-right"></i>'. esc_html($button1_label).' </a>'; ?>      
           </div><!-- .text-center --> 
        </div><!-- .container.reskew --> 
      </div><!-- .hero --> 
    </div>
</div>
<?php if($scroll_down){ 
  echo '<a class="scroll-down-link" href="#about"><div class="scroll-down"><i class="wheel"></i></div></a> ';
}
  return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('heading_box', 'Hala_heading_box_func');}