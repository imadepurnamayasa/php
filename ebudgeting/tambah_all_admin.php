<?php 
	if (isset($_POST[simpan])){
		$userr = trim($_POST[a]);
		$passs = trim($_POST[b]);
		$passd = md5($passs);
			mysql_query("INSERT INTO rb_user (username,password,nama_lengkap,no_telpon,alamat_lengkap,keterangan,level) 
							VALUES ('$userr','$passd','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','admin')");
		
		echo "<script>window.alert('Sukses Tambahkan Data Admin.');
				window.location='all-admin.mu'</script>";
	}
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Tambahkan Data Admin</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Username</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Password</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='b' rel='popover'>   
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='c' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telpon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="c" name="e" style="width:97%; height:60px;" class='required'></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="f" style="width:97%; height:60px;" class='required'></textarea>     
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
