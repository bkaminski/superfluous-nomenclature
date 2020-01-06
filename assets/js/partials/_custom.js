(function( $ ) {
	$( document ).ready(function() {
	
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

    //HIDE OFFERINGS WITH NO ABV
    $(".list-group-item:contains('-1')").hide();

    //Hover effect on Ben's logo
    $("img.a").hover(
    function() {
    	$(this).stop().animate({"opacity": "0"}, "slow");
    },
    function() {
    	$(this).stop().animate({"opacity": "1"}, "slow");
    });

    //TRIGGER SEARCH MODAL
    $(".wbw-search-modal").click(function(){
        $("#searchModal").modal('show');
    });

    //FOCUS SEARCH INPUT
    $('#searchModal').on('shown.bs.modal', function () {
    	$('#searchWbw').trigger('focus')
    });

    //ADD RESPONSIVE IMAGE CLASS TO CMB2 IMAGE UPLOAD
    $('#logoVector').find('img').addClass('img-fluid');

    //ADD RESPONSIVE CLASS TO EVENT IMAGE
    $('.eme_event_image').addClass('img-fluid mx-auto d-block');

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
});
//TOGGLE FONTAWESOME ON CLICK
document.addEventListener('DOMContentLoaded', function () {
	$('.navbar-toggler').on('click', function () {
		$(this)
		.find('i')
		.toggleClass('fa-bars')
		.toggleClass('fa-times');
	});
});

})( jQuery );
