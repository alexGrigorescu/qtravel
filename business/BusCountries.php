<?
	class BusCountries extends BusTable
	{	
		function BusCountries()
		{
			$this->setTable(TBL_COUNTRIES);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select countries.*, continents.id as continent_id, continents.code as continent_code, continents.title as continent_title  from '.TBL_COUNTRIES.' countries
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			where countries.id=\''.encode($set['id']).'\'
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
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['special1'] = elementStr($set['special1'], '1');
			$set['special2'] = elementStr($set['special2']);
			$set['buble_offer_vacancy'] = elementStr($set['buble_offer_vacancy']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (LOWER(countries.title) like \'%'.encode($set['text']).'%\')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			if ($set['special1'] === '0') $w .= ' and (countries.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (countries.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (countries.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (countries.special2 = \'1\')';
			if ($set['buble_offer_vacancy'] === '0') $w .= ' and (countries.buble_offer_vacancy = \'0\')';
			if ($set['buble_offer_vacancy'] === '1') $w .= ' and (countries.buble_offer_vacancy = \'1\')';
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' countries.title asc';
			
			$sql  = 
			'
			select countries.*, continents.title as continent_title from '.TBL_COUNTRIES.' countries
			left join '.TBL_CONTINENTS.' continents on continents.id=countries.continent_id
			where countries.id > 0 '.$w.'
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
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['sorting'] = elementStr($set['sorting']);
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' countries.title asc';
			
			$sql  = 
			'
			select countries.id, countries.title from '.TBL_COUNTRIES.' countries
			where countries.id > 0 '.$w.'
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
		
		function getArrayBy($set)
		{
			$w = '';
			$set['by'] = elementStr($set['by'], 'accommodations');
			$set['text'] = elementStr($set['text']);
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['specialc'] = elementStr($set['specialc']);
			$set['sorting'] = elementStr($set['sorting']);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and (code like \'%'.encode($set['text']).'%\')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			if ($set['special1'] === '0') $w .= ' and (countries.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (countries.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (countries.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (countries.special2 = \'1\')';
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' countries.title asc';
			
			if ($set['by'] == 'accommodations')
			{
				$sql  = 
				'
				select countries.id, countries.code, countries.title, countries.continent_id, continents.title as continent_title, count(accommodations.id) as count from '.TBL_COUNTRIES.' countries
				left join '.TBL_CONTINENTS.' continents on countries.continent_id=continents.id
				left join '.TBL_REGIONS.' regions on regions.country_id=countries.id
				left join '.TBL_LOCATIONS.' locations on locations.region_id = regions.id
				left join '.TBL_ACCOMMODATIONS.' accommodations on accommodations.location_id=locations.id and accommodations.special1=1
				where countries.id > 0 '.$w.'
				group by countries.id
				having count(accommodations.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif ($set['by'] == 'vacations') 
			{
				if ($set['specialc'] === '1') $w .= ' and (vacations.specialc = \'1\')';
				$sql  = 
				'
				select countries.id, countries.code, countries.title, countries.continent_id, continents.title as continent_title, count(vacations.id) as count from '.TBL_COUNTRIES.' countries
				left join '.TBL_CONTINENTS.' continents on countries.continent_id=continents.id
				left join '.TBL_REGIONS.' regions on regions.country_id=countries.id
				left join '.TBL_LOCATIONS.' locations on locations.region_id = regions.id
				left join '.TBL_VACATIONS.' vacations on vacations.location_id=locations.id and vacations.special1=1
				where countries.id > 0 '.$w.'
				group by countries.id
				having count(vacations.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif ($set['by'] == 'flights') 
			{
				$sql  = 
				'
				select countries.id, countries.code, countries.title, countries.continent_id, continents.title as continent_title, count(flights.id) as count from '.TBL_COUNTRIES.' countries
				left join '.TBL_CONTINENTS.' continents on countries.continent_id=continents.id
				left join '.TBL_REGIONS.' regions on regions.country_id=countries.id
				left join '.TBL_FLIGHTS.' flights on flights.end_region_id=regions.id and flights.special1=1
				where countries.id > 0 '.$w.'
				group by countries.id
				having count(flights.id) > 0
				order by '. $set['sorting'].'
				';
			}
			elseif ($set['by'] == 'busses') 
			{
				$sql  = 
				'
				select countries.id, countries.code, countries.title, countries.continent_id, continents.title as continent_title, count(busses.id) as count from '.TBL_COUNTRIES.' countries
				left join '.TBL_CONTINENTS.' continents on countries.continent_id=continents.id
				left join '.TBL_REGIONS.' regions on regions.country_id=countries.id
				left join '.TBL_BUSSES.' busses on busses.end_region_id=regions.id and busses.special1=1
				where countries.id > 0 '.$w.'
				group by countries.id
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
		
		function readByCode($set)
		{
			$sql  = 
			'
			select countries.*, continents.id as continent_id, continents.code as continent_code, continents.title as continent_title  from '.TBL_COUNTRIES.' countries
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			where countries.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
	}
?>