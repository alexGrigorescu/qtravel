<?php
	$DEFAULT_EMAIL_SOURCE = 'office@oferta-vacanta.ro';
	$ADMIN_EMAIL = 'rezervari@oferta-vacanta.ro';
	$SUPPORT_EMAIL = 'dan_lex@yahoo.com';
	
	$LANGUAGES = array();
	$LANGUAGES['ro'] = array('iso'=>'ro', 'title'=>'Romana', 'active'=>true);
	
	$DEFAULT_LANG['member'] = 'ro';
	$DEFAULT_LANG['admin'] = 'ro';
	
	$DOMAINS = array();
	
	$CACHE = false;
	
	/*
	$DOMAINS['www'] = 'oferta-vacanta.ro';
	$DOMAINS['cazare']['bulgaria'] = 'oferteinbulgaria.ro';
	$DOMAINS['sejur']['bulgaria'] = 'oferteinbulgaria.ro';
	$DOMAINS['sejur']['spania']['mallorca'] = 'oferta-mallorca.ro';
	$DOMAINS['bilet-avion'] = 'avionbilet.ro';
	$DOMAINS['bilet-autocar'] = 'oferta-vacanta.ro';
	*/
	
	$GLOBALS['DESTINATIONS'] = array();
	$GLOBALS['DESTINATIONS']['egipt'] = array('title'=>'Egipt', 'description'=>'Cairo, Luxor, Sharm el Sheik, Hurghada...');
	$GLOBALS['DESTINATIONS']['grecia'] = array('title'=>'Grecia', 'description'=>'Creta, Paralia, Halkidiki, Santorini, Rodos...');
	$GLOBALS['DESTINATIONS']['turcia'] = array('title'=>'Turcia', 'description'=>'Bodrum, Kusadasi, Marmaris, Antalya...');
	$GLOBALS['DESTINATIONS']['spania'] = array('title'=>'Spania', 'description'=>'Costa Brava, Ibiza, Palma de Mallorca, Costa del Sol...');
	$GLOBALS['DESTINATIONS']['tunisia'] = array('title'=>'Tunisia', 'description'=>'Monastir, Sousse, Hammamet...');
	$GLOBALS['DESTINATIONS']['italia'] = array('title'=>'Italia', 'description'=>'Roma, Milano, Rimini, Lido di Jesolo...');
	$GLOBALS['DESTINATIONS']['bulgaria'] = array('title'=>'Bulgaria', 'description'=>'Albena, Nisipurile de aur');
	$GLOBALS['DESTINATIONS']['romania'] = array('title'=>'Romania', 'description'=>'Litoral, Munte, Cazari, Agroturism');
	
	$GLOBALS['ACCOMCAT'] = array();
	$GLOBALS['ACCOMCAT']['-'] = '-';
	$GLOBALS['ACCOMCAT']['craciun'] = 'Craciun';
	$GLOBALS['ACCOMCAT']['revelion'] = 'Revelion';
	$GLOBALS['ACCOMCAT']['paste'] = 'Paste';
	$GLOBALS['ACCOMCAT']['1mai'] = '1 Mai';
	$GLOBALS['ACCOMCAT']['litoral'] = 'Litoral';
	$GLOBALS['ACCOMCAT']['munte'] = 'Munte';
	$GLOBALS['ACCOMCAT']['ski'] = 'Ski';

	$GLOBALS['ACCOMCAT_ACTIVE'] = array();
	//$GLOBALS['ACCOMCAT_ACTIVE']['paste'] = 'Paste';
	//$GLOBALS['ACCOMCAT_ACTIVE']['1mai'] = '1 Mai';
	//$GLOBALS['ACCOMCAT_ACTIVE']['litoral'] = 'Litoral';
	$GLOBALS['ACCOMCAT_ACTIVE']['munte'] = 'Munte';
	$GLOBALS['ACCOMCAT_ACTIVE']['craciun'] = 'Craciun';
	$GLOBALS['ACCOMCAT_ACTIVE']['revelion'] = 'Revelion';
	$GLOBALS['ACCOMCAT_ACTIVE']['ski'] = 'Ski';
	
	$GLOBALS['SUBTYPES'] = array();
	$GLOBALS['SUBTYPES']['fara-masa'] = array();
	$GLOBALS['SUBTYPES']['fara-masa']['code'] = 'fara-masa';
	$GLOBALS['SUBTYPES']['fara-masa']['title'] = 'Fara masa';
	$GLOBALS['SUBTYPES']['fara-masa']['match'] = array('fara masa');
	$GLOBALS['SUBTYPES']['fara-masa']['unmatch'] = array();
	
	$GLOBALS['SUBTYPES']['mic-dejun'] = array();
	$GLOBALS['SUBTYPES']['mic-dejun']['code'] = 'mic-dejun';
	$GLOBALS['SUBTYPES']['mic-dejun']['title'] = 'Mic dejun';
	$GLOBALS['SUBTYPES']['mic-dejun']['match'] = array('mic dejun');
	$GLOBALS['SUBTYPES']['mic-dejun']['unmatch'] = array();
	
	$GLOBALS['SUBTYPES']['demipensiune'] = array();
	$GLOBALS['SUBTYPES']['demipensiune']['code'] = 'demipensiune';
	$GLOBALS['SUBTYPES']['demipensiune']['title'] = 'Demipensiune';
	$GLOBALS['SUBTYPES']['demipensiune']['match'] = array('demipensiune');
	$GLOBALS['SUBTYPES']['demipensiune']['unmatch'] = array();
	
	$GLOBALS['SUBTYPES']['pensiune-completa'] = array();
	$GLOBALS['SUBTYPES']['pensiune-completa']['code'] = 'pensiune-completa';
	$GLOBALS['SUBTYPES']['pensiune-completa']['title'] = 'Pensiune completa';
	$GLOBALS['SUBTYPES']['pensiune-completa']['match'] = array('pensiune completa');
	$GLOBALS['SUBTYPES']['pensiune-completa']['unmatch'] = array();
	
	$GLOBALS['SUBTYPES']['all-inclusive'] = array();
	$GLOBALS['SUBTYPES']['all-inclusive']['code'] = 'all-inclusive';
	$GLOBALS['SUBTYPES']['all-inclusive']['title'] = 'All inclusive';
	$GLOBALS['SUBTYPES']['all-inclusive']['match'] = array('all inclusive');
	$GLOBALS['SUBTYPES']['all-inclusive']['unmatch'] = array('ultra all inclusive', 'high end a la carte', 'mega all inclusive', 'diamond all inclusive', 'ultimate all inclusive', '7 max all inclusive', '8 high end a la carte', 'mega all inclusive', 'diamond all inclusive', 'ultimate all inclusive');
	
	$GLOBALS['SUBTYPES']['ultra-all-inclusive'] = array();
	$GLOBALS['SUBTYPES']['ultra-all-inclusive']['code'] = 'ultra-all-inclusive';
	$GLOBALS['SUBTYPES']['ultra-all-inclusive']['title'] = 'Ultra all inclusive';
	$GLOBALS['SUBTYPES']['ultra-all-inclusive']['match'] = array('ultra all inclusive', 'high end a la carte', 'mega all inclusive', 'diamond all inclusive', 'ultimate all inclusive', '7 max all inclusive', '8 high end a la carte', 'mega all inclusive', 'diamond all inclusive', 'ultimate all inclusive');
	$GLOBALS['SUBTYPES']['ultra-all-inclusive']['unmatch'] = array();
	
	
	
?>
