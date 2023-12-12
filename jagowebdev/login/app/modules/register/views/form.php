<?php
user_header('Register', 'Buat akun baru', 'Registrasi');
?>
<div class="wrapper page-body">
	<?php
	if ($message) {
		show_message($message);
	}
	?>
	<div class="login-form has-border">
		<div class="login-form-header">
			<p>Komitmen kami: <strong>Data adalah amanah</strong>. Kami akan menjaga kerahasiaan data kamu dan <strong>tidak akan membagikannya</strong> ke pihak manapun. <em>Jika kamu sudah pernah register namun belum menerima link aktivasi, dilakan request <a target="blank" title="Kirim Ulang Link Aktivasi" href="<?=$config['base_url']?>activationlink">kirim ulang link aktivasi</a></em></p>
		</div>
		<div class="login-form-body bg-white">
			<form method="post" action="<?=$config['base_url']?>register" class="with-loader">
				<div class="row mb-3">
					<label class="col-4 col-sm-3">Nama Lengkap</label>
					<div class="col-8 col-sm-9">
						<div class="row row-cols-auto g-3 align-items-center">
							<div class="col">
								<select name="gender" class="form-control register-input">
									<option value="L">Bapak/Mas</option>
									<option value="P">Ibu/Mbak</option>
								</select>
							</div>
							<div class="col">
								<input type="text" name="nama" value="<?=set_value('nama')?>" class="form-control register-input" placeholder="Nama Lengkap" aria-label="Nama" required>
							</div>
						</div>
						<small class="small">Bagaimana kami seharusnya memanggil kamu?</small>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-4 col-sm-3">Username</label>
					<div class="col-8 col-sm-9">
						<input type="text" name="username" value="<?=set_value('username')?>" class="form-control register-input" placeholder="Username" aria-label="Username" required>
						<small class="small">Username Anda</small>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-4 col-sm-3">Email</label>
					<div class="col-8 col-sm-9">
						<input type="email"  name="email" value="<?=set_value('email')?>" class="form-control register-input" placeholder="Email" aria-label="Email" required>
						<p class="small">Email untuk login. Dapatkan juga informasi tentang produk terbaru, promo, voucher, dan info menarik lainnya</p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-4 col-sm-3">No. Handphone</label>
					<div class="col-8 col-sm-9">
						<input type="text"  name="hp" id="nohp" value="<?=set_value('hp')?>" class="form-control register-input" placeholder="No. Handphone" aria-label="No. HP">
						<p class="small">Dapatkan informasi produk terbaru, promo, voucher via Whatsapp</p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-4 col-sm-3">Password</label>
					<div class="col-8 col-sm-9">
						<input type="password"  name="password" class="form-control register-input" placeholder="Password" aria-label="Password" required>
						<div class="pwstrength_viewport_progress"></div>
						<p class="small">Bantu kami untuk melindungi data kamu dengan membuat password yang kuat (balok indikator: medium-strong), mininal 7 karakter, terdiri dari huruf kecil, huruf besar, and angka.</p>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-4 col-sm-3">Ulangi Password</label>
					<div class="col-8 col-sm-9">
						<input type="password"  name="password_confirm" class="form-control register-input" placeholder="Ulangi Password" aria-label="Ulangi Password" required>
						<p class="small">Ulangi password</p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-8 offset-sm-3 col-sm-9">
						<button type="submit" name="submit" value="submit" class="btn btn-success">Register</button>
						<?=csrf_field()?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>