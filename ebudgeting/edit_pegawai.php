<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		$dir_gambar = 'files/';
			$filename = basename($_FILES['k']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['k']['tmp_name'], $uploadfile)) {
						 mysql_query("UPDATE rb_pegawai SET  nip 					= '$_POST[a]',
															 nama_lengkap			= '$_POST[b]',
															 tempat_lahir			= '$_POST[c]',
															 tgl_lahir				= '$_POST[cc]',
															 gol					= '$_POST[e]',
															 jabatan				= '$_POST[f]',
															 agama					= '$_POST[g]',
															 file_ijazah			= '$filename',
															 no_telpon				= '$_POST[h]',
															 alamat_lengkap			= '$_POST[i]',
															 keterangan				= '$_POST[j]' where id_pegawai='$_GET[id]'");
						
							echo "<script>window.alert('Sukses Update Data Pegawai !!!');
										  window.location=('pegawai.mu')</script>";
					}else{
										echo "<script>window.alert('Gagal Update Data Pegawai.');
												window.location='pegawai.mu'</script>";
					}
				}else{
						 mysql_query("UPDATE rb_pegawai SET  nip 					= '$_POST[a]',
															 nama_lengkap			= '$_POST[b]',
															 tempat_lahir			= '$_POST[c]',
															 tgl_lahir				= '$_POST[cc]',
															 gol					= '$_POST[e]',
															 jabatan				= '$_POST[f]',
															 agama					= '$_POST[g]',
															 no_telpon				= '$_POST[h]',
															 alamat_lengkap			= '$_POST[i]',
															 keterangan				= '$_POST[j]' where id_pegawai='$_GET[id]'");
													   
							echo "<script>window.alert('Sukses Update Data Pegawai !!!');
										  window.location=('pegawai.mu')</script>";
				}
	
	}

		$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_pegawai where id_pegawai='$_GET[id]'"));

?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Edit Data Pegawai</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Nip</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[nip]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='b' value='<?php echo "$dtu[nama_lengkap]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tempat, Tgl Lahir</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='c' value='<?php echo "$dtu[tempat_lahir]"; ?>' rel='popover'> <input type='text' class='input-large' name='cc' value='<?php echo "$dtu[tgl_lahir]"; ?>' rel='popover'>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Golongan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='e' value='<?php echo "$dtu[gol]"; ?>' rel='popover'>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jabatan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='f' value='<?php echo "$dtu[jabatan]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Agama</label>
	      <div class='controls'>
		<select name='g'>
	        <option value='<?php echo "$dtu[agama]"; ?>' rel='popover'> <?php echo "$dtu[agama]"; ?> </option>
			<option value='Islam' rel='popover'> Islam </option>
			<option value='Katolik' rel='popover'> Katolik </option>
			<option value='Protestan' rel='popover'> Protestan </option>
			<option value='Hindu' rel='popover'> Hindu </option>
			<option value='Budha' rel='popover'> Budha </option>
			<option value='dll' rel='popover'> Dll </option>
		</select>
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telpon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='h' value='<?php echo "$dtu[no_telpon]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="i" name="i" style="width:97%; height:60px;" class='required'><?php echo "$dtu[alamat_lengkap]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="j" name="j" style="width:97%; height:60px;" class='required'><?php echo "$dtu[keterangan]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Upload Ijazah</label>
	      <div class='controls'>
	        <input style='border:1px solid #cecece; background:#fff' type='file' class='input-large' name='k' rel='popover'> -> <a href='downlot.php?file=<?php echo "$dtu[file_ijazah]"; ?>'>Download Ijazah </a>
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