<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
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
	exit;
}

?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo esc_html_('calculated_shipping'); ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<!--h2><?php esc_html_e( 'Cart Totals', 'hala' ); ?></h2-->

	<div class="row">
		<div class="col-md-12">
			<div class="grand-total">
				<h4><?php esc_html_e( 'Cart Totals', 'hala' ); ?></h4>
				<div class="total-wrap">
					<ul class="shop_table shop_table_responsive">

						<li class="cart-subtotal">
							<span class="title"><?php esc_html_e( 'Subtotal', 'hala' ); ?></span>
							<span data-title="<?php esc_attr_e( 'Subtotal', 'hala' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></span>
						</li>

						<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
							<li class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
								<span class="title"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
								<span data-title="<?php wc_cart_totals_coupon_label( $coupon ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
							</li>
						<?php endforeach; 
						 if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : 
						    do_action( 'woocommerce_cart_totals_before_shipping' ); 
							 wc_cart_totals_shipping_html(); 
							 do_action( 'woocommerce_cart_totals_after_shipping' ); 
							 elseif ( WC()->cart->needs_shipping() ) : ?>

							<li class="shipping">
								<span class="title"><?php esc_html_e( 'Shipping', 'hala' ); ?></span>
								<span data-title="<?php esc_attr_e( 'Shipping', 'hala' ); ?>"><?php woocommerce_shipping_calculator(); ?></span>
							</li>

						<?php endif; 
						 foreach ( WC()->cart->get_fees() as $fee ) : ?>
							<li class="fee">
								<span class="title"><?php echo esc_html( $fee->name ); ?></span>
								<span data-title="<?php echo esc_html( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></span>
							</li>
						<?php endforeach; 
						if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
							$taxable_address = WC()->customer->get_taxable_address();
							$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
									? sprintf( ' <small>(' . esc_html__( 'estimated for %s', 'hala' ) . ')</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
									: '';

							if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
								<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
									<li class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
										<span class="title"><?php echo esc_html( $tax->label ) . $estimated_text; ?></span>
										<span data-title="<?php echo esc_html( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
									</li>
								<?php endforeach;
								else : ?>
								<li class="tax-total">
									<span class="title"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></span>
									<span data-title="<?php echo esc_html( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></span>
								</li>
							<?php endif; 
							 endif; 
							 do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

						<li class="order-total">
							<span class="title"><?php esc_html_e( 'Total', 'hala' ); ?></span>
							<span data-title="<?php esc_attr_e( 'Total', 'hala' ); ?>"><?php wc_cart_totals_order_total_html(); ?></span>
						</li>

						<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

					</ul>
				</div>
			</div>
			
			
			<div class="wc-proceed-to-checkout">
			  <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		    </div>
		
		</div>
	</div>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
</div>