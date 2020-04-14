<?php 
global $product; 
/* set on sale html */
$sale = '';
if ( $product->is_on_sale() ) {
	$sale = '<span class="onsale">' . esc_html__( 'Sale!', 'hala' ) . '</span>';
}

/* set price html */
$price_html = $product->get_price_html();

/* set btn add to cart */
$product_type = '';
if( $product->is_type( 'simple' ) ) {
	$product_type = 'simple';
} elseif( $product->is_type( 'grouped' ) ) {
	$product_type = 'grouped';
} elseif( $product->is_type( 'external' ) ) {
	$product_type = 'external';
} else {
	$product_type = 'variable';
}
/* set btn add to cart */
$class = implode( ' ', array_filter( array(
				'button',
				'product_type_' . $product_type,
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
		) ) );
$add_to_cart = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( isset( $quantity ) ? $quantity : 1 ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					esc_attr( isset( $class ) ? $class : 'button' ),
					'<i class="fa fa-shopping-cart"></i>'
				);

/* set categories html */
$cats = get_the_term_list( get_the_ID(), 'product_cat', '', ' / ' ); ?>
<article <?php post_class(); ?>>
	<div class="mo-thumb">
		<?php 
			echo '<div>'.$sale.'</div>' ;
			if ( has_post_thumbnail() ) the_post_thumbnail('full');
		?>
	</div>
	<div class="mo-content">
		<ul class="mo-action">
             <?php $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
             <li><a class="lightbox-gallery" href="<?php echo esc_url($full); ?>"><i class="fa fa-search"></i></a></li>
			 <li><?php echo '<span>'.$add_to_cart.'</span>' ;?></li>
		</ul>
		<h3 class="mo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="mo-categories"><?php echo get_the_term_list( get_the_ID(), 'product_cat', '', ' / ' ); ?></div>
		<?php if ( $price_html) echo '<div class="mo-price"><span>'.$price_html.'</span></div>'; ?>
	</div>
</article>