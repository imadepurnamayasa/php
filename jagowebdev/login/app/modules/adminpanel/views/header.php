<?php 
/**
*	Developed by: Agus Prawoto Hadi
*	Website		: https://jagowebdev.com
*	Year		: 2021
*/

global $current_module;
global $js;
global $styles;
global $app_layout;
global $setting_web;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>JWD Admin</title>
<meta name="descrition" content="Contoh penggunaan menu pada JWD Admin"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?=$config['base_url'] . 'public/images/favicon.png?r=' . time()?>" />
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/font-awesome/css/all.css?='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/bootstrap/css/bootstrap.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/overlayscrollbars/OverlayScrollbars.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=THEME_URL . 'css/site.css?r='.time()?>"/>

<?php
if (@$styles) {
	foreach($styles as $file) {
		echo '<link rel="stylesheet" type="text/css" href="'.$file.'?r='.time().'"/>';
	}
}
?>
<link rel="stylesheet" id="style-switch" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['color_scheme'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="style-switch-sidebar" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['sidebar_color'].'-sidebar.css?r='.time()?>"/>
<link rel="stylesheet" id="font-switch" type="text/css" href="<?=THEME_URL . 'css/fonts/'.$app_layout['font_family'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?=THEME_URL . 'css/fonts/font-size-'.$app_layout['font_size'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="logo-background-color-switch" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['logo_background_color'].'-logo-background.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=THEME_URL . 'css/override.css?r='.time()?>"/>
<script type="text/javascript">
	var base_url = "<?=$config['base_url']?>";
	var module_url = "<?=module_url()?>";
	var current_url = "<?=current_url()?>";
	var theme_url = "<?=theme_url()?>";
</script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/jquery/jquery-3.4.1.js?='.time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/bootstrap/js/bootstrap.bundle.min.js?r='.time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/overlayscrollbars/jquery.overlayScrollbars.min.js?r='.time()?>"></script>
<script type="text/javascript" src="<?=THEME_URL . 'js/site.js?r='.time()?>"></script>
<?php
if (@$js) {
	foreach($js as $file) {
		if (is_string($file)) {
			$file = ['file' => $file];
		}

		if (key_exists('print', $file)) {
			echo '<script type="text/javascript">' . $file['script'] . '</script>';
		} else {
			echo '<script type="text/javascript" src="'.$file['file'] .'?r='.time().'"></script>';
		}
	}
}

// $user = $_SESSION['user'];

?>
</head>
<body>
	<header class="nav-header">
		<div class="nav-header-logo pull-left">
			<a class="header-logo" href="<?=$config['base_url']?>" title="Jagowebdev">
				<img src="<?=BASE_URL . $config['images_path'] ?>/logo_aplikasi.png?=r"<?=time()?>/>
			</a>
		</div>
		<div class="pull-left nav-header-left">
			<ul class="nav-header">
				<li>
					<a href="#" id="mobile-menu-btn">
						<i class="fa fa-bars"></i>
					</a>
				</li>
			</ul>
		</div>
		<div class="pull-right mobile-menu-btn-right">
			<a href="#" id="mobile-menu-btn-right">
				<i class="fa fa-ellipsis-h"></i>
			</a>
		</div>
		<div class="pull-right nav-header nav-header-right">
			<?php
			// MENU - SIDEBAR
			require_once('app/includes/functions.php');
			$menu_db = get_menu_db('Header Admin');
			$list_menu = menu_list($menu_db);
			?>
			<?=build_menu($list_menu);?>
			<ul>
				<li>
					<?php $img_url = $config['base_url'] . $config['user_images_path'] . 'default.png';
					$account_link = $config['base_url'] . 'user';
					?>
					<a class="account-menu-btn" href="<?=$account_link?>"><img src="<?=$img_url?>" alt="user_img"></a>
					<div class="account-menu-container hadow-sm">
						<ul class="account-menu">
							<li class="account-img-profile">
								<div class="avatar-profile">
									<img src="<?=$img_url?>" alt="user_img">
								</div>
								<div class="card-content">
								<p>AGUS PRAWOTO HADI</p>
								<p><small>Email: prawoto.hadi@gmail.com</small></p>
								</div>
							</li>
							<li><a href="<?=$config['base_url']?>user/edit-password">Change Password</a></li>
							<li><a href="<?=$config['base_url']?>login/logout">Logout</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</header>
	<div class="site-content">
		<?php
		require_once('app/includes/functions.php');
		
		// MENU - SIDEBAR
		$menu_db = get_menu_db('Left Menu');
		$list_menu = menu_list($menu_db);
				
		?>
		<div class="sidebar">
			<nav>
			<?php
			echo build_menu($list_menu, ['class' => 'main-menu']);
			?>
			</nav>
		</div>
		<div class="content">
		<div class="content-wrapper">
		