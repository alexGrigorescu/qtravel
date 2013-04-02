<?php
	class DefFlightOperatorsFilterForm extends Form
	{
		function DefFlightOperatorsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('flight_operators');
			$this->setClass('search');
		 	$this->setTargetObject('flight_operators');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementSubmit('search');
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>