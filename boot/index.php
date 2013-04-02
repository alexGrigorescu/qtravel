<?
	error_reporting(E_ALL);
	set_time_limit(0);	
	ini_set("display_errors", 1);
	header('Content-Type: text/html; charset=utf-8');
	include 'settings/settings.php';
	include 'lib/misc.php';
	include 'lib/miscu.php';
	
	include 'classes/task.php';
	include 'classes/soap.php';
	
	if (isset($_REQUEST['action']))
	{
		$action = ''.$_REQUEST['action'];
		$actions = split('-', $action);
		if (is_array($actions) && count($actions) == 2)
		{
			$OBJ = 'task';
			$MET = $actions[1];
		}
		else 
		{
			$OBJ = 'task';
			$MET = 'index';
		}
	}
	else 
	{
		 $OBJ = 'task';
		 $MET = 'index';
	}
	
	define ('OBJ', $OBJ);
	define ('MET', $MET);
	
	$CALLABLE_OBJECT = new $OBJ;
	if (is_callable(array(&$CALLABLE_OBJECT, $MET), false))
    {
		call_user_func_array(array(&$CALLABLE_OBJECT, $MET), array());
    }
?>