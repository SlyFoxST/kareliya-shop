<?php
$lang = pll_current_language();
$class ="";  
$active ="";
if ( $lang == 'eng' ) { 
	$p_fields = get_fields(380);
	$home = PATH . 'eng/home';
	$path = PATH . 'eng/sites';
} 
elseif($lang == 'rus') {
	$p_fields = get_fields(378);
	$home = PATH;
	$path = PATH . 'site';
}
else{
	$class ="";
	$path = PATH;
}
if ( $lang == 'eng' ){
	$class ="active";
}
else{
	$class ="noactive";
}
if ( $lang == 'rus' ){
	$class2 ="active";
}
else{
	$class2 ="noactive";
}

?>
<div class="back-btn">
	<div class="flex back-btn-wr center">
		<div class="btn-r pd10">
			<a href="<?= $home ?>">
				<img src="<?php echo get_template_directory_uri()?>/images/home_icon.svg" alt="<?php the_title();?>"/>
			</a>
		</div>
		<div class="btn-r m-r pd22">
			<a href="<?= $path; ?>">
				<img src="<?php echo get_template_directory_uri()?>/images/back_icon.svg" alt="<?php the_title();?>" />
			</a>
		</div>
		<div class="btn-r btn-back-home">
			<a href="<?= $home?>">
				<img src="<?php echo get_template_directory_uri()?>/images/back_icon.svg" alt="<?php the_title();?>" />
			</a>
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
			<?php pll_the_languages(array('show_flags'=>0,'show_names'=>0,'display_names_as'=>'slug'));  ?>

		</ul>
		<div class="btn-r  msnger-mobile">
			<a href="tel:7(903)555-55-55" class="tel">
				<div class>Chat</div>
			</a>
		</div>
	</div>
</div>
