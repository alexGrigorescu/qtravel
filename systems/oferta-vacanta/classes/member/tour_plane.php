<?php
	class tour_plane
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
			$set = array('special1'=>'1', 'page_size'=>$pageSize, 'page'=>$page, 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc','price_min'=>1, 'transport'=>2, 'continent_id'=>implode(',',$continentValidIds));
			if(intval($price) > 1) $set['price'] = intval($price);
			if($regionId > 0) $set['region_id'] = $regionId;
			if($countryId > 0) $set['country_id'] = $countryId;

			$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
			
			$locations = array();
			if($locationsResponse['count'] > 0){
				foreach($locationsResponse['data'] as $locationInfo){
					$locations[] = array(
						'id'			=> $locationInfo['id'],
						'location_id'	=> $locationInfo['location_id'],
						'price'			=> number_format($locationInfo['price_eur'],2,".",""),
						'region_title'	=> $locationInfo['region_title'],
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

			$t = new layout('main_list');
			$t->assign('locations', $locations);
			$t->assign('pageTotalCount', $pageTotalCount);
			$t->assign('page', $page);
			$t->assign('pageRank', $pageRank);
			$t->assign('searchType', 'tour');
			$t->assign('searchTransport', 'plane');
			$t->assign('ajaxUrl', url(OBJ,'index'));
			$t->assign('price',(intval($price)<=0)?1:$price);
			$t->assign('regionTitle',$regionTitle);
			$t->assign('countryTitle',$countryTitle);
			$t->assign('continentIdsText',$continentIdsText);
			$t->assign('object',__CLASS__);

			$t->display();
		}
	}
?>