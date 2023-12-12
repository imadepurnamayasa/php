<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Laporan Akhir dari Anggaran</a>
				<form action='' class="navbar-form pull-right" method='POST'>
		  <input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  <button type="submit" class="btn btn-success"><i class="icon-search icon-white"></i> Cari Data</button>
		</form>

</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th width='50px'>No.</th>
        <th>Nama Program</th>
		<th>KPA</th>
		<th>PPTK</th>
		<th>Tahun</th>
		<th>Pagu Anggaran</th>
<?php if ($_SESSION[level]=='admin'){ 
	echo "<th>Operator</th>";
}
?>
        <th width='210px'>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php 
$per_page = 10;

if (isset($_POST[cari])){
		if ($_SESSION[level] == 'operator'){
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_data_umum where nama_program LIKE '%$_POST[cari]%' AND id_user='$_SESSION[id_user]'");
		}else{
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_data_umum a JOIN rb_user b ON a.id_user=b.id_user where a.nama_program LIKE '%$_POST[cari]%' OR b.nama_lengkap LIKE '%$_POST[cari]%'");
		}

}else{
		if ($_SESSION[level] == 'operator'){
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_data_umum where id_user='$_SESSION[id_user]'");
		}else{
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_data_umum a JOIN rb_user b ON a.id_user=b.id_user");
		}
}

$pages = ceil(mysql_result($page_query, 0) / $per_page);
$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
$start = ($page - 1) * $per_page;

if (isset($_POST[cari])){
		if ($_SESSION[level] == 'operator'){
			$du = mysql_query("SELECT * FROM rb_data_umum where nama_program LIKE '%$_POST[cari]%' AND id_user='$_SESSION[id_user]'");
		}else{
			$du = mysql_query("SELECT * FROM rb_data_umum a JOIN rb_user b ON a.id_user=b.id_user where a.nama_program LIKE '%$_POST[cari]%' OR b.nama_lengkap LIKE '%$_POST[cari]%'");
		}

}else{
		if ($_SESSION[level] == 'operator'){
			$du = mysql_query("SELECT * FROM rb_data_umum where id_user='$_SESSION[id_user]' ORDER BY id_data_umum DESC LIMIT $start, $per_page");
		}else{
			$du = mysql_query("SELECT * FROM rb_data_umum a JOIN rb_user b ON a.id_user=b.id_user ORDER BY a.id_data_umum DESC LIMIT $start, $per_page");
		}
}
		$no = $start + 1;
		while ($j = mysql_fetch_array($du)){
		$nama_program  = substr($j['nama_program'],0,24);
		$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_pegawai where id_pegawai='$j[kpa]'")); 
		$dtuu = mysql_fetch_array(mysql_query("SELECT * FROM rb_pegawai where id_pegawai='$j[pptk]'")); 
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo "$nama_program,.."; ?></td>
		<td><?php echo $dtu[nama_lengkap]; ?></td>
		<td><?php echo $dtuu[nama_lengkap]; ?></td>
		<td><?php echo $j[tahun]; ?></td>
		<td><?php echo 'Rp '.format_rupiah($j[pagu_anggaran]); ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[nama_lengkap]; ?></td>
<?php } ?>
		<td>
	          <a target='_BLANK' class="btn btn-small small-box" href="print_laporan.php?id=<?php echo $j[id_data_umum]; ?>"><i class="icon-print"></i> Lihat Detail</a>
	          <a class="btn btn-small small-box" href="excel_laporan.php?id=<?php echo $j[id_data_umum]; ?>"><i class="icon-file"></i> Export Excel</a>
		</td>
      </tr>
	<?php
		$no++;
		}
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="laporan-akhir-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="laporan-akhir-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>