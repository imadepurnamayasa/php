<div class="page-header">
	<div class="wrapper">
		<h1 class="page-title"><?=$title?></h1>
		<p class="page-desc"><?=$sub_title?></p>
	</div>
</div>
<?php 
$alert_type = $message['status'] == 'error' ? 'danger' : 'success';
$message_title = $message['status'] == 'error' ? 'Error...' : 'Success...';

if (empty($title_header)) {
	$title_header = '';
} else {
	$title_header = '<div class="register-header">
	<h1>' . $title_header . '</h1/>
	</div>';
}
?>
<div class="wrapper page-body">
	<div class="login-form has-border">
		<div class="alert alert-last alert-<?=$alert_type?>">
			<h4><?=$message_title?></h4>
			<?=$message['message']?>
		</div>
	</div>
</div>