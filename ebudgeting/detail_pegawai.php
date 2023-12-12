<?php 
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
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[nip]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='b' value='<?php echo "$dtu[nama_lengkap]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tempat, Tgl Lahir</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='d' value='<?php echo "$dtu[tempat_lahir]"; ?>' rel='popover' disabled> <input type='text' class='input-large' name='c' value='<?php echo "$dtu[tgl_lahir]"; ?>' rel='popover' disabled>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Golongan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='e' value='<?php echo "$dtu[gol]"; ?>' rel='popover' disabled>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jabatan</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='f' value='<?php echo "$dtu[jabatan]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Agama</label>
	      <div class='controls'>
			 <input type='text' class='input-large' name='f' value='<?php echo "$dtu[agama]"; ?>' rel='popover' disabled>  
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telpon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='h' value='<?php echo "$dtu[no_telpon]"; ?>' rel='popover' disabled>    
	      </div>
	</div>

	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="i" name="i" style="width:97%; height:60px;" class='required' disabled><?php echo "$dtu[alamat_lengkap]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="j" name="j" style="width:97%; height:60px;" class='required' disabled><?php echo "$dtu[keterangan]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Upload Ijazah</label>
	      <div class='controls'>
	        <a class='btn btn-success' href='downlot.php?file=<?php echo "$dtu[file_ijazah]"; ?>'>Download Ijazah </a>
	      </div>
	</div>
	  </fieldset>
	</form>

</section>