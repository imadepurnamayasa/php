<?php
require_once('app/includes/functions.php');
helper ('html');?>
<div class="card">
	<div class="card-header">
		<h5 class="card-title">Data Menu</h5>
	</div>
	
	<div class="card-body row">
		<div class="col-sm-5 col-md-4 group-container">
			<a href="?module=gedung&action=add" class="btn btn-primary btn-xs" id="add-group"><i class="fa fa-plus pe-1"></i> Tambah Group</a>
			<hr/>
			<form style="display:none" method="post" class="modal-form" id="add-form-group" action="<?=current_url()?>" >
				<div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nama Group</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="nama_group" value="" placeholder="Nama Group" required="required"/>
						</div>
					</div>
					<input type="hidden" name="nama_group_old" value=""/>
				</div>
			</form>
			<ul class="list-group menu-group-container">
				<?php
				foreach ($menu_group as $index => $val) {
					$active = $index == 0 ? 'list-group-item-primary' : ''; 
					echo '<li data-nama-group="' . $val['nama_group'] . '" class="menu-group list-group-item list-group-item-action ' . $active . '">
							<span class="text">' . $val['nama_group'] . '</span>
							<a class="btn-action text-danger btn-remove" href="javascript:void(0)"><i class="fas fa-times"></i></a>
							<a class="btn-action text-success btn-edit" href="javascript:void(0)"><i class="fas fa-pen"></i></a>
						</li>';
					
				}
				?>
				<li data-nama-group="" class="menu-group list-group-item list-group-item-action list-group-item-secondary">
					<span class="text">Uncategorized</span>
				</li>
			</ul>
		</div>
		<div class="col-sm-7 col-md-8 menu-container">
			<a href="?module=gedung&action=add" class="btn btn-success btn-xs" id="add-menu"><i class="fa fa-plus pe-1"></i> Tambah Menu</a>
			<hr/>
			<form style="display:none" method="post" class="modal-form" id="add-form" action="<?=current_url()?>" >
				<div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nama Menu</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="nama_menu" value="" placeholder="Nama Menu" required="required"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">URL</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="url" value="" placeholder="URL" required="required"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Aktif</label>
						<div class="col-sm-8">
							<div class="mt-2">
							<input id="menu_aktif" type="checkbox" name="aktif" class="switch is-info is-medium" checked="checked">
							 <label for="menu_aktif"></label>
							</div>
							<small class="form-text text-muted"><em>Jika tidak aktif, semua children tidak akan dimunculkan</em></small>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Use icon</label>
						<div class="col-sm-8 form-inline">
							<input type="hidden" name="icon_class" value="far fa-circle"/>
							<?php 
								$options = array(1 => 'Ya', 0 => 'Tidak');
								echo options(['name' => 'use_icon'], $options);
							?>
							<a href="javascript:void(0)" class="icon-preview" data-action="faPicker"><i class="far fa-circle"></i></a>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Group</label>
						<div class="col-sm-8 form-inline">
							<?php 
								$options = [];
								foreach ($menu_group as $val) {
									$options[$val['nama_group']] = $val['nama_group'];
								}
								$options[''] = 'Uncategorized';
								echo options(['name' => 'nama_group'], $options);
							?>
						</div>
					</div>
					<input type="hidden" name="id" value="<?=@$_GET['id']?>"/>
					
				</div>
			</form>
			<?php

			if (!empty($msg)) {
				show_message($msg['content'], $msg['status']);
			}
			?>
			
			<div class="dd" id="list-menu">
				<?=$data['list_menu']?>
			</div>
		</div>
	</div>
</div>