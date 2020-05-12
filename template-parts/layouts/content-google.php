<div class="layout-page-google relative none">
	<a  href="#section-google" class="top scroll-top2">	
		<img src="http://coder.cx.ua/coder.sub/wp-content/themes/corporates/images/top.png" alt="Top"/>
	</a>
	<div class="wrapper-silver">
		<header class="green header-wrap-s header-scloll-g wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="0.7s" id="section-google">
			<div class="container relative">
				<div class="back-btn2">
					<div class="flex justify-end align-center">
						<?php get_template_part( 'template-parts/layouts/layout','btn' );?>
						<div class="header-title p-r">
							<h2><?= pll__('Продвижение в google')?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="line"></div>
		</header>
		<section class="section-projects  container-page">
			<div class="fp-table" >
				<div class="fp-tableCell h100vh">
					<div class="flex center flex-wrap mb90">
						<?php
						if( have_rows('google') ):
							$c = 0.5;
							$d = 0.7;
							while ( have_rows('google') ) : the_row();
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
												<a href="#form2" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
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

			if( have_rows('google') ):
				$a = 0.7;
				$b = 0.2;
				while ( have_rows('google') ) : the_row();
					if( get_row_layout() == 'add_info' ):?>
					<div class="container section-each none" data-title="<?= get_sub_field('title')?>">
						<div class="fp-table" >
							<div class="fp-tableCell h100vh">
								<div class="wrap__google_sl mb90">
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
													<a href="#form2" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
													<a href="#owl<?= get_sub_field('title')?>" class="green2 activat-desc" data="<?php the_sub_field('nazvanie_galerei')?>"  style="background:<?php the_sub_field('osnovnoj_czvet')?> " data-title="<?= get_sub_field('title')?>"><?= pll__('Пример')?></a>
												</div>
											</div>
										</div>
										<div class="content wow fadeInRight "   data-wow-delay="0.9s" data-wow-duration="1s">
											<?php the_sub_field('kontent')?>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php
						
							if(!empty(get_sub_field('foto_gal'))):?>
							<div class="fp-table" id="owl<?= get_sub_field('title')?>"  >
								<div class="fp-tableCell h100vh">
									<?php
									if(get_row_index() == 2){
										$carousel = 'example';
									}
									else{
										$carousel = 'example3';
									}

									?>
									<div class="<?= $carousel;?>" id="owl<?= get_sub_field('title')?>">
										<carousel-3d :width="229" :height="484" :border="0" :controls-visible="true"  :controls-prev-html="' '" :controls-next-html="' '" :controls-width="30" :controls-height="60" :clickable="false" :perspective="40" :space="250" :display=7 :autoplay="true" :autoplay-timeout="5000">
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
						<?php
					endif;
				
				if(get_sub_field('inf_seo') == true){



					$index = " ";
					if(get_sub_field('inf_seo') == true){
						$index = "owl-slider2";
					}else{
						$index = "owl-slider";
					}
					?>
					<div class="fp-table" style="max-width: 1000px; margin: auto">
						<div class="fp-tableCell h100vh">
							<div class="<?= $index;?> owl-carousel owl-theme" id="owl<?= get_sub_field('title')?>">
								<?php

								if( have_rows('seo') ):

									while ( have_rows('seo') ) : the_row();?>
									<div class="items-owl">
										<div class="item-seo">
											<div class="logo-prev">
												<a href="<?= get_sub_field('link_project')?>" target="_blank">
													<img src="<?= get_sub_field('add_logo'); ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>" />
												</a>
											</div>
											<div class="domain">
												<a href="<?= get_sub_field('link_project')?>" target="_blank">
													<?= get_sub_field('add_domen')?>
												</a>
											</div>	
											<div class="key_block">
												<?php
												if( have_rows('add_keywords') ):
													while ( have_rows('add_keywords') ) : the_row();?>
													<div class="key-wrap flex">
														<div class="link-key-wrap">
															<a href="https://www.google.com/search?q=<?= get_sub_field('add_link_k');?>" target="_blank" alt="Смотреть в google" class="alt-google none">
																<img src="<?= get_template_directory_uri();?>/images/google-hover.svg" alt="google" class=""/>
															</a>
															<a href="https://www.google.com/search?q=<?= get_sub_field('add_link_k');?>" target="_blank" alt="Смотреть в google" class="w-msg">
																<?= get_sub_field('add_key');?>
															</a>
														</div>
														<div class="flex wrap btn-google2">
															
															<div class="watch-google none">
																<a href="https://www.google.com/search?q=<?= get_sub_field('add_link_k');?>" target="_blank">
																	смотреть в google
																</a>
															</div>
															<div class="icon-goole">
																<a href="https://www.google.com/search?q=<?= get_sub_field('add_link_k');?>" target="_blank">
																	<img src="<?= get_template_directory_uri();?>/images/google.svg" alt="google"/>
																</a>
															</div>
															<div class="btn-g-step">
																<a href="https://www.google.com/search?q=<?= get_sub_field('add_link_k');?>" target="_blank">
																	<img src="<?= get_template_directory_uri();?>/images/btn.svg" alt="google"/>
																</a>
															</div>
														</div>


													</div>
													<?php
												endwhile;

											endif;

											?>
										</div>									
									</div>
								</div>
								<?php 
							endwhile;


						endif;

						?>

					</div>
				</div>
			</div>

			<?php }?>
		</div>

		<?php
	endif;

endwhile;


endif;

?>
</section>
</div>

<div class="section-footer p52 green">
	<div class="fp-table green"  id="form2">
		<div class="fp-tableCell h100vh">
			<div class="container">
				<div class="flex  form-flex">
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

