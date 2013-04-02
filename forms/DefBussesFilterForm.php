<?php
	class DefBussesFilterForm extends Form
	{
		function DefBussesFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('busses');
			$this->setPrefix('busses_filter_');
			$this->setPrefixLang('busses_');
			$this->setClass('search');
		 	$this->setTargetObject('busses');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementHeader('header_source');
			$this->addElement($e);
			
			$e = new FormElementCombobox('start_continent_id');
			$e->options = array(0=>tr('busses_label_any_continent'));
			$r = Bus::call('continents', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->onEvent.='onchange="changeStartContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('start_country_id');
			$e->options = array(0=>tr('busses_label_any_country'));
			if ($obj->start_continent_id > 0)
			{				
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->start_continent_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->onEvent.='onchange="changeStartCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('start_region_id');
			$e->options = array(0=>tr('busses_label_any_region'));
			if ($obj->start_country_id > 0)
			{
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->start_country_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$this->addElement($e);
			
			$e = new FormElementHeader('header_destination');
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_continent_id');
			$e->options = array(0=>tr('busses_label_any_continent'));
			$r = Bus::call('continents', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->onEvent.='onchange="changeEndContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_country_id');
			$e->options = array(0=>tr('busses_label_any_country'));
			if ($obj->end_continent_id > 0)
			{				
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->end_continent_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->onEvent.='onchange="changeEndCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('end_region_id');
			$e->options = array(0=>tr('busses_label_any_region'));
			if ($obj->end_country_id > 0)
			{
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->end_country_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('special1');
			$e->options = array(''=>tr('busses_label_any_special1'), '1'=>tr('busses_label_special1_yes'), '0'=>tr('busses_label_special1_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('special2');
			$e->options = array(''=>tr('busses_label_any_special2'), '1'=>tr('busses_label_special2_yes'), '0'=>tr('busses_label_special2_no'));
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