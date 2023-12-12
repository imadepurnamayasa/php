<?php
/**
*	JWD CMS
*	Developed by: Agus Prawoto Hadi
*	Website		: www.jagowebdev.com
*	Year		: 2021
*/

$site_title = 'Error';
$site_desc = 'Error';
$title = 'Error';

switch ($error_type) 
{
	default:
		// load_view('views/error-system.php');
		header('location:' . $config['base_url']);
		break;
		
	case 'page_not_found':
		load_view('views/error-404.php', $data);
}