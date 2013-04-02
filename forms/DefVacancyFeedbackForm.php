<?php
	class DefVacancyFeedbackForm extends Form
	{
		function DefVacancyFeedbackForm($obj)
		{
			$this->setName('feedback');
			$this->setClass('reservation');
			$this->setTargetObject('mymain');
			$this->setTargetMethod('feedback_save');
			
			$e = new FormElementText('name');
			$e->addRule('req');			
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->addRule('req');			
			$e->addRule('email');			
			$this->addElement($e);
			
			$e = new FormElementText('mobile');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementTextarea('message');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>