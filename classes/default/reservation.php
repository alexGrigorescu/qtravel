<?php
	class reservation
	{
		function index($type, $id, $err = '')
		{
			if ($type == 'vacation') $type = 'vacations';
			$table = $type;
			if ($type == 'charters' || in_array($type,  array_keys($GLOBALS['ACCOMCAT']))) $table = 'vacations';
			$location = Bus::call($table, 'read', array('id'=>$id));
			if (!isset($location['id']))
			{
				$t = new layout('main_invalid');
				$img = $t->get();
				$t->display();
				die();
			}
			if ($type == 'flights' || $type == 'busses')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['location_description'] = $location['description'];
				
				$location['region_code'] = $location['end_region_code'];
				$location['country_id'] = $location['end_country_id'];
			}
			
			$pics = array('data'=>array());
			if ($type != 'flights' &&  $type != 'busses')
			$pics = Bus::call('pics', 'getArray', array('type'=>'locations', 'target_id'=>$location['location_id'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>107));
			
			$locations = array();
			if ($type == 'accommodations') $locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>146, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc'));
			if ($type == 'busses') $locations = Bus::call('busses', 'getArray', array('special1'=>'1', 'end_region_id'=>$location['end_region_id'], 'sorting'=>' busses.price1 asc'));
			if ($type == 'charters') $locations = Bus::call('vacations', 'getArray', array('special1'=>'1', 'specialc'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>146, 'sorting'=>' accommodation_type_stars asc, vacations.price asc'));
			if (in_array($type,  array_keys($GLOBALS['ACCOMCAT']))) $locations = Bus::call('vacations', 'getArray', array('special1'=>'1', 'specialc'=>'1', 'specialo'=>'paste', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>146, 'sorting'=>' accommodation_type_stars asc, vacations.price asc'));
			if ($type == 'flights') $locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'end_region_id'=>$location['end_region_id'], 'sorting'=>' flights.price1 asc'));
			if ($type == 'vacations') $locations = Bus::call('vacations', 'getArray', array('special1'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>146, 'sorting'=>' accommodation_type_stars asc, vacations.price asc'));
			
			
			$region_code = $location['region_code'];
			$region = Bus::call('regions', 'readByCode', array('code'=>$region_code));
			$types = array ('accommodations'=>'accommodation', 'busses'=>'buss', 'charters'=>'charter', 'flights'=>'flight', 'vacations'=>'vacation');
			foreach ($GLOBALS['ACCOMCAT'] as $k=>$v)
			{
				$types[$k] = 'vacation';
			}
			$regions = array();
			if ($type == 'charters')
			{
				$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$region['country_id'], 'specialc'=>1));			
			}
			elseif (in_array($type,  array_keys($GLOBALS['ACCOMCAT'])))
			{
				$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$region['country_id'], 'specialo'=>$type));			
			}
			else 
			{
				$r = Bus::call('regions', 'getArrayBy', array('by'=>$type, 'country_id'=>$region['country_id']));
			}
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url ($types[$type], 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			
			//get prices
			$prices = Bus::call('prices', 'getArray', array('type'=>$table, 'target_id'=>$location['id'], 'page_size'=>1000));
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
			$meta['title'] = tr ('reservation_'.$type).' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metatitle'] = tr ('reservation_'.$type).' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metadescription'] = tr ('reservation_'.$type).' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metakeywords'] = tr ('reservation_'.$type).' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metadescription'] .= ', '.smart_crop(strip_tags($location['location_description']), 256);
			
			$meta['widthLeftBox'] = true;
			$meta['regions'] = $regions;
			
			$form = new DefReservationForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			$form->loadFromArray($request);
			
			$t = new layout('reservation_index');
			$t->assign('type', $type);
			$t->assign('type_title', tr('reservation_'.$type));
			$t->assign('location', $location);
			$t->assign('locations', $locations);
			$t->assign('pics', $pics['data']);
			$t->assign('prices', $prices_format);
			$t->assign('prices_count', $prices['count']);		
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
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
		
		function save($type, $id)
		{
			if ($type == 'vacation') $type = 'vacations';
			$table = $type;
			if ($type == 'charters' || in_array($type,  array_keys($GLOBALS['ACCOMCAT']))) 
			{
				$table = 'vacations';
				$type = 'vacations';
			}
			$location = Bus::call($table, 'read', array('id'=>$id));
			if ($type == 'flights')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['location_description'] = $location['description'];
			}		
			
			$form = new DefReservationForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				if ($type == 'flights' || $type == 'busses')
				{
					$request['title'] = $location['title'];
				}
				else 
				{
					$request['title'] = $location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
				}
				
				$location = Bus::call($table, 'read', array('id'=>$id));
				if ($type =='accommodations')
				{
					$url = url('accommodation', 'location', array('location'=>$location['location_code'], 'region'=>$location['region_code'], 'country'=>$location['country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].'</a>';
				}
				elseif($type =='vacations')
				{
					$url = url('vacation', 'location', array('location'=>$location['location_code'], 'region'=>$location['region_code'], 'country'=>$location['country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].'</a>';
				}
				elseif($type =='charters')
				{
					$url = url('charter', 'location', array('location'=>$location['location_code'], 'region'=>$location['region_code'], 'country'=>$location['country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'].'</a>';
				}
				elseif($type =='flights')
				{
					$url = url('flight', 'location', array('location'=>$location['code'], 'region'=>$location['end_region_code'], 'country'=>$location['end_country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].'</a>';
				}
				elseif($type =='busses')
				{
					$url = url('buss', 'location', array('location'=>$location['code'], 'region'=>$location['end_region_code'], 'country'=>$location['end_country_code']));
					$request['link'] = '<a href="'.$url.'" target="_blank">'.tr ('layout_reservation').' '.$request['title'].'</a>';
				}
				$request['type'] = $type;
				$request['message'] = nl2br($request['message']);
				$request['ip'] = $_SERVER['REMOTE_ADDR'];
				$request['domain'] = $_SERVER['HTTP_HOST'];
				
				$this->mail($request);
				
				redirect(OBJ, 'thanks');
			}
			else 
			{
				$err_msg = $form->getFirstErrorCode();
				$this->index($type, $id, $err_msg['message']);
				return false;
			}
		}
		
		function thanks($type, $id)
		{
			if ($type == 'vacation') $type = 'vacations';
			$table = $type;
			if ($type == 'charters' || in_array($type,  array_keys($GLOBALS['ACCOMCAT']))) $table = 'vacations';
			$location = Bus::call($table, 'read', array('id'=>$id));
			if ($type == 'flights' || $type == 'busses')
			{
				$location['region_title'] = $location['end_region_title'];
				$location['country_title'] = $location['end_country_title'];
				$location['continent_title'] = $location['end_continent_title'];
				$location['location_description'] = $location['description'];
			}
			
			
			
			$meta = array();
			$meta['title'] = tr ('layout_reservation').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metatitle'] = tr ('layout_reservation').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metadescription'] = tr ('layout_reservation').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metakeywords'] = tr ('layout_reservation').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$meta['metadescription'] .= ', '.smart_crop(strip_tags($location['location_description']), 256);
			
			$t = new layout('reservation_thanks');
			$t->assign('location', $location);
			$t->display($meta);
		}
		
		function mail($info)
		{
			$from = $info['email'];
			$to = $GLOBALS['ADMIN_EMAIL'];
			$to1 = $GLOBALS['SUPPORT_EMAIL'];
			
			$subj = tr('reservation_'.$info['type'].'_mail_subj');
			$body = tr('reservation_'.$info['type'].'_mail_body');
			
			$subj = str_replace_params($info, $subj);
			$body = str_replace_params($info, $body);

			Mail::send($to, $subj, $body, $from);
			//Mail::send($to1, $subj, $body, $from);
		}
	}
?>