<?
	class DefLocationsForm extends Form
	{
		function DefLocationsForm($obj)
		{	
			$this->setName('locations');
			$this->setClass('form');
		 	$this->setTargetObject('locations');
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
	
			$e = new FormElementCombobox('accommodation_type_id');
			$r = Bus::call('accommodationTypes', 'getList', array());
			$e->options = $r['data'];
			$e->addRule('req');
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

			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$e = new FormElementText('picture');
			$this->addElement($e);

			if ($obj->id > 0)
			{
				$e = new FormElementSubmit('save');
				$e->setClass('button wymupdate');
				$this->addElement($e);
			}
			else
			{

				$e = new FormElementSubmit('save_add');
				$e->setClass('button wymupdate');
				$this->addElement($e);
			}
			
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>