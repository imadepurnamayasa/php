<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Master Jenis Belanja</a>
<?php if ($_SESSION[level]=='admin'){ ?> 
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="tambah-jenis-belanja.mu" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Jenis Belanja</a></li>
			</ul>
		  </div>
<?php } ?> 
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
        <th>Keterangan</th>
<?php if ($_SESSION[level]=='admin'){ 
	echo "<th>Operator</th>
        <th width='250px'>Aksi</th>";
} ?>
      </tr>
    </thead>
    <tbody>
	<?php 
if (isset($_POST[cari])){
	if ($_SESSION[level] == 'operator'){
			$jb = mysql_query("SELECT * FROM rb_jenis_belanja where keterangan LIKE '%$_POST[cari]%' AND id_user='$_SESSION[id_user]'");
	}else{
			$jb = mysql_query("SELECT a.*, b.nama_lengkap FROM rb_jenis_belanja a JOIN rb_user b ON a.id_user=b.id_user where a.keterangan LIKE '%$_POST[cari]%' OR b.nama_lengkap LIKE '%$_POST[cari]%'");
	}
}else{
			$jb = mysql_query("SELECT a.*, b.nama_lengkap FROM rb_jenis_belanja a JOIN rb_user b ON a.id_user=b.id_user");
	
}

		$no = 1;
		while ($j = mysql_fetch_array($jb)){
		if(($no % 2)==0){ $warna="#f4f4f4"; }else{ $warna="#ffffff"; }
	?>
	<tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $no; ?></td>
        <td><?php echo $j[keterangan]; ?></td>
<?php if ($_SESSION[level]=='admin'){ ?>
        <td><?php echo $j[nama_lengkap]; ?></td>
		<td>

	        <a class='btn' href="edit-jenis-belanja-<?php echo "$j[id_jenis_belanja]"; ?>.mu" class="small-box"><i class="icon-pencil"></i> Edit Data</a> 
		<a  class='btn btn-danger' href="index.php?page=jenisbelanja&aksi=hapus&id=<?php echo "$j[id_jenis_belanja]"; ?>" onClick="return confirm('Anda yakin..???');"><i class="icon-trash"></i> Hapus Data</a>
		</td>
<?php } ?>
      </tr>
	<?php
		$no++;
		}
		
		if ($_GET[aksi] == 'hapus'){
			mysql_query("DELETE FROM rb_jenis_belanja where id_jenis_belanja='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Data Jenis Belanja.');
				window.location='jenis-belanja.mu'</script>";
		}
	?>
      
	  
    </tbody>
  </table>

</section>