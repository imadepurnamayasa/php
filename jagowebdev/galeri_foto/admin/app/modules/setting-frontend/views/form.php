<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=$title?></h5>
	</div>
	<div class="card-body">
		<?php
		helper('html');
			if (!empty($message)) {
					show_message($message);
		} ?>
		<form method="post" action="<?=current_url(true)?>" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Timezone</label>
				<div class="col-sm-5">
					<?php
						echo options(['name' => 'current_timezone', 'class'=> 'select2'], $timezones, set_value('current_timezone', $config_survey['current_timezone']), true);
					?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Multiple Submit</label>
				<div class="col-sm-5">
					<div class="form-inline">
					<?php
						echo options(['name' => 'multiple_submit'], ['N' => 'Tidak', 'Y' => 'Ya'], set_value('multiple_submit', $config_survey['multiple_submit']));
					?>
					</div>
					<small class="text-muted">Perbolehkan user submit form lebih dari sekali? pengecekan dilakukan melalui Username (Jika survey mengharuskan login), alamat IP, maupun cookie browser</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Nama Penerima Email</label>
				<div class="col-sm-5">
					<input class="form-control" name="nama_email_tujuan" value="<?=$config_survey['nama_email_tujuan']?>"/>
					<small class="text-muted">Nama penerima email dalam hal hasil survey akan dikirim via email</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Alamat Email</label>
				<div class="col-sm-5">
					<input class="form-control" name="email_tujuan" value="<?=$config_survey['email_tujuan']?>"/>
					<small class="text-muted">Alamat email penerima dalam hal hasil survey akan dikirim via email</small>
				</div>
			</div>
			<div class="form-group row mb-0">
				<div class="col-sm-5">
					<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="id" value="<?=@$id_survey?>"/>
				</div>
			</div>
		</form>
	</div>
</div>