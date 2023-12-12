<?php 
	if (isset($_POST[simpan])){
		$dir_gambar = 'files/';
			$filename = basename($_FILES['k']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['k']['tmp_name'], $uploadfile)) {
						 mysql_query("INSERT INTO rb_pegawai (nip, nama_lengkap, tempat_lahir, tgl_lahir, gol, jabatan, agama, file_ijazah, no_telpon, alamat_lengkap, keterangan, id_user)	
										VALUES ('$_POST[a]','$_POST[b]','$_POST[d]','$_POST[cc]','$_POST[e]','$_POST[f]','$_POST[g]','$filename','$_POST[h]','$_POST[i]','$_POST[j]','$_SESSION[id_user]')");
						
							echo "<script>window.alert('Sukses Tambahkan Data Pegawai !!!');
										  window.location=('pegawai.mu')</script>";
					}else{
										echo "<script>window.alert('Gagal Tambahkan Data Pegawai.');
												window.location='pegawai.mu'</script>";
					}
				}else{
					 mysql_query("INSERT INTO rb_pegawai (nip, nama_lengkap, tempat_lahir, tgl_lahir, gol, jabatan, agama, no_telpon, alamat_lengkap, keterangan,id_user)	
										VALUES ('$_POST[a]','$_POST[b]','$_POST[d]','$_POST[cc]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_SESSION[id_user]')");
		   
							echo "<script>window.alert('Sukses Tambahkan Data Pegawai !!!');
										  window.location=('pegawai.mu')</script>";
				}
	
	}

?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Tambahkan Data Pegawai</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Nip</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='b' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tempat, Tgl Lahir</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='d' rel='popover'> <input type='text' class='input-large' name='cc' rel='popover'>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Golongan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='e' rel='popover'>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jabatan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='f' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Agama</label>
	      <div class='controls'>
		<select name='g'>
	        <option value='0' rel='popover'> -Pilih- </option>
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
	        <input type='text' class='input-xlarge' name='h' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="i" name="i" style="width:97%; height:60px;" class='required'></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="j" name="j" style="width:97%; height:60px;" class='required'></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Upload Ijazah</label>
	      <div class='controls'>
	        <input style='border:1px solid #cecece; background:#fff' type='file' class='input-large' name='k' rel='popover'>
	      </div>
	</div>
	
	<hr><div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button name='simpan' type='submit' style='width:120px' class='btn btn-success' rel='tooltip' title='first tooltip'>Simpan</button>
		   <a href='home.mu'><button style='width:120px' type='button' class='btn'>Batal</button></a>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>

</section>