<?php
	class buss
	{
		function index()
		{ 
			$page = request ('p');
			$price = request ('pr');
			$regionCountryIdsText = request ('dt');
			$continentIdsText = strlen(trim(request ('c'))) > 0?request ('c'):1;
			$regionId = 0;
			$regionTitle = '';
			$countryId = 0;
			$countryTitle = '';
			$pageSize = 12;

			$continentIds = explode('_',$continentIdsText);
			$continentValidIds = array();
			foreach ($continentIds as $continentId) {
				if(intval($continentId)>0){
					$continentValidIds[] = $continentId;
				}
			}
			
			$regionCountryIds = explode('_',$regionCountryIdsText);
			if(count($regionCountryIds) > 0 && intval($regionCountryIds[0]) > 0){
				$regionId = intval($regionCountryIds[0]);
				$regionResponse = Bus::call('regions', 'read', array('id'=>$regionId));

				$regionTitle = $regionResponse['title'];
			}
			if(count($regionCountryIds) > 1 && intval($regionCountryIds[1]) > 0){
				$countryId = intval($regionCountryIds[1]);
				$countriesResponse = Bus::call('countries', 'read', array('id'=>$countryId));
				$countryTitle = $countriesResponse['title'];
			}

			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' busses.price1 asc','price_min'=>1, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			if($regionId > 0) $set['region_id'] = $regionId;
			if($countryId > 0) $set['country_id'] = $countryId;

			$locationsResponse = Bus::call('busses', 'getArrayPriceEur', $set);
			
			$locations = array();
			if($locationsResponse['count'] > 0){
				foreach($locationsResponse['data'] as $locationInfo){
					$locations[] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['end_region_title'],
						'region_code'	=> $locationInfo['end_region_code'],
						'country_title'	=> $locationInfo['end_country_title']
					);
				}
			}

			$pageTotalCount = max(ceil($locationsResponse['count']/$pageSize)-1,0);

			if($page > $pageTotalCount) $page = $pageTotalCount;
			if($page <= 5){
				if(count($locations) > 0){
					$pageRank = range(0,min(6,$pageTotalCount));
				} else {
					$pageRank = array();
				}
			} elseif( $pageTotalCount == $page){
				$pageRank = range(($page-6),$page);
			} else {
				$pageRank = range(($page-5),min(($page+1),$pageTotalCount));
			}

			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'ticket');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'index'));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('continentIdsText',$continentIdsText);
			$t->assign('object',__CLASS__);
	
			$t->display();
		}
	
		function location(){
			$stripStyle = '/style=["\']+([A-Z0-9:\ -;>]*)["\']+[ >]*/i';
			$new_layout = (strlen(trim((request('new_layout'))))>0)?request('new_layout'):'buss_location';
			
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
			
			$location = Bus::call('busses', 'readByCode', array('code'=>$code, 'region_id'=>$region['id'], 'thumb'=>1));			
			if (!isset ($location['id'])) redirect ('main', 'invalid');
			$locations = Bus::call('flights', 'getArray', array('special1'=>'1', 'end_region_id'=>$location['end_region_id'], 'sorting'=>' flights.price1 asc'));
			$location['description'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description'],'<br>'), 700),'&nbsp;,<br>'));
			$t = new layout($new_layout);
			$t->assign('location', $location);
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('offer', 'Bilet');
			$t->assign('offer_type', 'Autocar');
			$t->assign('url', 'http://'.WEB.'.'.DOMAIN.'/cazare/');

			if($new_layout == 'buss_location'){
				$t->display();
			} else {
				$html .= $t->get();
				echo $html;
			}
		}
	
		function continent()
		{
			buss::index();
		}
		
		function country()
		{
			buss::index();
		}
		
		function region()
		{
			buss::index();
		}
	}
?>