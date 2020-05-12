<div class="contacts">
	<?php
	$time = 1.3;
	if( have_rows('contact', 'option') ): ?>
	<?php while( have_rows('contact', 'option') ): the_row(); ?>
		<div class="flex cnt-st wow fadeIn" data-wow-delay="<?= $time += 0.3 ?>s" data-wow-duration="1.5s">
			<div class="icon">
				<img src="<?php the_sub_field('icon'); ?>" />
			</div>
			<div class="text-contact"><a href="<?php the_sub_field('link'); ?>" target="_blank" >
				<?php the_sub_field('kontakt'); ?></a></div>
			</div>
			<?php  
		endwhile;
		?>

	<?php endif; ?>
</div>