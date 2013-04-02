<?
	class DefFlightsForm extends Form
	{
		function DefFlightsForm($obj)
		{	
			$this->setName('flights');
			$this->setClass('form');
		 	$this->setTargetObject('flights');
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
			$e->label = 'Title';
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementCombobox('type_id');
			$r = Bus::call('flightTypes', 'getList', array());
			$e->options = $r['data'];
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementCombobox('start_continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array(''=>tr('flights_label_choose_continent'));
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeStartContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('start_country_id');
			if ($obj->start_continent_id > 0) {
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->start_continent_id));
				$e->options = $r['data'];
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeStartCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('start_region_id');
			if ($obj->start_country_id > 0) {
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->start_country_id));
				$e->options = $r['data'];
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('start_airport');
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array(''=>tr('flights_label_choose_continent'));
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeEndContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_country_id');
			if ($obj->end_continent_id > 0) {
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->end_continent_id));
				$e->options = array(''=>tr('flights_label_choose_country'));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeEndCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('end_region_id');
			if ($obj->end_country_id > 0) {
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->end_country_id));
				$e->options = $r['data'];
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('end_airport');
			$this->addElement($e);
			
			/*
			$e = new FormElementText('duration');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('hour');
			$e->addRule('req');
			$this->addElement($e);
			*/
			
			$e = new FormElementHidden('stops');
			//$e->options = array(0 => tr('flights_label_without_stops'), 1 => tr('flights_label_with_stops'));
			$this->addElement($e);
			
			$e = new FormElementCombobox('airport_tax_included');
			$e->options = array(0 => tr('flights_label_tax_not_included'), 1 => tr('flights_label_tax_included'));
			$this->addElement($e);
			
			$e = new FormElementText('airport_tax');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementCombobox('currency_id');
			$e->options = array(''=>tr('flights_label_choose_currency'));
			$r = Bus::call('currencies', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementHeader('price_header_1');
			$this->addElement($e);
			
			$e = new FormElementText('price1');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price2');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementCombobox('operator_id');
			$r = Bus::call('flightOperators', 'getList', array());
			$e->options = array();
			$e->options[0] = tr('flights_label_choose_operator');
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$this->addElement($e);
			
			$e = new FormElementTextarea('stops_description');
			$this->addElement($e);
			
			for ($i = 2; $i < 5; $i++)
			{
				$e = new FormElementHeader('price_header_'.$i);
				$this->addElement($e);
			
				$e = new FormElementText('price1_'.$i);
				$e->addRule('float');
				$this->addElement($e);
				
				$e = new FormElementText('price2_'.$i);
				$e->addRule('float');
				$this->addElement($e);
				
				$e = new FormElementCombobox('operator_'.$i.'_id');
				$r = Bus::call('flightOperators', 'getList', array());
				$e->options = array();
				$e->options[0] = tr('flights_label_choose_operator');
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
				$this->addElement($e);
				
				$e = new FormElementTextarea('stops_description_'.$i);
				$this->addElement($e);			
			}
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$e = new FormElementSubmit('save');
			$e->setClass('button wymupdate');
			$e->onClick = 'this.form.elements[\'action\'].value=\'flights-save\'';
			$this->addElement($e);

			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>