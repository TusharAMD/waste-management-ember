<?php get_header(); 
global $hala_options;
$tb_show_page_title = isset($hala_options['tb_post_show_page_title']) ? $hala_options['tb_post_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_post_show_page_breadcrumb']) ? $hala_options['tb_post_show_page_breadcrumb'] : 1;
$tb_post_show_post_nav = (int) isset($hala_options['tb_post_show_post_nav']) ?  $hala_options['tb_post_show_post_nav']: 1;
$tb_post_show_post_author = (int) isset($hala_options['tb_post_show_post_author']) ? $hala_options['tb_post_show_post_author'] : 1;
$tb_post_show_post_comment = (int) isset($hala_options['tb_post_show_post_comment']) ?  $hala_options['tb_post_show_post_comment']: 1; ?>
	<div class="main-content mo-portfolio-article">
      <?php Hala_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); ?>
      <div class="internal-content">
		<article <?php post_class(); ?>>
			<div class="row">
				<div class="container">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-7">
							<div class="mo-thumb"><?php the_post_thumbnail('full'); ?></div>
						</div>
						<div class="col-md-5">
							<div class="mo-header">
								<h1 class="mo-title"><?php the_title(); ?></h1>
								<ul class="meta-post meta-portfolio">
                                   <li><?php the_terms( get_the_ID(), 'project-type', '<i class="fa fa-folder-open-o"></i> ', ', ' ); ?></li>                 <li><?php echo get_the_date('d M, Y'); ?></li>
</ul>
							</div>
							<div class="mo-content"><?php the_content(); ?></div>
						</div>
                        
                        <div class="clearfix"></div>
                        <div class="col-md-12 portfolio-directions">
                            <?php 
							   if($tb_post_show_post_nav ){ 
							   echo hala_post_directions();
							 } ?>
                        </div>            
					<?php endwhile; ?>
				</div>
			</div>
		</article>
		<div class="mo-related">
			<div class="row">
				<div class="container">
					<div class="col-md-12">
						<?php
							$taxterms = wp_get_object_terms( get_the_ID(), 'project-type', array('fields' => 'ids') );
							
							$args = array(
							'post_type' => 'portfolio',
							'post_status' => 'publish',
							'posts_per_page' => 5, // you may edit this number
							'orderby' => 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'project-type',
									'field' => 'id',
									'terms' => $taxterms
								)
							),
							'post__not_in' => array (get_the_ID()),
							);
							$related_items = new WP_Query( $args );
							// loop over query
							if ($related_items->have_posts()) :
							?>
								<h6 class="portfolio-related-heading"><?php esc_html_e('PORTFOLIO RELATED', 'hala'); ?></h6>
                                <div class="divider left"></div>
								<div class="mo-portfolio-related-carousel">
									<div class="owl-carousel" data-col_lg="3" data-col_md="3" data-col_sm="2" data-col_xs="1" data-item_space="30" data-loop="true" data-autoplay="false" data-smartspeed="700" data-nav="false" data-dots="true">
										<?php while ( $related_items->have_posts() ) : $related_items->the_post();
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
										 ?>
											 <div <?php post_class(); ?>>
                                                <div class="portfolio-related work-img">
                                                  <figure class="portfolio-effect">
                                                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('hala-small'); ?>
                                                    <figcaption>
                                                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                      <a class="portfolio-link <?php echo esc_url($th_is_lightbox) ; ?>" href="<?php echo esc_url($full); ?>"><i class='fa fa-search'></i></a>
                                                      </figcaption>
                                                  </figure>
                                                </div>
                                              </div>
										<?php endwhile; ?>
									</div>
								</div>
                         	<?php
							endif;
						   wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	  </div>
    </div>
<?php get_footer(); ?>