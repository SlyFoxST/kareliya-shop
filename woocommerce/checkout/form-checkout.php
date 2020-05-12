<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
$objem = array();
$ves   = array();
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

<div class="container">
	<?php do_action( 'woocommerce_before_cart' ); ?>

	<div class="flex-cart-wrap p152">
		<div class="cart-form">
			<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<?php do_action( 'woocommerce_before_cart_table' ); ?>

				<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
					<thead>
						<tr>
							<th class="product-thumbnail">&nbsp;</th>
							<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
							<th class="product-name"><?php esc_html_e( 'Вес', 'woocommerce' ); ?></th>
							<th class="product-name"><?php esc_html_e( 'Длина', 'woocommerce' ); ?></th>
							<th class="product-name"><?php esc_html_e( 'Высота', 'woocommerce' ); ?></th>
							<th class="product-name"><?php esc_html_e( 'Объём', 'woocommerce' ); ?></th>
							<th class="product-subtotal"><?php esc_html_e( 'Итог', 'woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<td class="product-thumbnail checkout-thumbnail">
										<a href="<?php the_permalink()?>">
											<img src="<?= get_the_post_thumbnail_url($_product->get_id());?>"/>
											
										</a>
									</td>

									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}

						?>
					</td>

					<td data-title="<?php esc_attr_e( 'Вес', 'woocommerce' ); ?>">
						<?php
						if(!empty($_product->get_weight())):
							?>
							<?= "<strong>" . $_product->get_weight() . " кг</strong>";
							$ves[] =+ $_product->get_weight();

						endif;
						?>
					</td>
					<td  data-title="<?php esc_attr_e( 'Длина', 'woocommerce' ); ?>">
						<?php
						if(!empty($_product->get_length())):
							?>
							<?= "<strong>" . $_product->get_length() . " см</strong>";
							endif;?>
						</td>
						<td data-title="<?php esc_attr_e( 'Высота', 'woocommerce' ); ?>">
							<?php
							if(!empty($_product->get_height())):?>
							<?= "<strong>" . $_product->get_height() . " см</strong>";?>
						<?php endif;?>
					</td>
					<td data-title="<?php esc_attr_e( 'Объём', 'woocommerce' ); ?>">
						<?php
						if(!empty(get_post_meta($_product->get_id(),'obyom',true) )):?>
						<?php $objem[] += get_post_meta($_product->get_id(),'obyom',true); ?>
						<?= "<strong>" . get_post_meta($_product->get_id(),'obyom',true) . "м³</strong>";?>
					<?php endif;?>
				</td>
				<td class="product-subtotal" data-title="<?php esc_attr_e( 'Итог', 'woocommerce' ); ?>">
					<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</td>
						</tr>


						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>

				<?php $sum_objem = array_sum($objem);?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<?php if(!empty($ves)):?>
							<?= '<strong>Общий вес: ' . array_sum($ves) . ' кг</strong> '; ?>
						<?php endif;?>
					</td>
					<td>
						<?php if(!empty($sum_objem)):?>
							<?= '<strong>Общий объём: ' . $sum_objem . ' м³</strong>'?>
						<?php endif;?>
					</td>
					<td>Итого:</td>
					<td><?php wc_cart_totals_order_total_html(); ?></td>
				</tr>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php //do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set flex" id="customer_details">
			<div class="wrap-cart-billing">
				<?php //print_r(WC()->shipping->get_shipping_methods();)?>
				<div class="woocommerce-billing-fields__field-wrapper">
					<p class="form-row form-row-first thwcfd-field-wrapper thwcfd-field-text validate-required" id="billing_first_name_field" data-priority="10">
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="Имя" value="" autocomplete="given-name">
						</span>
					</p>
					<p class="form-row form-row-last thwcfd-field-wrapper thwcfd-field-text validate-required" id="billing_last_name_field" data-priority="20">
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="Фамилия" value="" autocomplete="family-name">
						</span>
					</p>
					<p class="form-row form-row-wide address-field thwcfd-field-wrapper thwcfd-field-state validate-required validate-state" id="billing_state_field" data-priority="40" style="opacity: 0;visibility: hidden; display: none;">
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " value="Россия" placeholder="Область / район" name="billing_state" id="billing_state" autocomplete="address-level1" data-input-classes="">
						</span>
					</p>
					<p class="form-row " id="city_cdek_field" data-priority="45">
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text ui-autocomplete-input" name="city_cdek" id="city_cdek" placeholder="Город" value="" autocomplete="off">
						</span>
					</p>
					<p class="form-row form-row-wide address-field thwcfd-field-wrapper thwcfd-field-text" id="billing_address_1_field" data-priority="60">
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Адрес" value="" autocomplete="address-line1">
						</span>
					</p>
					<p class="form-row form-row-wide thwcfd-field-wrapper thwcfd-field-tel validate-required validate-phone" id="billing_phone_field" data-priority="100">
						<span class="woocommerce-input-wrapper">
							<input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Телефон" value="" autocomplete="tel">
						</span>
					</p>
					<p class="form-row form-row-wide thwcfd-field-wrapper thwcfd-field-email validate-required validate-email" id="billing_email_field" data-priority="110">
						<span class="woocommerce-input-wrapper">
							<input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="E-mail" value="" autocomplete="email username"></span></p>	
						</div>
					</div>
					
					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php  do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>
				</div>


				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<?php endif; ?>




			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

		</form>
	</div>

	<div class="cart-result">

		<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

		<div class="cart-collaterals">
			<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		//do_action( 'woocommerce_cart_collaterals' );
		?>
	</div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>



