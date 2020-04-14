(function( $ ) {
	$( document ).ready(function() {

	//DELAY LOGO LOAD
	var $rows = $('#logoHero').addClass('visible');
	setTimeout(function() {
		$rows.removeClass('invisible');
	}, 1000);

	//Parallax Background
	$window = $(window);
	$('section[data-type="background"]').each(function(){
		var $scroll = $(this);
		$(window).scroll(function() {
			var yPos = -($window.scrollTop() / $scroll.data('speed'));
			var coords = '70% '+ yPos + 'px';
			$scroll.css({ backgroundPosition: coords });
		});
	});

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

//WOOCOMMERCE FIXES
$('#billing_first_name_field, #account_username_field, #createaccount, #shipping_postcode_field, #shipping_state_field, #shipping_city_field, #shipping_address_1_field, #shipping_address_2_field, #account_password_field, #shipping_country_field, #billing_last_name_field, #billing_company_field, #shipping_company_field, #billing_country_field, #billing_address_1_field, #billing_address_2_field, #billing_city_field, #billing_state_field, #billing_postcode_field, #billing_phone_field, #billing_email_field, #order_comments_field, #shipping_first_name_field, #shipping_last_name_field').addClass('form-group').removeClass('form-row form-row-first form-row-last');
$('#billing_first_name, #billing_last_name, #shipping_city, #shipping_postcode, #shipping_state, #account_username, #shipping_address_1, #shipping_address_2, #account_password, #shipping_country, #billing_company, #billing_country, #shipping_company, #billing_address_1, #billing_address_2, #billing_city, #billing_state, #billing_postcode, #billing_phone, #billing_email, #order_comments, #shipping_first_name, #shipping_last_name').addClass('form-control');
$('.col-1').addClass('noClass').removeClass('col-1');
$('.col-2').addClass('noClass').removeClass('col-2');
$('.checkout-button').removeClass('button alt wc-forward').addClass('btn btn-blue text-uppercase');
$('.add_to_cart_button').removeClass('button product_type_variable add_to_cart_button').addClass('btn btn-blue rounded-0 btn-lg');
$('.single_add_to_cart_button').removeClass('single_add_to_cart_button button btn alt').addClass('btn btn-blue text-uppercase rounded-0 pr-4 pl-4');
$('.product_title').addClass('text-uppercase');
$('.donation_note').hide();
$('.wdgk_donation').addClass('form-control');
$('.wdgk_donation').before('<h3>Gratuity is always welcomed for staff</h2><small>please enter dollar amount</small>');
$('.wdgk_donation').attr('placeholder', '$' );
$('.wdgk_donation_content').each(function() {
	$(this).insertAfter($(this).parent().find('.woocommerce-additional-fields__field-wrapper'));
});




})( jQuery );
