<?
	class DefTransportTypesForm extends Form
	{
		function DefTransportTypesForm($obj)
		{	
			$this->setName('transport_types');
			$this->setClass('form');
			$this->setTargetObject('transport_types');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('code');
			$e->label = 'Code';
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->label = 'Title';
			$e->addRule('req');
			$this->addElement($e);
			
			$this->addSaveButton();
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>