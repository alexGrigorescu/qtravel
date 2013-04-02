<?
	class BusMeta extends BusTable
	{
		function BusMeta()
		{
			$this->setTable(TBL_META);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select users.* from '.TBL_META.' meta 
			where meta.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			return $data;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['status'] = elementStr($set['status']);
			if ($set['status'] === '0') $w .= ' and (meta.status = \'0\')';
			if ($set['status'] === '1') $w .= ' and (meta.status = \'1\')';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			
			if (strlen(trim($set['page_code'])) > 0) $w .= ' and meta.page_code=\''.encode($set['page_code']).'\'';

			$sql  = 
			'
			select meta.*  from '.TBL_META.' meta
      		where meta.id > 0 '.$w.'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
		    $response['count'] = $count;
		    $response['data'] = $data;
		    return $response;
		}
	}
?>
