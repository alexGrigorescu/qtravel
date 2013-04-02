<?
	class transport_types
	{
		function transport_types()
		{
			$this->page = 0;
			$this->text = strtolower(request('transport_types_text'));
		}
		
		function admin()
		{
			$form = new DefTransportTypesFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefTransportTypesGrid($this);
		
		
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
				$this->info = Bus::call('transportTypes', 'read', array('id'=>$this->id));
			}
			
			$form = new DefTransportTypesForm($this);
			$form->setTargetObject('transport_types');
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
			
			$form = new DefTransportTypesForm($this);
			$form->setTargetObject('transport_types');
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
			
			$form = new DefTransportTypesForm($this);
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			if($form->isValid())
			{
				if ($this->id > 0) {
					$request['id'] = $this->id;
					Bus::call('transportTypes', 'update', $request);
				} else {
					Bus::call('transportTypes', 'insert', $request);
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