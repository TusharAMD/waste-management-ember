<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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

global $post, $woocommerce, $product;

if ( has_post_thumbnail() ) {
	$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
	$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
	$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
		'title'	=> get_the_title( get_post_thumbnail_id() )
	) );

	$attachment_count = count( $product->get_gallery_image_ids() );
	
	if ( $attachment_count > 0 ) {
		$image_ids = $product->get_gallery_image_ids();
		$output = '';
		$output .= '<div class="mo-slick-slider">';
		foreach($image_ids as $image_id) {
			$image_link = wp_get_attachment_url( $image_id );
			$output .= '<img src="'.esc_url($image_link).'" alt="%s"/>';
		}
		$output .= '</div>';
		
		$output .= '<div class="mo-slick-slider-nav">';
		foreach($image_ids as $image_id) {
			$image_link = wp_get_attachment_url( $image_id );
			$output .= '<div class="slider-item"><img src="'.esc_url($image_link).'" alt="%s"/></div>';
		}
		$output .= '</div>';
		echo _($output);
	} else {
		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image lightbox-gallery" title="%s" >%s</a>', $image_link, $image_caption, $image ), $post->ID );
	}
} else {
	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'hala' ) ), $post->ID );
}
?>