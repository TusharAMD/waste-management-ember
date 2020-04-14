<?php
function Hala_portfolio_grid_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'all_filter'=> 'All',
		'tpl'       =>  'grid' ,
		'column'    => 'col-3',
		'margin'    => '5',
		'posts_per_page' => -1,
		'orderby'   => 'none',
        'order'     => 'none',
    ), $atts));
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$html='';
    $html.='<div class="row">';
	$html.='<div class="portfolio-filter">';
    $html.="<a href='#' class=\"filter transition item-active \"  data-filter=\"*\" >".esc_html($all_filter)."</a>";
	$args=array(
        'hierarchical'=>false,
        'parent'=>0,
        'taxonomy'=>'project-type'
    );
    $categories = get_categories( $args );
    if(!empty($categories))
    {
        foreach($categories as $key=>$value){
            $html.="<a href='#' class=\"filter transition\" data-filter='.{$value->slug}'>{$value->name}</a>";
        }
    }
    $html.='</div><!--End .portfolio-filter -->'; 
    $html.='</div><!--End .row -->'; 
    $html.="<div class=\"grid masonry \">"; 
    $args=array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'portfolio',
        'post_status' => 'publish'
    );
	$wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) {
	while ( $wp_query->have_posts() ) { $wp_query->the_post(); 
        $terms=wp_get_post_terms(get_the_ID(),'project-type');
        $term_string='';
        if(!empty($terms))
        {
            foreach($terms as $key=>$value)
            {
                $term_string.=' '.$value->slug;
            }
        }
		$portfolio_grid = '';
        if($margin) $portfolio_grid = 'margin:'.$margin.'px;';
		$title=get_the_title();
        $th_is_lightbox = 'lightbox-gallery';
		$thumb = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $permalink=get_the_permalink();
		
        global $post;
        $portfolio_type = get_post_meta($post->ID, 'link_type', true);
        $video=get_post_meta(get_the_ID(),'link_url',true);
        $url=get_post_meta(get_the_ID(),'url',true);
        if($portfolio_type == 'direct' && !empty($video) )
        {
            $full=$video;
			$th_is_lightbox = 'lightbox-video';
        }
        if( $portfolio_type == 'external' && !empty($url) )
        {
            $full=$url;
            $th_is_lightbox = '';
        }
        if( $portfolio_type == 'single_page')
        {
            $full= get_the_permalink();
            $th_is_lightbox = '';
        }
		include $tpl.'.php';
      }
	} else {
		echo 'Post not found!';
    }
    wp_reset_postdata();
	$html.="</div>"; 
    return $html;
}
if(function_exists('hala_shortcode')) { hala_shortcode('portfolio_grid', 'Hala_portfolio_grid_func'); }