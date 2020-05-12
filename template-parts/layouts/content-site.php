	<div class="layout-page relative none">
		<div class="wrapper container-page">
			<div class="back-btn">
				<div class="flex back-btn-wr center">
					<div class="btn-r pd10">
						<img src="<?php echo get_template_directory_uri()?>/images/Vector.png" alt="<?php the_title();?>"/>
					</div>
					<div class="btn-r m-r pd22">
						<img src="<?php echo get_template_directory_uri()?>/images/Arrow.png" alt="<?php the_title();?>" />
					</div>
					<div class="btn-r btn-back-home">
						<img src="<?php echo get_template_directory_uri()?>/images/Arrow.png" alt="<?php the_title();?>" />
					</div>
					<div class="btn-r   email-mobile">
						<a href="mailto:jeff.brown@example.com" >
							<img src="<?php echo get_template_directory_uri()?>/images/mail.png" alt="<?php the_title();?>" />
						</a>
					</div>
					<div class="btn-r  phone-mobile">
						<a href="tel:7(903)555-55-55" class="tel">
							<img src="<?php echo get_template_directory_uri()?>/images/phone.png" alt="<?php the_title();?>" />
						</a>
					</div>
					<ul  class="language_list list-lang lang-site">
						<?php
						 $lng = pll_current_language();
						 $my_lang = pll_current_language();  
/*if ( $lng == 'en' ) { 
echo '0';
} else {
echo '1';
 }*/
?>
						
						<li class="<?= $lng = 'ru' ? '' : "Другое значение"; ?>">
							<a lang="en-US" hreflang="en-US" href="<?= PATH?>/en/home" class="active">Eng</a>
						</li>
						<li class="<?= $lng = 'en' ? 'active' : "Другое значение"; ?>">
							<a lang="ru-RU" hreflang="ru-RU" href="<?= PATH?>" class="active">Rus</a>
						</li> 
					</ul>
					<div class="btn-r  msnger-mobile">
						<a href="tel:7(903)555-55-55" class="tel">
							<div class>Messenger</div>
						</a>
					</div>
				</div>
			</div>
			<section class="section-projects">
				<div class="fp-table" >
					<div class="fp-tableCell h100vh">
						<div class="flex center flex-wrap">
							<?php

							if( have_rows('sites') ):
								$c = 0.5;
								$d = 0.7;
								while ( have_rows('sites') ) : the_row();

									if( get_row_layout() == 'add_info' ):

										if(get_row_index() == 4){
											?>

											<div class="btn-pink pink activat-tab wow zoomIn"  data-wow-delay="0.9s" data-wow-duration="1.5s" style="background: <?php the_sub_field('color_title'); ?>;width: 100%;" data="<?php the_sub_field('nazvanie_galerei')?>" data-title="<?php the_sub_field('title')?>">
												<a href="#tabs" class="">
													<?php the_sub_field('title')?>
												</a>
											</div>
											<?php
										}

										else{

											?>
											<div class="block-work block-h wow fadeIn"  data-wow-delay="<?= $c+=0.2?>s" data-wow-duration="<?= $d+= 0.3?>s">
												<div class="header-lyt" style="background: <?php the_sub_field('color_title')?>" ><?php the_sub_field('title')?></div>
												<div class="content-txt">
													<?php the_sub_field('desc')?>
												</div>
												<div class="absolute">
													<div class="price">
														<?php the_sub_field('czena')?>
													</div>
													<div class="button-flex flex">
														<a href="#form" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
														<a href="#tabs" class="green2 activat-tab" data="<?php the_sub_field('nazvanie_galerei')?>"  style="background:<?php the_sub_field('osnovnoj_czvet')?> " data-title="<?= get_sub_field('title')?>"><?= pll__('Пример')?></a>
													</div>
												</div>
											</div>

											<?php

										}
									endif;

								endwhile;


							endif;

							?>

						</div>
					</div>

				</div>
			</section>

			<section class="section-project none">
				<?php

				if( have_rows('sites') ):
					$a = 0.7;
					$b = 0.2;
					while ( have_rows('sites') ) : the_row();
						if( get_row_layout() == 'add_info' ):?>

						<div class="sec-worck mb90 section-each sec-work-site flex space-between flex-wrap none" data-attr="<?= get_sub_field('title')?>" data-title="<?= get_sub_field('title')?>">
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
									<div class="button-flex flex">
										<a href="#form" class="green2 mr1" style="background:<?php the_sub_field('osnovnoj_czvet')?> "><?= pll__('Заказать')?></a>
										<a href="#tabs" class="green2 activat-tab" data="<?php the_sub_field('nazvanie_galerei')?>"  style="background:<?php the_sub_field('osnovnoj_czvet')?>" ><?= pll__('Пример');?></a>
									</div>
								</div>
							</div>
							<div class="content wow fadeInRight "   data-wow-delay="0.9s" data-wow-duration="1s">
								<?php the_sub_field('kontent')?>
							</div>
						</div>

						<?php
					endif;

				endwhile;


			endif;

			?>

		</section>


		<div class="fp-table table-none" >
			<div class="fp-tableCell h100vh">
				<div class="tabs"  id="tabs">
					<div class="container-tab">
						<?php

						if( have_rows('sites') ):?>
						<ul class="accordion-tabs">
							<?php
							while ( have_rows('sites') ) : the_row();
								if( get_row_layout() == 'add_info' ):
									?>
									<li class="tab-head-cont" data-attr="<?php the_sub_field('nazvanie_galerei')?>">
										<a href="#"  style="background: <?php the_sub_field('color_title')?>"><?php the_sub_field('nazvanie_galerei')?></a>
										<section class="mobile-none">
											<div class="flex flex-wrap space-between section-work">

												<?php
												$i = 0.4;
												$j = 0.5;
												if( have_rows('foto_gal') ):
													while ( have_rows('foto_gal') ) : the_row();?>
													<div class="wow fadeInUp portf" data-wow-delay="<?= $i+=0.1?>s" data-wow-duration="<?= $j+=0.1?>s">
														<a href="<?= get_sub_field('link_for_img'); ?>" target="_blank" class="link_site">
															<img src="<?= get_sub_field('add_img'); ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>" />
														</a>
													</div>
													<?php
												endwhile;

											endif;
											?>

											<div class="wow fadeInUp all-project" data-wow-delay="1s" data-wow-duration="1.3s">
												<?= pll__('Cмотреть все');?>
											</div>

										</div>
									</section>
								</li>
								<?php
							endif;
						endwhile;


						?>
					</ul>
					<?php
				endif;

				?>


			</div>

		</div>
	</div>
</div>

<div class="section-mobile-tabs" id="tabs2">

	<div class="container-tab-mobile">
		<?php

		if( have_rows('sites') ):?>
		<ul class="accordion-tabs-mobile">
			<?php
			while ( have_rows('sites') ) : the_row();
				if( get_row_layout() == 'add_info' ):
					?>
					<li class="tab-head-cont-mobile" style="background: <?php the_sub_field('color_title')?>" data-attr="<?php the_sub_field('nazvanie_galerei')?>">
						<a href="#"><?php the_sub_field('nazvanie_galerei')?></a>
					</li>
					<?php
				endif;
			endwhile;


			?>
		</ul>
		<?php
	endif;



	if( have_rows('sites') ):?>

	<?php
	while ( have_rows('sites') ) : the_row();
		if( get_row_layout() == 'add_info' ):
			?>
			<section data-attr="<?php the_sub_field('nazvanie_galerei')?>">
				<div class="flex flex-wrap space-between section-work">
					<?php
					$i = 0.4;
					$j = 0.5;
					if( have_rows('foto_gal') ):
						while ( have_rows('foto_gal') ) : the_row();?>

						<div class="wow fadeInUp portf" data-wow-delay="<?= $i+=0.1?>s" data-wow-duration="<?= $j+=0.1?>s">
							<a href="<?= get_sub_field('link_for_img'); ?>" target="_blank" class="link_site">
								<img src="<?= get_sub_field('add_img'); ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>">
							</a>
						</div>
						<?php
					endwhile;

				endif;
				?>

				<div class="wow fadeInUp all-project" data-wow-delay="1s" data-wow-duration="1.3s">
					<?= pll__('Cмотреть все');?>
				</div>

			</div>
		</section>
		<?php
	endif;
endwhile;


?>
<?php
endif;

?>

</div>

</div>

</div>

<div class="section-footer orange2  p52" >
	<div class="fp-table" >
		<div class="fp-tableCell h100vh orange2">
			<div class="container">
				<div class="flex form-flex"  id="form">
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