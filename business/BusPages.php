<?
	class BusPages extends BusTable
	{	
		function BusPages()
		{
			$this->setTable(TBL_PAGES);
		}
		
		function readByCode($set)
		{
			$sql = 'select * from '.$this->table.' where code=\''.encode($set['code']).'\'';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['inpath'] = elementStr($set['inpath'], '000000');
			$set['exclude_path'] = elementStr($set['exclude_path']);
			$set['exclude_ord'] = elementStr($set['exclude_ord']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' pages.datec desc';
			if ($set['inpath'] > 0) 
			{
				$w .= ' and (pages.path like \'/000000/%'.encode($set['inpath']).'/\' or pages.parent_id=0 or pages.ord=\''.$set['inpath'].'\'';
				$depth = split ('/', $set['path']);
				foreach ($depth as $k=>$v)
				{
					if ($v > 0)
					{
						$w .= ' or pages.ord=\''.$v.'\'';
					}
				}
				$w .= ')';
			}
			if (strlen(trim($set['exclude_path'])) > 0)
			{
				$w .= ' and (pages.path not like \''.encode($set['exclude_path']).'%\')';
			}
			
			if (strlen(trim($set['exclude_ord'])) > 0)
			{
				$w .= ' and (pages.ord not like \''.encode($set['exclude_ord']).'\')';
			}
			
			$sql  = 
			'
			select pages.*, CONCAT(pages.path, pages.ord) as tree from '.TBL_PAGES.' pages
			where pages.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			foreach ($data as $k=>&$v)
			{
				if (strlen(trim($v['class'])) > 0)
				{
					$v['link'] = url ($v['class'], $v['method']);
				}
				else 
				{
					$v['link'] = url ('page', 'index', array('code'=>$v['code']));
				}
			}
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function getTree($set)
		{
			$w = '';
			if (!isset($set['sorting']) || strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' pages.datec desc';	
			$sql  = 
			'
			select pages.id, pages.code, pages.path, pages.level  from '.TBL_PAGES.' pages
			where pages.id > 0 '.$w.'
			order by CONCAT(pages.path, pages.ord), pages.ord asc
			';
			$q = new Query($sql);
			$pages = $q->getArray(0, 1000);
			
			$response = array();
			foreach ($pages as $k=>$v)
			{
				$response[$v['id']] = array('label'=>$v['code'], 'level'=>$v['level']);
			}
			return $response;
		}
		
		function savePath()
		{
			$sql = 
			'
			select id, parent_id, ord, path from '.TBL_PAGES.' pages
			order by parent_id asc
			';
			$q = new Query ($sql);
			$a = $q->getArrayById('id');
			
			$a[0] = array ('id'=>0, 'path_new'=>'/', 'ord'=>'000000');
			foreach ($a as $k=>$v) $this->calcPath ($a, $k);
			
			foreach ($a as $k=>$v)
			{	
				if ($k > 0 && $a[$k]['path_new'] != $a[$k]['path'])
				{
					$set = array();
					$set['id'] = $v['id'];
					$set['path'] = $v['path_new'];
					$set['level'] = substr_count($v['path_new'], '/')-1;
					$set['sub'] = $this->sub (array('id'=>$v['id']));
					$this->update($set);
				}
			}
		}
		
		function calcPath (&$a, $k = 0, &$i = 0)
		{		
			if ($k) 
			{
				$parent_id = $a[$k]['parent_id'];
				if (!isset($a[$parent_id]['path_new']))
				{				
					if (isset($a[$parent_id])) 
					{
						$this->calcPath ($a, $parent_id);
						$a[$k]['path_new'] = $a[$parent_id]['path_new'] .$a[$parent_id]['ord']."/";					
					}					
					else $a[$k]['path_new'] = '/-1/';
				}
				else $a[$k]['path_new'] = $a[$parent_id]['path_new'] .$a[$parent_id]['ord']."/";
			}
		}
		
		
		function insertMultilang($set)
		{
			$id = parent::insertMultilang($set);
			$rec = array();
			$rec['id'] = $id;
			$rec['ord'] = $id;
			$this->update($rec);
			$this->savePath();
			return $id;
		}
		
		function updateMultilang($set)
		{
			if ($set['parent_id'] == 0)
			{
				$set['parent_ord'] = 0;
			}
			else 
			{
				$info = $this->read(array('id'=>$set['parent_id']));
				$set['parent_ord'] = $info['ord'];
			}
			
			$id = parent::updateMultilang($set);
			$this->savePath();
			return $id;
		}
		
		function sub ($set)
		{
			$sql = 'select count(id) as sub from '.$this->table.' where parent_id=\''.encode($set['id']).'\'';
			$q = new Query($sql);
			return $q->getScalar('sub');
		}
		
		function updateSub($set)
		{
			$set['sub'] = $this->sub($set);
			$this->update($set);
		}
	}
?>