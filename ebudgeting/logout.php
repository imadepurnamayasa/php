<?php 
session_start();
session_destroy();
echo "<script>window.alert('Anda Sukses Logout.');
				window.location='home.mu'</script>";
?>