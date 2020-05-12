<?php
get_header('shop');
//Template name: Интерент магазин

defined( 'ABSPATH' ) || exit;
$fields = get_fields();
$obj = get_queried_object();
?>

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title">
			ШАХМАТЫ АВТОРСКИЕ РУЧНОЙ РАБОТЫ
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
			<ul class="filter-price" data="50">
				<li min="15000" max="30000" data="50">От 15.000 до 40.000</li>
				<li min="40000" max="60000" data="50">От 40.000 до 60.000</li>
				<li min="60000" max="200000" data="50">От 60.000 до 200.000</li>
			</ul>
			
		</div>
	</div>
</header>
<div class="flex">
	<div class="sidebar">
		<?php 
		$query = new WP_Query( array(
			'post_type' => 'product',
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'id',
					'terms'    => 50,
				)
			)
		) );
		$taxonomy     = 'product_cat';  
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
				if($cat_p->term_id == 50){
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
		if ( woocommerce_product_loop('total') ) {

			?>
			<div class="flex list-product">
				<?php
				
				while ( $query->have_posts() ) {
					$query->the_post();
					wc_get_template_part( 'content', 'product' );
				}


				do_action( 'woocommerce_after_shop_loop' );
			} else {

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
	<?php 
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
	<div class="in-dost pop-up-moscau"><span class="dost">Доставка:</span> <span>в Москве</span></div>
	<div class="in-dost pop-up-piter"><span>в Санкт-Петербурге</span></div>
	<div class="in-dost pop-up-other"><span>другой город</span></div>
</div>
<?php
get_footer();
?>