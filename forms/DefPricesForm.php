<?php
	class DefPricesForm extends Form
	{
		function DefPricesForm($obj)
		{
			$this->setName('prices');
			$this->setPrefix('prices_');
			$this->setClass('form');
			$this->setTargetObject(OBJ);
			$this->setTargetMethod('save_price');
			$this->setMethod('POST');
			
			$e = new FormElementHeader('prices_header');
			$this->addElement($e);
			
			$e = new FormElementText('date_start');
			$e->addRule('req');
			$e->addRule('date');
			$this->addElement($e);
			
			$e = new FormElementText('date_end');
			$e->addRule('req');
			$e->addRule('date');
			$this->addElement($e);
			
			$e = new FormElementText('subtype');
			$e->addRule('req');
			$this->addElement($e);
			
			$e = new FormElementText('price_single');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_double');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_3adult');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_triple');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_1child');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_2child');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra1');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra2');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$e = new FormElementText('price_extra3');
			$e->addRule('req');
			$e->addRule('float');
			$this->addElement($e);
			
			$this->addSaveButton();
		}
	}
?>