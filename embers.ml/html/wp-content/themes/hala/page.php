<?php get_header(); 
global $hala_options;
$tb_show_page_title = isset($hala_options['tb_page_show_page_title']) ? $hala_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_page_show_page_breadcrumb']) ? $hala_options['tb_page_show_page_breadcrumb'] : 1;
$tb_show_page_comment = (int) isset($hala_options['page_comment']) ?  $hala_options['page_comment']: 1; ?>
<div class="main-content">
   <?php Hala_title_bar($tb_show_page_title, $tb_show_page_breadcrumb); ?>
   <div class="internal-content">
	<?php if(class_exists('Vc_Manager')) { ?>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
			<?php while ( have_posts() ) : the_post(); 
			    the_content(); ?>
				<div style="clear: both;"></div>
				<?php if($tb_show_page_comment){
					if ( comments_open() || get_comments_number() ) comments_template(); 
					 } 
					 endwhile; // end of the loop. ?>
       		</div>
		</div>
	</div>
	<?php } else { ?>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <?php while ( have_posts() ) : the_post();
				    the_content(); ?>
                    <div style="clear: both;"></div>
                        <?php if($tb_show_page_comment){ 
						  if ( comments_open() || get_comments_number() ) comments_template(); ?>
                        <?php } 
						endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>
	<?php } ?>
   </div>
</div>    
<?php get_footer(); ?>