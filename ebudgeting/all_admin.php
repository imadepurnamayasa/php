<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Semua Data Admin</a>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-all-admin.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Data Admin</a></li>
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
		$du = mysql_query("SELECT * FROM rb_user where level='admin'");
		$no = 1;
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
	          <a class="btn btn-small small-box" href="detail-all-admin-<?php echo "$j[id_user]"; ?>.mu"><i class="icon-ok-circle"></i> Lihat Detail</a>
	          <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="edit-all-admin-<?php echo "$j[id_user]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a></li>
					<li><a href="index.php?page=semuaadmin&aksi=hapus&id=<?php echo "$j[id_user]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a></li>
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
				window.location='all-admin.mu'</script>";
		}
		
	?>
      
	  
    </tbody>
  </table>

</section>