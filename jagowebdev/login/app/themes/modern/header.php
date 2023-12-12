<?php
global $js
		, $js_footer
		, $styles
		, $config
		, $page_meta
		, $app_layout
		, $logged_user;

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
<?php
if (!empty($app_layout)) { ?>
	<link rel="stylesheet" id="font-switch" type="text/css" href="<?=$config['base_url'] . 'public/themes/modern/css/fonts/'.$app_layout['font_family'].'.css?r='.time()?>"/>
	<link rel="stylesheet" id="font-size-switch" type="text/css" href="<?=$config['base_url'] . 'public/themes/modern/css/fonts/font-size-'.$app_layout['font_size'].'.css?r='.time()?>"/>
<?php }?>
<link rel="stylesheet" type="text/css" href="<?=$config['base_url']?>public/themes/modern/css/user.css?r=<?=time()?>"/>
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
				<a href="<?=$config['base_url']?>" class="logo-header" title="Jagowebdev">
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
						<?php
						
						if (!empty($_SESSION['user'])) {
							$account_btn = 'My Account';
							$account_link = $config['base_url'] . 'user';
							$account_btn_class = 'account-menu-btn';
						} else {
							$account_btn = 'Login';
							$account_link = $config['base_url'] . 'login';
							$account_btn_class = 'account-menu-btn';
							/* echo '
							<li>
								<a class="btn btn-header-default" href="'.$config['base_url'].'register">Create Account</a>
							</li>'; */
						}
						?>
						<a class="<?=$account_btn_class?>" href="<?=$account_link?>"><i class="menu-icon fas fa-user"></i><?=$account_btn?></a>
						<div class="account-menu-container shadow-sm">
							<?php 
							if (!empty($logged_user)) {
								?>
								<ul class="account-menu">
									<li class="account-img-profile">
										<?php $img_url = !empty($logged_user['avatar']) ? $config['base_url'] . 'public/images/user/' . $logged_user['avatar'] : $config['base_url'] . 'public/images/user/default.png';?>
										<div class="image-container"><a href="<?=$config['base_url']?>user" title="Ubah Profil"><img src="<?=$img_url . '?r=' . time()?>" alt="user_img"></a></div>
										<div class="card-content mt-3">
										<p><?=strtoupper($logged_user['nama'])?></p>
										<p><small>Email: <?=$logged_user['email']?></small></p>
										</div>
									</li>
									<li><a href="<?=$config['base_url']?>user/edit-password">Change Password</a></li>
									<li><a href="<?=$config['base_url']?>login/logout">Logout</a></li>
								</ul>
							
							<?php } else { ?>
								<div class="float-login">
									<form method="post" action="<?=$config['base_url']?>login">
										<input type="email" name="email" value="prawoto.hadi@gmail.com" class="form-control" placeholder="Email" required>
										<div class="small ps-2 mb-3">&nbsp;prawoto.hadi@gmail.com</div>
										<input type="password" name="password" value="AppRegister21" class="form-control"  value="" placeholder="Password" required>
										<div class="small ps-2 mb-3">&nbsp;AppRegister21</div>
										<div class="checkbox mb-3">
											<label style="font-weight:normal"><input name="remember" value="1" type="checkbox">&nbsp;&nbsp;Remember me</label>
										</div>
										<button type="submit"  style="width:100%" class="btn btn-success mb-3" name="submit">Submit</button>
										<?=csrf_field()?>
										<input type="hidden" name="login_form_header" value="login_form_header"/>
									</form>
									<div><a href="<?=$config['base_url'] . 'recovery'?>">Lupa password?</a></div>
									<div><a href="<?=$config['base_url'] . 'register'?>">Belum punya akun?</a></div>
								</div>
							<?php } ?>
						</div>
					</li>
				</ul>
				
			</nav>
			<div class="clearfix"></div>
		</div>
	</header>
	<div class="page-container">