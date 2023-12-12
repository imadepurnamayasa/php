<?php
/**
Functions
https://webdev.id
*/
function is_multi($array) {
	foreach ($array as $val) {
		if (is_array($val))
			return true;
		
		return false;
	}
}

function generate_options($data, $selected) {
	
	$result = '';
	foreach($data as $key => $value) 
	{
		if (!is_array($value)) {
			$str_value = $value;
			$value = [];
			$value['label'] = $str_value;
		}
		
		$class = !empty($value['class']) ? ' class="' . $value['class'] . '" ' : '';
		
		$option_selected = '';
		if ($selected) {
			if ( empty($_REQUEST[$selected[0]]) ) {
				if (in_array( $key, $selected)) {
					$option_selected = true;
				}
			} else {
				if ($key == $_REQUEST[$selected[0]]) {
					$option_selected = true;
				}
			}
		}
		
		if ($option_selected) {
			$option_selected = ' selected';
		}
		
		$result .= '<option value="'.$key.'"'. $class . $option_selected.'>'.$value['label'].'</option>';
	}
	
	return $result;
}

// options(['name' => 'gender'], ['M' => 'Male', 'F' => 'Female'], ['input_field', 'default'])
/* options(['name' => 'gender'], 
			['M' => 'label' => 'Male', 'class' => 'male',
			['F' => 'label' => 'Female]
		)
		
	// Optgroup
	$validation_criteria = ['Karakter' => [
											'only' => 'Hanya'
											, 'contain' => 'Mengandung'
											, 'notcontain' => 'Tidak Mengandung'
											, 'email' => 'Email'
											, 'url' => 'URL'
											, 'length' => 'Jumlah Karakter'
										],
									'Angka' => [
										 'min_value' => 'Nilai Minimal'
										, 'max_value' => 'Nilai Maksimal'
									]
							];
	options(['name' => 'validation_criteria'
				,'class' => 'validation-criteria mt-1'
			]
			, $validation_criteria
			, []
			, true
		);
*/
function options($attr, $data, $selected = false, $is_multi = false, $print = false) 
{
	if (empty($attr['class'])) {
		$attr['class'] = 'form-control';
	} else {
		$attr['class'] = $attr['class'] . ' form-control';
	}
	
	foreach ($attr as $key => $val) {
		$attribute[] = $key . '="' . $val . '"'; 
	}
	$attribute = join(' ', $attribute);
	
	if ($selected) {
		if (!is_array($selected)) {
			$selected = [$selected];
		}
	}
	
	$result = '
	<select '. $attribute .'>';
	
	//Is Multidimensional
	if ($is_multi) {
		foreach ($data as $label => $options) {
			$result .= '<optgroup label="' . $label . '">' . generate_options($options, $selected) . '</optgroup>';
		}
	} else {
		$result .= generate_options($data, $selected);
	}
	
	$result .= '</select>';
	
	if ($print) {
		echo $result;
	} else {
		return $result;
	}
	
	
}

function radio($data, $checked = '') 
{
	if (!is_array($data)) {
		$data[] = ['name' => $data, 'id' => $data];
	}
	
	$result = '';
	foreach ($data as $key => $val) 
	{
		$list_attr = ['id', 'name', 'value', 'required'];
		$options_attr = [];
		foreach ($val as $attr_name => $attr_value) {
			if (in_array($attr_name, $list_attr)) {
				if ($attr_value) {
					$options_attr[] = $attr_name . '="' . $attr_value . '"';
				} else {
					$options_attr[] = $attr_name;
				}
			}
		}
		$attr_checked = $checked && $val['value'] == $checked ? ' checked' : '';
		
		$attr_class = !empty($val['class']) ? $val['class'] : '';
		$parent_class = !empty($val['parent_class']) ? $val['parent_class'] : '';
		
		$result .= '
		<div class="form-check '.$parent_class.'">
		  <input class="form-check-input ' . $attr_class . '" type="radio" ' . join(' ', $options_attr) . $attr_checked .'>
		  <label class="form-check-label" for="'.$val['id'].'">
			' . $val['label'] . '
		  </label>
		</div>';
	}
	
	return $result;
}

function checkbox($data, $checked = []) 
{
	if (!is_array($data)) {
		$data[] = ['name' => $data, 'id' => $data];
	}

	$result= '';
	foreach ($data as $key => $val) 
	{
		if (!key_exists('value', $val)) $val['value'] = '';
		$attr_checked = $checked && in_array($val['attr_checkbox']['name'], $checked) ? ' checked' : '';
		$parent_class = !empty($val['parent_class']) ? $val['parent_class'] : '';
		
		$attr_checkbox = [];
		foreach ($val['attr_checkbox'] as $attr_name => $attr_value) {
			if ($attr_name == 'class') {
				$attr_value = 'form-check-input ' . $attr_value;
			}
			$attr_checkbox[] = $attr_name . '="' . $attr_value . '"';
		}
			
		$result .= '
		<div class="form-check ' . $parent_class . '">
			<input type="checkbox" '. join(' ', $attr_checkbox) . $attr_checked.' >
			<label class="form-check-label" for="'.$val['attr_checkbox']['id'].'">' . $val['label'] . '</label>
		</div>';
	}
	return $result;
}

function btn_submit($data = []) {
	$html = $attr = '';
	// echo '<pre>'; print_r($data);
	foreach ($data as $key => $val) {
		if (key_exists('attr', $val)) {
			foreach($val['attr'] as $key_attr => $val_attr) {
				$attr .= $key_attr . '="' . $val_attr . '"';
			}
		}
			
		$html .= '<button type="submit" class="btn '.$val['btn_class'].' btn-xs"'.$attr.'>
							<span class="btn-label-icon"><i class="'.$val['icon'].'"></i></span> '.$val['text'].'
			</button>';
	}
	
	return $html;
}

function btn_action($data = []) {

	$html = '<div class="btn-action-group">';
	
	foreach ($data as $key => $val) {
		if ($key == 'edit') {
			$html .= '<a href="'.$data[$key]['url'].'" class="btn btn-success btn-xs me-1" target="blank">
						<span class="btn-label-icon"><i class="fa fa-edit pe-1"></i></span> Edit
					</a>';
		}
		
		else if ($key == 'delete') {
			$html .= '<form method="post" action="'. $data[$key]['url'] .'">
					<button type="submit" data-action="delete-data" data-delete-title="'.$data[$key]['delete-title'].'" class="btn btn-danger btn-xs">
						<span class="btn-label-icon"><i class="fa fa-times pe-1"></i></span> Delete
					</button>
					<input type="hidden" name="delete" value="delete"/>
					<input type="hidden" name="id" value="'.$data[$key]['id'].'"/>
				</form>';
		}
		else {
			$attr = '';
			if (key_exists('attr', $val)) {
				foreach($val['attr'] as $key_attr => $val_attr) {
					$attr .= $key_attr . '="' . $val_attr . '"';
				}
			}
			
			
			$html .= '<a href="'.$val['url'].'" '. $attr . '>
						' . $val['text'] . '
					</a>';
			
		}
	}
	
	$html .= '</div>';
	return $html;
}

function btn_label($data) 
{
	$icon = '';
	if (key_exists('icon', $data)) {
		$icon = '<span class="btn-label-icon"><i class="' . $data['icon'] . ' pe-1"></i></span> ';
	}

	$attr = [];
	if (key_exists('attr', $data)) {
		foreach($data['attr'] as $name => $value) {
			$attr[] = $name . '="' . $value . '"';
		}
	}

	$html = '
		<a href="'.$data['url'].'" ' . join(' ', $attr) . '>'.$icon. $data['label'] . '</a>';
	return $html;
}