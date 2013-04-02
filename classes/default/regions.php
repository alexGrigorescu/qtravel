<?
	class regions
	{
		function regions()
		{
			$this->page = request('regions_filter_page');
			$this->text = strtolower(request('regions_filter_text'));
			$this->continent_id = request('regions_filter_continent_id');
			$this->country_id = request('regions_filter_country_id');
			$this->special1 = request('regions_filter_special1');
			$this->special2 = request('regions_filter_special2');
		}
		
		function admin()
		{
			$form = new DefRegionsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefRegionsGrid($this);
		
			$t = new layout ('regions_admin');
			$t->assign('change_continent_url', LOCAL_URL.url('regions', 'change_continent'));
			$t->assign('delete_region_url', LOCAL_URL.url('regions', 'delete'));	
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			$this->continent_id = 0;
			$this->country_id = 0;
			$this->info = Bus::call('regions', 'read', array('id'=>$this->id));
			
			$this->continent_id = $this->info['continent_id'];
			$this->country_id = $this->info['country_id'];
			
			$form = new DefRegionsForm($this);
			$form->loadFromArray($this->info);				   
			
			$t = new layout('regions_edit');
			$t->assign('id', $this->id);
			$t->assign('change_continent_url', LOCAL_URL.url('regions', 'change_continent'));			
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array();
			$this->continent_id = 0;
				
			$form = new DefRegionsForm($this);
			
			$t = new layout('regions_edit');
			$t->assign('change_continent_url', LOCAL_URL.url('regions', 'change_continent'));			
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function save($id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			$response['newlocation'] = false;
			
			$this->id = elementNr($id);
			$form = new DefRegionsForm($this);						
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
					$this->info = Bus::call('regions', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					Bus::call('regions', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('regions_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('regions', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('regions_message_add_succes');
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
			$response['id'] = $this->id;
			$response['succes'] = true;
			
			echo (json_encode ($response));
			return true;
		}
		
		function change_continent($continent_id)
		{
			$options = array('0'=>tr('regions_label_any_country'));
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
		
		function special1($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('regions', 'read', array('id'=>$this->id));
			Bus::call('regions', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('regions', 'read', array('id'=>$this->id));
			Bus::call('regions', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$response['error'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$locations = Bus::call('locations', 'getArray', array('region_id'=>$this->id));
			
			if ($locations['count'] > 0)
			{
				$response['error'] = true;
				if ($locations['count'] > 0)
				{
					$i = 0;
					$response['message'] .= tr('regions_delete_locations_exists').NL;
					foreach ($locations['data'] as $k=>$v)
					{
						$i++;
						if ($i < 10)
						{
							$response['message'] .= '- '.$v['title'].NL;
						}
						else 
						{
							$response['message'] .= '...'.NL;
							break;
						}
					}
					
				}				
			}
			else 
			{			
				Bus::call('regions', 'delete', array('id'=>$this->id));		
			}
			
			echo (json_encode ($response));
			return true;
		}
	}
?>