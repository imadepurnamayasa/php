<?php
function build_menu_list( $arr)
{
	$container = "\n" . '<ol class="dd-list">'."\r\n";
	$menu = '';
	
	foreach ($arr as $key => $val) 
	{
		// Check new
		$new = @$val['new'] == 1 ? '<span class="menu-baru">NEW</span>' : '';
		$icon = '';
		if (!empty($val['class'])) {
			$icon = '<i class="'.$val['class'].'"></i>';
		}
		
		$menu .= '<li class="dd-item" data-id="'.$val['id_menu'].'"><div class="dd-handle">'.$icon.'<span class="menu-title">'.$val['nama_menu'].'</span></div>';
		
		if (key_exists('children', $val))
		{ 	
			$menu .= build_menu_list($val['children'], ' class="submenu"');
		}
		$menu .= "</li>\n";
	}

	if ($menu) {
		$menu = $container . $menu . "</ol>\n";
	}
	return $menu;
}

// Update group
function allChild($id, $list, &$result = []) 
{
	if (!key_exists($id, $list)) {
		return $result;
	}
	
	$result[$id] = $id;
	foreach ($list[$id] as $val) 
	{
		// echo '<pre>'; print_r($val);
		
		$result[$val] = $val;
		if (key_exists($val, $list)) {
			allChild($val, $list, $result);
		}
	}
	return $result;
}

function build_child($arr, $parent=0, &$list=[]) 
{
	foreach ($arr as $key => $val) 
	{
		$list[$parent][] = $val['id'];
		if (key_exists('children', $val))
		{ 	
			build_child($val['children'], $val['id'], $list);
		}
	}
	
	
	return $list;
}