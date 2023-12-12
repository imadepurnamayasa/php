<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=$current_module['judul_module']?></h5>
	</div>
	<div class="card-body">
	<?php
		if (!empty($message)) {
				show_alert($message);
	} ?>
	<a href="<?=module_url()?>/add" class="btn btn-success btn-xs"><i class="fas fa-plus pe-1"></i> Tambah Data</a>
	<hr/>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Survey</th>
				<th>Deskripsi Survey</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
		helper('html');
		$no = 1;
		foreach ($result as $val) {
			echo '<tr>
					<td>' . $no . '</td>
					<td>' . $val['judul'] . '</td>
					<td>' . $val['deskripsi'] . '</td>
					<td>' . btn_action([
							'edit' => ['url' => BASE_URL . 'survey/edit?id='. $val['id_survey']]
							, 'delete' => ['url' => ''
											, 'id' =>  $val['id_survey']
											,'delete-title' => 'Hapus data survey: <strong>'.$val['judul'].'</strong> ?'
										]
							]) .
					'</td>
			</tr>';
			$no++;
		}
		?>
		</tbody>
	</table>
	</div>
</div>