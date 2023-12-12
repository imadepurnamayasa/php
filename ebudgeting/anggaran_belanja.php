<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Anggaran Belanja</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-anggaran-belanja.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Anggaran Belanja</a></li>
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
        <th width='30px'>No.</th>
        <th>Data</th>
		<th>Sub Jenis Belanja</th>
		<th>Keterangan Anggaran</th>
		<th>Total Anggaran</th>
<th>Status</th>
<?php if ($_SESSION[level]=='admin'){ 
	echo "
	          <th>Operator</th>";
}
?>
        <th width='100px'><center>Aksi</center></th>
      </tr>
    </thead>
    <tbody>
	<?php 
		$per_page = 10;
if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
		$page_query = mysql_query("SELECT COUNT(*) FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										where (a.tahun LIKE '%$_POST[cari]%' OR a.keterangan_anggaran LIKE '%$_POST[cari]%' OR c.keterangan_sub_jenis LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
		$page_query = mysql_query("SELECT COUNT(*) FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										JOIN rb_user e ON a.id_user=e.id_user 
											where a.keterangan_anggaran LIKE '%$_POST[cari]%' 
												OR c.keterangan_sub_jenis LIKE '%$_POST[cari]%'
												OR e.nama_lengkap LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
		$page_query = mysql_query("SELECT COUNT(*) FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										where a.id_user='$_SESSION[id_user]'");
	}else{
		$page_query = mysql_query("SELECT COUNT(*) FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										JOIN rb_user e ON a.id_user=e.id_user");
	}
}

		$pages = ceil(mysql_result($page_query, 0) / $per_page);
		$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
		$start = ($page - 1) * $per_page;
	
if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
		$ab = mysql_query("SELECT * FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										where (a.tahun LIKE '%$_POST[cari]%' OR a.keterangan_anggaran LIKE '%$_POST[cari]%' OR c.keterangan_sub_jenis LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
		$ab = mysql_query("SELECT * FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										JOIN rb_user e ON a.id_user=e.id_user 
											where a.keterangan_anggaran LIKE '%$_POST[cari]%' 
												OR c.keterangan_sub_jenis LIKE '%$_POST[cari]%'
												OR e.nama_lengkap LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
		$ab = mysql_query("SELECT * FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										where a.id_user='$_SESSION[id_user]' ORDER BY a.id_anggaran_belanja DESC LIMIT $start, $per_page");
	}else{
		$ab = mysql_query("SELECT * FROM rb_anggaran_belanja a JOIN rb_data_umum b ON a.id_data_umum=b.id_data_umum
								JOIN rb_sub_jenis_belanja c ON a.id_sub_jenis_belanja=c.id_sub_jenis_belanja
									JOIN rb_jenis_belanja d ON c.id_jenis_belanja=d.id_jenis_belanja 
										JOIN rb_user e ON a.id_user=e.id_user ORDER BY a.id_anggaran_belanja DESC LIMIT $start, $per_page");
	}
}
		
		$no = $start + 1;
		while ($j = mysql_fetch_array($ab)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
		if ($j[stat]=='Y'){ $stat = '<i style="color:green">Aktif</i>'; }else{ $stat = '<i style="color:red">Nonaktif</i>'; }
		$keterangan_sub_jenis  = substr($j['keterangan_sub_jenis'],0,30);
		$keterangan_anggaran  = substr($j['keterangan_anggaran'],0,30);
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo $j[tahun]; ?></td>
		<td><?php echo $keterangan_sub_jenis .'..'; ?></td>
		<td><?php echo $keterangan_anggaran .'..'; ?></td>
		<td><?php echo 'Rp '.format_rupiah($j[total_rp]); ?></td>
        <td><?php echo $stat; ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[nama_lengkap]; ?></td>
<?php } ?>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-small small-box" href="detail-anggaran-belanja-<?php echo "$j[id_anggaran_belanja]"; ?>.mu"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
<?php if ($_SESSION[level]=='admin'){ 
if ($j[stat] == 'N'){		
?>			
<li><a href="index.php?page=anggaranbelanja&aksi=aktif&id=<?php echo "$j[id_anggaran_belanja]"; ?>" class="small-box"><i class="icon-refresh"></i> Aktifkan Data</a></li>

<?php }else{ ?>
<li><a href="index.php?page=anggaranbelanja&aksi=aktif&id=<?php echo "$j[id_anggaran_belanja]"; ?>" class="small-box"><i class="icon-refresh"></i> Nonaktifkan Data</a></li>
<?php }
 } ?>
<li><a href="edit-anggaran-belanja-<?php echo "$j[id_anggaran_belanja]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
					<li><a href="index.php?page=anggaranbelanja&aksi=hapus&id=<?php echo "$j[id_anggaran_belanja]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
				</ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	<?php
		$no++;
		}

		if ($_GET[aksi]=='aktif'){
			$c = mysql_fetch_array(mysql_query("SELECT * FROM rb_anggaran_belanja  where id_anggaran_belanja='$_GET[id]'"));
			if ($c[stat] == 'Y'){
				$ubah = 'N';
				$pesan = 'Non Aktifkan';
			}else{
				$ubah = 'Y';
				$pesan = 'Aktifkan';
			}
			mysql_query("UPDATE rb_anggaran_belanja  SET stat='$ubah' where id_anggaran_belanja='$_GET[id]'");
		echo "<script>window.alert('Sukses ".$pesan." Data Anggaran.');
				window.location='anggaran-belanja.mu'</script>";
		}
		if ($_GET[aksi]=='hapus'){
			mysql_query("DELETE FROM rb_anggaran_belanja where id_anggaran_belanja='$_GET[id]'");
			mysql_query("DELETE FROM rb_detail_target where id_anggaran_belanja='$_GET[id]'");
			mysql_query("DELETE FROM rb_detail_realisasi where id_anggaran_belanja='$_GET[id]'");
			
			echo "<script>window.alert('Sukses Hapus Data Anggaran.');
				window.location='anggaran-belanja.mu'</script>";
		}
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="anggaran-belanja-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="anggaran-belanja-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>