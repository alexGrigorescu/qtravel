<?php
	class DefRegionsFilterForm extends Form
	{
		function DefRegionsFilterForm($obj)
		{
			$this->setMethod('GET');
			
			$this->setName('regions');
			$this->setPrefix('regions_filter_');
			$this->setPrefixLang('regions_');
			$this->setClass('search');
		 	$this->setTargetObject('regions');
			$this->setTargetMethod('admin');

			$e = new FormElementText('text');
			$this->addElement($e);
			
			$e = new FormElementCombobox('continent_id');
			$e->options = array(0=>tr('regions_label_any_continent'));
			$r = Bus::call('continents', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->onEvent.='onchange="changeContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('country_id');
			$e->options = array(0=>tr('regions_label_any_country'));
			if ($obj->continent_id > 0)
			{				
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->continent_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$this->addElement($e);
			
			$e = new FormElementCombobox('special1');
			$e->options = array(''=>tr('regions_label_any_special1'), '1'=>tr('regions_label_special1_yes'), '0'=>tr('regions_label_special1_no'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('special2');
			$e->options = array(''=>tr('regions_label_any_special2'), '1'=>tr('regions_label_special2_yes'), '0'=>tr('regions_label_special2_no'));
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