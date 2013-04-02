<?
	class DefFlightOperatorsForm extends Form
	{
		function DefFlightOperatorsForm($obj)
		{	
			$this->setName('flight_operators');
			$this->setClass('form');
			$this->setTargetObject('flight_operators');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('code');
			$e->label = 'Code';
			$e->addRule('req');
			$e->setClass('code');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->label = 'Title';
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('picture');
			$this->addElement($e);
			
			$this->addSaveButton();
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>