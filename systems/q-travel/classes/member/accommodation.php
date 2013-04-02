<?php
	class accommodation
	{
		function location()
		{	
			$stripStyle = '/style=["\']+([A-Z0-9:\ -;>]*)["\']+[ >]*/i';
			$new_layout = (strlen(trim((request('new_layout'))))>0)?request('new_layout'):'accommodation_location';
			$code = request('location');
			$region_code = request('region');
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
			$pics = Bus::call('pics', 'getArray', array('type'=>'locations', 'target_id'=>$location['location_id'], 'thumb'=>1, 'thumb_width'=>133, 'thumb_height'=>98));
			$prices = Bus::call('prices', 'getArray', array('type'=>'accommodations', 'target_id'=>$location['id'], 'page_size'=>1000));
			$locations = Bus::call('accommodations', 'getArray', array('special1'=>'1', 'region_id'=>$location['region_id'], 'stars'=>$location['accommodation_type_stars'], 'thumb'=>1, 'thumb_width'=>100, 'thumb_height'=>100, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc'));
			$prices_format = array();
			if(intval($location['accommodation_period']) == 22){
				$location['price'] = round($location['price']/7,2);
			}
			$location['price7'] = number_format(round($location['price']*7,2), 2, '.', '');
			
			foreach($prices['data'] as $k=>$v)
			{
				$subtype = md5($v['subtype']);
				
				$priceTypeList = array( 'price_double','price_single','price_3adult','price_triple','price_1child','price_2child',
										'price_extra1','price_extra2','price_extra3');
				
				if(intval($location['accommodation_period']) == 22){
					foreach ($priceTypeList as $priceType){
						if(intval($v[$priceType]) > 0){
							$v[$priceType] = round($v[$priceType]/7,2);
						}
					}
				}
				foreach ($priceTypeList as $priceType){
					$v['night'][$priceType."_format"] = $this->price_value($v[$priceType], $location['currency_title'], $location['price_extrav'], $location['price_extrap']);
					$v['night7'][$priceType."_format"] = number_format((intval($v['night'][$priceType."_format"]) > 0)?$v['night'][$priceType."_format"]*7:$v['night'][$priceType."_format"], 1, '.', '');
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
			
			$location['location_description'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['location_description'],'<br>'), 700),'&nbsp;,<br>'));
			$location['description'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description'],'<br>'), 700),'&nbsp;,<br>'));
			$location['description_included'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description_included'],'<br>'), 700),'&nbsp;,<br>'));
			$location['description_not_included'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description_not_included'],'<br>'), 700),'&nbsp;,<br>'));
			$location['description_early_booking'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description_early_booking'],'<br>'), 700),'&nbsp;,<br>'));
			$t = new layout($new_layout);
			$t->assign('location', $location);
			$t->assign('prices', $prices_format);
			$t->assign('pics', $pics['data']);
			$t->assign('images_count', count($pics['data']));
			$t->assign('image_width', $image_width);
			$t->assign('images_slider_width', (count($pics['data'])*$image_width));
			$t->assign('prices_count', $prices['count']);
			$t->assign('offer', 'Vacante');
			$t->assign('offer_type', $transport[$location['transport']]);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('object', $object);
			
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
			accommodation_plane::index();
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