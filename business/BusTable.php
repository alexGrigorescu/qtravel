<?
	class BusTable
	{
		public $table = false;
		function setTable($table)
		{
			$this->table = $table;
		}
		
		function read($keys)
		{
			$t = new Table ($this->table);
			return $t->read($keys);
		}
		
		function insert($set)
		{
			$this->cache_clear();
			$t = new Table ($this->table);
			return $t->insert($set);
		}
		
		function update($set)
		{
			$this->cache_clear();
			$t = new Table ($this->table);
			return $t->update($set);
		}
		
		function replace($set)
		{
			$this->cache_clear();
			$t = new Table ($this->table);
			return $t->replace($set);
		}
		
		function delete($set)
		{
			$this->cache_clear();
			$t = new Table ($this->table);
			return $t->delete($set);
		}
		
		function cache_clear ()
		{
			if (!in_array($this->table, array('sessions', 'sitemap', 'news')))
			{
				cache::clear();
			}
		}
	}
?>