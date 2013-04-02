<?
	class BusBusses extends BusTable
	{	
		function BusBusses()
		{
			$this->setTable(TBL_BUSSES);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select busses.*, 
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id, continents2.code as end_continent_code, continents2.title as end_continent_title,
				currencies.title as currency_title
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id			
			where busses.id=\''.encode($set['id']).'\'
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
			
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(busses.code) like \'%'.encode($set['text']).'%\') or (LOWER(busses.title) like \'%'.encode($set['text']).'%\') or (LOWER(busses.description) like \'%'.encode($set['text']).'%\') or (LOWER(countries.code) like \'%'.encode($set['text']).'%\') or (LOWER(countries.title) like \'%'.encode($set['text']).'%\') or (LOWER(countries.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions2.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions.description) like \'%'.encode($set['text']).'%\'))';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' busses.title asc';
			if ($set['start_continent_id'] > 0) $w .= ' and (continents.id = '.encode($set['start_continent_id']).')';
			if ($set['start_country_id'] > 0) $w .= ' and (countries.id = '.encode($set['start_country_id']).')';
			if ($set['start_region_id'] > 0) $w .= ' and (busses.start_region_id = '.encode($set['start_region_id']).')';
			if ($set['end_continent_id'] > 0) $w .= ' and (continents2.id = '.encode($set['end_continent_id']).')';
			if ($set['end_country_id'] > 0) $w .= ' and (countries2.id = '.encode($set['end_country_id']).')';
			if ($set['end_region_id'] > 0) $w .= ' and (busses.end_region_id = '.encode($set['end_region_id']).')';
			
			if ($set['special1'] === '0') $w .= ' and (busses.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (busses.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (busses.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (busses.special2 = \'1\')';
			
			$sql  = 
			'
			select busses.*, 
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id
			where busses.id > 0 '.$w.'
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
			$sql  = 
			'
			select busses.*, 
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id, continents.code as start_continent_code, continents.title as start_continent_title,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id, continents2.code as end_continent_code, continents2.title as end_continent_title,
				currencies.title as currency_title
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id			
			where busses.code=\''.encode($set['code']).'\'
			';
			$q = new Query($sql);
			return $q->fetch();
		}
		
		function getArrayPriceEur($set)
		{
			$w = '';
			$lastCurrencyValueDate = Bus::call('currenciesValues', 'getLastDate');
			if(empty($lastCurrencyValueDate)) $lastCurrencyValueDate = array('date'=>date('Y-m-d'));

			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['price_min'] = elementNr($set['price_min']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['special1'] = elementStr($set['special1']);
			$set['price'] = elementNr($set['price']);
			$set['region_id'] = elementNr($set['region_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['continent_id'] = elementStr($set['continent_id']);
			$set['read_id_back'] = elementNr($set['read_id_back']);
			$set['read_id_next'] = elementNr($set['read_id_next']);
			
			if ($set['read_id_back'] > 0) $w .= ' and (busses.id<'.intval($set['read_id_back']).')';
			if ($set['read_id_next'] > 0) $w .= ' and (busses.id>'.intval($set['read_id_next']).')';
			if ($set['price_min'] > 0) $w .= ' and (busses.price1>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((busses.price1*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (busses.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (busses.special1 = \'1\')';
			if ($set['region_id'] > 0) $w .= ' and (regions2.id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions2.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries2.continent_id in ('.$set['continent_id'].'))';

			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' regions.title asc';
			
			$sql  = 
			'
			select busses.*, 
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title, busses.price1*currencies_values.eur_parity as price_eur		
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where 1 '.$w.'
			order by '. $set['sorting'].'
			';

			$sql_count  = 
			'
			select count(*) as count 
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where 1 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql, $sql_count);
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
			$set['price_min'] = elementNr($set['price_min']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['special1'] = elementStr($set['special1']);
			$set['price'] = elementNr($set['price']);
			$set['region_id'] = elementNr($set['region_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['continent_id'] = elementStr($set['continent_id']);
			if ($set['price_min'] > 0) $w .= ' and (busses.price1>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((busses.price1*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (busses.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (busses.special1 = \'1\')';
			if ($set['region_id'] > 0) $w .= ' and (regions2.id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions2.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries2.continent_id in ('.encode($set['continent_id']).'))';
			if(array_key_exists('group_by', $set)) $group_by = 'group by '.$set['group_by'];
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' regions.title asc';
			
			$sql  = 
			'
			select busses.*, 
				regions.code as start_region_code, regions.title as start_region_title, countries.code as start_country_code, countries.title as start_country_title, countries.id as start_country_id, countries.continent_id as start_continent_id,
				regions2.code as end_region_code, regions2.title as end_region_title, countries2.code as end_country_code, countries2.title as end_country_title, countries2.id as end_country_id, countries2.continent_id as end_continent_id,
				currencies.title as currency_title, busses.price1*currencies_values.eur_parity as price_eur		
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where 1 '.$w.'
			'.$group_by.'
			order by countries2.title asc, regions2.title asc 
			';

			$sql_count  = 
			'
			select count(*) as count 
			from '.TBL_BUSSES.' busses
			left join '.TBL_REGIONS.' regions on regions.id = busses.start_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_REGIONS.' regions2 on regions2.id = busses.end_region_id
			left join '.TBL_COUNTRIES.' countries2 on countries2.id = regions2.country_id
			left join '.TBL_CONTINENTS.' continents2 on continents2.id = countries2.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = busses.currency_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where 1 '.$w.'
			'.$group_by.'
			';
			
			$q = new Query($sql);
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$q = new Query($sql_count);
			$countData = $q->getArray();
			$count = count($countData);
			
			$response = array();
		    $response['count'] = $count;
		    $response['data'] = $data;

		    return $response;
		}
	}
?>