<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Master Sub Jenis Belanja</a>
		  
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-sub-jenis-belanja.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Sub Jenis Belanja</a></li>
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
		<th>Jenis Belanja</th>
        <th>Sub Jenis Belanja</th>
<?php if ($_SESSION[level]=='admin'){ 
	echo "<th>Operator</th>";
}
?>
        <th width='250px'>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php 
$per_page = 10;

if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
			$page_query = mysql_query("SELECT a.*, b.* FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	where (b.keterangan LIKE '%$_POST[cari]%' OR a.keterangan_sub_jenis LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
			$page_query = mysql_query("SELECT a.*, b.*, c.nama_lengkap as nama FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	JOIN rb_user c ON a.id_user=b.id_user where b.keterangan LIKE '%$_POST[cari]%' OR a.keterangan_sub_jenis LIKE '%$_POST[cari]%' OR c.nama_lengkap LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	where a.id_user='$_SESSION[id_user]'");
	}else{
			$page_query = mysql_query("SELECT COUNT(*) FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	JOIN rb_user c ON a.id_user=c.id_user");
	}
}

$pages = ceil(mysql_result($page_query, 0) / $per_page);
$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
$start = ($page - 1) * $per_page;


if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
			$jb = mysql_query("SELECT a.*, b.* FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	where (b.keterangan LIKE '%$_POST[cari]%' OR a.keterangan_sub_jenis LIKE '%$_POST[cari]%') AND a.id_user='$_SESSION[id_user]'");
	}else{
			$jb = mysql_query("SELECT a.*, b.*, c.nama_lengkap FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	JOIN rb_user c ON a.id_user=b.id_user where b.keterangan LIKE '%$_POST[cari]%' OR a.keterangan_sub_jenis LIKE '%$_POST[cari]%' OR c.nama_lengkap LIKE '%$_POST[cari]%'");
	}
}else{
	if ($_SESSION[level] == 'operator'){
			$jb = mysql_query("SELECT a.*, b.* FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	where a.id_user='$_SESSION[id_user]' ORDER BY a.id_sub_jenis_belanja DESC LIMIT $start, $per_page");
	}else{
			$jb = mysql_query("SELECT a.*, b.*, c.nama_lengkap as nama FROM rb_sub_jenis_belanja a 
	JOIN rb_jenis_belanja b ON a.id_jenis_belanja=b.id_jenis_belanja 
	JOIN rb_user c ON a.id_user=c.id_user ORDER BY a.id_sub_jenis_belanja DESC LIMIT $start, $per_page");
	}
}
		$no = $start + 1;
		while ($j = mysql_fetch_array($jb)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
		<td><?php echo $j[keterangan]; ?></td>
        <td><?php echo $j[keterangan_sub_jenis]; ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[nama]; ?></td>
<?php } ?>
		<td>
	        <a   class='btn' href="edit-sub-jenis-belanja-<?php echo "$j[id_sub_jenis_belanja]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a> <a class='btn btn-danger' href="index.php?page=subjenisbelanja&aksi=hapus&id=<?php echo "$j[id_sub_jenis_belanja]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a>

		</td>
      </tr>
	<?php
		$no++;
		}
		
		if ($_GET[aksi] == 'hapus'){
			mysql_query("DELETE FROM rb_sub_jenis_belanja where id_sub_jenis_belanja='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Data Sub Jenis Belanja.');
				window.location='sub-jenis-belanja.mu'</script>";
		}
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="sub-jenis-belanja-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="sub-jenis-belanja-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>