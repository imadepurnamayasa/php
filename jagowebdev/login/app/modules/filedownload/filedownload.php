<?php
/**
* Login dan Register
* Author	: Agus Prawoto Hadi
* Website	: https://jagowebdev.com
* Year		: 2021
*/

switch ($_GET['action']) 
{
    default: 
        action_notfound();
    
	case 'download':
		
		$id_file = $_GET['id'];
		
		$sql = 'SELECT * FROM file_download 
						LEFT JOIN file_picker USING(id_file_picker) 
				WHERE id_file_download = ?';
		$file = $db->query($sql, $id_file)->getRowArray();
		
		if (!$file) {
			data_notfound();
		}
		
		$file_path = $config['filepicker_upload_path'] . $file['nama_file'];
		// echo $file_path;
		if (!file_exists($file_path)) {
			exit_error( 'File ' . $file['nama_file'] . ' tidak ditemukan, mohon menghubungi admin, terima kasih' );
		}
		
		$data_db['id_user'] = $_SESSION['user']['id_user'];
		$data_db['id_file_download'] = $file['id_file_download'];
		$data_db['judul_file'] = $file['judul_file'];
		$data_db['id_file_picker'] = $file['id_file_picker'];
		$data_db['filename'] = $file['nama_file'];
		$data_db['tgl_download'] = date('Y-m-d H:i:s');

		
		$insert = $db->insert('file_download_log', $data_db);
	
		header('Content-Description: File Transfer');
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: Binary"); 
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header("Content-Disposition: attachment; filename=\"".$file['nama_file']."");
		header("Content-Length: " . filesize($file_path));
		ob_end_clean();
		ob_end_flush();
		readfile($file_path);
		exit;
}