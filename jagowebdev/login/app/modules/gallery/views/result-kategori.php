<div class="page-header">
	<div class="wrapper">
		<h1 class="page-title">Gallery</h1>
		<p class="page-desc">Koleksi foto yang indah dan menakjubkan</p>
	</div>
</div>
<?php
	if (!empty($status)) {
		$class = $status == 'error' ? 'bg-danger' : 'bg-success';?>
		<div class="<?=$class?>">
		<div class="wrapper"><?=$message?></div>
		</div>
	<?php }
?>
<div class="wrapper page-body">
	<div class="post-content">
		<h3>Kategori Gallery</h3>
		<p>Berikut ini beberapa kategori gallery yang tersedia. Pilih salah satu kategori gallery berikut untuk melihat gambar apa saja yang ada di kategori tersebut. Masing masing kategori memiliki layout yang berbeda, bisa grid, bisa masonry. Untuk langsung berpindah antar kategori, bisa melalui menu Gallery yang ada pada header atau melalui menu di sidebar sebelah kiri pada layout mobile</p>
		<div class="list-thumbnail-container">
			<?php
			// echo '<pre>'; print_r($gallery);
			foreach ($kategori as $val) 
			{
				?>
				<div class="thumbnail-container">
					<?php
					// Image Kategori
					$image_url = $config['base_url'] . 'public/images/folder.png';
					$img_class = ' img-empty';
					if (key_exists($val['id_gallery_kategori'], $gallery)) {
						$filename = $gallery[$val['id_gallery_kategori']][0]['nama_file'];
						if ($filename) {
							$img_class = '';
							$image_url = $config['filepicker_upload_url'] . $filename;
						}
					}
					?>
					<div class="img-cover">
						<a class="text-white" href="<?=$config['base_url'] . 'gallery/kategori/' . $val['slug']?>">
							<img class="<?=$img_class?>" src="<?=$image_url?>"/>
							<span class="jml-img"><i class="fas fa-images"></i>&nbsp;&nbsp;<?=$val['jml_gambar']?></span>
						</a>
					</div>
				</div>
			<?php
			}?>
		</div>
	</div>
</div>