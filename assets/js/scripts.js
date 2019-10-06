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

var $ = jQuery.noConflict();(function($) {
	
	//Animate slide up and down nav dropdowns.
	$('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    //REMOVE TITLE TAG FROM LINK HOVER
     $('.nav-link').removeAttr('title');
	
})( jQuery );
