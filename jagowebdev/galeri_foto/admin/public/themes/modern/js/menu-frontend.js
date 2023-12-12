/**
* Written by: Agus Prawoto Hadi
* Year		: 2020
* Website	: jagowebdev.com
*/

$(document).ready(function() 
{
	function attachMenuEditor() {
		$('#list-menu').wdiMenuEditor({
			expandBtnHTML   : '<button data-action="expand" class="fa fa-plus" type="button">Expand</button>',
			collapseBtnHTML : '<button data-action="collapse" class="fa fa-minus" type="button">Collapse</button>',
			editBtnCallback : function($list) 
			{
				var $button = '';
				var	$bootbox = showForm('edit');
				
				var $button = $bootbox.find('button').prop('disabled', true);
				var $loader = $bootbox.find('.loader');

				$.getJSON(base_url + '?module=menu-frontend&action=ajax-menu-detail&ajax=true&id=' + $list.data('id'), function(result) 
				{
					$loader.remove();
					$button.prop('disabled', false);
					
					var $form = $('#add-form').clone().show();
					$form.find('[name="nama_menu"]').val(result.nama_menu);
					$form.find('[name="url"]').val(result.url);
					$form.find('[name="id"]').val(result.id_menu);
					$form.find('[name="nama_group"]').val(result.nama_group);
					
					$aktif = $form.find('[name="aktif"]');
					if (result.aktif == 'Y') {
						$aktif.attr('checked', 'checked');
					} else {
						$aktif.removeAttr('checked');
					}
					
					$use_icon = $form.find('[name="use_icon"]');
					$icon = $form.find('[name="icon_class"]');
					
					if (result.class != null && $.trim(result.class) != '' && result.class != 'null') {
						$use_icon.val(1);
						$icon.val(result.class);
						$form.find('.icon-preview').find('i').removeAttr('class').addClass(result.class);
					} else {
						$use_icon.val(0);
						$icon.val('');
						$form.find('.icon-preview').hide();
					}
					
					$bootbox.find('.modal-body').empty().append($form);
				})
			},
			beforeRemove: function(item, plugin) {
				var $bootbox = bootbox.confirm({
					message: "Yakin akan menghapus menu?<br/>Semua submenu (jika ada) akan ikut terhapus",
					buttons: {
						confirm: {
							label: 'Yes',
							className: 'btn-success submit'
						},
						cancel: {
							label: 'No',
							className: 'btn-danger'
						}
					},
					callback: function(result) {
						if(result) {
							$button = $bootbox.find('button').prop('disabled', true);
							$button_submit = $bootbox.find('button.submit');
							$button_submit.prepend('<i class="fas fa-circle-notch fa-spin me-2 fa-lg"></i>');
							$.ajax({
								type: 'POST',
								url: base_url + '?module=menu-frontend&action=ajax-menu-delete',
								data: 'id=' + item.attr('data-id'),
								success: function(msg) {
									msg = $.parseJSON(msg);
									if (msg.status == 'ok') {
										Swal.fire({
											text: msg.message,
											title: 'Sukses !!!',
											type: 'success',
											showCloseButton: true,
											confirmButtonText: 'OK'
										})
										plugin.deleteList(item);
									} else {
										Swal.fire({
											title: 'Error !!!',
											text: msg.message,
											type: 'error',
											showCloseButton: true,
											confirmButtonText: 'OK'
										})
									}
								},
								error: function() {
									
								}
							})
						}
					}
					
				});
			},
			
			// Drag end
			onChange: function(el) {
				list_data = $('#list-menu').wdiMenuEditor('serialize');
				data = JSON.stringify(list_data);

				$.ajax({
					url: base_url + 'menu-frontend/ajax-update-urut',
					type: 'post',
					dataType: 'json',
					data: 'data=' + data + '&group=' + $('.list-group-item-primary').attr('data-nama-group'),
					success: function(result) {
						if (result.status == 'error') {
							show_alert('error', 'Error !!!', data.message);
						}
					}, 
					error: function (xhr) {
						show_alert('error', 'Error !!!', 'Ajax error, untuk detailnya bisa di cek di console browser');
						console.log(xhr);
					}
				});
			}
		});
	}
	
	attachMenuEditor();
	
	$('.menu-group-container').delegate('.menu-group', 'click', function() 
	{
		var group = $(this).attr('data-nama-group');
		var $list_menu = $('#list-menu');
		var $group_container = $('.menu-group-container');
		var $btn = $('.card-body').find('li');
		
		$btn.attr('disabled','disabled');
		$btn.addClass('disabled');

		$list_menu.empty();
		$group_container.find('li').removeClass('list-group-item-primary');
		$(this).addClass('list-group-item-primary');
		$loader = $('<div class="loader-ring">').appendTo($list_menu);
		$.get(base_url + '?module=menu-frontend&action=ajax-get-menu&ajax=true&group=' + group, function(data) 
		{
			$loader.remove();
			$btn.removeAttr('disabled');
			$btn.removeClass('disabled');
			if (data) {
				$('#list-menu').html(data);
			} else {
				$('#list-menu').html('<div class="alert alert-danger">Data tidak ditemukan</div>');
			}
			
			$('#list-menu').wdiMenuEditor('customInit');
		})
		
	});
	
	$('.menu-group-container').delegate('.btn-edit', 'click', function(e) 
	{
		e.stopPropagation();
		if ($(this).hasClass('disabled'))
			return false;
		
		$bootbox = showFormKategori('edit', this);
		return false;
	});
	
	$('.menu-group-container').delegate('.btn-remove', 'click', function(e) 
	{
		e.stopPropagation();
		$this = $(this);
		if ($this.hasClass('disabled'))
			return false;
		
		$li = $this.parents('li').eq(0);
		$li.find('a').prop('disabled', true);
		$li.find('a').addClass('disabled');
		$li.prepend('<i class="fas fa-circle-notch fa-spin me-2 fa-lg me-2 text-muted"></i>');
		
		$.ajax({
			type: 'post',
			dataType: 'json',
			url: base_url + 'menu-frontend/ajax-group-delete',
			data: 'nama_group=' + $this.parents('li').eq(0).find('.text').html(),
			success: function (data) {
				$li.fadeOut('fast', function() {
					$li.remove();
				});
				if (data.status == 'error') {
					show_alert('error', 'Error !!!', data.message);
				}
			},
			error: function(xhr) {
				show_alert('error', 'Error !!!', xhr.responseText);
			}
		})
	});

	$(document).on('change', 'select[name="use_icon"]', function(){
		$this = $(this);
		if (this.value == 1) 
		{
			$icon_preview = $this.next().show();
			$this.next().show();
			var calass_name = $icon_preview.find('i').attr('class');
			$this.parent().find('[name="icon_class"]').val(calass_name);
		} else {
			$this.next().hide();
		}
	});
	
	$('#add-group').click(function(e) 
	{
		e.preventDefault();
		$bootbox = showFormKategori('add', this);
	});
	
	$('#add-menu').click(function(e) 
	{
		e.preventDefault();
		$bootbox = showForm('add', this);
	});
	
	function showFormKategori(type='add', el) 
	{
		var $button = '';
		var $bootbox = '';
		var $button_submit = '';
		var $form = $('#add-form-group').clone().show();		
		var msg = '<div class="form-container">' +  $form[0].outerHTML + '</div>';
		
		$bootbox =  bootbox.dialog({
			title: type == 'edit' ? 'Edit Group' : 'Tambah Group',
			message: msg,
			buttons: {
				cancel: {
					label: 'Cancel'
				},
				success: {
					label: 'Submit',
					className: 'btn-success submit',
					callback: function() 
					{
						$bootbox.find('.alert').remove();
						$button_submit.prepend('<i class="fas fa-circle-notch fa-spin me-2 fa-lg me-2"></i>');
						$button.prop('disabled', true);
						$form_filled = $bootbox.find('form');
						$.ajax({
							type: 'POST',
							url: base_url + '?module=menu-frontend&action=ajax-edit-group',
							data: $form_filled.serialize(),
							dataType: 'json',
							success: function (data) {
				
								$button_submit.find('i').remove();
								$button.prop('disabled', false);
								$group_container = $(el).parent().find('.menu-group-container');
								
								if (data.status == 'ok') 
								{
									var nama_group = $form_filled.find('input[name="nama_group"]').val();
									var nama_group_old = $form_filled.find('input[name="nama_group_old"]').val();
									
									// edit
									if (nama_group_old) {
										$(el).parents('li').eq(0).find('.text').html(nama_group);
									} 
									// add
									else {
										// console.log($(el).parent());
										
										$item = $group_container.children(':eq(0)').clone();
										$item.hide().removeClass('list-group-item-primary');
										$item.attr('data-nama-group', nama_group);
										$item.find('.text').html(nama_group);
										$group_container.prepend($item);
										$item.fadeIn('fast');
									}

									$bootbox.modal('hide');
									show_alert('success', 'Sukses !!!', data.message);
								} else {
									show_alert('error', 'Error !!!', data.message);
								}
							},
							error: function (xhr) {
								show_alert('error', 'Error !!!', xhr.responseText);
								console.log(xhr.responseText);
							}
						})
						return false;
					}
				}
			}
		});
		
		if (type == 'edit') {
			nama_group = $(el).parents('li').eq(0).find('.text').html();
			$bootbox.find('input[name="nama_group"]').val(nama_group);
			$bootbox.find('input[name="nama_group_old"]').val(nama_group);
		}
		
		$button = $bootbox.find('button').prop('disabled', false);
		$button_submit = $bootbox.find('button.submit');
		return $bootbox;
	}
	
	
	// Edit Menu
	function showForm(type='add') 
	{
		var $button = '';
		var $bootbox = '';
		var $button_submit = '';
			
		var $form = $('#add-form').clone().show();

		if (type == 'edit') {
			var msg = '<div class="loader-ring loader"></div>';
		} else {
			var msg = '<div class="form-container">' +  $form[0].outerHTML + '</div>';
		}
		
		$bootbox =  bootbox.dialog({
			title: type == 'edit' ? 'Edit Menu' : 'Tambah Menu',
			message: msg,
			buttons: {
				cancel: {
					label: 'Cancel'
				},
				success: {
					label: 'Submit',
					className: 'btn-success submit',
					callback: function() 
					{
						
						$bootbox.find('.alert').remove();
						$button_submit.prepend('<i class="fas fa-circle-notch fa-spin me-2 fa-lg"></i>');
						$button.prop('disabled', true);
						$form_filled = $bootbox.find('form');
						
						
						list_data = $('#list-menu').wdiMenuEditor('serialize');
						menu_tree = JSON.stringify(list_data);
						
						console.log($form_filled.serialize());
				
						$.ajax({
							type: 'POST',
							url: base_url + '?module=menu-frontend&action=ajax-menu-edit',
							data: $form_filled.serialize() + '&menu_tree=' + menu_tree,
							dataType: 'text',
							success: function (data) {
								data = $.parseJSON(data);
								
								if (data.status == 'ok') 
								{
									var nama_menu = $form_filled.find('input[name="nama_menu"]').val();
									var id = $form_filled.find('input[name="id"]').val();
									var use_icon = $form_filled.find('select[name="use_icon"]').val();
									var icon_class = $form_filled.find('input[name="icon_class"]').val();
									
									// edit
									if (id) {
										$menu = $('#list-menu').find('[data-id="'+id+'"]');
										$menu.find('.menu-title:eq(0)').text(nama_menu);
									} 
									// add
									else {
										$menu_container = $('#list-menu').children();
										$menu = $menu_container.children(':eq(0)').clone();
										$menu.find('ol, ul').remove();
										$menu.find('[data-action="collapse"]').remove();
										$menu.find('[data-action="expand"]').remove();
										$menu.attr('data-id', data.id_menu);
										$menu.find('.menu-title').text(nama_menu);
									}
									
									$handler = $menu.find('.dd-handle:eq(0)');
									$handler.find('i').remove();
									
									if (use_icon == 1) {
										$handler.prepend('<i class="'+icon_class+'"></i>');
									}
									
									if (!id) {
										$menu_container.prepend($menu);
									}
									
									$bootbox.modal('hide');
									
									
									show_alert('success', 'Sukses !!!', data.message);
									$('.menu-group-container').find('.list-group-item-primary').click();
									
									
								} else {
									$button_submit.find('i').remove();
									$button.prop('disabled', false);
									if (data.error_query != undefined) {
										show_alert('error', 'Error !!!', data.message);
									} else {
										$bootbox.find('.modal-body').prepend('<div class="alert alert-dismissible alert-danger" role="alert">' + data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
									}
								}
							},
							error: function (xhr) {
								console.log(xhr.responseText);
							}
						})
						return false;
					}
				}
			}
		});
		
		$button = $bootbox.find('button').prop('disabled', false);
		$button_submit = $bootbox.find('button.submit');
		
		if (type == 'edit') {
			$button.prop('disabled', true);
		}
		
		return $bootbox;
	}
	
	$(document).on('click', '.icon-preview', function() {

		$this = $(this);
		fapicker({
			iconUrl: base_url + 'public/vendors/font-awesome/metadata/icons.yml',
			onSelect: function (elm) {
				
				var icon_class = $(elm).data('icon');
				$this.find('i').removeAttr('class').addClass(icon_class);
				$this.parent().find('[name="icon_class"]').val(icon_class);
			}
		});
	});

});