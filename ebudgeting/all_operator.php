<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Semua Data Operator</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-all-operator.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Data Operator</a></li>
			</ul>
		  </div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th width='50px'>No.</th>
        <th>Nama Lengkap</th>
		<th>No Telpon</th>
		<th>Alamat Lengkap</th>
		<th>Keterangan</th>
        <th width='100px'>Aksi</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	$per_page = 10;
	$page_query = mysql_query("SELECT COUNT(*) FROM rb_user where level='operator'");
	$pages = ceil(mysql_result($page_query, 0) / $per_page);
	$page = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;
	$start = ($page - 1) * $per_page;
	
		$du = mysql_query("SELECT * FROM rb_user where level='operator' ORDER BY id_user DESC LIMIT $start, $per_page");
		
		$no = $start + 1;
		while ($j = mysql_fetch_array($du)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo $j[nama_lengkap]; ?></td>
		<td><?php echo $j[no_telpon]; ?></td>
		<td><?php echo $j[alamat_lengkap]; ?></td>
		<td><?php echo $j[keterangan]; ?></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-small small-box" href="detail-all-operator-<?php echo "$j[id_user]"; ?>.mu"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="edit-all-operator-<?php echo "$j[id_user]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
					<li><a href="index.php?page=semuaoperator&aksi=hapus&id=<?php echo "$j[id_user]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
				</ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
	<?php
		$no++;
		}
		
		if ($_GET[aksi]=='hapus'){
			mysql_query("DELETE FROM rb_user where id_user='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Data User.');
				window.location='all-operator.mu'</script>";
		}
		
	?>
      
	  
    </tbody>
  </table>
										<?php 
											echo "<div class='pagination'><ul>";
											if($pages >= 1 && $page <= $pages){
												for($x=1; $x<=$pages; $x++){
													echo ($x == $page) ? '
														<li class="active"><a href="all-operator-page-'.$x.'.mu">'.$x.'</a></li> ' : '
														<li><a href="all-operator-page-'.$x.'.mu">'.$x.'</a> </li>';
												}
													echo "</ul></div>"; 
											}
										?>
</section>