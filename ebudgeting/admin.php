<?php 
	$pg = mysql_fetch_array(mysql_query("SELECT * FROM rb_page where id_page='1'"));
	$isi = nl2br($pg[isi]);
?>
<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#"><?php echo "$pg[judul]"; ?></a>
		  <?php if ($_SESSION[level]=='admin'){ ?>
		  <div class="nav-collapse pull-right">
			<ul class="nav">
			  <li><a href="index.php?page=editpage&id=1" class="small-box"><i class="icon-edit icon-white"></i> Edit Data</a></li>
			</ul>
		  </div>
		  <?php } ?>

		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	
<section>
<?php echo "$isi"; ?>
</section>