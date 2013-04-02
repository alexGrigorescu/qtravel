<?
	class BusCircuits extends BusTable
	{	
		function BusCircuits()
		{
			$this->setTable(TBL_CIRCUITS);
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(title) like \'%'.encode($set['text']).'%\')';
			
			if ($set['special1'] === '0') $w .= ' and (circuits.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (circuits.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (circuits.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (circuits.special2 = \'1\')';
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' circuits.title asc';
			
			$sql  = 
			'
			select circuits.* from '.TBL_CIRCUITS.' circuits
			where circuits.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function readByCode($set)
		{
			$sql = 'select * from '.$this->table.' where code=\''.encode($set['code']).'\'';
			$q = new Query($sql);
			return $q->fetch();
		}
	}
?>