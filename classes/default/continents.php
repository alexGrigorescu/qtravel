<?
	class continents
	{
		function continents()
		{
			$this->page = 0;
			$this->text = strtolower(request('continents_text'));
		}
	
		function admin()
		{
			$form = new DefContinentsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefContinentsGrid($this);
		
			$t = new layout ('continents_admin');
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->assign('delete_continent_url', LOCAL_URL.url('continents', 'delete'));	
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			$this->continent_id = 0;
			$this->info = Bus::call('continents', 'read', array('id'=>$this->id));
			
			$form = new DefContinentsForm($this);
			$form->loadFromArray($this->info);

			$t = new layout('continents_edit');
			$t->assign('id', $this->id);
			$t->assign('form', $form->getFullImage());
			
			$t->display();
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array();
				
			$form = new DefContinentsForm($this);
			
			$t = new layout('continents_edit');
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
			$form = new DefContinentsForm($this);						
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
					$this->info = Bus::call('continents', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					Bus::call('continents', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('continents_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('continents', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('continents_message_add_succes');
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
			$this->info = Bus::call('continents', 'read', array('id'=>$this->id));
			Bus::call('continents', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('continents', 'read', array('id'=>$this->id));
			Bus::call('continents', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$response['error'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$countries = Bus::call('countries', 'getArray', array('continent_id'=>$this->id));
			
			if ($countries['count'] > 0)
			{
				$response['error'] = true;
				if ($countries['count'] > 0)
				{
					$i = 0;
					$response['message'] .= tr('continents_delete_countries_exists').NL;
					foreach ($countries['data'] as $k=>$v)
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
				Bus::call('continents', 'delete', array('id'=>$this->id));		
			}
			
			echo (json_encode ($response));
			return true;
		}
	}
?>