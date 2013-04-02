<?php
	class DefPagesForm extends Form
	{
		var $page_id = 0;
		
		function DefPagesForm($obj)
		{
			$this->setObj($obj);
			$this->setName('pages');
			$this->setClass('form');
		 	$this->setTargetObject('pages');
			$this->setTargetMethod('save');
			$this->setPageId($obj->id);
			
			$e = new FormElementHeader('header_info');
			$this->addElement($e);
				
			$e = new FormElementCheckbox('active');
			$this->addElement($e);
			
			$e = new FormElementCheckbox('special1');
			$this->addElement($e);
			
			$e = new FormElementCheckbox('special2');
			$this->addElement($e);
			
			$e = new FormElementText('code');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementHidden('parent_id');
			$this->addElement($e);
			
			$e = new FormElementChoose('parent_code');
			$e->setShowHelp(2);
			if (isset($this->obj->parent_code_help))
			{
				$e->setHelpText($this->obj->parent_code_help);
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('metatitle');
			$this->addElement($e);
			
			$e = new FormElementTextarea('leadtext');
			$this->addElement($e);
			
			$e = new FormElementText('tags');
			$this->addElement($e);
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg', array('id'=>$this->page_id), false);
			
			$e = new FormElementWysiwyg('content');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$e = new FormElementHeader('header_external');
			$this->addElement($e);
				
			$e = new FormElementText('class');
			$this->addElement($e);
			
			$e = new FormElementText('method');
			$this->addElement($e);
			
			
			$e = new FormElementSubmit('save');
			$e->setClass('button_save');
			$e->onClick = 'this.form.elements[\'action\'].value=\'pages-save\'';
			$this->addElement($e);
			
			$e = new FormElementButton('delete');
			$e->onClick = 'if(confirm(\''.tr('form_are_you_sure').'\')) location.href=\''.url(OBJ, 'delete').'\'';
			$this->addElement($e);
			
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
		
		function setPageId($value)
		{
			$this->page_id = $value;
		}
	}
?>