;(function($){

	"use strict";

	var Core = {

		DOMReady: function(){

			var self = this;

			self.events();
			self.anchor();
			self.scrollOffset();
			self.accordion();

		},

		windowLoad: function(){

			var self = this;
			
			self.preloader();
		},

		/**
		**  Accordion
		**/

		accordion: function(){
			var $accordion = $('.js-accordion'),
			$accordionDt = $accordion.find('.js-accordion-box.is-active').length ? $accordion.children('.js-accordion-box.is-active') : $accordion.children('.js-accordion-box:first').addClass('is-active');

			$accordion.children('.js-accordion-box').not($accordionDt).children('.js-accordion-content').hide();
			$accordion.find('.js-accordion-box.is-active').children('.js-accordion-head').addClass('is-active').next('.js-accordion-content').show();

			if($accordion.hasClass('is-toggle')){
				$accordion.on('click', '.js-accordion-head', function(){
					$(this).toggleClass('is-active').next().stop().slideToggle(400);
				});
			}
			else{
				$accordion.on('click', '.js-accordion-head', function(){
					$(this).addClass('is-active').next().stop().slideDown(400).closest('.js-accordion-box').addClass('is-active').siblings().removeClass('is-active').find('.js-accordion-head').removeClass('is-active').next().stop().slideUp(400);
		                // $(this).closest('.js-accordion-box').find('.js-accordion-content .wow').addClass('animated')
		                var wow = new WOW({
		                	boxClass: 'accordion_wow', 
		                	animateClass: 'animated', 
		                	offset: 0,
		                	mobile: false, 
		                	live: true 
		                });
		                wow.init();
		            });
			}

		},

		/**
	    **	ScrollOffset
	    **/

	    scrollOffset: function(){

	    	var $window = $(window);
	    	var $windowH = $(window).height();

	    	function scrol(){
	    		if($window.scrollTop() > $windowH - 60){
	    			if(!$('body').hasClass('darkTheme4')){
	    				$('body').addClass('darkTheme');
	    			}
	    		}
	    		else{
	    			$('body').removeClass('darkTheme');
	    		}
	    	}
	    	if(!$('#fullpage').length){
	    		scrol()

	    		$window.on('scroll', function(event) {
	    			scrol();
	    		});
	    	}


	    },

	    /**
	    **	Anchor
	    **/

	    anchor: function(){

	    	var $w = $(window),
	    	$htmlBody = $('html, body'),
	    	$anchorLink = $(".js-anchor[href^='#']");

	    	if($anchorLink.length){

	    		$anchorLink.on("click", function (event) {
	    			event.preventDefault();
	    			var $id  = $(this).attr('href'),
	    			$top = $($id).offset().top;

	    			$htmlBody.stop().animate({scrollTop: $top }, 600);

	    		});

	    	}

	    	$('.js-anchor-top').on('click',  function(event) {
	    		event.preventDefault();
	    		$('html, body').animate({
	    			scrollTop: 0
	    		}, 600);
	    	});

	    },



		/**
		**  Events
		**/

		events: function(){

			function detectScrollBarWidth(){
				var $div = document.createElement('div'),
				cssObj   = {
					"position": "absolute",
					"top": "-9999px",
					"width": "50px",
					"height": "50px",
					"overflow": "scroll"
				};	

				$div.className = "detect_scroll_width";
				$($div).css(cssObj);
				document.body.appendChild($div);
				var $scrollW = $div.offsetWidth - $div.clientWidth;
				document.body.removeChild($div);
	        	// console.log($scrollW);
	        	checkBClass($scrollW);
	        }
	        function checkBClass(wid){
	        	if($('.fix_link').length){
	        		var fixPos = $('.fix_link')[0].getBoundingClientRect().right;
	        	}
	        	var fixPosRight = $(window).width()  - fixPos;
	        	// console.log(fixPos, $(window).width(), $(window).width()  - fixPos)
	        	if($('body').hasClass('showMenu')){
	        		$('.header_wrap').css({
	        			'padding-right': wid
	        		});
	        		$('.menu_modal_box_it').css({
	        			'margin-right': wid
	        		});
	        		if($('.fix_link').length){
	        			$('.fix_link').css({
	        				'right':  fixPosRight + wid
	        			});
	        		}
	        	}
	        	else{
	        		$('.header_wrap, .menu_modal_box_it, .fix_link').attr('style', '');
	        	}
	        }

	        $('.js-menu-btn').on('click', function(event) {
	        	event.preventDefault();
	        	$(this).toggleClass('is-active');
	        	$('.menu_modal_box').toggleClass('is-open');
	        	$('body').toggleClass('showMenu');

	        	detectScrollBarWidth();
	        });

	        $('.js-filter-close-btn').on('click', function(event) {
	        	event.preventDefault();
	        	$('.filter_dropdown').removeClass('is-show');
	        });

	        $('.plus_box').on('click', '.btn-plus',  function(event) {
	        	event.preventDefault();
	        	$(this).closest('.plus_box').toggleClass('is-active');
	        	$(this).closest('.plus_box').find('.plus_box_it').toggleClass('is-show');
	        });


	        $('.filter_btn').on('click', function(event) {
	        	event.preventDefault();
	        	var attrTxt =  $(this).find('span').attr('data-text');
	        	var attrTxt2 =  $(this).find('span').attr('data-text2');
	        	$(this).toggleClass('is-active')
	        	if($(this).hasClass('is-active')){
	        		$(this).find('span[data-text]').children('span').text(attrTxt2);
	        	}
	        	else{
	        		$(this).find('span[data-text]').children('span').text(attrTxt);	        	
	        	}


	        	if($(window).width() >=768){
	        		$('.filter_dropdown').toggleClass('is-show').slideToggle(500);
	        	}
	        	else if($(window).width() <=767){
	        		$('.filter_dropdown').toggleClass('is-show');
	        	}
	        });


	        $('.checkbox_colors_wr').on('change', '.form_checkbox input', function(event) {
	        	if($('.checkbox_colors_wr').find('.form_checkbox input:checked').length){
	        		$('.filter_clean_ottenok').show();
	        	}
	        	else{
	        		$('.filter_clean_ottenok').hide();
	        	}
	        });


	        $('.collection_labl').on('change', '.form_checkbox input', function(event) {
	        	if($('.collection_labl').find('.form_checkbox input:checked').length){
	        		$('.filter_clean_collection').show();
	        	}
	        	else{
	        		$('.filter_clean_collection').hide();
	        	}
	        });

	        $('.effect_labl').on('change', '.form_checkbox input', function(event) {
	        	if($('.effect_labl').find('.form_checkbox input:checked').length){
	        		$('.filter_clean_effect').show();
	        	}
	        	else{
	        		$('.filter_clean_effect').hide();
	        	}
	        });


	        $('.filter_clean_ottenok').on('click', function(event) {
	        	$('.checkbox_colors_wr').find('.form_checkbox input:checked').prop('checked', false)
	        	$(this).hide();
	        });

	        $('.filter_clean_collection').on('click', function(event) {
	        	$('.collection_labl').find('.form_checkbox input:checked').prop('checked', false)
	        	$(this).hide();
	        });
	        $('.filter_clean_effect').on('click', function(event) {
	        	$('.effect_labl').find('.form_checkbox input:checked').prop('checked', false)
	        	$(this).hide();
	        });

	        $('.product_list li').hover(function() {
	     
	        	var $index = $(this).attr('data-index');
	        	$('.product_list_img_wrap').find('.img_box[data-index="'+ $index +'"]').addClass('is-show');
	        	setTimeout(function(){
	        		$('.product_list_img_wrap').find('.img_box[data-index="'+ $index +'"]').find('.plus_box .btn-plus').trigger('click');
	        	},500)
	        }, function() {

	        	var $index = $(this).attr('data-index');
	        	$('.product_list_img_wrap').find('.img_box[data-index="'+ $index +'"]').removeClass('is-show').addClass('is-hide');
	        	setTimeout(function(){
	        		$('.product_list_img_wrap').find('.img_box[data-index="'+ $index +'"]').find('.plus_box .btn-plus').trigger('click');
	        	},500)
	        	setTimeout(function(){
	        		$('.product_list_img_wrap').find('.img_box.is-hide').removeClass('is-hide')
	        	},1000)
	        });

	    },


        /**
        **  Preloader
        **/

        preloader: function(){

        	var self = this;

        	self.preloader = $('#page-preloader');
        	self.spinner   = self.preloader.find('.preloader');

            // self.spinner.fadeOut();
            // self.preloader.delay(350).fadeOut('slow');
            setInterval(function(){
            	if($('body').hasClass('pace-done')){
            		$('html').addClass('pace-done')
            	}
            }, 500);
            
        },

    }


    $(document).on('ready', function(){

    	Core.DOMReady();

    });

    $(window).on('load', function(){

    	Core.windowLoad();

    });

})(jQuery);