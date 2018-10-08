(function($) {
	"use strict"

	$('#one-page-send-message').click(function(){
		var fullName = $('#one-page-full-name').val();
		var email = $('#one-page-email').val();
		var subject = $('#one-page-subject').val();
		var message = $('#one-page-message').val();
		if((fullName != '') && (email != '') && (subject != '') && (message != '')){
			//send message to draggableprototype@gmail.com
		}else{
			$('#one-page-error').fadeIn('slow');
			$('#one-page-error').addClass('alert-danger');
			$('#one-page-error .one-page-error-text p').text('All Fields are Required');
			setTimeout(removeOnePageAlert, 1000);
		}
	});

	function removeOnePageAlert(){
		$('#one-page-error').fadeOut('slow');
	}
	///////////////////////////
	// Preloader
	$(window).on('load', function() {
		$("#preloader").delay(600).fadeOut();
	});

	///////////////////////////
	// Scrollspy
	$('body').scrollspy({
		target: '#nav',
		offset: $(window).height() / 2
	});

	///////////////////////////
	// Smooth scroll
	$("#nav .main-nav a[href^='#']").on('click', function(e) {
		e.preventDefault();
		var hash = this.hash;
		$('html, body').animate({
			scrollTop: $(this.hash).offset().top
		}, 600);
	});

	$('#back-to-top').on('click', function(){
		$('body,html').animate({
			scrollTop: 0
		}, 600);
	});

	///////////////////////////
	// Btn nav collapse
	$('#nav .nav-collapse').on('click', function() {
		$('#nav').toggleClass('open');
	});

	///////////////////////////
	// Mobile dropdown
	$('.has-dropdown a').on('click', function() {
		$(this).parent().toggleClass('open-drop');
	});

	///////////////////////////
	// On Scroll
	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();

		// Fixed nav
		if(wScroll > 1){
			$('#nav').addClass('fixed-nav');
			$('.navbar-brand h2 span').css('color', '#10161A');
			$('#index-logo').css('margin-top', '2%');
		}else{
			$('#nav').removeClass('fixed-nav');
			$('.navbar-brand h2 span').css('color', 'white');
			$('#index-logo').css('margin-top', '0%');
		}
		// Back To Top Appear
		wScroll > 700 ? $('#back-to-top').fadeIn() : $('#back-to-top').fadeOut();
	});

	///////////////////////////
	// magnificPopup
	$('.work').magnificPopup({
		delegate: '.lightbox',
		type: 'image'
	});

	///////////////////////////
	// Owl Carousel
	$('#about-slider').owlCarousel({
		items:1,
		loop:true,
		margin:15,
		nav: true,
		navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		dots : true,
		autoplay : true,
		animateOut: 'fadeOut'
	});

	$('#testimonial-slider').owlCarousel({
		loop:true,
		margin:15,
		dots : true,
		nav: false,
		autoplay : true,
		responsive:{
			0: {
				items:1
			},
			992:{
				items:2
			}
		}
	});

})(jQuery);
