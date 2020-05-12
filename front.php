<?php
//Template name: Главная
get_header('shop2');
$category = array(
	'taxonomy'     => 'product_cat',
	'hide_empty'   => false,
	'hierarchical' => 1,
	'exclude'      => array(52,84,82,86),
	'orderby'       => 'id',
	'order'         => 'ASC',
);
$cat = get_categories($category);
while(have_posts()){
	the_post();?>
	<div class="shop-wrap2">
		<div class="container">
			<section class="gold-karelii">
				<div class="block-ramka">
					<h2><?= get_post_meta($post->ID,'zagolovok',true)?></h2>
					<div class="desc-gold">
						<?= get_post_meta($post->ID,'dopopisanie',true)?>
					</div>
					<img class="ramka4" src="<?= get_template_directory_uri()?>/img/ramka.png" alt="<?php the_title();?>" />
					<img class="ramka3" src="<?= get_template_directory_uri()?>/img/ramka.png" alt="<?php the_title();?>" />
					<img class="ramka2" src="<?= get_template_directory_uri()?>/img/ramka.png" alt="<?php the_title();?>" />
					<img class="ramka1" src="<?= get_template_directory_uri()?>/img/ramka.png" alt="<?php the_title();?>" />
				</div>
			</section>
			<div class="owl-carousel owl-theme">
				<?php if( have_rows('images_slider') ): ?>

					<?php while( have_rows('images_slider') ): the_row(); ?>
						<div>
							<img src="<?= get_sub_field('img') ?>" class="img-fluid" alt="<?php the_title()?>"/>
						</div>

					<?php endwhile; ?>

				<?php endif; ?>
			</div>
		</div>

	</div>

	<div class="section-white">
		<div class="container">
			<h2>Каталог товаров</h2>
			<div class="txt-cat flex">
				<div class="popular-tab">Популярное</div><div class="other-tab active">ЕЩЕ</div>
			</div>
			<div class="section-popular flex popular-block none">
				<?php
				foreach ($cat as $term){
					if(get_term_meta($term->term_id,'popular',true) == 1){
						$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
						$image = wp_get_attachment_url( $thumbnail_id );
						?>
						<div class="block_popular_term">
							<div class="previu-term">
								<a href="<?= get_term_link($term->term_id,'product_cat');?>">
									<img src="<?= $image?>" alt="<?= $term->name?>" class="img-fluid"/>
								</a>
							</div>
							<div class="title-term">
								<h3><?= $term->name?></h3>
							</div>
							<div class="sum">
								<?= 'от ' . get_term_meta($term->term_id,'price_tax',true) . ' p.';?>
							</div>
							<div class="term_btn">
								<a href="<?= get_term_link($term->term_id,'product_cat');?>">В каталог</a>
							</div>
						</div>

						<?
					}

				}

				?>
			</div>
			<div class="section-popular flex other-block">
				<?php
				foreach ($cat as $term){

					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					?>
					<div class="block_popular_term">
						<div class="previu-term">
							<a href="<?= get_term_link($term->term_id,'product_cat');?>">
								<img src="<?= $image?>" alt="<?= $term->name?>" class="img-fluid"/>
							</a>
						</div>
						<div class="title-term">
							<h3><?= $term->name?></h3>
						</div>
						<div class="sum">
							<?= 'от ' . get_term_meta($term->term_id,'price_tax',true) . ' p.';?>
						</div>
						<div class="term_btn">
							<a href="<?= get_term_link($term->term_id,'product_cat');?>">В каталог</a>
						</div>
					</div>

					<?
					

				}

				?>
			</div>
		</div>
	</div>
	<div class="section-priimushestva">
		<div class="p15">
			<div class="flex block-items">
				<?php if( have_rows('add_priim') ): ?>

					<?php while( have_rows('add_priim') ): the_row(); ?>

						<div class="block-icon">
							<div class="img-icon">
								<img src="<?= get_sub_field('zagruzit_ikonku');?>" alt="<?php the_title()?>" />
							</div>
							<div class="icon-title">
								<?= get_sub_field('add_zag');?>
							</div>
							<div class="icon-desc">
								<?= get_sub_field('desc_in');?>
							</div>
						</div>

					<?php endwhile; ?>

				<?php endif; ?>
			</div>

			<div class="desc-dop">
				<?= wpautop(get_post_meta($post->ID,'opis',true));?>
			</div>
			<div class="flex dostavka-inf">
				<div class="in-dost pop-up-moscau"><span class="dost">Доставка:</span> <span>в Москве</span></div>
				<div class="in-dost pop-up-piter"><span>в Санкт-Петербурге</span></div>
				<div class="in-dost pop-up-other"><span>другой город</span></div>
			</div>
		</div>
	</div>

	<?php	
}


get_footer();


?>