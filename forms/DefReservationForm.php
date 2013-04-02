<?php
	class DefReservationForm extends Form
	{
		function DefReservationForm($obj)
		{
			$this->setName('reservation');
			$this->setClass('search');
			$this->setTargetObject('reservation');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('name');
			$e->addRule('req');			
			$this->addElement($e);
			
			$e = new FormElementText('address');
			$e->addRule('req');			
			$this->addElement($e);
			
			$e = new FormElementText('email');
			$e->addRule('req');			
			$e->addRule('email');			
			$this->addElement($e);
			
			$e = new FormElementText('mobile');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('fax');
			$this->addElement($e);
			
			$e = new FormElementText('start_date');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('start_date_delay');
			$this->addElement($e);
			
			$e = new FormElementText('end_date');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('end_date_delay');
			$this->addElement($e);
			
			$e = new FormElementTextarea('message');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>