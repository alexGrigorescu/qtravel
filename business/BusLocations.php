<?
	class BusLocations extends BusTable
	{	
		function BusLocations()
		{
			$this->setTable(TBL_LOCATIONS);
		}

		function read ($set)
		{
			$sql  = 
			'
			select locations.*, countries.id as country_id, continents.id as continent_id from '.TBL_LOCATIONS.' locations
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			where locations.id=\''.encode($set['id']).'\'
			';
			
			$q = new Query($sql);
			$data = $q->fetch();

			return $data;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = strtolower(elementStr($set['text']));
			$set['region_id'] = elementNr($set['region_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['accommodation_type_id'] = elementNr($set['accommodation_type_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			
			$set['sorting'] = elementStr($set['sorting']);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(locations.title) like \'%'.encode($set['text']).'%\') or (LOWER(locations.description) like \'%'.encode($set['text']).'%\') or (LOWER(countries.title) like \'%'.encode($set['text']).'%\') or (LOWER(countries.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions.description) like \'%'.encode($set['text']).'%\'))';
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			if ($set['accommodation_type_id'] > 0) $w .= ' and (locations.accommodation_type_id = '.encode($set['accommodation_type_id']).')';
			if ($set['special1'] === '0') $w .= ' and (locations.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (locations.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (locations.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (locations.special2 = \'1\')';
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select locations.*, regions.title as region_title, countries.title as country_title, continents.title as continent_title, accommodation_types.stars as accommodation_type_stars from '.TBL_LOCATIONS.' locations
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where locations.id > 0 '.$w.'
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
			$set['region_id'] = elementNr($set['region_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if ($set['region_id'] > 0) $w .= ' and (region_id = '.encode($set['region_id']).')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select locations.id, locations.title from '.TBL_LOCATIONS.' locations
			where locations.id > 0 '.$w.'
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
			$w = '';
			$set['region_id'] = elementNr($set['region_id']);
			if ($set['region_id'] > 0) $w .= ' and (region_id = '.encode($set['region_id']).')';
			$sql = 
			'
			select * from '.TBL_LOCATIONS.' 
			where code=\''.encode($set['code']).'\' '.$w.'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getRegionCountryLocation($set){
			$w = '';
			$set['text'] = elementStr($set['text']);
			$set['region_id'] = elementNr($set['region_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and LOWER(l.title) like \'%'.encode($set['text']).'%\'';	
			if ($set['region_id'] > 0) $w .= ' and (l.region_id = '.encode($set['region_id']).')';	
			if ($set['country_id'] > 0) $w .= ' and (r.country_id = '.encode($set['country_id']).')';		
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' l.title asc';
			
			$sql = 'SELECT l.id,l.title
					FROM '.TBL_LOCATIONS.' l 
					LEFT JOIN '.TBL_REGIONS.' r ON r.id=l.region_id
					LEFT JOIN '.TBL_COUNTRIES.' c ON c.id=r.country_id 
					WHERE 1 '.$w.'
					ORDER BY '. $set['sorting'].'
					LIMIT 10 OFFSET 0';

			$q = new Query($sql);
			return $q->getArray();
		}
	}
?>