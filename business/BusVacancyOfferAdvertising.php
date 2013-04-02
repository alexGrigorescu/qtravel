<?
	class BusVacancyOfferAdvertising extends BusTable
	{	
		function BusVacancyOfferAdvertising()
		{
			$this->setTable(TBL_VACANCY_OFFER_ADVERTISING);
		}

		function getArray($set)
		{
			$w = '';
			$set['code'] = elementStr($set['code']);
			$set['title'] = elementStr($set['title']);

		
			if (strlen(trim($set['code'])) > 0) $w .= ' and (vacancy.code = \''.encode($set['code']).'\')';
			if (strlen(trim($set['title'])) > 0) $w .= ' and (vacancy.title = \''.encode($set['title']).'\')';
			if (intval($set['id']) > 0) $w .= ' and (vacancy.id = \''.intval($set['id']).'\')';
			if(array_key_exists('status', $set)) $w .= ' and (vacancy.status=\''.intval($set['status']).'\')';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' vacancy.id desc';
			
			$sql  = 
			'
			select vacancy.* , 
			case 
				when vacancy.offer_type=\'busses\' then busses.code
				when vacancy.offer_type=\'accommodations\' then accommodations.code
				when vacancy.offer_type=\'flights\' then flights.code
			end as code,
			case 
				when vacancy.offer_type=\'busses\' then regions_busses.code
				when vacancy.offer_type=\'accommodations\' then regions.code
				when vacancy.offer_type=\'flights\' then regions_flights.code
			end as region_code
			from '.TBL_VACANCY_OFFER_ADVERTISING.' vacancy
			left join '.TBL_ACCOMMODATIONS.' accommodations on accommodations.id=vacancy.offer_id
			left join '.TBL_BUSSES.' busses on busses.id=vacancy.offer_id
			left join '.TBL_FLIGHTS.' flights on flights.id=vacancy.offer_id
			left join '.TBL_LOCATIONS.' locations on locations.id = accommodations.location_id
			left join '.TBL_REGIONS.' regions on regions.id = locations.region_id
			left join '.TBL_REGIONS.' regions_busses on regions_busses.id = busses.end_region_id
			left join '.TBL_REGIONS.' regions_flights on regions_flights.id = flights.end_region_id
			left join '.TBL_COUNTRIES.' countries on countries.id = regions.country_id
			left join '.TBL_CONTINENTS.' continents on continents.id = countries.continent_id
			left join '.TBL_CURRENCIES.' currencies on currencies.id = accommodations.currency_id
			left join '.TBL_ACCOMMODATION_TYPES.' accommodation_types on accommodation_types.id = locations.accommodation_type_id
			where vacancy.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';

			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray(0,1000);
			
			if (array_key_exists('by_field',$set) && strlen(trim($set['by_field'])) > 0)
			{
				foreach ($data as $key => $value) {
					$data[$value[$set['by_field']]] = $value;
					unset($data[$key]); 
				}
			}
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
	}
?>