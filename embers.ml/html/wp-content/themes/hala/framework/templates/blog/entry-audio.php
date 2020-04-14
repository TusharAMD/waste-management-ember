<?php
$media_output = '';
$audio_source_from = get_post_meta(get_the_ID(), 'tb_audio_type', true);
$audio_type = get_post_meta(get_the_ID(), 'tb_post_audio_type', true);
$audio_url = get_post_meta(get_the_ID(), 'tb_post_audio_url', true);
if (has_post_thumbnail()) {
	echo '<figure class="img-single">'. the_post_thumbnail('full').' </figure>';
}
if($audio_source_from == 'soundcloud') {
   echo '<div class="audio-post"><div class="embed-responsive embed-responsive-16by9">'. get_post_meta(get_the_ID(), 'tb_post_audio_iframe', true).'</div> </div>';
} else {
	if($audio_url) echo '<div class="audio-post">
	'. do_shortcode('[audio '.$audio_type.'="'.$audio_url.'"][/audio]') .'</div>';
} 