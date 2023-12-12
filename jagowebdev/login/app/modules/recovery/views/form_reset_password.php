<?php
user_header('Reset Password', 'Buat password baru kamu', 'Registrasi', 'Reset Password');
?>
<div class="wrapper page-body">
	<?php
	if (!empty($message)) {
		show_message($message);
	}
	?>
	<div class="login-form has-border">
		<div class="login-form-body bg-white">
			<form method="post" action="<?=current_url()?>">
				
			<div class="row mb-3">
				<label class="col-sm-3">Password Baru</label>
				<div class="col-sm-9">
					<input type="password"  name="password" class="form-control register-input" placeholder="Password" aria-label="Password" required>
					<div class="pwstrength_viewport_progress"></div>
					<p class="small">Bantu kami untuk melindungi data kamu dengan membuat password yang kuat (balok indikator: medium-strong), mininal 7 karakter, terdiri dari huruf kecil, huruf besar, and angka.</p>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-3">Ulangi Password Baru</label>
				<div class="col-sm-9">
					<input type="password"  name="password_confirm" class="form-control register-input" placeholder="Confirm Password" aria-label="Confirm Password" required>
				</div>
			</div>
			<div class="row offset-sm-3">
				<div class="col-12">
					<button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
					<?=csrf_field()?>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>