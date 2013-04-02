<?
class Table
{
	var $table_name = '';
	var $keys = array();
	var $fields = array();
	var $primary = 'id';
	
	function Table($_table_name)
	{
		$this->table_name = $_table_name;
		$this->fields = $this->loadFields($this->table_name);
		$this->keys = $this->loadKeys($this->table_name);
	}
	
	function read($keys)  // assoc_array
	{
		if (count($this->keys) > 0); else die('No keys defined.');

		$where = '';
		foreach ($this->keys as $k=>$v) $where .= " and `$k`='".encode($keys[$k])."'";
		$where = substr($where, 4);

		$sql = "select * from `$this->table_name` where $where limit 1";
		$r = new Query($sql);
		return $r->fetch();
	}
	
	function updateMultiLang($id, $set)
	{		

		$t = new Table($this->table_name.'_tr');
		foreach ($GLOBALS['LANGUAGES'] as $k=>$v)
		{
			$rec = array ();
			$rec[$this->primary] = $id;
			$rec['lang'] = $k;
			foreach ($set as $k1=>$v1)
			{
				if(strpos($k1, $k."_") === 0)
				{
					$key = substr($k1, strlen($k)+1);
					$rec[$key] = $v1;
				}
			}
			if (count($rec) > 2)
			{
				$t->replace ($rec);			
			}
		}		
		return $id;
	}

	function insert($set)
	{
		$a = '';
		$b = '';
		
		foreach ($this->fields as  $field)
		{
			$ok = true;
			if ($field['name'] == $this->primary) 
			{ 
				if (!isset($set[$field['name']])) $ok = false; 
			}

			if ($ok)
			{
				if (!isset($set[$field['name']])) 
				{
					if (strlen(trim($field['default'])) > 0)
					{
						$set[$field['name']] = $field['default'];
					}
					else
					{
						$set[$field['name']] = '';
					}
				}
				
				$a .= ',`' . encode($field['name']).'`';
				$b .= ',\''.encode($set[$field['name']]).'\'';
			}
		}

		$a = substr($a,1);
		$b = substr($b,1);
		
		if (strlen(trim($a)) > 0)
		{
			$sql = "insert into {$this->table_name}($a) values($b)";
			execSQL($sql);
			return mysql_insert_id();
		}
		return 0;
	}

	function update($set)
	{
		$a = '';
		foreach ($this->fields as  $field)
		{
			if (!array_key_exists($field['name'], $set)) 
			{
				continue;
			}
			$ok = true;
			if ($field['name'] == $this->primary) $ok = false;
			if (element($set[$field['name']]) === '' && $field['default'] > '') $set[$field['name']] = $field['default'];
			if ($ok) 
			{
				$a .= ',`' . encode($field['name']).'`';
				$a .= '=\'' . encode($set[$field['name']]) . '\'';
			}
		}
			
		$a = substr($a,1);
		if (strlen(trim($a)) > 0)
		{
			$sql = "update {$this->table_name} set $a where {$this->primary}='".encode($set[$this->primary])."'";
			execSQL($sql);
		}
		
		return $set[$this->primary];
	}

	function replace($set)
	{
		$a = '';
		$b = '';
		
		foreach ($this->fields as $field)
		{			
			if (isset($set[$field['name']]))
			{
				$a .= ',`' . encode($field['name']).'`';
				if (element($set[$field['name']]) === '' && $field['default'] > '') $set[$field['name']] = $field['default'];
				$b .= ',\'' . encode($set[$field['name']]) . '\'';			
			}
		}
		$a = substr($a,1);
		$b = substr($b,1);
		$sql = "replace into {$this->table_name} ($a) values($b)";
		execSQL($sql);
		
		return true;
	}

	function delete($key_values)  // assoc_array
	{
		if (count($this->keys) > 0); else die('No keys defined.');

		$where = '';
		foreach ($this->keys as $k=>$v) $where .= " and `$k`='".encode($key_values[$k])."'";
		$where = substr($where, 4);

		return execSQL("delete from `{$this->table_name}` where $where");
	}
	
	function loadFields($table)
	{
		$fields = array();
		
		$q = new Query('SHOW COLUMNS FROM '.$table);
		$a = $q->getArray();
		$i = 0;
		foreach ($a as $field)
		{
			$fi = array();
			$fi['name'] = $field['Field'];
			$fi['default'] = $field['Default'];
			$fi['type'] = $field['Type'];
			$fields[$field['Field']] = $fi;
		}
		
		return $fields;
	}
	
	function loadKeys($table)
	{
		$keys = array();
		
		$q = new Query('SHOW COLUMNS FROM '.$table);
		$a = $q->getArray();
			
		foreach ($a as $field)
		{
			if ($field['Key'] == 'PRI') 
			{
				$fi = array();
				$fi['name'] = $field['Field'];
				$fi['default'] = $field['Default'];
				$keys[$field['Field']] = $fi;
				
				$this->primary = $field['Field'];
			}
		}
		
		return $keys;
	}
}
?>