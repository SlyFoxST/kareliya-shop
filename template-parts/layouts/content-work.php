	<div class="layout-page-tab relative none">
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
						<li class="">
							<a lang="en-US" hreflang="en-US" href="<?= PATH?>/en/home" class="active">Eng</a>
						</li>
						<li class="active">
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

			<div class="container-tab">
				<?php

				if( have_rows('sites') ):?>
				<ul class="accordion-tabs">

					<li class="tab-head-cont" data-attr="vse">
						<a href="#"  style="background: gold">Все</a>
						<section class="mobile-none">
							<div class="flex flex-wrap space-between">
								<div class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.7s">
									<div class="flex flex-wrap section-work-all">
										<?php
										while ( have_rows('sites') ) : the_row();
											if( get_row_layout() == 'add_info' ):
												?>

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

												<?php
											endif;
										endwhile;
										?>
									</div>
								</div>
							</div>
						</section>
					</li>
					<?php
					while ( have_rows('sites') ) : the_row();
						if( get_row_layout() == 'add_info' ):
							?>
							<li class="tab-head-cont" data-attr="<?php the_sub_field('nazvanie_galerei')?>">
								<a href="#"  style="background: <?php the_sub_field('color_title')?>"><?php the_sub_field('nazvanie_galerei')?></a>
								<section class="mobile-none">
									<div class="flex flex-wrap section-work">
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
	<div class="section-mobile-tabs" id="tabs">
		<div class="container-tab-mobile">
			<?php

			if( have_rows('sites') ):?>
			<ul class="accordion-tabs-mobile">
				<li class="tab-head-cont-mobile" style="background: gold" data-attr="<?php the_sub_field('nazvanie_galerei')?>">
					<a href="#">Все</a>
				</li>
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
		<section data-attr="Все">
			<div class="flex flex-wrap space-between section-work">
				<?php
				while ( have_rows('sites') ) : the_row();
					if( get_row_layout() == 'add_info' ):
						?>

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

						<?php
					endif;
					endwhile;?>

				</div>
			</section>
			<?php
			while ( have_rows('sites') ) : the_row();
				if( get_row_layout() == 'add_info' ):
					?>
					<section data-attr="<?php the_sub_field('nazvanie_galerei')?>">
						<div class="flex flex-wrap space-between section-work">
							<?php
							if( have_rows('foto_gal') ):
								$i = 0.4;
								$j = 0.5;
								while ( have_rows('foto_gal') ) : the_row();?>
								<div class="wow fadeInUp portf" data-wow-delay="<?= $i+=0.1?>s" data-wow-duration="<?= $j+=0.1?>s">
									<a href="<?= get_sub_field('link_for_img'); ?>" target="_blank">
										<img src="<?= get_sub_field('add_img'); ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>" />
									</a>
								</div>

								<?php
							endwhile;

						endif;
						?>

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


<div class=" section-footer p52  blue2 p52">
	<div class="fp-table blue2">
		<div class="fp-tableCell h100vh">
			<div class="container">
				<div class="flex form-flex">
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
