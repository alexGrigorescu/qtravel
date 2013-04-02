<?
    class users
    {
        function admin($users_type, $users_text, $users_page)
        {
        	$this->page = $users_page;
        	$this->text = $users_text;
        	$this->user_type = $users_type;
        	$types = bus::call('users', 'getTypes');
        	if (!isset($types[$users_type]))
        	{
        		$users_type = 'admin';
        	}
        	
        	$form = new DefUsersFilterForm($this);
        	$form->loadFromRequest();
        	
            $grid = new DefUsersGrid($this);
            
            $t = new layout('users_admin');
            $t->assign('form_img', $form->getFullImage());
            $t->assign ('grid_img', $grid->get());
            $t->display();
        }
        
        function edit($id, $users_type)
        {
        	$this->id = $id;
        	$this->user_type = $users_type;
        	if ($this->user_type != 'admin' && $this->user_type != 'manager')
        	{
        		$this->user_type = 'member';
        	}
        	$this->info = array();
        	if ($this->id > 0)
        	{
        		$this->info = Bus::call('users', 'read', array('id'=>$this->id));
        	}
        	else 
        	{
        		$this->info['active'] = 1;
        		$this->info['user_type'] = $users_type;
        		
        	}
        	
	        			
	        $form = new DefUsersForm();
	        $form->loadFromArray($this->info);		           
	        
	        $t = new layout('users_edit');
	        $t->assign('form_img', $form->getFullImage());
	        $t->display();
        }
        
        function save($id, $users_type)
        {
        	$this->id = $id;
        	$this->user_type = $users_type;
        	if ($this->user_type != 'manager')
        	{
        		$this->user_type = 'member';
        	}
        	$form = new DefUsersForm($this);						
	        $form->loadFromRequest();
	        $request = $form->saveToArray();
	        $request['active'] = 0 + elementNr($request['active']);
	        
	        if($form->isValid())
			{	
				$userByUserName = Bus::call('users', 'userNameExists', array('user_name'=>$request['user_name'], 'id'=>$this->id));
	        	$user_name_exists = isset($userByUserName['id']) && $userByUserName['id'] != $this->id;
	        	
	        	if (!$user_name_exists)
	        	{
	        		$request['rights'] = implode(',', $request['rights']);
	        
	        		if ($this->id > 0)
	        		{
			        	$request['id'] = $this->id;
			        	Bus::call('users', 'update', $request);
	        		}
	        		else 
	        		{
	        			$request['datec'] = date('Y-m-d H:i:s');
	        			Bus::call('users', 'insert', $request);
	        		}
			        $response['succes'] = true;
					$response['message'] = tr('users_message_save_succes');
					$response['url'] = url('users', 'admin');
					echo (json_encode ($response));
					return true;
				}
				else 
				{
					$response['succes'] = false;
					$response['message'] = sprintf(tr('users_user_name_exists'), $request['code']);
					$response['field'] = 'users_user_name';
					
					echo (json_encode ($response));
					return false;
				}
			}
			else 
			{
				$error = $form->getFirstErrorCode();
				$response['succes'] = false;
				$response['message'] = $error['message'];
				$response['field'] = $error['field'];
				
				echo (json_encode ($response));
				return false;
			}
        }
        
        function active($id)
        {
            $info = Bus::call('users', 'read', array('id'=>$id));
        	$set = array();
        	$set['id'] = $id;
			$set['active'] = 1 - $info['active'];
			Bus::call('users', 'update', $set);
            redirect(OBJ, 'admin');
        }
    }
?>
