<?
	class DefImportForm extends Form
	{
		function DefImportForm($obj)
		{	
			$this->setName('import');
			$this->setClass('form');
		 	$this->setTargetObject(OBJ);
			$this->setTargetMethod('import_save');
			
			$e = new FormElementUpload('upload');
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementSubmit('save');
			$e->setClass('button');
			$this->addElement($e);

			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>