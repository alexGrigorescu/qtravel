<?
class mymain extends main
{
	function index()
	{
		$bublesResponse = Bus::call('countries', 'getArray', array('special1'=>'1','buble_offer_vacancy'=>'1', 'page_size'=>20, 'sorting'=>'id asc'));
		
		$buble_width=146;

		$searchVacancyHomeResponse = Bus::call('vacancyOfferAdmin', 'getArray', array('group'=>'search_home','by_field'=>'code'));
		$promotionsVacancyHomeResponse = Bus::call('vacancyOfferAdmin', 'getArray', array( 'sorting'=>'id asc','group'=>'promotions','by_field'=>'code','status'=>1));
		
		//get accordion values
		$set = array('special1'=>'1','page_size'=>6,'page'=>0,'price_min'=>1,
					 'sorting'=>' accommodations.id desc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$locationsAccordion = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locationsAccordion[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'country_title'	=> $locationInfo['country_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url'],
					'location_description'=> ltrim(smart_crop(strip_tags($locationInfo['location_description']), 270),'&nbsp;,<br>')
				);
			}
		}
		$t = new layout('main_index');
		
		$sitemap = array(
			'site_id' => 2,
			'url' => 'http://'.WEB.'.'.DOMAIN,
			'url_md5' => md5('http://'.WEB.'.'.DOMAIN),
			'url_title' => 'Oferte vacanta ' . $countryRegion,
			'last_crawled' => date('Y-m-d H:i:s') 
		);
		Bus::call('sitemap', 'insert', $sitemap);
			
		$t->assign('bubles', $bublesResponse['data']);
		$t->assign('bubles_count', count($bublesResponse['data']));
		$t->assign('bubles_slider_width', (count($bublesResponse['data'])*$buble_width));
		$t->assign('buble_width', $buble_width);
		$t->assign('searchVacancyHome', $searchVacancyHomeResponse['data']);
		$t->assign('promotionsVacancyHome', $promotionsVacancyHomeResponse['data']);
		$t->assign('promotionsVacancyHomeSelected', current($promotionsVacancyHomeResponse['data']));
		$t->assign('ajaxUrl', 'http://'.WEB.'.'.DOMAIN.'/mymain.');
		$t->assign('searchType', 'home');
		$t->assign('locationsAccordion', $locationsAccordion);

		$t->display();
	}

	function ajax_search_plane()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}

	function ajax_search_bus()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}

	function ajax_search_vacancies()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$t->assign('searchUrl', 'http://'.WEB.'.'.DOMAIN.'/');
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}

	function ajax_search_hotels()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}

	function ajax_search_rentcar()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}

	function ajax_search_insurance()
	{
		$t = new layout();
		$t->template = __FUNCTION__;
		$html = $t->get();
		$t->template = "autocomplete.js";
		$html .= $t->get();
		echo $html;
	}
	
	function get_stars(){
		$filterText = strtolower(request ('term'));
		$hotel_id = intval(request ('hotel_id'));
		$ajaxStarsResponse = Bus::call('accommodationTypes', 'getList', array('hotel_id'=>$hotel_id));
		$ajaxStars = array();

		foreach($ajaxStarsResponse['data'] as $idStar=>$ajaxStarsValue){
			$ajaxStars[] = array(
				'id' 	=> $idStar,
				'label'	=> $ajaxStarsValue,
				'value'	=> $ajaxStarsValue
			);
		}
		echo json_encode($ajaxStars);
	}
	
	function get_vacancy_type(){
		$ajaxVacancyType= array(
			array(
				'id'=>'vacanta-avion',
				'label'=>'Avion',
				'value'=>'Avion'
			),
			array(
				'id'=>'vacanta-autocar',
				'label'=>'Autocar',
				'value'=>'Autocar'
			),
			array(
				'id'=>'vacanta-individual',
				'label'=>'Individual',
				'value'=>'Individual'
			)
		);
	
		echo json_encode($ajaxVacancyType);
	}

	function get_hotels(){
		$filterText = strtolower(request ('term'));
		$regionCountryText = strtolower(request ('region_id'));
		$regionCountryIds = explode('_',$regionCountryText);
		$regionId = 0;
		$countryId =0;
		if(count($regionCountryIds) > 0){
			$regionRow = Bus::call('regions', 'readByCode', array('code'=>$regionCountryIds[0]));
			$regionId = $regionRow['id'];
		}
		if(count($regionCountryIds) > 1){
			$countryRow = Bus::call('countries', 'readByCode', array('code'=>$regionCountryIds[1]));
			$countryId = $countryRow['id'];
		}

		
		$ajaxHotelsResponse = Bus::call('locations', 'getRegionCountryLocation', array('text'=>$filterText,'region_id'=>$regionId,'country_id'=>$countryId));
		$ajaxHotels = array();

		foreach($ajaxHotelsResponse as $ajaxHotelsValue){
			$ajaxHotels[] = array(
				'id' 	=> $ajaxHotelsValue['id'],
				'label'	=> $ajaxHotelsValue['title'],
				'value'	=> $ajaxHotelsValue['title']
			);
		}
		echo json_encode($ajaxHotels);
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

	function ajax_promo_last_minute()
	{
		$promoPrefix = 'minut';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;

		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_early_booking()
	{
		$promoPrefix = 'early';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);
		
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		
		$locations = array();
		if($locationsResponse['count'] > 0){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_easter()
	{
		$promoPrefix = 'paste';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_first_may()
	{
		$promoPrefix = 'mai';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'promo_prefix'=>$promoPrefix,'price_min'=>1,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_seaside()
	{
		$promoPrefix = 'litoral';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'promo_prefix'=>$promoPrefix,'price_min'=>1,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_seniors()
	{
		$promoPrefix = 'seniori';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'promo_prefix'=>$promoPrefix,'price_min'=>1,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_mountain()
	{
		$promoPrefix = 'munte';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'promo_prefix'=>$promoPrefix,'price_min'=>1,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'country_title'	=> $locationInfo['country_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_events()
	{
		$promoPrefix = 'evenimente';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'promo_prefix'=>$promoPrefix,'price_min'=>1,
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		
		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}

	function ajax_promo_ski()
	{
		$promoPrefix = 'ski';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;

		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}
	
	function ajax_promo_noel()
	{
		$promoPrefix = 'craciun';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;

		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}
	
	function ajax_promo_new_year_eve()
	{
		$promoPrefix = 'revelion';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;

		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}
	
	function ajax_promo_spa_balneo()
	{
		$promoPrefix = 'spa_balneo';
		$page = request ('p');
		$price = request ('pr');
		$pageSize = 6;

		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$set = array('special1'=>'1','page_size'=>$pageSize,'page'=>$page,'price_min'=>1,'promo_prefix'=>$promoPrefix,
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc',
					'thumb'=>1, 'thumb_width'=>200, 'thumb_height'=>200, 'default_pic'=>'default_promo_vacancy.jpg');
		if(intval($price) > 0) $set['price'] = intval($price);

		$locationsResponse = Bus::call('accommodations', 'getArrayPriceEur', $set);

		$locations = array();
		if($locationsResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($locationsResponse['data'] as $locationInfo){
				$locations[] = array(
					'id'			=> $locationInfo['id'],
					'location_id'	=> $locationInfo['location_id'],
					'price'			=> round($locationInfo['price_eur'],0),
					'region_title'	=> $locationInfo['region_title'],
					'code'	=> $locationInfo['code'],
					'region_code'	=> $locationInfo['region_code'],
					'country_title'	=> $locationInfo['country_title'],
					'promo_title'	=> $locationInfo['title'],
					'promo_thumb'	=> 'promo_item1.png',
					'location_thumb_url'=> $locationInfo['location_thumb_url']
				);
			}
		}
			
		$pageTotalCount = ceil($locationsResponse['count']/$pageSize) -1;
		$t = new layout();
		$t->template = 'promotions_list';
		$t->assign('locations', $locations);
		$t->assign('page', $page);
		$t->assign('price', $price);
		$t->assign('method', __FUNCTION__);
		$t->assign('pageTotalCount', $pageTotalCount);

		$html = $t->get();
		echo $html;
	}
	
	function ajax_country_list()
	{
		$object = request ('searchObject');
		$method = request ('searchMethod');
		$continentText = request ('continent');
		
		$set = array('special1'=>'1', 'page_size'=>600, 'page'=>0, 'price_min'=>1, 'continent_id'=>$continentText, 'end_continent_id'=>$continentText);
		
		switch ($object) {
		    case 'accommodation_plane':
		        $model = 'accommodations';
		        $set['transport'] = 1;
		        $set['group_by'] = 'regions.code';
		        break;
		    case 'accommodation_bus':
		        $model = 'accommodations';
		        $set['transport'] = 2;
		        $set['group_by'] = 'regions.code';
		        break;
		    case 'accommodation_individual':
		        $model = 'accommodations';
		        $set['transport'] = 0;
		        $set['group_by'] = 'regions.code';
		        break;
		  	case 'buss':
		        $model = 'busses';
		        $set['group_by'] = 'regions2.code';
		        break;
		  	case 'flight':
		        $model = 'flights';
		        $set['group_by'] = 'regions2.code';
		        break;
		}
		
		$countryResponse = Bus::call($model, 'getDistinctCountriesOffers', $set);

		$countries = array();

		foreach ($countryResponse['data'] as $country){
			$countryCode = empty($country['country_code'])?$country['end_country_code']:$country['country_code'];
			
			if(!array_key_exists($countryCode, $countries)){
				$countryTitle = empty($country['country_title'])?$country['end_country_title']:$country['country_title'];
				$countries[$countryCode] = array(
					'code'	=> $countryCode,
					'title'	=> $countryTitle,
					'towns'	=> array(
						array(
							'code'	=> empty($country['region_code'])?$country['end_region_code']:$country['region_code'],
							'title'	=> empty($country['region_title'])?$country['end_region_title']:$country['region_title']
						)
					)
				);
			} else {
				$countries[$countryCode]['towns'][] = array(
					'code'	=> empty($country['region_code'])?$country['end_region_code']:$country['region_code'],
					'title'	=> empty($country['region_title'])?$country['end_region_title']:$country['region_title']
				);	
			}
		}

		$t = new layout();
		$t->template = __FUNCTION__;
		
		$t->assign('countries',$countries);
		$t->assign('object',$object);
		$html = $t->get();
		echo $html;
	}
	
	function feedback(){
		$form = new DefVacancyFeedbackForm($this);
		$form->loadFromRequest();
		$request = $form->saveToArray();
		$form->loadFromArray($request);
		$t = new layout('feedback');	
		$t->assign('form_image', $form->getFullImage());
		$t->assign('err', Errors::get($err));
		$html = $t->get();
		echo $html;
	}
	
	function feedback_save(){
		$form = new DefVacancyFeedbackForm($this);
		$form->loadFromRequest();
		$request = $form->saveToArray();
		$saved = 0;

		$response = array(
			'is_error'	=>0,
			'message'	=>'Datele au fost inregistrate!'
		);
		
		if(strlen($request['name']) < 3){
			$response['is_error'] = 1;
			$response['message'] = 'Numele completat este invalid!';
		}
		
		$isValidMail = filter_var($request['email'],FILTER_VALIDATE_EMAIL);
		if($isValidMail === false){
			$response['is_error'] = 1;
			$response['message'] = 'Adresa de mail completata nu este valida!';
		}
		
		$matches = preg_grep("/^[\d]+$/", array($request['mobile']));
		if(empty($matches)){
			$response['is_error'] = 1;
			$response['message'] = 'Numarul de telefon completat nu este valid!';
		}
		if($response['is_error'] == 0){
			$userId = 0;
			$oldMessage = '';
			$userByUserName = Bus::call('users', 'userNameExists', array('user_name'=>code($request['name']), 'id'=>$this->id));
			if(!empty($userByUserName['id'])){
				$userId = $userByUserName['id'];
				$oldMessage = $userByUserName['message'];
			}
			
			$set = array();
		   	
		   	if($userId > 0){
		   		$set['id'] = $userId;
		   		$set['is_feedback'] = 1;
		   		$set['message'] = $oldMessage . '###' . $request['message'];
		   		Bus::call('users', 'update', $set);
		   	} else  {
		   		$set['user_type'] = 'feedback';
		   		$set['user_name'] = code($request['name']);
		   		$set['name'] = $request['name'];
		   		$set['email'] = $request['email'];
		   		$set['phone'] = $request['phone'];
		   		$set['message'] = $oldMessage . '###' . $request['message'];
		   		$set['phone'] = $request['phone'];
		   		$set['active'] = 0;
		   		$set['datec'] = date('Y-m-d');
		   		$set['rights'] = '';
		   		$set['is_feedback'] = 1;
		   		Bus::call('users', 'insert', $set);
		   	}
		   	$saved = 1;
		   
		} 
		
		$t = new layout('feedback');	
		$t->assign('form_image', $form->getFullImage());
		$t->assign('err', $response['message']);
		$t->assign('saved', $saved);
		$html = $t->get();
		echo $html;
		
	}
}
?>
