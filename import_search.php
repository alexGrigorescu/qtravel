<?php
	session_start();
	error_reporting(E_ALL);	
	ini_set("display_errors", 1);
	
	define ('SECTION', 'member');
	define ('INDEX', 'index.php');
	
	include 'map.php';
	
	define ('SYSTEM', 'q-travel');
	
	include 'settings/settings.php';
	include 'systems/'.SYSTEM.'/settings/settings.php';
	include 'settings/constants.php';
	include 'systems/'.SYSTEM.'/settings/constants.php';
	include 'settings/tables.php';		
	include 'lib/_include.php';
	include 'business/_include.php';
	
	$DEFAULT_CONNECTION = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	if (!$DEFAULT_CONNECTION) die('Unable to connect to database: '.mysql_error());
	
	
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query('SET collation_connection = utf8_general_ci');
	
	mysql_select_db('qtravel_qtravel', $DEFAULT_CONNECTION);
	
	Bus::call('domains', 'load', array());
	include 'subdomain.php';
	
	
	$t_search = new Table('search');
	// import accommodations
	$sql = 
	'
	select 
		search.id as id,
		accommodations.id as target_id, 
		accommodations.code as code, 
		accommodations.title as title, 
		accommodations.description as description, 
		accommodations.price as price, 
		accommodations.datem as datem, 
		accommodations.special1 as special1, 
		accommodations.special2 as special2, 
		countries.id as country_id, 
		countries.code as country_code,  
		countries.title as country_title, 
		countries.description as country_description, 
		regions.id as region_id, 
		regions.code as region_code, 
		regions.title as region_title,
		regions.description as region_description, 
		locations.id as location_id, 
		locations.code as location_code, 
		locations.title as location_title,
		locations.description as location_description,
		currencies.id as currency_id, 
		currencies.title as currency_title
	from `accommodations`
	left join locations on locations.id=accommodations.location_id
	left join regions on regions.id=locations.region_id
	left join countries on countries.id=regions.country_id
	left join currencies on currencies.id=accommodations.currency_id
	left join search on search.target_id=accommodations.id
	where (search.datem is null or search.datem < accommodations.datem)
	'
	;
	$r = new Query($sql);
	$a = array();
	$a = $r->getArray();
	foreach ($a as $k=>$v)
	{
		$key = 'cazare';
		$region = $v['region_code'];
		$country = $v['country_code'];
		$location = $v['code'];
		$v['url'] = url('accommodations', 'location', array('location'=>$v['code'], 'region'=>$v['region_code']));
		if (isset($GLOBALS['DOMAINS'][$key][$region]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$region]['domain'];
			$v['domain'] = $GLOBALS['DOMAINS'][$key][$region]['domain'];
		}
		elseif (isset($GLOBALS['DOMAINS'][$key][$country]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$country]['domain'];
			$v['domain'] = $GLOBALS['DOMAINS'][$key][$country]['domain'];
		}
		else 
		{
			$v['url'] = 'http://'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS']['www']['domain'].'/'.$location.'.html';
			$v['domain'] = $GLOBALS['DOMAINS']['www']['domain'];
		}
		
		echo ('accommodation|'.$v['code'].'|'.$v['region_code'].'|'.$v['country_code'].'<br/>');
		$rec = $v;
		$rec['class'] = 'accommodation';
		$rec['table'] = 'accommodations';
		$rec['text'] = 'cazare, cazari, hotel, hoteluri';
		
		
		
		if ($rec['id'] > 0)
		{
			$t_search->update ($rec);
		}
		else 
		{
			$t_search->insert($rec);
		}
	}
	
	//import vacations
	$sql = 
	'
	select 
		search.id as id,
		vacations.id as target_id, 
		vacations.code as code, 
		vacations.title as title, 
		vacations.description as description, 
		vacations.price as price, 
		vacations.datem as datem, 
		vacations.special1 as special1, 
		vacations.special2 as special2, 
		countries.id as country_id, 
		countries.code as country_code,  
		countries.title as country_title, 
		countries.description as country_description, 
		regions.id as region_id, 
		regions.code as region_code, 
		regions.title as region_title,
		regions.description as region_description, 
		locations.id as location_id, 
		locations.code as location_code, 
		locations.title as location_title,
		locations.description as location_description,
		currencies.id as currency_id, 
		currencies.title as currency_title
	from `vacations`
	left join locations on locations.id=vacations.location_id
	left join regions on regions.id=locations.region_id
	left join countries on countries.id=regions.country_id
	left join currencies on currencies.id=vacations.currency_id
	left join search on search.target_id=vacations.id
	where (search.datem is null or search.datem < vacations.datem)
	'
	;
	$r = new Query($sql);
	$a = array();
	$a = $r->getArray();
	foreach ($a as $k=>$v)
	{
		$key = 'sejur';
		$region = $v['region_code'];
		$country = $v['country_code'];
		$location = $v['code'];
		$v['url'] = url('accommodations', 'location', array('location'=>$v['code'], 'region'=>$v['region_code']));
		if (isset($GLOBALS['DOMAINS'][$key][$region]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$region]['domain'];
			$v['domain'] = $GLOBALS['DOMAINS'][$key][$region]['domain'];
		}
		elseif (isset($GLOBALS['DOMAINS'][$key][$country]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$country]['domain'];
			$v['domain'] = $GLOBALS['DOMAINS'][$key][$country]['domain'];
		}
		else 
		{
			$v['url'] = 'http://'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS']['www']['domain'].'/'.$location.'.html';
			$v['domain'] = $GLOBALS['DOMAINS']['www']['domain'];
		}
		
		echo ('vacation|'.$v['code'].'|'.$v['region_code'].'|'.$v['country_code'].'<br/>');
		$rec = $v;
		$rec['class'] = 'vacation';
		$rec['table'] = 'vacations';
		$rec['text'] = 'sejur, sejururi, vacanta, vacante';
		
		if ($rec['id'] > 0)
		{
			$t_search->update ($rec);
		}
		else 
		{
			$t_search->insert($rec);
		}
	}
	
	//import busses
	$sql = 
	'
	select 
		search.id as id,
		busses.id as target_id, 
		busses.code as code, 
		busses.title as title, 
		busses.description as description, 
		busses.price2 as price, 
		busses.datem as datem, 
		busses.special1 as special1, 
		busses.special2 as special2, 
		countries.id as country_id, 
		countries.code as country_code,  
		countries.title as country_title, 
		countries.description as country_description, 
		regions.id as region_id, 
		regions.code as region_code, 
		regions.title as region_title,
		regions.description as region_description, 
		busses.id as location_id, 
		busses.code as location_code, 
		busses.title as location_title,
		busses.description as location_description,
		currencies.id as currency_id, 
		currencies.title as currency_title
	from `busses`
	left join regions on regions.id=busses.end_region_id
	left join countries on countries.id=regions.country_id
	left join currencies on currencies.id=busses.currency_id
	left join search on search.target_id=busses.id
	where (search.datem is null or search.datem < busses.datem)
	'
	;
	$r = new Query($sql);
	$a = array();
	$a = $r->getArray();
	foreach ($a as $k=>$v)
	{
		$key = 'bilet-autocar';
		$region = $v['region_code'];
		$country = $v['country_code'];
		$location = $v['code'];
		$v['url'] = url('accommodations', 'location', array('location'=>$v['code'], 'region'=>$v['region_code']));
		if (isset($GLOBALS['DOMAINS'][$key][$region]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$region]['domain'];
		}
		elseif (isset($GLOBALS['DOMAINS'][$key][$country]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$country]['domain'];
		}
		else 
		{
			$v['url'] = 'http://'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS']['www']['domain'].'/'.$location.'.html';
		}
		
		echo ('buss|'.$v['code'].'|'.$v['region_code'].'|'.$v['country_code'].'<br/>');
		$rec = $v;
		$rec['class'] = 'buss';
		$rec['table'] = 'busses';
		$rec['text'] = 'bilet autocar, bilete autocar';
		
		if ($rec['id'] > 0)
		{
			$t_search->update ($rec);
		}
		else 
		{
			$t_search->insert($rec);
		}
	}
	
	//import flights
	$sql = 
	'
	select 
		search.id as id,
		flights.id as target_id, 
		flights.code as code, 
		flights.title as title, 
		flights.description as description, 
		flights.price2 as price, 
		flights.datem as datem, 
		flights.special1 as special1, 
		flights.special2 as special2, 
		countries.id as country_id, 
		countries.code as country_code,  
		countries.title as country_title, 
		countries.description as country_description, 
		regions.id as region_id, 
		regions.code as region_code, 
		regions.title as region_title,
		regions.description as region_description, 
		flights.id as location_id, 
		flights.code as location_code, 
		flights.title as location_title,
		flights.description as location_description,
		currencies.id as currency_id, 
		currencies.title as currency_title
	from `flights`
	left join regions on regions.id=flights.end_region_id
	left join countries on countries.id=regions.country_id
	left join currencies on currencies.id=flights.currency_id
	left join search on search.target_id=flights.id
	where (search.datem is null or search.datem < flights.datem)
	'
	;
	
	$r = new Query($sql);
	$a = array();
	$a = $r->getArray();
	foreach ($a as $k=>$v)
	{
		$key = 'bilet-avion';
		$region = $v['region_code'];
		$country = $v['country_code'];
		$location = $v['code'];
		$v['url'] = url('accommodations', 'location', array('location'=>$v['code'], 'region'=>$v['region_code']));
		if (isset($GLOBALS['DOMAINS'][$key][$region]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$region]['domain'];
		}
		elseif (isset($GLOBALS['DOMAINS'][$key][$country]))
		{
			$v['url'] = 'http://'.$location.'.'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS'][$key][$country]['domain'];
		}
		else 
		{
			$v['url'] = 'http://'.$region.'.'.$key.'.'.$GLOBALS['DOMAINS']['www']['domain'].'/'.$location.'.html';
		}
		
		echo ('flight|'.$v['code'].'|'.$v['region_code'].'|'.$v['country_code'].'<br/>');
		$rec = $v;
		$rec['class'] = 'flight';
		$rec['table'] = 'flights';
		$rec['text'] = 'bilet avion, bilete avion, zbor, avion';
		$rec['currency_id'] = 0 + $v['currency_id'];
		
		if ($rec['id'] > 0)
		{
			$t_search->update ($rec);
		}
		else 
		{
			$t_search->insert($rec);
		}
	}
	
	
?>
