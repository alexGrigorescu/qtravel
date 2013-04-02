<?
	class SmartyTemplate extends Smarty 
	{
		var $template;
	
		function SmartyTemplate($template)
		{
			$this->template = $template;
			$this->setCompileDir (SMARTY_COMPILE_DIR);
			if (!file_exists(SMARTY_COMPILE_DIR))
			{
				mkdir(SMARTY_COMPILE_DIR);
			}
		}
		
		/**
		*   getFileName($template)
		*   intoarce numele fisierului care va fi incarcat
		*   cauta in template-urile sistemelor si apoi in template-urile principale
		**/
		function getFileName($template)
		{
			
			$f2 = LOCAL_PATH.'templates/default/'.$template.'.tpl';
			$f3 = LOCAL_PATH.'templates/'.SECTION.'/'.$template.'.tpl';
			$f4 = LOCAL_PATH.'systems/'.SYSTEM.'/templates/default/'.$template.'.tpl';
			$f5 = LOCAL_PATH.'systems/'.SYSTEM.'/templates/'.SECTION.'/'.$template.'.tpl';

			if (file_exists($f5)) return $f5;
			if (file_exists($f4)) return $f4;
			if (file_exists($f3)) return $f3;
			if (file_exists($f2)) return $f2;

			echo "Template '$template' (file: <br/>$f2  or <br/>$f3 or <br/>$f4<br/>) not found";
			return false;
		}
	
		/**
		 *  display template on screen
		 */
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
			$this->assign("css", $css);
			
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
			$this->assign('languages', $GLOBALS['LANGUAGES']);
			if (SECTION == 'member')
			{
				$set['sorting'] = ' tree asc, pages.ord asc';
				$set['lang'] = LANG;
				$pages = Bus::call('pages', 'getArray', $set);
				$this->assign('layout_pages', $pages['data']);
			}
			return $this->fetch($this->getFileName($this->template));
		}
		
		function setCompileDir ($dir)
		{
			$this->compile_dir = $dir;
		}
	}
?>
