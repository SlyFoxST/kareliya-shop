<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;

}?>
<div class="flex wrap-breadcrums">

	<div>
		<?php

		if ( ! empty( $breadcrumb ) ) {

			echo $wrap_before;

			foreach ( $breadcrumb as $key => $crumb ) {

				echo $before;

				if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
					echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
				} else {
					echo '<span>' . esc_html( $crumb[0] ) . '</span>';
				}

				echo $after;

				if ( sizeof( $breadcrumb ) !== $key + 1 ) {
					echo '<img src='.get_template_directory_uri().'/img/br.png>';
				}
			}

			echo $wrap_after;

		}
		?>
	</div>
	<!-- <div>
		<div class="stoimost">
			<div class="btn-price-filters">Стоимость</div>
			<ul class="filter-price" data="50">
				<li min="15000" max="30000" data="50">От 15.000 до 40.000</li>
				<li min="40000" max="60000" data="50">От 40.000 до 60.000</li>
				<li min="60000" max="200000" data="50">От 60.000 до 200.000</li>
			</ul>
			
		</div>
	</div> -->
</div>

