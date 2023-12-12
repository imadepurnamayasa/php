<?php
/**
*	JWD Menumanager
* 	Author	: Agus Prawoto Hadi
*	Website	: https://jagowebdev.com
*	Year	: 2021
*/

$js[] = $config['base_url'] . 'public/themes/modern/js/home.js';
$js[] = $config['base_url'] . 'public/vendors/overlayscrollbars/jquery.overlayScrollbars.min.js';
$js[] = $config['base_url'] . 'public/themes/modern/js/adminpanel.js';

$styles[] = $config['base_url'] . 'public/themes/modern/css/home.css';
$styles[] = $config['base_url'] . 'public/themes/modern/css/adminpanel.css';
$styles[] = $config['base_url'] . 'public/themes/modern/css/sidebar-left.css';
$styles[] = $config['base_url'] . 'public/vendors/overlayscrollbars/OverlayScrollbars.min.css';

csrf_settoken();
$site_title = 'Home';
$data['title'] = 'Home';

echo load_view('views/header.php', $data, true);
echo load_view('views/result.php', $data, true);
echo load_view('views/footer.php', $data, true);