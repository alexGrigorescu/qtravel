<?php
	class buss
	{
		var $continentIdsText = 1;
		var $continentCode = '';
		var $continentTitle = '';
		var $countryCode = '';
		var $countryTitle = '';
		var $regionCode = '';
		var $regionTitle = '';
		var $linkedFunction = '';
		
		function index()
		{ 
			$page = request ('p');
			$price = request ('pr');
			$pageSize = 12;
			$continentIdsText = empty($this->continentIdsText)?1:$this->continentIdsText;
			$linkedFunction = empty($this->linkedFunction)?__FUNCTION__:$this->linkedFunction;

			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' busses.price1 asc','price_min'=>1, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			$set['continent_id'] = $continentIdsText;
			
			$locationsResponse = Bus::call('busses', 'getArrayPriceEur', $set);
			
			$locations = array();
			if($locationsResponse['count'] > 0){
				$locationCount = 0;
				foreach($locationsResponse['data'] as $locationInfo){
					$locations[$locationCount] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['end_region_title'],
						'region_code'	=> $locationInfo['end_region_code'],
						'country_title'	=> $locationInfo['end_country_title'],
						'location_description'	=> '<br />'.ltrim(smart_crop(strip_tags($locationInfo['description']), 200),'&nbsp;,<br>'),
						'location_thumb_url'	=> USR_URL . 'default/default_vacancy.jpg'
					);
					if($locationCount%3 == 2){
						$locations[$locationCount]['location_description'] .= '<br /> <br /> <br /> <br />';
					}
					$locationCount ++;
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
			
			$countryRegion = empty($regionTitle)?$countryTitle:$regionTitle;
			
			$sitemap = array(
				'site_id' => 2,
				'url' => substr(url(OBJ,'index'),0,stripos(url(OBJ,'index'),'?')),
				'url_md5' => md5(substr(url(OBJ,'index'),0,stripos(url(OBJ,'index'),'?'))),
				'url_title' => 'Bilete autocar ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('display_type', 'hotels');
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'ticket');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'index'));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('countryRegion',$countryRegion);
			$t->assign('continentIdsText',$continentIdsText);
			$t->assign('object',__CLASS__);
			$t->assign('method',$linkedFunction);
			$t->assign('continentCode',$this->continentCode);
			$t->assign('continentTitle',$this->continentTitle);
			$t->assign('countryCode',$this->countryCode);
			$t->assign('countryTitle',$this->countryTitle);
			$t->assign('regionCode',$this->regionCode);
			$t->assign('regionTitle',$this->regionTitle);
	
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
			
			$locationNext = Bus::call('busses', 'getArrayPriceEur', array('read_id_next'=>$location['id'],'special1'=>1, 'sorting'=>'id asc', 'page'=>0,'page_size'=>1));
			$locationBack = Bus::call('busses', 'getArrayPriceEur', array('read_id_back'=>$location['id'],'special1'=>1, 'sorting'=>'id desc', 'page'=>0,'page_size'=>1));
			
			$locations = Bus::call('busses', 'getArray', array('special1'=>'1', 'end_region_id'=>$location['end_region_id'], 'sorting'=>' busses.price1 asc'));
			$location['description'] = preg_replace($stripStyle,"",ltrim(smart_crop(strip_tags($location['description'],'<br>'), 700),'&nbsp;,<br>'));
			
			$sitemap = array(
				'site_id' => 2,
				'url' => 'http://'.WEB.'.'.DOMAIN.'/bilet-autocar/'.$location['end_region_code'].'/'.$location['code'].'.html',
				'url_md5' => md5('http://'.WEB.'.'.DOMAIN.'/bilet-autocar/'.$location['end_region_code'].'/'.$location['code'].'.html'),
				'url_title' => $location['title'],
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			//start get similar offers
			$set = array('special1'=>'1', 'page_size'=>3, 'page'=>0, 'sorting'=>'id desc','read_id_back'=>$location['id'], 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200);
			if($location['end_country_id'] > 0) $set['country_id'] = $location['end_country_id'];
			$locationsBackResponse = Bus::call('busses', 'getArrayPriceEur', $set);
			
			$set = array('special1'=>'1', 'page_size'=>3, 'page'=>0, 'sorting'=>'id asc','read_id_next'=>$location['id'], 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200);
			if($location['end_country_id'] > 0) $set['country_id'] = $location['end_country_id'];
			$locationsNextResponse = Bus::call('busses', 'getArrayPriceEur', $set);
			
			$similarOffers = array();
			if($locationsBackResponse['count'] > 0){
				foreach($locationsBackResponse['data'] as $locationInfo){
					$similarOffers[] = array(
						'id'			=> $locationInfo['id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['end_region_title'],
						'region_code'	=> $locationInfo['end_region_code'],
						'country_title'	=> $locationInfo['end_country_title'],
						'location_thumb_url'	=> 'http://'.WEB.'.'.DOMAIN.'/usr/default/default_vacancy.jpg',
						'location_description'	=> ltrim(smart_crop(strip_tags($locationInfo['description']), 250),'&nbsp;,<br>')
					);
				}
			}
			if($locationsNextResponse['count'] > 0){
				foreach($locationsNextResponse['data'] as $locationInfo){
					$similarOffers[] = array(
						'id'			=> $locationInfo['id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['end_region_title'],
						'region_code'	=> $locationInfo['end_region_code'],
						'country_title'	=> $locationInfo['end_country_title'],
						'location_thumb_url'	=> 'http://'.WEB.'.'.DOMAIN.'/usr/default/default_vacancy.jpg',
						'location_description'	=> ltrim(smart_crop(strip_tags($locationInfo['description']), 250),'&nbsp;,<br>')
					);
				}
			}
			//end get similar offers

			$t = new layout($new_layout);
			$t->assign('location', $location);
			$t->assign('locationBack', current($locationBack['data']));
			$t->assign('locationNext', current($locationNext['data']));
			$t->assign('locations', $locations['data']);
			$t->assign('locations_count', $locations['count']);
			$t->assign('offer', 'Bilet');
			$t->assign('similarOffers', $similarOffers);
			$t->assign('offer_type', 'Autocar');
			$t->assign('url', 'http://'.WEB.'.'.DOMAIN.'/cazare/');
			$t->assign('object',__CLASS__);
			$t->assign('method',__FUNCTION__);

			if($new_layout == 'buss_location'){
				$t->display();
			} else {
				$html .= $t->get();
				echo $html;
			}
		}
	
		function continent()
		{
			$code = request('continent');
			$continent = Bus::call('continents', 'readByCode', array('code'=>$code));
			$this->continentIdsText = $continent['ids'];
			$this->continentCode = $continent['code'];
			$this->continentTitle = $continent['title'];
			$this->linkedFunction = 'continent';
			$this->index();
		}
		
		function country()
		{
			$code = request('country');
			$country = Bus::call('countries', 'readByCode', array('code'=>$code));
			$countryId = intval($country['id']);
			$countryTitle = $country['title'];
			$page = request ('p');
			$price = request ('pr');
			$pageSize = 54;

			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' busses.price1 asc','price_min'=>1, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			if($regionId > 0) $set['region_id'] = $regionId;
			if($countryId > 0) $set['country_id'] = $countryId;
			$set['group_by'] = 'regions2.code';

			$locationsResponse = Bus::call('busses', 'getDistinctCountriesOffers', $set);
			
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
			$countryRegion = empty($regionTitle)?$countryTitle:$regionTitle;
			
			$sitemap = array(
				'site_id' => 2,
				'url' => substr(url(OBJ,'region',array('country'=>$code)),0,stripos(url(OBJ,'region',array('country'=>$code)),'?')),
				'url_md5' => md5(substr(url(OBJ,'region',array('country'=>$code)),0,stripos(url(OBJ,'region',array('country'=>$code)),'?'))),
				'url_title' => 'Bilete autocar ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			$this->countryCode = $country['code'];
			$this->countryTitle = $country['title'];
			
			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('display_type', 'towns');
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'ticket');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'region',array('country'=>$code)));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('countryRegion',$countryRegion);
			$t->assign('continentIdsText',$country['continent_id']);
			$t->assign('object',__CLASS__);
			$t->assign('method',__FUNCTION__);
			$t->assign('continentCode',$this->continentCode);
			$t->assign('continentTitle',$this->continentTitle);
			$t->assign('countryCode',$this->countryCode);
			$t->assign('countryTitle',$this->countryTitle);
			$t->assign('regionCode',$this->regionCode);
			$t->assign('regionTitle',$this->regionTitle);
	
			$t->display();
		}
		
		function region()
		{
			$code = request('region');
			$region = Bus::call('regions', 'readByCode', array('code'=>$code));
			$page = request ('p');
			$price = request ('pr');
			
			$regionId = $region['id'];
			$regionTitle = $region['title'];
			$countryId = $region['country_id'];
			$countryTitle = $region['country_title'];
			$pageSize = 12;

			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' busses.price1 asc','price_min'=>1, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			if($regionId > 0) $set['region_id'] = $regionId;
			if($countryId > 0) $set['country_id'] = $countryId;

			$locationsResponse = Bus::call('busses', 'getArrayPriceEur', $set);
			
			$locations = array();
			if($locationsResponse['count'] > 0){
				$locationCount = 0;
				foreach($locationsResponse['data'] as $locationInfo){
					$locations[$locationCount] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'title'			=> $locationInfo['title'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['end_region_title'],
						'region_code'	=> $locationInfo['end_region_code'],
						'country_title'	=> $locationInfo['end_country_title'],
						'location_description'	=> '<br />'.ltrim(smart_crop(strip_tags($locationInfo['description']), 200),'&nbsp;,<br>'),
						'location_thumb_url'	=> USR_URL . 'default/default_vacancy.jpg'
					);
					if($locationCount%3 == 2){
						$locations[$locationCount]['location_description'] .= '<br /> <br /> <br /> <br />';
					}
					$locationCount ++;
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
			$countryRegion = empty($regionTitle)?$countryTitle:$regionTitle;
			
			$sitemap = array(
				'site_id' => 2,
				'url' => substr(url(OBJ,'region',array('region'=>$code)),0,stripos(url(OBJ,'region',array('region'=>$code)),'?')),
				'url_md5' => md5(substr(url(OBJ,'region',array('region'=>$code)),0,stripos(url(OBJ,'region',array('region'=>$code)),'?'))),
				'url_title' => 'Bilete autocar ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			$this->regionCode = $region['code'];
			$this->regionTitle = $region['title'];
			
			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('display_type', 'hotels');
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'ticket');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'region',array('region'=>$code)));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('countryRegion',$countryRegion);
			$t->assign('continentIdsText',$continentIdsText);
			$t->assign('object',__CLASS__);
			$t->assign('method',__FUNCTION__);
			$t->assign('continentCode',$this->continentCode);
			$t->assign('continentTitle',$this->continentTitle);
			$t->assign('countryCode',$this->countryCode);
			$t->assign('countryTitle',$this->countryTitle);
			$t->assign('regionCode',$this->regionCode);
			$t->assign('regionTitle',$this->regionTitle);
	
			$t->display();
		}
	}
?>