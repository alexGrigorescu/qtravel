<?
	class DefRegisterForm extends Form
	{
		function DefRegisterForm($obj)
		{
			$this->setName('register');
			$this->setClass('form');
		 	$this->setTargetObject('register');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('user_name');
			$e->addRule('req');
			$e->addRule('ereg', '/^[a-z0-9_]+$/');
			$e->setHelpCode();
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->addRule('req');
			$e->addRule('email');
			$e->setHelpCode();
			$this->addElement($e);
	
			$e = new FormElementPassword('password');
			$e->addRule('req');
			$e->setHelpCode();
			$this->addElement($e);
	
			$e = new FormElementCheckbox('agree');
			$e->addRule('req');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>