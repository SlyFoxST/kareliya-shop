<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
global $post;

$fields = get_fields();
$query_upakovka = new WP_Query( [
	'post_type' => 'product',
	'tax_query' => [
		[
			'taxonomy' => 'product_cat',
			'field'    => 'id',
			'terms'    => 84,
		]
	]
] );

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>"  class="flex container-product-information">
	<div class="slider-wrap">
		<div class="product-information none mobile-block">
			<div class="wrap-term flex space-between">
				<div>
					<h1><?php the_title()?></h1>
				</div>
				<div class="proizvod">
					<?php if(!empty($fields['proizvodstvo'])): echo $fields['proizvodstvo']; endif; ?>
				</div>
			</div>
			<div class="wrap-term flex">
				<div class="term-price">
					<?= $product->get_regular_price() . '<div class="val">₽</div>';?>
				</div>
				<div class="add-to-cart">
					<a href="/shop/?add-to-cart=<?= $product->get_id()?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?= $product->get_id()?>" data-product_sku="" aria-label="" rel="nofollow" style="position: static !important;">В корзину</a>
				</div>
			</div>
		</div>
		<?php
		$attachment_ids = $product->get_gallery_attachment_ids();
		?>
		<div class="slider slider-single">
			<?php
			foreach( $attachment_ids as $attachment_id ) 
				{?>
					<a  rel="group" href="<?= wp_get_attachment_image_url($attachment_id,'slider-big'); ?>">
						<div>
							<h3>							
								<img src="<?=  wp_img_resize(wp_get_attachment_image_url($attachment_id), 'slider-big');?>" alt="">
							</h3>
						</div>
					</a>
					<?php

				}
				?>
			</div>


			<div class="previe-carousel">
				<div class="slider slider-nav">
					<?php
					foreach( $attachment_ids as $attachment_id ) 
						{?>
							<div class="slide-prev"><img src="<?=  wp_img_resize(wp_get_attachment_image_url($attachment_id),'slider-prev');?>" alt=""></div>
							<?php

						}
						?>

					</div>
				</div>
				<div class="short-description ">
					<?php $categories = get_the_terms( $product->id, 'product_cat' );
					foreach ($categories as $desc) {
						echo $desc->description;
					}
									//	echo $categories['description']; 
					?>
					
				</div>
				<div class="flex dostavka-inf single-dostavka-inf">
					<div class="in-dost pop-up-moscau"><span class="dost">Доставка: </span><span>в Москве</span></div>
					<div class="in-dost pop-up-piter"><span>в Санкт-Петербурге</span></div>
					<div class="in-dost pop-up-other"><span>другой город</span></div>
				</div>
				<div class="single-info-description">
					На сайте установлен сервис он-лайн платежей Яндекс касса. 
					Вы можете оплатить заказ:   банковской картой, электронными деньгами, через свой интернет банк,
					со счета телефона, наличными через терминал, др. виды оплат.
					Оплата со своего расчетного счета для юридических лиц.              
				</div>
			</div>

			<div class="product-information">
				<div class="wrap-term flex space-between tablet-none">
					<div>
						<h1><?php the_title()?></h1>
					</div>
					<div class="proizvod">
						<?php if(!empty($fields['proizvodstvo'])): echo $fields['proizvodstvo']; endif; ?>
					</div>
				</div>
				<div class="wrap-term flex tablet-none">
					<div class="term-price">
						<?= $product->get_regular_price() . '<div class="val">₽</div>';?>
					</div>
					<div class="add-to-cart tablet-none">
						<a href="/shop/?add-to-cart=<?= $product->get_id()?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?= $product->get_id()?>" data-product_sku="" aria-label="" rel="nofollow" style="position: static !important;">В корзину</a>
					</div>
				</div>
				<div class="content-inf-product tablet-none	">
					<?php the_content()?>
				</div>
				<div class="wrap-btns-products flex space-between">
					<div class="flex-btns-pop">
						<div class="tabs-zakaz none">
							<a href="http://coder.cx.ua/coder.sub/cart">Оформить заказ</a>
						</div>
						<div class="tabs-dostavka">
							Доставка
						</div>
						<div class="tabs-oplata">
							Оплата
						</div>		

						<div class="tabs-svjaz">
							Обратная связь
						</div>
					</div>
				</div>
				<div class="info-txt oplata">
					Оплата товара происходит после оформления заказа и получения ответа менеджера
				</div>
				<div class="info-txt dastavka none">
					It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</div>

				<div class="flex space-between content-charact">
					<div class="term-txt">
						<?php if(!empty($fields['material'])):?>
							<div class="term-i">
								<div class="term-n">
									Материал:
								</div>
								<div class="term-d">
									<?= $fields['material']?>
								</div>
							</div>
						<?php endif;
						if($product->get_weight()){?>
						<div class="term-i">
							<div class="term-n">
								Вес:
							</div>
							<div class="term-d">
								<?= $product->get_weight() . ' кг';?>
							</div>
						</div>
						<?php
					}
					if($product->get_length()){?>
					<div class="term-i">
						<div class="term-n">
							Длина:
						</div>
						<div class="term-d">
							<?= $product->get_length() . ' см';?>
						</div>
					</div>
					<?php
				}
				if($product->get_height()){?>
				<div class="term-i">
					<div class="term-n">
						Высота:
					</div>
					<div class="term-d">
						<?= $product->get_height() . ' см';?>
					</div>
				</div>
				<?php
			}
			if(!empty(get_post_meta($product->get_id(),'obyom',true))){?>
				<div class="term-i">
					<div class="term-n">
						Объём:
					</div>
					<div class="term-d">
						<?= get_post_meta($product->get_id(),'obyom',true) . ' м³'?>
					</div>
				</div>
				<?php
			}
			?>
			<div class="term-i">
				<div class="term-n">
					Характеристики:
				</div>
				<div class="term-d">
					<?= $fields['harakteristiki']?>
				</div>
			</div>
		</div>
		<div class="btn-inf">
			<div class="btn-personalisation">
				<a href="/shop/?add-to-cart=607" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="607" data-product_sku="" aria-label="" rel="nofollow" style="position: static !important;">Персонализация
				</a>
			</div>
			<div class="btn-personalisation">
				<a href="/shop/?add-to-cart=609" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="609" data-product_sku="" aria-label="" rel="nofollow" style="position: static !important;">Гравировка
				</a>	
			</div>
			<div class="btn-personalisation btn-upakovka">
				Упаковка
			</div>
		</div>

	</div>
	<div class='wrap-upakovka none'>
		<div class="flex">
						<!-- <div class="pust">
						</div> -->
						<div class="upakovka">
							<div class="flex upakovka-flex">
								<?php
								while($query_upakovka->have_posts()){
									$query_upakovka->the_post();
									?>
									<div class="prev-pr prev-pr-upakovka">
										<img src="<?=  wp_img_resize(get_the_post_thumbnail_url(get_the_ID()),'slider-prev');?>" alt="<?php the_title()?>" />
										<a href="/shop/?add-to-cart=<?= $product->get_id()?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?= $product->get_id()?>">Добавить к покупке</a>
									</div>
									<?php
								}
								wp_reset_query();
								?>
							</div>
							<div class="btn-personalisation">
								<a href="http://coder.cx.ua/coder.sub/upakovka/">
									Смотреть все
								</a>
							</div>
						</div>

					</div>
				</div>

				<?= get_template_part('woocommerce/single','product-reviews')?>
				<?php
				$id = get_the_ID();
				$query = new WP_Query( [
					'post_type' => 'product',
					'post__not_in' => array($id),
					'tax_query' => [
						[
							'taxonomy' => 'product_cat',
							'field'    => 'id',
							'terms'    => $product->get_category_ids(),
						]
					]
				] );
				if($query->have_posts()):?>
				<div class="title"><h3>Похожие товары</h3></div>
				<div class="flex more-product">
					<?php
					while($query->have_posts()){
						$query->the_post();
						?>
						<div class="prev-pr">
							<a href="<?php the_permalink()?>">
								<img src="<?=  wp_img_resize(get_the_post_thumbnail_url(get_the_ID()),'slider-prev');?>" alt="<?php the_title()?>">
							</a>
						</div>
						<?php
					}
					wp_reset_query();
				endif;
				?>
			</div>

		</div>

	</div>


