<?php Hala_Footer();
		global $hala_options;
		if(isset($hala_options["style_selector"])&&$hala_options["style_selector"]) {
			require_once Hala_ABS_PATH.'/box-style.php';
		}
	 wp_footer(); ?>
</body>