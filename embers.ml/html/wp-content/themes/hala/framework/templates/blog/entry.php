<?php
	$media_output = '';
	if (has_post_thumbnail()) {
		$media_output = get_the_post_thumbnail(get_the_ID(), 'full');
	}
    echo '<div class="img-post"><figure class="img-single">'.$media_output.' </figure></div>';
?>