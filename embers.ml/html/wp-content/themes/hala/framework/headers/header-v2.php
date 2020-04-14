<!-- Start Header -->
<?php 
	global $hala_options;
	$class_header = 'mo-header-v2';
	if(isset($hala_options['fixed_main_menu_v2']) && $hala_options['fixed_main_menu_v2']) {
		$class_header .= ' mo-header-fixed';
	}
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($hala_options['stick_main_menu_v2']) && $hala_options['stick_main_menu_v2']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
	<div id="mo_header" class="<?php echo esc_attr($class_header); ?>">
		<!-- Start Header Menu -->
		<div class="mo-header-menu">
			<div class="container">
					<div class="col-md-2 mo-col-logo">
						<div class="mo-logo">
							<a href="<?php echo esc_url(home_url()); ?>">
								<?php Hala_logo(); ?>
							</a>
						</div>
						<div id="mo-header-icon" class="mo-header-icon visible-xs visible-sm"><span></span></div>
					</div>
					<div class="col-md-10 mo-col-menu">
						<?php
							$attr = array(
								'container_class' => 'mo-menu-list hidden-xs hidden-sm ',
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
							}
							wp_nav_menu( $attr );
						
						global $woocommerce; 
						if (class_exists('Woocommerce')) { 
						$switch_cart_header_v2 =& $hala_options["cart_header_v2"];
	                      if($switch_cart_header_v2 == 1){ ?>
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
						
						<?php $switch_search_header_v2 =& $hala_options["search_header_v2"];
	                      if($switch_search_header_v2 == 1){ ?>
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