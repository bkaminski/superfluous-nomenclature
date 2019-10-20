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
		if ($window.width() < 850) {

		};
		if ($window.width() >= 850) {

		}
	}
	checkWidth2();
	$(window).resize(checkWidth);
	// END RESPONSIVE CONTROLS
	});	
})( jQuery );
