<?
class layout extends SmartyTemplate 
{
	function display($meta = array(),$layout = 'layout')
	{
		$domain = Bus::call('domains', 'readByDomain', array('domain'=>DOMAIN));
		
		$meta['title'] = $domain['title'].' - '.elementStr($meta['title'], tr(strtolower(OBJ.'_title_'.MET)));
		$meta['metatitle'] = $domain['title'].' - '.elementStr($meta['metatitle'], tr(strtolower(OBJ.'_metatitle_'.MET)));
		$meta['metadescription'] = $domain['title'].' - '.elementStr($meta['metadescription'], tr(strtolower(OBJ.'_metadescription_'.MET)));
		$meta['metadescription'] = str_replace('\n', ' ', $meta['metadescription']);
		$meta['metakeywords'] = elementStr($meta['metakeywords'], tr(strtolower(OBJ.'_metakeywords_'.MET))).', '.$domain['title'];
		$meta['metalink'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		
		$menuListResponse = Bus::call('vacancyOfferAdmin', 'getArray', array( 'sorting'=>'id asc','group'=>'menulist','by_field'=>'code'));
		$this->assign('menuList', $menuListResponse['data']);
		
		$vacancyOfferAdvertisingResponse = Bus::call('vacancyOfferAdvertising', 'getArray', array('status'=>'1','sorting'=>'rand()'));
		$this->assign('vacancyOfferAdvertisingUrl', $url = Bus::call('pics', 'url', array('type'=>'offer_vacancy_advertising','target_id'=>0)));
		$this->assign('vacancyOfferAdvertising', $vacancyOfferAdvertisingResponse['data']);
		$this->assign('buble_width', 146);
		
		$facebookProfile = 'http://www.facebook.com/pages/Q-Travel-Confort/164486420240457';
		$this->assign('facebookProfile', $facebookProfile);
		
		$this->assign('url', 'http://'.WEB.'.'.DOMAIN.'/');
		
		$meta['widthRightBox'] = true;
		$page_content = $this->get();
		
		$this->assign('page_content', $page_content);
		$this->assign('meta', $meta);
		$this->assign('site_url', $_SERVER['HTTP_HOST']);
		
		$domains = Bus::call('domains', 'getArray', array('thumb'=>1, 'thumb_width'=>156, 'thumb_height'=>80));
		$this->assign('layout_domain', $domain);
		$this->assign('layout_domains', $domains['data']);
		
		$pages = Bus::call('pages', 'getArray', array('active'=>1, 'special2'=>1, 'sorting'=>' tree asc, pages.ord asc'));
		$this->assign('layout_pages', $pages['data']);
		
		
		$special_vacations = Bus::call('specials', 'getSpecials', array('code'=>'super-ocazii', 'domain_domain'=>DOMAIN, 'thumb_offer'=>1, 'thumb_offer_width'=>80, 'thumb_offer_height'=>60));		
		if (isset($special_vacations['data']['super-ocazii']['offers']))
		{
			$this->assign('special_vacations', $special_vacations['data']['super-ocazii']['offers']);
		}
		if (isset($_REQUEST['debug']))
		{
			print_p($special_vacations);
		}
		$last_minute = Bus::call('specials', 'getSpecials', array('code'=>'last-minute', 'sorting'=>' rand()', 'domain_domain'=>DOMAIN));	
		if (isset($last_minute['data']['last-minute']['offers']))
		{
			foreach ($last_minute['data']['last-minute']['offers'] as $offer)
			{
				$this->assign('last_minute', $offer);
				break;
			}
		}
		if (MET == 'region' && (OBJ == 'accommodation' || OBJ == 'vacation' || OBJ == 'charter')) 
		{
			$this->assign('has_region', elementStr($_REQUEST['region']));
		}
		
		$css = $this->fetch($this->getFileName('style.css'));
		$this->assign("css", $css);

		$js = $this->fetch($this->getFileName('javascript.js'));
		$this->assign("js", $js);
		
		$str = $this->fetch($this->getFileName($layout));
		
		
		if (isset ($GLOBALS['MATRIX'][SECTION][OBJ.'-'.MET]['c']) && $GLOBALS['MATRIX'][SECTION][OBJ.'-'.MET]['c'] === 1)
		{
			$cache_name = cache::code($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$cache = cache::save ($cache_name, $str);			
		}
		
		echo ($str);
	}
	
	/**
	 *  get template content in a string
	 *  @param mixed $p template parameter
	 */
	function get()
	{
		$domain = Bus::call('domains', 'readByDomain', array('domain'=>DOMAIN));
		$this->assign('layout_domain', $domain);
		$this->assign('GLOBALS', $GLOBALS);
		$this->assign('img_path', 'http://'.WEB.'.'.$GLOBALS['DOMAINS']['www']['domain'].'/systems/'.SYSTEM.'/templates/'.SECTION.'/img/');
		$this->assign('user_id', $GLOBALS['SECURITY']->user_id);
		$this->assign('user_info', $GLOBALS['SECURITY']->user_info);
		
		return $this->fetch($this->getFileName($this->template));
	}
}
?>