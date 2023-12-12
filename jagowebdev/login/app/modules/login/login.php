<?php

login_restricted();

$site_title = 'Login Into Your Account';
include 'functions.php';

helper('registrasi');
$setting_register = get_setting_registrasi();
$styles[] =	$config['base_url'] . 'public/themes/modern/css/user.css';

switch ($_GET['action']) 
{
	default:
		action_notfound();
		
	case 'logout':
		
		delete_auth_cookie($_SESSION['user']['id_user']);
		session_destroy();
		header('location:'. BASE_URL); 
		
	case 'index' :

		$message = [];
		if (isset($_POST['submit'])) 
		{
			$validation = csrf_validation();
			if ($validation['status'] == 'ok') {
				$cek_message = check_login();
				if ($cek_message) {
					$message['status'] = 'error';
					$message['message'] = $cek_message;
				}
			} else {
				$message['status'] = 'error';
				$message['message'] = $validation['message'];
			}
		}
		
		global $config;
		global $site_title;

		$data['message'] = $message;
		
		load_view('views/form.php', $data);
}