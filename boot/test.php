<?
	error_reporting(E_ALL);
	set_time_limit(0);	
	ini_set("display_errors", 1);
	
	$xml = new XMLReader();
    $xml->open('opml123.opml');
    $tree = xml2assoc($xml);
    $xml->close();
    echo ('<pre>');
    $i = 0;
    $j = 0;
	foreach ($tree[0]['val'] as $k=>$v)
	{
		if (isset($v['atr']['xmlUrl']) && substr_count( $v['atr']['xmlUrl'], '.ro') > false)
		{
			$j ++;
			$v['atr']['title'] = smart_crop($v['atr']['title'], 255, '');
			$code = $v['atr']['xmlUrl'];
			$code = str_replace ('http://', '', $code);
			$code = code($code);
			$title = $v['atr']['title'];
			$xmlUrl = $v['atr']['xmlUrl'];
			$sql = 
			'
			/*'.$i.'-'.$j.'*/'.'
			INSERT IGNORE INTO `v6lwelr_welwel`.`feeds` 
			VALUES 
			(NULL , 
			\''.encode($code).'\', 
			\''.encode($title).'\', 
			\''.encode($xmlUrl).'\', 
			\'2009-02-01\', 
			\'2009-02-01\', 
			\'2009-02-01\', 
			\'1\'
			);
			';
			echo ($sql."\n");
		}
		$i++;
		if ($i > 10000) break;
	}
	die();


function xml2assoc(&$xml){
    $assoc = NULL;
    $n = 0;
    while($xml->read()){
        if($xml->nodeType == XMLReader::END_ELEMENT) break;
        if($xml->nodeType == XMLReader::ELEMENT and !$xml->isEmptyElement){
            $assoc[$n]['name'] = $xml->name;
            if($xml->hasAttributes) while($xml->moveToNextAttribute()) $assoc[$n]['atr'][$xml->name] = $xml->value;
            $assoc[$n]['val'] = xml2assoc($xml);
            $n++;
        }
        else if($xml->isEmptyElement){
            $assoc[$n]['name'] = $xml->name;
            if($xml->hasAttributes) while($xml->moveToNextAttribute()) $assoc[$n]['atr'][$xml->name] = $xml->value;
            $assoc[$n]['val'] = "";
            $n++;               
        }
        else if($xml->nodeType == XMLReader::TEXT) $assoc = $xml->value;
    }
    return $assoc;
}

function code($value, $type = '')
{
	$value = strtolower(trim($value));
	$value = str_replace(' ', '-', $value);		
	$value = str_replace('quot;', '', $value);		
	$value = preg_replace('/[^a-z0-9\-\.\/]/i', '', $value);
	$value = preg_replace('/\-+/', '-', $value);
	$value = preg_replace('/\.+/', '-', $value);
	$value = preg_replace('/\/+/', '-', $value);
	if (substr($value, -1) == '-') $value = substr($value, 0, strlen($value)-1);
	if (strlen(trim($type)) > 0) $value = $type.'-'.$value;	
	return $value;
}

function encode ($s)
{
	$s = str_replace('\\', '\\\\', $s);
	$s = str_replace('\'', '\\\'', $s);
	return $s;
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
function print_p ($a)
{
	echo ("<pre>");
	print_r ($a);
	echo ("</pre>");
}
?>