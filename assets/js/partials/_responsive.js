var $ = jQuery.noConflict();(function($) {
	// RESPONSIVE CONTROLS
var $window = $(window);

function checkWidth() {
    if ($window.width() < 768) {
        $();
    };
    if ($window.width() >= 768) {
        $();
    }
}
checkWidth();
$(window).resize(checkWidth);
// END RESPONSIVE CONTROLS
	
	
	
})( jQuery );
