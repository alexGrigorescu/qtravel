<?php
	class DefPagesFilterForm extends Form
	{
		function DefPagesFilterForm($obj)
		{
			$this->setName('pages');
			$this->setPrefix('');
			$this->setClass('search');
		 	$this->setTargetObject('pages');
			$this->setTargetMethod('index');
			
			$e = new FormElementText('text');
			$this->addElement($e);
			
			$this->addSaveButton();		  
		}
	}

?>