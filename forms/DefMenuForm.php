<?php
	class DefMenuForm extends Form
	{
		function DefMenuForm($obj)
		{
			$this->setName('menu');
			$this->setClass('search');
		 	$this->setTargetObject('offer_vacancy');
			$this->setTargetMethod('menu');
			
			$e = new FormElementCombobox('type');
			$menulistResponse = Bus::call('vacancyOfferAdmin', 'getArray', array('group'=>'menulist'));
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