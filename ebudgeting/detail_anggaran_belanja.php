<?php 
	$eab = mysql_fetch_array(mysql_query("SELECT a.*, b.vol_fisik, b.id_detail_target, b.persen_fisik, b.ttb_fisik, b.rp_keuangan, b.persen_keuangan, b.ttb_keuangan, 
												c.id_detail_realisasi, c.vol_fisik as vol_fisikk, c.persen_fisik as persen_fisikk, c.ttb_fisik as ttb_fisikk, c.rp_keuangan as rp_keuangann, c.persen_keuangan as persen_keuangann, c.ttb_keuangan as  ttb_keuangann 
													FROM rb_anggaran_belanja a
														JOIN rb_detail_target b ON a.id_anggaran_belanja=b.id_anggaran_belanja
															JOIN rb_detail_realisasi c ON a.id_anggaran_belanja=c.id_anggaran_belanja
																where a.id_anggaran_belanja='$_GET[id]'"));
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Detail Anggaran Belanja</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="anggaran-belanja.mu" class="small-box"><i class="icon-refresh icon-white"></i> Kembali</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<div class='alert alert-block'>
	<button type='button' class='close' data-dismiss='alert'>x</button>
		Program / Kegiatan / Mata Anggaran dan Pagu anggaran 1 Tahun
</div>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	  <fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Data Umum</label>
	      <div class='controls'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_data_umum");
				while ($r = mysql_fetch_array($du)){
					if ($eab[id_data_umum]==$r[id_data_umum]){
						echo "<input style='width:90%' type='text' class='input-xlarge' name='d' value='$r[nama_program]' rel='popover' disabled>";
					}
				}
			?>       
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jenis dan Sub Jenis</label>
	      <div class='controls'>

            <?php 
				$jsj = mysql_query("SELECT * FROM rb_sub_jenis_belanja a JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja");

				while ($r = mysql_fetch_array($jsj)){
					if ($eab[id_sub_jenis_belanja]==$r[id_sub_jenis_belanja]){
						echo "<input style='width:90%' type='text' class='input-xlarge' name='d' value='$r[keterangan] -> $r[keterangan_sub_jenis]' rel='popover' disabled>";
					}
				}
			?>          
	      </div>
	</div>

	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan Anggaran</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required' disabled><?php echo "$eab[keterangan_anggaran]"; ?></textarea>   
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Total Anggaran</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='d' value='<?php echo "$eab[total_rp]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Vol</label>
	      <div class='controls'>
	        <input type='text' class='input-small' value='<?php echo "$eab[vol]"; ?>' name='e' rel='popover' disabled>  <input type='text' value='<?php echo "$eab[ket_vol]"; ?>' class='input-large' name='kv' rel='popover' disabled>    
	      </div>
	</div>

<div class='alert alert-block'>
	<button type='button' class='close' data-dismiss='alert'>x</button>
		Target Rencana Opersional Sampai Bulan Ini
</div>

	<table>
		<tr>
			<td>
					<div class='control-group'>
						<label class='control-label' for='input01'>Jenis Target</label>
						  <div class='controls'>
							<select name='a1'>
							<?php 
								echo "<option value='1'>Fisik</option>";
							?>        
							</select>     
						  </div>
					</div>
					
					<div class='control-group'>
						<label class='control-label' for='input01'>Vol</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "$eab[vol_fisik]"; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>%</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[persen_fisik],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>TTB</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[ttb_fisik],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
			</td>
			<td>
					<div class='control-group'>
						<label class='control-label' for='input01'>Jenis Target</label>
						  <div class='controls'>
							<select name='a2'>
							<?php 
								echo "<option value='2'>Keuangan</option>";
							?>        
							</select>     
						  </div>
					</div>
					
					<div class='control-group'>
						<label class='control-label' for='input01'>Rp</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "$eab[rp_keuangan]"; ?>' name='b2' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>%</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[persen_keuangan],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>TTB</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[ttb_keuangan],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
			</td>
		</tr>
	</table>
	
<div class='alert alert-block'>
	<button type='button' class='close' data-dismiss='alert'>x</button>
		Realisasi Sampai Bulan Ini
</div>

	<table>
		<tr>
			<td>
					<div class='control-group'>
						<label class='control-label' for='input01'>Jenis Target</label>
						  <div class='controls'>
							<select name='a3'>
							<?php 
								echo "<option value='1'>Fisik</option>";
							?>        
							</select>     
						  </div>
					</div>
					
					<div class='control-group'>
						<label class='control-label' for='input01'>Vol</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "$eab[vol_fisikk]"; ?>' name='b3' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>%</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[persen_fisikk],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>TTB</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[ttb_fisikk],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
			</td>
			<td>
					<div class='control-group'>
						<label class='control-label' for='input01'>Jenis Target</label>
						  <div class='controls'>
							<select name='a4'>
							<?php 
								echo "<option value='2'>Keuangan</option>";
							?>        
							</select>     
						  </div>
					</div>
					
					<div class='control-group'>
						<label class='control-label' for='input01'>Rp</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "$eab[rp_keuangann]"; ?>' name='b4' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>%</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[persen_keuangann],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='input01'>TTB</label>
						  <div class='controls'>
							<input type='text' class='input-large' value='<?php echo "".number_format($eab[ttb_keuangann],2).""; ?>' name='b1' rel='popover' disabled>    
						  </div>
					</div>
			</td>
		</tr>
	</table>
	<br><hr>
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan Akhir</label>
	      <div class='controls'>
	        <textarea data-field="ka" name="ka" style="width:97%; height:60px;" class='required' disabled><?php echo "$eab[keterangan_akhir]"; ?></textarea>   
	      </div>
	</div>
	  </fieldset>
	</form>

</section>