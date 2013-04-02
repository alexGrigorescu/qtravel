<?php
	class search
	{
		function index($q)
		{
			$domain = Bus::call ('domains', 'readByDomain', array('domain'=>DOMAIN));
			$locations = array();
			if (strlen(trim($q)) > 0)
			{
				$set = array();
				$set['text'] = $q;
				if ($domain['code'] == 'bilete-avion-ieftine')
				{
					$set['table'] = 'flights';
				}
				if ($domain['code'] == 'oferte-bulgaria')
				{
					$set['country_code'] = 'bulgaria';
				}
				$locations = Bus::call('search', 'getArray', $set);
			}
			else 
			{
				$locations['data'] = array();
				$locations['count'] = 0;
				$locations['time'] = 0;
			}
			
			//SELECT *, match (code , title , description , `text` , country_code , country_title , country_description , region_title , region_code , region_description , location_code , location_title , location_description )against ('+hilton') + special2 as x FROM `search`  ORDER BY `x`  DESC
			$meta = array();
			
			$t = new layout('search_index');
			$t->assign('q', $q);
			$t->assign('locations', element($locations['data']));
			$t->assign('locations_count', element($locations['count']));
			$t->assign('locations_time', element($locations['time']));
			$t->display($meta);
		}
	}
?>