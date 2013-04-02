<?php
function print_p($a)
{
	echo ("<pre>");
	print_r($a);
	echo ("</pre>");
}

function echo_br($a)
{
	echo ($a.'<br/>');
}

function request($name)
{
	if(isset ($_REQUEST[$name])) return $_REQUEST[$name];
	else return '';
}

function element($val)
{
	if(isset ($val)) return $val;
	else return '';
}

function elementNr(&$val, $default = 0)
{
	if (isset ($val)) return 0 + $val;
	else return $default;
}

function elementStr(&$val, $default = '')
{
	if (isset($val)) return ''.$val;
	else return $default;
}

function elementEmptyStr(&$val, $default = '')
{
	if (isset($val) && strlen(trim($val)) > 0) 
	{
		return ''.$val;
	}
	else 
	{
		return $default;
	}
}

function elementArray(&$val, $default = array())
{
	if (isset($val)) return $val;
	else return $default;
}

function microtime_float() 
{ 
   list($usec, $sec) = explode(" ", microtime()); 
   return ((float)$usec + (float)$sec); 
}

function str_replace_params ($params = array(), $text, $start = '{', $end = '}')
{
	$keys = array();
	$values = array();
	foreach ($params as $k=>$v)	
	{
		$keys[] = $start.$k.$end;
		$values[] = $v;
	}
	$text = str_replace($keys, $values, $text);
	return $text;
} 

function smart_crop ($subject, $length = 256, $fill_string = '...') {
	$subject = trim($subject);
	$length = intval($length);
	$fill_string = trim($fill_string);
	
	if (strlen($subject) > $length) 
	{
		$space_pos = strpos($subject, ' ', ($length - 3 * strlen($fill_string)));

		if ($space_pos > $length) {
			$space_pos = $length - strlen($fill_string);					
		}
		
		$subject = substr($subject, 0, $space_pos) . $fill_string;
	}
	
	return $subject;	
}

function code($value, $type = '')
{
	$value = strtolower(trim($value));
	$value = str_replace(' ', '-', $value);		
	$value = preg_replace('/[^a-z\-]/i', '', $value);
	$value = preg_replace('/\-+/', '-', $value);
	if (substr($value, -1) == '-') $value = substr($value, 0, strlen($value)-1);
	if (substr($value, 0, 1) == '-') $value = substr($value, 1, strlen($value)-1);
	if (strlen(trim($type)) > 0) $value = $type.'-'.$value;	
	return $value;
}

function code_nr($value, $type = '')
{
	$value = strtolower(trim($value));
	$value = str_replace(' ', '-', $value);		
	$value = str_replace('.', '-', $value);		
	$value = str_replace('/', '-', $value);		
	$value = preg_replace('/[^a-z\-0-9]/i', '', $value);
	$value = preg_replace('/\-+/', '-', $value);
	if (substr($value, -1) == '-') $value = substr($value, 0, strlen($value)-1);
	if (strlen(trim($type)) > 0) $value = $type.'-'.$value;	
	return $value;
}

function SureRemoveDir($dir, $DeleteMe = true) 
{
    echo ($dir.'<br/>');
	if(!$dh = opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) 
	{
        if($obj=='.' || $obj=='..') continue;
        if (!unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
    }

    closedir($dh);
    if ($DeleteMe){
        rmdir($dir);
    }
}

function rss_strip_url($string )
{
	return preg_replace('@^(?:http://)?([^/]+)@i', '', $string);
}

function rss_strip_tags($string, $replace_with_space = true)
{
    if ($replace_with_space)
        return preg_replace('!<[^>]*?>!', ' ', $string);
    else
        return strip_tags($string);
}
?>
