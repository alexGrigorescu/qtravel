<?
	class BusVacations extends BusTable
	{	
		function BusVacations()
		{
			$this->setTable(TBL_VACATIONS);
		}

		function read ($set)
		{
			$sql  = 
			'
			select vacations.*, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.title as continent_title, continents.code as continent_code, regions.id as region_id, regions.code as region_code, regions.title as region_title, locations.code as location_code, locations.title as location_title, locations.id as location_id, locations.description as location_description, accommodation_types.stars as accommodation_type_stars, currencies.code as currency_code, currencies.title as currency_title from '.TBL_VACATIONS.' vacations
			left join '.TBL_LOCATIONS.' locations on locations.id = vacations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = vacations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where vacations.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			return $data;
		}
		
		function getArray($set)
		{
			$f = '';
			$w = '';
			$l = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = strtolower(elementStr($set['text']));
			$set['location_id'] = elementNr($set['location_id']);
			$set['region_id'] = elementNr($set['region_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['continent_id'] = elementNr($set['continent_id']);
			$set['accommodation_type_id'] = elementNr($set['accommodation_type_id']);
			$set['stars'] = elementStr($set['stars']);
			$set['stars_min'] = elementStr($set['stars_min']);
			$set['price_min'] = elementNr($set['price_min']);
			$set['sorting'] = elementStr($set['sorting']);
			$set['special1'] = elementStr($set['special1']);
			$set['special2'] = elementStr($set['special2']);
			$set['specialc'] = elementStr($set['specialc']);
			$set['specialo'] = elementStr($set['specialo']);
			$set['prices'] = elementNr($set['prices']);
			$set['subtype'] = elementStr($set['subtype']);
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(vacations.code) like \'%'.encode($set['text']).'%\') or (LOWER(vacations.title) like \'%'.encode($set['text']).'%\') or (LOWER(vacations.description) like \'%'.encode($set['text']).'%\') or (LOWER(locations.code) like \'%'.encode($set['text']).'%\') or (LOWER(locations.title) like \'%'.encode($set['text']).'%\') or (LOWER(locations.description) like \'%'.encode($set['text']).'%\') or (LOWER(countries.code) like \'%'.encode($set['text']).'%\') or (LOWER(countries.title) like \'%'.encode($set['text']).'%\') or (LOWER(countries.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions.description) like \'%'.encode($set['text']).'%\'))';
			if ($set['accommodation_type_id'] > 0) $w .= ' and (accommodation_types.id=\''.encode($set['accommodation_type_id']).'\')';
			if (strlen(trim($set['stars'])) > 0) $w .= ' and (accommodation_types.stars=\''.encode($set['stars']).'\')';
			if (strlen(trim($set['stars_min'])) > 0) $w .= ' and (accommodation_types.stars>=\''.encode($set['stars_min']).'\')';
			if ($set['price_min'] > 0) $w .= ' and (vacations.price>='.encode($set['price_min']).')';
			
			if ($set['location_id'] > 0) $w .= ' and (locations.id = '.encode($set['location_id']).')';
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			
			if ($set['special1'] === '0') $w .= ' and (vacations.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (vacations.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (vacations.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (vacations.special2 = \'1\')';
			if ($set['specialc'] === '0') $w .= ' and (vacations.specialc = \'0\')';
			if ($set['specialc'] === '1') $w .= ' and (vacations.specialc = \'1\')';

			if (strlen(trim($set['specialo'])) > 0) $w .= ' and (vacations.specialo = \''.encode($set['specialo']).'\' or vacations.specialo1 = \''.encode($set['specialo']).'\' or vacations.specialo2 = \''.encode($set['specialo']).'\' or vacations.specialo3 = \''.encode($set['specialo']).'\')';
			
			if ($set['prices'] > 0)
			{
				
				$f .= 
				', 
				prices.subtype as price_subtype,
				prices.date_start as price_date_start,
				prices.date_end as price_date_end,
				prices.price_single as price_price_single, 
				prices.price_double as price_price_double,
				prices.price_3adult as price_price_3adult,
				prices.price_triple as price_price_triple,
				prices.price_1child as price_price_1child,
				prices.price_2child as price_price_2child,
				prices.price_extra1 as price_price_extra1,
				prices.price_extra2 as price_price_extra2,
				prices.price_extra3 as price_price_extra3
				';
				$l .= 
				'
				left join '.TBL_PRICES.' prices on prices.target_id=vacations.id and prices.type=\'vacations\'
				';
			}
			
			if (strlen(trim($set['subtype'])) > 0 && isset($GLOBALS['SUBTYPES'][$set['subtype']]))
			{
				$subtype = $GLOBALS['SUBTYPES'][$set['subtype']];
				$w1 = '';
				$w1 .= ' and (0=1 ';
				foreach ($subtype['match'] as $match)
				{
					$w1 .= ' or lower(subtype) like \'%'.encode($match).'%\'';
				}
				$w1 .= ')';
				
				if (count($subtype['unmatch']) > 0)
				{
					$w1 .= ' and (0=1 ';
					foreach ($subtype['unmatch'] as $match)
					{
						$w1 .= ' or lower(subtype) not like \'%'.encode($match).'%\'';
					}
					$w1 .= ')';
				}
				
				$f .= 
				'
				,
				(
				select count(*) 
				from '.TBL_PRICES.' prices
				where type=\'vacations\'
					and target_id=vacations.id
					'.$w1.'
				) as subtype_count
				';
				
				$w .= 
				' 
				and 
				(
				select count(*) 
				from '.TBL_PRICES.' prices
				where type=\'vacations\'
					and target_id=vacations.id
					'.$w1.'
				) > 0
				';
			}
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select vacations.*, locations.title as location_title, locations.description as location_description, locations.picture as location_picture, accommodation_types.stars as accommodation_type_stars, accommodation_types.title as accommodation_type_title, regions.title as region_title, regions.code as region_code, countries.title as country_title, countries.code as country_code, continents.title as continent_title, continents.code as continent_code, currencies.title as currency_title '.$f.' from '.TBL_VACATIONS.' vacations
			left join '.TBL_LOCATIONS.' locations on locations.id = vacations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = vacations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			'.$l.'
			where locations.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$sql_count  = 
			'
			select count(*) as count from '.TBL_VACATIONS.' vacations
			left join '.TBL_LOCATIONS.' locations on locations.id = vacations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = vacations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			'.$l.'
			where locations.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql, $sql_count);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			if ($set['thumb'] == 1)
			{
				foreach ($data as $k=>&$v)
				{
					if (strlen(trim($v['location_picture'])) > 0)
					{
						$path = Bus::call('pics', 'path', array('type'=>'locations', 'target_id'=>$v['location_id']));
						$url = Bus::call('pics', 'url', array('type'=>'locations', 'target_id'=>$v['location_id']));
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['location_thumb'] = $picture->getTag($v['location_picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
					else 
					{
						$path = USR_PATH.'default/';
						$url = USR_URL.'default/';
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['location_thumb'] = $picture->getTag('default.jpg', $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
					}
				}
			}
			
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
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if (strlen(trim($set['region_code'])) > 0) $w .= ' and (regions.code = \''.encode($set['region_code']).'\')';
			
			$sql = 
			'
			select vacations.*, locations.title as location_title, locations.description as location_description, locations.picture as location_picture, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.title as continent_title, continents.code as continent_code, regions.id as region_id, regions.code as region_code, regions.title as region_title, locations.id as location_id, locations.description as location_description, accommodation_types.stars as accommodation_type_stars, currencies.code as currency_code, currencies.title as currency_title from '.TBL_VACATIONS.' vacations
			left join '.TBL_LOCATIONS.' locations on locations.id = vacations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = vacations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where vacations.code=\''.encode($set['code']).'\' '.$w.'
			';
			$q = new Query($sql);
			$v =  $q->fetch();
			if ($set['thumb'] == 1)
			{
				if (strlen(trim($v['location_picture'])) > 0)
				{
					$path = Bus::call('pics', 'path', array('type'=>'locations', 'target_id'=>$v['location_id']));
					$url = Bus::call('pics', 'url', array('type'=>'locations', 'target_id'=>$v['location_id']));
					$picture = new picture($path, '', $url);
					$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
					$v['location_thumb'] = $picture->getTag($v['location_picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
				}
				else 
				{
					$path = USR_PATH.'default/';
					$url = USR_URL.'default/';
					$picture = new picture($path, '', $url);
					$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
					$v['location_thumb'] = $picture->getTag('default.jpg', $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
				}
			}
			return $v;
		}
	}
?>