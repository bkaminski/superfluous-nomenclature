var $ = jQuery.noConflict();(function($) {
	// RESPONSIVE CONTROLS
var $window = $(window);

function checkWidth() {
    if ($window.width() < 768) {
        $(".navbar").css('background', '#fff');
    };
    if ($window.width() >= 768) {
        $(".navbar").css('background', 'transparent');
    }
}
checkWidth();
$(window).resize(checkWidth);
// END RESPONSIVE CONTROLS
	
	
	
})( jQuery );
