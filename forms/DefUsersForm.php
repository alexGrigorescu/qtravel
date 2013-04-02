<?
	class DefUsersForm extends Form
	{
	    function DefUsersForm()
	    {    
			$this->setName('users');
	        $this->setClass('form');
	     	$this->setTargetObject('users');
	        $this->setTargetMethod('save');
	    	
	    	$e = new FormElementHeader('header_info');
	        $this->addElement($e);
	            
	        $e = new FormElementCheckbox('active');
            $this->addElement($e);
            
            $e = new FormElementText('user_name');
            $e->addRule('req');
	        $this->addElement($e);
	        
	        $e = new FormElementPassword('password');
            $e->addRule('req');
	        $this->addElement($e);
	        
	        $e = new FormElementText('name');
            $e->addRule('req');
	        $this->addElement($e);
	        
	        $e = new FormElementText('email');
	        $e->label = 'E-mail';
	        $e->addRule('req');
	        $e->addRule('email');
	        $e->setHelpCode();
	        $this->addElement($e);
	
	        $this->addSaveButton();
	        
	        $e = new FormElementCheckBoxList('rights');
	        $e->options = Bus::call('users', 'getModules');
	        $e->addRule('req');
	        $this->addElement($e);
	        
	        $e = new FormElementCombobox('user_type');
			$e->options = Bus::call('users', 'getTypes');
            $this->addElement($e);
			
			$e = new FormElementButton('cancel');
	    	$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
            $this->addElement($e);
		}
	}
?>