<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		$passs = trim($_POST[b]);
		if ($passs == ''){
			mysql_query("UPDATE rb_user SET  username 				= '$_POST[a]',
											 nama_lengkap			= '$_POST[c]',
											 no_telpon				= '$_POST[d]',
											 alamat_lengkap			= '$_POST[e]',
											 keterangan				= '$_POST[f]' where id_user='$_GET[id]'");
		}else{
			$passd = md5($passs);
			mysql_query("UPDATE rb_user SET  username 				= '$_POST[a]',
											 password				= '$passd',
											 nama_lengkap			= '$_POST[c]',
											 no_telpon				= '$_POST[d]',
											 alamat_lengkap			= '$_POST[e]',
											 keterangan				= '$_POST[f]' where id_user='$_GET[id]'");
		}
		
	if ($_SESSION[level] == 'operator'){
		echo "<script>window.alert('Sukses Update Data Anda.');
				window.location='edit-all-operator-".$_GET[id].".mu'</script>";
	}else{
		echo "<script>window.alert('Sukses Update Data Operator.');
				window.location='all-operator.mu'</script>";
	}
	
	}
	if ($_SESSION[level] == 'operator'){
		$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_user where id_user='$_SESSION[id_user]'"));
	}else{
		$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_user where id_user='$_GET[id]'"));
	}
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Edit Data Operator</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Username</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[username]"; ?>' rel='popover'>    
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
	        <input type='text' class='input-xlarge' name='c' value='<?php echo "$dtu[nama_lengkap]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telpon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' value='<?php echo "$dtu[no_telpon]"; ?>' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="c" name="e" style="width:97%; height:60px;" class='required'><?php echo "$dtu[alamat_lengkap]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="f" style="width:97%; height:60px;" class='required'><?php echo "$dtu[keterangan]"; ?></textarea>     
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