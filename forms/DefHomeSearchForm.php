<?php
	class DefHomeSearchForm extends Form
	{
		function DefHomeSearchForm($obj)
		{
			$this->setName('home_search');
			$this->setClass('search');
		 	$this->setTargetObject('offer_vacancy');
			$this->setTargetMethod('home_search');
			
			$e = new FormElementCombobox('type');
			$menulistResponse = Bus::call('vacancyOfferAdmin', 'getArray', array('group'=>'search_home'));
			$menulist = array();
			foreach ($menulistResponse['data'] as $row) {
				$menulist[$row['id']] = $row['title'];
			}
			$e->options = $menulist;
			$this->addElement($e);

			$e = new FormElementCombobox('status');
			$e->options = array(1=>'Activ',0=>'Inactiv');
			$this->addElement($e);
			
			$this->addSaveButton();		    
		}
	}
?>