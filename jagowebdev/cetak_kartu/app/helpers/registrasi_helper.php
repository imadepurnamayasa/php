<?php
function get_setting_registrasi() {
	global $db;
	$sql = 'SELECT * FROM setting_register';
	$query = $db->query($sql)->getResultArray();
	foreach($query as $val) {
		$setting_register[$val['param']] = $val['value'];
	}
	return $setting_register;
}