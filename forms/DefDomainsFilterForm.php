<?php
	class DefDomainsFilterForm extends Form
	{
		function DefDomainsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('domains');
			$this->setClass('search');
		 	$this->setTargetObject('domains');
			$this->setTargetMethod('admin');
			$this->setPrefix('domains_filter_');
			$this->setPrefixLang('domains_');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementSubmit('search');
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>