<?
	class DefCircuitsForm extends Form
	{
		function DefCircuitsForm($obj)
		{	
			$this->setName('circuits');
			$this->setClass('form');
		 	$this->setTargetObject('circuits');
			$this->setTargetMethod('save');
			
			$e = new FormElementCheckBox('special1');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('special2');
			$this->addElement($e);
			
			$e = new FormElementStaticText('datem');
			$this->addElement($e);

			$e = new FormElementText('code');
			$e->label = 'Code';
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->label = 'Title';
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementCombobox('continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = array();
			$e->options[0] = tr('circuits_label_more_continents');
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeContinent();"';
			$this->addElement($e);
			
			$e = new FormElementCombobox('country_id');
			$e->options[0] = tr('circuits_label_more_countries');
			if ($obj->continent_id > 0) {
				$r = Bus::call('countries', 'getList', array('continent_id' => $obj->continent_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->addRule('req');
			$e->onEvent.='onchange="changeCountry();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('region_id');
			$e->options[0] = tr('circuits_label_more_regions');
			if ($obj->country_id > 0) {
				$r = Bus::call('regions', 'getList', array('country_id' => $obj->country_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('duration');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementCombobox('transport_type');
			$r = Bus::call('transportTypes', 'getList', array());
			$e->options = $r['data'];
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementCombobox('accomodation_type');
			$r = Bus::call('accommodationTypes', 'getList', array());
			$e->options = $r['data'];
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementTextarea('route');
			$this->addElement($e);
			
			$e = new FormElementCombobox('currency_id');
			$e->options = array(0=>tr('circuits_label_choose_currency'));
			$r = Bus::call('currencies', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('price1');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('price2');
			$e->addRule('req');
			$this->addElement($e);
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);

			$e = new FormElementSubmit('save');
			$e->setClass('button wymupdate');
			$e->onClick = 'this.form.elements[\'action\'].value=\'circuits-save\'';
			$this->addElement($e);

			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>