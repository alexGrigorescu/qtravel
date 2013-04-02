<?
	class DefDomainsForm extends Form
	{
		function DefDomainsForm($obj)
		{	
			$this->setName('domains');
			$this->setClass('form');
		 	$this->setTargetObject('domains');
			$this->setTargetMethod('save');
			
			$e = new FormElementCheckBox('special1');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('special2');
			$this->addElement($e);
			
			$e = new FormElementStaticText('datem');
			$this->addElement($e);

			$e = new FormElementText('code');
			$e->addRule('req');
			$e->addRule('code');
			$e->setClass('code');
			$e->setReadOnly(' readonly ');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('domain');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('type');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('param1');
			$this->addElement($e);
			
			$e = new FormElementText('mapkey');
			$this->addElement($e);
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$e = new FormElementTextarea('stats');
			$this->addElement($e);
			
			$e = new FormElementText('picture');
			$this->addElement($e);
			
			$this->addSaveButton();
			
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>