<?
	class Errors 
	{
		function get ($code, $class = OBJ, $section = SECTION)
		{
			if (strlen(trim($code)) == 0) 
			{
				return '';
			}
			else 
			{
				return tr($code, $class, $section);
			}
		}
	}
?>