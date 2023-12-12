<?php 
  session_start();
  error_reporting(0);
  include "config/koneksi.php";
  include "config/tanggal.php";
  ?>
<head>
<title>Print Nota - Anggaran Keuangan</title>
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

echo "<center><h4>FORMAT LAPORAN BULANAN <br> TAHUN ANGGARAN $dtu[tahun]</h4></center><hr>

<table>
	<tr><td bgcolor=#cecece colspan='3'><b>DATA UMUM</b></td></tr>
	<tr><td style='border:none' width='210px'>Laporan sampai dengan</td> 		<td style='border:none'>:</td><td style='border:none'>$dtu[laporan_sampai]</td></tr>
	<tr><td style='border:none'>Nama Program</td> 		  						<td style='border:none'>:</td><td style='border:none'>$dtu[nama_program]</td></tr>
	<tr><td style='border:none'>Nama Kegiatan</td> 		   						<td style='border:none'>:</td><td style='border:none'>$dtu[nama_kegiatan]</td></tr>
	<tr><td style='border:none'>Bidang / Sub Bag/ Seksi</td> 					<td style='border:none'>:</td><td style='border:none'>$dtu[bidang_bagian_seksi]</td></tr>
	<tr><td style='border:none'>KPA</td> 										<td style='border:none'>:</td><td style='border:none'>$aa[nama_lengkap]</td></tr>
	<tr><td style='border:none'>PPTK</td> 										<td style='border:none'>:</td><td style='border:none'>$b[nama_lengkap]</td></tr>
	<tr><td style='border:none'>Pagu Anggaran</td> 								<td style='border:none'>:</td><td style='border:none'>Rp ".format_rupiah($dtu[pagu_anggaran])."</td></tr>
</table><br>

<table width='100%'>
      <tr bgcolor='lightblue'>
        <th align='center' rowspan='3'><div align='center'>No</div></th>
        <th align='center' rowspan='3'><div align='center'>PROGRAM / KEGIATAN / MATA ANGGARAN</div></th>
        <th align='center' rowspan='2' colspan='3'><div align='center'>PAGU ANGGARAN 1 TAHUN</div></th>
		
        <th align='center' colspan='6'><div align='center'>TARGET RENCANA OPERASIONAL SAMPAI DENGAN BULAN INI</div></th>
		<th align='center' colspan='6'><div align='center'>REALISASI SAMPAI DENGAN BULAN INI</div></th>
		<th align='center' rowspan='3'><div align='center'>SISA PAGU</div></th>
		<th align='center' rowspan='3'><div align='center'>KETERANGAN</div></th>
      </tr>
	  
	  <tr  bgcolor='lightblue'>
	    <th align='center' colspan='3'><div align='center'>Fisik</div></th>
        <th align='center' colspan='3'><div align='center'>Keuangan</div></th>
		<th align='center' colspan='3'><div align='center'>Fisik</div></th>
        <th align='center' colspan='3'><div align='center'>Keuangan</div></th>
      </tr> 
	  
       <tr>
	    <th align='center' bgcolor='lightgreen'><div align='center'>Rp.</div></th>
        <th align='center' bgcolor='yellow'><div align='center'>Bobot</div></th>
		<th align='center' bgcolor='red'><div align='center'>Vol</div></th>
		
        <th align='center' bgcolor='lightgreen'><div align='center'>Vol</div></th>
        <th align='center' bgcolor='yellow'><div align='center'>%</div></th>
        <th align='center' bgcolor='red'><div align='center'>TTB</div></th> 
		
		<th align='center' bgcolor='lightgreen'><div align='center'>Rp</div></th>
        <th align='center' bgcolor='yellow'><div align='center'>%</div></th>
        <th align='center' bgcolor='red'><div align='center'>TTB</div></th> 
		
		<th align='center' bgcolor='lightgreen'><div align='center'>Vol</div></th>
        <th align='center' bgcolor='yellow'><div align='center'>%</div></th>
        <th align='center' bgcolor='red'><div align='center'>TTB</div></th> 
		
		<th align='center' bgcolor='lightgreen'><div align='center'>Rp</div></th>
        <th align='center' bgcolor='yellow'><div align='center'>%</div></th>
        <th align='center' bgcolor='red'><div align='center'>TTB</div></th> 
      </tr>
	  <tr>
		<td align='center'>1</td>
		<td align='center'>2</td>
		<td align='center'>3</td>
		<td align='center'>4</td>
		<td align='center'>5</td>
		<td align='center'>6</td>
		<td align='center'>7</td>
		<td align='center'>8</td>
		<td align='center'>9</td>
		<td align='center'>10</td>
		<td align='center'>11</td>
		<td align='center'>12</td>
		<td align='center'>13</td>
		<td align='center'>14</td>
		<td align='center'>15</td>
		<td align='center'>16</td>
		<td align='center'>17</td>
		<td align='center'>18</td>
		<td align='center'>19</td>
	  </tr>";
	  
	  $jenis = mysql_query("SELECT * FROM rb_jenis_belanja");
	  $no = 1;
	  while ($r = mysql_fetch_array($jenis)){
		$tt = mysql_fetch_array(mysql_query("SELECT sum(a.vol) as vol, sum(c.vol_fisik) as voltar, sum(c.persen_fisik) as persentar, sum(c.persen_keuangan) as persenkeuu, sum(d.persen_fisik) as persentarb, sum(d.persen_keuangan) as persenkeuub, sum(d.vol_fisik) as volrea, sum(a.total_rp) as total, sum(a.sisa_pagu) as sisaaa, sum(a.bobot) as bobott, sum(c.rp_keuangan) as uangtar, sum(d.rp_keuangan) as uangrea,
												sum(c.ttb_fisik) as ttbsum, sum(d.ttb_fisik) as ttbfsum, (sum(c.rp_keuangan)/sum(a.total_rp))*100 as persentarkeu, (sum(d.rp_keuangan)/sum(a.total_rp))*100 as persenreakeu
												FROM `rb_anggaran_belanja` a 
													JOIN rb_sub_jenis_belanja b ON a.id_sub_jenis_belanja=b.id_sub_jenis_belanja 
														JOIN rb_detail_target c ON a.id_anggaran_belanja=c.id_anggaran_belanja 
															JOIN rb_detail_realisasi d ON a.id_anggaran_belanja=d.id_anggaran_belanja 
																where b.id_jenis_belanja='$r[id_jenis_belanja]' AND a.id_data_umum='$_GET[id]' AND a.stat='Y'"));
					$tbtarkeu = ($tt[persentarkeu]*$tt[bobott])/100;
					$tbreakeu = ($tt[persenreakeu]*$tt[bobott])/100;

					$voltar = ($tt[voltar]/$tt[vol])*100;
					$volrea = ($tt[volrea]/$tt[vol])*100;
					
					$ttbtar = ($voltar*$tt[bobott])/100;
					$ttbrea = ($volrea*$tt[bobott])/100;
					
					$sisatotpagu = $tt[total] - $tt[uangrea];
					$persentarrt = ($tt[uangrea] / $tt[total])*100;
	  echo "<tr bgcolor=#000>
				<td></td>
				<td style='color:#fff; font-weight:bold'>$r[keterangan]</td>
				<td style='color:#fff;'>".format_rupiah($tt[total])."</td>
				<td style='color:#fff;'>".number_format($tt[bobott],2)."</td>
				<td style='color:#fff;'>$tt[vol]</td>
				<td style='color:#fff;'>$tt[voltar]</td>
				<td style='color:#fff;'>".number_format($tt[persentar],2)."</td>
				<td style='color:#fff;'>".number_format($tt[ttbsum],2)."</td>
				<td style='color:#fff;'>".format_rupiah($tt[uangtar])."</td>
				<td style='color:#fff;'>".number_format($tt[persenkeuu],2)."</td>
				<td style='color:#fff;'>".number_format($tbtarkeu,2)."</td>
				<td style='color:#fff;'>$tt[volrea]</td>
				<td style='color:#fff;'>".number_format($tt[persentarb],2)."</td>
				<td style='color:#fff;'>".number_format($tt[ttbfsum],2)."</td>
				<td style='color:#fff;'>".format_rupiah($tt[uangrea])."</td>
				<td style='color:#fff;'>".number_format($persentarrt,2)."</td>
				<td style='color:#fff;'>".number_format($tbreakeu,2)."</td>
				<td style='color:#fff;'>".format_rupiah($sisatotpagu)."</td>
				<td style='color:#fff;'></td>
		   </tr>";
		   
		$subjenis = mysql_query("SELECT * FROM rb_sub_jenis_belanja where id_jenis_belanja='$r[id_jenis_belanja]'");
		while ($sr = mysql_fetch_array($subjenis)){
			$cek = mysql_num_rows(mysql_query("SELECT * FROM rb_anggaran_belanja where id_sub_jenis_belanja='$sr[id_sub_jenis_belanja]' AND id_data_umum='$_GET[id]' AND stat='Y'"));
			if ($cek >= 1){
			echo "<tr bgcolor=lightblue>
				<td></td>
				<td style='color:blue;'>$sr[keterangan_sub_jenis]</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
		   </tr>";
			}	
				$anggaran = mysql_query("SELECT a.*, d.id_data_umum, d.tahun, b.vol_fisik, b.persen_fisik, b.ttb_fisik, b.rp_keuangan, b.persen_keuangan, b.ttb_keuangan, 
											c.vol_fisik as vol_fisikk, c.persen_fisik as persen_fisikk, c.ttb_fisik as ttb_fisikk, c.rp_keuangan as rp_keuangann, c.persen_keuangan as persen_keuangann, c.ttb_keuangan as  ttb_keuangann	
												FROM rb_anggaran_belanja a
													JOIN rb_detail_target b ON a.id_anggaran_belanja=b.id_anggaran_belanja
														JOIN rb_detail_realisasi c ON a.id_anggaran_belanja=c.id_anggaran_belanja
															JOIN rb_data_umum d ON a.id_data_umum=d.id_data_umum
																where id_sub_jenis_belanja='$sr[id_sub_jenis_belanja]' AND d.id_data_umum='$_GET[id]' AND a.stat='Y'");
				while ($a = mysql_fetch_array($anggaran)){
					echo "<tr bgcolor=#e3e3e3>
						<td></td>
						<td style='padding-left:30px'>$a[keterangan_anggaran]</td>
						<td>".format_rupiah($a[total_rp])."</td>
						<td>$a[bobot]</td>
						<td>$a[vol]</td>
						<td>$a[vol_fisik]</td>
						<td>".number_format($a[persen_fisik],2)."</td>
						<td>".number_format($a[ttb_fisik],2)."</td>
						<td>".format_rupiah($a[rp_keuangan])."</td>
						<td>".number_format($a[persen_keuangan],2)."</td>
						<td>".number_format($a[ttb_keuangan],2)."</td>
						<td>$a[vol_fisikk]</td>
						<td>".number_format($a[persen_fisikk],2)."</td>
						<td>".number_format($a[ttb_fisikk],2)."</td>
						<td>".format_rupiah($a[rp_keuangann])."</td>
						<td>".number_format($a[persen_keuangann],2)."</td>
						<td>".number_format($a[ttb_keuangann],2)."</td>
						<td>".format_rupiah($a[sisa_pagu])."</td>
						<td>$a[keterangan_akhir]</td>
				   </tr>";
				}
		}
		
	  }
	  
	  $to = mysql_fetch_array(mysql_query("SELECT sum(d.persen_fisik) as fisiktot, sum(d.ttb_fisik) as ttbrtot, sum(d.ttb_keuangan) as ttbrtotkeu, sum(d.persen_keuangan) as persenrtotkeu, sum(d.vol_fisik) as voll, sum(c.vol_fisik) as vollt,
	  											  sum(c.persen_fisik) as fisiktottar, sum(c.ttb_fisik) as ttbtottar, sum(c.persen_keuangan) as fisiktottarkeu, sum(c.ttb_keuangan) as ttbtottarkeu, sum(total_rp) as total, sum(bobot) as bobott, sum(c.rp_keuangan) as uangtar, sum(d.rp_keuangan) as uangrea, sum(a.sisa_pagu) as sisapaguu  
												FROM `rb_anggaran_belanja` a JOIN rb_sub_jenis_belanja b ON a.id_sub_jenis_belanja=b.id_sub_jenis_belanja 
													JOIN rb_detail_target c ON a.id_anggaran_belanja=c.id_anggaran_belanja 
														JOIN rb_detail_realisasi d ON a.id_anggaran_belanja=d.id_anggaran_belanja 
															where a.id_data_umum='$_GET[id]' AND a.stat='Y'"));
	 $fisitot = $to[fisiktot]/11;
	 $fisitotart = $to[fisiktottar]/11;
	 $tottarpersen = ($to[uangtar]/$to[total])*100;
	 $totreapersen = ($to[uangrea]/$to[total])*100;
	 $ttbsumtot = $to[ttbtottar];
	 $fisiktottarkeu = ($to[uangrea]/$to[total])*100;
	 echo "<tr bgcolor=#ff6666>
				<td></td>
				<td style='color:#000; text-align:center'>TOTAL</td>
				<td>".format_rupiah($to[total])."</td>
				<td>".number_format($to[bobott],2)."</td>
				<td></td>
				<td>$to[vollt]</td>
				<td>".number_format($to[fisiktottar],2)."</td>
				<td>".number_format($ttbsumtot,2)."</td>
				<td>".format_rupiah($to[uangtar])."</td>
				<td>".number_format($to[fisiktottarkeu],2)."</td>
				<td>".number_format($to[ttbtottarkeu],2)."</td>
				<td>$to[voll]</td>
				<td>".number_format($to[fisiktot],2)."</td>
				<td>".number_format($to[ttbrtot],2)."</td>
				<td>".format_rupiah($to[uangrea])."</td>
				<td>".number_format($fisiktottarkeu,2)."</td>
				<td>".number_format($to[ttbrtotkeu],2)."</td>
				<td>".format_rupiah($to[sisapaguu])."</td>
				<td></td>
		   </tr>";
		   
echo "</table>";

$bulan = getBulan(date('m'));
$tahun = date('Y');
?>
<br>
<table width=100%>
  <tr>
    <td  style='border:none'colspan="2"></td>
    <td  style='border:none'width="286"></td>
  </tr>
  <tr>
    <td style='border:none' width="230" align="center">MENGETAHUI / MENYETUJUI : <br> Kuasa Pengguna Anggaran,</td>
    <td style='border:none'width="530"></td>
    <td style='border:none' align="center">Malang, <?php echo "$bulan $tahun"; ?> <br> Pejabat Pelaksana Teknis Kegiatan</td>
  </tr>
  <tr>
    <td style='border:none' align="center"><br /><br /><br />
      <?php echo "$aa[nama_lengkap]"; ?><br />
    NIP : <?php echo "$aa[nip]"; ?><br /><br /></td>
    <td style='border:none'>&nbsp;</td>
    <td style='border:none' align="center" valign="top"><br /><br /><br />
      <?php echo "$b[nama_lengkap]"; ?><br />
    NIP : <?php echo "$b[nip]"; ?><br />
    </td>
  </tr>
  <tr>
    <td style='border:none' colspan="2">&nbsp;</td>
    <td style='border:none'>&nbsp;</td>
  </tr>
</table>