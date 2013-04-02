<?php
	class accommodation
	{
		function index()
		{
			$r = Bus::call('countries', 'getArrayBy', array('by'=>'accommodations'));
			$continents = array();
			foreach ($r['data'] as $v) 
			{				
				$continents[$v['continent_id']]['title'] = $v['continent_title'];
				$continents[$v['continent_id']]['countries'][$v['code']] = $v;
				$continents[$v['continent_id']]['count'] = count($continents[$v['continent_id']]['countries']);
				$continents[$v['continent_id']]['percolumn'] = ceil($continents[$v['continent_id']]['count'] / 3);
			}
			
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'page_size'=>20, 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc', 'stars_min'=>3, 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = $meta['metatitle'] = tr('layout_accommodation', 'layout');
			$meta['metadescription'] = tr('layout_accommodation', 'layout');
			$meta['metakeywords'] = tr('layout_accommodation', 'layout');
			
			foreach ($continents as $k=>$v) 
			{
				$meta['metakeywords'] .= ', '.$v['title'];
				$meta['metadescription'] .= ', '.$v['title'];
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'accommodation';
			$types = 'accommodations';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_index_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'));
			
			$t = new layout('accommodation_index');
			$t->assign('continents', $continents);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', true);
			$t->display($meta);	
		}
		
		function continent()
		{
			$code = request('continent');
			$continent = Bus::call('continents', 'readByCode', array('code'=>$code));
			
			$r = Bus::call('countries', 'getArrayBy', array('by'=>'accommodations', 'continent_id'=>$continent['id']));
			$continents = array();
			foreach ($r['data'] as $v) 
			{				
				$continents[$v['continent_id']]['title'] = $v['continent_title'];
				$continents[$v['continent_id']]['countries'][$v['code']] = $v;
				$continents[$v['continent_id']]['count'] = count($continents[$v['continent_id']]['countries']);
				$continents[$v['continent_id']]['percolumn'] = ceil($continents[$v['continent_id']]['count'] / 3);
			}
			
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'continent_id'=>$continent['id'], 'page_size'=>20, 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc', 'stars_min'=>3, 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = tr ('accommodation_title_accommodations').' '.$continent['title'];
			$meta['metatitle'] = tr ('accommodation_title_accommodations').' '.$continent['title'];
			$meta['metadescription'] = tr ('accommodation_title_accommodations').' '.$continent['title'];
			$meta['metakeywords'] = tr ('accommodation_title_accommodations').' '.$continent['title'];
			
			foreach ($continents as $k=>$v) 
			{
				foreach ($v['countries'] as $k1=>$v1) 
				{
					$meta['metadescription'] .= ', '.$v1['title'];
					$meta['metakeywords'] .= ', '.$v1['title'];
				}
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'accommodation';
			$types = 'accommodations';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_index_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'));
			
			$t = new layout('accommodation_index');
			$t->assign('continent', $continent);
			$t->assign('continents', $continents);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', true);
			$t->display($meta);
		}
		
		function country()
		{
			$code = request('country');
			$country = Bus::call('countries', 'readByCode', array('code'=>$code));
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$country['id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$regions[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$country['id']));
			$regions1 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions1[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'flights', 'country_id'=>$country['id']));
			$regions2 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions2[$v['code']] = $v;
			}
			
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'country_id'=>$country['id'], 'page_size'=>20, 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc', 'stars_min'=>3, 'price_min'=>1));
			
			$meta = array();
			$meta['title'] = tr ('accommodation_title_accommodations').' '.$country['title'].', '.$country['continent_title'];
			$meta['metatitle'] = tr ('accommodation_title_accommodations').' '.$country['title'].', '.$country['continent_title'];
			$meta['metadescription'] = tr ('accommodation_title_accommodations').' '.$country['title'].', '.$country['continent_title'];
			$meta['metakeywords'] = tr ('accommodation_title_accommodations').' '.$country['title'].', '.$country['continent_title'];
			
			foreach ($regions as $k=>$v) 
			{
				$meta['metadescription'] .= ', '.$v['title'];
				$meta['metakeywords'] .= ', '.$v['title'];				
			}
			
			$meta['links'] = $this->metalinks();
			
			$type = 'accommodation';
			$type1 = 'vacation';
			$type2 = 'flight';
			$types = 'accommodations';
			
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_types1'=>tr($type.'_title_vacations'), 'title_types2'=>tr($type.'_title_flights'), 'title_country_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'), 'title_country_description'=>tr($type.'_title_country_description'));
			
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
			$t->assign('width_thumb', true);
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
			
			$subtype = request('subtype');
			$subtypes = Bus::call('prices', 'getSubTypes', array('region_id'=>$region['id'], 'type'=>'accommodations'));
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$region['country_id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url (OBJ, 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'subtype'=>$subtype, 'region_id'=>$region['id'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>100, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc'));
			
			$meta = array();
			$meta['title'] = tr ('accommodation_title_accommodations').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metatitle'] = tr ('accommodation_title_accommodations').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metadescription'] = tr ('accommodation_title_accommodations').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			$meta['metakeywords'] = tr ('accommodation_title_accommodations').' '.$region['title'].', '.$region['country_title'].', '.$region['continent_title'];
			
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
			
			$type = 'accommodation';
			$types = 'accommodations';
			$tr = array('layout_type'=>tr('layout_'.$type, 'layout'), 'title_types'=>tr($type.'_title_'.$types), 'title_region_types'=>tr($type.'_title_index_'.$types), 'type_price'=>tr($type.'_price'), 'title_region_description'=>tr($type.'_title_region_description'));
			
			$t = new layout('accommodation_region');
			$t->assign('region', $region);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('subtype', $subtype);
			$t->assign('subtypes', $subtypes['data']);
			$t->assign('tr', $tr);
			$t->assign('type', $type);
			$t->assign('width_thumb', true);
			$t->display($meta);
		}
		
		function location()
		{
			$code = request('location');
			$region_code = request('region');
			$region = Bus::call('regions', 'readByCode', array('code'=>$region_code));
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$region['country_id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url (OBJ, 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			$location = Bus::call('accommodations', 'readByCode', array('code'=>$code, 'region_id'=>$region['id']));
			if (!isset ($location['id'])) redirect ('main', 'invalid');		
			$pics = Bus::call('pics', 'getArray', array('type'=>'locations', 'target_id'=>$location['location_id'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107));
			$prices = Bus::call('prices', 'getArray', array('type'=>'accommodations', 'target_id'=>$location['id'], 'page_size'=>1000));
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>100, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc'));
			$prices_format = array();
			foreach($prices['data'] as $k=>$v)
			{
				$subtype = md5($v['subtype']);
				
				$v['price_double_format'] = $this->price_value($v['price_double'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_single_format'] = $this->price_value($v['price_single'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_3adult_format'] = $this->price_value($v['price_3adult'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_triple_format'] = $this->price_value($v['price_triple'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_1child_format'] = $this->price_value($v['price_1child'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_2child_format'] = $this->price_value($v['price_2child'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_extra1_format'] = $this->price_value($v['price_extra1'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_extra2_format'] = $this->price_value($v['price_extra2'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				$v['price_extra3_format'] = $this->price_value($v['price_extra3'], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
				
				$prices_format[$subtype]['title'] = $v['subtype'];
				$prices_format[$subtype]['prices'][$k] = $v;
			}
			
			$meta = array();
			$meta['title'] = tr ('accommodation_title_accommodations').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metatitle'] = tr ('accommodation_title_accommodations').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metadescription'] = tr ('accommodation_title_accommodations').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].', '.tr('main_title', 'main');
			$meta['metakeywords'] = tr ('accommodation_title_accommodations').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].', '.tr('main_title', 'main');
			$meta['metadescription'] .= ', '.smart_crop(strip_tags($location['location_description']), 256);
			
			foreach ($locations['data'] as $k=>$v) 
			{
				$meta['metakeywords'] .= ', '.$v['title'];				
			}
			
			$meta['links'] = $this->metalinks();
			//if ($GLOBALS['DOMAINS']['www']['domain'] != DOMAIN)
			{
				$meta['widthLeftBox'] = true;
				$meta['regions'] = $regions;
			}
			
			$t = new layout('accommodation_location');
			$t->assign('location', $location);
			$t->assign('pics', $pics['data']);
			$t->assign('prices', $prices_format);
			$t->assign('prices_count', $prices['count']);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->display($meta);
		}
		
		function price_value($value, $currency, $extrav = 0, $extrap = 0)
		{
			if ($value < 0) return '-';
			if ($value > 0) 
			{
				$value = $value * (1 + $extrap / 100) + $extrav;
				$decimal = $value * 10 % 10;
				if ($decimal > 5) $value = ceil ($value);
				else if (0 < $decimal && $decimal <= 5) $value = floor ($value) + 0.5;
			}
			if ($value < 0) $value = 0;
			
			if ($currency == 'EUR') $currency_format = '&euro;';
			if ($currency == 'USD') $currency_format = '$';
			if ($currency == 'LEI') $currency_format = 'lei';
			return number_format($value, 1, '.', '');
		}
		
		function rss() {
			header('Content-Type: text/xml');
			$locations = Bus::call('accommodations', 'getArray', array('page_size'=>100, 'stars'=>3, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc', 'stars_min'=>3, 'price_min'=>1));
			
			$items = array();
			foreach ($locations['data'] as $location) {
				$items[] = array(
					'id' => $location['id'],
					'title' => str_replace('&', '&amp;', $location['title']),
					'description' => str_replace('&', '&amp;', strip_tags(smart_crop($location['location_description'], 320))),
					'url' => url('accommodation', 'location', array('location' => $location['code'], 'region'=>$location['region_code'])),
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