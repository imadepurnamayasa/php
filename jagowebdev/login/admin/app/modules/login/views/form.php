<div class="login-body">
	<?php
	if (!empty($message)) {?>
		<div class="alert alert-danger">
			<?=$message?>
		</div>
	<?php }
	?>
	<form method="post" action="" class="form-horizontal form-login">
	<div class="form-group input-group mb-3">
	  <div class="input-group-prepend login-input">
		<span class="input-group-text" id="basic-addon1">
			<i class="fa fa-user"></i>
		</span>
	  </div>
	  <input type="text" name="username" value="<?=@$_POST['username']?>" class="form-control login-input" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
	</div>
	<div class="form-group input-group mb-3">
	  <div class="input-group-prepend login-input">
		<span class="input-group-text" id="basic-addon1">
			<i class="fa fa-lock" style="font-size:22px"></i>
		</span>
	  </div>
	  <input type="password"  name="password" class="form-control login-input" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
	</div>
	<div style="margin:10px">
	    Administrator: username: admin, password: AppRegister21, user biasa: username: user, password: user. Versi demo tidak dapat mengubah data kecuali menu Layout Setting
	</div>
	<div class="form-group input-group mb-3">
		<div class="checkbox">
			<label style="font-weight:normal"><input name="remember" value="1" type="checkbox">&nbsp;&nbsp;Remember me</label>
		</div>
	</div>
	<div class="form-group" style="margin-bottom:7px">
		<button type="submit" class="form-control btn <?=$setting_web['btn_login']?>" name="submit">Submit</button>
		<?php csrf_field(); ?>
	</div>
</div>