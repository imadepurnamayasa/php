<?php 
	if (isset($_POST[login])){
		$userlogin = $_POST[user];
		$passlgoin = md5($_POST[pass]);
		
		$login = mysql_query("SELECT * FROM rb_user 
					where username='$userlogin' AND password='$passlgoin'");
		$cek = mysql_num_rows($login);
		$r = mysql_fetch_assoc($login);
		if ($cek >= 1){
			$_SESSION[id_user] 		= $r[id_user];
			$_SESSION[username] 	= $r[username];
			$_SESSION[nama_lengkap] = $r[nama_lengkap];
			$_SESSION[level] 		= $r[level];
			
			echo "<script>window.alert('Anda Sukses Login.');
				window.location='index.php'</script>";
		}else{
			echo "<div class='alert alert-block'>
					<button type='button' class='close' data-dismiss='alert'>x</button>
					<h4>Terjadi Kesalahan!</h4>
						Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.	
				  </div>";
		}
	}
?>