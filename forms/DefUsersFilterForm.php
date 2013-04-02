<?php
	class DefUsersFilterForm extends Form
	{
		function DefUsersFilterForm($obj)
		{
			$this->setName('users');
			$this->setClass('search');
		 	$this->setTargetObject('users');
			$this->setTargetMethod('admin');
			
			$e = new FormElementCombobox('type');
			$e->options = Bus::call('users', 'getTypes');
			$this->addElement($e);
			
			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementSubmit('search');
			$e->setClass('button_save');
			$this->addElement($e);
			  
			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'edit').'\'';
			$this->addElement($e);	  
		}
	}
?>