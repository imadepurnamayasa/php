<div class="page-header bg-abstract-danger">
	<div class="wrapper page-header-user">
		<h1 class="page-title">Profil User</h1>
		<p class="page-desc">Edit password Anda</p>
		<div class="page-tabs clearfix">
			<?php
			echo tab_menu('User', 'Edit Password');
			?>
		</div>
	</div>
</div>
<div class="wrapper page-body">
	<?php
	if (!empty($message)) {
		show_message($message);
	}?>
	<div class="login-form has-border">
		<div class="login-form-body">
			<form method="post" action="">
				<div class="row mb-3">
					<label class="col-sm-3">Password Lama</label>
					<div class="col-sm-9">
						<input type="password"  name="password_lama" class="form-control register-input" placeholder="Password Lama" aria-label="Password" required>
						<p class="small">Password yang kamu gunakan untuk login saat ini</p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3">Password Baru</label>
					<div class="col-sm-9">
						<input type="password"  name="password_baru" class="form-control register-input" placeholder="Password Baru" aria-label="Password Baru" required>
						<div class="pwstrength_viewport_progress"></div>
						<p class="small">Bantu kami untuk melindungi data kamu dengan membuat password yang kuat (balok indikator: medium-strong), mininal 7 karakter, terdiri dari huruf kecil, huruf besar, and angka.</p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3">Password Baru</label>
					<div class="col-sm-9">
						<input type="password"  name="ulangi_password_baru" class="form-control register-input" placeholder="Password Baru" aria-label="Password Baru" required>
						<p class="small">Ulangi password baru</p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="offset-sm-3 col-sm-9">
						<button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
						<?=csrf_field()?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>