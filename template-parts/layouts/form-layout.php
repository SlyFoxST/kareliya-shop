	<form class="form">
		<?php
		$a = rand(1,10);
		$b = rand(1,10);
		$res = $_SESSION['res'] = $a - $b;
		?>
		<div class="wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="2s">
			<label for="name"><?= pll__('Имя'); ?></label>
			<div class="error none"><?= pll__('*Это поле не заполнено или заполнено не верно!'); ?></div>
			<input type="text" class="name" name="name">

		</div>
		<div class="wow fadeInLeft" data-wow-delay="0.7s" data-wow-duration="2s">
			<label for="email"><?= pll__('Email'); ?></label>
			<div class="error none"><?= pll__('*Это поле не заполнено или заполнено не верно!'); ?></div>
			<input type="text" class="email" name="email">
		</div>
		<div class="wow fadeInLeft" data-wow-delay="0.9s" data-wow-duration="2s">
			<label for="phone"><?= pll__('Телефон'); ?></label>
			<div class="error none"><?= pll__('*Это поле не заполнено или заполнено не верно!'); ?></div>
			<input type="tel" class="phone" name="phone">
		</div>
		<div class="wow fadeInLeft" data-wow-delay="1.1s" data-wow-duration="2s">
			<label for="msg"><?= pll__('Сообщение'); ?></label>
			<textarea class="msg" name="msg" class="msg"></textarea>
		</div>
		<div class="wow fadeInLeft mt15" data-wow-delay="1.3s" data-wow-duration="2s">
			<div class="error none"><?= pll__('*Вы не ввели или ввели не верно каптчу!'); ?></div>
			<div class="flex wrap-captcha">
				<div class="cptcha-title"><?= pll__('Введите каптчу:'); ?></div>
				<div>
					<input type="number" name="captcha"  class="captcha" data_captcha="<?= $a; ?>" />
				</div>
				<div class="res-captcha">
					<?php echo  ' - ' . $b . ' = ' . $_SESSION['res']; ?>
				</div>
			</div>
		</div>
		<div class="wow fadeIn" data-wow-delay="1.7s" data-wow-duration="2s">
			<div class="btn-form"  data_captcha="<?= $a; ?>"><?= pll__('Отправить');?></div>
		</div>
		<div class="result"></div>
	</form>