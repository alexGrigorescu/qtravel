<?php
	class flight
	{
		function index()
		{
			$r = Bus::call('countries', 'getArrayBy', array('by'=>'flights'));
			$continents = array();
			foreach ($r['data'] as $v) 
			{				
				$continents[$v['continent_id']]['title'] = $v['continent_title'];
				$continents[$v['continent_id']]['countries'][$v['code']] = $v;
				$continents[$v['continent_id']]['count'] = count($continents[$v['continent_id']]['countries']);
				$continents[$v['continent_id']]['percolumn'] = ceil($continents[$v['continent_id']]['count'] / 3);
			}
			
			$flights = Bus::call('flights', 'getArray', array('special1'=>'1', 'page_size'=>20, 'sorting'=>' flights.special2 desc, flights.price1 asc', 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = $meta['metatitle'] = tr('layout_flight', 'layout');
			$meta['metadescription'] = tr('layout_flight', 'layout');
			$meta['metakeywords'] = tr('layout_flight', 'layout');
			
			foreach ($continents as $k=>$v) 
			{
				$meta['metakeywords'] .= ', '.$v['title'];
				$meta['metadescription'] .= ', '.$v['title'];
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'flight';
			$types = 'flights';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_index_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'));
			
			$t = new layout('accommodation_index');
			$t->assign('continents', $continents);
			$t->assign('locations', $flights['data']);
			$t->assign('locations_count', $flights['count']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', false);		
			$t->display($meta);	
		}
		
		function continent()
		{
			$meta = array();
			$meta['title'] = '';
			$meta['metatitle'] = '';
			$meta['metadescription'] = '';
			$meta['metakeywords'] = '';
			
			$code = request('continent');
			$continent = Bus::call('continents', 'readByCode', array('code'=>$code));
			
			$r = Bus::call('countries', 'getArrayBy', array('by'=>'flights', 'continent_id'=>$continent['id']));
			$continents = array();
			foreach ($r['data'] as $v) 
			{				
				$continents[$v['continent_id']]['title'] = $v['continent_title'];
				$continents[$v['continent_id']]['countries'][$v['code']] = $v;
				$continents[$v['continent_id']]['count'] = count($continents[$v['continent_id']]['countries']);
				$continents[$v['continent_id']]['percolumn'] = ceil($continents[$v['continent_id']]['count'] / 3);
			}
			
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'continent_id'=>$continent['id'], 'page_size'=>20, 'sorting'=>' flights.special2 desc, flights.price1 asc', 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = tr ('flight_title_flights').' '.$continent['title'];
			$meta['metatitle'] = tr ('flight_title_flights').' '.$continent['title'];
			$meta['metadescription'] = tr ('flight_title_flights').' '.$continent['title'];
			$meta['metakeywords'] = tr ('flight_title_flights').' '.$continent['title'];
			
			foreach ($continents as $k=>$v) 
			{
				foreach ($v['countries'] as $k1=>$v1) 
				{
					$meta['metadescription'] .= ', '.$v1['title'];
					$meta['metakeywords'] .= ', '.$v1['title'];
				}
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'flight';
			$types = 'flights';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_index_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'), 'type_title_continent_description'=>tr($type.'_title_continent_description'));
			
			$t = new layout('accommodation_index');
			$t->assign('continent', $continent);
			$t->assign('continents', $continents);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', false);
			$t->display($meta);	
		}
		
		function country()
		{
			$code = request('country');
			$country = Bus::call('countries', 'readByCode', array('code'=>$code));
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'flights', 'country_id'=>$country['id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$regions[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$country['id']));
			$regions1 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions1[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$country['id']));
			$regions2 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions2[$v['code']] = $v;
			}
			
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'end_country_id'=>$country['id'], 'page_size'=>20, 'sorting'=>' flights.special2 desc, flights.price1 asc', 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = tr ('flight_title_flights').' '.$country['title'].', '.$country['continent_title'];
			$meta['metatitle'] = tr ('flight_title_flights').' '.$country['title'].', '.$country['continent_title'];
			$meta['metadescription'] = tr ('flight_title_flights').' '.$country['title'].', '.$country['continent_title'];
			$meta['metakeywords'] = tr ('flight_title_flights').' '.$country['title'].', '.$country['continent_title'];
			
			foreach ($regions as $k=>$v) 
			{
				$meta['metadescription'] .= ', '.$v['title'];
				$meta['metakeywords'] .= ', '.$v['title'];				
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'flight';
			$type1 = 'accommodation';
			$type2 = 'vacation';
			$types = 'flights';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_types1'=>tr($type.'_title_accommodations'), 'title_types2'=>tr($type.'_title_vacations'), 'title_country_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'), 'title_country_description'=>tr($type.'_title_country_description'));
			
			$t = new layout('accommodation_country');
			$t->assign('country', $country);
			$t->assign('regions', $regions);
			$t->assign('regions_count', count($regions));
			$t->assign('regions1', $regions1);
			$t->assign('regions1_count', count($regions1));
			$t->assign('regions2', $regions2);
			$t->assign('regions2_count', count($regions2));
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('percolumn', ceil(count($regions) / 3));
			$t->assign('percolumn1', ceil(count($regions1) / 3));
			$t->assign('percolumn2', ceil(count($regions2) / 3));
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('type1', $type1);
			$t->assign('type2', $type2);
			$t->assign('width_thumb', false);
			$t->display($meta);
		}
		
		function region()
		{
			$meta = array();
			$meta['title'] = '';
			$meta['metatitle'] = '';
			$meta['metadescription'] = '';
			$meta['metakeywords'] = '';
			
			$code = request('region');
			$region = Bus::call('regions', 'readByCode', array('code'=>$code));
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'flights', 'country_id'=>$region['country_id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url (OBJ, 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'end_region_id'=>$region['id'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107, 'sorting'=>' flights.price1 asc'));
			
			$meta = array();
			$meta['title'] = tr ('flight_title_flights').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metatitle'] = tr ('flight_title_flights').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metadescription'] = tr ('flight_title_flights').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metakeywords'] = tr ('flight_title_flights').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			
			foreach ($locations['data'] as $k=>$v) 
			{
				$meta['metadescription'] .= ', '.$v['title'];
				$meta['metakeywords'] .= ', '.$v['title'];				
			}
			
			$meta['links'] = $this->metalinks();
			//if ($GLOBALS['DOMAINS']['www']['domain'] != DOMAIN)
			{
				$meta['widthLeftBox'] = true;
				$meta['regions'] = $regions;
			}
			
			$type = 'flight';
			$types = 'flights';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_region_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'), 'title_region_description'=>tr($type.'_title_region_description'));
			
			$t = new layout('accommodation_region');
			$t->assign('region', $region);
			$t->assign('locations', $locations['data']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', false);
			$t->display($meta);
		}
		
		function location()
		{
			$meta = array();
			$meta['title'] = '';
			$meta['metatitle'] = '';
			$meta['metadescription'] = '';
			$meta['metakeywords'] = '';
			
			$code = request('location');
			$region_code = request('region');
			$region = Bus::call('regions', 'readByCode', array('code'=>$region_code));
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'flights', 'country_id'=>$region['country_id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url (OBJ, 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			$location = Bus::call('flights', 'readByCode', array('code'=>$code, 'region_id'=>$region['id'], 'thumb'=>1));			
			
			if (!isset ($location['id'])) redirect ('main', 'invalid');
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'end_region_id'=>$location['end_region_id'], 'sorting'=>' flights.price1 asc'));
			
			$meta = array();
			$meta['title'] = $location['title'].', '.$location['end_region_title'].', '.$location['end_country_title'].', '.$location['end_continent_title'];
			$meta['metatitle'] = $location['title'].', '.$location['end_region_title'].', '.$location['end_country_title'].', '.$location['end_continent_title'];
			$meta['metadescription'] = 'Super Oferte la biletele de avion pentru destinatia: '.$location['end_region_title'].', '.$location['end_country_title'].', '.$location['end_continent_title'].'. Situl contine si oferte de cazare, hotel, vacante si sejur.';
			$meta['metakeywords'] = $location['title'].', '.$location['end_region_title'].', '.$location['end_country_title'].', '.$location['end_continent_title'].', bilet avion, cazare, sejururi, bilete autocar, vacante, charter, qtravel, oferta vacanta';
			
			$meta['links'] = $this->metalinks();
			//if ($GLOBALS['DOMAINS']['www']['domain'] != DOMAIN)
			{
				$meta['widthLeftBox'] = true;
				$meta['regions'] = $regions;
			}
			
			$t = new layout('flight_location');
			$t->assign('location', $location);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->display($meta);
		}
		
		function price_value($value, $currency)
		{
			if ($value < 0)
			{
				return '-';
			}
			else 
			{
			
			}
			
			return $value.' '.$currency;
		}
		
		function rss() {
			header('Content-Type: text/xml');
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'page_size'=>100, 'sorting'=>' flights.special2 desc, flights.price1 asc'));
			
			$items = array();
			foreach ($locations['data'] as $location) {
				$items[] = array(
					'title' => str_replace('&', '&amp;', $location['title']),
					'description' => str_replace('&', '&amp;', strip_tags(smart_crop($location['description'], 320))),
					'url' => url('flight', 'location', array('location' => $location['code'], 'region'=>$location['end_region_code'])),
					'date' => time()
				);
			}
			
			
			$t = new layout('rss');
			$t->assign('items', $items);
			$t->assign('title', tr('rss_title'));
			$t->assign('today', time());
			$t->assign('lang', 'ro');
			die($t->get());
		}
		
		function metalinks()
		{
			$links = array();
			
			$countries = Bus::call('countries', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));			
			foreach ($countries['data'] as $k=>$v)
			{
				$links['countries'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations', 'layout').$v['title'], 'url'=>url('accommodation', 'country', array('country'=>$v['code'])));
			}
			
			$regions = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));
			foreach ($regions['data'] as $k=>$v)
			{
				$links['regions'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations', 'layout').$v['title'], 'url'=>url('accommodation', 'region', array('region'=>$v['code'], 'country'=>$v['country_code'])));
			}
			
			return $links;
		}
	}
?>