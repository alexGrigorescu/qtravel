<?php
	class DefContinentsFilterForm extends Form
	{
		function DefContinentsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('continents');
			$this->setClass('search');
		 	$this->setTargetObject('continents');
			$this->setTargetMethod('admin');
			$this->setPrefix('continents_filter_');
			$this->setPrefixLang('continents_');

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