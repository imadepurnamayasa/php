<?php 
	if (isset($_POST[simpan])){
		$waktu = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO rb_sub_jenis_belanja (id_jenis_belanja, keterangan_sub_jenis, id_user) VALUES ('$_POST[a]','$_POST[b]','$_SESSION[id_user]')");

		echo "<script>window.alert('Sukses Menambahkan Data Sub Jenis Belanja.');
				window.location='sub-jenis-belanja.mu'</script>";
	}
	
?>

<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Tambahkan Data Sub Jenis Belanja</a>
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
						echo "<option value='$r[id_jenis_belanja]'>$r[keterangan]</option> ";
				}
			?>    
			</select>     
	      </div>
	</div>
	<div class='control-group'>
		<label class='control-label' for='input01'>Keterangan</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:60px;" class='required'></textarea>   
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