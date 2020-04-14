<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<div class="main-content">
	<?php require Hala_ABS_PATH . '/woocommerce/title-bar-shop.php'; ?>
	<div class="internal-content">
	   <div class="container">
			<div class="single-product-content">
				<?php while ( have_posts() ) : the_post(); 
				 wc_get_template_part( 'content', 'single-product' ); 
				 endwhile; // end of the loop. ?>
			</div>
		</div>
   </div>
</div>
<?php get_footer( 'shop' ); ?>