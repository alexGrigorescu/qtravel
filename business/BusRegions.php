<?
	class BusRegions extends BusTable
	{	
		function BusRegions()
		{
			$this->setTable(TBL_REGIONS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select regions.*, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.code as continent_code, continents.title as continent_title  from '.TBL_REGIONS.' regions
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on countries.continent_id = continents.id
			where regions.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 1000);
			$set['text'] = elementStr($set['text']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['sorting'] = elementStr($set['sorting']);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(regions.title) like \'%'.encode($set['text']).'%\')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (continents.id = '.encode($set['continent_id']).')';
			if ($set['special1'] === '0') $w .= ' and (regions.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (regions.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (regions.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (regions.special2 = \'1\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' regions.title asc';
			
			
			
			$sql  = 
			'
			select regions.*, countries.title as country_title, continents.title as continent_title from '.TBL_REGIONS.' regions
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			where regions.id > 0 '.$w.'
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
		
		function getArrayBy($set)
		{
			$w = '';
			$set['by'] = elementStr($set['by'], 'accommodations');
			$set['text'] = elementStr($set['text']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['special1'] = elementStr($set['special1'], '1');
			$set['special2'] = elementStr($set['special2']);
			$set['specialc'] = elementStr($set['specialc']);
			$set['specialo'] = elementStr($set['specialo']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (regions.code like \'%'.encode($set['text']).'%\')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if ($set['special1'] === '0') $w .= ' and (regions.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (regions.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (regions.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (regions.special2 = \'1\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' regions.title asc';
			
			if ($set['by'] == 'accommodations')
			{
				$sql  = 
				'
				select regions.id, regions.code, regions.title, countries.code as country_code, countries.title as country_title, count(accommodations.id) as count from '.TBL_REGIONS.' regions
				left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
				left join '.TBL_LOCATIONS.' locations on locations.region_id = regions.id
				left join '.TBL_ACCOMMODATIONS.' accommodations on accommodations.location_id=locations.id and accommodations.special1=1
				where regions.id > 0 '.$w.'
				group by regions.id
				having count(accommodations.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif($set['by'] == 'vacations')
			{
				if ($set['specialc'] === '1') $w .= ' and (vacations.specialc = \'1\')';
				if (strlen(trim($set['specialo'])) > 0) $w .= ' and (vacations.specialo = \''.encode($set['specialo']).'\' or vacations.specialo1 = \''.encode($set['specialo']).'\' or vacations.specialo2 = \''.encode($set['specialo']).'\' or vacations.specialo3 = \''.encode($set['specialo']).'\')';
				$sql  = 
				'
				select regions.id, regions.code, regions.title, countries.code as country_code, countries.title as country_title, count(vacations.id) as count from '.TBL_REGIONS.' regions
				left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
				left join '.TBL_LOCATIONS.' locations on locations.region_id = regions.id
				left join '.TBL_VACATIONS.' vacations on vacations.location_id=locations.id and vacations.special1=1
				where regions.id > 0 '.$w.'
				group by regions.id
				having count(vacations.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif($set['by'] == 'flights')
			{
				$sql  = 
				'
				select regions.id, regions.code, regions.title, countries.code as country_code, countries.title as country_title, count(flights.id) as count from '.TBL_REGIONS.' regions
				left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
				left join '.TBL_FLIGHTS.' flights on flights.end_region_id=regions.id and flights.special1=1
				where regions.id > 0 '.$w.'
				group by regions.id
				having count(flights.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif($set['by'] == 'busses')
			{
				$sql  = 
				'
				select regions.id, regions.code, regions.title, countries.code as country_code, countries.title as country_title, count(busses.id) as count from '.TBL_REGIONS.' regions
				left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
				left join '.TBL_BUSSES.' busses on busses.end_region_id=regions.id and busses.special1=1
				where regions.id > 0 '.$w.'
				group by regions.id
				having count(busses.id) > 0
				order by '. $set['sorting'].'
				';
			}
			
			$q = new Query($sql);
			$count = $q->getCount();	
			$data = $q->getArray();
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function getList($set)
		{
			$w = '';
			$set['text'] = elementStr($set['text']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if ($set['country_id'] > 0) $w .= ' and (country_id = '.encode($set['country_id']).')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' regions.title asc';
			
			$sql  = 
			'
			select regions.id, regions.title from '.TBL_REGIONS.' regions
			where regions.id > 0 '.$w.'
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
			$sql  = 
			'
			select regions.*, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.code as continent_code, continents.title as continent_title  from '.TBL_REGIONS.' regions
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on countries.continent_id = continents.id
			where regions.code=\''.encode($set['code']).'\'
			';
			
			$q = new Query($sql);
			return $q->fetch();
		}

		function getCountryRegion($set)
		{
			$w1 = '';
			$w2 = '';
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) 
			{
				$w1 .= ' and LOWER(c.title) like \'%'.encode($set['text']).'%\'';
				$w2 .= ' and (LOWER(r.title) like \'%'.encode($set['text']).'%\' or LOWER(c.title) like \'%'.encode($set['text']).'%\')';
			}
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' region_id asc';
			
			$sql = '(SELECT 0 as region_id,\'\' as region_name,\'\' as region_code,c.id as country_id, c.title as country_name, c.code as country_code, c.buble_offer_vacancy
					FROM countries c 
					WHERE 1 '.$w1.')
					UNION
					(SELECT r.id as region_id,r.title as region_name,r.code as region_code,c.id as country_id, c.title as country_name, c.code as country_code, c.buble_offer_vacancy
					FROM '.TBL_REGIONS.' r 
					LEFT JOIN '.TBL_COUNTRIES.' c on r.country_id=c.id
					WHERE 1 '.$w2.')
					ORDER BY '. $set['sorting'].'
					LIMIT 10 OFFSET 0';

			$q = new Query($sql);
			return $q->getArray();
		}
	}
?>