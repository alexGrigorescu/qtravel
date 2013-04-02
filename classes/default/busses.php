<?
	class busses
	{
		function busses()
		{
			$this->text = strtolower(request('busses_filter_text'));
			$this->start_continent_id = request('busses_filter_start_continent_id');
			$this->start_country_id = request('busses_filter_start_country_id');
			$this->start_region_id = request('busses_filter_start_region_id');
			$this->end_continent_id = request('busses_filter_end_continent_id');
			$this->end_country_id = request('busses_filter_end_country_id');
			$this->end_region_id = request('busses_filter_end_region_id');
			$this->special1 = request('busses_filter_special1');
			$this->special2 = request('busses_filter_special2');
		}
	
		function admin()
		{
			$this->page = 0;
			
			$form = new DefBussesFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefBussesGrid($this);
		
			$t = new layout ('busses_admin');
			$t->assign('change_continent_url', LOCAL_URL.url('busses', 'change_continent'));			
			$t->assign('change_country_url', LOCAL_URL.url('busses', 'change_country'));
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			if ($this->id > 0)
			{
				$this->info = Bus::call('busses', 'read', array('id'=>$this->id));
			}

			$contents = array();
			$this->start_region_id = $this->info['start_region_id'];
			$this->start_country_id = $this->info['start_country_id'];
			$this->start_continent_id = $this->info['start_continent_id'];
				
			$this->end_region_id = $this->info['end_region_id'];
			$this->end_country_id = $this->info['end_country_id'];
			$this->end_continent_id = $this->info['end_continent_id'];
			
			$form = new DefBussesForm($this);
			$form->setTargetObject('busses');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('busses_edit');
			$t->assign('id', $this->id);
			$t->assign('change_country_url', LOCAL_URL.url('busses', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('busses', 'change_continent'));
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function add()
		{
			$this->info = array();
			
			$continent_info =  Bus::call('continents', 'readByCode', array('code'=>'europa'));
			if (isset($continent_info['id']))
			{
				$this->start_continent_id = $rec['start_continent_id'] = $this->end_continent_id = $rec['end_continent_id'] = $continent_info['id'];
			}
			
			$country_info =  Bus::call('countries', 'readByCode', array('code'=>'romania'));
			if (isset($country_info['id']))
			{
				$this->start_country_id = $rec['start_country_id'] = $country_info['id'];
			}
			
			$region_info =  Bus::call('regions', 'readByCode', array('code'=>'bucuresti'));
			if (isset($region_info['id']))
			{
				$this->start_region_id = $rec['start_region_id'] = $region_info['id'];
			}
			
			$currency_info =  Bus::call('currencies', 'readByCode', array('code'=>'eur'));
			if (isset($currency_info['id']))
			{
				$rec['currency_id'] = $currency_info['id'];
			}
			
			$rec['start_station'] = '';
			$rec['stops'] = '1';
			$rec['special1'] = '1';
			
			$form = new DefBussesForm($this);
			$form->loadFromArray($rec);
			
			$t = new layout('busses_edit');
			$t->assign('change_country_url', LOCAL_URL.url('busses', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('busses', 'change_continent'));
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function save($id)
		{
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$this->upload = false;
			$form = new DefBussesForm($this);						
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
					$this->info = Bus::call('busses', 'read', array('id'=>$this->id));
					
					$request['id'] = $this->id;
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					Bus::call('busses', 'update', $request);
					$response['message'] = tr('busses_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('busses', 'insert', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('busses_message_add_succes');
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
			echo (json_encode ($response));
			return true;
		}

		function change_continent($continent_id)
		{
			$options = array('0'=>tr('busses_label_any_country'));
			$count = 0;
			if ($continent_id > 0)
			{
				$r = Bus::call('countries', 'getList', array('continent_id' => $continent_id));
				foreach ($r['data'] as $k=>$v) {
					$options[$k] = $v;
				}
				$count = $r['count'];
			}
			
			$response['error'] = false;
			$response['message'] = '';
			$response['countries'] = $options;
			$response['count'] = $count;

			echo (json_encode ($response));
			return true;
		}

		function change_country($country_id)
		{
			$options = array('0'=>tr('busses_label_any_region'));
			$count = 0;
			if ($country_id > 0)
			{
				$r = Bus::call('regions', 'getList', array('country_id' => $country_id));
				foreach ($r['data'] as $k=>$v) {
					$options[$k] = $v;
				}
				$count = $r['count'];
			}
						
			$response['error'] = false;
			$response['message'] = '';
			$response['regions'] = $options;
			$response['count'] = $count;

			echo (json_encode ($response));
			return true;
		}

		function special1($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('busses', 'read', array('id'=>$this->id));
			Bus::call('busses', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('busses', 'read', array('id'=>$this->id));
			Bus::call('busses', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$this->id = elementNr($id);
			Bus::call('busses', 'delete', array('id'=>$this->id));				
			
			redirect(OBJ, 'admin');
		}
	}
?>