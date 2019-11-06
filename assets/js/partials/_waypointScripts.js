(function( $ ) {
	$( document ).ready(function() {
		$('.logo-img').waypoint(function() {
			$('.logo-img').addClass('animated fadeInUp');
		}, {
			duration: '600'
		});
		$('.beer-header').waypoint(function() {
			$('.beer-header').find('img').addClass('animated fadeInDown');
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
	});

})( jQuery );
