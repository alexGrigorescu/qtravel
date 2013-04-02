<?
	class circuits
	{
		function circuits()
		{
			$this->text = strtolower(request('circuits_text'));
			$this->continent_id = request('circuits_continent_id');
			$this->country_id = request('circuits_country_id');
			$this->region_id = request('circuits_region_id');
		}
	
		function admin()
		{
			$this->page = 0;
			
			$form = new DefCircuitsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefCircuitsGrid($this);
		
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
				$this->info = Bus::call('circuits', 'read', array('id'=>$this->id));
			}

			$contents = array();
			if (isset($this->info['description']))
			{
				$contents = js_value_encode($this->info['description']);
			}
			else 
			{
				$contents = '';
			}
			
			$form = new DefCircuitsForm($this);
			$form->setTargetObject('circuits');
			$form->setTargetMethod('save');
			if (strlen(trim($err)) > 0)
			{
				$form->loadFromRequest();
			}
			else 
			{	
				$form->loadFromArray($this->info);				   
			}
			
			$t = new layout('circuits_edit');
			$t->assign('id', $this->id);
			$t->assign('change_country_url', LOCAL_URL.url('circuits', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('circuits', 'change_continent'));
			$t->assign('contents', $contents);
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function add($err)
		{
			$this->info = array();
			
			$form = new DefCircuitsForm($this);
			$form->setTargetObject('circuits');
			$form->setTargetMethod('save');
			$form->loadFromRequest();
			
			$t = new layout('circuits_edit');
			$t->assign('success_url', LOCAL_URL.url('circuits', 'admin'));
			$t->assign('change_country_url', LOCAL_URL.url('circuits', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('circuits', 'change_continent'));
			$t->assign('form', $form->getFullImage());
			$t->assign('err', Errors::get($err));
			$t->display();
		}
		
		function save($id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$this->upload = false;
			$form = new DefCircuitsForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			$request['code'] = code($request['code']);	
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['datem'] = date('Y-m-d H:i:s');
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('circuits', 'read', array('id'=>$this->id));
					
					$request['id'] = $this->id;
					Bus::call('circuits', 'update', $request);
				}
				else 
				{
					$d = new Dt ();
					$this->id = Bus::call('circuits', 'insert', $request);
				}
			}
			else 
			{
				$error = $form->getFirstErrorCode();
				$response['succes'] = false;
				$response['message'] = tr($error['message']);
				$response['field'] = $error['field'];
				
				echo (json_encode ($response));
				return false;
			}
			$response['succes'] = true;
			$response['message'] = tr('circuits_message_save_succes');
			echo (json_encode ($response));
			return true;
		}

		function change_continent($continent_id)
		{
			if ($continent_id > 0)
			{
				$countries = Bus::call('countries', 'getList', array('continent_id' => $continent_id));
			}
			else
			{
				$countries = array('data'=>array(), 'count'=>0);
			}

			$response['error'] = false;
			$response['message'] = '';
			$response['countries'] = $countries['data'];
			$response['count'] = $countries['count'];

			echo (json_encode ($response));
			return true;
		}

		function change_country($country_id)
		{
			if ($country_id > 0)
			{
				$regions = Bus::call('regions', 'getList', array('country_id' => $country_id));
			}
			else
			{
				$regions = array('data'=>array(), 'count'=>0);
			}
			
			$response['error'] = false;
			$response['message'] = '';
			$response['regions'] = $regions['data'];
			$response['count'] = $regions['count'];

			echo (json_encode ($response));
			return true;
		}
	}
?>