(function( $ ) {
	
	$('.logo-img').waypoint(function() {
		$('.logo-img').addClass('animated fadeInUp');
	}, {
		duration: '600'
	});
	$('.home-about').waypoint(function() {
		$('.home-about').addClass('animated fadeInLeft');
	}, {
		duration: '5000',
		offset: '100%'
	});

})( jQuery );
