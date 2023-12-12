<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan-pegawai.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

  session_start();
  error_reporting(0);
  include "config/koneksi.php";
  include "config/tanggal.php";
  ?>
<head>
<title>Print - Data Pegawai</title>
<style>
.input1 {
	height: 20px;
	font-size: 12px;
	padding-left: 5px;
	margin: 5px 0px 0px 5px;
	width: 97%;
	border: none;
	color: red;
}
#kiri{
width:50%;
float:left;
}

#kanan{
width:50%;
float:right;
padding-top:20px;
margin-bottom:9px;
}

td { border:1px solid #000; }
th { border:2px solid #000; }
</style>
</head>

<body onload="window.print()">
<?php 
$dtu = mysql_fetch_array(mysql_query("SELECT * FROM rb_data_umum where id_data_umum='$_GET[id]'"));
$aa = mysql_fetch_array(mysql_query("SELECT * FROM rb_pegawai where id_pegawai='$dtu[kpa]'")); 
$b = mysql_fetch_array(mysql_query("SELECT * FROM rb_pegawai where id_pegawai='$dtu[pptk]'")); 

echo "<center><h4>LAPORAN <br> SEMUA DATA PEGAWAI</h4></center><hr>

<table width='100%'>
	  <tr bgcolor='#cecece'>
		<td align='center'>No</td>
		<td align='center'>Nip</td>
		<td align='center'>Nama Lengkap</td>
		<td align='center'>Tempat Lahir</td>
		<td align='center'>Tanggal Lahir</td>
		<td align='center'>Golongan</td>
		<td align='center'>Jabatan</td>
		<td align='center'>Agama</td>
		<td align='center'>File Ijazah</td>
		<td align='center'>No Telpon</td>
		<td align='center'>Alamat Lengkap</td>
		<td align='center'>Keterangan</td>
	  </tr>";
	  
	  $jenis = mysql_query("SELECT * FROM rb_pegawai");
	  $no = 1;
	  while ($r = mysql_fetch_array($jenis)){
	  echo "<tr>
				<td>$no</td>
				<td>$r[nip]</td>
				<td>$r[nama_lengkap]</td>
				<td>$r[tempat_lahir]</td>
				<td>$r[tgl_lahir]</td>
				<td>$r[gol]</td>
				<td>$r[jabatan]</td>
				<td>$r[agama]</td>
				<td>$r[file_ijazah]</td>
				<td>$r[no_telpon]</td>
				<td>$r[alamat_lengkap]</td>
				<td>$r[keterangan]</td>
		   </tr>";
	}	   
echo "</table>";
?>