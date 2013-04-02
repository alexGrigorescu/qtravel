<?
	class DefAccountForm extends Form
	{
		function DefAccountForm($obj)
		{	
			$this->setName('account');
			$this->setClass('form');
		 	$this->setTargetObject('account');
			$this->setTargetMethod('save');
			
			$e = new FormElementStaticText('user_name');
			$e->no_hidden_element = true;
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->label = 'E-mail';
			$e->addRule('req');
			$e->addRule('email');
			$e->setHelpCode();
			$this->addElement($e);
	
			$this->addSaveButton();
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'index').'\'';
			$this->addElement($e);
		}
	}
?>