<?
class cache
{
    function exists ($name)
    {        
    	if (!isset($GLOBALS['CACHE']) || !$GLOBALS['CACHE'])
    	{
    		return false;
    	}
    	
    	if(file_exists (USR_PATH."cache/{$name}.txt")) 
    	{
    		return true;
    	}
        else 
        {
        	return false;
        }
    }
    
    function save ($name, $value)
    {
        if (!isset($GLOBALS['CACHE']) || !$GLOBALS['CACHE'])
    	{
    		return false;
    	}
    	
    	$fp = fopen(USR_PATH."cache/{$name}.txt", 'w');
        fwrite ($fp, $value);
        fclose ($fp);
    }
    
    function get ($name)
    {
        $s = false;       
        if (Cache::exists($name) && (filemtime (USR_PATH."/cache/{$name}.txt") > filemtime (USR_PATH."cache/clear.txt")))
        {
            $fp = fopen(USR_PATH."/cache/{$name}.txt", 'r');
            while (!feof ($fp)) $s .= fgets ($fp);
            fclose($fp);
        }
        return $s;
    }
    
    function get_array ($name)
    {
    	$a = false;       
        if (cache::exists($name))
        {
            $a = array();
            include USR_PATH."/cache/{$name}.txt";
        }
        return $a;
    }
    
    function clear ()
    {
        $fp = fopen(USR_PATH."cache/clear.txt", 'w');
        fwrite ($fp, date('Y-m-d H:i:s'));
        fclose ($fp);
    }
    
    function build_cache($recordset, $var = '$a') 
	{
		$structure = array();
		$structure[] = '<?php';
		$structure[] = self::cache_array($var, $recordset);
		$structure[] = '?>';
		
		$ret = implode("\n", $structure);
		return $ret;
	}
	
	function cache_array($prefix, $recordset)
	{
		$cache = array();
		if (is_array($recordset)) 
		{
			foreach ($recordset as $key => $value)
			{
				if (!is_array($value))
				{
					$cache[] = $prefix.'[\''.$key.'\'] = \''.self::encode($value).'\';';
				}
				else
				{
					$cache[] = $prefix.'[\''.$key.'\'] = array();';
					$cache[] = self::cache_array($prefix.'[\''.$key.'\']', $value);
				}
			}
		} 
		$ret = implode("\n", $cache);
		return $ret;
	}
	
	function encode ($s)
	{	
		$s = str_replace('\\', '\\\\', $s);
		$s = str_replace('\'', '\\\'', $s);
		return $s;
	}
	
	function code($value)
	{
		$value = strtolower(trim($value));
		$value = str_replace(' ', '-', $value);		
		$value = str_replace('.', '-', $value);		
		$value = str_replace('/', '-', $value);		
		$value = preg_replace('/[^a-z\-]/i', '', $value);
		$value = preg_replace('/\-+/', '-', $value);
		if (substr($value, -1) == '-') $value = substr($value, 0, strlen($value)-1);
		return $value;
	}
}

?>
