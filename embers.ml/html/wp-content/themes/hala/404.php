<?php
/*
Template Name: 404 Template
*/
get_header(); 
global $hala_options;
$tb_show_page_title = isset($hala_options['tb_page_show_page_title']) ? $hala_options['tb_page_show_page_title'] : 1;
$tb_show_page_breadcrumb = isset($hala_options['tb_page_show_page_breadcrumb']) ? $hala_options['tb_page_show_page_breadcrumb'] : 1; ?>
<div class="main-content"> 
<?php Hala_title_bar($tb_show_page_title, $tb_show_page_breadcrumb);?>
	<div class="no-content-page">
		<div class="container">
			<div class="text-center">
                    <h1 class="lrg"><?php echo esc_html__( '404', 'hala' ); ?></h1>
                    <h2><?php echo esc_html__( 'We are sorry, the page you want isn’t here anymore.', 'hala' ); ?></h2>
                    <h3><?php echo esc_html__( 'May be one of the links below can help !', 'hala' ); ?></h3>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-post"><i class="fa fa-long-arrow-right"></i><?php echo esc_html__('Back to Home Page', 'hala'); ?></a>
                </div>
		</div>
	</div>
</div>    
<?php get_footer(); ?>