<?php
	class DefLoginForm extends Form
	{
		function DefLoginForm($obj)
		{
			$this->setName('login');
			$this->setClass('search');
		 	$this->setTargetObject('login');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('user');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementPassword('password');
			$e->addRule('req');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>