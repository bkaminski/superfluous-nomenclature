(function( $ ) {

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
