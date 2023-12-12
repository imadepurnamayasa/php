<?php
global $js;
global $js_footer;
global $styles;
global $config;
global $page_meta;
?>
<!DOCTYPE HTML>
<html lang="en">
<title><?=$page_meta['title']?></title>
<meta name="descrition" content="<?=$page_meta['description']?>"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php
if (!empty($page_meta['search_engine_index']) && $page_meta['search_engine_index'] == 'N') {
	echo '<meta name="robots" content="noindex">';
}
?>

<link rel="shortcut icon" href="<?=$config['base_url']?>public/images/favicon.png" />

<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/vendors/font-awesome/css/all.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/vendors/bootstrap/css/bootstrap.min.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/themes/modern/css/bootstrap-custom.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/themes/modern/css/bootstrap-custom.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/themes/modern/css/site.css?r=<?=time()?>"/>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/vendors/overlayscrollbars/OverlayScrollbars.min.css?r=<?=time()?>"/>
<link rel="stylesheet" id="font-switch" type="text/css" href="<?=$config['base_url'] . 'public/themes/modern/css/fonts/'.$app_layout['font_family'].'.css?r='.time()?>"/>
<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?=$config['base_url'] . 'public/themes/modern/css/fonts/font-size-'.$app_layout['font_size'].'.css?r='.time()?>"/>
<?php
if (@$styles) {
	foreach($styles as $file) {
		echo '<link rel="stylesheet" type="text/css" href="'.$file.'?r='.time().'"/>';
	}
}
?>

<script type="text/javascript" src="<?=$config['base_url']?>public/vendors/jquery/jquery-3.4.1.js"></script>
<script type="text/javascript" src="<?=$config['base_url']?>public/themes/modern/js/site.js?r=<?=time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url']?>public/vendors/bootstrap/js/bootstrap.min.js?r=<?=time()?>"></script>
<script type="text/javascript" src="<?=$config['base_url']?>public/vendors/overlayscrollbars/jquery.overlayScrollbars.min.js?r=<?=time()?>"></script>
<script type="text/javascript">
	var base_url = "<?=$config['base_url']?>";
</script>
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

?>
</head>
<body>
	<div class="site-container">
	<header class="shadow-sm">
		<div class="menu-wrapper wrapper clearfix">
			<a href="#" id="mobile-menu-btn" class="show-mobile">
				<i class="fa fa-bars"></i>
			</a>
			<div class="nav-left">
				<a href="" class="logo-header" title="Jagowebdev">
					<img src="<?=$config['base_url']?>public/images/logo.png" alt="Jagowebdev"/>
				</a>
			</div>
			<?php
			// MENU - SIDEBAR
			require_once('app/includes/functions.php');
			$menu_db = get_menu_db('Header');
			$list_menu = menu_list($menu_db);
			?>
			
			<nav class="nav-right nav-header">
				<?=build_menu($list_menu, ['class' => 'main-menu']);?>
				<ul class="user-menu">
					<li class="menu">
						<a class="account-menu-btn" href="#"><i class="menu-icon fas fa-user"></i>My Account</a>
						<div class="account-menu-container shadow-sm">
							<ul class="account-menu">
								<li class="account-img-profile">
									<?php $img_url = !empty($user->avatar) ? $config['base_url'] . 'public/files/users/'.$user->id_user.'/' . $user->avatar : $config['base_url'] . 'public/images/user/man.png';?>
									<div class="image-container"><a href="<?=$config['base_url']?>user/edit" title="Ubah Profil"><img src="<?=$img_url?>" alt="user_img"></a></div>
									<div class="card-content mt-3">
									<p>Agus Prawoto Hadi</p>
									<p><small>Email: prawoto.hadi@gmail.com</small></p>
									</div>
								</li>
								<li><a href="#">Change Password</a></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</div>
	</header>
	<div class="page-container">