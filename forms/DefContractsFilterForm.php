<?php
	class DefContractsFilterForm extends Form
	{
		function DefContractsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('contracts');
			$this->setPrefix('contracts_filter_');
			$this->setPrefixLang('contracts_');
			$this->setClass('search');
		 	$this->setTargetObject('contracts');
			$this->setTargetMethod('admin');

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