<?php
	class DefAccommodationTypesFilterForm extends Form
	{
		function DefAccommodationTypesFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('accommodation_types');
			$this->setClass('search');
		 	$this->setTargetObject('accommodation_types');
			$this->setTargetMethod('admin');

			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>