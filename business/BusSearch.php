<?
	class BusSearch extends BusTable
	{	
		function BusSearch()
		{
			$this->setTable(TBL_SEARCH);
		}

		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = strtolower(elementStr($set['text']));
			$set['table'] = strtolower(elementStr($set['table']));
			$set['country_code'] = strtolower(elementStr($set['country_code']));
			
			if (strlen(trim($set['table'])) > 0)
			{
				$w .= ' and `table`=\''.encode($set['table']).'\''; 
			}
			if (strlen(trim($set['country_code'])) > 0)
			{
				$w .= ' and country_code=\''.encode($set['country_code']).'\''; 
			}
			$sql_count  = 
			'
			SELECT count(*) as count FROM `'.TBL_SEARCH.'`  
			WHERE special1=1 '.$w.' and match (code , title , description , `text` , country_code , country_title , country_description , region_title , region_code , region_description , location_code , location_title , location_description ) against (\''.encode($set['text']).'\') > 0
			';
			
			$sql  = 
			'
			SELECT *, match (code , title , description , `text` , country_code , country_title , country_description , region_title , region_code , region_description , location_code , location_title , location_description )against (\''.encode($set['text']).'\') as score FROM `'.TBL_SEARCH.'`  
			WHERE special1=1 '.$w.' and match (code , title , description , `text` , country_code , country_title , country_description , region_title , region_code , region_description , location_code , location_title , location_description ) against (\''.encode($set['text']).'\') > 0
			ORDER BY `score`  desc
			';
			
			$start = microtime_float();
			$q = new Query($sql, $sql_count);
			$count = $q->getCount();
			
			if ($count == 0)
			{
				$sql_count  = 
				'
				SELECT count(*) as count FROM `'.TBL_SEARCH.'`  
				WHERE 
					special1=1 '.$w.' 
					and 
						(
						(LOWER(location_description) like \'%'.encode($set['text']).'%\')
						or
						(LOWER(title) like \'%'.encode($set['text']).'%\')
						or
						(LOWER(location_title) like \'%'.encode($set['text']).'%\')
						)
				';
				
				$sql  = 
				'
				SELECT * FROM `'.TBL_SEARCH.'`  
				WHERE 
					special1=1 '.$w.' 
					and 
						(
						(LOWER(location_description) like \'%'.encode($set['text']).'%\')
						or
						(LOWER(title) like \'%'.encode($set['text']).'%\')
						or
						(LOWER(location_title) like \'%'.encode($set['text']).'%\')
						)
				';
				
				$start = microtime_float();
				$q = new Query($sql, $sql_count);
				$count = $q->getCount();
			}
			
			$data = $q->getArray($set['page'], $set['page_size']);
			$end = microtime_float();
			$delta = number_format($end-$start, 2, '.', '');
			
			$response = array();
		    $response['count'] = $count;
		    $response['data'] = $data;
		    $response['time'] = $delta;
		    
		    return $response;
		}
	}
?>