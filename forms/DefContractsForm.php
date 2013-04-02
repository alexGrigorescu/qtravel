<?
	class DefContractsForm extends Form
	{
		function DefContractsForm($obj)
		{	
			$this->setName('contracts');
			$this->setClass('form');
		 	$this->setTargetObject('contracts');
			$this->setTargetMethod('save');
			
			$e = new FormElementText('code');
			$e->setClass('code');
			$e->setReadOnly(' readonly ');
			$this->addElement($e);
			
			$e = new FormElementText('name');
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementText('number');
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementText('date');
			$e->addRule('req');
			$this->addElement($e);
	
			$e = new FormElementText('address');
			$this->addElement($e);
	
			$e = new FormElementText('phone');
			$this->addElement($e);
	
			$e = new FormElementText('document_sn');
			$this->addElement($e);
	
			$e = new FormElementText('document_nr');
			$this->addElement($e);
	
			$e = new FormElementText('document_po');
			$this->addElement($e);
	
			$e = new FormElementText('price');
			$this->addElement($e);
	
			$e = new FormElementText('advance');
			$this->addElement($e);
			
			$e = new FormElementText('date_price');
			$this->addElement($e);

			$e = new FormElementText('user_phone');
			$this->addElement($e);
			
			for ($i=1; $i<=2; $i++)
			{
				$e = new FormElementHeader('anex'.$i);
				$this->addElement($e);
				
				$e = new FormElementCheckbox('active'.$i);
				$this->addElement($e);

				$e = new FormElementText('number'.$i);
				$this->addElement($e);
				
				$e = new FormElementTextarea('partener'.$i);
				$this->addElement($e);

				$e = new FormElementTextarea('hotel'.$i);
				$this->addElement($e);

				$e = new FormElementText('city'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('country'.$i);
				$this->addElement($e);
		
				$e = new FormElementTextarea('names'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('nrpeople'.$i);
				$this->addElement($e);
		
				$e = new FormElementTextarea('accommodation'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('table'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('arrive'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('departure'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('nights'.$i);
				$this->addElement($e);
		
				//$e = new FormElementText('transport_'.$i);
				//$this->addElement($e);
		
				$e = new FormElementText('flightnumber'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('company'.$i);
				$this->addElement($e);
		
				$e = new FormElementText('transfer'.$i);
				$this->addElement($e);
		
				$e = new FormElementTextarea('otherservices'.$i);
				$this->addElement($e);
			}
	
			$e = new FormElementSubmit('save');
			$e->setClass('button wymupdate');
			$e->onClick = 'this.form.elements[\'action\'].value=\'contracts-save\'';
			$this->addElement($e);

			$e = new FormElementButton('cancel');
			$e->setClass('button_save');
			$e->onClick = 'document.location.href=\''.url(OBJ, 'admin').'\'';
			$this->addElement($e);
		}
	}
?>