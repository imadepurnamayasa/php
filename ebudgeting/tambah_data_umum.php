<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO rb_data_umum (laporan_sampai, nama_program, nama_kegiatan, bidang_bagian_seksi, kpa, pptk, pagu_anggaran, tahun, waktu, id_user)
					 VALUES ('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$waktu','$_SESSION[id_user]')");

		echo "<script>window.alert('Sukses Menambahkan Data Umum Baru.');
				window.location='data-umum.mu'</script>";
	}
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Tambahkan Data Umum</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Laporan Sampai</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Program</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:60px;" class='required'></textarea>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Kegiatan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required'></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Bidang / Bagian / Seksi</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' rel='popover'>    
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
					echo "<option value='$r[id_pegawai]'>$r[nama_lengkap]</option> ";
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
					echo "<option value='$r[id_pegawai]'>$r[nama_lengkap]</option> ";
				}
			?>    
			</select>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Pagu Anggaran (Rp.)</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='g' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tahun</label>
	      <div class='controls'>
	        <input type='text' class='input-small' name='h' rel='popover'>    
	      </div>
	</div>
	
	<hr><div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button name='simpan' type='submit' style='width:120px' class='btn btn-success' rel='tooltip' title='first tooltip'>Submit</button>
		   <a href='home.mu'><button style='width:120px' type='button' class='btn'>Batal</button></a>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>

</section>