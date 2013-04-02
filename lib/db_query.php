<?   
	function encode($s)
	{
		if (get_magic_quotes_gpc())
		{
			//return $s;
		}
		$s = str_replace('\\', '\\\\', $s);
		return str_replace("'", "\\'", $s);
	}
	
	function execSQL($sql,$sql_error_skip = 0 )
	{
		//echo $GLOBALS[sqlnumber]++."/<br>";
		//echo $sql."/<br>";

		global $DEFAULT_CONNECTION;
		$r = mysql_query($sql, $DEFAULT_CONNECTION);
		if (!$r && $sql_error_skip == 0)
		{
			$err = mysql_error();
			print_r(debug_backtrace());
			die($err . '<br><br>'. $sql); // salvam vre-ul log cu sql si arr
		}
		return $r;
	}
	
	
	class Query
	{
		var $sql = null;
		var $sql_count = null;
		var $r = null;
		var $a = null;

		function Query($_sql = '', $_sql_count = '')
		{
			$this->sql = $_sql;
			$this->sql_count = $_sql_count;
		}

		function execute() // for internal use
		{
			$this->r = execSQL($this->sql);
			return $this->r;
		}

		//function &fetch()
		function fetch()
		{
			if (!$this->r) $this->execute();
			$this->a = mysql_fetch_array($this->r, MYSQL_ASSOC);
			return $this->a;
		}

		function getCount($field = 'count')
		{
			if ($this->sql_count == '') 
			{
				$this->sql_count = preg_replace('/^\s*SELECT\s.*\s+FROM\s/is','SELECT COUNT(*) AS count FROM ',$this->sql);
			}
			$o = strpos ($this->sql_count, "order by");
			if ($o > 0) $this->sql_count = substr ($this->sql_count, 0 ,$o);
			$q = new Query($this->sql_count);
			return 0 + $q->getScalar($field);
		}
		
		function getArray($page = 0, $page_size = 0)
		{
			$this->a = false;
			$rez = array();
			$this->rec_count = 0;
			$sql = $this->sql;
			if ($page_size > 0)
			{
				$page = 0 + $page;
				if ($page >= 0); else $page = 0;
				$rec_count = $this->getCount ();
				$page_count = ceil($rec_count/$page_size);
				if ($page >= $page_count) $page = $page_count-1;
				if ($page < 0) $page = 0;
				$offset = $page * $page_size;
				
				$this->sql .= ' limit '.$offset.', '. $page_size;
			}
			
			while ($a = $this->fetch()) 
			{
				$rez[] = $a;
			}
			if ($page_size > 0) 
			{
				$this->sql = $sql;
			}
			return $rez;
		}

		function getArrayByID($id_field = "ID")
		{
			$this->execute();
			$this->a = false;
			$res = array();
			while ($a = $this->fetch()) $res[$a[$id_field]] = $a;
			return $res;
		}

		function getAssocArray($key, $value)
		{
			$this->execute();
			$this->a = false;
			$res = array();
			while ($a = $this->fetch()) $res[$a[$key]] = $a[$value];
			return $res;
		}

		function getColumn($column)
		{
			$this->execute();
			$this->a = false;
			$res = array();
			while ($a = $this->fetch()) $res[] = $a[$column];
			return $res;
		}

		function getScalar($column)
		{
			$this->execute();
			$this->a = $this->fetch();
			return $this->a[$column];
		}
	}
?>
