<?php
/**
*	PHP Admin Template Jagowebdev
* 	Author	: Agus Prawoto Hadi
*	Website	: https://jagowebdev.com
*	Year	: 2021
*/

$site_title = 'Menu Frontend';

$styles[] = $config['base_url'] . 'public/vendors/jquery-nestable/jquery.nestable.min.css';
$styles[] = $config['base_url'] . 'public/vendors/wdi/wdi-modal.css';
$styles[] = $config['base_url'] . 'public/vendors/wdi/wdi-fapicker.css';
$styles[] = $config['base_url'] . 'public/vendors/wdi/wdi-loader.css';
$styles[] = $config['base_url'] . 'public/vendors/bulma-switch/bulma-switch.min.css';
$styles[] = $config['base_url'] . 'public/themes/modern/css/menu-frontend.css';
$js[] = $config['base_url'] . 'public/vendors/wdi/wdi-fapicker.js';

$js[] = $config['base_url'] . 'public/vendors/jquery-nestable/jquery.nestable.js';
// $js[] = $config['base_url'] . 'public/vendors/jquery-nestable/jquery.nestable-edit.js';
$js[] = $config['base_url'] . 'public/vendors/js-yaml/js-yaml.min.js';
$js[] = $config['base_url'] . 'public/vendors/jquery-nestable/jquery.wdi-menueditor.js';
$js[] = $config['base_url'] . 'public/themes/modern/js/menu-frontend.js';


include 'functions.php';

switch ($_GET['action']) 
{
	default: 
		action_notfound();
		
	// INDEX 
	case 'index':
	
		$msg = [];
		
		// Group
		$sql = 'SELECT * FROM menu_frontend_group ORDER BY nama_group';
		$menu_group = $db->query($sql)->getResultArray();
		$data['menu_group'] = $menu_group;

		// Menu
		$sql = 'SELECT * FROM menu_frontend WHERE aktif = 1 AND nama_group = ? ORDER BY urut';
		
		$menu = $db->query($sql, $menu_group[0]['nama_group'])->getResultArray();
		foreach ($menu as &$val) {
			$val['highlight'] = 0;
			$val['depth'] = 0;
		}
		
		$list_menu = menu_list($menu);

		$data['list_menu'] = build_menu_list($list_menu); 
		$data['msg'] = $msg;
		
		load_view('views/form.php', $data);
	
	case 'ajax-update-urut' :

		$json = json_decode(trim($_POST['data']), true);
		$array = build_child($json);
		
		foreach ($array as $id_parent => $arr) {
			foreach ($arr as $key => $id_menu) {
				$list_menu[$id_menu] = ['id_parent' => $id_parent, 'urut' => ($key + 1)];
			}
		}
		
		$group = trim($_POST['group']);
		if (empty($group)) {
			$where_group = ' nama_group = "" OR nama_group IS NULL';
		} else {
			$where_group = ' nama_group = "' . $group . '"';
		}
		
		$result = $db->query('SELECT * FROM menu_frontend WHERE ' . $where_group)->result();
		
		foreach ($result as $key => $row)
		{
			$update = [];
			if ($list_menu[$row['id_menu']]['id_parent'] != $row['id_parent']) {
				$id_parent =  $list_menu[$row['id_menu']]['id_parent'] == 0 ? NULL : $list_menu[$row['id_menu']]['id_parent'];
				$update['id_parent'] = $id_parent;
			}
			
			if ($list_menu[$row['id_menu']]['urut'] != $row['urut']) {
				$update['urut'] = $list_menu[$row['id_menu']]['urut'];
			}
			
			if ($update) {
				$query = $db->update('menu_frontend', $update, 'id_menu=' . $row['id_menu']);
				if ($query) {
					$menu_updated[$row['id_menu']] = $row['id_menu'];
				}
			}
		}
		
		if ($menu_updated) {
			$msg['status'] = 'ok';
			$msg['message'] = 'Menu berhasil diupdate';
		} else {
			$msg['status'] = 'warning';
			$msg['message'] = 'Tidak ada menu yang diupdate';
		}
			
		echo json_encode($msg);
		exit;
	
	case 'ajax-edit-group':
		
		if ($_POST['nama_group_old']) {
			$query = $db->update('menu_frontend_group', ['nama_group' => $_POST['nama_group']], ['nama_group' => $_POST['nama_group_old']]);
			// $db->update('menu', $data_db, 'id_menu = ' . $_POST['id']);
		} else {
			$query = $db->insert('menu_frontend_group', ['nama_group' => $_POST['nama_group']]);
		}
		// $result = true;
		if ($query) {
			$message['status'] = 'ok';
			$message['message'] = 'Menu berhasil diupdate';
		} else {
			$message['status'] = 'warning';
			$message['message'] = 'Tidak ada menu yang diupdate';
		}
		echo json_encode($message);
		exit;
		
	case 'ajax-group-delete' :
	
		$delete = $db->delete('menu_frontend_group', ['nama_group' => $_POST['nama_group']]);
		if ($delete) {
			$message['status'] = 'ok';
			$message['message'] = 'Group berhasil dihapus';
		} else {
			$message['status'] = 'warning';
			$message['message'] = 'Group gagal dihapus';
		}
		
		echo json_encode($message);
		exit;
	
	case 'ajax-get-group' :
				
		// Group
		$sql = 'SELECT * FROM menu_frontend_group ORDER BY nama_group';
		$menu_group = $db->query($sql)->getResultArray();

		echo json_encode($menu_group);
		exit;
	
	
	// Load menu when group clicked
	case 'ajax-get-menu':
		
		// Menu
		$group = trim($_GET['group']);
		if (empty($group)) {
			$and_group = ' nama_group = "" OR nama_group IS NULL';
		} else {
			$and_group = ' nama_group = "' . $group . '"';
		}
		
		$sql = 'SELECT * FROM menu_frontend WHERE ' . $and_group . ' ORDER BY urut';
		$menu = $db->query($sql)->getResultArray();

		foreach ($menu as &$val) {
			$val['highlight'] = 0;
			$val['depth'] = 0;
		}
		
		$list_menu = menu_list($menu);
		echo build_menu_list($list_menu); 
		exit();
		
	// EDIT
	case 'ajax-menu-edit':
	
		global $db;	
		$form_error = checkForm();

		if ($form_error) {
			$result['status'] = 'error';
			$result['message'] = '<ul class="list-error"><li>' . join('</li><li>', $form_error) . '</li></ul>';
		} else {
			
			$db->beginTrans();
			$error = false;
			
			$data_db['nama_menu'] = $_POST['nama_menu'];
			$data_db['url'] = $_POST['url'];

			if (trim($_POST['nama_group']) == '') {
				$nama_group = NULL;
			} else {
				$nama_group = $_POST['nama_group'];
			}
			$data_db['nama_group'] = $nama_group;
			if (empty($_POST['aktif'])) {
				$data_db['aktif'] = 'N';
			} else {
				$data_db['aktif'] = 'Y';
			}
			
			if ($_POST['use_icon']) {
				$data_db['class'] = $_POST['icon_class'];
			} else {
				$data_db['class'] = NULL;
			}
			// echo '<pre>'; print_r($_POST); die;
			if (empty($_POST['id'])) {
				$query = $db->insert('menu_frontend', $data_db);
				if (!$query) {
					$error = true;
				}
				$last_id = $db->lastInsertId();
				$message = 'Menu berhasil ditambahkan';
				$result['id_menu'] = $last_id;
			} else {
				
				// Cek ganti group
				$sql = 'SELECT nama_group FROM menu_frontend WHERE id_menu = ?';
				$query = $db->query($sql, $_POST['id'])->getRowArray();
				if ($query['nama_group'] != $nama_group) {
					$data_db['id_parent'] = NULL;
				}
				
				$query = $db->update('menu_frontend', $data_db, 'id_menu = ' . $_POST['id']);
				if (!$query) {
					$error = true;
				}
				// Update group to all child
				$json = json_decode(trim($_POST['menu_tree']), true);
				$array = build_child($json);
				$all_child = allChild($_POST['id'], $array);
				foreach ($all_child as $val) {
					$query = $db->update('menu_frontend', ['nama_group' => $nama_group], 'id_menu = ' . $val);
					if (!$query) {
						$error = true;
					}
				}
				
				$message = 'Menu berhasil diupdate';
			}
			
			// $query = true;
			if ($error) {
				$db->rollbackTrans();
				$result['status'] = 'error';
				$result['message'] = 'Data gagal disimpan';
				$result['error_query'] = true;
			} else {
				$db->commitTrans();
				$result['status'] = 'ok';
				$result['message'] = $message;
			}	
		}
		echo json_encode($result);
		exit();
	
	case 'ajax-menu-delete':

		$result = $db->delete('menu_frontend', ['id_menu' => $_POST['id']]);
		// $result = false;
		if ($result) {
			$message = ['status' => 'ok', 'message' => 'Data menu berhasil dihapus'];
			echo json_encode($message);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data menu gagal dihapus']);
		}
		break;
	
	// FORM edit menu
	case 'ajax-menu-detail':
		$sql = 'SELECT * FROM menu_frontend WHERE id_menu = ?';
		$result = $db->query($sql, $_GET['id'])->row();
		if (!empty($_GET['ajax'])) {
			echo json_encode($result);
		}
		break;
}

function checkForm() 
{
	$error = [];
	if (trim($_POST['nama_menu']) == '') {
		$error[] = 'Nama menu harus diisi';
	}
	
	if (trim($_POST['url']) == '') {
		$error[] = 'Url harus diisi';
	}
	
	return $error;
}