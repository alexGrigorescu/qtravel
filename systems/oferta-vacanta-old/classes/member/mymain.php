<?
class mymain extends main
{
	function index()
	{
		$domain = Bus::call ('domains', 'readByDomain', array('domain'=>DOMAIN));
		$country = array();
		$geolocation = array();
		$regions = array();
		$regions1 = array();
		$regions2 = array();
		$regions3 = array();
		$type = 'accommodation';
		$type1 = 'vacation';
		$type2 = 'flight';
		$type3 = 'charter';
		$tr = array('title_types'=>tr('main_title_accommodations'), 'title_types1'=>tr('main_title_vacations'), 'title_types2'=>tr('main_title_flights'), 'title_types3'=>tr('main_title_charters'));
			
		if (DOMAIN == $GLOBALS['DOMAINS']['www']['domain'])
		{
			$specials = Bus::call('specials', 'getSpecials', array('special1'=>'1', 'thumb_width'=>332, 'thumb_height'=>100, 'domain_domain'=>'', 'special2'=>'1'));
			//$news = bus::call('news', 'getArray', array('active'=>1, 'thumb'=>0, 'page'=>0, 'page_size'=>100, 'sorting' => ' news.date desc ', 'text'=>'%'));            		
			$news = array('count'=>0, 'data'=>array());
		}
		else 
		{
			$specials = Bus::call('specials', 'getSpecials', array('special1'=>'1', 'thumb_width'=>332, 'thumb_height'=>100, 'domain_domain'=>DOMAIN));
			$news = array('data'=>array(), 'count'=>0);
			$geolocation = Bus::call('regions', 'readByCode', array('code'=>$domain['param1']));
			if (isset($geolocation['id']))
			{
				$country = Bus::call('countries', 'read', array('id'=>$geolocation['country_id']));
			}
			else 
			{
				$geolocation = $country = Bus::call('countries', 'readByCode', array('code'=>$domain['param1']));
				if (isset($geolocation['id']))
				{
					
				}
				else 
				{
					$geolocation = Bus::call('continents', 'readByCode', array('code'=>$domain['param1']));
					if (isset($geolocation['id']))
					{
						
					}
				}
			}
		}
		
		if (isset($country['id']))
		{
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'country_id'=>$country['id']));
			$regions = array();
			foreach ($r['data'] as $v) 
			{				
				$regions[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$country['id']));
			$regions1 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions1[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'flights', 'country_id'=>$country['id']));
			$regions2 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions2[$v['code']] = $v;
			}
			
			$r = Bus::call('regions', 'getArrayBy', array('by'=>'vacations', 'country_id'=>$country['id'], 'specialc'=>1));
			$regions3 = array();
			foreach ($r['data'] as $v) 
			{				
				$regions3[$v['code']] = $v;
			}
		}
		
		$meta = array();
		$meta['title'] = tr ('main_title');
		$meta['metatitle'] = tr ('main_title');
		$meta['metadescription'] = tr ('main_title');
		$meta['metakeywords'] = tr ('main_title');
		
		foreach ($specials['data'] as $k=>$v) 
		{
			$meta['metadescription'] .= ', '.$v['info']['title'];
			$meta['metakeywords'] .= ', '.$v['info']['title'];
		}
		
		if ($domain['code'] == 'bilete-avion-ieftine')
		{
			$meta['title'] = $meta['metatitle'] = tr ('main_metatitle_avion');
			$meta['metadescription'] = tr ('main_metadescription_avion');
			$meta['metakeywords'] = tr ('main_metakeywords_avion');
		}
		
		if ($domain['code'] == 'oferte-bulgaria')
		{
			$meta['title'] = $meta['metatitle'] = tr ('main_metatitle_bulgaria');		
		}
		
		$meta['links'] = $this->metalinks();
		
		$t = new layout('main_index');
		$t->assign('domain', $domain);
		$t->assign('news', $news['data']);
		$t->assign('news_count', $news['count']);
		$t->assign('country', $country);
		$t->assign('geolocation', $geolocation);
		$t->assign('specials', $specials['data']);
		$t->assign('specials_count', $specials['count']);
		$t->assign('regions', $regions);
		$t->assign('regions_count', count($regions));
		$t->assign('regions1', $regions1);
		$t->assign('regions1_count', count($regions1));
		$t->assign('regions2', $regions2);
		$t->assign('regions2_count', count($regions2));
		$t->assign('regions3', $regions3);
		$t->assign('regions3_count', count($regions3));
		$t->assign('percolumn', ceil(count($regions) / 3));
		$t->assign('percolumn1', ceil(count($regions1) / 3));
		$t->assign('percolumn2', ceil(count($regions2) / 3));
		$t->assign('percolumn3', ceil(count($regions3) / 3));
		$t->assign('tr', $tr);
		$t->assign('type', $type);
		$t->assign('type1', $type1);
		$t->assign('type2', $type2);
		$t->assign('type3', $type3);
		$t->assign('width_thumb', true);
		$t->display($meta);
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
}
?>
