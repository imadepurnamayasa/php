/**
* App		: PHP Admin Template
* Author	: Agus Prawoto Hadi
* Year		: 2021
* Website	: jagowebdev.com
*/

jQuery(document).ready(function () {
	$('#berlaku-jenis').change(function() {
		if (this.value == 'periode') {
			$('#periode').show();
			$('#custom-text').hide();
		} else {
			$('#periode').hide();
			$('#custom-text').show();
		}
	})
});