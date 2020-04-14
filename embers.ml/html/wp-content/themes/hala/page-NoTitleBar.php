<?php
/*
Template Name: No Title Bar Template
*/
get_header(); 
global $hala_options;
$tb_show_page_comment = (int) isset($hala_options['page_comment']) ?  $hala_options['page_comment']: 1; ?>
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); 
		        the_content(); ?>
				<div class="container">
                 <?php if($tb_show_page_comment){ 
				  if ( comments_open() || get_comments_number() ) comments_template();
				  } ?>	
                </div>
		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>