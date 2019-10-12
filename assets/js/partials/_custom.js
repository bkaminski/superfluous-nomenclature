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

//AGE VERIFICATION MODAL FIRES ON READY
$(document).ready(function() {
    $('#wbwbeerModal').modal('show');
    $('#wbwbeerModal').on('hidden.bs.modal', function () {
    $('#wbwbeerModal iframe').removeAttr('src');
    })
});

//NO ESCAPE ON MODAL
$('#wbwbeerModal').modal({
  keyboard: false,
  backdrop: 'static',
});


	
})( jQuery );
