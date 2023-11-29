<?php
$mod_act_location = FOLDER_MODULE.'login/act/';
$mod_inc_location = FOLDER_MODULE.'login/inc/';
$mod_js_location = FOLDER_MODULE.'login/js/';

$mod_menu = isset($_GET['menu']) ? $_GET['menu'] : '';
$mod_action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($mod_menu) {
    case 'data':
        include $mod_inc_location.'inc_data.php';
        break;
    case 'form':
        include $mod_inc_location.'inc_form.php';
        break;
    case 'action':
        include $mod_inc_location.'inc_action.php';
        break;
    default:
        include $mod_inc_location.'inc_data.php';
        break;
}