<?php
	class DefVacationsFilter2Form extends Form
	{
		function DefVacationsFilter2Form($obj)
		{
			$this->setMethod('POST');
		
			$this->setName('vacations2');
			$this->setClass('search');
		 	$this->setTargetObject('vacations');
			$this->setTargetMethod('delete_all');

			$e = new FormElementHidden('selected');
			$this->addElement($e);
		}
	}
?>