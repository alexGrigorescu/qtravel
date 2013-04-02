<?php
	class DefSpecialOffersForm extends Form
	{
		function DefSpecialOffersForm($obj)
		{
			$this->setMethod('POST');
			$this->setName('special_offers');
			$this->setTargetObject('specials');
			$this->setTargetMethod('save_offers');

			$e = new FormElementText('code');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('title');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('description');
			$this->addElement($e);
		}
	}
?>