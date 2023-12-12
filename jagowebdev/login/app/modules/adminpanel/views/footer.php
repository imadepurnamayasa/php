	</div><!-- cotent-wrapper -->
	</div><!-- cotent -->
	</div><!-- site-content -->
	<footer>
	

				<div class="footer-bar">
					<nav class="nav-left nav-footer">
						<ul><li>&copy; <?=date('Y')?> <a title="Jagowebdev" href="https://jagowebdev.com">Jagowebdev</a></li></ul>
					</nav>
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

	</footer>
</body>
</html>