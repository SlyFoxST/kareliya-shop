$(document).ready(function(){

	var $ = jQuery.noConflict();
	$('.shipping-checkut').on('click',function(){

	});

	$("a[rel=group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? '   ' + title : '') + '</span>';
		}
	});
	$('.lazy').lazy({
/*		effect: 'fadeIn',
visibleOnly: true,*/
});
	var owl = $(".owl-carousel");
	owl.owlCarousel({
		items: 3,
		margin: 10,
		loop: true, 
		nav: true, 
		navText: ['&lsaquo;','&rsaquo;'],
		dots: true,
		autoplay:true, 
		autoplayTimeout:3000,
		autoplayHoverPause:false, 
		responsive:{ 
			0:{ 
				items:1
			},
			600:{ 
				items:3,
				dots: false,
			},
			1000:{ 
				items:3
			}
		}

	});
	$('.btn-watch').on('click',
		function(){
			$('.wrap-reviews').slideDown(700);
		});
	$('.filter-price li').on('click',function(){
		var term = $(this).attr('data');
		var max  = $(this).attr('max');
		var min  = $(this).attr('min');
		console.log(term);
		var data = {
			'action': 'filter_price',
			'term': term,
			'max': max,
			'min' : min,
		};

		jQuery.ajax({
			url:my_ajax_object.ajax_url,
			data:data, 
			type:'POST',
			success:function(data){
				$('.list-product').html(data);

			}
		});
	});
	$('.btn-price-filters').on('click',function(){
		$('.filter-price').toggleClass('active');
	});

	$('.burger-menu').on('click',function(){
		$('.line-burger').toggleClass('transform');
		$('.mobile-menu').toggleClass('active');
	});
	$('.close').on('click',function(){
		$('.popup-pravila,.popup-dostavka-opl,.popup-svjaz,.popup-cart,.popup-zvonok,.popup-dostavka-moscau,.popup-dostavka-piter,.popup-dostavka-other').slideUp(1000);
	});
	$('.pop-up-other').on('click',function(){
		$('.popup-dostavka-other').slideDown(700);
	});
	$('.pop-up-moscau').on('click',function(){
		$('.popup-dostavka-moscau').slideDown(700);
	});
	$('.pop-up-piter').on('click',function(){
		$('.popup-dostavka-piter').slideDown(700);
	})
	$('.popup-zacas, .popup-zacas2').on('click',function(){
		$('.popup-pravila').slideDown(1000);
	});
	$('.popup-dostavka, .popup-dostavka2').on('click',function(){
		$('.popup-dostavka-opl').slideDown(1000);
	});
	$('.pratnaja-svjaz, .pratnaja-svjaz2, .zvon, .tabs-svjaz').on('click',function(){
		$('.popup-svjaz').slideDown(1000);
	});
	$('.zvon').on('click',function(){
		$('.popup-zvonok').slideDown(1000);
	});

	$('.tabs-dostavka').on('click',function(){
		$('.dastavka').show();
		$('.oplata').hide();
	});
	$('.tabs-oplata').on('click',function(){
		$('.dastavka').hide();
		$('.oplata').show();
	});
	$('.add-to-cart').on('click',function(){
		$('.popup-cart').slideDown(700);
		$('.tabs-zakaz').show();
	});
	$('.btn-upakovka').on('click',function(){
		$('.wrap-upakovka').toggleClass('show');
	});
	$('.popular-tab').on('click',function(){
		$('.other-tab').removeClass('active');
		$(this).addClass('active');
		$('.other-block').addClass('none').hide();
		$('.popular-block').removeClass('none').show().css({'display':'flex'});
	});
	$('.other-tab').on('click',function(){
		$(this).addClass('active');
		$('.popular-tab').removeClass('active');
		$('.other-block').removeClass('none').show().css({'display':'flex'});
		$('.popular-block').addClass('none').hide();
	});
	var name = $(".name2");
	var phone = $(".phone2");
	var email = $(".email2");
	var reg = /[0-9 -()+]+$/;
	var regEmail =  /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
	name.change(function(){
		if(name.val() == "" || name.val().length < 3){
			name.addClass('error');
			name.prev('.error').fadeIn(800);
		}
		else{
			name.removeClass('error');
			name.prev('.error').fadeOut(800);
		}
	});
	email.change(function(){
		if($(this).val() != ''){
			if($(this).val().search(regEmail) == 0){
				$(this).removeClass('error');
				$(this).prev('.error').fadeOut(800);

			}else{
				$(this).addClass('error');
				$(this).prev('.error').fadeIn(800);
			}
		}else{
			$(this).addClass('error');
			$(this).prev('.error').fadeIn(800);
		}
	});
	phone.change(function(){
		if($(this).val() != ''){
			if($(this).val().search(reg) == 0){
				$(this).removeClass('error');
				$(this).prev('.error').fadeOut(800);

			}else{
				$(this).addClass('error');
				$(this).prev('.error').fadeIn(800);
			}
		}else{
			$(this).addClass('error');
			$(this).prev('.error').fadeIn(800);
		}
	});




	$('.btn-form2').click(function(e){
		e.preventDefault();
		var name = $(".name2").val();
		var phone = $(".phone2").val();
		var email = $(".email2").val();
		var msg   = $(".msg").val();
		var reg = /[0-9 -()+]+$/;
		var regEmail =  /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;

		if(name == "" || name.length < 3){
			$(".name2").addClass('error');
			$(".name2").prev('.error').fadeIn(800);
		}

		if(phone == '' || phone.search(reg) != 0){
			$(".phone2").addClass('error');
			$(".phone2").prev('.error').fadeIn(800);
		}
		if(email == '' || email.search(regEmail) != 0){
			$(".email2").addClass('error');
			$(".email2").prev('.error').fadeIn(800);
		}
		var data = {
			'action': 'footer_form',
			'name': name,
			'phone': phone,
			'email' : email,
			'msg'   : msg,
		};
		if(name != "" && name.length > 3  && phone != '' && phone.search(reg) == 0)
			jQuery.ajax({
				url:my_ajax_object.ajax_url,
				data:data, 
				type:'POST',
				success:function(data){
					$(".form").trigger('reset');
					$(".form-footer").slideUp(400);
					$('.result').text(data).css({"padding":"20px"});

				}
			});

	});
	$('.slider-single').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		adaptiveHeight: true,
		infinite: true,
		useTransform: true,
		prevArrow:"<div class='slick-prev'><div class='pull-left'></div></div>",
		nextArrow:"<div class='slick-next'><div class=' pull-right'></div></div>",
		speed: 400,
		cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',

	});

	$('.slider-nav')
	.on('init', function(event, slick) {
		$('.slider-nav .slick-slide.slick-current').addClass('is-active');
	})
	.slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		vertical: false,
		focusOnSelect: false,
		infinite: true,
		arrows: false,
		responsive: [{
			vertical: false,
			breakpoint: 1000,
			settings: {
				vertical: false,
				slidesToShow: 5,
				slidesToScroll: 4,
			}
		}, {
			breakpoint: 640,
			settings: {
				slidesToShow:4,
				slidesToScroll: 4,
			}
		}, {
			breakpoint: 420,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}]
	});

	$('.slider-single').on('afterChange', function(event, slick, currentSlide) {
		$('.slider-nav').slick('slickGoTo', currentSlide);
		var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
		$('.slider-nav .slick-slide.is-active').removeClass('is-active');
		$(currrentNavSlideElem).addClass('is-active');
	});

	$('.slider-nav').on('click', '.slick-slide', function(event) {
		event.preventDefault();
		var goToSingleSlide = $(this).data('slick-index');

		$('.slider-single').slick('slickGoTo', goToSingleSlide);
	});

	$('.delov-lin-btn').on('click',function(){
		alert('asdf');	
		$('.ifr-del-lin').removeClass('none');
	});




});
