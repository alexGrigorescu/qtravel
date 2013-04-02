<?php
	class DefVacationsFilterForm extends Form
	{
		function DefVacationsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('vacations');
			$this->setPrefix('vacations_filter_');
			$this->setPrefixLang('vacations_');
			$this->setClass('search');
		 	$this->setTargetObject('vacations');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementHidden('page');
			$this->addElement($e);
			
			$e = new FormElementCombobox('continent_id');
			$e->options = array(0=>tr('vacations_label_any_continent'));
			$r = Bus::call('continents', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->onEvent.='onchange="changeContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('country_id');
			$e->options = array(0=>tr('vacations_label_any_country'));
			if ($obj->continent_id > 0)
			{				
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->continent_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->onEvent.='onchange="changeCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('region_id');
			$e->options = array(0=>tr('vacations_label_any_region'));
			if ($obj->country_id > 0)
			{
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->country_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('accommodation_type_id');
			$e->options = array(0=>tr('vacations_label_any_accommodation_type'));
			$r = Bus::call('accommodationTypes', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('special1');
			$e->options = array(''=>tr('vacations_label_any_special1'), '1'=>tr('vacations_label_special1_yes'), '0'=>tr('vacations_label_special1_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('special2');
			$e->options = array(''=>tr('vacations_label_any_special2'), '1'=>tr('vacations_label_special2_yes'), '0'=>tr('vacations_label_special2_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('specialc');
			$e->options = array(''=>tr('vacations_label_any_specialc'), '1'=>tr('vacations_label_specialc_yes'), '0'=>tr('vacations_label_specialc_no'));
			$this->addElement($e);
			
			$e = new FormElementSubmit('search');
			$e->setClass('button_save');
			$this->addElement($e);
			
			$e = new FormElementButton('add');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'add').'\'';
			$this->addElement($e);
			
			$e = new FormElementButton('export_prices');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'export').'\'';
			$this->addElement($e);
						
			$e = new FormElementButton('import_prices');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'import').'\'';
			$this->addElement($e);

			$e = new FormElementButton('select_all');
			$e->setClass('button_save');
			$e->onClick = 'selectAll();';
			$this->addElement($e);

			$e = new FormElementButton('delete_all');
			$e->setClass('button_save');
			$e->onClick = 'document.vacations2.submit();';
			$this->addElement($e);
		}
	}
?>