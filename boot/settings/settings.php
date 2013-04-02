<?php
	define('LOCAL_PATH', implode('/', array_slice(explode('/', $_SERVER['SCRIPT_FILENAME']), 0, -1)).'/');
	define('LOCAL_URL', 'http://'.implode('/', array_slice(explode('/', $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']), 0, -1)).'/');
	define('NL', "\n");
	define('CHARSET', 'ISO-8859-1');

	$host = $_SERVER['HTTP_HOST'];
	$path = LOCAL_PATH.'settings/'.$host.'/settings.php';
	if (file_exists($path))
	{
		include $path;
	}
	else 
	{
		echo ('File Settings undefined for: `'.$host.'`');
		die();
	}
?>