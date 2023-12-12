<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Detail Data Umum</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="data-umum.mu" class="small-box"><i class="icon-refresh icon-white"></i> Kembali</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<?php $dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_data_umum a JOIN rb_pegawai b ON a.kpa=b.id_pegawai where a.id_data_umum='$_GET[id]'")); ?>
	<?php $dtuu = mysql_fetch_array(mysql_query("SELECT * FROM rb_data_umum a JOIN rb_pegawai b ON a.pptk=b.id_pegawai where a.id_data_umum='$_GET[id]'")); ?>
<section>
<form class='form-horizontal' action='' method='POST' onSubmit='return valid()' method='POST' id='registerHere' enctype='multipart/form-data'>
<fieldset>
	<div class='control-group'>
		<label class='control-label' for='input01'>Laporan Sampai</label>
	      <div class='controls'>
	        <input type='text' class='input-large' name='a' value='<?php echo "$dtu[laporan_sampai]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Program</label>
	      <div class='controls'>
	        <textarea data-field="b" name="b" style="width:97%; height:60px;" class='required' disabled><?php echo "$dtu[nama_program]"; ?></textarea>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Nama Kegiatan</label>
	      <div class='controls'>
	        <textarea data-field="c" name="c" style="width:97%; height:60px;" class='required' disabled><?php echo "$dtu[nama_kegiatan]"; ?></textarea>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Bidang / Bagian / Seksi</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='d' value='<?php echo "$dtu[bidang_bagian_seksi]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>KPA</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' value='<?php echo "$dtu[nama_lengkap]"; ?>' name='e' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>PPTK</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' value='<?php echo "$dtuu[nama_lengkap]"; ?>' name='f' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Pagu Anggaran (Rp.)</label>
	      <div class='controls'>
	        <input type='text' class='input-large' value='<?php echo "$dtu[pagu_anggaran]"; ?>' name='g' rel='popover' disabled>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Tahun</label>
	      <div class='controls'>
	        <input type='text' class='input-small' name='h' value='<?php echo "$dtu[tahun]"; ?>' rel='popover' disabled>    
	      </div>
	</div>
	</fieldset>
	</form>
</section>