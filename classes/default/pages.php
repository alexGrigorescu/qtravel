<?
	class pages
	{
		function admin()
		{
			$set = array();
			$set['sorting'] = ' tree asc, pages.ord asc';
			$response = Bus::call('pages', 'getArray', $set);
			
			$t = new layout ('pages_admin');
			$t->assign('pages', $response['data']);
			$t->display();
		}
		
		function edit($id)
		{
			$this->pagep = elementNr($pagep);
			$this->paged = elementNr($paged);
			$this->id = elementNr($id);
			$this->info = array();
			
			if ($this->id > 0)
			{
				$this->info = Bus::call('pages', 'read', array('id'=>$this->id));
				if ($this->info['parent_id'] > 0)
				{
					$this->parent_info =  Bus::call('pages', 'read', array('id'=>$this->info['parent_id']));
					$this->info['parent_code'] = elementStr($this->parent_info['code']);
				}
				else 
				{
					$this->info['parent_code'] = tr('pages_label_root');
				}
				
				$this->type = 'pages';
				$form_pics = new DefPicsForm($this);
				$grid_pics = new DefPicsGrid($this);
			}
			else 
			{
				$this->info['ord'] = '';
				$this->info['path'] = '';
			}
			
			$set = array();
			$set['exclude_ord'] = $this->info['ord'];
			$set['exclude_path'] = $this->info['path'].$this->info['ord'].'/';
			$set['sorting'] = ' tree asc, pages.ord asc';
			$response = Bus::call('pages', 'getArray', $set);
			
			$t = new layout ('pages_parent');
			$t->assign('pages', $response['data']);
			$t->assign('page_id', 'pages_parent_id');
			$t->assign('page_code', 'pages_parent_code');
			$t->assign('field', 'pages_parent_code');
			$content = $t->get();
			
			$t = new layout('window');
			$t->assign('field', 'pages_parent_code');
			$t->assign('form', 'pages');
			$t->assign('title', tr ('pages_label_window_parent_code'));
			$t->assign('display', 'none');
			$t->assign('width', 300);
			$t->assign('height', 300);
			$t->assign('left', 0);
			$t->assign('top', 0);
			$t->assign('content', $content);
			$this->parent_code_help = $t->get();
			
			$form = new DefPagesForm($this);
			$form->loadFromArray($this->info);				   
			
			$info = $form->saveToArray();
			
			$contents = array();
			if (isset($info['content']))
			{
				$contents = js_value_encode($info['content']);
			}
			else 
			{
				$contents = '';
			}
			
			$t = new layout ('pages_edit');
			$t->assign('delete_pic_url', url(OBJ, 'delete_pic', array(), false));
			if ($this->id > 0)
			{
				$t->assign('grid_pics', $grid_pics->get());
				$t->assign('form_pics_header', $form_pics->getHeader());
				$t->assign('form_pics_pic', $form_pics->elements['pic']->getImage());
			}
			$t->assign('form_header', $form->getHeader());
			$t->assign('form_footer', $form->getFooter());
			$t->assign('form_content', $form->getContent());
			$t->assign('contents', $contents);
			$t->assign('id', $this->id);
			$t->display();
		}
		
		function save($id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			$response['newpage'] = false;
			
			$this->id = elementNr($id);
			$this->upload = false;
			$form = new DefPagesForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			$request['active'] = elementNr($request['active']);
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['datem'] = date('Y-m-d H:i:s');
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('pages', 'read', array('id'=>$this->id));
					
					$request['id'] = $this->id;
					Bus::call('pages', 'update', $request);
					
					$set = array();
					$set['id'] = $request['parent_id'];
					Bus::call('pages', 'updateSub', $set);
					
					$set = array();
					$set['id'] = $request['id'];
					Bus::call('pages', 'updateSub', $set);
					
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('pages_message_save_succes');
				}
				else 
				{
					$d = new Dt ();
					$request['datec'] = $d->getDate('mysql');
					$this->id = Bus::call('pages', 'insert', $request);
					
					$set = array();
					$set['id'] = $request['parent_id'];
					Bus::call('pages', 'updateSub', $set);
					
					$response['newpage'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('pages_message_add_succes');
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
		
		function upload_pic($id, $pagep, $sortp)
		{
			$this->id = elementNr($id);
			$this->pagep = elementNr($pagep);
			$this->sortp = elementNr($sortp);
			$this->upload = true;
			
			$response = array();
			$response['error'] = false;
			$response['message'] = '';
			$response['grid'] = '';
			if ($this->id > 0)
			{
				$folder = Bus::call('pics', 'path', array('target_id'=>$this->id, 'type'=>'pages'));
				$u = new picture_upload ($folder, 'pics_pic');
				if ($u->tmp_name > '')
				{
					$exists = Bus::call('pics', 'exists', array('target_id'=>$this->id, 'type'=>'pages', 'file'=>$u->original_name));
					if (!$exists)
					{
						$fn = $u->save_as ($u->original_name);
						if ($fn !== false)
						{
							$this->type = 'pages';
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
			Bus::call('pics', 'delete', array('target_id'=>$id, 'type'=>'pages', 'file'=>$id_pic));
			
			$this->type = 'pages';
			$grid_pics = new DefPicsGrid($this);
			$response['grid'] = $grid_pics->get();
			
			echo (json_encode ($response));
			return true;
		}
		
		function wysiwyg ($id, $pagep, $sortp)
		{
			$this->pagep = elementNr($pagep);
			$this->id = elementNr($id);
			$this->type = 'pages';
			$grid_pics = new DefWysiwygGrid($this);
			
			$t = new layout ('wysiwyg');
			if ($this->id > 0)
			{
				$t->assign('grid_img', $grid_pics->get());
	 
			}
			$t->assign('id', $this->id);
			echo ($t->get());
		}

		function delete($id)
		{
			$this->id = elementNr($id);
			$this->upload = true;
			$this->info = Bus::call('pages', 'read', array('id'=>$this->id));
			if ($this->info['sub'] == 0)
			{
				Bus::call('pages', 'delete', array('id'=>$this->id));
				
				$set = array();
				$set['id'] = $this->info['parent_id'];
				Bus::call('pages', 'updateSub', $set);
				redirect(OBJ, 'admin');
			}
			else 
			{
				$this->edit($this->id);
			}
		}
	}
?>