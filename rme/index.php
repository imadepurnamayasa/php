<?php

define('ROOT', __DIR__);
define('FOLDER_CLASS', ROOT . '/' . 'class/');
define('FOLDER_CONFIG', ROOT . '/' . 'config/');
define('FOLDER_FUNCTION', ROOT . '/' . 'function/');
define('FOLDER_INCLUDE', ROOT . '/' . 'include/');
define('FOLDER_MODULE', ROOT . '/' . 'module/');
define('FOLDER_PUBLIC', ROOT . '/' . 'public/');

include FOLDER_FUNCTION.'func_global.php';
include FOLDER_INCLUDE.'inc_header.php';
include FOLDER_INCLUDE.'inc_module.php';
include FOLDER_INCLUDE.'inc_footer.php';