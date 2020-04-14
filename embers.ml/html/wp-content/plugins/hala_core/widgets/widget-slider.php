<?php
class Hala_News_Slider_Widget extends Hala_Widget {
	function __construct() {
		parent::__construct(
			'mo_news_slider', 
			esc_html__( 'Hala - News slider', 'hala'), 
			array('description' => esc_html__('Display a slider of your posts on your site.', 'hala'),) 
        );
		
		$this->settings  = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'News Slider', 'hala' ),
				'label' => esc_html__( 'Title', 'hala' )
			),
			'category' => array(
				'type'   => 'mo_taxonomy',
				'std'    => '',
				'label'  => esc_html__( 'Categories', 'hala' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 2,
				'max'   => '',
				'std'   => 3,
				'label' => esc_html__( 'Number of slider to show', 'hala' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order by', 'hala' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'hala' ),
					'comment_count'  => esc_html__( 'Comment Count', 'hala' ),
					'title'  => esc_html__( 'Title', 'hala' ),
					'date'   => esc_html__( 'Date', 'hala' ),
					'ID'  => esc_html__( 'ID', 'hala' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order', 'hala' ),
				'options' => array(
					'none'  => esc_html__( 'None', 'hala' ),
					'asc'  => esc_html__( 'ASC', 'hala' ),
					'desc' => esc_html__( 'DESC', 'hala' ),
				)
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra Class', 'hala' )
			)
		);
		 add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}
        
	function widget_scripts() {
	    wp_enqueue_script('widget_scripts', hala_JS . 'widgets.js');
	}
	
	function widget( $args, $instance ) {
		ob_start();
		global $post;
		extract( $args );
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category               = isset($instance['category'])? $instance['category'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
		$el_class               = sanitize_title( $instance['el_class'] );
                
		echo ''.$before_widget;
		if ( $title )
				echo ''.$before_title . $title . $after_title;
		
		$query_args = array(
			'posts_per_page' => $posts_per_page,
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
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'category',
										'field' => 'id',
										'terms' => $category
									)
							);
		}
		
		$wp_query = new WP_Query($query_args);                
		if ($wp_query->have_posts()){ ?>
			<div class="mo-news-slider">
				<div class="owl-carousel dots-nav-dark dots-bottom" data-col_lg="1" data-col_md="1" data-col_sm="1" data-col_xs="1" data-item_space="30" data-loop="true" data-autoplay="false" data-smartspeed="700" data-nav="false" data-dots="true">
					<?php while ($wp_query->have_posts()){ $wp_query->the_post(); ?>
						<article <?php post_class(); ?>>
                          <div class="grid-post">
                              <div class="format-post widget-format-post">
                                <figure>
                                  <?php 
                                    if( has_post_thumbnail() ){
                                        $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                        echo '<a href="'.get_the_permalink().'"><div class="mo-thumb" style="background: url('.esc_url($thumbnail_data[0]).') no-repeat center center / cover, #333"></div></a>';
                                    }
                                 ?>
                                </figure>
                              </div>
                              <div class="info-post">
                                <h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <ul class="meta-post">
                                    <li><?php echo get_the_date('M d, Y'); ?></li>
                                    <li><?php esc_html__('By ', 'hala'); echo get_the_author(); ?></li>
                                </ul>
                                <p><?php echo Hala_custom_excerpt(21, '.'); ?></p>
                            </div>
                           </div>
						</article>
					<?php } ?>
				</div>
			</div>
		<?php }
		wp_reset_postdata();
		echo ''.$after_widget;
		$content = ob_get_clean();
		echo ''.$content;
	}
}
/* Class Hala_News_Slider_Widget */
function Hala_News_Slider_Widget() {
    register_widget('Hala_news_slider_widget');
}
add_action('widgets_init', 'Hala_news_slider_widget');