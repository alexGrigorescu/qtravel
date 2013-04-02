<?php
	class DefTransportTypesFilterForm extends Form
	{
		function DefTransportTypesFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('transport_types');
			$this->setClass('search');
		 	$this->setTargetObject('transport_types');
			$this->setTargetMethod('admin');

			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>