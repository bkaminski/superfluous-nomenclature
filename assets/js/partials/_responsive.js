(function( $ ) {

// RESPONSIVE CONTROLS
var $window = $(window);

function checkWidth() {
    if ($window.width() < 750) {
        $(".navbar").css('background', '#fff');
    };
    if ($window.width() >= 750) {
        $(".navbar").css('background', 'transparent');
    }
}
checkWidth();
$(window).resize(checkWidth);
// END RESPONSIVE CONTROLS
	
	
	
})( jQuery );
