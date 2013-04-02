<?php
	class DefPicsForm extends Form
	{
		function DefPicsForm($obj)
		{
			$this->setName('pics');
			$this->setPrefix('pics_');
			$this->setClass('form');
			$this->setTargetObject(OBJ);
			$this->setTargetMethod('upload_pic');
			$this->setMethod('POST');
			
			$e = new FormElementHeader('pics_header');
			$this->addElement($e);
			
			$e = new FormElementUpload('pic');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>