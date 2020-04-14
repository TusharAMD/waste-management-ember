<?php
$media_output = '';
if (has_post_thumbnail()) {
	echo '<figure class="img-single">
		   <a href="'.get_the_permalink().'">'. the_post_thumbnail('full').'</a>
		  </figure>';
}
$quote_content = get_post_meta(get_the_ID(), 'tb_post_quote', true);
if($quote_content) {
	echo '<div class="blockquote-post"><blockquote>'.esc_html($quote_content).'</blockquote></div>';
}?>