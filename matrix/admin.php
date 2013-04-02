<?
	$a = array(
		'accommodations-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_region_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_special1', 'accommodations_filter_special2',
			'accommodations_filter_transport',
			'accommodations_filter_page'),
		),
		'accommodations-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_region_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 
			'accommodations_filter_transport','accommodations_filter_buble_offer_vacancy',
			'accommodations_filter_page','accommodations_filter_promotion','accommodations_filter_early_booking',
			'accommodations_filter_accommodation_period','accommodations_filter_accommodation_applicability',
			'accommodations_filter_lunch_type','accommodations_filter_lunch_type_text'),
		),
		'accommodations-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'accommodations-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		'accommodations-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_region_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 
			'accommodations_filter_transport','accommodations_filter_buble_offer_vacancy',
			'accommodations_filter_page','accommodations_filter_promotion','accommodations_filter_early_booking',
			'accommodations_filter_accommodation_period','accommodations_filter_accommodation_applicability',
			'accommodations_filter_lunch_type','accommodations_filter_lunch_type_text'),
		),
		'accommodations-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_region_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 
			'accommodations_filter_transport','accommodations_filter_buble_offer_vacancy',
			'accommodations_filter_page','accommodations_filter_promotion','accommodations_filter_early_booking',
			'accommodations_filter_accommodation_period','accommodations_filter_accommodation_applicability',
			'accommodations_filter_lunch_type','accommodations_filter_lunch_type_text'),
		),
		'accommodations-vacation'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'accommodations-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-save_price'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'accommodations-delete_price'=>array(
			'l'=>10,
			'p'=>array('price_id', 'accommodation_id'),
			'r'=>array(),
		),		
		'accommodations-delete_prices'=>array(
			'l'=>10,
			'p'=>array('accommodation_id'),
			'r'=>array(),
		),
		'accommodations-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'accommodations-change_country'=>array(
			'l'=>10,
			'p'=>array('country_id'),
			'r'=>array('country_id'),
		),
		'accommodations-change_region'=>array(
			'l'=>10,
			'p'=>array('region_id'),
			'r'=>array('region_id'),
		),
		'accommodations-export'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-import'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-import_save'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('accommodations_filter_text', 'accommodations_filter_continent_id', 'accommodations_filter_country_id', 'accommodations_filter_accommodation_type_id', 'accommodations_filter_region_id', 'accommodations_filter_special1', 'accommodations_filter_special2', 'accommodations_filter_page'),
		),
		'accommodations-save_price_val'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'accommodations-save_price_proc'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'busses-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'busses-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'busses-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'busses-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2', 'busses_filter_promotion'),
		),
		'busses-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'busses-change_country'=>array(
			'l'=>10,
			'p'=>array('country_id'),
			'r'=>array('country_id'),
		),		
		'busses-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'busses-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'busses-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'busses_filter_text', 'busses_filter_start_continent_id', 'busses_filter_start_country_id', 'busses_filter_start_region_id', 'busses_filter_end_continent_id', 'busses_filter_end_country_id', 'busses_filter_end_region_id', 'busses_filter_special1', 'busses_filter_special2'),
		),
		'contracts-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('contracts_filter_text', 'contracts_page'),
		),
		'contracts-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'contracts_filter_text', 'contracts_page'),
		),
		'contracts-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('contracts_filter_text',  'contracts_page'),
		),
		'contracts-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'contracts_filter_text', 'contracts_page'),
		),		
		'contracts-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'contracts_filter_text', 'contracts_page'),
		),
		'contracts-doc'=>array(
			'l'=>10,
			'p'=>array('code'),
			'r'=>array('code'),
		),
		'contracts-ve'=>array(
			'l'=>10,
			'p'=>array('code'),
			'r'=>array('code'),
		),
		'contracts-vp'=>array(
			'l'=>10,
			'p'=>array('code'),
			'r'=>array('code'),
		),		
		'contracts-name_autocomplete'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),		
		'contracts-name_autocomplete_data'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'vacations-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page', 'vacations_filter_promotion'),
		),
		'vacations-delete_all'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-vacation'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'vacations-save_price_val'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'vacations-save_price_proc'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'vacations-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-specialc'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-save_price'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'vacations-delete_price'=>array(
			'l'=>10,
			'p'=>array('price_id', 'vacation_id'),
			'r'=>array(),
		),
		'vacations-delete_prices'=>array(
			'l'=>10,
			'p'=>array('vacation_id'),
			'r'=>array(),
		),
		'vacations-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'vacations-change_country'=>array(
			'l'=>10,
			'p'=>array('country_id'),
			'r'=>array('country_id'),
		),
		'vacations-change_region'=>array(
			'l'=>10,
			'p'=>array('region_id'),
			'r'=>array('region_id'),
		),
		'vacations-export'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-import'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'vacations-import_save'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('vacations_filter_text', 'vacations_filter_continent_id', 'vacations_filter_country_id', 'vacations_filter_region_id', 'vacations_filter_accommodation_type_id', 'vacations_filter_special1', 'vacations_filter_special2', 'vacations_filter_specialc', 'vacations_filter_page'),
		),
		'main-index'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'main-deny'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'main-login'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'main-help'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'login-index'=>array(
			'l'=>0,
			'p'=>array('err','goto'),
			'r'=>array('err','goto'),
		),
		'login-save'=>array(
			'l'=>0,
			'p'=>array('goto'),
			'r'=>array('goto','err'),
		),
		'login-logout'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'pages-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'pages-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'pages-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'pages-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'pages-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'pages-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		'pages-wysiwyg'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'pagep', 'sortp'),
		),
		'users-index'=>array(
			'l'=>10,
			'p'=>array('users_type', 'users_text', 'users_page'),
			'r'=>array('users_type', 'users_text', 'users_page'),
		),
		'users-account'=>array(
			'l'=>10,
			'p'=>array('err', 'id', 'users_type'),
			'r'=>array('err', 'id', 'users_type', 'users_text', 'users_enabled', 'users_id', 'users_page'),
		),
		'users-account_save'=>array(
			'l'=>10,
			'p'=>array('id', 'users_type'),
			'r'=>array('id', 'users_type', 'users_text', 'users_enabled', 'users_id', 'users_page'),
		),
		'users-active'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'users_type', 'users_text', 'users_enabled', 'users_id', 'users_page'),
		),
		'continents-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('continents_filter_text', 'continents_filter_page'),
		),
		'continents-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'continents_filter_text', 'continents_filter_page'),
		),
		'continents-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('continents_filter_text', 'continents_filter_page'),
		),
		'continents-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'continents_filter_text', 'continents_filter_page'),
		),
		'continents-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'continents-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'continents_filter_text', 'continents_filter_page'),
		),
		'continents-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'continents_filter_text', 'continents_filter_page'),
		),
		'countries-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'countries-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		
		'domains-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('domains_filter_text', 'domains_filter_page'),
		),
		'domains-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'domains_filter_text', 'domains_filter_page'),
		),
		'domains-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('domains_filter_text', 'domains_filter_page'),
		),
		'domains-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'domains_filter_text', 'domains_filter_page'),
		),
		'domains-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'domains-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'domains_filter_text', 'domains_filter_page'),
		),
		'domains-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'domains_filter_text', 'domains_filter_page'),
		),
		'domains-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'domains-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		'countries-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'countries-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'countries_filter_text', 'countries_filter_continent_id', 'countries_filter_special1', 'countries_filter_special2', 'countries_filter_page'),
		),
		'regions-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'regions-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'regions_filter_text', 'regions_filter_continent_id', 'regions_filter_country_id', 'regions_filter_special1', 'regions_filter_special2', 'regions_filter_page'),
		),
		'regions-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'locations-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page', 'locations_filter_promotions'),
		),
		'locations-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'locations_filter_continent_id', 'locations_filter_country_id', 'locations_filter_region_id', 'locations_filter_accommodation_type_id', 'locations_filter_page'),
		),
		'locations-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'locations-upload_bulk'=>array(
			'l'=>0,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'locations-upload_bulk_edit'=>array(
			'l'=>10,
			'p'=>array('id', 'thanks'),
			'r'=>array('id', 'thanks'),
		),
		'locations-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		'locations-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'locations-change_country'=>array(
			'l'=>10,
			'p'=>array('country_id'),
			'r'=>array('country_id'),
		),
		'flight_operators-admin'=>array(
			'l'=>10,
			'p'=>array('text'),
			'r'=>array('text', 'flight_operators_text', 'flight_operators_page'),
		),
		'flight_operators-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flight_operators_text', 'flight_operators_page'),
		),
		'flight_operators-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flight_operators_text', 'flight_operators_page'),
		),
		'flight_operators-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flight_operators_text', 'flight_operators_page'),
		),
		'flight_operators-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flight_operators_text', 'flight_operators_page'),
		),
		'flight_operators-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'flight_operators-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		'flight_types-admin'=>array(
			'l'=>10,
			'p'=>array('text', 'flight_type_id'),
			'r'=>array('text', 'flight_type_id'),
		),
		'flight_types-edit'=>array(
			'l'=>10,
			'p'=>array('err', 'id'),
			'r'=>array('err', 'id'),
		),
		'flight_types-add'=>array(
			'l'=>10,
			'p'=>array('err'),
			'r'=>array('err'),
		),
		'flight_types-save'=>array(
			'l'=>10,
			'p'=>array('id', 'code', 'title'),
			'r'=>array('id'),
		),
		'flights-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page', 'flights_promotion'),
		),
		'flights-change_continent'=>array(
			'l'=>10,
			'p'=>array('continent_id'),
			'r'=>array('continent_id'),
		),
		'flights-change_country'=>array(
			'l'=>10,
			'p'=>array('country_id'),
			'r'=>array('country_id'),
		),		
		'flights-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'locations_filter_text', 'flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-export'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-import'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'flights-import_save'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('flights_filter_text', 'flights_filter_start_continent_id', 'flights_filter_start_country_id', 'flights_filter_start_region_id', 'flights_filter_end_continent_id', 'flights_filter_end_country_id', 'flights_filter_end_region_id', 'flights_filter_special1', 'flights_filter_special2', 'flights_page'),
		),
		'transport_types-admin'=>array(
			'l'=>10,
			'p'=>array('text', 'transport_type_id'),
			'r'=>array('text', 'transport_type_id'),
		),
		'transport_types-edit'=>array(
			'l'=>10,
			'p'=>array('err', 'id'),
			'r'=>array('err', 'id'),
		),
		'transport_types-add'=>array(
			'l'=>10,
			'p'=>array('err'),
			'r'=>array('err'),
		),
		'transport_types-save'=>array(
			'l'=>10,
			'p'=>array('id', 'code', 'title'),
			'r'=>array('id'),
		),
		'accommodation_types-admin'=>array(
			'l'=>10,
			'p'=>array('text', 'accommodation_type_id'),
			'r'=>array('text', 'accommodation_type_id'),
		),
		'accommodation_types-edit'=>array(
			'l'=>10,
			'p'=>array('err', 'id'),
			'r'=>array('err', 'id'),
		),
		'accommodation_types-add'=>array(
			'l'=>10,
			'p'=>array('err'),
			'r'=>array('err'),
		),
		'accommodation_types-save'=>array(
			'l'=>10,
			'p'=>array('id', 'code', 'title'),
			'r'=>array('id'),
		),
		'circuits-admin'=>array(
			'l'=>10,
			'p'=>array('text'),
			'r'=>array('text'),
		),
		'circuits-edit'=>array(
			'l'=>10,
			'p'=>array('err', 'id'),
			'r'=>array('err', 'id'),
		),
		'circuits-add'=>array(
			'l'=>10,
			'p'=>array('err'),
			'r'=>array('err'),
		),
		'circuits-save'=>array(
			'l'=>10,
			'p'=>array('id', 'code', 'title', 'promotion'),
			'r'=>array('id'),
		),
		'spider-admin'=>array(
			'l'=>0,
			'p'=>array(),
			'r'=>array(),
		),
		'spider-tags'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array(),
		),
		'specials-admin'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('specials_type', 'specials_text', 'special_page', 'special_special1'),
		),
		'specials-add'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array('specials_filter_type', 'specials_filter_text', 'special_filter_page'),
		),
		'specials-edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'specials_filter_type', 'specials_filter_text', 'special_filter_page'),
		),
		'specials-save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'specials_filter_type', 'specials_filter_text', 'special_filter_page', 'special_filter_promotion'),
		),
		'specials-save_offer'=>array(
			'l'=>10,
			'p'=>array('offer_id', 'special_id'),
			'r'=>array('offer_id', 'special_id'),
		),
		'specials-save_offers'=>array(
			'l'=>10,
			'p'=>array('special_id'),
			'r'=>array('special_id'),
		),
		'specials-delete_offer'=>array(
			'l'=>10,
			'p'=>array('offer_id', 'special_id'),
			'r'=>array('offer_id', 'special_id'),
		),
		'specials-upload_pic'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'specials-delete_pic'=>array(
			'l'=>10,
			'p'=>array('id_pic', 'id'),
			'r'=>array('id_pic', 'id'),
		),
		
		'specials-special1'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'specials_filter_type', 'specials_filter_text', 'special_filter_page'),
		),
		'specials-special2'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id', 'specials_filter_type', 'specials_filter_text', 'special_filter_page'),
		),
		'users-admin'=>array(
			'l'=>10,
			'p'=>array('users_type', 'users_text', 'users_page'),
			'r'=>array('users_type', 'users_text', 'users_page'),
		),
		'users-edit'=>array(
			'l'=>10,
			'p'=>array('id', 'users_type'),
			'r'=>array('id', 'users_type', 'users_text', 'users_page'),
		),
		'users-save'=>array(
			'l'=>10,
			'p'=>array('id', 'users_type'),
			'r'=>array('id', 'users_type', 'users_text', 'users_page'),
		),
		'offer_vacancy-index'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-menu'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-home_search'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-home_promotions'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-advertising'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-upload_pic'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
		'offer_vacancy-advertising_change_status'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'offer_vacancy-advertising_edit'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'offer_vacancy-advertising_delete'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'offer_vacancy-advertising_save'=>array(
			'l'=>10,
			'p'=>array('id'),
			'r'=>array('id'),
		),
		'offer_vacancy-get_offers'=>array(
			'l'=>10,
			'p'=>array(),
			'r'=>array(),
		),
	)
?>