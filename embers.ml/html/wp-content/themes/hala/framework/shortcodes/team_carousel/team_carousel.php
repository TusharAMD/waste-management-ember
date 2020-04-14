<?php
function Hala_team_carousel_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'tpl1',
		'col_lg' =>  4,
		'col_md' =>  3,
		'col_sm' =>  2,
		'col_xs' =>  1,
		'item_space' =>  30,
		'loop' =>  'true',
		'autoplay' =>  'false',
		'smartspeed' =>  500,
		'nav' =>  'false',
		'nav_position' =>  '',
		'nav_dir_position' =>  '',
		'dots' =>  'false',
		'dots_position' =>  'dots-bottom',
		'dots_dir_position' =>  '',
		'dots_nav_color' =>  '',
        'el_class' => '',
        'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
    ), $atts));
    $class = array();
    $class[] = 'mo-team-carousel clearfix';
    $class[] = $dots_position;
	$class[] = $dots_dir_position;
	$class[] = $nav_position;
	$class[] = $nav_dir_position;
	$class[] = $dots_nav_color;
    $class[] = $el_class;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'team',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
       $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'team-type',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }	
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="owl-carousel" data-col_lg="<?php echo esc_attr($col_lg); ?>" data-col_md="<?php echo esc_attr($col_md); ?>" data-col_sm="<?php echo esc_attr($col_sm); ?>" data-col_xs="<?php echo esc_attr($col_xs); ?>" data-item_space="<?php echo esc_attr($item_space); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-smartspeed="<?php echo esc_attr($smartspeed); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
				 include $tpl.'.php';
				  } ?>
			</div>
		</div>
    <?php
	} else {
		echo _('Post not found!');
    }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('team_carousel', 'Hala_team_carousel_func'); }