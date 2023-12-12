/**
* Written by: Agus Prawoto Hadi
* Year		: 2021
* Website	: jagowebdev.com
*/

function initMap() {
		// The location of Uluru
		const uluru = { lat: -25.344, lng: 131.036 };
		// The map, centered at Uluru
		const map = new google.maps.Map(document.getElementById("map"), {
		  zoom: 4,
		  center: uluru,
		});
		// The marker, positioned at Uluru
		const marker = new google.maps.Marker({
		  position: uluru,
		  map: map,
		});
}

jQuery(document).ready(function () {
	
	// Not using a.has-children because will loose mouseleave event
	$('li.has-children').mouseenter(function(){
		if ($('.nav-header').offset().left > 0) { 
			$(this).find('.arrow').eq(0).addClass('rotate180');
			$(this).children('ul').stop(true, true).fadeIn('fast');
		}
	}).mouseleave(function(){
		if ($('.nav-header').offset().left > 0) { 
			$(this).find('.arrow').eq(0).removeClass('rotate180');
			$(this).children('ul').stop(true, true).fadeOut('fast');
		}
	});
	
	// Not using li.has-children because it effect the event child
	$('a.has-children').click(function(e) {
		if ($('.nav-header').offset().left == 0) {
			// alert();
			$(this).find('.arrow').toggleClass('notransform');
			$(this).parent().children('.submenu').stop(true, true).slideToggle();
			$(this).parent().toggleClass('tree-open');
		}
		return false;
	});
	
	$('.has-mobile-children').click(function(){
		$(this).next().stop(true, true).slideToggle();
		return false;
	});
	$('.has-mobile-children').click(function(){
		$(this).toggleClass('tree-open');
	});
	
	$('#mobile-menu-btn').click(function(){
		$('body').toggleClass('mobile-menu-show');
		return false;
	});
	$('.account-menu-btn').click(function()
	{
		if ($('.nav-header').offset().left == 0) {
			$(this).next().stop(true, true).slideToggle();
		} else {
			$(this).next().stop(true, true).fadeToggle();
		}
		return false;
	});
});