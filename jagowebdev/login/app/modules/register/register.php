<?php
/**
*	CMS Jagowebdev
*	Developed by: Agus Prawoto Hadi
*	Website		: www.jagowebdev.com
*	Year		: 2021
*/

$site_title = 'Register Akun';
$site_desc = 'Register akun Anda';
$title = 'Register Akun';

$js[] = $config['base_url'] . 'public/vendors/jquery.pwstrength.bootstrap/pwstrength-bootstrap.min.js';
$js[] =	$config['base_url'] . 'public/themes/modern/js/password-meter.js';

$styles[] =	$config['base_url'] . 'public/themes/modern/css/user.css';

helper('registrasi');
$setting_register = get_setting_registrasi();

$title_header = 'Registrasi Akun';

if ($setting_register['enable'] == 'N') {
	redirectto_login();
}

$data['title'] = 'Register';
$data['sub_title'] = 'Buat akun baru';
		
switch ($_GET['action']) 
{
	default:
		action_notfound();
		
	case 'index':

		$error = false;
		$message = [];
		$page_content = 'views/form.php';
			
		if (!empty($_POST['submit'])) 
		{
			$validation = csrf_validation();
			
			// Cek CSRF token
			if ($validation['status'] == 'error') {
				$message = ['status' => 'error', 'message' => $validation['message']];
				$error = true;
			}
			
			// Cek email belum diaktifkan
			if (!$error) {
				$sql = 'SELECT * FROM user WHERE email = "' . $_POST['email'] . '" AND verified = 0';
				$result = $db->query($sql)->getRowArray();
				if ($result) {
					$message['status'] = 'error';
					$message['message'] = 'Email sudah terdaftar tetap belum diaktifkan, silakan <a href="' . $config['base_url'] . 'resendlink" title="Kirim ulang link aktivasi">aktifkan disini</a>';
					$error = true;
				}
			}
			
			// Cek isian form
			if (!$error) {
				
				// Trim $_POST
				array_map('trim', $_POST);
				$form_error = validate_form();
				if ($form_error) {
					$message['status'] = 'error';
					$message['message'] = $form_error;
					$error = true;
				}
			}
			
			// Submit data
			if (!$error) {
				
				$message['status'] = 'error';
				
				$db->beginTrans();

				$verified = $setting_register['metode_aktivasi'] == 'langsung' ? 1 : 0;
				
				$data_db['nama'] = $_POST['nama'];
				$data_db['email'] = $_POST['email'];
				$data_db['username'] = $_POST['username'];
				$data_db['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$data_db['verified'] = $verified;
				$data_db['status'] = 1;
				$data_db['created'] = date('Y-m-d H:i:s');
				$data_db['id_role'] = 2;
				$insert_user = $db->insert('user', $data_db);
				$id_user = $db->lastInsertId();
				
				$error = false;
				if (!$insert_user)
				{
					$message['message'] = 'System error, please try again later...';
					$db->rollbackTrans();
					$error = true;
				
				} else {
					
					if ($setting_register['metode_aktivasi'] == 'manual') 
					{
						$message['message'] = 'Terima kasih telah melakukan registrasi, aktivasi akun Anda menunggu persetujuan Administrator. Terima Kasih';
						
					} else if ($setting_register['metode_aktivasi'] == 'langsung') {
						
						$message['message'] = 'Terima kasih telah melakukan registrasi, akun Anda otomatis aktif dan langsung dapat digunakan, silakan <a href="' . $config['base_url'] . 'login">login disini</a>';
						
					} else if ($setting_register['metode_aktivasi'] == 'email') {
						
						$send_email = send_confirm_email($id_user);
					
						if ($send_email['status'] == 'error')
						{
							$message['message'] = 'Error: Link konfirmasi gagal dikirim... <strong>' . $send_email['message'] . '</strong>';
							$error = true;
						} else {
							$message['message'] = 'Terima kasih telah melakukan registrasi, untuk memastikan bahwa kamu adalah pemilik alamat email <strong>' . $_POST['email'] . '</strong>, mohon klik link konfirmasi yang baru saja kami kirimkan ke alamat email tersebut<br/><br/>Biasanya, email akan sampai kurang dari satu menit, namun jika lebih dari lima menit email belum sampai, coba cek folder spam. Jika email benar benar tidak sampai, silakan hubungi kami di support@jagowebdev.com';
						}
					}
					
					if (!$error) {
						$db->commitTrans();
						$message['status'] = 'ok';
						$page_content = 'views/show-message.php';
					}
				}
			}	
		}
	
		$data['form_errors'] = [];
		$data['message'] = $message;
		load_view($page_content, $data);
		break;
	
	case 'confirm': 

		$error = false;
		$message['status'] = 'error';
		$message['message'] = '';

		if (empty($_GET['token'])) {
			$message['message'] = 'Token tidak ditemukan';
			$error = true;
		} else {
		
			@list($selector, $url_token) = explode(':', $_GET['token']);
			if (!$selector || !$url_token) {
				$message['message'] = 'Token tidak ditemukan';
				$error = true;
			}
		}
		
		if (!$error) {
			
			$sql = 'SELECT * FROM user_token
				WHERE selector = ?';
			$dbtoken = $db->query($sql, $selector)->getRowArray();
			
			if ($dbtoken) 
			{
				$error = false;
				
				$sql = 'SELECT * FROM user
				WHERE id_user = ?';
				$user = $db->query($sql, $dbtoken['id_user'])->getRowArray();
				
				if ($user['verified'] == 1) {
					$message['message'] = 'Akun sudah pernah diaktifkan';
					$error = true;
				} 
				else if ($dbtoken['expires'] < date('Y-m-d H:i:s')) {
					$message['message'] = 'Link expired, silakan request <a href="'. $config['base_url'].'resendlink">link aktivasi</a> yang baru';
					$error = true;
				} 
				else if (!$app_auth->validateToken($url_token, $dbtoken['token'])) {
					$message['message'] = 'Token invalid, silakan <a href="'. $config['base_url'].'register">register</a> ulang atau request <a href="'. $config['base_url'].'resendlink">link aktivasi</a> yang baru';
					$error = true;
				}
				
			} else {
				$message['message'] = 'Token tidak ditemukan atau akun sudah pernah diaktifkan';
				$error = true;
			}
		}
		
		if (!$error)
		{
			$db->beginTrans();

			$query = $db->delete('user_token', ['selector' => $selector]);
			$query = $db->delete('user_token', ['action' => 'register', 'id_user' => $dbtoken['id_user']]);
			
			$sql = 'UPDATE user SET verified = 1 WHERE id_user = ?';
			$query = $db->update('user', ['verified' => 1], ['id_user' => $dbtoken['id_user']]);
			
			$update = $db->completeTrans();
		
			if ($update) {
				$message['status'] = 'ok';
				$message['message'] = 'Selamat!!!, akun Anda berhasil diaktifkan, Anda sekarang dapat <a href="'.$config['base_url'].'login">Login</a> menggunakan akun Anda';
			} else {
				$message['message'] = 'Token ditemukan tetapi saat ini akun tidak dapat diaktifkan karena ada gangguan pada sistem, silakan coba dilain waktu, atau hubungi <a href="mailto:' . $config['contact_email'] . '" title="Hubungi kami via email">' . $config['contact_email'] . '</a>';
			}					
		}
		
		$data['message'] = $message;
		load_view('views/show-message.php', $data);
}
function send_confirm_email($id_user) 
{
	global $app_auth, $db, $config;
	
	$token = $app_auth->generateDbToken();
	$data_db = [];
	$data_db['selector'] = $token['selector'];
	$data_db['token'] = $token['db'];
	$data_db['action'] = 'register';
	$data_db['id_user'] = $id_user;
	$data_db['created'] = date('Y-m-d H:i:s');
	$data_db['expires'] = date('Y-m-d H:i:s', strtotime('+1 hour'));
	
	$insert_token = $db->insert('user_token', $data_db);

	helper('email');
	$url_token = $token['selector'] . ':' . $token['external'];
	$url = $config['base_url'].'register/confirm?token='.$url_token;
	$email_content = str_replace('{{NAME}}'
								, $_POST['nama']
								, email_registration_content()
							);
							
	$email_content = str_replace('{{url}}', $url, $email_content);
	
	require_once 'app/config/email.php';
	$email_config = new EmailConfig;
	$email_data = array('from_email' => $email_config->from
					, 'from_title' => 'Jagowebdev'
					, 'to_email' => $_POST['email']
					, 'to_name' => $_POST['nama']
					, 'email_subject' => 'Konfirmasi Registrasi Akun'
					, 'email_content' => $email_content
					, 'images' => ['logo_text' => BASEPATH . 'public/images/logo_text.png']
	);
	
	require_once('app/libraries/SendEmail.php');

	$emaillib = new \App\Libraries\SendEmail;
	$emaillib->init();
	$emaillib->setProvider($email_config->provider);
	$send_email =  $emaillib->send($email_data);
	
	return $send_email;
}
function validate_form() {
	global $db;
	helper ('form_requirement');
	
	$error = [];
	
	$form_field = ['nama' => 'Nama'
				, 'email' => 'Email'
				, 'hp' => 'No. HP'
				, 'password' => 'Password'
				, 'password_confirm' => 'Confirm Password'
			];
	
	foreach ($form_field as $field => $field_title) 
	{
		if (empty($_POST[$field])) {
			$error[] = 'Field ' . $field_title . ' harus diisi';
		}
	}
	
	if (!$error) 
	{
		// Nama
		if (strlen($_POST['nama']) < 5) {
			$error[] = 'Field ' . $form_field['nama'] . ' minimal 5 karakter';
		}
		
		// No. HP
		if (strlen($_POST['hp']) < 10) {
			$error[] = 'Field ' . $form_field['hp'] . ' minimal 10 karakter';
		}
		
		if (strlen($_POST['hp']) > 13) {
			$error[] = 'Field ' . $form_field['hp'] . ' maksimal 13 karakter';
		}
				
		// Passsword
		if ($_POST['password'] !== $_POST['password_confirm']) {
			$error[] = 'Password dengan confirm password tidak sama';
		}
		
		$invalid = password_requirements($_POST['password']);
		if ($invalid) {
			$error = array_merge($error, $invalid);
		}
		
		// Email
		$invalid = email_requirements($_POST['email']);
		if ($invalid) {
			$error = array_merge($error, $invalid);
		}

		$sql = 'SELECT * FROM user WHERE email = "' . $_POST['email'] . '"';
		$result = $db->query($sql)->getRowArray();
		if ($result) {
			$error[] = 'Email telah digunakan';
		}
		
		// Username
		$sql = 'SELECT * FROM user WHERE username = "' . $_POST['username'] . '"';
		$result = $db->query($sql)->getRowArray();
		if ($result) {
			$error[] = 'Username telah digunakan';
		}
	}
	return $error;
}