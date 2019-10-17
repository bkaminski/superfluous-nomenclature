(function( $ ) {

// RESPONSIVE CONTROLS
var $window = $(window);

function checkWidth() {
    if ($window.width() < 750) {
   
    };
    if ($window.width() >= 750) {
     
    }
}
checkWidth();
$(window).resize(checkWidth);
// END RESPONSIVE CONTROLS
		
})( jQuery );
