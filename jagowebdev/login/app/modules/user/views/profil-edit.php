<div class="page-header bg-abstract-danger">
	<div class="wrapper page-header-user">
		<h1 class="page-title">Profil User</h1>
		<p class="page-desc">Edit profil Anda</p>
		<div class="page-tabs clearfix">
			<?php
			echo tab_menu('User', 'Profile');
			?>
		</div>
	</div>
</div>
<div class="wrapper page-body">
	<?php
	helper('html');
	if (!empty($message)) {
		show_message($message);
	}?>
	<div class="login-form has-border">
		<div class="login-form-body">
			<form method="post" action="<?=current_url()?>" enctype="multipart/form-data">
				<div class="row mb-3 edit-profile">
					<label class="col-sm-2">Foto</label>
					<div class="col-sm-9 col-md-6">
						<?php
						if ($user['avatar']) {
							$path = 'public/images/user/';
							$file = $path . $user['avatar'];
							if (file_exists($file)) {
								echo '<div class="img-choose" style="margin:inherit;margin-bottom:10px">
										<div class="img-choose-container">
											<img src="' . $config['base_url'] . $file . '">
											<a href="javascript:void(0)" class="remove-img"><i class="fas fa-times"></i></a>
										</div>
									</div>
									';
							}
						}
						?>
						<input type="hidden" class="avatar-delete-img" name="avatar_delete_img" value="0">
						<input type="file" class="file" name="avatar">
						<input type="hidden" class="foto-max-size" name="foto_max_size" value="300000">
						<div class="small mt-2">Maksimal 300Kb, Minimal 100px x 100px, Tipe file: .JPG, .JPEG, .PNG</div>
						<div id="upload-img-thumb" class="upload-img-thumb"><span class="img-prop"></span></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2">Nama</label>
					<div class="col-sm-10">
						<div class="row row-cols-auto g-3 align-items-center">
							<div class="col">
								<?php
								echo options(['name' => 'gender'], ['L' => 'Bapak/Mas', 'P' => 'Ibu/Mbak'], set_value('gender', $user['gender']) );
								?>
							</div>
							<div class="col">
								<input type="text" name="nama" value="<?=set_value('nama', $user['nama'])?>" class="form-control register-input" placeholder="Nama" aria-label="Nama" required>
							</div>
						</div>
						<small class="small">Bagaimana kami seharusnya memanggil kamu?</small>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" value="<?=set_value('email', $user['email'])?>">
						<input type="hidden" name="email_old" class="form-control" value="<?=set_value('email', $user['email'])?>">
					</div>
				</div>
				<div class="row mb-2">
					<div class="offset-sm-2">
						<button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
						<input type="hidden" name="id_user" value="<?=$user['id_user']?>"/>
						<?=csrf_field()?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>