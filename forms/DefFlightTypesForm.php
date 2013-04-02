<?
	class DefFlightTypesForm extends Form
	{
		function DefFlightTypesForm($obj)
		{	
			$this->setName('flight_types');
			$this->setClass('form');
			$this->setTargetObject('flight_types');
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