<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$obj = get_queried_object();
$fields = get_fields(483);
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

?>

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title">
			<?php
		echo $obj->name;
			?>

		</h1>
	<?php endif; ?>
	<div class="wrap-btns-products flex space-between">
		<div class="wrap-btn-popup flex">
			<div class="popup-zacas">
				Правила заказа
			</div>
			<div class="popup-dostavka">
				Доставка и оплата
			</div>
			<div class="pratnaja-svjaz">
				Обратная связь
			</div>
		</div>
		<div class="stoimost">
			<div class="btn-price-filters">Стоимость</div>
			<ul class="filter-price" data="<?= $obj->term_id;?>">
				<li min="15000" max="30000" data="<?= $obj->term_id;?>">От 15.000 до 40.000</li>
				<li min="40000" max="60000" data="<?= $obj->term_id;?>">От 40.000 до 60.000</li>
				<li min="60000" max="200000" data="<?= $obj->term_id;?>">От 60.000 до 200.000</li>
			</ul>
			
		</div>
	</div>
</header>
<div class="flex">
	<div class="sidebar">
		<?php 
		$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;
		$pad_counts   = 0; 
		$hierarchical = 1; 
		$title        = '';  
		$empty        = 0;
		$shop_category = array(
			'taxonomy'     => $taxonomy,
			'hide_empty'   => false,
			'hierarchical' => 1,
			'exclude'      => array(52,84,82,86),
			'orderby'       => 'id',
			'order'         => 'ASC',
		);
		
		$cat_product = get_categories($shop_category);?>
		<ul>
			<?php
			foreach ($cat_product as $cat_p) :
				$category_id = $cat_p->term_id;
				if($obj->term_id == $cat_p->term_id){
					$class = "active";
				}
				else{
					$class = "noactive";
				}
				?>
				<li class="<?= $class?>  category<?= $cat_p->term_id;?>">
					<a href="<?= get_term_link($cat_p->term_id, $taxonomy = 'product_cat');?>">
						<div class="title"><?php echo $cat_p->name; ?></div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="product-container">
		<?php
		if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );

	//woocommerce_product_loop_start();
	?>
	<div class="flex list-product">

		<?php
		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
				wc_get_template_part( 'content', 'product' );
			}
		}

	//woocommerce_product_loop_end();
		?>

		<?php

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

?>
</div>
</div>



<div class="flex dop-inf">
	<?php //print_r($fields);
	if(!empty($fields['add_list'])){
		foreach ($fields['add_list'] as $value) {
			?>
			<div class="wrap-info">
				<div class="img-logo">
					<img src="<?= wp_img_resize($value['izobrazhenie'],'icon')?>"  alt="<?=  $value['zagolovok'];?>" />
				</div>
				<div class="title-inf">
					<h2><?=  $value['zagolovok'];?></h2>
				</div>
				<div class="descrip-inf">
					<?=  $value['opisanie'];?>
				</div>
			</div>
			<?php

		}
	}
	?>
</div>
<div class="flex dostavka-inf">
	<div class="in-dost pop-up-moscau">Доставка: <span>в Москве</span></div>
	<div class="in-dost pop-up-piter"><span>в Санкт-Петербурге</span></div>
	<div class="in-dost pop-up-other"><span>другой город</span></div>
</div>
<?php

get_footer( 'shop' );
