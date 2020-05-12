<div class="tabs-sec">
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
							<section>
								<div class="flex flex-wrap space-between section-work">
									<?php
									$i = 0.4;
									$j = 0.5;
									foreach (get_sub_field('gal_work') as $value) {
										?>
										<div class="wow fadeInUp portf" data-wow-delay="<?= $i+=0.1?>s" data-wow-duration="<?= $j+=0.1?>s">
											<img src="<?= $value; ?>"  alt="<?= get_sub_field('nazvanie_galerei')?>">
										</div>
										<?php									
									}
									?>

									<div class="wow fadeInUp all-project" data-wow-delay="1s" data-wow-duration="1.3s">
										Смотреть все
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


<div class="section-footer blue" id="form3">

	<div class="container p52">
		<div class="flex">
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
