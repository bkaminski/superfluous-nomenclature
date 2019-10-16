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

//DONT SHOW LOGO ANIMATION UNTIL AFTER BUTTON CLICK
$('#wbwbeerAgeConsent').on('shown.bs.modal', function () {
    $('.logo-img').hide();
});

$('#wbwbeerAgeConsent').on('hidden.bs.modal', function () {
    $('.logo-img').show();
});

})( jQuery );
