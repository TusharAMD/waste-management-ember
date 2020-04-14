<!-- Start Header -->
<?php 
	global $hala_options;
	$class_header = 'mo-header-v4';
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($hala_options['stick_main_menu_v4']) && $hala_options['stick_main_menu_v4']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
	<div id="mo_header" class="mo-header-fixed <?php echo esc_attr($class_header); ?>">
		<div class="mo-header-top t_motivo">
		  <div class="container">
					<?php $switch_header_social_v4 = $hala_options["switch_social_v4"];
					if($switch_header_social_v4 == 1){ ?>
					<ul class="social-header">
					 <?php if(isset($hala_options['facebook_url_v4']) AND $hala_options['facebook_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['facebook_url_v4']);?>" title="facebook"><i class="fa fa-facebook"></i></a></li>
					 <?php endif; 
					  if(isset($hala_options['twitter_url_v4']) AND $hala_options['twitter_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['twitter_url_v4']);?>" title="twitter"><i class="fa fa-twitter"></i></a></li>
					 <?php endif;
					 if(isset($hala_options['linkedin_url_v4']) AND $hala_options['linkedin_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['linkedin_url_v4']);?>" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
					 <?php endif;
					 if(isset($hala_options['googleplus_url_v4']) AND $hala_options['googleplus_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['googleplus_url_v4']);?>" title="google plus"><i class="fa fa-google-plus"></i></a></li>
					 <?php endif;
					 if(isset($hala_options['youtube_url_v4']) AND $hala_options['youtube_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['youtube_url_v4']);?>" title="youtube"><i class="fa fa-youtube"></i></a></li>
					 <?php endif;
					 if(isset($hala_options['instagram_url_v4']) AND $hala_options['instagram_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['instagram_url_v4']);?>" title="instagram"><i class="fa fa-instagram"></i></a></li>
					 <?php endif;
					 if(isset($hala_options['pinterest_url_v4']) AND $hala_options['pinterest_url_v4'] !=''): ?>
					 <li><a href="<?php echo esc_url($hala_options['pinterest_url_v4']);?>" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
					 <?php endif; ?>    
					</ul>
				  <?php } 
				   if(isset($hala_options['contact_info_v4']) AND $hala_options['contact_info_v4'] !=''): ?>
                  <div class="contact_info">
                  <?php echo esc_html($hala_options['contact_info_v4']); ?>
                  </div>
                 <?php endif; ?>
				</div>
		</div>
		<!-- End Header Top -->
		<div class="mo-header-menu">
			<div class="container">
                    <div class="col-md-2 mo-col-logo">
						<div class="mo-logo">
							<a href="<?php echo esc_url(home_url()); ?>">
								<?php hala_logo(); ?>
							</a>
						</div>
						<div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
					</div>
					<div class="col-md-10 mo-col-menu">
						<?php
							$attr = array(
								'container_class' => 'mo-menu-list motivo_cc hidden-xs hidden-sm ',
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
						
							global $woocommerce; 
							if (class_exists('Woocommerce')) { 
							$switch_cart_header_v4 =& $hala_options["cart_header_v4"];
							  if($switch_cart_header_v4 == 1){ ?>
								 <div class="mo_mini_cart">                    
									<div class="mo-cart-header">
									 <a class="mo-icon" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i><span class="cart_total"><?php $items_count = $woocommerce->cart->cart_contents_count; echo esc_html($items_count); ?></span></a>
								</div>
									<div class="mo-cart-content">
									   <h6><?php echo esc_html__('MY SHOPPING CART', 'hala'); ?></h6>
									   <div class="widget_shopping_cart_content"></div>
									</div>
								</div>
							   <?php } 
							 } ?>
                            
                            <a class="mo-toggle-menu" href="javascript:void(0)"></a>
                            
                            <?php $switch_search_header_v4 =& $hala_options["search_header_v4"];
							  if($switch_search_header_v4 == 1){ ?>
							   <div class="mo-search-header">
                                 <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                              </div>
							<?php } ?>
							  
                           <?php get_search_form(); ?>
                </div>    
			</div>
		</div>
	</div>
</header>