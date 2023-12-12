<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("UPDATE rb_sub_jenis_belanja SET id_jenis_belanja = '$_POST[a]', keterangan_sub_jenis = '$_POST[b]' where id_sub_jenis_belanja='$_GET[id]'");

		echo "<script>window.alert('Sukses Update Data Sub Jenis Belanja.');
				window.location='sub-jenis-belanja.mu'</script>";
	}
	
	$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_sub_jenis_belanja where id_sub_jenis_belanja='$_GET[id]'"));
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Edit Data Sub Jenis Belanja</a>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
	<fieldset>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Jenis Belanja</label>
	      <div class='controls'>
	        <select name='a'>
			<?php 
				$du = mysql_query("SELECT * FROM rb_jenis_belanja");
				echo "<option value=''>- Pilih -</option>  ";
				while ($r = mysql_fetch_array($du)){
					if ($dtu[id_jenis_belanja]==$r[id_jenis_belanja]){
						echo "<option value='$r[id_jenis_belanja]' selected>$r[keterangan]</option> ";
					}else{
						echo "<option value='$r[id_jenis_belanja]'>$r[keterangan]</option> ";
					}
				}
			?>    
			</select>     
	      </div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:60px;" class='required'><?php echo "$dtu[keterangan_sub_jenis]"; ?></textarea>   
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