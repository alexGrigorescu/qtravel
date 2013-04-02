<?
class mymain extends main
{
	function index()
	{
		$getEurParityByCode = Bus::call('currenciesValues', 'getEurParity', date('Y-m-d'));
		$bublesResponse = Bus::call('accommodations', 'getArray', array('special1'=>'1','buble_offer_vacancy'=>'1', 'page_size'=>20, 'sorting'=>'id asc', 'price_min'=>1));
		$buble_width=146;
		$bubles = array();

		if($bublesResponse['count'] > 0 && $getEurParityByCode !== false){
			foreach($bublesResponse['data'] as $bubleInfo){
				$bubles[] = array(
					'id'			=> $bubleInfo['id'],
					'location_id'	=> $bubleInfo['location_id'],
					'code'			=> $bubleInfo['code'],
					'price'			=> round($bubleInfo['price'] * $getEurParityByCode[$bubleInfo['currency_title']]),
					'region_title'	=> $bubleInfo['region_title'],
					'region_code'	=> $bubleInfo['region_code'],
					'country_title'	=> strtoupper($bubleInfo['country_title'])
				);
			}
		}

		$searchVacancyHomeResponse = Bus::call('vacancyOfferAdmin', 'getArray', array('group'=>'search_home','by_field'=>'code'));
		$promotionsVacancyHomeResponse = Bus::call('vacancyOfferAdmin', 'getArray', array( 'sorting'=>'id asc','group'=>'promotions','by_field'=>'code'));
		$t = new layout('main_index');
		
		$t->assign('bubles', $bubles);
		$t->assign('bubles_count', count($bubles));
		$t->assign('bubles_slider_width', (count($bubles)*$buble_width));
		$t->assign('buble_width', $buble_width);
		$t->assign('searchVacancyHome', $searchVacancyHomeResponse['data']);
		$t->assign('promotionsVacancyHome', $promotionsVacancyHomeResponse['data']);
		$t->assign('promotionsVacancyHomeSelected', current($promotionsVacancyHomeResponse['data']));
		$t->assign('ajaxUrl', 'http://'.WEB.'.'.DOMAIN.'/mymain.');
		$t->assign('searchType', 'home');
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
		if(count($regionCountryIds) > 0 && intval($regionCountryIds[0]) > 0){
			$regionId = intval($regionCountryIds[0]);
		}
		if(count($regionCountryIds) > 1 && intval($regionCountryIds[1]) > 0){
			$countryId = intval($regionCountryIds[1]);
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
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
					 'sorting'=>' accommodations.special2 desc, accommodation_type_stars asc, accommodations.price asc');
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
					'promo_thumb'	=> 'promo_item1.png'
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
}
?>
