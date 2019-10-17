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

//REMOVE TRANSPARENT HEADER ON SCROLL
$(function() {
    //caches a jQuery object containing the header element
    var header = $(".wbw-navbar");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 300) {
            header.removeClass('wbw-navbar').addClass('wbw-navbar-solid shadow-lg');
        } else {
            header.removeClass("wbw-navbar-solid shadow-lg").addClass('wbw-navbar');
        }
    });
});

})( jQuery );
