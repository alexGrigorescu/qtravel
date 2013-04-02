<?
	class BusFlightOperators extends BusTable
	{	
		function BusFlightOperators()
		{
			$this->setTable(TBL_FLIGHT_OPERATORS);
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(title) like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' flight_operators.title asc';
			
			$sql  = 
			'
			select flight_operators.* from '.TBL_FLIGHT_OPERATORS.' flight_operators
			where flight_operators.id > 0 '.$w.'
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
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' flight_operators.title asc';
			
			$sql  = 
			'
			select flight_operators.id, flight_operators.title from '.TBL_FLIGHT_OPERATORS.' flight_operators
			where flight_operators.id > 0 '.$w.'
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