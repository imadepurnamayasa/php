<?php
/**
* PHP Gallery Manager
* Author	: Agus Prawoto Hadi
* Website	: https://jagowebdev.com
* Year		: 2021
*/

// $js[] = $config['base_url'] . '/public/themes/modern/js/gallery.js';
$js[] = $config['base_url'] . '/public/vendors/spotlight/dist/spotlight.bundle.js';
$js_footer[] = $config['base_url'] . '/public/vendors/masonry/dist/masonry.pkgd.min.js';
$js_footer[] = $config['base_url'] . '/public/themes/modern/js/gallery.js';
$styles[] = $config['base_url'] . 'public/themes/modern/css/gallery.css';
$styles[] = $config['base_url'] . 'public/vendors/spotlight/dist/css/spotlight.min.css';

switch ($_GET['action']) 
{
    default: 
        action_notfound();
    
    	// INDEX 
    case 'index':
	
		$message = [];
				
		// Katogori
		$sql = 'SELECT *, 
					(SELECT COUNT(id_gallery_kategori) FROM gallery 
						WHERE id_gallery_kategori = gk.id_gallery_kategori
					) 
					AS jml_gambar 
			FROM gallery_kategori AS gk 
			WHERE aktif = ? ORDER BY urut';
			
		$data['kategori'] = $db->query($sql, 'Y')->getResultArray();
		
		$sql = 'SELECT * FROM gallery_kategori 
					LEFT JOIN gallery USING (id_gallery_kategori) 
					LEFT JOIN file_picker ON (gallery.id_file_picker = file_picker.id_file_picker)
					WHERE gallery_kategori.aktif = "Y"
					ORDER BY id_gallery_kategori, gallery.urut';
		$query = $db->query($sql)->getResultArray();
		foreach ($query as $val) {
			$gallery[$val['id_gallery_kategori']][] = $val;
		}

        $data['title'] = 'Gallery';
        $data['message'] = $message;
        $data['gallery'] = $gallery;

        load_view('views/result-kategori.php', $data);
	
	case 'kategori':
		
		$message = [];
		$segments = get_segments();
		$slug_kategori = @$segments[2];
		
		if (empty($slug_kategori)) {
			data_notfound($data);
		}
		
		// Kategori
		$sql = 'SELECT * FROM gallery_kategori WHERE slug = ?';
		$kategori = $db->query($sql, $slug_kategori)->getRowArray();
		
		if (empty($kategori)) {
			data_notfound();
		}
		
		$id_kategori = $kategori['id_gallery_kategori'];
		
		// List Kategori
		$sql = 'SELECT * FROM gallery_kategori';
		$result = $db->query($sql)->getResultArray();
		$list_kategori[''] = 'Semua kategori';
		foreach ($result as $val) {
			$list_kategori[$val['id_gallery_kategori']] = $val['judul_kategori'];
		}
		
		
        // Gallery
		$sql = 'SELECT * FROM gallery 
				LEFT JOIN file_picker USING(id_file_picker)
				WHERE id_gallery_kategori = ' . $id_kategori
				. ' ORDER BY urut';
				
		$gallery = $db->query($sql)->getResultArray();
		foreach ($gallery as &$val) 
		{
			$meta_file = json_decode($val['meta_file'], true);		
			
			// Image
			$image_url = 'javascript:void(0)';
			$filename = $val['nama_file'];
			
			$image_exists = false;
			if (file_exists($config['filepicker_upload_path'] . $filename)) {
				$image_exists = true;
			}
			
			if ($image_exists) {
				$image_url = $config['filepicker_upload_url'] . $filename;
			}
			
			// Thumbnail
			if (key_exists('thumbnail', $meta_file)) {
				$thumbnail_file = $meta_file['thumbnail']['small']['filename'];
			} else {
				$thumbnail_file = $val['nama_file'];
			}
			$thumbnail_class = ' img-empty';
			if (file_exists($config['filepicker_upload_path'] . $thumbnail_file)) {
				$thumbnail_url = $config['filepicker_upload_url'] . $thumbnail_file;
			} else {
				$thumbnail_class = '';
				$thumbnail_url = $config['base_url'] . 'public/images/image_notfound.png';
			}
			
			$val['image_url'] = $image_url;
			$val['image_exists'] = $image_exists;
			$val['thumbnail_class'] = $thumbnail_class;
			$val['thumbnail']['url'] = $thumbnail_url;
		}
	
		if (!$gallery) {
			$message['status'] = 'error';
			$message['message'] = 'Gallery tidak ditemukan';
		}
		
        $data['title'] = 'Gallery';
        $data['kategori'] = $kategori;
        $data['list_kategori'] = $list_kategori;
        $data['id_kategori'] = $id_kategori;
        $data['gallery'] = $gallery;
        $data['message'] = $message;
		
		
		if ($kategori['layout'] == 'masonry') {
			$layout = 'result-gallery-masonry.php';
		} else {
			$layout = 'result-gallery-grid.php';
		}
		
        load_view('views/' . $layout, $data);
}