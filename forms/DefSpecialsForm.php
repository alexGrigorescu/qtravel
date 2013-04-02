<?php
	class DefSpecialsForm extends Form
	{
		function DefSpecialsForm($obj)
		{
			$this->setMethod('POST');
			$this->setName('specials');
			$this->setTargetObject('specials');
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
			
			$domains = Bus::call('domains', 'getList');
			$e = new FormElementComboBox('domain_id');
			$e->options = $domains['data'];
			$this->addElement($e);
			
			$e = new FormElementComboBox('type');
			$e->options = array(
				'' 					=> tr('specials_type_choose_type'),
				'accommodations' 	=> tr('specials_type_accommodations'),
				'circuits'			=> tr('specials_type_circuits'),
				'flights'			=> tr('specials_type_flights'),
				'locations'			=> tr('specials_type_locations'),
				'vacations'			=> tr('specials_type_vacations'),
				'charters'			=> tr('specials_type_charters')
			);
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('picture');
			$this->addElement($e);
			
			$e = new FormElementText('picture2');
			$this->addElement($e);
			
			$e = new FormElementSubmit('save');
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('save_offers');
			$e->onClick = '$(\'#special_offers\').submit();';
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>