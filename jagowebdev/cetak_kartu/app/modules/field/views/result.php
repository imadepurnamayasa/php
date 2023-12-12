<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=$current_module['judul_module']?></h5>
	</div>
	
	
	
	<div class="card-body">
		<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
			<div class="tab-content" id="myTabContent">
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Font Family</label>
					<div class="col-sm-5">
						<select name="font_family" id="global-font-family" class="form-select">
							<?php
							$fonts = ['Arial', 'Verdana', 'Open Sans', 'Segoe UI'];
							foreach ($fonts as $val) {
								echo '<option value="'.$val.'">' . $val . '</option>';
							}
							?>
							
						<select>
					</div>
				</div>
				<div class="form-group row mb-3">
					<label class="col-sm-3 col-md-2 col-lg-3 col-xl-2 col-form-label">Font Size</label>
					<div class="col-sm-5">
						<div class="col-sm-3">
							<div class="range-slider-test">
								<?php
								$value = @$font_size ? $font_size : @$_POST['font_size'];
								?>
							  <input class="font-slider" id="font-size" type="range" step="0.5" name="font_size" id="font-size" value="<?=$value?>" min="10" max="20">
							  <?php
							  $pos_left = (($value - 10 ) * 33);
							  ?>
							  <output for="font-size" style="left:<?=$pos_left?>px"><?=$value?></output>px
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="form-group row mb-3">
					<div class="col-sm-6">
						<?php
						$dimensi_kartu = get_dimensi_kartu($layout['panjang'], $layout['lebar'], $printer['dpi']);
						$style = 'width:' . $dimensi_kartu['w']. 'px; height:' . $dimensi_kartu['h'] . 'px';
						?>
						<div id="preview-container" style="<?=$style?>;position:relative">
						
						<?php
							echo '<img style="width:100%" src="'.BASE_URL. $config['kartu_path'] . $background['background_depan'] . '"/>';
							
							$attribute = json_decode($layout['attribute'], true);
							$style = 'width:' . get_dimensi($attribute['foto']['w'], $printer['dpi']). 'px; height:' . get_dimensi($attribute['foto']['h'], $printer['dpi']) . 'px';
							echo '
								<div class="foto" style="' . $style . ';font-size:85%;flex-direction: column;position:absolute;top:'.get_dimensi($attribute['foto']['top'], $printer['dpi']).'px;left:'.get_dimensi($attribute['foto']['left'], $printer['dpi']).'px;display: flex;color: #FFFFFF;background: #c7c7c7;justify-content: center;align-items: center;border: 2px dashed #959595">
									<div>Foto</div>
									<div id="foto-w"></div>
									<div id="foto-h"></div>
									<div id="foto-t"></div>
									<div id="foto-l"></div>
								</div>';
							
							echo '
								<div class="identitas" style="position:absolute;top:'.get_dimensi($attribute['identitas']['top'], $printer['dpi']).'px;left:'.get_dimensi($attribute['identitas']['left'], $printer['dpi']).'px;color: #FFFFFF;background: #c7c7c7;border: 2px dashed #959595;font-size:' . $attribute['identitas']['font-size'] . '">
									<table><tbody>';
									foreach ($field as $val) {
										echo '<tr>
											<td class="kolom-attribute">' . $val['judul_kolom'] . '</td>
											<td class="colon">:</td>
											<td>Data ' . $val['judul_kolom'] . '</td>';
									}
									echo '
									</tbody></table>';
							echo '
								</div>';
						?>
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="bg-lightgrey p-3 mb-3">Field</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Top</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-identitas-pos-t" value="<?=round(get_dimensi($attribute['foto']['top'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Left</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-identitas-pos-l" value="<?=round(get_dimensi($attribute['foto']['left'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Atribut</label>
							<div class="col-sm-8 form-inline">
								<select name="show_attribute" class="form-select" id="identitas-show-attribute">
									<option value="Y">Tampilkan</option>
									<option value="N">Sembunyikan</option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Align Text</label>
							<div class="col-sm-8 form-inline">
								<select name="identitas_align" class="form-select" id="identitas-align">
									<option value="L">Left</option>
									<option value="C">Center</option>
								</select>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Box Center</label>
							<div class="col-sm-8 form-inline">
								<button class="btn identitas-box-center-vertical btn-outline-secondary">Vertical</button>
								<button class="btn identitas-box-center-horizontal btn-outline-secondary">Horizontal</button>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Jarak Baris</label>
							<div class="col-sm-8 form-inline">
								<div class="range-slider-test">
									<?php
									$value = @$font_size ? $font_size : @$_POST['font_size'];
									?>
									<input class="line-height-slider" id="font-size" type="range" step="1" name="font_size" id="font-size" value="<?=$value?>" min="15" max="40">
									<?php
									$pos_left = (($value - 10 ) * 33);
									?>
									<output for="font-size" style="left:<?=$pos_left?>px"><?=$value?></output>px
								</div>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Jarak Titik Dua</label>
							<div class="col-sm-8 form-inline">
								<div class="range-slider-test">
									<?php
									$value = @$font_size ? $font_size : @$_POST['font_size'];
									?>
									<input class="colon-slider" id="font-size" type="range" step="1" name="font_size" id="font-size" value="<?=$value?>" min="1" max="10">
									<?php
									$pos_left = (($value - 10 ) * 33);
									?>
									<output for="font-size" style="left:<?=$pos_left?>px"><?=$value?></output>px
								</div>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Lebar Atribut</label>
							<div class="col-sm-8 form-inline">
								<div class="range-slider-test">
									<?php
									$value = @$font_size ? $font_size : @$_POST['font_size'];
									?>
									<input class="lebar-attribute-slider" type="range" step="1" name="attribute[identitas][lebar_attribute]" value="<?=$value?>" min="50" max="300">
									<?php
									$pos_left = (($value - 10 ) * 33);
									?>
									<output for="font-size" style="left:<?=$pos_left?>px"><?=$value?></output>px
								</div>
							</div>
						</div>
						<hr/>
						<ul class="identitas-item-container" id="identitas-item-container">
						<?php
						helper('html');
						foreach ($field as $val) {
							echo '<li class="mb-3 form-inline identitas-item" style="display:flex" data-aktif="' . $val['aktif'] . '" data-id-field="' . $val['id_field'] . '">
									' . options(['name' => 'aktif', 'class' => 'identitas-option-aktif'], [1 => 'Aktif', 0 => 'Tidak Aktif'], $val['aktif']) . '<input type="text" class="form-control attribute-item" data-aktif="' . $val['aktif'] . '" data-judul-kolom="' . $val['judul_kolom'] . '" name="' . $val['nama_kolom'] . '" value="' . $val['judul_kolom'] . '"/>'  . '<span class="grip-handler" style="color: #bababa; padding: 5px 7px; cursor: move; background: #f4f4f4;"><i class="fas fa-grip-vertical"></i></span>
									<input type="hidden" name="urut[]" value="' . $val['id_field'] . '"/>
								</li>';
						}
						
						?>
						</ul>
						<div class="bg-lightgrey p-3 mb-3">Foto</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Width</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-foto-w" value="<?=round(get_dimensi($attribute['foto']['w'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Height</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-foto-h" value="<?=round(get_dimensi($attribute['foto']['h'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Top</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-foto-t" value="<?=round(get_dimensi($attribute['foto']['top'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Left</label>
							<div class="col-sm-8 form-inline">
								<input class="form-control" id="input-foto-l" value="<?=round(get_dimensi($attribute['foto']['left'], $printer['dpi']), 1)?>"/>
							</div>
						</div>
						<div class="form-group row mb-3">
							<label class="col-sm-3 col-form-label">Center</label>
							<div class="col-sm-8 form-inline">
								<button class="btn foto-box-center-vertical btn-outline-secondary">Vertical</button>
								<button class="btn foto-box-center-horizontal btn-outline-secondary">Horizontal</button>
							</div>
						</div>
						
						
						
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-sm-5">
						<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
						<input type="hidden" name="id" value="<?=@$_GET['id']?>"/>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<div class="card-body">
		sds
		</div>
</div>