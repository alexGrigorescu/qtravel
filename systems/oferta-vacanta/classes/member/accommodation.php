<?php
	class accommodation
	{
		function location($code = '', $region_code = '')
		{	
			$stripStyle = '/style=["\']+([A-Z0-9:\ -;>]*)["\']+[ >]*/i';
			$new_layout = (strlen(trim((request('new_layout'))))>0)?request('new_layout'):'accommodation_location';
			$code = empty($code)?request('location'):$code;
			$region_code = empty($region_code)?request('region'):$region_code;

			$region = Bus::call('regions', 'readByCode', array('code'=>$region_code));
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$region['country_id']));
			$image_width=117;
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$v['url'] = url (OBJ, 'region', array('region'=>$v['code'], 'country'=>$v['country_code']));
				$regions[$v['code']] = $v;
			}
			$location = Bus::call('accommodations', 'readByCode', array('code'=>$code, 'region_id'=>$region['id']));
			
			if (!isset ($location['id'])) redirect ('main', 'invalid');		
			
			$locationNext = Bus::call('accommodations', 'getArrayPriceEur', array('read_id_next'=>$location['id'],'special1'=>1, 'sorting'=>'id asc', 'page'=>0,'page_size'=>1));
			$locationBack = Bus::call('accommodations', 'getArrayPriceEur', array('read_id_back'=>$location['id'],'special1'=>1, 'sorting'=>'id desc', 'page'=>0,'page_size'=>1));
			$priceImages1Night = array();
			$priceImages7Night = array();
			$priceImages = Bus::call('accommodationsPriceImages', 'getArray', array('accommodation_id'=>$location['id']));
			foreach ($priceImages['data'] as $priceImage){
				if(in_array($priceImage['period_id'],array(21,22,39,40,41,42,43,44,45,46,47,48,49,50))){
					$priceImages7Night[] = $priceImage;
				}
			}
			
			$pics = Bus::call('pics', 'getArray', array('type'=>'locations', 'target_id'=>$location['location_id'], 'thumb'=>1, 'thumb_width'=>133, 'thumb_height'=>98));
			$prices = Bus::call('prices', 'getArray', array('type'=>'accommodations', 'target_id'=>$location['id'], 'page_size'=>1000));
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>100, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc'));
			$prices_format = array();
			
			$accommodationPeriods = array(
				22 => 7,39 => 2,40 => 3,41 => 4,42 => 5,43 => 6,44 => 8,45 => 9,46 => 10,47 => 11,48 => 12,49 => 13,50 => 14
			);
			if(intval($location['accommodation_period']) == 21){//one night
				$location['price7'] = number_format(round($location['price']*7,2), 2, '.', '');
			}

			foreach($prices['data'] as $k=>$v)
			{
				$subtype = md5($v['subtype']);
				
				$priceTypeList = array( 'price_double','price_single','price_3adult','price_triple','price_1child','price_2child',
										'price_extra1','price_extra2','price_extra3');
				
				foreach ($priceTypeList as $priceType){
					$v['night'][$priceType."_format"] = $this->price_value($v[$priceType], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
					if(intval($location['accommodation_period']) == 21){//one night
						$v['night7'][$priceType."_format"] = number_format((intval($v['night'][$priceType."_format"]) > 0)?$v['night'][$priceType."_format"]*7:$v['night'][$priceType."_format"], 1, '.', '');
					}
				}
								
				$prices_format[$subtype]['title'] = $v['subtype'];
				$prices_format[$subtype]['prices'][$k] = $v;
			}
			
			$meta = array();
			$meta['title'] = tr ('accommodation_title_accommodations').' '.$location['title'].', '.$location['region_title'].', '.$location['country_title'].', '.$location['continent_title'];
			$transport = array(0=>'Individual',1=>'Avion',2=>'Autocar');
			
			$object = 'accommodation_';
			switch ($location['transport']) {
				case 0:
					$object .= 'individual';
					break;
				case 1:
					$object .= 'plane';
					break;
				case 2:
					$object .= 'bus';
					break;
			}
			
			if(intval($location['accommodation_period']) == 22){//seven nights
				$priceImages1Night = $priceImages7Night;//pentru ca se afiseaza doar tariful pe 7 nopti in acest caz
			}
			$location['location_description'] = ltrim(strip_tags(nl2br($location['location_description']),'<br>'),'&nbsp;,<br>');
			$location['description'] = ltrim(strip_tags(nl2br($location['description']),'<br>'),'&nbsp;,<br>');
			$location['description_included'] = ltrim(strip_tags(nl2br($location['description_included']),'<br>'),'&nbsp;,<br>');
			$location['description_not_included'] = ltrim(strip_tags(nl2br($location['description_not_included']),'<br>'),'&nbsp;,<br>');
			$location['description_early_booking'] = ltrim(strip_tags(nl2br($location['description_early_booking']),'<br>'),'&nbsp;,<br>');
			$location['description_special_offer'] = ltrim(strip_tags(nl2br($location['description_special_offer']),'<br>'),'&nbsp;,<br>');

			
			$sitemap = array(
				'site_id' => 2,
				'url' => 'http://'.WEB.'.'.DOMAIN.'/cazare/'.$location['region_code'].'/'.$location['code'].'.html',
				'url_md5' => md5('http://'.WEB.'.'.DOMAIN.'/cazare/'.$location['region_code'].'/'.$location['code'].'.html'),
				'url_title' => $location['title'],
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			//start get similar offers
			$set = array('special1'=>'1', 'page_size'=>3, 'page'=>0, 'sorting'=>'id desc','read_id_back'=>$location['id'], 'price_min'=>1, 'transport'=>$location['transport'], 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'continent_id'=>$location['continent_id']);
			if($location['country_id'] > 0) $set['country_id'] = $location['country_id'];
			$locationsBackResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
			
			$set = array('special1'=>'1', 'page_size'=>3, 'page'=>0, 'sorting'=>'id asc','read_id_next'=>$location['id'], 'price_min'=>1, 'transport'=>$location['transport'], 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'continent_id'=>$location['continent_id']);
			if($location['country_id'] > 0) $set['country_id'] = $location['country_id'];
			$locationsNextResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
			
			$similarOffers = array();
			if($locationsBackResponse['count'] > 0){
				foreach($locationsBackResponse['data'] as $locationInfo){
					$similarOffers[] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['region_title'],
						'region_code'	=> $locationInfo['region_code'],
						'country_title'	=> $locationInfo['country_title'],
						'location_thumb_url'	=> $locationInfo['location_thumb_url'],
						'accommodation_type_stars'=> $locationInfo['accommodation_type_stars'],
						'early_value'=>$displayEarlyPercent,
						'location_description'	=> ltrim(smart_crop(strip_tags($locationInfo['location_description']), 250),'&nbsp;,<br>')
					);
				}
			}
			if($locationsNextResponse['count'] > 0){
				foreach($locationsNextResponse['data'] as $locationInfo){
					$similarOffers[] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['region_title'],
						'region_code'	=> $locationInfo['region_code'],
						'country_title'	=> $locationInfo['country_title'],
						'location_thumb_url'	=> $locationInfo['location_thumb_url'],
						'accommodation_type_stars'=> $locationInfo['accommodation_type_stars'],
						'early_value'=>$displayEarlyPercent,
						'location_description'	=> ltrim(smart_crop(strip_tags($locationInfo['location_description']), 250),'&nbsp;,<br>')
					);
				}
			}
			//end get similar offers
			
			
			$t = new layout($new_layout);
			$t->assign('location', $location);
			$t->assign('locationBack', current($locationBack['data']));
			$t->assign('locationNext', current($locationNext['data']));
			$t->assign('prices', $prices_format);
			$t->assign('accommodationPeriod', $accommodationPeriods[$location['accommodation_period']]);
			$t->assign('pics', $pics['data']);
			$t->assign('images_count', count($pics['data']));
			$t->assign('image_width', $image_width);
			$t->assign('images_slider_width', (count($pics['data'])*$image_width));
			$t->assign('prices_count', $prices['count']);
			$t->assign('offer', 'Vacante');
			$t->assign('similarOffers', $similarOffers);
			$t->assign('offer_type', $transport[$location['transport']]);
			$t->assign('locations', $locations['data']);
			$t->assign('priceImages1Night', $priceImages1Night);
			$t->assign('priceImages7Night', $priceImages7Night);
			$t->assign('locations_count', $locations['count']);
			$t->assign('object', $object);
			$t->assign('method',__FUNCTION__);
			
			if($new_layout == 'accommodation_location'){
				$t->display();
			} else {
				$html .= $t->get();
				echo $html;
			}
		}
		
		function index(){
			accommodation_plane::index();
		}
		
		function country(){
			accommodation_plane::index();
		}
		
		function continent(){
			$code = request('continent');
			$continent = Bus::call('continents', 'readByCode', array('code'=>$code));
			accommodation_plane::index($continent['ids']);
		}
		
		function region(){
			accommodation_plane::index();
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
	}
?>