<?php
	class DefNewsletterForm extends Form
	{
		function DefNewsletterForm($obj)
		{
			$this->setName('newsletter');
			$this->setClass('search');
			$this->setTargetObject('newsletter');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('name');
			$e->addRule('req');			
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->addRule('req');			
			$e->addRule('email');			
			$this->addElement($e);
		}
	}
?>