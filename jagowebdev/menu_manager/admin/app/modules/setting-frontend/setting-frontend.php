<?php
/**
* PHP Admin Template
* Author	: Agus Prawoto Hadi
* Website	: https://jagowebdev.com
* Year		: 2021
*/


$js[] = BASE_URL . 'public/vendors/jquery.select2/js/select2.full.min.js';
$js[] = BASE_URL . 'public/vendors/jquery.select2/js/select2.bootstrap.js';
$js[] = BASE_URL . 'public/themes/modern/js/survey-setting.js';	
$styles[] = BASE_URL . 'public/vendors/jquery.select2/css/select2.min.css';
$styles[] = BASE_URL . 'public/vendors/jquery.select2/css/select2-bootstrap4.min.css';

switch ($_GET['action']) 
{
    default: 
        action_notfound();
    
    	// INDEX 
    case 'index':

        $sql = 'SELECT * FROM survey_setting' . where_own();
		$query = $db->query($sql)->getResultArray();
		foreach ($query as $val) {
			$config_survey[$val['param']] = $val['value'];
		}
		
		$message = [];
        if (!empty($_POST['submit'])) {
			foreach ($config_survey as $param => $value) {
				$db->update('survey_setting', ['value' => @$_POST[$param]], ['param' => $param]);
			}
			$message = ['status' => 'ok', 'message' => 'Data berhasil disimpan'];
        }
		
		// Timezone
		$regions = array(
			// 'Africa' => DateTimeZone::AFRICA,
			// 'America' => DateTimeZone::AMERICA,
			// 'Antarctica' => DateTimeZone::ANTARCTICA,
			'Asia' => DateTimeZone::ASIA,
			// 'Atlantic' => DateTimeZone::ATLANTIC,
			// 'Europe' => DateTimeZone::EUROPE,
			// 'Indian' => DateTimeZone::INDIAN,
			// 'Pacific' => DateTimeZone::PACIFIC
		);

		$timezones = array();
		$zero_gmt = new DateTime('now', new DateTimeZone('Africa/Abidjan'));
		foreach ($regions as $name => $mask)
		{
			$zones = DateTimeZone::listIdentifiers($mask);
			foreach($zones as $timezone)
			{
				$compared_gmt = new DateTime('now', new DateTimeZone($timezone));
				$start = $zero_gmt->getOffset() / 3600;
				$current = $compared_gmt->getOffset() / 3600;
				$diff =  $current - $start;
				
				if ($diff >= 0) {
					$diff = '+'.$diff;
				}
				$timezones[$name][$timezone] = $timezone . ' (GMT' . $diff.')';
			}
		}
		
		// echo '<pre>'; print_r($timezones);

        $data['title'] = 'Survey Setting';
        $data['timezones'] = $timezones;
        $data['config_survey'] = $config_survey;
        $data['message'] = $message;

        if (!$data['config_survey'])
            data_notfound();

        load_view('views/form.php', $data);
}

function validate_form() {
    $error = false;
    if (empty(trim($_POST['judul']))) {
        $error[] = 'Judul survey harus diisi';
    }

    if (empty(trim($_POST['deskripsi']))) {
        $error[] = 'Deskripsi survey harus diisi';
    }

    return $error;
}

function save_data() 
{
    global $db;
    $message = [];
    $id_survey = '';
    if (!empty($_POST['submit'])) {
        $error = validate_form();
        if ($error) {
            $message['status'] = 'error';
            $message['message'] = $error;
        } else {
            $data_db['judul'] = $_POST['judul'];
            $data_db['deskripsi'] = $_POST['deskripsi'];
            $data_db['aktif'] = $_POST['aktif'];
            $data_db['using_periode'] = $_POST['using_periode'];
			
			if ($_POST['using_periode'] == 'Y') {
				list($d, $m, $y) = explode('-', $_POST['start_date']);
				$data_db['start_date'] = $y . '-'. $m . '-' . $d;
				
				list($d, $m, $y) = explode('-', $_POST['end_date']);
				$data_db['end_date'] = $y . '-'. $m . '-' . $d;	
			} else {
				$data_db['start_date'] = $data_db['end_date'] = '0000-00-00';
			}
			
            if (!empty($_POST['id'])) {
				$data_db['id_user_update'] = $_SESSION['user']['id_user'];
				$data_db['tgl_update'] = date('Y-m-d');
                $query = $db->update('survey', $data_db, ['id_survey' => $_POST['id']]);
                $id_survey = $_POST['id'];
            } else {
				$data_db['id_user_input'] = $_SESSION['user']['id_user'];
                $query = $db->insert('survey', $data_db);
                $id_survey = $db->lastInsertId();
            }
            
            if ($query) {
                $message['status'] = 'ok';
                $message['message'] = 'Data berhasil disimpan';
            } else {
                $message['status'] = 'error';
                $message['message'] = 'Data gagal disimpan';
            }
        }
    }
    return ['message' => $message, 'id_survey' => $id_survey];
}