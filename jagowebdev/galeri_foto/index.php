<?php
session_start();
/** ERROR HANDLER */
include 'system/error_handler.php';
include 'app/config/constant.php';

if (ENVIRONMENT == 'production') {
	error_reporting( 0 );
} else {
	error_reporting( E_ALL );
}

$default_module = 'artikel';

include 'app/config/config.php';
include 'app/config/database.php';
include 'app/includes/functions.php';
include 'app/libraries/Auth.php';
include 'system/libraries/database/'.strtolower($database['driver']).'.php';
include 'system/functions.php';
include 'system/libraries/csrf.php';

define ('BASE_URL', $config['base_url']);
define ('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define ('SYS_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define ('THEME_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'public/themes/' . $config['theme'] . '/');
define ('THEME_URL', $config['base_url'] . 'public/themes/' . $config['theme'] . '/');
define ('BASEPATH', __DIR__ . '/');

date_default_timezone_set('Asia/Jakarta');

$db = new Database();
$default_module = 'gallery';

$path = get_segments();
if (!$path) {
	$path[0] = $default_module;
}

// Page Meta
$sql = 'SELECT * FROM setting_web';
$query = $db->query($sql)->getResultArray();
$page_meta = [];
foreach ($query as $val) {
	$page_meta[$val['param']] = $val['value'];
}

// Layout
$sql = 'SELECT * FROM setting_app_tampilan';
$query = $db->query($sql)->getResultArray();
foreach ($query as $val) {
	$app_layout[$val['param']] = $val['value'];
}
$data['app_layout'] = $app_layout;

// Segment
$error_type = '';

if (file_exists('app/modules/' . $path[0] . '/' . $path[0] . '.php')) {
	$current_module['nama_module'] = $path[0];

} else {
	$error_type = 'page_not_found';
	$current_module['nama_module'] = 'error';
}

$module_file = 'app/modules/' . $current_module['nama_module'] . '/' . $current_module['nama_module'] . '.php';
include( $module_file );
