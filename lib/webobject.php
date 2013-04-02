<?
	function __autoload($class_name) 
	{
		$custom_file = LOCAL_PATH.'systems/'.SYSTEM.'/classes/'.SECTION.'/'.$class_name.'.php';
		$default_section_file = LOCAL_PATH.'classes/'.SECTION.'/'.$class_name.'.php';
		$default_file = LOCAL_PATH.'classes/default/'.$class_name.'.php';
		$bus_file = LOCAL_PATH.'business/'.$class_name.'.php';
		$form_file = LOCAL_PATH.'forms/'.$class_name.'.php';
		$grid_file = LOCAL_PATH.'grids/'.$class_name.'.php';
		if (file_exists ($custom_file)) require_once $custom_file ;
		else if (file_exists ($default_section_file)) require_once $default_file;
		else if (file_exists ($default_file)) require_once $default_file;
		else if (file_exists ($bus_file)) require_once $bus_file;
		else if (file_exists ($form_file)) require_once $form_file;
		else if (file_exists ($grid_file)) require_once $grid_file;
	}

	function url($object, $method, $params = array(), $htmlencode = true)
	{
		if ($object == '') $object = $GLOBALS['OBJ'];
	
		if (isset($GLOBALS['MATRIX'][SECTION]["$object-$method"])); else return "#";
		
		if (isset($params['lang']))
		{
			$lang = trim($params['lang']);
		}
		else $lang = LANG;
		$path = implode('/', array_slice(explode('/', $_SERVER['PHP_SELF']), 0, -1)).'/';
		
		$s = '';
		foreach ($GLOBALS['MATRIX'][SECTION]["$object-$method"]['r'] as $k=>$v)
		{
			if (isset($params[$v]))
				$s .= '&' .
				urlencode($v) . '=' .
				urlencode($params[$v]);
			elseif (isset($_REQUEST[$v]) && $_REQUEST[$v] > '')
				$s .= '&' . urlencode($v) . '=' . urlencode($_REQUEST[$v]);
		}

		$sp = '';
		foreach ($GLOBALS['MATRIX'][SECTION]["$object-$method"]['p'] as $k=>$v)
		{
			if (isset($params[$v]))
				$sp .= '&' .
				urlencode($v) . '=' .
				urlencode($params[$v]);
			elseif (isset($_REQUEST[$v]) && $_REQUEST[$v] > '')
				$sp .= '&' . urlencode($v) . '=' . urlencode($_REQUEST[$v]);
		}
		
		if ($object == 'page' && $method == 'index')
		{
			$code = 'undefined';
			if (isset($params['code']))
			{
				$code = trim($params['code']);
			}
			elseif (isset($_REQUEST['code']))
			{
				$code = $_REQUEST['code'];
			}
			$link = 'http://'.WEB.'.'.DOMAIN.'/page.'.$code.'.html';
			return $link;
		}
		
		if ( in_array($object,array('accommodation','accommodation_individual','accommodation_plane','accommodation_bus','vacation','charter','tour_plane','tour_bus','event_conference','event_meeting','event_team_buiding','event_incentive')) )
		{
			if ($object == 'accommodation') $key = 'cazare';
			if ($object == 'vacation') $key = 'sejur';
			if ($object == 'charter') $key = 'charter';
			if ($object == 'accommodation_individual') $key = 'vacanta-individual';
			if ($object == 'accommodation_plane') $key = 'vacanta-avion';
			if ($object == 'accommodation_bus') $key = 'vacanta-autocar';
			if ($object == 'tour_plane') $key = 'circuit-avion';
			if ($object == 'tour_bus') $key = 'circuit-autocar';
			if ($object == 'event_conference') $key = 'evenimente-conferinte';
			if ($object == 'event_meeting') $key = 'evenimente-intalniri';
			if ($object == 'event_team_buiding') $key = 'evenimente-team-building';
			if ($object == 'event_incentive') $key = 'evenimente-incentive';
			if ($method == 'index')
			{
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/';//'.html';
				if(in_array($object,array('accommodation_individual','accommodation_plane','accommodation_bus','tour_plane','tour_bus','event_conference','event_meeting','event_team_buiding','event_incentive')) && strlen($s) > 0){
					$link .= '?'.html($s);
				}
				return $link;
			}

			elseif ($method == 'continent')
			{
				$continent = 'undefined';
				if (isset($params['continent']))
				{
					$continent = trim($params['continent']);
				}
				elseif (isset($_REQUEST['continent']))
				{
					$continent = $_REQUEST['continent'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$continent.'/';//'.html';
				
				return $link;
			}
			elseif ($method == 'country')
			{
				$country = 'undefined';
				if (isset($params['country']))
				{
					$country = trim($params['country']);
				}
				elseif (isset($_REQUEST['country']))
				{
					$country = $_REQUEST['country'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$country.'/';//'.html';
				if(in_array($object,array('accommodation_individual','accommodation_plane','accommodation_bus','tour_plane','tour_bus','event_conference','event_meeting','event_team_buiding','event_incentive')) && strlen($sp) > 0){
					$link .= '?'.html($sp);
				}

				return $link;
			}
			elseif ($method == 'region')
			{
				$country = 'undefined';
				if (isset($params['country']))
				{
					$country = trim($params['country']);
				}
				elseif (isset($_REQUEST['country']))
				{
					$country = $_REQUEST['country'];
				}
				
				$region = 'undefined';
				if (isset($params['region']))
				{
					$region = trim($params['region']);
				}
				elseif (isset($_REQUEST['region']))
				{
					$region = $_REQUEST['region'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$region.'/';//'.html';
				
				if (isset($params['subtype']))
				{
					$link .= '?subtype='.$params['subtype'];
				} 
				elseif (in_array($object,array('accommodation_individual', 'accommodation_plane', 'accommodation_bus', 'tour_plane', 'tour_bus', 'event_conference',				   'event_meeting', 'event_team_buiding', 'event_incentive')) && strlen($sp) > 0)
				{
					$link .= '?'.html($sp);
				}
				
				return $link;
			}
			elseif ($method == 'location')
			{
				$country = 'undefined';
				if (isset($params['country']))
				{
					$country = trim($params['country']);
				}
				elseif (isset($_REQUEST['country']))
				{
					$country = $_REQUEST['country'];
				}
				
				$region = 'undefined';
				if (isset($params['region']))
				{
					$region = trim($params['region']);
				}
				elseif (isset($_REQUEST['region']))
				{
					$region = $_REQUEST['region'];
				}
				
				$location = 'undefined';
				if (isset($params['location']))
				{
					$location = trim($params['location']);
				}
				elseif (isset($_REQUEST['location']))
				{
					$location = $_REQUEST['location'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$region.'/'.$location.'.html';
				
				return $link;
			}
		}
		
		if ($object == 'buss' || $object == 'flight')
		{
			if ($object == 'buss') $key = 'bilet-autocar';
			if ($object == 'flight') $key = 'bilet-avion';
			if ($method == 'index')
			{
				if (isset($GLOBALS['DOMAINS'][$key]))
				{
					$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/';//'.html';
				}
				else 
				{
					$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/';//'.html';
				}

				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/';//'.html';
				
				if(strlen($s) > 0 && DOMAIN == 'oferta-vacanta.ro'){
					$link .= '?'.html($s);
				}
				return $link;
			}
			elseif ($method == 'continent')
			{
				$continent = 'undefined';
				if (isset($params['continent']))
				{
					$continent = trim($params['continent']);
				}
				elseif (isset($_REQUEST['continent']))
				{
					$continent = $_REQUEST['continent'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$continent.'/';//'.html';
				
				return $link;
			}
			elseif ($method == 'country')
			{
				$location = 'undefined';
				if (isset($params['country']))
				{
					$country = trim($params['country']);
				}
				elseif (isset($_REQUEST['country']))
				{
					$country = $_REQUEST['country'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$country.'/';//'.html';
				if(strlen($sp) > 0){
					$link .= '?'.html($sp);
				}
				
				return $link;
			}
			elseif ($method == 'region')
			{
				$region = 'undefined';
				if (isset($params['region']))
				{
					$region = trim($params['region']);
				}
				elseif (isset($_REQUEST['region']))
				{
					$region = $_REQUEST['region'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$region.'/';//'.html';
				if(strlen($sp) > 0){
					$link .= '?'.html($sp);
				}
				
				return $link;
			}
			elseif ($method == 'location')
			{
				$region = 'undefined';
				if (isset($params['region']))
				{
					$region = trim($params['region']);
				}
				elseif (isset($_REQUEST['region']))
				{
					$region = $_REQUEST['region'];
				}
				
				$location = 'undefined';
				if (isset($params['location']))
				{
					$location = trim($params['location']);
				}
				elseif (isset($_REQUEST['location']))
				{
					$location = $_REQUEST['location'];
				}
				
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$key.'/'.$region.'/'.$location.'.html';
				
				return $link;
			}
		}
		
		
		if (SECTION == 'member' && $object == 'main' && $method == 'index')
		{
			$link = 'http://'.WEB.'.'.DOMAIN;
			return $link;
		}
		
		if (SECTION == 'member' && $object == 'news' && $method == 'index')
		{
			$param1 = 'index';
			if (isset($params['param1']))
			{
				$param1 = trim($params['param1']);
			}
			elseif (isset($_REQUEST['param1']))
			{
				$param1 = $_REQUEST['param1'];
			}
			$page = 0;
			if (isset($params['page']))
			{
				$page = trim($params['page']);
			}
			elseif (isset($_REQUEST['page']))
			{
				$page = $_REQUEST['page'];
			}
			$link = 'http://'.WEB.'.'.DOMAIN.'/'.'news.'.$param1.'.'.$page.'.html';
			return $link;
		}
		
		if (SECTION == 'member' && $object == 'news' && $method == 'details')
		{
			$link = 'http://'.WEB.'.'.DOMAIN.'/'.'news.'.$params['code'].'.html';
			return $link;
		}
		
		if (SECTION == 'member')
		{
			if (strlen(trim($s)) > 0)
			{
				if ($htmlencode) $s = html($s);
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$object.'.'.$method.'.html?'.$s;
			}
			else 
			{
				$link = 'http://'.WEB.'.'.DOMAIN.'/'.$object.'.'.$method.'.html';
			}
			return $link;
		}
		
		$s = INDEX."?action=$object-$method$s";
		if ($htmlencode) $s = html($s);
		
		return $s;
	}

	function getCleanLink($object, $method, $params = array(), $htmlencode = true)
	{
		if ($object == '') $object = $GLOBALS['OBJ'];

		if ($GLOBALS['MATRIX'][SECTION]["$object-$method"]); else return "#";

		$s = '';

		foreach ($params as $k=>$v)
			$s .= '&' . urlencode($k) . '=' . urlencode($v);

		$s = INDEX."?action=$object-$method$s";

		if ($htmlencode) $s = html($s);

		return $s;
	}

	function getHiddenFields($object, $method, $params = array())
	{
		if ($object == '') $object = $GLOBALS['OBJ'];

		if (isset($GLOBALS['MATRIX'][SECTION]["$object-$method"])); else return "<!-- INVALID TARGET: $object-$method -->";

		$s = '';
		foreach ($GLOBALS['MATRIX'][SECTION]["$object-$method"]['r'] as $k=>$v)
			if (isset($params[$v]))
				$s .= '<input type="hidden" name="' . html($v) . '" value="' . html($params[$v]) . '"/>';
			elseif (isset($_REQUEST[$v]) && $_REQUEST[$v] > '')
				$s .= '<input type="hidden" name="' . html($v) . '" value="' . html($_REQUEST[$v]) . '"/>';

		$s = "<input type=\"hidden\" name=\"action\" value=\"$object-$method\"/>$s";

		return $s;
	}
	
	function redirectToUrl($lk, $fast = true)
	{
		if ($fast)
			header('Location: '.$lk."\n");
		else
			header("Refresh: 0; URL=$lk");
		echo '<html><body onload="location.href=\''.js_value_encode($lk).'\'"><a href="'.$lk.'">Click to continue</a></body></html>';
		die;
	}

	function redirect($object, $method, $params = array(), $fast = true)
	{
		$lk = url($object, $method, $params, false);	// nu encoda html
		if ($lk == '#') die ("Cannot redirect to $object.$method. Invalid target method/object.");
		redirectToUrl($lk, $fast);
	}
	
	function html($s)
	{
		return htmlspecialchars($s, ENT_QUOTES, CHARSET);
	}

	function xsetcookie($name, $value, $session_cookie = false, $expire = -1)
	{
		if ($expire == -1) $expire = time() + 5*365*24*60*60;
		setcookie($name, $value, $session_cookie ? 0 : $expire, PATH, DOMAIN);
	}
	
	function days_in_month($month, $year) 
	{ 
		return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
	}

?>