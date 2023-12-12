<div class="page-header bg-abstract-danger">
	<div class="wrapper page-header-user">
		<h1 class="page-title">Profil User</h1>
		<p class="page-desc">Detail profil Anda</p>
		<div class="page-tabs clearfix">
			<?php
			echo tab_menu('User');
			?>
		</div>
	</div>
</div>
<div class="wrapper page-body">
	<div class="inline profile">
		<div class="row mb-3">
		<?php $img_url = !empty($user['avatar']) ? $config['base_url'] . 'public/images/user/' . $user['avatar'] : $config['base_url'] . 'public/images/user/man.png';?>
			<label class="col-sm-4 col-md-3 col-lg-2">Photo</label>
			<div class="col-8 col-md-9 col-sm-8"><img src="<?=$img_url?>"/></div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-4 col-md-3 col-lg-2">Nama</label><div class="col-8 col-md-9 col-sm-8"><?=$user['nama']?></div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-4 col-md-3 col-lg-2">Email</label><div class="col-8 col-md-9 col-sm-8"><?=$user['email']?></div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-4 col-md-3 col-lg-2">Tgl. Daftar</label><div class="col-8 col-md-9 col-sm-8"><?=format_tanggal($user['created']) ?: '-'?></div>
		</div>
		<div class="row mb-3">
			<label class="offset-sm-4 offset-md-3 offset-lg-2"><a href="<?=$config['base_url']?>user/edit-profile" class="btn btn-success">Edit</a></div>
		</div>
	</div>
</div>