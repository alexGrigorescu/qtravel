<?
	class BusAccommodations extends BusTable
	{	
		function BusAccommodations()
		{
			$this->setTable(TBL_ACCOMMODATIONS);
		}

		function read ($set)
		{
			$sql  = 
			'
			select accommodations.*, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.title as continent_title, continents.code as continent_code, regions.id as region_id, regions.code as region_code, regions.title as region_title, locations.id as location_id, locations.code as location_code, locations.title as location_title, locations.description as location_description, accommodation_types.stars as accommodation_type_stars, currencies.code as currency_code, currencies.title as currency_title from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where accommodations.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			return $data;
		}
		
		function readByCode($set)
		{
			$w = '';
			
			$set['region_id'] = elementNr($set['region_id']);
			$set['region_code'] = elementStr($set['region_code']);
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if (strlen(trim($set['region_code'])) > 0) $w .= ' and (regions.code = \''.encode($set['region_code']).'\')';
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			
			$sql = 
			'
			select accommodations.*, countries.id as country_id, countries.code as country_code, countries.title as country_title, continents.id as continent_id, continents.title as continent_title, continents.code as continent_code, regions.id as region_id, regions.code as region_code, regions.title as region_title, locations.id as location_id, locations.code as location_code, locations.description as location_description, locations.picture as location_picture, accommodation_types.stars as accommodation_type_stars, accommodation_types.id as accommodation_type_stars_id, currencies.code as currency_code, currencies.title as currency_title from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where accommodations.code=\''.encode($set['code']).'\' '.$w.'
			';
			$q = new Query($sql);
			$v = $q->fetch();
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
			$set['buble_offer_vacancy'] = elementStr($set['buble_offer_vacancy']);
			$set['prices'] = elementNr($set['prices']);
			$set['subtype'] = elementStr($set['subtype']);
			$set['thumb'] = elementNr($set['thumb']);
			$set['thumb_width'] = elementNr($set['thumb_width'], 100);
			$set['thumb_height'] = elementNr($set['thumb_height'], 100);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(accommodations.code) like \'%'.encode($set['text']).'%\') or (LOWER(accommodations.title) like \'%'.encode($set['text']).'%\') or (LOWER(accommodations.description) like \'%'.encode($set['text']).'%\') or (LOWER(locations.code) like \'%'.encode($set['text']).'%\') or (LOWER(locations.title) like \'%'.encode($set['text']).'%\') or (LOWER(locations.description) like \'%'.encode($set['text']).'%\') or (LOWER(countries.code) like \'%'.encode($set['text']).'%\') or (LOWER(countries.title) like \'%'.encode($set['text']).'%\') or (LOWER(countries.description) like \'%'.encode($set['text']).'%\') or (LOWER(regions.code) like \'%'.encode($set['text']).'%\') or (LOWER(regions.title) like \'%'.encode($set['text']).'%\') or (LOWER(regions.description) like \'%'.encode($set['text']).'%\'))';
			if ($set['accommodation_type_id'] > 0) $w .= ' and (accommodation_types.id=\''.encode($set['accommodation_type_id']).'\')';
			if (strlen(trim($set['stars'])) > 0) $w .= ' and (accommodation_types.stars=\''.encode($set['stars']).'\')';
			if (strlen(trim($set['stars_min'])) > 0) $w .= ' and (accommodation_types.stars>=\''.encode($set['stars_min']).'\')';
			if ($set['price_min'] > 0) $w .= ' and (accommodations.price>='.encode($set['price_min']).')';
			if ($set['location_id'] > 0) $w .= ' and (locations.id = '.encode($set['location_id']).')';
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if ($set['continent_id'] > 0) $w .= ' and (countries.continent_id = '.encode($set['continent_id']).')';
			
			if ($set['special1'] === '0') $w .= ' and (accommodations.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (accommodations.special1 = \'1\')';
			if ($set['special2'] === '0') $w .= ' and (accommodations.special2 = \'0\')';
			if ($set['special2'] === '1') $w .= ' and (accommodations.special2 = \'1\')';
			if ($set['buble_offer_vacancy'] === '0') $w .= ' and (countries.buble_offer_vacancy = \'0\')';
			if ($set['buble_offer_vacancy'] === '1') $w .= ' and (countries.buble_offer_vacancy = \'1\')';
			if (array_key_exists('transport',$set) && ($set['transport'] >= 0)) $w .= ' and (accommodations.transport = \''.elementNr($set['transport']).'\')';
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
				left join '.TBL_PRICES.' prices on prices.target_id=accommodations.id and prices.type=\'accommodations\'
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
				where type=\'accommodations\'
					and target_id=accommodations.id
					'.$w1.'
				) as subtype_count
				';
				
				$w .= 
				' 
				and 
				(
				select count(*) 
				from '.TBL_PRICES.' prices
				where type=\'accommodations\'
					and target_id=accommodations.id
					'.$w1.'
				) > 0
				';
			}
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select accommodations.*, locations.title as location_title, locations.description as location_description, locations.picture as location_picture, accommodation_types.stars as accommodation_type_stars, accommodation_types.title as accommodation_type_title, regions.code as region_code, regions.title as region_title, countries.code as country_code, countries.title as country_title,countries.buble_offer_vacancy_type as buble_offer_vacancy_type,countries.buble_offer_vacancy_value as buble_offer_vacancy_value, continents.title as continent_title, continents.code as continent_code, currencies.title as currency_title '.$f.' from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			'.$l.'
			where locations.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$sql_count  = 
			'
			select count(*) as count from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
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
			$set['location_id'] = elementNr($set['location_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['accommodation_type_id'] = elementNr($set['accommodation_type_id']);
			$set['continent_id'] = elementStr($set['continent_id']);
			$set['promo_prefix'] = elementStr($set['promo_prefix']);
			$set['read_id_back'] = elementNr($set['read_id_back']);
			$set['read_id_next'] = elementNr($set['read_id_next']);
			
			if ($set['read_id_back'] > 0) $w .= ' and (accommodations.id<'.intval($set['read_id_back']).')';
			if ($set['read_id_next'] > 0) $w .= ' and (accommodations.id>'.intval($set['read_id_next']).')';
			if ($set['price_min'] > 0) $w .= ' and (accommodations.price>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((accommodations.price*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (accommodations.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (accommodations.special1 = \'1\')';
			if (array_key_exists('transport',$set)) $w .= ' and (accommodations.transport = \''.elementNr($set['transport']).'\')';
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if (strlen(trim($set['continent_id'])) > 0) $w .= ' and (countries.continent_id in ('.$set['continent_id'].'))';
			if (strlen(trim($set['promo_prefix'])) > 0) $w .= ' and (accommodations.promo_code LIKE \'%'.encode($set['promo_prefix']).'%\')';
			if ($set['location_id'] > 0) $w .= ' and (locations.id = '.encode($set['location_id']).')';
			if ($set['accommodation_type_id'] > 0) $w .= ' and (accommodation_types.id='.encode($set['accommodation_type_id']).')';
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select accommodations.*, locations.code as location_code, locations.title as location_title, locations.description as location_description, locations.picture as location_picture, accommodation_types.stars as accommodation_type_stars, accommodation_types.title as accommodation_type_title, regions.code as region_code, regions.title as region_title, countries.code as country_code, countries.title as country_title, continents.title as continent_title, continents.code as continent_code, currencies.title as currency_title,accommodations.price*currencies_values.eur_parity as price_eur
			from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where locations.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';

			$sql_count  = 
			'
			select count(*) as count from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where locations.id > 0 '.$w.'
			';

			$q = new Query($sql, $sql_count);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);

			if ($set['thumb'] == 1)
			{
				$default_pic = empty($set['default_pic'])?'default_vacancy.jpg':$set['default_pic'];
				foreach ($data as $k=>&$v)
				{
					if (strlen(trim($v['location_picture'])) > 0)
					{
						$path = Bus::call('pics', 'path', array('type'=>'locations', 'target_id'=>$v['location_id']));
						$url = Bus::call('pics', 'url', array('type'=>'locations', 'target_id'=>$v['location_id']));
						$picture = new picture($path, '', $url);
						
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['location_thumb'] = $picture->getTag($v['location_picture'], $set['thumb_width'], $set['thumb_height'], $alt, 1, 0, 1, $default_pic);
						$thumb = $picture->getThumb($v['location_picture'],  $set['thumb_width'], $set['thumb_height'], 1, 0);
						$v['location_thumb_url'] = $picture->url.$thumb['pic'];
					}
					else 
					{	
						$path = USR_PATH.'default/';
						$url = USR_URL.'default/';
						$picture = new picture($path, '', $url);
						$alt = ' alt="'.$v['title'].'" title="'.$v['title'].'"';
						$v['location_thumb'] = $picture->getTag($default_pic, $set['thumb_width'], $set['thumb_height'], $alt, 1, 0);
						$thumb = $picture->getThumb($default_pic,  $set['thumb_width'], $set['thumb_height'], 1, 0);
						$v['location_thumb_url'] = $picture->url.$thumb['pic'];
					}
				}
			}
			
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
			$set['location_id'] = elementNr($set['location_id']);
			$set['country_id'] = elementNr($set['country_id']);
			$set['accommodation_type_id'] = elementNr($set['accommodation_type_id']);
			$set['continent_id'] = elementStr($set['continent_id']);
			$set['promo_prefix'] = elementStr($set['promo_prefix']);
			
			if ($set['price_min'] > 0) $w .= ' and (accommodations.price>='.encode($set['price_min']).')';
			if ($set['price'] > 0) $w .= ' and ((accommodations.price*currencies_values.eur_parity) <= '.encode(max($set['price']-1,0)).')';
			if ($set['special1'] === '0') $w .= ' and (accommodations.special1 = \'0\')';
			if ($set['special1'] === '1') $w .= ' and (accommodations.special1 = \'1\')';
			if (array_key_exists('transport',$set)) $w .= ' and (accommodations.transport = \''.elementNr($set['transport']).'\')';
			if ($set['region_id'] > 0) $w .= ' and (locations.region_id = '.encode($set['region_id']).')';
			if ($set['country_id'] > 0) $w .= ' and (regions.country_id = '.encode($set['country_id']).')';
			if (strlen(trim($set['continent_id'])) > 0) $w .= ' and (countries.continent_id in ('.encode($set['continent_id']).'))';
			if (strlen(trim($set['promo_prefix'])) > 0) $w .= ' and (accommodations.code LIKE \'%'.encode($set['promo_prefix']).'%\')';
			if ($set['location_id'] > 0) $w .= ' and (locations.id = '.encode($set['location_id']).')';
			if ($set['accommodation_type_id'] > 0) $w .= ' and (accommodation_types.id='.encode($set['accommodation_type_id']).')';
			if(array_key_exists('group_by', $set)) $group_by = 'group by '.$set['group_by'];
			
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' locations.title asc';
			
			$sql  = 
			'
			select accommodations.*, locations.code as location_code, locations.title as location_title, locations.description as location_description, locations.picture as location_picture, accommodation_types.stars as accommodation_type_stars, accommodation_types.title as accommodation_type_title, regions.code as region_code, regions.title as region_title, countries.code as country_code, countries.title as country_title, continents.title as continent_title, continents.code as continent_code, currencies.title as currency_title,accommodations.price*currencies_values.eur_parity as price_eur
			from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where locations.id > 0 '.$w.'
			'.$group_by.'
			order by countries.title asc, regions.title asc
			';
		
			$sql_count  = 
			'
			select count(*) as count from '.TBL_ACCOMMODATIONS.' accommodations
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			left join '.TBL_CURRENCIES_VALUES.' currencies_values on LOWER(currencies_values.code)=LOWER(currencies.code) and currencies_values.date=\''.$lastCurrencyValueDate['date'].'\'
			where locations.id > 0 '.$w.'
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