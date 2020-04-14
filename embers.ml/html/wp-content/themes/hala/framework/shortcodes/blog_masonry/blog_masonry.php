<?php
function motivoweb_blog_masonry_func($atts, $content = null) {
     extract(shortcode_atts(array(
	    'tpl' =>  'grid',
		'columns' => '',
        'category' => '',
		'posts_per_page' => -1,
		'show_pagination' => 0,
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'excerpt_lenght' => 15,
        'excerpt_more' => '',
		'readmore_text' => 'MORE',
    ), $atts));
	$class = array();
    $class[] = 'mo-blog-masonry-wrapper clearfix';
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
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		switch ($columns) {
			case 2:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
				break;
			case 3:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
				break;
			case 4:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
			default:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
		}
    ?>
        <div class="row grid-masonry">
            <div class="posts masonry-posts">
			<?php $count = 0; while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
                <div class="masonry-post <?php echo esc_attr(implode(' ', $class_columns)); echo esc_attr(implode(' ', $class)); ?>">
                    <?php include $tpl.'.php'; ?>
                </div><!--post-->
            <?php } ?>
           </div> 
        </div>
        <?php $count++; ?>
		<div style="clear: both;"></div>
        <?php if($show_pagination){ ?>
            <nav class="pagination mo-pagination">
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
        <?php } 
	 }
	wp_reset_postdata();
    return ob_get_clean();
}
if(function_exists('hala_shortcode')) { hala_shortcode('blog_masonry', 'motivoweb_blog_masonry_func'); }