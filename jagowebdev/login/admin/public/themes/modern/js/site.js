/**
* Written by: Agus Prawoto Hadi
* Year		: 2020
* Website	: jagowebdev.com
*/
function show_alert(type, title, html) 
{
	Swal.fire({
		title: title,
		html: html,
		type: type,
		showCloseButton: true,
		confirmButtonText: 'OK'
	})
}

jQuery(document).ready(function () {
	$('.has-children').mouseenter(function(){
		$(this).children('ul').stop(true, true).fadeIn('fast');
	}).mouseleave(function(){
		$(this).children('ul').stop(true, true).fadeOut('fast');
	});
	
	$('.has-children').click(function(){
		var $this = $(this);
		$(this).next().stop(true, true).slideToggle('fast', function(){
			$this.parent().toggleClass('tree-open');
		});
		return false;
	});
	
	$('#mobile-menu-btn').click(function(){
		$('body').toggleClass('mobile-menu-show');
		return false;
	});
	$('#mobile-menu-btn-right').click(function(){
		$('header').toggleClass('mobile-right-menu-show');
		return false;
	});
	$('.profile-btn').click(function(){
		$(this).next().stop(true, true).fadeToggle();
		return false;
	});
	
	bootbox.setDefaults({
		centerVertical: true,
		animate: false,
		className: "my-modal"
	});
	
	// DELETE Button 
	$('body').delegate('[data-action="delete-data"]', 'click', function(e){
		e.preventDefault();
		var $this =  $(this)
			, $form = $this.parents('form:eq(0)');
		bootbox.confirm({
			message: $this.attr('data-delete-title'),
			callback: function(confirmed) {
				if (confirmed) {
					$form.submit();
				}
			}
		});
	})
	
	$('.sidebar').overlayScrollbars({scrollbars : {autoHide: 'leave', autoHideDelay: 100} });
});