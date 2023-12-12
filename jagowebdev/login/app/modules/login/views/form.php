<?php
user_header('Login', 'Login ke akun kamu', 'Registrasi');
?>
<div class="wrapper page-body">
	<?php
	if (!empty($message)) {
		show_message($message);
	}
	?>
	<div class="login-form has-border">
		<div class="login-form-body bg-white">
			<form method="post" action="">
				<div class="row mb-3">
					<label class="col-sm-2">Email</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" name="email" value="" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
					</div>
				</div>
				<div class="row mb-3">
				  <label class="col-sm-2">Password</label>
				  <div class="col-sm-9">
					<input type="password"  name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
				  </div>
				</div>
				<div class="row mb-3">
					<div class="checkbox offset-sm-2">
						<label style="font-weight:normal"><input name="remember" value="1" type="checkbox">&nbsp;&nbsp;Remember me on this browser</label>
					</div>
				</div>
				<div class="row mb-3" style="margin-bottom:7px">
					<div class="col-10 offset-sm-2 col-sm-9">
						<button type="submit" class="btn btn-success" name="submit">Submit</button>
						<?php
							csrf_field();
						?>
					</div>
				</div>
			</form>
		</div>
		<div class="login-form-footer">
			<p>Lupa Password? <a href="<?=$config['base_url'].'recovery'?>">Reset password disini</a></p>
			<p>Belum punya akun? <a href="<?=$config['base_url'].'register'?>">Daftar disini</a></p>
		</div>
	</div>
</div>