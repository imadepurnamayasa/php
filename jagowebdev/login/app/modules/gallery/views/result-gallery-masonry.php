<div class="page-header">
	<div class="wrapper">
		<h1 class="page-title">Gallery</h1>
		<p class="page-desc">Koleksi berbagai foto foto indah dan menakjubkan</p>
	</div>
</div>
<?php
	if (!empty($status)) {
		$class = $status == 'error' ? 'bg-danger' : 'bg-success';?>
		<div class="<?=$class?>">
		<div class="wrapper"><?=$message?></div>
		</div>
	<?php }
	
	$show_title = $kategori['show_title'] == 'N' ? ' class="notitle"' : '';
?>
<div class="wrapper page-body">
	<div class="post-content">
		<h2>Kategori <?=$kategori['judul_kategori']?></h2>
		<p><?=$kategori['deskripsi']?></p>
		<p>Layout untuk kategori ini adalah Masonry. Pada layout ini thumbnail image ditampilkan sesuai dengan rasio panjang dan lebarnya kemudian disusun sesuai dengan ruang kosong yang ada pada bidang. Selain itu teknik loading imagenya dalah lazy load, dimana image diload sampai selesai, baru kemudian ditambahkan ke dalam bidang.</p>
		<?php
		if (!$gallery)
		{
			echo '<div class="alert alert-danger">Tidak ada foto pada kategori ini</div>';
		} else { ?>
			<div id="result"<?=$show_title?>>
				<!-- Foto -->
			</div>
		<?php
		}
		?>
		<a href="<?=$config['base_url']?>gallery/" class="mt-3 btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Kategori</a>
	</div>
	<span id="list-gallery" style="display:none"><?=json_encode($gallery)?></span>
</div>