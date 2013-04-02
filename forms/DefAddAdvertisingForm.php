<?php
	class DefAddAdvertisingForm extends Form
	{
		function DefAddAdvertisingForm($obj)
		{
			$this->setName('pics');
			$this->setPrefix('pics_');
			$this->setClass('form');
			$this->setTargetObject(OBJ);
			$this->setTargetMethod('upload_pic');
			$this->setMethod('POST');
			
			$e = new FormElementHeader('pics_header');
			$this->addElement($e);
			
			$e = new FormElementText('pic');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>