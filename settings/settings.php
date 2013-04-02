<?php
	define('LOCAL_PATH', implode('/', array_slice(explode('/', $_SERVER['SCRIPT_FILENAME']), 0, -1)).'/');
	define('LOCAL_URL', 'http://'.implode('/', array_slice(explode('/', $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']), 0, -1)).'/');
	//define('USR_PATH', LOCAL_PATH.'../usr/');
	//define('USR_URL', LOCAL_URL.'../usr/');
	define('PATH', '/');
	define('NL', "\n");
	define('CHARSET', 'utf-8');
	define('SMARTY_COMPILE_DIR', 'templates_c');
?>