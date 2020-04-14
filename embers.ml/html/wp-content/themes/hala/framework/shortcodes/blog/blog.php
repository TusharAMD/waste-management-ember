<?php
function Hala_blog_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' =>  'grid',
		'show_pagination' => 0,
        'el_class' => '',
        'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
        'excerpt_lenght' => 38,
        'excerpt_more' => '.',
        'readmore_text' => 'MORE',
    ), $atts));
			
    $class = array();
    $class[] = 'mo-blog-wrapper clearfix';
    $class[] = $tpl;
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'post',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
    ob_start();
	if ( $wp_query->have_posts() ) { ?>
		  <div class="row">
				<?php $count = 0; while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
					<div class="<?php echo esc_attr(implode(' ', $class)); ?> col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php include $tpl.'.php'; ?>
					</div>
				<?php $count++;} ?>
				<div style="clear: both;"></div>
				<?php if ($show_pagination) { ?>
					<nav class="mo-pagination" role="navigation">
						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,
								'prev_text' => esc_html__( '&laquo; Prev', 'hala' ),
			           	        'next_text' => esc_html__( 'Next &raquo;', 'hala' )
							) );
						?>
					</nav>
				<?php } ?>
			</div>
	<?php
	} else {
		echo _('Post not found!');
    }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('blog', 'Hala_blog_func'); }