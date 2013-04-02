<?
	class BusAccommodationTypes extends BusTable
	{	
		function BusAccommodationTypes()
		{
			$this->setTable(TBL_ACCOMMODATION_TYPES);
		}

		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' accommodation_types.title asc';
			
			$sql  = 
			'
			select accommodation_types.* from '.TBL_ACCOMMODATION_TYPES.' accommodation_types
			where accommodation_types.id > 0 '.$w.'
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
		
		function getList($set)
		{
			$w = '';
			$set['text'] = elementStr($set['text']);
			$set['hotel_id'] = elementNr($set['hotel_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (at.code like \'%'.encode($set['text']).'%\')';
			if ($set['hotel_id'] > 0) $w .= ' and (l.id = '.encode($set['hotel_id']).')';	
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' at.stars asc';
			
			$sql  = 
			'
			select at.id, at.title 
			from '.TBL_ACCOMMODATION_TYPES.' at
			left join '.TBL_LOCATIONS.' l ON l.accommodation_type_id=at.id
			where at.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			$q = new Query($sql);
			$count = $q->getCount();	
			$data = $q->getAssocArray('id', 'title');
			
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