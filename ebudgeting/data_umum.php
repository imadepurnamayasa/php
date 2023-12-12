<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Data Umum</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-data-umum.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Data Umum</a></li>
			</ul>
		  </div>

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
		<th>Pagu Anggaran</th>
<?php if ($_SESSION[level]=='admin'){ 
	echo "<th>Operator</th>";
}
?>
        <th width='100px'>Aksi</th>
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
        <td><?php echo "$nama_program,..."; ?></td>
		<td><?php echo $dtu[nama_lengkap]; ?></td>
		<td><?php echo $dtuu[nama_lengkap]; ?></td>
		<td><?php echo 'Rp '.format_rupiah($j[pagu_anggaran]); ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[nama_lengkap]; ?></td>
<?php } ?>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-small small-box" href="detail-data-umum-<?php echo "$j[id_data_umum]"; ?>.mu"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="edit-data-umum-<?php echo "$j[id_data_umum]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
					<li><a href="index.php?page=dataumum&aksi=hapus&id=<?php echo "$j[id_data_umum]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
				</ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	<?php
		$no++;
		}
		
		if ($_GET[aksi]=='hapus'){
			mysql_query("DELETE FROM rb_data_umum where id_data_umum='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Data Umum.');
				window.location='data-umum.mu'</script>";
		}
		
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="data-umum-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="data-umum-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>