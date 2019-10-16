(function( $ ) {
	
	$('.logo-img').waypoint(function() {
		$('.logo-img').addClass('animated fadeInUp');
	}, {
		offset: '50%',
		duration: '600'
	});

})( jQuery );
