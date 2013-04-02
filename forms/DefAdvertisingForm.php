<?php
	class DefAdvertisingForm extends Form
	{
		function DefAdvertisingForm($obj)
		{
			$this->setName('vacancy_advertising');
			$this->setClass('form');
		 	$this->setTargetObject('offer_vacancy');
			$this->setTargetMethod('advertising_save');
			
			$defaultOfferType = false;
			if (!empty($obj->info['offer_type'])) {
				$defaultOfferType = $obj->info['offer_type'];
			}
			$e = new FormElementCombobox('offer_type', $defaultOfferType);
			$e->options = array (
				'accommodations'	=>'Cazare',
				'busses'		=>'Bilet autocar',
				'flights'		=>'Bilet avion'
			);
			$this->addElement($e);
			
			$defaultCodeHid = false;
			if (!empty($obj->info['offers_code_hid'])) {
				$defaultCodeHid = $obj->info['offers_code_hid'];
			}
			$e = new FormElementText('offers', $defaultCodeHid);
			$e->setClass (' ui-widget ui-widget-content');
			$this->addElement($e);
			
			$defaultIdHid = false;
			if (!empty($obj->info['offers_hid'])) {
				$defaultIdHid = $obj->info['offers_hid'];
			}
			$e = new FormElementHidden('offers_hid', $defaultIdHid);
			$this->addElement($e);
			
			$e = new FormElementHidden('offers_code_hid', $defaultCodeHid);
			$this->addElement($e);

			if (!empty($obj->info['offers_html_text'])) {
				$defaultHtmlText = $obj->info['offers_html_text'];
			}
			$e = new FormElementTextarea('offers_html_text',$defaultHtmlText);
			$this->addElement($e);
			
//			$url = LOCAL_URL.url(OBJ, 'wysiwyg');
//			if (!empty($obj->info['offers_html_text'])) {
//				$defaultHtmlText = $obj->info['offers_html_text'];
//			}
//			$e = new FormElementWysiwyg('offers_html_text', $defaultHtmlText);
//			$e->setClass ('wysiwyg');
//			$e->setEditUrl($url);
//			$this->addElement($e);
			
			
			$e = new FormElementSubmit('save');
			$e->setClass('button wymupdate');
			$this->addElement($e);
		
		}
	}
?>