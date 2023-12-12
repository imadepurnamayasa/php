<?php
/**
*	Aplikasi Cetak Kartu
*	Developed by: Agus Prawoto Hadi
*	Website		: www.jagowebdev.com
*	Year		: 2021
*/

$js[] = $config['base_url'] . 'public/vendors/dragula/dragula.min.js';
$js[] = BASE_URL . 'public/vendors/dropzone/dropzone.min.js';
$js[] = BASE_URL . 'public/vendors/jquery-ui/jquery-ui.js';

$styles[] = $config['base_url'] . 'public/vendors/dragula/dragula.min.css';
$styles[] = $config['base_url'] . 'public/vendors/dropzone/dropzone.min.css';
$styles[] = $config['base_url'] . 'public/vendors/jquery-ui/jquery-ui.css';
$styles[] = $config['base_url'] . 'public/themes/modern/css/field.css';

$js[] = BASE_URL . 'public/vendors/displace/displace.js';
$js[] = BASE_URL . 'public/themes/modern/js/field.js';

$site_title = 'Setting Field';

switch ($_GET['action']) 
{
	default: 
		action_notfound();
		
	// INDEX 
	case 'index':
	
		if (!empty($_POST['delete'])) 
		{
			cek_hakakses('delete_data', 'field');
						
			$result = $db->delete('field', ['id_field' => $_POST['id']]);
			// $result = true;
			if ($result) {
				$data['msg'] = ['status' => 'ok', 'message' => 'Data field berhasil dihapus'];
			} else {
				$data['msg'] = ['status' => 'error', 'message' => 'Data field gagal dihapus'];
			}
		}
		
		// 
		$sql = 'SELECT * FROM field ORDER BY urut';
		$data['field'] = $db->query($sql)->getResultArray();
		
		$sql = 'SELECT * FROM field';
		$data['result'] = $db->query($sql)->getResultArray();
		
		if (!$data['result']) {
			$data['msg']['status'] = 'error';
			$data['msg']['content'] = 'Data tidak ditemukan';
		}
		
		$sql = 'SELECT * FROM layout_kartu WHERE gunakan = 1';
		$result = $db->query($sql)->row();
		$data['layout']	= $result;
		$data['background'] = [
				'background_depan' => $result['background_depan']
				,'background_belakang'  => $result['background_belakang']
			];
		
		$sql = 'SELECT * FROM setting_printer';
		$result = $db->query($sql)->result();
		$data['printer']	= $result[0];
		
		load_view('views/result.php', $data);
	
	case 'ajax-update-field-sort':
		$list_urut = json_decode($_POST['urut'], true);
		foreach ($list_urut as $index => $val) {
			$data_db['urut'] = $index + 1;
			$query = $db->update('field', $data_db, 'id_field = ' . $val);
		}
		
		$result['status'] = 'ok';
		$result['message'] = 'Data berhasil disimpan';
		echo json_encode($result);
		exit;
		
	case 'ajax-update-field-judul':
	
		if (empty($_POST['id']) || !is_numeric($_POST['id']) || empty($_POST['judul'])) {
			$result['status'] = 'ok';
			$result['message'] = 'Invalid Input';
			echo json_encode($result);
			exit;
		}
		
		$data_db['judul_kolom'] = $_POST['judul'];
		$query = $db->update('field', $data_db, 'id_field = ' . $_POST['id']);
		
		if ($query) {
			$result['status'] = 'ok';
			$result['message'] = 'Data berhasil disimpan';
		} else {
			$result['status'] = 'error';
			$result['message'] = 'Data gagal disimpan';
		}
		echo json_encode($result);
		exit;
		
	case 'ajax-update-aktif':

		$data_db['aktif'] = $_POST['aktif'];
		$query = $db->update('field', $data_db, 'id_field = ' . $_POST['id']);
		
		$result['status'] = 'ok';
		$result['message'] = 'Data berhasil disimpan';
		echo json_encode($result);
		exit;
	
	case 'add': 
		
		cek_hakakses('create_data');
		
		$breadcrumb['Add'] = '';
		$data['title'] = 'Tambah Data Mahasiswa';
		
		// Submit
		$data['msg'] = [];
		if (isset($_POST['submit'])) 
		{
			$form_errors = validate_form();
			if (!$_FILES['foto']['name']) {
				$form_errors['foto'] = 'Foto belum dipilih';
			}
			
			if ($form_errors) {
				$data['msg']['status'] = 'error';
				$data['msg']['content'] = $form_errors;
			} else {
				
				$data_db = set_data();
				$data_db['tgl_input'] = date('Y-m-d');
				$data_db['id_user_input'] = $_SESSION['user']['id_user'];
				
				$path = $config['foto_path'];
				
				if (!is_dir($path)) {
					if (!mkdir($path, 0777, true)) {
						$data['msg']['status'] = 'error';
						$data['msg']['content'] = 'Unable to create a directory: ' . $path;
					}
				}
				
				$query = false;
				$new_name = upload_image($path, $_FILES['foto']);
	
				if ($new_name) {
					$data_db['foto'] = $new_name;
					$query = $db->insert('mahasiswa', $data_db);
					
					if ($query) {
						$newid = $db->lastInsertId();
						$data['msg']['status'] = 'ok';
						$data['msg']['content'] = 'Data berhasil disimpan';
						$sql = 'SELECT foto FROM mahasiswa WHERE id_mahasiswa = ?';
						$result = $db->query($sql, $newid)->row();
						$data['foto'] = $result['foto'];
					} else {
						$data['msg']['status'] = 'error';
						$data['msg']['content'] = 'Data gagal disimpan';
					}
				} else {
					$data['msg']['status'] = 'error';
					$data['msg']['content'] = 'Error saat memperoses gambar';
				}
					
				
				
			}
		}
		load_view('views/form.php', $data);
	
	case 'edit':
	
		cek_hakakses('update_data', 'mahasiswa');
		
		$breadcrumb['Edit'] = '';
	
		$data['title'] = 'Edit ' . $current_module['judul_module'];
		
		// Submit
		$data['msg'] = [];
		if (isset($_POST['submit'])) 
		{
			
			$form_errors = validate_form();
			
			$sql = 'SELECT foto FROM mahasiswa WHERE id_mahasiswa = ?';
			$img_db = $db->query($sql, $_POST['id'])->row();
			
			if (!$_FILES['foto']['name'] && $img_db['foto'] == '') {
				$form_errors['foto'] = 'Foto belum dipilih';
			}
			
			if ($form_errors) {
				$data['msg']['status'] = 'error';
				$data['msg']['content'] = $form_errors;
			} else {
				
				$data_db = set_data();
				$data_db['tgl_edit'] = date('Y-m-d');
				$data_db['id_user_edit'] = $_SESSION['user']['id_user'];
				$path = 'public/images/foto/';
				
				$query = false;

				$new_name = $img_db['foto'];
				if ($_FILES['foto']['name']) 
				{
					//old file
					if ($img_db['foto']) {
						$del = delete_file($path . $img_db['foto']);
						if (!$del) {
							$data['msg']['status'] = 'error';
							$data['msg']['content'] = 'Gagal menghapus gambar lama';
						}
					}
					
					$new_name = upload_image($path, $_FILES['foto'], 300,300);
				}
	
				if ($new_name) {
					$data_db['foto'] = $new_name;
					$query = $db->update('mahasiswa', $data_db, 'id_mahasiswa = ' . $_POST['id']);
					if ($query) {
						$data['msg']['status'] = 'ok';
						$data['msg']['content'] = 'Data berhasil disimpan';
					} else {
						$data['msg']['status'] = 'error';
						$data['msg']['content'] = 'Data gagal disimpan';
					}
				} else {
					$data['msg']['status'] = 'error';
					$data['msg']['content'] = 'Error saat memperoses gambar';
				}
			}
		}
		
		// Updated image
		$sql = 'SELECT * FROM mahasiswa WHERE id_mahasiswa = ?';
		$result = $db->query($sql, trim($_GET['id']))->getRowArray();
		$data = array_merge($data, $result);
		load_view('views/form.php', $data);
	
	case 'getDataDT':
				
		$result['draw'] = $start = $_POST['draw'] ?: 1;
		
		$data_table = getListData();
		$result['recordsTotal'] = $data_table['total_data'];
		$result['recordsFiltered'] = $data_table['total_filtered'];
				
		helper('html');
		$id_user = $_SESSION['user']['id_user'];
		
		foreach ($data_table['content'] as $key => &$val) 
		{
			$foto = 'Anonymous.png';
			if ($val['foto']) {
				if (file_exists('public/images/foto/' . $val['foto'])) {
					$foto = $val['foto'];
				} else {
					$foto = 'noimage.png';
				}
			}
			
			$val['foto'] = '<div class="list-foto"><img src="'. BASE_URL.'public/images/foto/' . $foto . '"/></div>';
			
			$val['tgl_lahir'] = $val['tempat_lahir'] . ', '. format_tanggal($val['tgl_lahir']);
			
			$val['ignore_search_action'] = btn_action([
									'edit' => ['url' => BASE_URL . $current_module['nama_module'] . '/edit?id='. $val['id_mahasiswa']]
								, 'delete' => ['url' => ''
												, 'id' =>  $val['id_mahasiswa']
												, 'delete-title' => 'Hapus data mahasiswa: <strong>'.$val['nama'].'</strong> ?'
											]
							]);
		}
					
		$result['data'] = $data_table['content'];
		echo json_encode($result); exit();
}

function getListData() {
	
	global $db;
	$columns = $_POST['columns'];
	$order_by = '';
	
	// Search
	$search_all = @$_POST['search']['value'];
	$where = where_own();
	if ($search_all) {
		// Additional Search
		$columns[]['data'] = 'tempat_lahir';
		foreach ($columns as $val) {
			
			if (strpos($val['data'], 'ignore_search') !== false) 
				continue;
			
			if (strpos($val['data'], 'ignore') !== false)
				continue;
			
			$where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
		}
		 $where .= ' AND (' . join(' OR ', $where_col) . ') ';
	}
	
	// Order
	$order = $_POST['order'];
	
	if (@$order[0]['column'] != '' ) {
		$order_by = ' ORDER BY ' . $columns[$order[0]['column']]['data'] . ' ' . strtoupper($order[0]['dir']);
	}

	$start = $_POST['start'] ?: 0;
	$length = $_POST['length'] ?: 10;
	
	// Query Total
	$sql = 'SELECT COUNT(*) AS jml_data FROM mahasiswa' . where_own();
	$query = $db->query($sql)->getRowArray();
	$total_data = $query['jml_data'];
	
	// Query Filtered
	$sql = 'SELECT COUNT(*) AS jml_data FROM mahasiswa' . $where;
	$query = $db->query($sql)->getRowArray();
	$total_filtered = $query['jml_data'];
	
	// Query Data
	$sql = 'SELECT * FROM mahasiswa 
			' . $where . $order_by . ' LIMIT ' . $start . ', ' . $length;
	$content = $db->query($sql)->getResultArray();
	
	return ['total_data' => $total_data, 'total_filtered' => $total_filtered, 'content' => $content];
}

function set_data() {
	$exp = explode('-', $_POST['tgl_lahir']);
	$tgl_lahir = $exp[2].'-'.$exp[1].'-'.$exp[0];
	$data_db['nama'] = $_POST['nama'];
	$data_db['email'] = $_POST['email'];
	$data_db['tempat_lahir'] = $_POST['tempat_lahir'];
	$data_db['tgl_lahir'] = $tgl_lahir;
	$data_db['npm'] = $_POST['npm'];
	$data_db['prodi'] = $_POST['prodi'];
	$data_db['fakultas'] = $_POST['fakultas'];
	$data_db['alamat'] = $_POST['alamat'];
	$data_db['qrcode_text'] = $_POST['qrcode_text'];
	return $data_db;
}

function validate_form() {
	
	require_once('app/libraries/FormValidation.php');
	$validation = new FormValidation();
	$validation->setRules('nama', 'Nama Siswa', 'required');
	$validation->setRules('email', 'Email', 'trim|required');
	$validation->setRules('tempat_lahir', 'Tempat Lahir', 'trim|required');
	$validation->setRules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
	$validation->setRules('npm', 'NPM', 'trim|required');
	$validation->setRules('prodi', 'Prodi', 'trim|required');
	$validation->setRules('fakultas', 'Fakultas', 'trim|required');
	$validation->setRules('alamat', 'Alamat', 'trim|required');
	
	$validation->validate();
	$form_errors =  $validation->getMessage();
			
	if ($_FILES['foto']['name']) {
		
		$file_type = $_FILES['foto']['type'];
		$allowed = ['image/png', 'image/jpeg', 'image/jpg'];
		
		if (!in_array($file_type, $allowed)) {
			$form_errors['foto'] = 'Tipe file harus ' . join($allowed, ', ');
		}
		
		if ($_FILES['foto']['size'] > 1024 * 1024) {
			$form_errors['foto'] = 'Ukuran file maksimal 1Mb';
		}
		
		$info = getimagesize($_FILES['foto']['tmp_name']);
		if ($info[0] < 100 || $info[1] < 100) { //0 Width, 1 Height
			$form_errors['foto'] = 'Dimensi file minimal: 100px x 100px';
		}
	}
	
	return $form_errors;
}