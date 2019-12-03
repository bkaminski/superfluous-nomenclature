(function( $ ) {
	$( document ).ready(function() {
		$('.logo-img').waypoint(function() {
			$('.logo-img').addClass('animated fadeInUp');
		}, {
			duration: '600'
		});
		$('.beer-header, .cider-header').waypoint(function() {
			$('.beer-header, .cider-header').find('img').addClass('animated fadeInDown');
		}, {
			offset: '100%'
		});
		$('.home-about').waypoint(function() {
			$('.home-about').addClass('animated fadeInLeft');
		}, {
			offset: '100%'
		});
		$('.social-fade').waypoint(function() {
			$('.social-fade').addClass('animated fadeInDown');
		}, {
			offset: '100%'
		});
		$('.new-fade').waypoint(function() {
			$('.new-fade').addClass('animated fadeInLeft');
		}, {
			offset: '100%'
		});
		$('.events-up').waypoint(function() {
			$('.events-up').addClass('animated fadeInUp');
		}, {
			offset: '100%'
		});
		$('.feat--img, .video').waypoint(function() {
			$('.feat--img, .video').addClass('animated fadeIn');
		}, {
			offset: '100%'
		});
		$('.aboutwbw').waypoint(function() {
			$('.aboutwbw').addClass('animated fadeInLeft');
		}, {
			offset: '100%'
		});
		$('.about--img').waypoint(function() {
			$('.about--img').addClass('animated fadeInUp');
		}, {
			offset: '100%'
		});
		$('.about--img2').waypoint(function() {
			$('.about--img2').addClass('animated fadeInUp');
		}, {
			offset: '100%'
		});
	});

})( jQuery );
