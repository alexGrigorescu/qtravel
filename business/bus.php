<?
	class Bus
	{
		function call ($class, $method, $params = array())
		{
			$class_name = 'Bus'.ucfirst($class);
			$bus = new $class_name();
			return  $bus->$method($params);
		}
	}
	
	function tr($code, $class = OBJ, $section = SECTION)
	{
		if (strlen(trim($class)) == 0) 
		{
			$class = OBJ;
		}
		if (strlen(trim($section)) == 0) 
		{
			$section = SECTION;
		}
		if (isset($GLOBALS['DICT'][$section][$class][$code]))
		{
			return $GLOBALS['DICT'][$section][$class][$code];
		}
		else 
		{
			return '['.$section.']['.$class.']['.$code.']';
		}
	}
?>