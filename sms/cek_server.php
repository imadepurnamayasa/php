<?php
include "config/koneksi.php";
include "function.php";
cekinbox();
$url = ""; // Domasin Disini
$kodeapi = "123456789";
// baca data XML SMS antrian 
$xml = simplexml_load_file($url."/sms_api.php?op=get&code=".$kodeapi);
foreach ($xml as $dataxml){
	$id = $dataxml->id;
	$nohp = $dataxml->nohp;
	$pesan = $dataxml->pesan;
	// data SMS yang dibaca, lalu dikirim melalui gammu
	sendsms($nohp, $pesan, '');
	// setelah SMS dikirim, data SMS dalam antrian yang ada di server hosting dihapus
	$xml2 = simplexml_load_file($url."/sms_api.php?op=del&id=".$id."&code=".$kodeapi);
}


// membaca sms yg ada di inbox
$query = "SELECT * FROM inbox WHERE Processed = 'false'"; 
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil)){
	// baca nomor hp pengirim
	$noHP = $data['SenderNumber'];
	// baca isi sms
	$sms = strtoupper($data['TextDecoded']);
	// baca id sms
	$smsID = $data['ID'];
    // proses parsing berdasarkan karakter # 
	$split = explode("#", $sms);
	// baca keyword
	$command = $split[0];
  
if ($command == "INFO"){
		// jika keyword terdepannya INFO
		if (count($split) == 2){
			// jika jumlah parameternya 2
			// baca keywordnya
			$keyword = $split[1];
			
			// lakukan koneksi ke database lain
			// mysql_connect('...', '...', '...');
			// mysql_select_db('...');
			include 'config/koneksi.php';
			
			// cari balasan berdasarkan keywordnya
			$query2 = "SELECT reply FROM autoreply WHERE keyword = '$keyword'";
			$hasil2 = mysql_query($query2);
			
			if (mysql_num_rows($hasil2) > 0){
			    // jika ada keyword yang cocok, baca data balasannya
				$data2 = mysql_fetch_array($hasil2);
				$reply = $data2['reply'];
			}
			// jika tidak ada keyword yg cocok, kirim pesan balasan
			else $reply = "Maaf keyword tidak ditemukan";
		}
		// jika jumlah parameternya tidak 2
		else $reply = "Maaf format INFO salah";
		
		// lakukan kembali koneksi ke database gammu
		include 'config/koneksi.php';
		// kirim sms balasan
		sendsms($noHP, $reply, '');


}elseif ($command == "REG"){ // Untuk SMS Polling
		// jika keyword terdepannya REG
		if (count($split) == 2){
			// jika jumlah parameternya 2
			// baca keywordnya
			$keyword = $split[1];
			
			// lakukan koneksi ke database lain
			// mysql_connect('...', '...', '...');
			// mysql_select_db('...');
			include 'config/koneksi.php';
			
			// cari balasan dan update record berdasarkan keywordnya

			$query2 = "SELECT pilihan FROM polling WHERE keyword = '$keyword'";
					  mysql_query("UPDATE polling SET total=total+1 WHERE keyword = '$keyword'");
			$hasil2 = mysql_query($query2);
			
			if (mysql_num_rows($hasil2) > 0){
			    // jika ada keyword yang cocok, baca data balasannya
				$data2 = mysql_fetch_array($hasil2);
				$reply = "Sukses Memberikan Pilihan Polling Untuk $data2[pilihan]";
			}
			// jika tidak ada keyword yg cocok, kirim pesan balasan
			else $reply = "Maaf keyword tidak ditemukan";
		}
		// jika jumlah parameternya tidak 2
		else $reply = "Maaf format REG Polling salah";
		
		// lakukan kembali koneksi ke database gammu
		include 'config/koneksi.php';
		// kirim sms balasan
		sendsms($noHP, $reply, '');
}
  
	// tandai sms yang sudah diproses
	$query2 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$smsID'";
	mysql_query($query2);
}

?>