<div class="layout-page-apll relative none">
	<a  href="#section-application" class="top scroll-top2">
			<img src="http://coder.cx.ua/coder.sub/wp-content/themes/corporates/images/top.png" alt="Top"/>	
	</a>
	<div class="wrapper-silver">
		<div class="">
			<header class="header-aplic header-wrap-s header-scloll-a wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="0.7s" id="section-application">
				<div class="container relative">
					<div class="back-btn2">
						<div class="flex justify-end align-center">
							<?php get_template_part( 'template-parts/layouts/layout','btn' );?>
							<div class="header-title">
								<h2><?= pll__('мобильные прилoжения')?></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="line-h"></div>
			</header>

		</div>
		<section class="section-projects  container-page">
			<div class="fp-table" >
				<div class="fp-tableCell h100vh">
					<div class="flex center flex-wrap mb90">
						<?php

						if( have_rows('aplication') ):
							$c = 0.5;
							$d = 0.7;
							while ( have_rows('aplication') ) : the_row();

								if( get_row_layout() == 'add_info' ):

									?>
									<div class="block-work wow fadeInLeft"  data-wow-delay="<?= $c+=0.2?>s" data-wow-duration="<?= $d+= 0.3?>s">
										<div class="header-lyt capitalize" style="background: <?php the_sub_field('color_title')?>" ><?php the_sub_field('title')?></div>
										<div class="content-txt">
											<?php the_sub_field('desc')?>
										</div>
										<div class="absolute">
											<div class="price">
												<?php the_sub_field('czena')?>
											</div>

											<div class="button-flex flex w100">
												<a href="#form4" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
												<a href="#open" class="green2 title-hover activat-desc" data="<?php the_sub_field('nazvanie_galerei')?>"  style="background:<?php the_sub_field('osnovnoj_czvet')?> " data-title="<?= get_sub_field('title')?>" data-hover="<?= pll__('Пример')?>"><?= pll__('Описание');?></a>
											</div>
										</div>
									</div>

									<?php
								endif;

							endwhile;


						endif;

						?>

					</div>
				</div>
			</div>

		</section>

		<section class="section-project-face">
			<?php

			if( have_rows('aplication') ):
				$a = 0.7;
				$b = 0.2;
				while ( have_rows('aplication') ) : the_row();
					if( get_row_layout() == 'add_info' ):?>
					<div class="container section-each none" data-title="<?= get_sub_field('title')?>">
						<div class="fp-table" >
							<div class="fp-tableCell h100vh">
								<div class="mb-t90">
									<div class="sec-worck flex space-between flex-wrap" data-attr="<?= get_sub_field('title')?>">
										<div class="block-work wow fadeInRight" data-wow-delay="0.7s" data-wow-duration="0.8s">
											<div class="header-lyt" style="background: <?php the_sub_field('color_title')?>" ><?php the_sub_field('title')?></div>
											<div class="content-txt">
												<div class="mobile-hidden">
													<?php the_sub_field('desc')?>
												</div>
												<div class="mobile-block">
													<?php the_sub_field('kontent')?>
												</div>
											</div>
											<div class="absolute pr-a">
												<div class="price">
													<?php the_sub_field('czena')?>
												</div>
												<div class="button-flex none-btn flex">
													<a href="#form4" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
													<a href="#owl<?= get_sub_field('nazvanie_galerei')?>" class="green2 activat-desc" data="<?php the_sub_field('nazvanie_galerei')?>"  style="background:<?php the_sub_field('osnovnoj_czvet')?> " data-title="<?= get_sub_field('title')?>"><?= pll__('Пример')?></a>
												</div>
											</div>
										</div>
										<div class="content wow fadeInRight "   data-wow-delay="0.9s" data-wow-duration="1s">
											<?php the_sub_field('kontent')?>
										</div>
									</div>
								</div>
								<div class="fp-table" id="owl<?= get_sub_field('nazvanie_galerei')?>" >
									<div class="fp-tableCell h100vh">
										<div class="example2">
											<carousel-3d :width="229" :height="484" :border="0" :controls-visible="true"  :controls-prev-html="' '" :controls-next-html="' '" :controls-width="30" :controls-height="60" :clickable="false" :perspective="0" :space="250" :display=7 :autoplay="true" :autoplay-timeout="5000">
												<?php
												$c = 0;
												if( have_rows('foto_gal') ):
													while ( have_rows('foto_gal') ) : the_row();?>
													<slide :index="<?= $c?>">
														<figure>
															<a href="<?= get_sub_field('link_for_img'); ?>" target="_blank">
																<img src="<?= get_sub_field('add_img'); ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>" />
															</a>
														</figure>
													</slide>
													<?php
													$c++;
												endwhile;
											endif;
											?>
										</carousel-3d>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
			endif;

		endwhile;


	endif;

	?>

</section>


</div>

<div class="section-footer fuxcija p52">
	<div class="fp-table fuxcija"  id="form4" >
		<div class="fp-tableCell h100vh">
			<div class="container">
				<div class="flex form-flex"">
					<div class="section-form">
						<?php get_template_part( 'template-parts/layouts/form','layout' );?>
					</div>
					<div class="section-contact">
						<div class="map_container wow fadeIn" data-wow-delay="1.3s" data-wow-duration="2s">
							<div class="gmap" data-url="data/1.json" data-coords="{&quot;lat&quot;: 50.4362623, &quot;lng&quot;: 30.457125}" data-marker="one"></div>
						</div>
						<?php get_template_part( 'template-parts/layouts/contacts','layout' );?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

</div>