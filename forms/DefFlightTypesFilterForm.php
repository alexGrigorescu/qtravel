<?php
	class DefFlightTypesFilterForm extends Form
	{
		function DefFlightTypesFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('flight_types');
			$this->setClass('search');
		 	$this->setTargetObject('flight_types');
			$this->setTargetMethod('admin');

			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>