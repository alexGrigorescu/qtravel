<?
	session_start();
	#error_reporting(E_ALL);	
	#ini_set("display_errors", 1);
	
	define ('SECTION', $SECTION);
	define ('INDEX', $INDEX.'.php');	
	define ('SYSTEM',  'q-travel');
	
	include 'settings/settings.php';
	include 'systems/'.SYSTEM.'/settings/settings.php';
	include 'settings/constants.php';
	include 'systems/'.SYSTEM.'/settings/constants.php';
	
	require "lib/cache.php";
	$cache_name = cache::code($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);	
	$cache = cache::get ($cache_name);
	if ($cache !== false)
	{
		echo ($cache);
		exit();
	}
	
	include 'settings/tables.php';		
	include 'lib/_include.php';
	
	$DEFAULT_CONNECTION = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	if (!$DEFAULT_CONNECTION) die('Unable to connect to database: '.mysql_error());
	
	mysql_select_db(DB_NAME, $DEFAULT_CONNECTION);
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query('SET collation_connection = utf8_general_ci');
	
	include 'business/_include.php';
	
	define ('LANG', $DEFAULT_LANG[SECTION]);
	
	Bus::call('domains', 'load', array());
	Bus::call('trans', 'load', array());
	Bus::call('matrix', 'load', array());
	
	$SECURITY = new BusSecurity();
	if (SECTION == 'member')
	{
		include 'subdomain.php';
	}
	if (isset($_REQUEST['action']))
	{
		$action = ''.$_REQUEST['action'];
		$actions = split('-', $action);
		if (is_array($actions) && count($actions) == 2)
		{
			$OBJ = $actions[0];
			$MET = $actions[1];
		}
		else 
		{
			 $OBJ = 'main';
		 	$MET = 'index';
		}
	}
	else 
	{
		 $OBJ = 'main';
		 $MET = 'index';
	}
	
	define ('OBJ', $OBJ);
	define ('MET', $MET);
	
	$MYOBJ = 'my'.$OBJ;
	
	
	
	if (class_exists($MYOBJ))
	{
		$CALLABLE_OBJECT = new $MYOBJ;
	}
	else 
	{
		$CALLABLE_OBJECT = new $OBJ;
	}
	//print_p($SECURITY);
	$error_code = '';
	if (is_callable(array(&$CALLABLE_OBJECT, $MET), false))
	{
		if (isset($MATRIX[SECTION]["$OBJ-$MET"]))
		{
			if ($SECURITY->user_level < $MATRIX[SECTION]["$OBJ-$MET"]['l'])
			{
				redirect('main', 'login', array('goto'=>$_SERVER['REQUEST_URI']));
			}
			else
			{
				$level = $MATRIX[SECTION]["$OBJ-$MET"]['l'];
				$has_right = bus::call('users', 'hasRight', array('module'=>$OBJ));
				if (SECTION == 'member' || $level == 0 || ($level > 0 && $has_right)) 
				{
					$arr = array();
					foreach($MATRIX[SECTION]["$OBJ-$MET"]['p'] as $k3=>$v3) 
					{
						if (isset($_REQUEST[$v3]))
						{
							$arr[$v3] = $_REQUEST[$v3];
						}
						else 
						{
							$arr[$v3] = '';
						}	
					}
					
					call_user_func_array(array(&$CALLABLE_OBJECT, $MET), $arr);
				}
				else 
				{
					redirect('main', 'deny');
				}
			}
		}
		else
		{
			redirect('main', 'error', array('error'=>'no_iface'));
		}
	}
	else
	{
	   redirect('main', 'error', array('error'=>'not_callable'));
	}
?>
