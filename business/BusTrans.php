<?
	class BusTrans extends BusTable
	{	
		function BusTrans()
		{
			$this->setTable('trans');
		}
		
		function getArray($set)
		{
			$dict = array();
			$sections = self::sections();
			if (!isset($sections[$set['section']])) $set['section'] = 'member';
			$file = LOCAL_PATH.'lang/'.$set['section'].'/'.LANG.'.php';
			if (file_exists($file))
			{
				$a = array();
				include($file);
				$dict = $a;
			}
			$file = LOCAL_PATH.'systems/'.SYSTEM.'/lang/'.$set['section'].'/'.LANG.'.php';
			if (file_exists($file))
			{
				$a = array();
				include($file);
				foreach ($a as $k=>$v)
				{
					if (is_array($v) && count($v) > 0)
					{
						foreach ($v as $k1=>$v1)
						{
							$dict[$k][$k1] = $v1;
						}
					}
				}
			}
			
			return $dict;
		}
		
		function getArrayEdit($set)
		{
			$sections = self::sections();
			if (!isset($sections[$set['section']])) 
			{
				$set['section'] = 'member';
			}$set['text'] = elementStr($set['text'], '');
			$file = LOCAL_PATH.'lang/'.$set['section'].'/'.LANG.'.php';
			$data = array ();
			if (file_exists($file))
			{
				$a = array();
				include($file);
				ksort($a);
				foreach ($a as $k=>$v)
				{
					$data[$k] = array('key'=>$k, 'default'=>$v, 'custom'=>'');
				}
			}
			$file = LOCAL_PATH.'systems/'.SYSTEM.'/lang/'.$set['section'].'/'.LANG.'.php';
			if (file_exists($file))
			{
				$a = array();
				include($file);
				foreach ($a as $k=>$v)
				{
					if (isset($data[$k]))
					{
						$data[$k]['custom'] = $v;
					}
				}
			}
			
			foreach ($data as $k=>$v)
			{
				if (strlen(trim($set['text'])) > 0)
				{
					if (self::found (array('hystack'=>$set['text'], 'needle'=>$v['key'])))
					{
						$data[$k]['default'] == self::found (array('hystack'=>$set['text'], 'needle'=>$v['key']));
					}
					else 
					{
						unset($data[$k]);
					}
				}
			}
			
			$response = array();
			$response['count'] = count ($data);
			$response['data'] = $data;
			
			return $response;
		}
		
		function getDefault($set)
		{
			$set['section'] = elementStr($set['section'], 'member');
		}
		
		function save ($set)
		{
			$sections = self::sections();
			if (!isset($sections[$set['section']])) 
			{
				$set['section'] = 'member';
			}
			$set['key'] = elementStr($set['key'], '');
			$set['custom'] = elementStr($set['custom'], '');
			$file = LOCAL_PATH.'systems/'.SYSTEM.'/lang/'.$set['section'].'/'.LANG.'.php';
			$a = array();
			if (file_exists($file))
			{
				include($file);
			}	
			if (strlen(trim($set['key'])) > 0)
			{
				$a[$set['key']] = $set['custom'];
			}
			ksort($a);
			$str = cache::build_cache($a);
			file_put_contents($file, $str);
		}
		
		function found ($set)
		{
			$found = 0;
			$hystack_free = str_replace('%', '', $set['hystack']);
			$needle_free = str_replace('%', '', $set['needle']);
			if ($set['hystack'] > '' && $needle > '')
			{
				if (strpos($needle, '%') >= 0)
				{
					if ($needle === '%')
					{
						$found = 1;
					}
					elseif (strpos($needle, '%') === 0)
					{
						if(substr_count($hystack_free, $needle_free) > 0)
						{
							$found = 1;
						}
					}
					else
					{						
						if (substr_count($hystack_free, $needle_free) > 0)
						{
							$found = 1;
						}						
					}
				}
			}
			else 
			{
				$found = 1;
			}
			
			
			return $found;
		}
		
		function load($set = array())
		{
			$GLOBALS['DICT'][SECTION] = Bus::call('Trans','getArray',array('section'=>SECTION));
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