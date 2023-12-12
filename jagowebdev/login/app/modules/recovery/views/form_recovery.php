<?php
user_header('Reset Password', 'Reset password akun kamu', 'Registrasi');
if (!empty($status)) {
	$alert_type = $status == 'error' ? 'alert-danger' : 'alert-success';?>
	<div class="alert <?=$alert_type?>">
		<div class="wrapper">
			<?=$message?>
		</div>
	</div>
<?php }
?>
<div class="wrapper page-body">
	<div class="login-form has-border">
		<div class="login-form-header">
			<p>Jika kamu lupa password login, kamu dapat meminta reset password disini. Isikan email kamu melalui form dibawah, kami akan mengirim link  reset password ke email kamu</p>
		</div>
		<div class="login-form-body bg-white">
			<form method="post" action="" class="with-loader">
				<div class="form-group row mb-3">
					<label class="col-sm-3">Email</label>
					<div class="col-sm-8">
						<input type="email"  name="email" class="form-control" value="<?=set_value('email')?>" class="" placeholder="Email" aria-label="Email" required>
						<?php if (!empty($form_errors['email'])) echo '<small class="alert alert-danger">' . $form_errors['email'] . '</small>'?>
					</div>
				</div>
				<div class="form-group row mb-3">
					<div class="col-sm-3 offset-sm-3 offset-md-4 offset-lg-3">
						<button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
						<?php
							csrf_field();
						?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>