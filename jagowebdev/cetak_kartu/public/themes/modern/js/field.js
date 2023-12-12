jQuery(document).ready(function () 
{
	
	let pixel_cm = 0.0264583333;
	
	$(document).ready(function() {
	
		$('.foto')
		.resizable({
			minWidth: 75,
			minHeight: 75,
			resize: function(event, ui) {
				var w = parseInt($(this).width()) * pixel_cm;
				var h = parseInt($(this).height()) * pixel_cm;
				
				w = w.toFixed(1);
				h = h.toFixed(1);
				$('#foto-w').text('W: ' + w);
				$('#foto-h').text('H: ' + h);
				$('#input-foto-w').val(w);
				$('#input-foto-h').val(h);
			}
		})
		.draggable({
			containment: $('#preview-container'),
			drag: function(){
				var offset = $(this).offset();
				var xPos = parseInt(offset.left) * pixel_cm;
				var yPos = parseInt(offset.top) * pixel_cm;
				xPos = xPos.toFixed(1);
				yPos = yPos.toFixed(2);
				
				$('#foto-t').text('T: ' + yPos);
				$('#foto-l').text('L: ' + xPos);
				$('#input-foto-t').val(yPos);
				$('#input-foto-l').val(xPos);
				// $('#posX').text('x: ' + xPos);
				// $('#posY').text('y: ' + yPos);
			},
			stop: function(){
				var finalOffset = $(this).offset();
				var finalxPos = finalOffset.left;
				var finalyPos = finalOffset.top;
				// $('#finalX').text('Final X: ' + finalxPos);
				// $('#finalY').text('Final X: ' + finalyPos);
			}
		});
		
		$('.identitas')
		.draggable({
			containment: $('#preview-container'),
			drag: function(){
				var offset = $(this).offset();
				var xPos = parseInt(offset.left) * pixel_cm;
				var yPos = parseInt(offset.top) * pixel_cm;
				xPos = xPos.toFixed(1);
				yPos = yPos.toFixed(2);
				
				$('#input-identitas-pos-t').val(yPos);
				$('#input-identitas-pos-l').val(xPos);
			},
			stop: function(){
				var finalOffset = $(this).offset();
				var finalxPos = finalOffset.left;
				var finalyPos = finalOffset.top;
			}
		});		
	});
	
	$('.attribute-item').blur(function(){
		$this = $(this);
		id = $this.parent().attr('data-id-field');
		$.ajax({
			type : 'post',
			url : base_url + '/field/ajax-update-field-judul',
			data : 'submit=submit&id=' + id + '&judul=' + $this.val(),
			dataType : 'JSON',
			success : function(data) {
				generatePreviewIdentitas();
				if (data.status == 'error') {
					show_alert('error', 'Error !!!', data.message);
				}
			}, error : function (xhr) {
				show_alert('error', 'Ajax Error !!!', 'Silakan cek di console browser');
				console.log(xhr);
			}
			
		})
	})
	
	function generatePreviewIdentitas() {
		tr = '';
		$('.identitas-item').each(function(i, elm) 
		{
			if ($(elm).attr('data-aktif') == 1) {
				
				judul_kolom = $(elm).find('.attribute-item').val();
				class_name = $('#identitas-align').val() == 'C' ? 'aligncenter' : '';
				
				tr += '<tr class="' + class_name + '">';
				if($('#identitas-show-attribute').val() == 'Y') {
					if($('#identitas-align').val() == 'C') {
						tr += '<td><span>' + judul_kolom + '</span><span class="colon">:</span><span>Data ' + judul_kolom + '</span></td>';
					} else {
						tr += '<td>' + judul_kolom + '</td><td>:</td><td>Data ' + judul_kolom + '</td>';
					}
				} else {
					tr += '<td>Data ' + judul_kolom + '</td>';
				}
				
				tr += '</tr>';
			}
		});

		$('.identitas').find('tbody').html(tr);
	}
	
	$('#global-font-family').change(function() {
		// console.log($('.identitas').find('p').length);
		$('.identitas').find('td').css('font-family', this.value);
	});
	
	$('#global-font-size').change(function() {
		// console.log($('.identitas').find('p').length);
		$('.identitas').find('p').css('font-size', this.value);
	});
	
	$('#identitas-line-height').change(function() {
		// console.log($('.identitas').find('p').length);
		$('.identitas').find('p').css('line-height', this.value);
	});
	
	$('.font-slider').on('input', function(){
		
		 // Cache this for efficiency
		el = $(this);
	
		$('.identitas').find('td').css('font-size', el.val() + 'px');

		$output = el.next("output");
		box = $output.width() / 2;
		
		var init = 25;
		var curr = ( (el.val() - 10 ) * 33 ) - box;
		var top_pos = 22 + el.position().top;
		
		el
		.next("output")
		.css({ 
			left: curr + init,
			top: top_pos
			
		})
		.text(el.val());
	})
	
	$('#identitas-show-attribute').change(function(){
		$option = $(this);
	
		tr = '';
		$('.attribute-item').each(function(i, elm) {
			if ($(elm).attr('data-aktif') == 1) {
				
				judul_kolom = $(elm).attr('data-judul-kolom');
				class_name = $('#identitas-align').val() == 'C' ? 'aligncenter' : '';
				
				tr += '<tr class="' + class_name + '">';
				if($option.val() == 'Y') {
					if($('#identitas-align').val() == 'C') {
						tr += '<td><span>' + judul_kolom + '</span><span class="colon">:</span><span>Data ' + judul_kolom + '</span></td>';
					} else {
						tr += '<td>' + judul_kolom + '</td><td>:</td><td>Data ' + judul_kolom + '</td>';
					}
				} else {
					tr += '<td>Data ' + judul_kolom + '</td>';
				}
				
				tr += '</tr>';
			}
		});

		$('.identitas').find('tbody').html(tr);
	});
	
	$('#identitas-align').change(function(){
		$option = $(this);
		
		tr = '';
		$('.attribute-item').each(function(i, elm) {
			if ($(elm).attr('data-aktif') == 1) {
				
				judul_kolom = $(elm).attr('data-judul-kolom');
				if($option.val() == 'L') {
					if ($('#identitas-show-attribute').val() == 'Y') {
						tr += '<tr><td>' + judul_kolom + '</td><td>:</td><td>Data ' + judul_kolom + '</td>></tr>';
					} else {
						tr += '<tr><td>Data ' + judul_kolom + '</td></tr>';
					}
				} else {
					
					tr += '<tr class="aligncenter">';
					if ($('#identitas-show-attribute').val() == 'Y') {
						tr += '<td><span>' + judul_kolom + '</span><span class="colon">:</span><span>Data ' + judul_kolom + '</span></td>';
					} else {
						tr += '<td>Data ' + judul_kolom + '</td>';
					}
					tr += '</tr>';
				}
			}
		});

		$('.identitas').find('tbody').html(tr);
	});
	
	$('.line-height-slider').on('input', function(){
		
		 // Cache this for efficiency
		el = $(this);
		
		$tr = $('.identitas').find('tr');
		$tr_selected = $('.identitas').find('tr:lt(' + ( $tr.length - 1) + ')');
		$tr_selected.css('height', el.val() + 'px');

		$output = el.next("output");
		box = $output.width() / 2;
		
		var init = 25;
		var curr = ( (el.val() - 10 ) * 33 ) - box;
		var top_pos = 22 + el.position().top;
		
		el
		.next("output")
		.css({ 
			left: curr + init,
			top: top_pos
			
		})
		.text(el.val());
	})
	
	$('.colon-slider').on('input', function(){
		
		 // Cache this for efficiency
		el = $(this);
		
		$colon = $('.identitas').find('.colon');
		if ($colon.length > 0) {
			
			console.log(el.val());
			// $colon.css({'margin-left' : el.val(), 'margin-right' : el.val()});
			$colon.css('padding-right', el.val() + 'px');
		}

		$output = el.next("output");
		box = $output.width() / 2;
		
		var init = 25;
		var curr = ( (el.val() - 10 ) * 33 ) - box;
		var top_pos = 22 + el.position().top;
		
		el
		.next("output")
		.css({ 
			left: curr + init,
			top: top_pos
			
		})
		.text(el.val());
	})
	
	function center_element($elm, direction) {
		if (direction == 'vertical') {
			elm_height = $elm.outerHeight(true);
			container_height = $('#preview-container').height();
			center = ( container_height / 2 ) - (elm_height / 2);
			$elm.css('top', center + 'px');
		} else {
			elm_width = $elm.outerWidth(true);
			container_width = $('#preview-container').width();
			center = ( container_width / 2 ) - (elm_width / 2);
			$elm.css('left', center + 'px');
		}
	}
	
	$('.foto-box-center-horizontal').click(function(e) {
		e.preventDefault();
		center_element( $('.foto'), 'horizontal');
	});
	
	$('.foto-box-center-vertical').click(function(e) {
		e.preventDefault();
		center_element( $('.foto'), 'vertical');
	});
	
	$('.identitas-box-center-horizontal').click(function(e) {
		e.preventDefault();
		$this = $('.identitas');
		elm_width = $this.outerWidth(true);
		container_width = $('#preview-container').width();
		center = ( container_width / 2 ) - (elm_width / 2);
		$this.css('left', center + 'px');
	});
	
	$('.identitas-box-center-vertical').click(function(e) {
		e.preventDefault();
		$this = $('.identitas');
		elm_height = $this.outerHeight(true);
		container_height = $('#preview-container').height();
		center = ( container_height / 2 ) - (elm_height / 2);
		$this.css('top', center + 'px');
	});
	
	$('.lebar-attribute-slider').on('input', function(){
		
		 // Cache this for efficiency
		el = $(this);
		
		$kolom_attribute = $('.identitas').find('.kolom-attribute');
		if ($kolom_attribute.length > 0) {
			$kolom_attribute.css('width', parseInt(el.val()) + 'px');
		}

		$output = el.next("output");
		box = $output.width() / 2;
		
		var init = 25;
		var curr = ( (el.val() - 10 ) * 33 ) - box;
		var top_pos = 22 + el.position().top;
		
		el
		.next("output")
		.css({ 
			left: curr + init,
			top: top_pos
			
		})
		.text(el.val());
	})
  
  
	var $preview_container = $('#preview-container');
	var $parent = $preview_container.parent();
		
	$('#pilih-background').change(function(){
		// alert();
		console.log(module_url + '?action=preview');
		
	});
	
	$('#btn-preview').click(function(e){
		// alert();
		e.preventDefault();
		// position = {};
		$form = $('#form-qrcode');
		data = $form.serialize();
		$.ajax({
			method : 'GET',
			data: data,
			url : module_url + '?action=preview',
			success: function(data) {
				posisi_kartu = $('#posisi-kartu').val();
				
				json = $.parseJSON($('#background-file').html());
				url_bg = base_url + 'public/images/kartu/' + json[posisi_kartu];
				// console.log(bg);
				
				
				if (url_bg) {
					$("<img/>")
						.on('load', function() 
						{
							json = $.parseJSON($('#dimensi-kartu').html());
							// console.log(this);
							$preview_container.show().html(data);
							// $(this).css('width', json.w).css('height', json.h).appendTo($preview_container);
							$preview_container.find('img').remove();
							$(this).css('width', '100%').appendTo($preview_container);
							setDisplace();

						}).on('error', function(xhr) {
							alert('Error: lihat console');
							console.log(xhr);
						})
						.attr("src", url_bg);
						
						
						
						
				}
				
			},
			error: function() {
				
			}
		});
	});
	
	$('.identitas-option-aktif').change(function() 
	{
		$this = $(this);
		id = $this.parent().attr('data-id-field');
		$.ajax({
			type : 'post',
			url : base_url + '/field/ajax-update-aktif',
			data : 'submit=submit&aktif=' + $this.val() + '&id=' + id,
			dataType : 'JSON',
			success : function(data) {
				if (data.status == 'error') {
					show_alert('error', 'Error !!!', data.message);
				}
			}, error : function (xhr) {
				console.log(xhr);
				show_alert('error', 'Ajax Error !!!', 'Silakan cek di console browser');
			}
			
		})
	});
	
	function initDragIdentitasItem() {
		dragIdentitasItem = dragula([document.getElementById('identitas-item-container')], {
			moves: function (el, container, handle) {
				return handle.classList.contains('grip-handler') || handle.parentNode.classList.contains('grip-handler');
			}
		});
		
		dragIdentitasItem.on('dragend', function(el)
		{
			let $el = $(el);
			
			$input_urut = $('#identitas-item-container').find('input[name="urut[]"]');
			
			list_id = [];
			$input_urut.each(function(i, elm){
				list_id.push( $(elm).val() );
			});
			
			urut = JSON.stringify(list_id);
			$.ajax({
				type : 'post',
				url : base_url + '/field/ajax-update-field-sort',
				data : 'submit=submit&urut=' + urut,
				dataType : 'JSON',
				success : function(data) {
					if (data.status == 'error') {
						show_alert('error', 'Error !!!', data.message);
					}
				}, error : function (xhr) {
					show_alert('error', 'Ajax Error !!!', 'Silakan cek di console browser');
					console.log(xhr);
				}
				
			})
		});
	 }
	
	initDragIdentitasItem();
});
