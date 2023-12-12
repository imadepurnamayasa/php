<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Semua Data Pegawai</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-pegawai.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Data Pegawai</a>
				</li>
			</ul>
		  </div>

		<form action='' class="navbar-form pull-right" method='POST'>
		  <input type="text" class="span3" name="cari" placeholder="Masukkan kata kunci pencarian">
		  <button type="submit" class="btn btn-success"><i class="icon-search icon-white"></i> Cari Data</button> 
<a class="btn btn-success" href="excel_pegawai.php"><i class="icon-file icon-white"></i> Export Excel</a>
		</form>

		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th width='50px'>No.</th>
		<th>Nip</th>
        <th>Nama Lengkap</th>
		<th>Golongan</th>
		<th>Jabatan</th>
		<th>Agama</th>
		<th>No Telpon</th>
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
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user 
					where (a.nama_lengkap LIKE '%$_POST[cari]%' OR a.nip LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user where a.nama_lengkap LIKE '%$_POST[cari]%' OR a.nip LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user 
					where a.id_user='$_SESSION[id_user]'");
	}else{
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user");
	}
}

$pages = ceil(mysql_result($page_query, 0) / $per_page);
$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
$start = ($page - 1) * $per_page;

if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
			$du = mysql_query("SELECT a.*, b.nama_lengkap as namaa FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user 
					where (a.nama_lengkap LIKE '%$_POST[cari]%' OR a.nip LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
			$du = mysql_query("SELECT a.*, b.nama_lengkap as namaa FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user where a.nama_lengkap LIKE '%$_POST[cari]%' OR a.nip LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
			$du = mysql_query("SELECT a.*, b.nama_lengkap as namaa FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user 
					where a.id_user='$_SESSION[id_user]' ORDER BY a.id_pegawai DESC LIMIT $start, $per_page");
	}else{
			$du = mysql_query("SELECT a.*, b.nama_lengkap as namaa FROM rb_pegawai a JOIN rb_user b ON a.id_user=b.id_user ORDER BY a.id_pegawai DESC LIMIT $start, $per_page");
	}
}



		$no = $start + 1;
		while ($j = mysql_fetch_array($du)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
		<td><?php echo $j[nip]; ?></td>
        <td><?php echo $j[nama_lengkap]; ?></td>
		<td><?php echo $j[gol]; ?></td>
		<td><?php echo $j[jabatan]; ?></td>
		<td><?php echo $j[agama]; ?></td>
		<td><?php echo $j[no_telpon]; ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[namaa]; ?></td>
<?php } ?>
		<td>
	        <div class="btn-group"> 
	          <a class="btn btn-small small-box" href="detail-pegawai-<?php echo "$j[id_pegawai]"; ?>.mu"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="edit-pegawai-<?php echo "$j[id_pegawai]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
					<li><a href="index.php?page=pegawai&aksi=hapus&id=<?php echo "$j[id_pegawai]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
				</ul> 

	        </div><!-- /btn-group -->
	          
		</td>
      </tr>
	<?php
		$no++;
		}
		
		if ($_GET[aksi]=='hapus'){
			mysql_query("DELETE FROM rb_pegawai where id_pegawai='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Data pegawai.');
				window.location='pegawai.mu'</script>";
		}
		
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="pegawai-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="pegawai-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>