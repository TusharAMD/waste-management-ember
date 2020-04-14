<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
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
	<div class="container">
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0 col-lg-9 col-lg-offset-0 archive-product">
				<?php if ( have_posts() ) : ?>
					<div class="mo-action-bar clearfix">
						<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>
					</div>

					<div class="row">
						<?php while ( have_posts() ) : the_post(); 
						 wc_get_template_part( 'content', 'product' );
						 endwhile; // end of the loop. ?>
					</div>

					<?php
						/**
						 * woocommerce_after_shop_loop hook.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					 elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : 
					 wc_get_template( 'loop/no-products-found.php' ); 
					 endif; ?>
			</div>
			<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-3 col-lg-offset-0 sidebar-right">
				<?php if (is_active_sidebar('hala-shop-right-sidebar')) dynamic_sidebar('hala-shop-right-sidebar'); ?>
			</div>
	</div>
</div>	
<?php get_footer( 'shop' ); ?>
