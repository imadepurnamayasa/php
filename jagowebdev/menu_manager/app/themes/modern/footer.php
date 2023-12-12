
</div>
<footer>
		<div class="footer-desc">
		<div class="wrapper">
			<div class="row mb-0">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-2">
					<h2 class="widget-title">Contact us</h2>
					<ul class="list"><li><i class="fa fa-envelope me-2"></i>Email: support@jagowebdev.com</li>
					<li><i class="fas fa-file-signature me-2"></i><a target="_blank" href="https://jagowebdev.com/members/contact">Via Contac form</a></li>
					</ul>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-2">
					<h2 class="widget-title">About</h2>
					<p>Pusat belajar Web Development terbaik, dengan berbagai materi berkualitas</p>
					<ul class="list">
						<li><i class="fab fa-facebook-square me-2"></i><a href="https://web.facebook.com/JagoWebDev" target="_blank">facebook</a></li>
					</ul>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<h2 class="widget-title">More Info</h2>
					<ul class="list">
						<li><i class="fa fa-user-plus me-2"></i><a href="https://jagowebdev.com/members/membership" target="_blank">Premium Member</a></li>
						<li><i class="fas fa-external-link-alt me-2"></i><a href="http://jagowebdev.com/artikel/" target="_blank">Artikel Blog</a></li>
					</ul>
				</div>
			</div>
		</div>
		</div>
		<div class="footer-menu-container">
			<div class="wrapper clearfix">
				<div class="nav-left">Copyright &copy; 2021 <a title="Jagowebdev" href="https://jagowebdev.com">Jagowebdev</a></div>
				<?php
				// MENU - SIDEBAR
				require_once('app/includes/functions.php');
				$menu_db = get_menu_db('Footer');
				$list_menu = menu_list($menu_db);
				?>
				<nav class="nav-right nav-footer">
					<?=build_menu($list_menu, ['class' => 'footer-menu']);?>
				</nav>
			</div>
		</div>
	</footer>
	</div><!-- site-container -->
</body>
</html>