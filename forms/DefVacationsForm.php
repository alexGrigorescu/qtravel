<?
	class DefVacationsForm extends Form
	{
		function DefVacationsForm($obj)
		{	
			$this->setName('vacations');
			$this->setClass('form');
		 	$this->setTargetObject('vacations');
			$this->setTargetMethod('save');
			
			$e = new FormElementCheckBox('special1');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('special2');
			$this->addElement($e);
			
			$e = new FormElementCheckBox('specialc');
			$this->addElement($e);
			
			$e = new FormElementComboBox('specialo');
			$e->options = $GLOBALS['ACCOMCAT'];
			$e->addRule('req');
			$this->addElement($e);

			$e = new FormElementComboBox('specialo1');
			$e->options = $GLOBALS['ACCOMCAT'];
			$e->addRule('req');
			$this->addElement($e);

			$e = new FormElementComboBox('specialo2');
			$e->options = $GLOBALS['ACCOMCAT'];
			$e->addRule('req');
			$this->addElement($e);

			$e = new FormElementComboBox('specialo3');
			$e->options = $GLOBALS['ACCOMCAT'];
			$e->addRule('req');
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
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementText('price');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_extrav');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
	
			$e = new FormElementText('price_extrap');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementCombobox('currency_id');
			$e->options = array(0=>tr('vacations_label_any_currency'));
			$r = Bus::call('currencies', 'getList', array());
			foreach ($r['data'] as $k=>$v) {
				$e->options[$k] = $v;
			}
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementText('date_start');
			$e->addRule('req');
			$e->addRule('date');
			$this->addElement($e);
	
			$e = new FormElementText('date_end');
			$e->addRule('req');
			$e->addRule('date');
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
			$e->onEvent.='onchange="changeRegion();"';
			$this->addElement($e);
				
			$e = new FormElementCombobox('location_id');
			$e->options = array(0=>tr('vacations_label_any_location'));
			if ($obj->region_id > 0)
			{
				$r = Bus::call('locations', 'getList', array('region_id' => $obj->region_id));
				foreach ($r['data'] as $k=>$v) {
					$e->options[$k] = $v;
				}
			}
			$e->addRule('req');
			$this->addElement($e);

			$e = new FormElementHeader('description_header');
			$this->addElement($e);

			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
			
			$e = new FormElementWysiwyg('description');
			$e->setClass ('wysiwyg');
			$e->setEditUrl($url);
			$this->addElement($e);

			$e = new FormElementTextarea('description_included');
			$this->addElement($e);

			$e = new FormElementTextarea('description_not_included');
			$this->addElement($e);

			$e = new FormElementTextarea('description_early_booking');
			$this->addElement($e);

			$e = new FormElementTextarea('description_special_offer');
			$this->addElement($e);
			
			$e = new FormElementHeader('comments_header');
			$this->addElement($e);

			$e = new FormElementTextarea('comments');
			$this->addElement($e);
			
			$e = new FormElementHeader('prices_header');
			$this->addElement($e);
			
			$e = new FormElementText('price_single');
			$this->addElement($e);
			
			$e = new FormElementText('price_double');
			$this->addElement($e);
			
			$e = new FormElementText('price_3adult');
			$this->addElement($e);
			
			$e = new FormElementText('price_triple');
			$this->addElement($e);
			
			$e = new FormElementText('price_1child');
			$this->addElement($e);
			
			$e = new FormElementText('price_2child');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra1');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra2');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra3');
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
			
			if ($obj->id > 0)
			{
				$e = new FormElementButton('delete_prices');
				$e->setClass('button_save');
				$e->onClick = 'pricesDelete('.$obj->id.'); return false;';
				$this->addElement($e);
			}
		}
	}
?>