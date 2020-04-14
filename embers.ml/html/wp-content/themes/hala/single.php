<?php get_header(); 
global $hala_options;
$tb_show_page_title = isset($hala_options['tb_post_show_page_title']) ? $hala_options['tb_post_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_post_show_page_breadcrumb']) ? $hala_options['tb_post_show_page_breadcrumb'] : 1;
$tb_post_show_post_share = (int) isset($hala_options['tb_post_show_post_share']) ? $hala_options['tb_post_show_post_share']: 1;
$tb_post_show_post_nav = (int) isset($hala_options['tb_post_show_post_nav'])? $hala_options['tb_post_show_post_nav']: 1;
$tb_post_show_post_author = (int) isset($hala_options['tb_post_show_post_author']) ? $hala_options['tb_post_show_post_author'] : 1;
$tb_post_show_post_comment = (int) isset($hala_options['tb_post_show_post_comment']) ? $hala_options['tb_post_show_post_comment']: 1; ?>
<div class="main-content">
   <?php Hala_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); ?>
   <div class="internal-content">
	<div class="mo-blog-article">
		<div class="row">
			<div class="container">
				<?php
				$tb_blog_layout = isset($hala_options['tb_post_layout']) ? $hala_options['tb_post_layout'] : '2cr';
				
				$cl_sb_left = isset($hala_options['tb_post_left_sidebar_col']) ? $hala_options['tb_post_left_sidebar_col'] : 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
				$cl_sb_right = isset($hala_options['tb_post_right_siedebar_col']) ? $hala_options['tb_post_right_siedebar_col'] : 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
				
				$cl_content = isset($hala_options['tb_post_content_col']) ? $hala_options['tb_post_content_col'] : ( is_active_sidebar('hala-main-sidebar') ? 'col-xs-12 col-sm-12 col-md-8 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12' );
				if ( !is_active_sidebar('hala-main-sidebar') && !is_active_sidebar('hala-left-sidebar') && !is_active_sidebar('hala-left-sidebar') ) {
					$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				}
				?>
				<!-- Start Left Sidebar -->
				<?php if ( $tb_blog_layout == '2cl' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> sidebar sidebar-left">
						<?php if (is_active_sidebar('hala-left-sidebar')) { dynamic_sidebar('hala-left-sidebar'); } else { dynamic_sidebar('hala-main-sidebar'); } ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content mo-blog">
					<?php
					while ( have_posts() ) : the_post(); ?>
					  <article <?php post_class(); ?>>
                        <div class="mo-post-item">
                            <div class="mo-media <?php echo get_post_format(); ?>">
                            <?php get_template_part( 'framework/templates/blog/entry', get_post_format()); ?>
                            </div>
                            <div class="post-detail">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <ul class="meta-post">
                                 <li><?php echo get_the_date('d M, Y'); ?></li>
                                 <li><?php echo esc_html__('By ', 'hala').get_the_author(); ?></li>
                                 <li><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?> <?php echo esc_html__('Comments', 'hala'); ?></a></li>
                                 <li><?php if( function_exists('Hala_post_favorite') ) Hala_post_favorite(); ?></li>
                                 <li><?php the_terms( get_the_ID(), 'category' ); ?></li>
                               </ul>
							   <?php the_content(); 
							   wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'hala'),
                                    'after' => '</div>',
                                )); ?>
                                
                                <div class="tags-share">
                                    <div class="tags">
                                       <?php the_tags( esc_html__('TAGS : ', 'hala'), '' ); ?>
                                    </div>
                                    <?php if ( $tb_post_show_post_share ) { 
                                     hala_social_share(); 
                                    }?>  
                                </div>
                            <!-- tags-share -->
                        </div>
                        </div>
                      </article>
					<?php
					   if($tb_post_show_post_nav ){ echo hala_post_directions(); }
					   if ( $tb_post_show_post_author ) { echo hala_post_author_bio(); }
					   // If comments are open or we have at least one comment, load up the comment template.
					   if ( (comments_open() && $tb_post_show_post_comment) || (get_comments_number() && $tb_post_show_post_comment) ) comments_template();
					endwhile;
					?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if ( $tb_blog_layout == '2cr' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_right) ?> sidebar sidebar-right">
						<?php if (is_active_sidebar('hala-right-sidebar')) { dynamic_sidebar('hala-right-sidebar'); } else { dynamic_sidebar('hala-main-sidebar'); } ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
   </div> 
</div> 
<?php get_footer(); ?>