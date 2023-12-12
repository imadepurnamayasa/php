<?php
/**
*	Aplikasi Cetak Kartu
*	Developed by: Agus Prawoto Hadi
*	Website		: www.jagowebdev.com
*	Year		: 2021
*/

$js[] = BASE_URL . 'public/vendors/datatables/dist/js/jquery.dataTables.min.js';
$js[] = BASE_URL . 'public/vendors/datatables/dist/js/dataTables.bootstrap5.min.js';
$styles[] = BASE_URL . 'public/vendors/datatables/dist/css/dataTables.bootstrap5.min.css';
// $js[] = BASE_URL . 'public/themes/modern/js/data-tables-ajax.js';
$js[] = BASE_URL . 'public/themes/modern/js/cetakkartu.js';

$site_title = 'Data Tables';

switch ($_GET['action']) 
{
	default: 
		action_notfound();
		
	// INDEX 
	case 'index':
			
		$sql = 'SELECT * FROM mahasiswa';
		$data['result'] = $db->query($sql)->getResultArray();
		
		if (!$data['result']) {
			$data['msg']['status'] = 'error';
			$data['msg']['content'] = 'Data tidak ditemukan';
		}
		
		load_view('views/result.php', $data);
	
	case 'pdf':
	
		$data = set_data();

		$sql = 'SELECT * FROM mahasiswa WHERE id_mahasiswa = ?';
		$result = $db->query($sql, $_GET['id'])->getRowArray();
		$data['nama'] = $result;
		extract($data);

		require_once BASEPATH . 'app/libraries/vendors/mpdf/autoload.php';

		$mpdf = new \Mpdf\Mpdf();

		$html = '
		<style>
		body {
			font-size: 10px;
			font-family:arial;
		}

		td {
			padding:0;
			padding-right: 5px;
			padding-bottom: 0;
		}

		label {width: 200px; display: block}
		</style>

		<div class="container" style="margin-top:-155px;margin-left:85px">
			<table cellspacing="0" cellpadding="0" style="width:230px">
				<tr style="height: 5px;">
					<td>Nama</td>
					<td>:</td>
					<td>' . $nama['nama'] . '</td>
				</tr>
				<tr>
					<td style="vertical-align:top">TTL</td>
					<td style="vertical-align:top">:</td>
					<td>' . $nama['tempat_lahir']. ', ' . format_tanggal($nama['tgl_lahir']) . '</td>
				</tr>
				<tr>
					<td style="vertical-align:top">NPM</td>
					<td style="vertical-align:top">:</td>
					<td>' . $nama['npm'] . '</td>
				</tr>
				<tr>
					<td style="vertical-align:top">Prodi</td>
					<td style="vertical-align:top">:</td>
					<td>' . $nama['prodi'] . '</td>
				</tr>
				<tr>
					<td style="vertical-align:top">Fakultas</td>
					<td style="vertical-align:top">:</td>
					<td>' . $nama['fakultas'] . '</td>
				</tr>
				<tr>
					<td style="vertical-align:top">Alamat</td>
					<td style="vertical-align:top">:</td>
					<td>' . $nama['alamat'] . '</td>
				</tr>
				
			</table>
		</div>';

		$html_tandatangan = '
		<style>
		body {
			font-size: 10px;
			font-family:arial;
		}

		.tanggal {
			text-align:center;
			margin-left: -190px;
			margin-top: 5px;
			line-height: 11px;
		}

		</style>

		<div class="tanggal">
		' . $ttd['kota_tandatangan'] . ', ' . format_tanggal($ttd['tgl_tandatangan']) . '<br/>
		Rektor,
		<br/>
		<br/>
		<br/>
		' . $ttd['nama_tandatangan'] . 
		'<br/>
		NIP. ' . $data['ttd']['nip_tandatangan'] .
		'</div>';
		
		$html_masaberlaku = '
		<style>
		.masa-berlaku {
			margin-left: 10px;
			margin-top: -20px;
		}
		</style>
		<div class="masa-berlaku">';
			if ($layout['berlaku_jenis'] == 'periode') {
				$html_masaberlaku .= 'Berlaku s.d ' . format_tanggal(date('Y-m-d', strtotime(date('Y-m-d', strtotime($ttd['tgl_tandatangan']. '+4 years')))));
			} else {
				$html_masaberlaku .= $layout['berlaku_custom_text'];
			}	
		
		
		$html_masaberlaku .= '</div>';
		

		$mpdf->addPage();
		$x = 10;
		$y = 15;
		
		if ($nama['qrcode_text']) {
			$qrcode_text = $nama['qrcode_text'];
		} else {
			if ($qrcode['content_jenis'] == 'field_database') {
				$qrcode_text = $nama[$qrcode['content_field_database']] ;
			} else {
				$qrcode_text = $qrcode['content_global_text'];
			}
		}

		$qrcode_image = generateQRCode($qrcode['version'], $qrcode['ecc'], $qrcode_text, $qrcode['size_module'], 'image');
		$mpdf->Image('public/images/kartu/' . $layout['background_depan'] , $x, $y, 90, 0, 'png');
		$mpdf->Image('public/images/kartu/' . $layout['background_belakang'], $x + 90 + 10, $y, 90, 0, 'png');
		$mpdf->WriteHTML($html);
		$mpdf->WriteHTML($html_tandatangan);
		$mpdf->WriteHTML($html_masaberlaku);
		
		if (!empty($nama['foto']) && file_exists('public/images/foto/' . $nama['foto'])) {
			$mpdf->Image('public/images/foto/' . $nama['foto'], $x + 5.3, $y + 16.4 , 20, 0, 'jpg');
		}
		$mpdf->Image('public/images/kartu/' . $ttd['file_tandatangan'], $x + 57, $y + 37, 18.5, 0, 'png');
		$mpdf->Image('public/images/kartu/'. $ttd['file_cap_tandatangan'], $x + 45, $y + 35, 18.5, 0, 'png');
		$mpdf->Image($qrcode_image, $x + 90 + 10 + 70, $y + 33, 15, 0, 'png');
		$mpdf->debug = true;
		$mpdf->showImageErrors = true;
		unlink($qrcode_image);

		if (!empty($_POST['email'])) 
		{
			$filename = 'public/tmp/kartu_'. time() . '.pdf';
			$mpdf->Output($filename,'F');
			
			require_once 'app/config/email.php';
			$email_config = new EmailConfig;
			$email_data = array('from_email' => $email_config->from
							, 'from_title' => 'Aplikasi Kartu Elektronik'
							, 'to_email' => $_POST['email']
							, 'to_name' => $nama['nama']
							, 'email_subject' => 'Permintaan Kartu Elektronik'
							, 'email_content' => '<h1>KARTU ELEKTRONIK</h1><h2>Hi. ' . $nama['nama'] . '</h2><p>Berikut kami sertakan kartu elektronik atas nama Anda. Anda dapat mengunduhnya pada bagian Attachment.<br/><br/><p>Salam</p>'
							, 'attachment' => ['path' => $filename, 'name' => 'Kartu Elektronik.pdf']
			);
			
			require_once('app/libraries/PhpmailerLib.php');

			$phpmailer = new \App\Libraries\PhpmailerLib;
			$phpmailer->init();
			$phpmailer->setProvider($email_config->provider);
			$send_email =  $phpmailer->send($email_data);

			unlink($filename);
			if ($send_email['status'] == 'ok') {
				$message['status'] = 'ok';
				$message['message'] = 'Kartu elektronik berhasil dikirim ke alamat email: ' . $_POST['email'];
			} else {
				$message['status'] = 'error';
				$message['message'] = 'Kartu elektronik gagal dikirim ke alamat email: ' . $_POST['email'] . '<br/>Error: ' . $send_email['message'];
			}
			echo json_encode($message);
			exit();
		}
		// $mpdf->Output();
		$mpdf->Output('Kartu Elektronik.pdf', 'D');

		exit();
	
	case 'print':
		
			$data = set_data();
			
			$data['id'] = $_GET['id'];
			foreach ($data['id'] as $key => $val) {
				$sql = 'SELECT * FROM mahasiswa WHERE id_mahasiswa = ?';
				$result = $db->query($sql, trim($val))->result();
				$data['nama'][$val]	= $result[0];
			}
			
			$view = load_view('views/cetak.php', $data, true);
			echo $view;
		die;

	case 'getDataDT':

		$result['draw'] = $start = $_POST['draw'] ?: 1;
		
		$data_table = getListData();
		$result['recordsTotal'] = $data_table['total_data'];
		$result['recordsFiltered'] = $data_table['total_filtered'];
				
		helper('html');
		$id_user = $_SESSION['user']['id_user'];
		
		foreach ($data_table['content'] as $key => &$val) 
		{
			$foto = 'Anonymous.png';
			if ($val['foto']) {
				if (file_exists('public/images/foto/' . $val['foto'])) {
					$foto = $val['foto'];
				} else {
					$foto = 'noimage.png';
				}
			}
			
			$val['foto'] = '<div class="list-foto"><img src="'. BASE_URL.'public/images/foto/' . $foto . '"/></div>';
			
			$val['tgl_lahir'] = $val['tempat_lahir'] . ', '. format_tanggal($val['tgl_lahir']);
			$val['ignore_search_checkall'] = '<div class="form-check"><input type="checkbox" class="form-check-input checkbox" name="id[]" value="' . $val['id_mahasiswa'] . '">';
			
			$val['ignore_search_action'] = btn_action([
												'pdf' => ['url' => '?action=pdf&id='. $val['id_mahasiswa']
													, 'btn_class' => 'btn-danger me-1'
													, 'icon' => 'fas fa-file-pdf'
													, 'text' => 'PDF'
												],
												'print' => ['url' => '?action=print&id[]='. $val['id_mahasiswa']
																, 'btn_class' => 'btn-success'
																, 'icon' => 'fa fa-print'
																, 'text' => 'Cetak'
																, 'attr' => ['target' => '_blank']
												],
												'Email' => ['url' => '#'
																, 'btn_class' => 'btn-primary me-1 kirim-email'
																, 'icon' => 'fas fa-paper-plane'
																, 'text' => 'Email'
																, 'attr' => ['data-id' => $val['id_mahasiswa'], 'data-email' => $val['email'], 'target' => '_blank']
												]
										
											]);
		}
					
		$result['data'] = $data_table['content'];
		echo json_encode($result); exit();
}

function getListData() {
	
	global $db;
	$columns = $_POST['columns'];
	$order_by = '';
	
	// Search
	$search_all = @$_POST['search']['value'];
	$where = where_own();
	if ($search_all) {
		// Additional Search
		$columns[]['data'] = 'tempat_lahir';

		foreach ($columns as $val) {
			
			if (strpos($val['data'], 'ignore_search') !== false) 
				continue;
			
			if (strpos($val['data'], 'ignore') !== false)
				continue;
			
			$where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
		}
		 $where .= ' AND (' . join(' OR ', $where_col) . ') ';
	}
	
	// Order
	$order = $_POST['order'];
	
	if (@$order[0]['column'] != '' ) {
		$order_by = ' ORDER BY ' . $columns[$order[0]['column']]['data'] . ' ' . strtoupper($order[0]['dir']);
	}

	$start = $_POST['start'] ?: 0;
	$length = $_POST['length'] ?: 10;
	
	// Query Total
	$sql = 'SELECT COUNT(*) AS jml_data FROM mahasiswa' . where_own();
	$query = $db->query($sql)->getRowArray();
	$total_data = $query['jml_data'];
	
	// Query Filtered
	$sql = 'SELECT COUNT(*) AS jml_data FROM mahasiswa' . $where;
	$query = $db->query($sql)->getRowArray();
	$total_filtered = $query['jml_data'];
	
	// Query Data
	$sql = 'SELECT * FROM mahasiswa 
			' . $where . $order_by . ' LIMIT ' . $start . ', ' . $length;
	$content = $db->query($sql)->getResultArray();
	
	return ['total_data' => $total_data, 'total_filtered' => $total_filtered, 'content' => $content];
}

function set_data() {
	global $setting_web, $current_module, $db;

	$data['setting_web'] = $setting_web;
	$data['app_module'] = $current_module;

	$sql = 'SELECT * FROM layout_kartu WHERE gunakan = 1';
	$result = $db->query($sql)->row();
	$data['layout']	= $result;

	$sql = 'SELECT * FROM setting_qrcode';
	$result = $db->query($sql)->row();
	$data['qrcode']	= $result;
	
	$sql = 'SELECT * FROM setting_printer WHERE gunakan = 1';
	$result = $db->query($sql)->row();
	$data['printer']	= $result;
	
	$sql = 'SELECT * FROM tandatangan WHERE gunakan = 1';
	$result = $db->query($sql)->row();
	$data['ttd']	= $result;

	return $data;
}