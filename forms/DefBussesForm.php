<?
	class DefBussesForm extends Form
	{
		function DefBussesForm($obj)
		{	
			$this->setName('busses');
			$this->setClass('form');
		 	$this->setTargetObject('busses');
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
	
			$e = new FormElementCombobox('start_continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array(''=>tr('busses_label_choose_continent'));
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
			
			$e = new FormElementText('start_station');
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array(''=>tr('busses_label_choose_continent'));
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeEndContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('end_country_id');
			if ($obj->end_continent_id > 0) {
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->end_continent_id));
				$e->options = array(''=>tr('busses_label_choose_country'));
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
			
			$e = new FormElementText('end_station');
			$this->addElement($e);
			
			$e = new FormElementCombobox('currency_id');
			$e->options = array(''=>tr('busses_label_choose_currency'));
			$r = Bus::call('currencies', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('price1');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price2');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$e = new FormElementSubmit('save');
			$e->setClass('button wymupdate');
			$e->onClick = 'this.form.elements[\'action\'].value=\'busses-save\'';
			$this->addElement($e);

			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>