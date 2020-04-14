<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
global $post, $product; ?>
<div class="product_meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<h6><?php esc_html_e( 'Quick info', 'hala' ); ?></h6>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<div class="SKU_in"><span><?php esc_html_e( 'SKU: ', 'hala' ); ?></span><?php echo esc_attr( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'hala' ); ?> </div>
	<?php endif; 
    echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="posted_in"><span>' . _n( ' Category:', 'Categories:', count( $product->get_category_ids() ), 'hala' ) . ' </span>', '</div>' ); ?>
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tagged_as"><span>' . _n( ' Tag:', 'Tags:', count( $product->get_tag_ids() ), 'hala' ) . ' </span>', '</div>' ); ?>
	 <?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>