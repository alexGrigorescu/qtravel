<?php
	class DefContactForm extends Form
	{
		function DefContactForm($obj)
		{
			$this->setName('contact');
			$this->setClass('search');
			$this->setTargetObject('contact');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('name');
			$e->addRule('req');			
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->addRule('req');			
			$e->addRule('email');			
			$this->addElement($e);
			
			$e = new FormElementTextarea('message');
			$e->addRule('req');			
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>