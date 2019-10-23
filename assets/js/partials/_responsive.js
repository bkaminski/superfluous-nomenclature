(function( $ ) {
	$( document ).ready(function() {

	// RESPONSIVE CONTROLS
	var $window = $(window);
	function checkWidth() {
		if ($window.width() < 750) {


		};
		if ($window.width() >= 750) {
			
		}
	}
	checkWidth();
	function checkWidth2() {
		if ($window.width() < 828) {
			$('#wbwFrame').addClass('embed-responsive-1by1').css('height', '100vh');
		};
		if ($window.width() >= 828) {
			$('#wbwFrame').removeClass('embed-responsive-1by1').addClass('embed-responsive-16by9').css('height', 'inherit');
		}
	}
	checkWidth2();
	$(window).resize(checkWidth2);
	// END RESPONSIVE CONTROLS
	});	
})( jQuery );
