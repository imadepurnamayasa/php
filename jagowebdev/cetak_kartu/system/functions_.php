<?php
/**
*	Developed by: Agus Prawoto Hadi
*	Website		: www.jagowebdev.com
*	Year		: 2020
*/

// Template

function load_view($view, $data = [], $view_only = false, $view_module = false) 
{
	global $config;
	global $is_loggedin;
	global $current_module;
	global $breadcrumb;
	global $db;
	
	extract($data);
	
	ob_start();
	
	
	if (!$view_module) {
		$view_module = $current_module['nama_module'] ;
	}
	
	if ($view_only) {
		include BASE_PATH . 'app/modules/' . $current_module['nama_module'] . '/' . $view;
		
		return ob_get_clean();
	}
	
	if (!$view_only) 
	{
		$theme_header = BASE_PATH . 'app/themes/' . $config['theme'] . '/header.php';
		include backup($theme_header);
	}

	include BASE_PATH . 'app/modules/' . $view_module . '/' . $view;
	
	if (!$view_only) {
		$theme_footer = BASE_PATH . 'app/themes/' . $config['theme'] . '/footer.php';
		include backup($theme_footer);
	}
	
	exit();
}

// Error
function exit_error($content) 
{
	if (ENVIRONMENT == 'production') {
		include BASE_PATH . 'system/views/error_production.php';
	} else {
		include BASE_PATH . 'system/views/error.php';
	}
	exit();
}

function action_notfound() 
{
	$content = '<div class="alert alert-danger">Action not found</div>';
	exit_error($content);
}

function data_notfound($addData = null) 
{
	$data['title'] = 'Error';
	$data['status'] = 'error';
	$data['message'] = 'Data tidak ditemukan';
	
	if ($addData)
		$data = array_merge ($data, $addData);
	
	return load_view('views/error.php', $data, false, 'error');
	exit();
}

if (empty($_GET['action'])) {
	$_GET['action'] = 'index';
}

function login_required() {
	global $app_auth;
	global $config;
	if (!$app_auth->isLoggedIn() && @$_GET['module'] !== 'login') {
		header('location:'. BASE_URL . 'login'); 
	}
}

function login_restricted() 
{
	global $app_auth;
	global $config;
	if ($app_auth->isLoggedIn()) {
		if ($_GET['action'] !== 'logout') {
			header('location:'. BASE_URL); 
		}
	}
}

function all_parents($id_menu, &$list_parent = []) {
	global $db;
	
	$query = $db->query('SELECT * FROM menu')->result();
	foreach($query as $val) {
		$menu[$val['id_menu']] = $val;
	}
	// echo '<pre>'; print_r($menu);
	if (key_exists($id_menu, $menu)) {
		$parent = $menu[$id_menu]['id_parent'];
		if ($parent) {
			$list_parent[$parent] = &$parent;
			all_parents($parent, $list_parent);
		}
	}
	
	return $list_parent;
}
function backup($file) {
	/* $backup = str_replace('.php', '.backup', $file);
	if (!file_exists($backup)) {
		$content = file_get_contents($file);
		$fh = fopen($backup, 'w');
		fwrite($fh, base64_decode('PCEtLSBqYWdvd2ViZGV2LmNvbSAtLT4=') . $content);
		fclose($fh);
	}
	
	return $backup; */
	return $file;
}
?>