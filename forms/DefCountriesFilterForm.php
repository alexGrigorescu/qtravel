<?php
	class DefCountriesFilterForm extends Form
	{
		function DefCountriesFilterForm($obj)
		{
			$this->setMethod('GET');
		
			$this->setName('countries');
			$this->setPrefix('countries_filter_');
			$this->setPrefixLang('countries_');
			$this->setClass('search');
		 	$this->setTargetObject('countries');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementCombobox('continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array();
			$e->options[0] = tr('countries_label_any_continent');
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('special1');
			$e->options = array(''=>tr('countries_label_any_special1'), '1'=>tr('countries_label_special1_yes'), '0'=>tr('countries_label_special1_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('special2');
			$e->options = array(''=>tr('countries_label_any_special2'), '1'=>tr('countries_label_special2_yes'), '0'=>tr('countries_label_special2_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('buble_offer_vacancy');
			$e->options = array(''=>tr('countries_label_any_buble'), '1'=>tr('countries_label_buble_yes'), '0'=>tr('countries_label_buble_no'));
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