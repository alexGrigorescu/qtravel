<?php
	class DefSpecialsFilterForm extends Form
	{
		function DefSpecialsFilterForm($obj)
		{
			$this->setMethod('GET');
			$this->setName('specials');
			$this->setClass('search');
		 	$this->setTargetObject('specials');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementComboBox('type');
			$e->options = array(
				'' 					=> tr('specials_type_choose_type'),
				'accommodations' 	=> tr('specials_type_accommodations'),
				'circuits'			=> tr('specials_type_circuits'),
				'flights'			=> tr('specials_type_flights'),
				'locations'			=> tr('specials_type_locations'),
				'vacations'			=> tr('specials_type_vacations')
			);
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementCombobox('special1');
			$e->options = array(''=>tr('specials_label_any_special1'), '1'=>tr('specials_label_special1_yes'), '0'=>tr('specials_label_special1_no'));
			$this->addElement($e);
			
			$e = new FormElementSubmit('search');
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
		}
	}
?>