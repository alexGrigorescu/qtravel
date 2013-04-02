<?
class layout extends SmartyTemplate 
{
	function display($meta = array(),$layout = 'layout')
	{
		$meta['title'] = elementStr($meta['title'], tr(strtolower(OBJ.'_title_'.MET)));
		$meta['metatitle'] = elementStr($meta['metatitle'], tr(strtolower(OBJ.'_metatitle_'.MET)));
		$meta['metadescription'] = elementStr($meta['metadescription'], tr(strtolower(OBJ.'_metadescription_'.MET)));
		$meta['metakeywords'] = elementStr($meta['metakeywords'], tr(strtolower(OBJ.'_metakeywords_'.MET)));
		
		$page_content = $this->get();
		
		$this->assign('page_content', $page_content);
		$this->assign('meta', $meta);
		$this->assign('site_url', $_SERVER['HTTP_HOST']);
		
		$css = $this->fetch($this->getFileName('style.css'));
		$this->assign('css', $css);
		$str = $this->fetch($this->getFileName($layout));
		
		echo ($str);
	}
	
	/**
	 *  get template content in a string
	 *  @param mixed $p template parameter
	 */
	function get()
	{
		$this->assign('GLOBALS', $GLOBALS);
		$this->assign('img_path', LOCAL_URL.'systems/'.SYSTEM.'/templates/'.SECTION.'/img/');
		$this->assign('user_id', $GLOBALS['SECURITY']->user_id);
		$this->assign('user_info', $GLOBALS['SECURITY']->user_info);
		$this->assign('user_rights', $GLOBALS['SECURITY']->user_rights);
		
		return $this->fetch($this->getFileName($this->template));
	}
}
?>