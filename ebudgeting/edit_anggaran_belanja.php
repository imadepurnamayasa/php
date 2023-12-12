<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		$dataumum = mysql_fetch_array(mysql_query("SELECT id_data_umum, ($_POST[d]/pagu_anggaran)*100 as bobot FROM rb_data_umum where id_data_umum='$_POST[a]'"));
		$sisapagu = $_POST[d]-$_POST[b4];
		
		mysql_query("UPDATE rb_anggaran_belanja SET id_data_umum			= '$_POST[a]',
													id_sub_jenis_belanja 	= '$_POST[b]',
													keterangan_anggaran		= '$_POST[c]',
													total_rp				= '$_POST[d]',
													bobot					= '$dataumum[bobot]',
													vol						= '$_POST[e]',
													ket_vol					= '$_POST[kv]',
													sisa_pagu				= '$sisapagu',
													keterangan_akhir		= '$_POST[ka]'  where id_anggaran_belanja='$_GET[id]'");
					 
		
		if ($_POST[b1] == ''){
			$persenfisik = '-';
			$ttbfisik    = '-';
		}else{
			$persenfisik = ($_POST[b1]/$_POST[e])*100;
			$ttbfisik    = ($persenfisik*$dataumum[bobot])/100;
		}
		
		if ($_POST[b2] == ''){
			$persenkeuangan = '-';
			$ttbkeuangan    = '-';
		}else{
			$persenkeuangan = ($_POST[b2]/$_POST[d])*100;
			$ttbkeuangan    = ($persenkeuangan*$dataumum[bobot])/100;
		}
		
		
		mysql_query("UPDATE rb_detail_target SET vol_fisik     		= '$_POST[b1]',
												 persen_fisik		= '$persenfisik',	
												 ttb_fisik			= '$ttbfisik',
												 rp_keuangan 		= '$_POST[b2]',
												 persen_keuangan 	= '$persenkeuangan',
												 ttb_keuangan		= '$ttbkeuangan'  where id_detail_target='$_POST[id]'");
		
		
		if ($_POST[b3] == ''){
			$persenfisikrealisasi    = '-';
			$ttbfisikrealisasi       = '-';
		}else{
			$persenfisikrealisasi    = ($_POST[b3]/$_POST[e])*100;
			$ttbfisikrealisasi       = ($persenfisikrealisasi*$dataumum[bobot])/100;
		}
		
		if ($_POST[b4] == ''){
			$persenkeuanganrealisasi = '-';
			$ttbkeuanganrealisasi    = '-';
		}else{
			$persenkeuanganrealisasi = ($_POST[b4]/$_POST[d])*100;
			$ttbkeuanganrealisasi    = ($persenkeuanganrealisasi*$dataumum[bobot])/100;
		}
		
		mysql_query("UPDATE rb_detail_realisasi SET vol_fisik  		= '$_POST[b3]',
													persen_fisik	= '$persenfisikrealisasi',
													ttb_fisik		= '$ttbfisikrealisasi',
													rp_keuangan		= '$_POST[b4]',
													persen_keuangan	= '$persenkeuanganrealisasi',
													ttb_keuangan	= '$ttbkeuanganrealisasi'  where id_detail_realisasi='$_POST[idd]'");
	
		echo "<script>window.alert('Sukses Update Data Anggaran Belanja.');
				window.location='anggaran-belanja.mu'</script>";
	}
	
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
		  <a class="brand" href="#">Update Anggaran Belanja</a>
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
	  <input type='hidden' value='<?php echo "$eab[id_detail_target]"; ?>' name='id'>
	  <input type='hidden' value='<?php echo "$eab[id_detail_realisasi]"; ?>' name='idd'>
	<div class='control-group'>
		<label class='control-label' for='input01'>Data Umum</label>
	      <div class='controls'>
	        <select name='a'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_data_umum");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($du)){
					if ($eab[id_data_umum]==$r[id_data_umum]){
						echo "<option value='$r[id_data_umum]' selected>$r[nama_program]</option> ";
					}else{
						echo "<option value='$r[id_data_umum]'>$r[nama_program]</option> ";
					}
				}
			?>    
			</select>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jenis dan Sub Jenis</label>
	      <div class='controls'>
	        <select name='b'>
            <?php 
				$jsj = mysql_query("SELECT * FROM rb_sub_jenis_belanja a JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($jsj)){
					if ($eab[id_sub_jenis_belanja]==$r[id_sub_jenis_belanja]){
						echo "<option value='$r[id_sub_jenis_belanja]' selected>$r[keterangan] -> $r[keterangan_sub_jenis]</option> ";
					}else{
						echo "<option value='$r[id_sub_jenis_belanja]'>$r[keterangan] -> $r[keterangan_sub_jenis]</option> ";
					}
				}
			?>        
			</select>     
	      </div>
	</div>

	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan Anggaran</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required'><?php echo "$eab[keterangan_anggaran]"; ?></textarea>   
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Total Anggaran</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='d' value='<?php echo "$eab[total_rp]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Vol</label>
	      <div class='controls'>
	        <input type='text' class='input-small' value='<?php echo "$eab[vol]"; ?>' name='e' rel='popover'>  <input type='text' value='<?php echo "$eab[ket_vol]"; ?>' class='input-large' name='kv' rel='popover'>    
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
							<input type='text' class='input-large' value='<?php echo "$eab[vol_fisik]"; ?>' name='b1' rel='popover'>    
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
							<input type='text' class='input-large' value='<?php echo "$eab[rp_keuangan]"; ?>' name='b2' rel='popover'>    
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
							<input type='text' class='input-large' value='<?php echo "$eab[vol_fisikk]"; ?>' name='b3' rel='popover'>    
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
							<input type='text' class='input-large' value='<?php echo "$eab[rp_keuangann]"; ?>' name='b4' rel='popover'>    
						  </div>
					</div>
			</td>
		</tr>
	</table>
	<br><hr>
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan Akhir</label>
	      <div class='controls'>
	        <textarea data-field="ka" name="ka" style="width:97%; height:60px;" class='required'><?php echo "$eab[keterangan_akhir]"; ?></textarea>   
	      </div>
	</div>
	
	<hr><div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button name='simpan' type='submit' style='width:120px' class='btn btn-success' rel='tooltip' title='first tooltip'>Update</button>
		   <a href='home.mu'><button style='width:120px' type='button' class='btn'>Batal</button></a>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>

</section>