<?php
	require_once('app/includes/functions.php');
?>
<div class="page-header">
	<div class="wrapper">
		<h1 class="page-title">Error</h1>
		<p class="page-desc">Terjadi kesalahan</p>
	</div>
</div>
<div class="wrapper page-body">
	<div class="post-content">
		<?=show_message($data, null, false);?>
	</div>
</div>