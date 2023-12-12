<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		$dataumum = mysql_fetch_array(mysql_query("SELECT id_data_umum, ($_POST[d]/pagu_anggaran)*100 as bobot FROM rb_data_umum where id_data_umum='$_POST[a]'"));
		$sisapagu = $_POST[d]-$_POST[b4];
		if ($_SESSION[level] == 'admin'){
			$stat == 'Y';
		}else{
			$stat == 'Y';
		}

		mysql_query("INSERT INTO rb_anggaran_belanja (id_data_umum, id_sub_jenis_belanja, keterangan_anggaran, total_rp, bobot, vol, ket_vol, sisa_pagu, keterangan_akhir, tgl_jam, id_user, stat)
					 VALUES ('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$dataumum[bobot]','$_POST[e]','$_POST[kv]','$sisapagu','','$waktu','$_SESSION[id_user]','$stat')");
					 
			
		$id_anggaran=mysql_insert_id();
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
		
		mysql_query("INSERT INTO rb_detail_target (id_anggaran_belanja, vol_fisik, persen_fisik, ttb_fisik, rp_keuangan, persen_keuangan, ttb_keuangan, waktu_target, id_user)
					 VALUES ('$id_anggaran','$_POST[b1]','$persenfisik','$ttbfisik','$_POST[b2]','$persenkeuangan','$ttbkeuangan','$waktu','$_SESSION[id_user]')");
		
		
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
		
		mysql_query("INSERT INTO rb_detail_realisasi (id_anggaran_belanja, vol_fisik, persen_fisik, ttb_fisik, rp_keuangan, persen_keuangan, ttb_keuangan, waktu_realisasi, id_user)
					 VALUES ('$id_anggaran','$_POST[b3]','$persenfisikrealisasi','$ttbfisikrealisasi','$_POST[b4]','$persenkeuanganrealisasi','$ttbkeuanganrealisasi','$waktu','$_SESSION[id_user]')");
	
		echo "<script>window.alert('Sukses Menambahkan Data Anggaran Belanja Baru.');
				window.location='anggaran-belanja.mu'</script>";
	}
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Tambahkan Anggaran Belanja</a>
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
	        <select name='a'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_data_umum where id_user='$_SESSION[id_user]'");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($du)){
					echo "<option value='$r[id_data_umum]'>$r[nama_program]</option> ";
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
				$jsj = mysql_query("SELECT * FROM rb_sub_jenis_belanja a JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja where a.id_user='$_SESSION[id_user]'");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($jsj)){
					echo "<option value='$r[id_sub_jenis_belanja]'>$r[keterangan] -> $r[keterangan_sub_jenis]</option> ";
				}
			?>        
			</select>     
	      </div>
	</div>

	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan Anggaran</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required'></textarea>   
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Total Anggaran</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='d' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Vol</label>
	      <div class='controls'>
	        <input type='text' class='input-small' name='e' rel='popover'>  <input type='text' class='input-large' name='kv' rel='popover'>    
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
							<input type='text' class='input-large' name='b1' rel='popover'>    
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
							<input type='text' class='input-large' name='b2' rel='popover'>    
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
							<input type='text' class='input-large' name='b3' rel='popover'>    
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
							<input type='text' class='input-large' name='b4' rel='popover'>    
						  </div>
					</div>
			</td>
		</tr>
	</table>
	
	<br><hr><div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button name='simpan' type='submit' style='width:120px' class='btn btn-success' rel='tooltip' title='first tooltip'>Submit</button>
		   <a href='home.mu'><button style='width:120px' type='button' class='btn'>Batal</button></a>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>

</section>