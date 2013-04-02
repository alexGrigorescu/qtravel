<?
	class DefCountriesForm extends Form
	{
		function DefCountriesForm($obj)
		{	
			$this->setName('countries');
			$this->setClass('form');
		 	$this->setTargetObject('countries');
			$this->setTargetMethod('save');
			
			$e = new FormElementCheckBox('special1');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('special2');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('buble_offer_vacancy');
			$this->addElement($e);
			
			$e = new FormElementCombobox('buble_offer_vacancy_type');
			$opt = array(
				'accommodation_plane'=>'Vacanta avion',
				'accommodation_bus'=>'Vacanta autocar',
				'accommodation_individual'=>'Vacanta individual'
			);
			$e->options = $opt;
			$this->addElement($e);
			
			$e = new FormElementText('buble_offer_vacancy_value');
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
	
			$e = new FormElementCombobox('continent_id');
			$r = Bus::call('continents', 'getList', array());
			$e->options = $r['data'];
			$e->addRule('min_', 0);
			$this->addElement($e);
			
			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);
			
			$this->addSaveButton();
			
			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>