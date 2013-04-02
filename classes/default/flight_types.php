<?
	class flight_types
	{
		function flight_types()
		{
			$this->page = 0;
			$this->text = strtolower(request('flight_types_text'));
		}
		
		function admin()
		{
			$form = new DefFlightTypesFilterForm($this);
			$form->loadFromRequest();
		
			$grid = new DefFlightTypesGrid($this);
		
			$t = new layout ('item_admin');
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->display();
		}
		
		function edit($err, $id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			
			if ($this->id > 0)
			{
				$this->info = Bus::call('flightTypes', 'read', array('id'=>$this->id));
			}
			
			$form = new DefFlightTypesForm($this);
			$form->setTargetObject('flight_types');
			$form->setTargetMethod('save');
			if (strlen(trim($err)) > 0)
			{
				$form->loadFromRequest();
			}
			else 
			{
				$form->loadFromArray($this->info);
			}
			
			$t = new layout('item_edit');
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function add($err)
		{
			$this->info = array();
			
			$form = new DefFlightTypesForm($this);
			$form->setTargetObject('flight_types');
			$form->setTargetMethod('save');
			$form->loadFromRequest();
			
			$t = new layout('item_edit');
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save($id)
		{
			$this->id = elementNr($id);
			
			$form = new DefFlightTypesForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				if ($this->id > 0) {
					$request['id'] = $this->id;
					Bus::call('flightTypes', 'update', $request);
				} else {
					Bus::call('flightTypes', 'insert', $request);
				}
				redirect(OBJ, 'admin');
			}
			else 
			{
				$err = $form->getFirstErrorCode();
				if ($this->id > 0) {
					$this->edit($err['message'], $this->id);
				} else {
					$this->add($err['message']);
				}
			}
		}
	}
?>