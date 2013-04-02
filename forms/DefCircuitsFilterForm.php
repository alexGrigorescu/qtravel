<?php
	class DefCircuitsFilterForm extends Form
	{
		function DefCircuitsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('circuits');
			$this->setClass('search');
		 	$this->setTargetObject('circuits');
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