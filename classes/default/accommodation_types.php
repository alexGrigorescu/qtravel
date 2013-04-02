<?
	class accommodation_types
	{
		function accommodation_types()
		{
			$this->page = 0;
			$this->text = strtolower(request('accommodation_types_text'));
		}
		
		function admin()
		{
			$form = new DefAccommodationTypesFilterForm($this);
			$form->loadFromRequest();
		
		
			$grid = new DefAccommodationTypesGrid($this);
		
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
				$this->info = Bus::call('accommodationTypes', 'read', array('id'=>$this->id));
			}
			
			$form = new DefAccommodationTypesForm($this);
			$form->setTargetObject('accommodation_types');
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
			
			$form = new DefAccommodationTypesForm($this);
			$form->setTargetObject('accommodation_types');
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
			
			$form = new DefAccommodationTypesForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				if ($this->id > 0) {
					$request['id'] = $this->id;
					Bus::call('accommodationTypes', 'update', $request);
				} else {
					Bus::call('accommodationTypes', 'insert', $request);
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