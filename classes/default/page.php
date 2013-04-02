<?
	class page
	{
		function index($code)
		{
			$page = Bus::call('pages', 'readByCode', array('code'=>$code));
			if ($code == 'undefined' || !isset($page['code']) || strlen(trim($page['code'])) == 0)
			{
				$t = new layout('page_invalid'); 
				$t->display();
			}
			else 
			{
				$meta = array();
				$meta['title'] = $page['metatitle'];
				$meta['metatitle'] = $page['metatitle'];
				$meta['metadescription'] = $page['leadtext'];
				$meta['metakeywords'] = $page['tags'];
				$meta['links'] = $this->metalinks();
				
				$t = new layout('page_index');
				$t->assign('content', $page['content']);
				$t->display($meta);
			}
		}
		
		function metalinks()
		{
			$links = array();
			
			$countries = Bus::call('countries', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));			
			foreach ($countries['data'] as $k=>$v)
			{
				$links['countries'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations').$v['title'], 'url'=>url('accommodation', 'country', array('country'=>$v['code'])));
			}
			
			$regions = Bus::call('regions', 'getArrayBy', array('by'=>'accommodations', 'special2'=>1));
			foreach ($regions['data'] as $k=>$v)
			{
				$links['regions'][] = array('title'=>$v['title'], 'metatitle'=>tr('accommodation_title_accommodations').$v['title'], 'url'=>url('accommodation', 'region', array('region'=>$v['code'], 'country'=>$v['country_code'])));
			}
			
			return $links;
		}
	}
?>