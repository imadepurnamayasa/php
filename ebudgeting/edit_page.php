<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("UPDATE rb_page SET judul = '$_POST[a]', isi = '$_POST[b]' where id_page='$_GET[id]'");
		
		if ($_GET[id] == '1'){
			$halaman = 'admin-guide.mu';
			$info = 'Administrator';
		}else{
			$halaman = 'operator-guide.mu';
			$info = 'Operator';
		}
		
		echo "<script>window.alert('Sukses Update Data User Guide ".$info.".');
				window.location='".$halaman."'</script>";
	}
	
	$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_page where id_page='$_GET[id]'"));
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Edit Data Halaman - User Guide</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Judul</label>
	      <div class='controls'>
	        <input style='width:80%' type='text' class='input-xlarge' value='<?php echo "$dtu[judul]"; ?>' name='a' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Isi Informasi</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:280px;" class='required'><?php echo "$dtu[isi]"; ?></textarea>   
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