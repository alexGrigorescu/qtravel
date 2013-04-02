<?
	class DefAccommodationTypesForm extends Form
	{
		function DefAccommodationTypesForm($obj)
		{	
			$this->setName('accommodation_types');
			$this->setClass('form');
			$this->setTargetObject('accommodation_types');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('code');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('stars');
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