<?php get_header(); 
global $hala_options;
$tb_show_page_title = isset($hala_options['tb_post_show_page_title']) ? $hala_options['tb_post_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_post_show_page_breadcrumb']) ? $hala_options['tb_post_show_page_breadcrumb'] : 1;
$tb_post_show_post_nav = (int) isset($hala_options['tb_post_show_post_nav']) ?  $hala_options['tb_post_show_post_nav']: 1;
$tb_post_show_post_author = (int) isset($hala_options['tb_post_show_post_author']) ? $hala_options['tb_post_show_post_author'] : 1;
$tb_post_show_post_comment = (int) isset($hala_options['tb_post_show_post_comment']) ?  $hala_options['tb_post_show_post_comment']: 1; ?>
	<div class="main-content">
      <?php Hala_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); ?>
      <div class="internal-content">
		<article <?php post_class(); ?>>
			<div class="row">
				<div class="container mo-team-article">
                  <div class="container-border">
					<?php while ( have_posts() ) : the_post(); ?>
                          <div class="col-md-4 col-xs-12">
							<div class="mo-thumb"><?php the_post_thumbnail('hala-team'); ?></div>
                          </div>
                          <div class="col-md-8 col-xs-12">
							<div class="mo-header">
								<h1 class="mo-title"><?php the_title(); ?></h1>
								<h3 class="mo-position"><?php echo get_post_meta(get_the_ID(),'member_position',true); ?></h3>
                                <div class="divider"></div>
                                <?php
                                $facebook = get_post_meta(get_the_ID(),'member_facebook',true);
                                $twitter = get_post_meta(get_the_ID(),'member_twitter',true);
                                $linkedin = get_post_meta(get_the_ID(),'member_linkedin',true);
                                $pinterest = get_post_meta(get_the_ID(),'member_pinterest',true);
                                $google_plus = get_post_meta(get_the_ID(),'member_google_plus',true);
                                $instagram = get_post_meta(get_the_ID(),'member_instagram',true);
                                $flickr = get_post_meta(get_the_ID(),'member_flickr',true);
                                
                                $social =  array();
                                if($facebook) $social[] = '<a href="'.esc_url($facebook).'"><span class="fa fa-facebook"></span></a>';
                                if($twitter) $social[] = '<a href="'.esc_url($twitter).'"><span class="fa fa-twitter"></span></a>';
                                if($linkedin) $social[] = '<a href="'.esc_url($linkedin).'"><span class="fa fa-linkedin"></span></a>';
                                if($pinterest) $social[] = '<a href="'.esc_url($pinterest).'"><span class="fa fa-pinterest"></span></a>';
                                if($google_plus) $social[] = '<a href="'.esc_url($google_plus).'"><span class="fa fa-google-plus"></span></a>';
                                if($instagram) $social[] = '<a href="'.esc_url($instagram).'"><span class="fa fa-instagram"></span></a>';
                                if($flickr) $social[] = '<a href="'.esc_url($flickr).'"><span class="fa fa-flickr"></span></a>';
                                if(!empty($social)) echo '<div class="team-icon-links">'.implode(' ', $social).'</div>'
                              ?>
							</div>
                            <div class="mo-bio"><?php echo get_post_meta(get_the_ID(),'member_bio',true); ?></div>
							<div class="mo-content"><?php the_content(); ?></div>
                         </div>
					<?php endwhile; ?>
                  </div>  
				</div>
			</div>
		</article>
		<div class="mo-related mo-team-related">
			<div class="row">
				<div class="container">
					<div class="col-md-12">
						<?php
							$taxterms = wp_get_object_terms( get_the_ID(), 'team_category', array('fields' => 'ids') );
							
							$args = array(
							'post_type' => 'team',
							'post_status' => 'publish',
							'posts_per_page' => 5, // you may edit this number
							'orderby' => 'rand',
							'post__not_in' => array (get_the_ID()),
							);
							$related_items = new WP_Query( $args );
							if ($related_items->have_posts()) :
							?>
                            <div class="mo-team-related-carousel">
                                <div class="owl-carousel dots-nav-dark" data-col_lg="4" data-col_md="4" data-col_sm="3" data-col_xs="1" data-item_space="15" data-loop="true" data-autoplay="true" data-smartspeed="700" data-nav="false" data-dots="false">
									<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
                                    <div class="team-member-temp3">
                                         <?php if (has_post_thumbnail()) the_post_thumbnail('hala-team'); ?>
                                        <div class="team-member-links">
                                          <?php if(!empty($social)) echo '<div class="icon-links">'.implode(' ', $social).'</div>' ?>
                                        </div>
                                        <div class="team-member-details">
                                            <div class="team-member-details-inner">
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <span><?php echo get_post_meta(get_the_ID(),'member_position',true); ?></span>
                                            </div>
                                        </div>
                                    </div>
								<?php endwhile; ?>
                                </div>
                            </div>
							<?php
							endif;
							// Reset Post Data
							wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
       </div> 
	</div>
<?php get_footer(); ?>