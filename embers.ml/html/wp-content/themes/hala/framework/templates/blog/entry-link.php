<?php
$media_output = '';
if (has_post_thumbnail()) {
	echo '<figure class="img-single">
		   <a href="'.get_the_permalink().'">'. the_post_thumbnail('full').'</a>
		  </figure>';
}
$link = get_post_meta(get_the_ID(), 'tb_post_link', true);
if($link) { ?>
    <a class="mo-link" href="<?php echo esc_url($link); ?>"><?php echo esc_html($link); ?></a>
<?php } ?> 