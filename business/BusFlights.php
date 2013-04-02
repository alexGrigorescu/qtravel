<?
	class BusFlights extends BusTable
	{	
		function BusFlights()
		{
			$this->setTable(TBL_FLIGHTS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select flights.*, 
				flight_types.title as flight_type_title, 
				flight_operators.code as flight_operator_code, flight_operators.title as flight_operator_title,
				flight_operators_2.id as flight_operator_2_id, flight_operators_2.code as flight_operator_2_code, flight_operators_2.title as flight_operator_2_title,
				flight_operators_3.id as flight_operator_3_id, flight_operators_3.code as flight_operator_3_code, flight_operators_3.title as flight_operator_3_title,
				flight_operators_4.id as flight_operator_4_id, flight_operators_4.code as flight_operator_4_code, flight_operators_4.title as flight_operator_4_title,
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id, continents2.title as end_continent_title, continents2.code as end_continent_code,
				currencies.title as currency_title
			from '.TBL_FLIGHTS.' flights
			left join '.TBL_FLIGHT_TYPES.' flight_types on flight_types.id = flights.type_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators on flight_operators.id = flights.operator_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_2 on flight_operators_2.id = flights.operator_2_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_3 on flight_operators_3.id = flights.operator_3_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_4 on flight_operators_4.id = flights.operator_4_id
			left join '.TBL_REGIONS.' regions on regions.id = flights.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = flights.currency_id			
			where flights.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			if (isset($data['flight_operator_2_id']) && $data['flight_operator_2_id'] > 0)
			{
				
			}
			
			return $data;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['start_continent_id'] = elementNr($set['start_continent_id']);
			$set['start_country_id'] = elementNr($set['start_country_id']);
			$set['start_region_id'] = elementNr($set['start_region_id']);
			$set['end_continent_id'] = elementNr($set['end_continent_id']);
			$set['end_country_id'] = elementNr($set['end_country_id']);
			$set['end_region_id'] = elementNr($set['end_region_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['operator_id'] = elementNr($set['operator_id']);
			
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(flights.code) like \'%'.encode($set['text']).'%\') or (LOWER(flights.title) like \'%'.encode($set['text']).'%\') or (LOWER(flights.description) like \'%'.encode($set['text']).'%\') or (LOWER(countries.code) like \'%'.encode($set['text']).'%\') or (LOWER(countries.title) like \'%'.encode($set['text']).'%\') or (LOWER(countries.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions.description) like \'%'.encode($set['text']).'%\'))';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' flights.title asc';
			if ($set['start_continent_id'] > 0) $w .= ' and (continents.id = '.encode($set['start_continent_id']).')';
			if ($set['start_country_id'] > 0) $w .= ' and (countries.id = '.encode($set['start_country_id']).')';
			if ($set['start_region_id'] > 0) $w .= ' and (flights.start_region_id = '.encode($set['start_region_id']).')';
			if ($set['end_continent_id'] > 0) $w .= ' and (continents2.id = '.encode($set['end_continent_id']).')';
			if ($set['end_country_id'] > 0) $w .= ' and (countries2.id = '.encode($set['end_country_id']).')';
			if ($set['end_region_id'] > 0) $w .= ' and (flights.end_region_id = '.encode($set['end_region_id']).')';
			if ($set['operator_id'] > 0) $w .= ' and (flights.operator_id = '.encode($set['operator_id']).')';
			
			if ($set['special1'] === '0') $w .= ' and (flights.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (flights.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (flights.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (flights.special2 = \'1\')';
			
			$sql  = 
			'
			select flights.*, 
				flight_types.title as flight_type_title, 
				flight_operators.code as flight_operator_code, flight_operators.title as flight_operator_title,
				flight_operators_2.code as flight_operator_2_code, flight_operators_2.title as flight_operator_2_title,
				flight_operators_3.code as flight_operator_3_code, flight_operators_3.title as flight_operator_3_title,
				flight_operators_4.code as flight_operator_4_code, flight_operators_4.title as flight_operator_4_title,
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title
			from '.TBL_FLIGHTS.' flights
			left join '.TBL_FLIGHT_TYPES.' flight_types on flight_types.id = flights.type_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators on flight_operators.id = flights.operator_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_2 on flight_operators_2.id = flights.operator_2_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_3 on flight_operators_3.id = flights.operator_3_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_4 on flight_operators_4.id = flights.operator_4_id
			left join '.TBL_REGIONS.' regions on regions.id = flights.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = flights.currency_id
			where flights.id > 0 '.$w.'
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
			$w = '';
			$set['region_id'] = elementNr($set['region_id']);
			$set['region_code'] = elementStr($set['region_code']);
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 150);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			if ($set['region_id'] > 0) $w .= ' and (regions2.id = '.encode($set['region_id']).')';
			if (strlen(trim($set['region_code'])) > 0) $w .= ' and (regions2.code = \''.encode($set['region_code']).'\')';
			
			
			$sql  = 
			'
			select flights.*, 
				flight_types.title as flight_type_title, flight_operators_1.title as flight_operator_title,
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id, continents.code as start_continent_code, continents.title as start_continent_title,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id, continents2.code as end_continent_code, continents2.title as end_continent_title,
				currencies.title as currency_title,
				flight_operators_1.id as flight_operator_1_id, flight_operators_1.code as flight_operator_1_code, flight_operators_1.title as flight_operator_1_title, flight_operators_1.picture as flight_operator_1_picture, 
				flight_operators_2.id as flight_operator_2_id, flight_operators_2.code as flight_operator_2_code, flight_operators_2.title as flight_operator_2_title, flight_operators_2.picture as flight_operator_2_picture, 
				flight_operators_3.id as flight_operator_3_id, flight_operators_3.code as flight_operator_3_code, flight_operators_3.title as flight_operator_3_title, flight_operators_3.picture as flight_operator_3_picture, 
				flight_operators_4.id as flight_operator_4_id, flight_operators_4.code as flight_operator_4_code, flight_operators_4.title as flight_operator_4_title, flight_operators_4.picture as flight_operator_4_picture
			from '.TBL_FLIGHTS.' flights
			left join '.TBL_FLIGHT_TYPES.' flight_types on flight_types.id = flights.type_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_1 on flight_operators_1.id = flights.operator_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_2 on flight_operators_2.id = flights.operator_2_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_3 on flight_operators_3.id = flights.operator_3_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_4 on flight_operators_4.id = flights.operator_4_id
			left join '.TBL_REGIONS.' regions on regions.id = flights.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' as regions2 on regions2.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = flights.currency_id			
			where flights.code=\''.encode($set['code']).'\' '.$w.' 
			';
			$q = new Query($sql);
			$data = $q->fetch();
			if (isset($data['id']))
			{
				$data['price1_1'] = $data['price1'];
				$data['price2_1'] = $data['price2'];
				$data['stops_description_1'] = $data['stops_description'];				
			}
			for ($i = 1; $i<=4; $i++)
			{
				if ($data['flight_operator_'.$i.'_id'] > 0)
				{
					if (strlen(trim($data['flight_operator_'.$i.'_picture'])) > 0)
					{
						$path = Bus::call('pics', 'path', array('type'=>'flight_operators', 'target_id'=>$data['flight_operator_'.$i.'_id']));
						$url = Bus::call('pics', 'url', array('type'=>'flight_operators', 'target_id'=>$data['flight_operator_'.$i.'_id']));
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$data['flight_operator_'.$i.'_title'].'" title="'.$data['flight_operator_'.$i.'_title'].'" style="border:1px solid #000;"';
						$data['flight_operator_'.$i.'_thumb'] = $picture->getTag($data['flight_operator_'.$i.'_picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					else 
					{
						$data['flight_operator_'.$i.'_thumb'] = '';
					}
				}
			}
			return $data;
		}
		
		function getArrayPriceEur($set)
		{
			$w = '';
			$lastCurrencyValueDate = Bus::call('currenciesValues', 'getLastDate');
			if(empty($lastCurrencyValueDate)) $lastCurrencyValueDate = array('date'=>date('Y-m-d'));
			
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			
			$set['sorting'] = elementStr($set['sorting']);
			
			$set['end_continent_id'] = elementNr($set['end_continent_id']);
			$set['end_country_id'] = elementNr($set['end_country_id']);
			$set['end_region_id'] = elementNr($set['end_region_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['read_id_back'] = elementNr($set['read_id_back']);
			$set['read_id_next'] = elementNr($set['read_id_next']);
			
			if ($set['read_id_back'] > 0) $w .= ' and (flights.id<'.intval($set['read_id_back']).')';
			if ($set['read_id_next'] > 0) $w .= ' and (flights.id>'.intval($set['read_id_next']).')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' flights.title asc';
			if ($set['end_continent_id'] > 0) $w .= ' and (continents2.id = '.encode($set['end_continent_id']).')';
			if ($set['end_country_id'] > 0) $w .= ' and (countries2.id = '.encode($set['end_country_id']).')';
			if ($set['end_region_id'] > 0) $w .= ' and (flights.end_region_id = '.encode($set['end_region_id']).')';
			if ($set['price_min'] > 0) $w .= ' and (flights.price2>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((flights.price2*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (flights.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (flights.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (flights.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (flights.special2 = \'1\')';
			if (strlen(trim($set['continent_id'])) > 0) $w .= ' and (countries2.continent_id in ('.$set['continent_id'].'))';
			
			$sql  = 
			'
			select flights.*, 
				flight_types.title as flight_type_title, 
				flight_operators.code as flight_operator_code, flight_operators.title as flight_operator_title,
				flight_operators_2.code as flight_operator_2_code, flight_operators_2.title as flight_operator_2_title,
				flight_operators_3.code as flight_operator_3_code, flight_operators_3.title as flight_operator_3_title,
				flight_operators_4.code as flight_operator_4_code, flight_operators_4.title as flight_operator_4_title,
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title,flights.price2*currencies_values.eur_parity as price_eur
			from '.TBL_FLIGHTS.' flights
			left join '.TBL_FLIGHT_TYPES.' flight_types on flight_types.id = flights.type_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators on flight_operators.id = flights.operator_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_2 on flight_operators_2.id = flights.operator_2_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_3 on flight_operators_3.id = flights.operator_3_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_4 on flight_operators_4.id = flights.operator_4_id
			left join '.TBL_REGIONS.' regions on regions.id = flights.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = flights.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where flights.id > 0 '.$w.'
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
		
	function getDistinctCountriesOffers($set)
		{
			$w = '';
			$group_by = '';
			$lastCurrencyValueDate = Bus::call('currenciesValues', 'getLastDate');
			if(empty($lastCurrencyValueDate)) $lastCurrencyValueDate = array('date'=>date('Y-m-d'));
			
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			
			$set['sorting'] = elementStr($set['sorting']);
			
			$set['end_continent_id'] = elementNr($set['end_continent_id']);
			$set['end_country_id'] = elementNr($set['end_country_id']);
			$set['end_region_id'] = elementNr($set['end_region_id']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			if(array_key_exists('group_by', $set)) $group_by = 'group by '.$set['group_by'];
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' flights.title asc';
			if ($set['end_continent_id'] > 0) $w .= ' and (continents2.id = '.encode($set['end_continent_id']).')';
			if ($set['end_country_id'] > 0) $w .= ' and (countries2.id = '.encode($set['end_country_id']).')';
			if ($set['end_region_id'] > 0) $w .= ' and (flights.end_region_id = '.encode($set['end_region_id']).')';
			if ($set['price_min'] > 0) $w .= ' and (flights.price2>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((flights.price2*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (flights.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (flights.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (flights.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (flights.special2 = \'1\')';
			
			$sql  = 
			'
			select flights.*, 
				flight_types.title as flight_type_title, 
				flight_operators.code as flight_operator_code, flight_operators.title as flight_operator_title,
				flight_operators_2.code as flight_operator_2_code, flight_operators_2.title as flight_operator_2_title,
				flight_operators_3.code as flight_operator_3_code, flight_operators_3.title as flight_operator_3_title,
				flight_operators_4.code as flight_operator_4_code, flight_operators_4.title as flight_operator_4_title,
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title,flights.price2*currencies_values.eur_parity as price_eur
			from '.TBL_FLIGHTS.' flights
			left join '.TBL_FLIGHT_TYPES.' flight_types on flight_types.id = flights.type_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators on flight_operators.id = flights.operator_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_2 on flight_operators_2.id = flights.operator_2_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_3 on flight_operators_3.id = flights.operator_3_id
			left join '.TBL_FLIGHT_OPERATORS.' flight_operators_4 on flight_operators_4.id = flights.operator_4_id
			left join '.TBL_REGIONS.' regions on regions.id = flights.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = flights.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where flights.id > 0 '.$w.'
			'.$group_by.'
			order by countries2.title asc, regions2.title asc 
			';
			
			$q = new Query($sql);
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$q = new Query($sql);
			$countData = $q->getArray();
			$count = count($countData);
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
	}
?>