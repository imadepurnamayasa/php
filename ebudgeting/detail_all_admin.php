<?php 
	$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_user where id_user='$_GET[id]'"));
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Detail Data Admin</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="all-admin.mu" class="small-box"><i class="icon-refresh icon-white"></i> Kembali</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Username</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[username]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Password</label>
	      <div class='controls'>
	        <input type='password' class='input-large' name='b' value='password...' rel='popover' disabled>   
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='c' value='<?php echo "$dtu[nama_lengkap]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telpon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' value='<?php echo "$dtu[no_telpon]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea data-field="c" name="e" style="width:97%; height:60px;" class='required'disabled><?php echo "$dtu[alamat_lengkap]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="f" style="width:97%; height:60px;" class='required'disabled><?php echo "$dtu[keterangan]"; ?></textarea>     
	      </div>
	</div>

	  </fieldset>
	</form>

</section>
