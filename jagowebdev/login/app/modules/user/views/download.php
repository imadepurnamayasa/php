<div class="page-header bg-abstract-danger">
	<div class="wrapper page-header-user">
		<h1 class="page-title">Register</h1>
		<p class="page-desc">Buat akun baru</p>
		<div class="page-tabs clearfix">
			<?php
			echo tab_menu('User', 'Download');
			?>
		</div>
	</div>
</div>
<div class="wrapper page-body bg-white">
	<div class="login-form has-border">
	
		<?php
			if (!empty($message)) {
					show_message($message);
		} ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul File</th>
						<th>Deskripsi File</th>
						<th>Download File</th>
					</tr>
				</thead>
				<tbody>
				
				<?php
				helper('html');
				$no = 1;
				foreach ($result as $val) {
					echo '<tr>
							<td>' . $no . '</td>
							<td>' . $val['judul_file'] . '</td>
							<td>' . $val['deskripsi_file'] . '</td>
							<td>' . btn_label([
												'attr' => ['class' => 'btn btn-outline-secondary btn-inline']
												, 'url' => $config['base_url'] . 'filedownload/download?id=' . $val['id_file_download']
												, 'icon' => 'fas fa-file-download'
												, 'label' => 'Download'
											]) . '
					</tr>';
					$no++;
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>