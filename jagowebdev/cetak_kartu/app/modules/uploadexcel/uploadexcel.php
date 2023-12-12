<?php
/**
*	Aplikasi Cetak Kartu
*	Website	: https://jagowebdev.com
* 	Author	: Agus Prawoto Hadi
*	Year	: 2022
*/

use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;

$data['title'] = 'Upload Excel';
$data['tabel'] = ['mahasiswa' => ['file_excel' => ['url' => BASE_URL . 'public/files/Format Data Mahasiswa.xlsx'
													, 'title' => 'Download File Excel Format Data Mahasiswa'
													, 'display' => 'Format Data Mahasiswa.xlsx'
												  ]
								  , 'display' => 'Mahasiswa'
								]
				];

$js[] = BASE_URL . 'public/themes/modern/js/uploadexcel.js';
$js[] = ['print' => true, 'script' => 'var tabel = ' . json_encode($data['tabel'])];
				
foreach ($data['tabel'] as $key => $val) {
	$data['tabel_options'][$key] = $val['display'];
}				

helper('format');		

switch ($_GET['action']) 
{
	default: 
		action_notfound();
		
	// INDEX 
	case 'index':
		
		if (isset($_POST['submit'])) 
		{
			$path = BASEPATH . 'public/tmp/';
			$form_errors = validate_form();
			
			if ($form_errors) {
				$data['msg']['status'] = 'error';
				$data['msg']['content'] = $form_errors;
			} else {

				$filename = upload_file($path, $_FILES['file_excel']);
				
				require_once 'app/libraries/vendors/OpenSpout/src/Autoloader/autoload.php';
				$reader = ReaderEntityFactory::createReaderFromFile($path . $filename);
				$reader->open($path . $filename);

				foreach ($reader->getSheetIterator() as $sheet) 
				{
					$total_row = 0;
					foreach ($sheet->getRowIterator() as $num_row => $row) 
					{
						$cols = $row->toArray();
						
						if ($num_row == 1) {
							$field_table = $cols;
							$field_name = array_map('strtolower', $field_table);
							continue;
						}
						
						$data_value = [];
						foreach ($cols as $num_col => $val) 
						{
							if ($val instanceof DateTime) {
								$val = $val->format('Y-m-d H:i:s');
							}
							
							$data_value[$field_name[$num_col]] = $val;
						}
						$data_db[] = $data_value;
						
						$total_row += 1;
						
						if ($num_row % 2000 == 0) {
							$query = $db->insertBatch($_POST['nama_tabel'], $data_db);
							$data_db = [];
						}
					}
					
					if ($data_db) {
						$query = $db->insertBatch($_POST['nama_tabel'], $data_db);
					}
				}
				
				$reader->close();
				delete_file ($path . $filename);
				
				if ($query) {
					$data['msg']['status'] = 'ok';
					$data['msg']['content'] = 'Data berhasil di masukkan ke dalam tabel <strong>' . $_POST['nama_tabel'] . '</strong> sebanyak ' . format_ribuan($total_row) . ' baris';
				}
				
			}
		}
				
		load_view('views/form.php', $data);
}

function validate_form() {
	
	$form_errors = [];
	if ($_FILES['file_excel']['name']) 
	{
		$file_type = $_FILES['file_excel']['type'];
		$allowed = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
		
		if (!in_array($file_type, $allowed)) {
			$form_errors['file_excel'] = 'Tipe file harus ' . join(', ', $allowed);
		}
	} else {
		$form_errors['file_excel'] = 'File excel belum dipilih';
	}
	
	return $form_errors;
}