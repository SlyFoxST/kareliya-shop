<?php
$a = rand(1,10);
$b = rand(1,10);
$res = $_SESSION['res'] = $a - $b;
?>
<div class="container p52">
	<div class="flex">
		<div class="section-form">
			<form>
				<div class="wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="2s">
					<label for="name">Имя</label>
					<input type="text" class="name" name="name">
				</div>
				<div class="wow fadeInLeft" data-wow-delay="0.7s" data-wow-duration="2s">
					<label for="email">Email</label>
					<input type="text" class="name" name="email">
				</div>
				<div class="wow fadeInLeft" data-wow-delay="0.9s" data-wow-duration="2s">
					<label for="phone">Телефон</label>
					<input type="phone" class="name" name="phone">
				</div>
				<div class="wow fadeInLeft" data-wow-delay="1.1s" data-wow-duration="2s">
					<label for="msg">Сообщение</label>
					<textarea class="msg" name="msg"></textarea>
				</div>
				<div class="wow fadeInLeft flex mt15" data-wow-delay="1.3s" data-wow-duration="2s">
					<div class="cptcha-title">Введите каптчу:</div>
					<div>
						<input type="number" name="captcha" />
					</div>
					<div class="res-captcha">
						<?php echo  ' - ' . $b . ' = ' . $_SESSION['res']; ?>
					</div>
				</div>
				<div class="wow fadeIn" data-wow-delay="1.7s" data-wow-duration="2s">
					<input type="button" class="btn-form" value="Отправить" data_captcha="<?= $a; ?>">
				</div>
			</form>
		</div>
		<div class="section-contact">
			<div class="map_container wow fadeIn" data-wow-delay="1.3s" data-wow-duration="2s">
				<div class="gmap" data-url="data/1.json" data-coords="{&quot;lat&quot;: 50.4362623, &quot;lng&quot;: 30.457125}" data-marker="one"></div>
			</div>
			<div class="contacts">
				<div class="flex cnt-st wow fadeIn" data-wow-delay="1.6s" data-wow-duration="2s">
					<div class="icon">
						<img src="<?= get_template_directory_uri()?>/images/icon1.png" />
					</div>
					<div class="text-contact">3763 Simi Valley, NY 917776</div>
				</div>
				<div class="flex cnt-st wow fadeIn" data-wow-delay="1.9s" data-wow-duration="2s">
					<div class="icon">
						<img src="<?= get_template_directory_uri()?>/images/icon2.png" />
					</div>
					<div class="text-contact">jeff.brown@example.com</div>
				</div>
				<div class="flex cnt-st wow fadeIn" data-wow-delay="2.1s" data-wow-duration="2s">
					<div class="icon">
						<img src="<?= get_template_directory_uri()?>/images/icon3.png" />
					</div>
					<div class="text-contact"><a href="tel:+7(903) 555 55 55">+7(903) 555 55 55</a></div>
				</div>
			</div>

		</div>
	</div>
</div>