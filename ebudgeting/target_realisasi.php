<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Master Target dan Realisasi</a>
	
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th width='50px'>No.</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$jtr = mysql_query("SELECT * FROM rb_jenis_target_realisasi");
		$no = 1;
		while ($j = mysql_fetch_array($jtr)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo $j[keterangan_target_realisasi]; ?></td>
      </tr>
	<?php
		$no++;
		}
	?>
      
	  
    </tbody>
  </table>
</section>