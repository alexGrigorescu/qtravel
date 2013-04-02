<?
	class BusMatrix extends BusTable
	{	
		function BusMatrix()
		{
			$this->setTable('matrix');
		}
		
		function getArray($set)
		{
			$matrix = array();
			$sections = self::sections();
			if (!isset($sections[$set['section']])) $set['section'] = 'member';
			$file = LOCAL_PATH.'matrix/'.$set['section'].'.php';
			if (file_exists($file))
			{
				$a = array();
				include($file);
				$matrix = $a;
			}
			$file = LOCAL_PATH.'systems/'.SYSTEM.'/matrix/'.$set['section'].'.php';
			if (file_exists($file))
			{
				$a = array();
				include($file);
				foreach ($a as $k=>$v)
				{
					$matrix[$k] = $v;
				}
			}
			return $matrix;
		}
		
		function getDefault($set)
		{
			$set['section'] = elementStr($set['section'], 'member');
		}
		
		function load($set = array())
		{
			$GLOBALS['MATRIX'][SECTION] = Bus::call('matrix','getArray',array('section'=>SECTION));
		}
		
		function sections($set = array())
		{
			$sections = array();
			$sections['member'] = 'member';
			$sections['admin'] = 'admin';
			
			return $sections;
		}
	}
?>