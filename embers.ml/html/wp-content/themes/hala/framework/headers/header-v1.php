<!-- Start Header -->
<?php 
	global $hala_options;
	$class_header = 'mo-header-v1';
	
	if(isset($hala_options['fixed_main_menu_v1']) && $hala_options['fixed_main_menu_v1']) {
		$class_header .= ' mo-header-fixed';
	}
?>
<!-- ========== Header ========== -->
<header id="header" class="<?php echo esc_attr($class_header); ?>">
  <div class="navigation"> <a href="#nav" class="cd-nav-trigger"><span></span></a></div>
  <?php $switch_header_social_v1 =& $hala_options["switch_social_v1"];
	if($switch_header_social_v1 == 1){ ?>
    <ul class="social-header">
     <?php if(isset($hala_options['facebook_url_v1']) AND $hala_options['facebook_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['facebook_url_v1']);?>" title="facebook"><i class="fa fa-facebook"></i></a></li>
     <?php endif; 
	  if(isset($hala_options['twitter_url_v1']) AND $hala_options['twitter_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['twitter_url_v1']);?>" title="twitter"><i class="fa fa-twitter"></i></a></li>
     <?php endif; 
	  if(isset($hala_options['linkedin_url_v1']) AND $hala_options['linkedin_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['linkedin_url_v1']);?>" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
     <?php endif; 
	 if(isset($hala_options['googleplus_url_v1']) AND $hala_options['googleplus_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['googleplus_url_v1']);?>" title="google plus"><i class="fa fa-google-plus"></i></a></li>
     <?php endif; 
	 if(isset($hala_options['youtube_url_v1']) AND $hala_options['youtube_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['youtube_url_v1']);?>" title="youtube"><i class="fa fa-youtube"></i></a></li>
     <?php endif; 
	 if(isset($hala_options['instagram_url_v1']) AND $hala_options['instagram_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['instagram_url_v1']);?>" title="instagram"><i class="fa fa-instagram"></i></a></li>
     <?php endif;
	 if(isset($hala_options['pinterest_url_v1']) AND $hala_options['pinterest_url_v1'] !=''): ?>
     <li><a href="<?php echo esc_url($hala_options['pinterest_url_v1']);?>" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
     <?php endif; ?>    
    </ul>
  <?php } ?>
                        
                        
  <div class="logo"> 
      <a href="<?php echo esc_url(home_url()); ?>">
		<?php Hala_logo(); ?>
      </a>
  </div>
  
  <nav class="cd-nav-container" id="nav">
    <div class="close-container"> <a href="#0" class="cd-close-nav">Close</a> </div>
      <?php
		$attr = array(
			'container_class' => 'cd-nav',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		);
		/* Select menu dynamic */
		$menu_slug = get_post_meta(get_the_ID(),'tb_menu',true);
		if($menu_slug != '' && $menu_slug != 'global') {
			$attr['menu'] = $menu_slug;
		}
		/* Select menu position */
		$menu_class = get_post_meta(get_the_ID(),'tb_menu_positon',true);
		$attr['menu_class'] = 'text-right';
		if($menu_class != '' && $menu_class != 'global') {
			$attr['menu_class'] = $menu_class;
		}
		/* Select theme location */
		$menu_locations = get_nav_menu_locations();
		if (!empty($menu_locations['main_navigation'])) {
			$attr['theme_location'] = 'main_navigation';
			wp_nav_menu( $attr );
		} else {
			$attr = array(
				'menu_class'  => 'menu mo-menu-list text-right',
			);
			wp_page_menu($attr);
		}
	?>
    <!-- .cd-nav --> 
  </nav>
</header>