<?
	class countries
	{
		function countries()
		{
			$this->page = request('countries_filter_page');
			$this->text = strtolower(request('countries_filter_text'));
			$this->continent_id = request('countries_filter_continent_id');
			$this->special1 = request('countries_filter_special1');
			$this->special2 = request('countries_filter_special2');
			$this->buble_offer_vacancy = request('countries_filter_buble_offer_vacancy');
		}
	
		function admin()
		{
			$form = new DefCountriesFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefCountriesGrid($this);
		
			$t = new layout ('countries_admin');
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->assign('delete_country_url', LOCAL_URL.url('countries', 'delete'));	
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			$this->continent_id = 0;
			$this->info = Bus::call('countries', 'read', array('id'=>$this->id));
			
			$this->continent_id = $this->info['continent_id'];
			
			$form = new DefCountriesForm($this);
			$form->loadFromArray($this->info);				   
			
			$t = new layout('countries_edit');
			$t->assign('id', $this->id);
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array();
			$this->continent_id = 0;
				
			$form = new DefCountriesForm($this);
			
			$t = new layout('countries_edit');
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
			$form = new DefCountriesForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			$request['code'] = code($request['code']);
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['buble_offer_vacancy'] = elementNr($request['buble_offer_vacancy']);
			$request['datem'] = date('Y-m-d H:i:s');
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('countries', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					Bus::call('countries', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('countries_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('countries', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('countries_message_add_succes');
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
		
		function special1($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('countries', 'read', array('id'=>$this->id));
			Bus::call('countries', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('countries', 'read', array('id'=>$this->id));
			Bus::call('countries', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$response['error'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$regions = Bus::call('regions', 'getArray', array('country_id'=>$this->id));
			
			if ($regions['count'] > 0)
			{
				$response['error'] = true;
				if ($regions['count'] > 0)
				{
					$i = 0;
					$response['message'] .= tr('countries_delete_regions_exists').NL;
					foreach ($regions['data'] as $k=>$v)
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
				Bus::call('countries', 'delete', array('id'=>$this->id));		
			}
			
			echo (json_encode ($response));
			return true;
		}
	}
?>