<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corporates
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header class="header-home">
		<div class="burger-menu front-burger none">
			<div class="burger">
				<div class="line-burger"></div>
			</div>
		</div>
		<div class="mobile-menu">
			<?php 
			$taxonomy     = 'product_cat';
			$shop_category = array(
				'taxonomy'     => $taxonomy,
				'hide_empty'   => false,
				'hierarchical' => 1,
				'exclude'      => 52,
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
							<?php echo $cat_p->name; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<ul>
				<li><a href="http://coder.cx.ua/coder.sub/">Главная</a></li>
				<li><a href="#">О нас</a></li>
				<li><a href="http://coder.cx.ua/coder.sub/catalog/">Магазин</a></li>
			</ul>
		</div>
		<div class="container">
			<div class="flex home-header-menu">
				<div class="menu mnu-front width40">
					<ul class="flex home-ul1 align-center ">
						<li><a href="http://coder.cx.ua/coder.sub/">Главная</a></li>
						<li><a href="#">О нас</a></li>
						<li><a href="http://coder.cx.ua/coder.sub/catalog/">Каталог товаров</a></li>
					</ul>
				</div>

				<div class="logo2 flex center align-center">
					<a href="http://coder.cx.ua/coder.sub/catalog/">
						<img src="<?= get_template_directory_uri()?>/img/logo2.png" alt="<?php the_title()?>" />
					</a>
				</div>
				<div class="menu2 mnu-front">
					<ul class="flex center align-center">
						<li><a href="#" class="popup-dostavka2">Доставка и оплата</a></li>
						<li><a href="#" class="popup-zacas2">Правила заказа</a></li>
						<li><a href="#" class="pratnaja-svjaz2">Обратная связь</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>





