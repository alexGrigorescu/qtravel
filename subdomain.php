<?php
	$HOST = trim($_SERVER['HTTP_HOST']);
	if (isset($_REQUEST['subdomains'])) 
	{
		$subdomains = $_REQUEST['subdomains'];
	}
	else 
	{
		$subdomains = array();
	}
	
	$subdomains[] = $HOST;
	if (count($subdomains) == 4)
	{
		if (in_array($subdomains[2],array('cazare','sejur','bilet-avion','bilet-autocar','charter',
			'vacanta-individual','vacanta-avion','vacanta-autocar','circuit-avion','circuit-autocar',
			'evenimente-conferinte','evenimente-intalniri','evenimente-team-building','evenimente-incentive')))
		{
			$error_code = '';
			switch ($subdomains[2]){
				case 'cazare':
					$object = 'accommodation';
					break;
				case 'sejur':
					$object = 'vacation';
					break;
				case 'bilet-avion':
					$object = 'flight';
					break;
				case 'bilet-autocar':
					$object = 'buss';
					break;
				case 'charter':
					$object = 'charter';
					break;
				case 'vacanta-individual':
					$object = 'accommodation_individual';
					break;
				case 'vacanta-avion':
					$object = 'accommodation_plane';
					break;
				case 'vacanta-autocar':
					$object = 'accommodation_bus';
					break;
				case 'circuit-avion':
					$object = 'tour_plane';
					break;
				case 'circuit-autocar':
					$object = 'tour_bus';
					break;
				case 'evenimente-conferinte':
					$object = 'event_conference';
					break;
				case 'evenimente-intalniri':
					$object = 'event_meeting';
					break;
				case 'evenimente-team-building':
					$object = 'event_team_buiding';
					break;
				case 'evenimente-incentive':
					$object = 'event_incentive';
					break;
			}	
			$object_tr = $subdomains[2];
			
			$_REQUEST['action'] = $object.'-location';
			$method = 'location';
			$_REQUEST['location'] = $subdomains[0];			
			$_REQUEST['region'] = $subdomains[1];
			$region = Bus::call('regions', 'readByCode', array('code'=>$subdomains[1]));
			if (isset($region['id']))
			{
				$_REQUEST['country'] = $region['country_code'];
			}
			else 
			{
				$error_code = '4_no_region';
			}
			if (isset($_REQUEST['region']))
			{
				if(isset($DOMAINS[$object_tr][$_REQUEST['region']]))
				{
					if($DOMAINS[$object_tr][$_REQUEST['region']]['domain'] != DOMAIN)
					{
						$error_code = '4_region_domain'; 
					}
					else 
					{
						//corect region on domain
					}
				}
				elseif(isset($_REQUEST['country']))
				{
					if(isset($DOMAINS[$object_tr][$_REQUEST['country']]))
					{
						if ($DOMAINS[$object_tr][$_REQUEST['country']]['domain'] != DOMAIN)
						{
							$error_code = '4_country_domain'; 
						}
						else 
						{
							//corect country on domain
						}
					}
				}
				elseif(isset($_REQUEST['continent']))
				{
					if ($object == 'flight')
					{
						if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
						{
							$error_code = '3_continent_flight';
						}
						else 
						{
							//corect flight on domain
						}
					}
					else 
					{
						$error_code = '4_continent_domain'; 
					}
				}
				else 
				{
					//corect region or country on www 
				}
			}
			if(isset($_REQUEST['country']))
			{
				if ($object == 'flight')
				{
					if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
					{
						$error_code = '4_country_flight';
					}
					else 
					{
						//corect flight on domain
					}
				}
				elseif(isset($DOMAINS[$object_tr][$_REQUEST['country']]))
				{
					if ($DOMAINS[$object_tr][$_REQUEST['country']]['domain'] != DOMAIN)
					{
						$error_code = '4_country_domain'; 
					}
					else 
					{
						//corect country on domain
					}
				}
				else 
				{
					$error_code = '4_country_domain';
				}
			}
			elseif(isset($_REQUEST['continent']))
			{
				if ($object == 'flight')
				{
					if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
					{
						$error_code = '4_continent_flight';
					}
					else 
					{
						//corect flight on domain
					}
				}
				else 
				{
					$error_code = '4_continent_domain'; 
				}
			}
			else
			{
				$error_code = '4_no_region'; 
			}
						
			if (strlen(trim($error_code)) > 0 && DOMAIN != WWW)
			{
				page_invalid($error_code);
			}
		}		
	}
	elseif(count($subdomains) == 3)
	{
		$error_code = '';

		if (in_array($subdomains[1],array('cazare','sejur','bilet-avion','bilet-autocar','charter',
			'vacanta-individual','vacanta-avion','vacanta-autocar','circuit-avion','circuit-autocar',
			'evenimente-conferinte','evenimente-intalniri','evenimente-team-building','evenimente-incentive')))
		{
			switch ($subdomains[1]){
				case 'cazare':
					$object = 'accommodation';
					break;
				case 'sejur':
					$object = 'vacation';
					break;
				case 'bilet-avion':
					$object = 'flight';
					break;
				case 'bilet-autocar':
					$object = 'buss';
					break;
				case 'charter':
					$object = 'charter';
					break;
				case 'vacanta-individual':
					$object = 'accommodation_individual';
					break;
				case 'vacanta-avion':
					$object = 'accommodation_plane';
					break;
				case 'vacanta-autocar':
					$object = 'accommodation_bus';
					break;
				case 'circuit-avion':
					$object = 'tour_plane';
					break;
				case 'circuit-autocar':
					$object = 'tour_bus';
					break;
				case 'evenimente-conferinte':
					$object = 'event_conference';
					break;
				case 'evenimente-intalniri':
					$object = 'event_meeting';
					break;
				case 'evenimente-team-building':
					$object = 'event_team_buiding';
					break;
				case 'evenimente-incentive':
					$object = 'event_incentive';
					break;
			}	
			$object_tr = $subdomains[1];
			
			$region = Bus::call('regions', 'readByCode', array('code'=>$subdomains[0]));
			if (isset($region['id']))
			{
				$_REQUEST['action'] = $object.'-region';
				$method = 'region';
				$_REQUEST['region'] = $region['code'];
				$_REQUEST['country'] = $region['country_code'];
				if (isset($_REQUEST['param0']))
				{
					$_REQUEST['action'] = $object.'-location';
					$method = 'location';
					$_REQUEST['location'] = $_REQUEST['param0'];
				}
			}
			else 
			{
				$country = Bus::call('countries', 'readByCode', array('code'=>$subdomains[0]));
				if (isset($country['id']))
				{
					$_REQUEST['action'] = $object.'-country';
					$method = 'country';
					$_REQUEST['country'] = $country['code'];			
				}
				else 
				{
					$continent = Bus::call('continents', 'readByCode', array('code'=>$subdomains[0]));
					if (isset($continent['id']))
					{
						$_REQUEST['action'] = $object.'-continent';
						$method = 'continent';
						$_REQUEST['continent'] = $continent['code'];			
					}
					else 
					{
						$error_code = '3_no_region';
					}
				}
			}
			
			if(isset($_REQUEST['country']))
			{
				if ($object == 'flight')
				{
					if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
					{
						$error_code = '3_country_flight';
					}
					else 
					{
						//corect flight on domain
					}
				}
				elseif(isset($DOMAINS[$object_tr][$_REQUEST['country']]))
				{
					if ($DOMAINS[$object_tr][$_REQUEST['country']]['domain'] != DOMAIN)
					{
						$error_code = '3_country_domain'; 
					}
					else 
					{
						//corect country on domain
					}
				}
				else 
				{
					$error_code = '3_country_domain';
				}
			}
			elseif(isset($_REQUEST['continent']))
			{
				if ($object == 'flight')
				{
					if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
					{
						$error_code = '3_continent_flight';
					}
					else 
					{
						//corect flight on domain
					}
				}
				else 
				{
					$error_code = '3_continent_domain'; 
				}
			}
			else
			{
				$error_code = '3_no_country'; 
			}
			if (strlen(trim($error_code)) > 0 && DOMAIN != WWW)
			{
				page_invalid($error_code);
			}
		}
		else 
		{
			//de tratat
		}
	}
	elseif(count($subdomains) == 2)
	{
		$error_code = '';
		switch ($subdomains[0]){
			case 'cazare':
				$object = 'accommodation';
				break;
			case 'sejur':
				$object = 'vacation';
				break;
			case 'bilet-avion':
				$object = 'flight';
				break;
			case 'bilet-autocar':
				$object = 'buss';
				break;
			case 'charter':
				$object = 'charter';
				break;
			case 'vacanta-individual':
				$object = 'accommodation_individual';
				break;
			case 'vacanta-avion':
				$object = 'accommodation_plane';
				break;
			case 'vacanta-autocar':
				$object = 'accommodation_bus';
				break;
			case 'circuit-avion':
				$object = 'tour_plane';
				break;
			case 'circuit-autocar':
				$object = 'tour_bus';
				break;
			case 'evenimente-conferinte':
				$object = 'event_conference';
				break;
			case 'evenimente-intalniri':
				$object = 'event_meeting';
				break;
			case 'evenimente-team-building':
				$object = 'event_team_buiding';
				break;
			case 'evenimente-incentive':
				$object = 'event_incentive';
				break;
		}	

		$object_tr = $subdomains[0];
		if (!isset($object))
		{
			$error_code = '2_object';
			page_invalid($error_code);
			die();	
		}
		else 
		{
			
			if($object == 'accommodation')
			{
				$error_code = '2_accommodation_domain'; 
			}
			elseif($object == 'vacation')
			{
				$error_code = '2_vacation_domain';
			}
			elseif ($object == 'flight')
			{
				if ($DOMAINS[$object_tr]['domain'] != DOMAIN)
				{
					$error_code = '2_flight_domain'; 
				}
				else 
				{
					//ok
				}
			} 
			elseif($object == 'buss')
			{
				$error_code = '2_buss_domain'; 
			}
			elseif($object == 'charter')
			{
				$error_code = '2_charter_domain'; 
			}
		}
		
		if (strlen(trim($error_code)) > 0 && DOMAIN != WWW)
		{
			page_invalid($error_code);
		}
		elseif (!isset($_REQUEST['action']))
		{
			$_REQUEST['action'] = $object.'-index';
		}
	}
	
	function page_invalid($error_code, $header_404 = true)
	{
		if ($header_404)
		{
			header("HTTP/1.0 404 Not Found");
			if(stripos($_SERVER['HTTP_HOST'],'oferta-vacanta') !== false) {
				include 'oferta_vacanta_404.php';
			}
			die();
		}
		else 
		{
			echo ('Page invalid '.$error_code.'!<br/>');
			echo ('Domain: '.DOMAIN.'<br/>');
			die();
		}
	}
?>