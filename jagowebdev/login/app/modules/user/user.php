<?php
/**
*	PHP Admin Template
*	Author		: Agus Prawoto Hadi
*	Website		: https://jagowebdev.com
*	Year		: 2021
*/

login_required();

// Role 
$sql = 'SELECT * FROM role';
$role = $db->query($sql)->result();
$data['role'] = $role;
$js[] = $config['base_url'] . 'public/vendors/jquery.pwstrength.bootstrap/pwstrength-bootstrap.min.js';
$js[] =	$config['base_url'] . 'public/themes/modern/js/password-meter.js';
$js[] =	$config['base_url'] . 'public/themes/modern/js/image-upload.js';
$styles[] =	$config['base_url'] . 'public/themes/modern/css/user.css';
		
switch ($_GET['action']) 
{
	default: 
		action_notfound();
		
	// INDEX 
	case 'index':
	
		$data['title'] = 'Data User';
		$sql = 'SELECT * FROM user WHERE id_user = ?';
		
		$data['user'] = $db->query($sql, $_SESSION['user']['id_user'])->getRowArray();
		
		if (!$data['user']) {
			$data['message'] = ['status' => 'error', 'message' => 'Data user tidak ditemukan'];
		}
		
		load_view('views/profil.php', $data);
		
	case 'edit-profile': 
		
		$data['title'] = 'Edit Profil';
		$breadcrumb['Edit'] = '';
			
		// Submit
		$data['message'] = [];
		if (isset($_POST['submit'])) 
		{
			$form_errors = validate_form();
			$error = false;
			
			if ($form_errors) {
				$data['message']['message'] = $form_errors;
				$error = true;
			} else {
				
				// Assign fields table
				$fields = ['nama', 'email'];
				foreach ($fields as $field) {
					$data_db[$field] = $_POST[$field];
				}
				
				$sql = 'SELECT avatar FROM user WHERE id_user = ?';
				$result = $db->query($sql, trim($_SESSION['user']['id_user']))->row();
				$img_db = $result;
		
				$path = 'public/images/user/';
				$new_name = $img_db['avatar'];
				
				if ($_POST['avatar_delete_img']) {
					$del = delete_file($path . $img_db['avatar']);
					$new_name = '';
					if (!$del) {
						$data['message']['message'] = 'Gagal menghapus gambar lama';
						$error = true;
					}
				}
				
				if ($_FILES['avatar']['name']) 
				{
					//old file
					if ($img_db['avatar']) {
						$del = delete_file($path . $img_db['avatar']);
						if (!$del) {
							$data['message']['message'] = 'Gagal menghapus gambar lama';
							$error = true;
						}
					}
					
					$new_name = upload_image($path, $_FILES['avatar'], 300, 300);

					if (!$new_name) {
						$data['message']['message'] = 'Error saat memperoses gambar';
						$error = true;
					}
				}
				
				if (!$error) {
					$data_db['avatar'] = $new_name;
					$query = $db->update('user', $data_db, 'id_user = ' . $_SESSION['user']['id_user']);
					if ($query) {
						$data['message']['message'] = 'Data berhasil disimpan';
					} else {
						$data['message']['message'] = 'Data gagal disimpan';
						$error = true;
					}
				}
			}
			
			$data['message']['status'] = $error ? 'error' : 'ok';
		}
		
		$sql = 'SELECT * FROM user WHERE id_user = ?';
		$data['user'] = $db->query($sql, trim($_SESSION['user']['id_user']))->getRowArray();
		if (!$data['user'])
			data_notfound();

		load_view('views/profil-edit.php', $data);
		
	case 'edit-password':
		
		$sql = 'SELECT * FROM user WHERE id_user = ?';
		$user = $db->query($sql, trim($_SESSION['user']['id_user']))->getRowArray();
		$data = array_merge($data, $user);
		$data['title'] = 'Edit Password';
		$breadcrumb['Edit Password'] = '';
		
		// Submit
		$data['message'] = [];
		if (isset($_POST['submit'])) 
		{
			// echo '<pre>'; print_r($_POST); die;
			require_once('app/libraries/FormValidation.php');
			$validation = new FormValidation();
			$validation->setRules('password_lama', 'Password Lama', 'trim|required');
			$validation->setRules('password_baru', 'Password Baru', 'trim|required');
			$validation->setRules('ulangi_password_baru', 'Ulangi Password Baru', 'trim|required');
			
			$valid = $validation->validate();
			
			$error = false;
			if (!$valid) {
				$data['message']['status'] = 'error';
				$data['message']['message'] = $validation->getMessage();
				$error = true;
			}
			
			if (!password_verify($_POST['password_lama'],$user['password'])) {
				$data['message']['status'] = 'error';
				$data['message']['message'][] = 'Password lama tidak cocok'; 
				$error = true;
			}
			
			if ($_POST['password_baru'] !== $_POST['ulangi_password_baru']) {
				$data['message']['status'] = 'error';
				$data['message']['message'][] = 'Password baru dengan ulangi password baru tidak sama'; 
				$error = true;
			}
			
			if (!$error) {
				$data_db['password'] = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);

				// print_r($data_db); die;
				$query = $db->update('user', $data_db, 'id_user = ' . $user['id_user']);
				
				if ($query) {
					$data['message']['status'] = 'ok';
					$data['message']['message'] = 'Password berhasil diupdate';
				} else {
					$data['message']['status'] = 'error';
					$data['message']['message'] = 'Password gagal disimpan';
				}
				
				$data['title'] = 'Edit Password';
			}
		}
		load_view('views/profil-edit-password.php', $data);
	
	case 'download':

		$sql 	= 'SELECT * FROM file_download LEFT JOIN file_picker USING(id_file_picker) ';
        $result = $db->query($sql)->getResultArray();

        $data['result'] = $result;
        
		$message = [];
        if (!$data['result']) {
            $message['status'] = 'error';
            $message['message'] = 'Data tidak ditemukan';
		}
		$data['message'] = $message;

        load_view('views/download.php', $data);
}

function validate_form() {
	
	global $list_action;
	require_once('app/libraries/FormValidation.php');
	$validation = new FormValidation();
	$validation->setRules('nama', 'Nama', 'trim|required');
	$validation->setRules('email', 'Email', 'trim|required|valid_email|unique[user]');
	
	$validation->validate();
	$form_errors =  $validation->getMessage();
			
	if ($_FILES['avatar']['name']) {
		
		$file_type = $_FILES['avatar']['type'];
		$allowed = ['image/png', 'image/jpeg', 'image/jpg'];
		
		if (!in_array($file_type, $allowed)) {
			$form_errors['avatar'] = 'Tipe file harus ' . join(', ', $allowed);
		}
		
		if ($_FILES['avatar']['size'] > 300 * 1024) {
			$form_errors['avatar'] = 'Ukuran file maksimal 300Kb';
		}
		
		$info = getimagesize($_FILES['avatar']['tmp_name']);
		if ($info[0] < 100 || $info[1] < 100) { //0 Width, 1 Height
			$form_errors['avatar'] = 'Dimensi file minimal: 100px x 100px';
		}
	}
	
	return $form_errors;
}