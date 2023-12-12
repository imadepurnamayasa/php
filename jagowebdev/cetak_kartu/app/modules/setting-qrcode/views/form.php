<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=$title?></h5>
	</div>
	
	<div class="card-body">
		<?php 
		// echo '<pre>'; print_r($layout); die;
			include 'app/helpers/html_helper.php';
		if (!empty($msg)) {
			show_message($msg['content'], $msg['status']);
		}
		$dimensi_kartu = get_dimensi_kartu($layout['panjang'], $layout['lebar'], $printer['dpi']);
		?>
		<form method="post" action="" id="form-qrcode" enctype="multipart/form-data">
			<div class="tab-content">
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Version</label>
					<div class="col-sm-5 form-inline">
						<?php
						$list = range(0,40);
						unset($list[0]);
						echo options(['name' => 'version'], $list, set_value(@$_POST['version'], @$version));
						?>
						<div class="clearfix">
							<small class="form-text text-muted">Pilih version 1 s.d 40. Versi menentukan jumlah karakter yang ditampung, misal dengan error correction level 7%, version 1 dapat menampung 25 karakter alphanumeric, 2:47, 3:77, 4:114. Semakin besar version semakin besar ukuran QRCode, jadi <strong>gunakan versi sesuai kebutuhan</strong></small>
						</div>
					</div>
					
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">ECC Level</label>
					<div class="col-sm-5 form-inline">
						<?php
						echo options(['name' => 'ecc'], ['L' => 'L | Low (7%)', 'M' => 'M | Medium (15%)', 'Q' => 'Q | Quality (25%)', 'H' => 'H | High (30%)'], set_value(@$_POST['version'], @$version));
						?>
						<div class="clearfix">
							<small class="form-text text-muted">Error Correction Capability. ECC digunakan agar qrcode tetap dapat terbaca meskipun rusak, L untuk paling rendah dan H untuk yang paling tinggi, semakin tinggi ECC semakin besar ukuran QR Code. Di aplikasi ini, karena qrcode berupa kode HTML, maka kita dapat menggunakan ECC Level L, sehingga karakter yang ditampung menjadi lebih banyak</strong></small>
						</div>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Size Pixel</label>
					<div class="col-sm-5 form-inline">
						<?php
						echo options(['name' => 'size_module'], ['0.5' => '0.5px', '1' => '1px', '1.5' => '1.5px', '2' => '2px', '2.5' => '2.5px', '3' => '3px'], set_value(@$_POST['size_module'], @$size_module));
						?>
						<div class="clearfix">
							<small class="form-text text-muted">Ukuran width (lebar) tiap tiap dot pada QR Code. Ukuran yang terlalu kecil menyebabkan QR Code sulit terbaca</small>
						</div>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Padding tepi</label>
					<div class="col-sm-5 form-inline">
						<?php
						echo options(['name' => 'padding'], ['1px' => '1px', '2px' => '2px', '3px' => '3px', '4px' => '4px', '5px' => '5px'
						,'6px' => '6px', '7px' => '7px', '8px' => '8px', '9px' => '9px', '10px' => '10px'], set_value(@$_POST['padding'], @$padding));
						?>
						<small class="form-text text-muted">Lebar garis tepi</small>
						<div class="upload-img-thumb"><span class="img-prop"></span></div>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Content Text</label>
					<div class="col-sm-5">
						<?php
							echo options(['name' => 'content_jenis', 'id' => 'content-jenis'], ['field_database' => 'Kolom Tabel Mahasiswa', 'content_jenis' => 'Global Text'], set_value(@$_POST['content_jenis'], @$content_jenis));
							
							$display = $content_jenis == 'field_database' ? '' : 'display:none'; 
							echo options(['name' => 'content_field_database', 'id' => 'content-field-database', 'class' => 'mt-2', 'style' => $display], $field_table, set_value(@$_POST['content_field_database'], @$content_field_database));
							
							$display = $content_jenis == 'global_text' ? '' : 'display:none'; 
						?>
						<div id="content-global-text" style="<?=$display?>">
							<textarea class="form-control mt-2" name="content_global_text"><?=set_value(@$_POST['content_global_text'], @$content_global_text)?></textarea><small class="form-text text-muted">Text QR Code akan digunakan di semua kartu</small>
						</div>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Posisi Kartu</label>
					<div class="col-sm-5">
						<?php 
						echo options(['name' => 'posisi_kartu', 'id' => 'posisi-kartu'], ['background_depan' => 'Background Depan', 'background_belakang' => 'Background Belakang'], set_value(@$_POST['posisi_kartu'], @$posisi_kartu));
						?>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Preview</label>
					<div class="col-sm-5">
						<?php
						$style = 'width:' . $dimensi_kartu['w']. 'px; height:' . $dimensi_kartu['h'] . 'px; position:relative';
						if ( !@$background[$posisi_kartu] ) {
							$style .= ';display:none';
						}
						?>
						<div id="preview-container" style="<?=$style?>">
						<?php
							if ($content_jenis == 'field_database') {
								$field_database = $content_field_database ;
								$sql = 'SELECT ' . $field_database . ' FROM mahasiswa LIMIT 1';
								$result = $db->query($sql)->getRowArray();
								$content = $result[$field_database];
							} else {
								$content = $content_global_text;
							}
		
							if (!empty($content)) {
								require BASE_PATH . 'app/libraries' . DS . 'vendors' . DS . 'qrcode' . DS . 'qrcode_extended.php';
								$qr = new QRCodeExtended();
								$ecc_code = ['L' => QR_ERROR_CORRECT_LEVEL_L
									, 'M' => QR_ERROR_CORRECT_LEVEL_M
									, 'Q' => QR_ERROR_CORRECT_LEVEL_Q
									, 'H' => QR_ERROR_CORRECT_LEVEL_H
								];
								$qr->setErrorCorrectLevel($ecc_code[$ecc]);
								$qr->setTypeNumber($version);
								$qr->addData($content);
								$qr->make();
								echo '<div class="qrcode-container" style="position:absolute;top:'.$posisi_top.'px;left:'.$posisi_left.'px;padding:'.$padding.'; background:#FFFFFF">' . $qr->saveHtml($size_module) . '</div>';
							} else {
								echo '<div class="qrcode-container" style="position:absolute;top:'.$posisi_top.'px;left:'.$posisi_left.'px;padding:'.$padding.'; background:none"></div>';
							}
						?>
						<?php
							if (!empty($posisi_kartu)) {
								echo '<img style="width:100%" src="'.BASE_URL. $config['kartu_path'] . $background[$posisi_kartu] . '"/>';
							}
						?>
						</div>
						<button type="button" id="btn-preview-qrcode" class="btn btn-outline-secondary mt-2">Preview QR Code</button>
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-sm-5">
						<button type="submit" name="submit" id="btn-submit" value="submit" class="btn btn-primary">Submit</button>
						<span style="display:none" id="dimensi-kartu"><?=json_encode(get_dimensi_kartu($layout['panjang'], $layout['lebar'], $printer['dpi']))?></span>
						<span style="display:none" id="background-file"><?=json_encode($background)?></span>
						<input type="hidden" name="posisi_top" id="posisi-top" value="<?=set_value(@$_POST['posisi_top'], @$posisi_top)?>"/>
						<input type="hidden" name="posisi_left" id="posisi-left" value="<?=set_value(@$_POST['posisi_left'], @$posisi_left)?>"/>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>