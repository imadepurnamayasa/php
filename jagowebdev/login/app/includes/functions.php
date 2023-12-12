<?php
/**
* PHP Admin Template
* Author	: Agus Prawoto Hadi
* Website	: https://jagowebdev.com
* Year		: 2021
*/
/* Create breadcrumb
$data: title as key, and url as value */ 

function breadcrumb($data) 
{
	$separator = '&raquo;';
	echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">';
	foreach ($data as $title => $url) {
		if ($url) {
			echo '<li class="breadcrumb-item"><a href="'.$url.'">'.$title.'</a></li>';
		} else {
			echo '<li class="breadcrumb-item active" aria-current="page">'.$title.'</li>';
		}
	}
	echo '
  </ol>
</nav>';
}

function nama_bulan() 
{
	return [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
}

// $date harus yyyy-mm-dd
function format_tanggal($date, $format = 'dd MM yyyy') 
{
	// echo $format;
	
	if ($date == '0000-00-00' || $date == '')
		return $date;
	
	// $format = strtolower($format);
	$exp = explode(' ', $date);
	$date = $exp[0];
	$new_format = $date;
	
	list($year, $month, $date) = explode('-', $date);
	if (strpos($format, 'dd') !== false) {
		$new_format = str_replace('dd', $date, $format);
	}
	
	if (strpos($format, 'MM') !== false) {
		$bulan = nama_bulan();
		$new_format = str_replace('MM', $bulan[ ($month * 1) ], $new_format);
	} else if (strpos($format, 'M') !== false) {
		$new_format = str_replace('M', $month, $new_format);
	}
	
	if (strpos($format, 'yyyy') !== false) {
		$new_format = str_replace('yyyy', $year, $new_format);
	}
	return $new_format;
}

function format_tanggal_db($date) 
{
	if ($date == '0000-00-00' || $date == '')
		return $date;
	
	$bulan = nama_bulan();
	$exp = explode('-', $date);
	return $exp[2] . ' ' . $bulan[ ($exp[1] * 1) ] . ' ' . $exp[0]; // * untuk mengubah 02 menjadi 2
}

function prepare_datadb($data) {
	foreach ($data as $field) {
		$result[$field] = $_POST[$field];
	}
	return $result;
}

// MENU

function tab_menu($group, $set_active = null) {
	global $config;
	$menu_db = get_menu_db($group);
	$list_menu = menu_list($menu_db);
	$current_url = trim(current_url(), '/');
	$menu = '<ul>';
	
	foreach ($list_menu as $val) 
	{
		
		$menu_url = $val['url'];
		if (substr($val['url'], 0, 4) != 'http') {
			$menu_url = $config['base_url'] . $val['url'];
		}
		
		$active = '';
		if ($set_active) {
			if ($val['nama_menu'] == $set_active) {
				$active = ' class="active" ';
			}
		} else {
			$active = trim($menu_url,'/') ==  $current_url ? ' class="active" ' : '';
		}
		$menu .= '<li><a ' . $active . ' href="' . $menu_url . '">' . $val['nama_menu'] . '</a></li>';
	}
	$menu .= '</ul>';
	return $menu;
}
function user_header($title, $sub_title, $menu_group, $set_active = null) {
	echo '
	<div class="page-header bg-abstract-danger">
		<div class="wrapper page-header-user">
			<h1 class="page-title">' . $title . '</h1>
			<p class="page-desc">' . $sub_title  . '</p>
			<div class="page-tabs clearfix">' . tab_menu($menu_group, $set_active) . '</div>
		</div>
	</div>';
}
function get_menu_db ($group = '') 
{
	if (!$group)
		return;
	
	global $db;

	$result = [];
	$sql = 'SELECT * FROM menu_frontend 
			WHERE nama_group = "' . $group . '" ORDER BY urut';
	
	$db->query($sql);
	
	while ($row = $db->fetch()) 
	{
		$result[$row['id_menu']] = $row;
		$result[$row['id_menu']]['highlight'] = 0;
		$result[$row['id_menu']]['depth'] = 0;
		$result[$row['id_menu']]['highlight'] = 0;
	}

	return $result;
}

function menu_list($result)
{
	global $config;
	$refs = array();
	$list = array();

	foreach ($result as $key => &$data)
	{
		if (!$key || empty($data['id_menu'])) // Highlight OR No parent
			continue;
		
		$data['url'] = str_replace('{{BASE_URL}}', $config['base_url'], $data['url']);

		$thisref = &$refs[ $data['id_menu'] ];
		foreach ($data as $field => $value) {
			$thisref[$field] = $value;
		}
		
		// no parent
		if ($data['id_parent'] == 0) {
			
			$list[ $data['id_menu'] ] = &$thisref;
		} else {
			
			$thisref['depth'] = ++$refs[ $data['id_menu']]['depth'];			
			$refs[ $data['id_parent'] ]['children'][ $data['id_menu'] ] = &$thisref;
		}
	}
	set_depth($list);	
	return $list;
}

function set_depth(&$result, $depth = 0) {
	foreach ($result as $key => &$val) 
	{
		$val['depth'] = $depth;
		if (key_exists('children', $val)) {
			set_depth($val['children'], $val['depth'] + 1);
		}
	}
}

function build_menu( $arr, $attr = [], $submenu = false)
{
	global $config;
	
	$add_attr = '';
	if ($attr) {
		$list_attr = [];
		foreach ($attr as $name => $value) {
			$list_attr[] = $name . ' = ' . $value;
		}
		$add_attr = ' ' . join(' ', $list_attr) . ' '; 
	}
	$menu = "\n" . '<ul'.$add_attr . $submenu.'>'."\r\n";

	foreach ($arr as $key => $val) 
	{
		if (!$key)
			continue;
	
		// Check new
		$new = '';
		if (key_exists('new', $val)) {
			$new = $val['new'] == 1 ? '<span class="menu-baru">NEW</span>' : '';
		}
		$arrow = key_exists('children', $val) ? '<span class="menu-arrow-container">
								<i class="fa fa-angle-down arrow"></i>
							</span>' : '';
		$has_child = key_exists('children', $val) ? 'has-children' : '';
		
		if ($has_child) {
			$url = BASE_URL . '#';
			$onClick = ' onclick="javascript:void(0)"';
		} else {
			$onClick = '';
			if (substr($val['url'], 0, 4) == 'http') {
				$url = $val['url'];
			} else {
				$url = str_replace('{{BASE_URL}}', $config['base_url'], $val['url']);
			}
		}
		
		$class_li = ['menu'];
		
		// Class attribute for <a>, children of <li>
		$class_a = ['depth-' . $val['depth']];
		if ($has_child) {
			$class_li[] = 'has-children';
			$class_a[] = 'has-children';
		}
		
		$class_a = ' class="' . join(' ', $class_a) . '"';
		
		// Menu icon
		$menu_icon = '';
		if ($val['class']) {
			$menu_icon = '<i class="menu-icon ' . $val['class'] . '"></i>';
		}
		
		$url = str_replace('{{BASE_URL}}', $config['base_url'], $url);

		// Menu
		$menu .= '<li class="'. join(' ', $class_li) . '">
					<a '.$class_a.' href="'. $url.'"'.$onClick.'>'.
						$menu_icon.
						$val['nama_menu'] .
						$arrow.
					'</a>'.$new;
		
		if (key_exists('children', $val))
		{ 	
			$menu .= build_menu($val['children'], '', ' class="submenu"');
		} 
		$menu .= "</li>\n";
	}
	$menu .= "</ul>\n";
	return $menu;
}

/* -- MENU */

function create_image_mime ($tipe_file, $newfile)
{
	switch ($tipe_file)
	{
		case "image/gif":
			return imagecreatefromgif($newfile);
			
		case "image/png":
			return imagecreatefrompng($newfile);
			
		case "image/bmp":
			return imagecreatefrombmp($newfile);
			
		default:
			return imagecreatefromjpeg($newfile);		
	}
}
	
function create_image ($tipe_file, $resized_img, $newfile)
{
	switch ($tipe_file)
	{
		case "image/gif":
			return imagegif ($resized_img,$newfile, 85);
			
		case "image/png":
			imagesavealpha($resized_img, true);
			$color = imagecolorallocatealpha($resized_img, 0,0,0,127);
			imagefill($resized_img, 0,0, $color);
			return imagepng ($resized_img,$newfile, 9);
			
		case "image/bmp":
			return imagecreatefrombmp($newfile);
			
		default:
			return imagejpeg ($resized_img,$newfile, 85);
			
	}
}

function get_filename($file_name, $path) {
	
	$file_name_path = $path . $file_name;
	if ($file_name != "" && file_exists($file_name_path))
	{
		$file_ext = strrchr($file_name, '.');
		$file_basename = substr($file_name, 0, strripos($file_name, '.'));
		$num = 1;
		while (file_exists($file_name_path)){
			$file_name = $file_basename."($num)".$file_ext;
			$num++;
			$file_name_path = $path . $file_name;
		}
		
		return $file_name;
	}
	return $file_name;
}

function upload_image($path, $file, $max_w = 500, $max_h = 500) 
{
	
	$file_type = $file['type'];
	$new_name =  get_filename(stripslashes($file['name']), $path); ;
	$move = move_uploaded_file($file['tmp_name'], $path . $new_name);
	
	$save_image = false;
	if ($move) {
		$dim = image_dimension($path . $new_name, $max_w, $max_h);
		$save_image = save_image($path . $new_name, $file_type, $dim[0], $dim[1]);
	}
	
	if ($save_image)
		return $new_name;
	else
		return false;
}

function image_dimension($images, $maxw=null, $maxh=null)
{
	if($images)
	{
		$img_size = @getimagesize($images);
		$w = $img_size[0];
		$h = $img_size[1];
		$dim = array('w','h');
		foreach($dim AS $val){
			$max = "max{$val}";
			if(${$val} > ${$max} && ${$max}){
				$alt = ($val == 'w') ? 'h' : 'w';
				$ratio = ${$alt} / ${$val};
				${$val} = ${$max};
				${$alt} = ${$val} * $ratio;
			}
		}
		return array($w,$h);
	}
}

function save_image($image, $file_type, $w, $h) 
{
	$img_size = @getimagesize($image);
	
	$resized_img = imagecreatetruecolor($w,$h);
	$new_img = create_image_mime($file_type, $image);
	imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $w, $h, $img_size[0], $img_size[1]);
	$do = create_image($file_type, $resized_img, $image);
	ImageDestroy ($resized_img);
	ImageDestroy ($new_img);
	return $do;
}

function upload_file($path, $file) 
{
	$new_name =  get_filename(stripslashes($file['name']), $path); ;
	$move = move_uploaded_file($file['tmp_name'], $path . $new_name);
	if ($move) 
		return $new_name;
	else
		return false;
}

function get_dimensi_kartu($ori_panjang, $ori_lebar, $dpi) {
	// print_r($ori_panjang); die;
	$px = 0.393700787; 
	$panjang = $ori_panjang * $dpi * $px;
	$lebar = $ori_lebar * $dpi * $px;
	return ['w' => $panjang, 'h' => $lebar];
}

function generateQRCode($version, $ecc, $text, $module_width) {
	
	require BASE_PATH . 'libraries' . DS . 'vendors' . DS . 'qrcode' . DS . 'qrcode_extended.php';
	$qr = new QRCodeExtended();
	$ecc_code = ['L' => QR_ERROR_CORRECT_LEVEL_L
		, 'M' => QR_ERROR_CORRECT_LEVEL_M
		, 'Q' => QR_ERROR_CORRECT_LEVEL_Q
		, 'H' => QR_ERROR_CORRECT_LEVEL_H
	];
	$qr->setErrorCorrectLevel($ecc_code[$ecc]);
	$qr->setTypeNumber($version);
	$qr->addData($text);
	$qr->make();
	return $qr->saveHtml($module_width);
}

function getrealip() {

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}