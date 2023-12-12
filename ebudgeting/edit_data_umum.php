<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("UPDATE rb_data_umum SET laporan_sampai 		= '$_POST[a]',
											 nama_program			= '$_POST[b]',
											 nama_kegiatan			= '$_POST[c]',
											 bidang_bagian_seksi	= '$_POST[d]',
											 kpa					= '$_POST[e]',
											 pptk					= '$_POST[f]',
											 pagu_anggaran			= '$_POST[g]',
											 tahun					= '$_POST[h]' where id_data_umum='$_GET[id]'");

		echo "<script>window.alert('Sukses Update Data Umum.');
				window.location='data-umum.mu'</script>";
	}
	
	$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_data_umum where id_data_umum='$_GET[id]'"));
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Edit Data Umum</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Laporan Sampai</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[laporan_sampai]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Program</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:60px;" class='required'><?php echo "$dtu[nama_program]"; ?></textarea>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Kegiatan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required'><?php echo "$dtu[nama_kegiatan]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Bidang / Bagian / Seksi</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' value='<?php echo "$dtu[bidang_bagian_seksi]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>KPA</label>
	      <div class='controls'>
	        <select name='e'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_pegawai");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($du)){
					if ($dtu[kpa]==$r[id_pegawai]){
						echo "<option value='$r[id_pegawai]' selected>$r[nama_lengkap]</option> ";
					}else{
						echo "<option value='$r[id_pegawai]'>$r[nama_lengkap]</option> ";
					}
				}
			?>    
			</select>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>PPTK</label>
	      <div class='controls'>
	        <select name='f'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_pegawai");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($du)){
					if ($dtu[pptk]==$r[id_pegawai]){
						echo "<option value='$r[id_pegawai]' selected>$r[nama_lengkap]</option> ";
					}else{
						echo "<option value='$r[id_pegawai]'>$r[nama_lengkap]</option> ";
					}
				}
			?>    
			</select>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Pagu Anggaran (Rp.)</label>
	      <div class='controls'>
	        <input type='text' class='input-large' value='<?php echo "$dtu[pagu_anggaran]"; ?>' name='g' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tahun</label>
	      <div class='controls'>
	        <input type='text' class='input-small' name='h' value='<?php echo "$dtu[tahun]"; ?>' rel='popover'>    
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