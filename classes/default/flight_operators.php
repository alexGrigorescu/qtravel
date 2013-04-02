<?
	class flight_operators
	{
		function flight_operators()
		{
			$this->text = strtolower(request('flight_operators_text'));
		}
	
		function admin()
		{
			$this->page = request('flight_operators_page');
			
			$form = new DefFlightOperatorsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefFlightOperatorsGrid($this);
		
			$t = new layout ('flight_operators_admin');
			$t->assign('delete_flight_operator_url', LOCAL_URL.url('flight_operators', 'delete'));			
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
			$this->region_id = 0;
			$this->info = Bus::call('flightOperators', 'read', array('id'=>$this->id));
			
			$this->type = 'flight_operators';
			$form_pics = new DefPicsForm($this);
			$grid_pics = new DefPicsGrid($this);

			$form = new DefFlightOperatorsForm($this);
			$form->setTargetObject('flight_operators');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('flight_operators_edit');
			$t->assign('id', $this->id);
			$t->assign('grid_pics', $grid_pics->get());
			$t->assign('form_pics_header', $form_pics->getHeader());
			$t->assign('form_pics_pic', $form_pics->elements['pic']->getImage());
			$t->assign('delete_pic_url', url(OBJ, 'delete_pic'));	
			
			$t->assign('change_country_url', LOCAL_URL.url('flight_operators', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('flight_operators', 'change_continent'));
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array();
			$this->continent_id = 0;
			$this->country_id = 0;
			$this->region_id = 0;
				
			$form = new DefFlightOperatorsForm($this);
			$form->setTargetObject('flight_operators');
			$form->setTargetMethod('save');
			
			$t = new layout('flight_operators_edit');
			$t->assign('change_country_url', LOCAL_URL.url('flight_operators', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('flight_operators', 'change_continent'));
			$t->assign('contents', '');
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
			$this->upload = false;
			$form = new DefFlightOperatorsForm($this);						
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
					$this->info = Bus::call('flightOperators', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					
					Bus::call('flightOperators', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('flight_operators_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('flightOperators', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('flight_operators_message_add_succes');
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
		
		function upload_pic($id)
		{
			$this->id = elementNr($id);
			$this->upload = true;
			
			$response = array();
			$response['error'] = false;
			$response['message'] = '';
			$response['grid'] = '';
			if ($this->id > 0)
			{
				$folder = Bus::call('pics', 'path', array('target_id'=>$this->id, 'type'=>'flight_operators'));
				$u = new picture_upload ($folder, 'pics_pic');
				if ($u->tmp_name > '')
				{
					$exists = Bus::call('pics', 'exists', array('target_id'=>$this->id, 'type'=>'flight_operators', 'file'=>$u->original_name));
					if (!$exists)
					{
						$fn = $u->save_as ($u->original_name);
						if ($fn !== false)
						{
							$this->type = 'flight_operators';
							$grid_pics = new DefPicsGrid($this);
							$response['message'] = sprintf(tr('pics_err_picture_success'), $u->original_name);
							$response['grid'] = $grid_pics->get();
						}
						else 
						{
							$response['error'] = true;
							$response['message'] = sprintf(tr('pics_err_picture_invalid'), $u->original_name);
						}
					}
					else 
					{
						$response['error'] = true;
						$response['message'] = sprintf(tr('pics_err_picture_exists'), $u->original_name);
					}		
				}
				else 
				{
					$response['error'] = true;
					$response['message'] = tr('pics_err_picture_invalid_upload');
				}
			}
			else 
			{
				$response['error'] = true;
				$response['message'] = tr('pics_err_picture_invalid_id');
			}
			?>
			<html>
			<head>
			<script type='text/javascript'>
			function update() 
			{ 
				var response = <?=json_encode($response)?>;
				window.parent.uploadComplete(response);
			}
			</script>
			</head>
			<body onload="update();"></body>
			</html>
			<?
		}
		
		function delete_pic($id_pic, $id)
		{
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			$response['grid'] = '';
			
			$this->id = elementNr($id);
			
			Bus::call('pics', 'delete', array('target_id'=>$id, 'type'=>'flight_operators', 'file'=>$id_pic));
			
			$this->type = 'flight_operators';
			$grid_pics = new DefPicsGrid($this);
			$response['grid'] = $grid_pics->get();
			
			echo (json_encode ($response));
			return true;
		}

		function special1($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('flightOperators', 'read', array('id'=>$this->id));
			Bus::call('flightOperators', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('flightOperators', 'read', array('id'=>$this->id));
			Bus::call('flightOperators', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$response['error'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$flights = Bus::call('flights', 'getArray', array('operator_id'=>$this->id));
			
			if ($flights['count'] > 0)
			{
				$response['error'] = true;
				$response['message'] .= tr('flight_operators_delete_flights_exists').NL;
				foreach ($flights['data'] as $k=>$v)
				{
					$response['message'] .= '- '.$v['title'].NL;
				}
			}
			else 
			{			
				Bus::call('flightOperators', 'delete', array('id'=>$this->id));				
			}
			
			echo (json_encode ($response));
			return true;
		}
	}
?>