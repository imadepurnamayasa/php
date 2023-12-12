<div class="page-header">
	<div class="wrapper">
		<h1 class="page-title">Gallery</h1>
		<p class="page-desc">Koleksi foto dari waktu ke waktu</p>
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
		<h2>Kategori <?=$kategori['judul_kategori']?></h2>
		<p><?=$kategori['deskripsi']?></p>
		<p>Layout dari ketegori ini adalah grid. Pada layout ini, thumbnail ditampilkan dalam container persegi, sehingga jika lebar thumbnail melebihi lebar container maka thumbnail akan diposisikan di tengah tengah, bagian kiri dan kanan dari thumbnail yang melebihi container akan disembunyikan. 
		<div class="list-thumbnail-container spotlight-group" data-fit="cover" data-autohide="all">
			<?php
			// echo '<pre>'; print_r($gallery); die;
			foreach ($gallery as $val) 
			{
				?>
				<div class="thumbnail-container">
					<div class="img-cover">
						<a class="spotlight text-white" href="<?=$val['image_url']?>" data-description="<?=$val['description']?>" data-fit="contain">
							<img alt="<?=$val['title']?>" <?=$val['thumbnail_class']?> src="<?=$val['thumbnail']['url']?>"/>
						</a>
					</div>
				</div>
			<?php
			}?>
		</div>
		<a href="<?=$config['base_url']?>gallery/" class="mt-3 btn btn-success"><i class="fas fa-arrow-left"></i>&nbsp;Kategori</a>
	</div>
</div>