<?php
	class DefLocationsFilterForm extends Form
	{
		function DefLocationsFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('locations');
			$this->setPrefix('locations_filter_');
			$this->setPrefixLang('locations_');
			$this->setClass('search');
		 	$this->setTargetObject('locations');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementCombobox('continent_id');
			$e->options = array(0=>tr('locations_label_any_continent'));
			$r = Bus::call('continents', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->onEvent.='onchange="changeContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('country_id');
			$e->options = array(0=>tr('locations_label_any_country'));
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
			$e->options = array(0=>tr('locations_label_any_region'));
			if ($obj->country_id > 0)
			{
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->country_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('accommodation_type_id');
			$e->options = array(0=>tr('locations_label_accommodation_type_id_any'));
			$r = Bus::call('accommodationTypes', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
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