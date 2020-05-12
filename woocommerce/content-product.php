<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}?>
<div class="section-product col">
	<div class="previe-product">
		<a href="<?= get_permalink($product->get_id());?>">
			<?php $url = get_the_post_thumbnail_url($product->get_id()) ?>
			<img src="<?= $url?>" alt="<?= $product->get_name();?>" class="img-fluid" />
		</a>
	</div>
	<div class="product-title">
		<h2>
			<a href="<?= get_permalink($product->get_id());?>">
				<?= $product->get_name();?>
			</a>
		</h2>
	</div>
	<div class="product_price">
		<?= $product->get_price_html();?>
	</div>
	<div class="add_to_cart">
		<a href="<?= get_permalink($product->get_id())?>"  class="" data-product_id="<?= $product->get_id()?>"  rel="nofollow">Подробнее</a>
	</div>
</div>
