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
<title><?=$current_module['judul_module']?> | <?=$setting_web['title']?></title>
<meta name="descrition" content="<?=$current_module['deskripsi']?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?=$config['base_url'] . 'public/images/favicon.png?r=' . time()?>" />
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/font-awesome/css/all.css?='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/bootstrap/css/bootstrap.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/iconpicker/css/bulma-iconpicker.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=THEME_URL . 'css/bootstrap-custom.css?r=' . time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/sweetalert2/sweetalert2.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/sweetalert2/sweetalert2.custom.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url'] . 'public/vendors/overlayscrollbars/OverlayScrollbars.min.css?r='.time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=THEME_URL . 'css/site.css?r='.time()?>"/>

<link rel="stylesheet" id="style-switch" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['color_scheme'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="style-switch-sidebar" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['sidebar_color'].'-sidebar.css?r='.time()?>"/>
<link rel="stylesheet" id="font-switch" type="text/css" href="<?=THEME_URL . 'css/fonts/'.$app_layout['font_family'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?=THEME_URL . 'css/fonts/font-size-'.$app_layout['font_size'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="logo-background-color-switch" type="text/css" href="<?=THEME_URL . 'css/color-schemes/'.$app_layout['logo_background_color'].'-logo-background.css?r='.time()?>"/>
<?php
if (@$styles) {
	foreach($styles as $file) {
		echo '<link rel="stylesheet" type="text/css" href="'.$file.'?r='.time().'"/>';
	}
}
?>
<link rel="stylesheet" type="text/css" href="<?=THEME_URL . 'css/override.css?r='.time()?>"/>
<script type="text/javascript">
	var base_url = "<?=$config['base_url']?>";
	var base_url_parent = "<?=$config['base_url_parent']?>";
	var module_url = "<?=module_url()?>";
	var current_url = "<?=current_url()?>";
	var theme_url = "<?=theme_url()?>";
	var filepicker_server_url = "<?=$config['filepicker_server_url']?>";
	var filepicker_icon_url = "<?=$config['filepicker_icon_url']?>";
</script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/jquery/jquery-3.4.1.js?='.time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/bootstrap/js/bootstrap.bundle.min.js?r='.time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/bootbox/bootbox.all.min.js?r='.time()?>"></script>

<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/iconpicker/js/bulma-iconpicker.min.js?r='.time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url'] . 'public/vendors/sweetalert2/sweetalert2.min.js?r='.time()?>"></script>
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

$user = $_SESSION['user'];

?>
</head>
<body>
	<header class="nav-header">
		<div class="nav-header-logo pull-left">
			<a class="header-logo" href="<?=$config['base_url']?>" title="Jagowebdev">
				<img src="<?=BASE_URL . $config['images_path'] . $setting_web['logo_app']?>?=r"<?=time()?>/>
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
			
			<ul>
				<li><a class="icon-link" href="<?=$config['base_url']?>setting"><i class="fas fa-cog"></i></a></li>
				
				<li>
					<?php $img_url = !empty($user['avatar']) && file_exists(BASE_PATH . '/public/images/user/' . $user['avatar']) ? $config['base_url'] . $config['user_images_path'] . $user['avatar'] : $config['base_url'] . $config['user_images_path'] . 'default.png';
					$account_link = $config['base_url'] . 'user';
					?>
					<a class="profile-btn" href="<?=$account_link?>"><img src="<?=$img_url?>" alt="user_img"></a>
					<div class="account-menu-container">
						<?php
						if ($is_loggedin) { 
							?>
							<ul class="account-menu">
								<li class="account-img-profile">
									<div class="avatar-profile">
										<img src="<?=$img_url?>" alt="user_img">
									</div>
									<div class="card-content">
									<p><?=strtoupper($user['nama'])?></p>
									<p><small>Email: <?=$user['email']?></small></p>
									</div>
								</li>
								<li><a href="<?=$config['base_url']?>user/edit-password">Change Password</a></li>
								<li><a href="<?=$config['base_url']?>login/logout">Logout</a></li>
							</ul>
						<?php } else { ?>
							<div class="float-login">
							<form method="post" action="<?=$config['base_url']?>login">
								<input type="email" name="email" value="" placeholder="Email" required>
								<input type="password" name="password" value="" placeholder="Password" required>
								<div class="checkbox">
									<label style="font-weight:normal"><input name="remember" value="1" type="checkbox">&nbsp;&nbsp;Remember me</label>
								</div>
								<button type="submit"  style="width:100%" class="btn btn-success" name="submit">Submit</button>
								<?php
								$form_token = $auth->generateFormToken('login_form_token_header');
								?>
								<input type="hidden" name="form_token" value="<?=$form_token?>"/>
								<input type="hidden" name="login_form_header" value="login_form_header"/>
							</form>
							<a href="<?=$config['base_url'] . 'recovery'?>">Lupa password?</a>
							</div>
						<?php }?>
					</div>
				</li>
			</ul>
		
		</div>
	</header>
	<div class="site-content">
		<?php
		require_once('app/includes/functions.php');
		
		// MENU - SIDEBAR
		$menu_db = get_menu_db(1);
		$list_menu = menu_list($menu_db);
		?>
		<div class="sidebar">
			<nav>
			<?php
			echo build_menu($list_menu);
			?>
			</nav>
		</div>
		<div class="content">
		<?=!empty($breadcrumb) ? breadcrumb($breadcrumb) : ''?>
		<div class="content-wrapper">
		