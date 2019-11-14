(function( $ ) {
	$( document ).ready(function() {

	// RESPONSIVE CONTROLS
	var $window = $(window);
	function checkWidth() {

		if ($window.width() < 828) {
			$('#wbwFrame').addClass('embed-responsive-1by1 pb-5').css('height', '200vh');
			$('#logoVector').find('img').css('height', 'inherit');
		};
		if ($window.width() >= 828) {
			$('#wbwFrame').removeClass('embed-responsive-1by1 pb-5').addClass('embed-responsive-16by9').css('height', 'inherit');
			$('#logoVector').find('img').css('height', '270');
		}
	}
	
	checkWidth();
	$(window).resize(checkWidth);
	
	// END RESPONSIVE CONTROL
	});	
})( jQuery );
