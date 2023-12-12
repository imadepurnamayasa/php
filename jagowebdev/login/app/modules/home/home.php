<?php
/**
*	JWD Menumanager
* 	Author	: Agus Prawoto Hadi
*	Website	: https://jagowebdev.com
*	Year	: 2021
*/

$js[] = $config['base_url'] . 'public/themes/modern/js/home.js';
$styles[] = $config['base_url'] . 'public/themes/modern/css/sidebar-left.css';

$data['title'] = 'Home';

load_view('views/result.php', $data);