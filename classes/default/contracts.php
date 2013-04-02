<?
	class contracts
	{
		function contracts()
		{
			$this->text = strtolower(request('contracts_filter_text'));
		}
	
		function admin()
		{
			$this->page = request('contracts_page');
			
			$form = new DefContractsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefContractsGrid($this);
		
			$t = new layout ('contracts_admin');
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
				$this->info = Bus::call('contracts', 'read', array('id'=>$this->id));
			}

			$contents = array();
				
			$form = new DefContractsForm($this);
			$form->setTargetObject('contracts');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('contracts_edit');
			$t->assign('id', $this->id);
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function add()
		{
			$rec = array();
			$this->info = array();
			
			$form = new DefContractsForm($this);
			$form->loadFromArray($rec);
			
			$t = new layout('contracts_edit');
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
			$form = new DefContractsForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			$request['code'] = code_nr('contract-'.$request['name'].'-'.$request['number'].'-'.$request['date']);
			$request['active1'] = elementNr($request['active1']);
			$request['active2'] = elementNr($request['active2']);
					
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('contracts', 'read', array('id'=>$this->id));
					
					$request['id'] = $this->id;
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					Bus::call('contracts', 'update', $request);
					$response['message'] = tr('contracts_message_save_succes');
					$path = Bus::call('contracts', 'path', array('target_id'=>$this->id));
					@unlink ($path.$this->info['code'].'.rtf');
					@unlink ($path.$this->info['code'].'-anexa1.rtf');
				}
				else 
				{
					$request['user_id'] = $GLOBALS['SECURITY']->user_id;
					$this->id = Bus::call('contracts', 'insert', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('contracts_message_add_succes');
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
		
		function delete($id)
		{
			$this->id = elementNr($id);
			Bus::call('contracts', 'delete', array('id'=>$this->id));				
			
			redirect(OBJ, 'admin');
		}
		
		function doc($code)
		{
			ob_end_clean();
			$document = Bus::call('contracts', 'get_document', array('code'=>$code));
			header("Content-type: text/richtext");
            header('Content-disposition: attachment');
			echo ($document);
			exit();	
		}
		
		function ve($code)
		{
			ob_end_clean();
			$document = Bus::call('contracts', 'get_voucher_electronic', array('code'=>$code));
			header('Content-type: application/pdf');
			echo ($document);
			exit();	
		}

		function vp($code)
		{
			ob_end_clean();
			$document = Bus::call('contracts', 'get_voucher_print', array('code'=>$code));
			header('Content-type: application/pdf');
			echo ($document);
			exit();	
		}

		function name_autocomplete()
		{
			$q = request ('q');
			$sql = 
			'
			select name, max(id) as id from contracts
			where lower(name) like \''.encode(strtolower($q)).'%\'
			group by name
			order by name asc
			';
			$query = new Query ($sql);
			$data = $query->getArray(0, 10);
			$str = '';
			foreach ($data as $k=>$v)
			{
				$str .= $v['name'].'|'.$v['id']."\n";
			}
			echo ($str);
			die();
		}

		function name_autocomplete_data()
		{
			$id = 0 + request('id');

			$info = Bus::call('contracts', 'read', array('id'=>$id));
			echo(json_encode($info));
			die();
		}
	}
?>