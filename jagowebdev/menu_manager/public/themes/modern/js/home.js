/**
* Written by: Agus Prawoto Hadi
* Year		: 2021
* Website	: jagowebdev.com
*/

jQuery(document).ready(function () {
	
	$('.form-contact').submit(function(e){
		e.preventDefault();
		
		$form = $(this);
		$button_submit = $('#kirim-pesan');
		
		$form.find('.alert-cloned').remove();
		$alert = $form.find('.alert');
		$alert_cloned = $alert.clone().insertBefore($alert);
		$alert_cloned.addClass('alert-cloned');
		
		$button_submit.attr('disabled', 'disabled');
		$button_submit.addClass('disabled');
		$loader = $button_submit.find('i').removeClass().addClass('fas fa-circle-notch fa-spin mr-3');
		
		// return false;
		$.ajax({
			type : 'post',
			dataType : 'json',
			url : base_url + 'contact',
			data : $form.serialize() + '&submit=submit&ajax=ajax',
			success : function(data) {
				alert_status = data.status == 'ok' ? 'alert-success' : 'alert-danger';
				$alert_cloned.removeClass('alert-danger alert-success').addClass(alert_status);
				$alert_cloned.find('.text').html(data.message);
				$alert_cloned.fadeIn('fast');
				
				$button_submit.removeAttr('disabled');
				$button_submit.removeClass('disabled');
				$loader.removeClass().addClass('fas fa-paper-plane mr-3');
				console.log(data);
				
			}, error : function(xhr) {
				console.log(xhr);
			}
		});
		
	})
	
	$('.sidebar').overlayScrollbars({scrollbars : {autoHide: 'leave', autoHideDelay: 100} });
	$('.sidebar-left').overlayScrollbars({scrollbars : {autoHide: 'leave', autoHideDelay: 100} });
});
