<?php
	class accommodation_bus
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
			$locationId = request ('ht');
			$stars = request ('st');
			$pageSize = 12;
			$continentIdsText = empty($this->continentIdsText)?1:$this->continentIdsText;
			$linkedFunction = empty($this->linkedFunction)?__FUNCTION__:$this->linkedFunction;
			
			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc','price_min'=>1, 'transport'=>2, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			if($locationId > 0) $set['location_id'] = $locationId;
			if($stars > 0) $set['accommodation_type_id'] = $stars;
			$set['continent_id'] = $continentIdsText;

			$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
			
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
						'region_title'	=> $locationInfo['region_title'],
						'region_code'	=> $locationInfo['region_code'],
						'country_title'	=> $locationInfo['country_title'],
						'location_thumb_url'	=> $locationInfo['location_thumb_url'],
						'accommodation_type_stars'=> $locationInfo['accommodation_type_stars'],
						'location_description'	=> '<br />'.ltrim(smart_crop(strip_tags($locationInfo['location_description']), 200),'&nbsp;,<br>'),
						'early_value'=>$displayEarlyPercent
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
				'url_title' => 'Vacante autocar ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('display_type', 'hotels');
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'vacancy');
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
	
		function region(){
			$code = request('region');
			$region = Bus::call('regions', 'readByCode', array('code'=>$code));
			$page = request ('p');
			$price = request ('pr');
			$locationId = request ('ht');
			$stars = request ('st');
			
			$regionId = $region['id'];
			$regionTitle = $region['title'];
			$countryId = $region['country_id'];
			$countryTitle = $region['country_title'];
			$pageSize = 12;

			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc','price_min'=>1, 'transport'=>2, 'continent_id'=>$region['continent_id']);
			if(intval($price) > 1) $set['price'] = intval($price);
			if($regionId > 0) $set['region_id'] = $regionId;
			if($countryId > 0) $set['country_id'] = $countryId;
			if($locationId > 0) $set['location_id'] = $locationId;
			if($stars > 0) $set['accommodation_type_id'] = $stars;

			$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

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
						'region_title'	=> $locationInfo['region_title'],
						'region_code'	=> $locationInfo['region_code'],
						'country_title'	=> $locationInfo['country_title'],
						'location_thumb_url'	=> $locationInfo['location_thumb_url'],
						'accommodation_type_stars'=> $locationInfo['accommodation_type_stars'],
						'location_description'	=> '<br />'.ltrim(smart_crop(strip_tags($locationInfo['location_description']), 200),'&nbsp;,<br>'),
						'early_value'=>$displayEarlyPercent
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
				'url_title' => 'Vacante autocar ' . $countryRegion,
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
			$t->assign('searchType', 'vacancy');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'region',array('region'=>$code)));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('countryRegion',$countryRegion);
			$t->assign('continentIdsText',$region['continent_id']);
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

		function country(){
			$code = request('country');
			$country = Bus::call('countries', 'readByCode', array('code'=>$code));
			$countryId = intval($country['id']);
			$countryTitle = $country['title'];
			$page = request ('p');
			$price = request ('pr');
			$stars = request ('st');
			$locationId = request ('ht');

			if(intval($locationId) > 0){
				$locationRead = Bus::call('locations', 'read', array('id'=>$locationId));
				$regionRead = Bus::call('regions', 'read', array('id'=>$locationRead['region_id']));
				$link  = url(__CLASS__, 'region',array('region'=>$regionRead['code'],'ht'=>$locationId,'st'=>$stars));
				redirectToUrl(html_entity_decode(html_entity_decode($link)));
			}
			$pageSize = 54;
			$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc','price_min'=>1, 'transport'=>2, 'continent_id'=>$country['continent_id']);
			if(intval($price) > 1) $set['price'] = intval($price);
			if($countryId > 0) $set['country_id'] = $countryId;
			$set['group_by'] = 'regions.code';

			$locationsResponse = Bus::call('accommodations', 'getDistinctCountriesOffers', $set);
			

			$locations = array();
			if($locationsResponse['count'] > 0){
				foreach($locationsResponse['data'] as $locationInfo){
					$locations[$locationInfo['region_code']] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'code'			=> $locationInfo['code'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['region_title'],
						'region_code'	=> $locationInfo['region_code'],
						'country_title'	=> $locationInfo['country_title']
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
			
			//get last offers
			$set = array('special1'=>'1', 'page_size'=>6, 'page'=>0, 'sorting'=>' accommodations.id desc','price_min'=>1, 'transport'=>2, 'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'continent_id'=>$country['continent_id']);
			if($countryId > 0) $set['country_id'] = $countryId;
			$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
			$lastOffers = array();
			if($locationsResponse['count'] > 0){
				foreach($locationsResponse['data'] as $locationInfo){
					$lastOffers[] = array(
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
						'location_description'	=> ltrim(smart_crop(strip_tags($locationInfo['location_description']), 300),'&nbsp;,<br>')
					);
				}
			}
			
			$sitemap = array(
				'site_id' => 2,
				'url' => substr(url(OBJ,'country',array('country'=>$code)),0,stripos(url(OBJ,'country',array('country'=>$code)),'?')),
				'url_md5' => md5(substr(url(OBJ,'country',array('country'=>$code)),0,stripos(url(OBJ,'country',array('country'=>$code)),'?'))),
				'url_title' => 'Vacante autocar ' . $countryRegion,
				'last_crawled' => date('Y-m-d H:i:s') 
			);
			Bus::call('sitemap', 'insert', $sitemap);
			
			$this->countryCode = $country['code'];
			$this->countryTitle = $country['title'];
			
			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('lastOffers', $lastOffers);
			$t->assign('display_type', 'towns');
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'vacancy');
			$t->assign('searchTransport', 'buss');
			$t->assign('ajaxUrl', url(OBJ,'country',array('country'=>$code)));
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
		
		function continent() {
			$code = request('continent');
			$continent = Bus::call('continents', 'readByCode', array('code'=>$code));
			$this->continentIdsText = $continent['ids'];
			$this->continentCode = $continent['code'];
			$this->continentTitle = $continent['title'];
			$this->linkedFunction = 'continent';
			$this->index();
		}
	}
?>