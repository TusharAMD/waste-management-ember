<!-- Start Header -->
<?php 
	global $hala_options;
	$class_header = 'mo-header-v3';
	if(isset($hala_options['fixed_main_menu_v3']) && $hala_options['fixed_main_menu_v3']) {
		$class_header .= ' mo-header-fixed';
	}
	$disable_stick_menu = get_post_meta(get_the_ID(),'tb_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($hala_options['stick_main_menu_v3']) && $hala_options['stick_main_menu_v3']) {
			$class_header .= ' mo-header-stick';
		}
	}
?>
<header id="header">
	<div id="mo_header" class="<?php echo esc_attr($class_header); ?>">
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
                    ?>
                    <a class="mo-toggle-menu" href="javascript:void(0)"></a>
                </div>
            </div>
		</div>
	</div>
</header>