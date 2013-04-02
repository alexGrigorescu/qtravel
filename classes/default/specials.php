<?
	class specials
	{
		function specials()
		{
			$this->page = 0;
			$this->type = strtolower(request('specials_type'));
			$this->text = strtolower(request('specials_text'));
			$this->special1 = strtolower(request('specials_special1'));
		}
	
		function admin()
		{
			$form = new DefSpecialsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefSpecialsGrid($this);
		
			$t = new layout ('item_admin');
			$t->assign('form', $form->getFullImage());
			$t->assign('grid', $grid->get());
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			$this->continent_id = 0;
			$this->info = Bus::call('specials', 'read', array('id'=>$this->id));
			
			$form = new DefSpecialsForm($this);
			$form->loadFromArray($this->info);

			$grid_offers = new DefSpecialOffersGrid($this);
			
			$this->type = 'specials';
			$form_pics = new DefPicsForm($this);
			$grid_pics = new DefPicsGrid($this);
			
			$t = new layout('specials_edit');
			$t->assign('id', $this->id);
			$t->assign('grid_pics', $grid_pics->get());
			$t->assign('form_pics_header', $form_pics->getHeader());
			$t->assign('form_pics_pic', $form_pics->elements['pic']->getImage());
			
			$t->assign('form', $form->getFullImage());
			$t->assign('grid_offers', $grid_offers->get());
			$t->assign('hidden_fields_offers', getHiddenFields(OBJ, 'save_offers', array('special_id'=>$id)));					
			$t->assign('delete_offer_url', url(OBJ, 'delete_offer'));					
			$t->assign('update_offer_url', url(OBJ, 'save_offer'));					
			$t->assign('delete_pic_url', url(OBJ, 'delete_pic'));					
			$t->display();
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array('special1'=>1, 'special2'=>1);
				
			$form = new DefSpecialsForm($this);
			
			$t = new layout('specials_edit');
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
			$form = new DefSpecialsForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			$request['code'] = code($request['title']);
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['datem'] = date('Y-m-d H:i:s');
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('specials', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					Bus::call('specials', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('specials_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('specials', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('specials_message_add_succes');
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
		
		function save_offer($offer_id, $special_id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($special_id);
			$this->offer_id = elementNr($offer_id);
			$form = new DefSpecialOffersForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			$request['special_id'] = $this->id;
			
			if($form->isValid())
			{		
				if ($this->offer_id > 0)
				{
					$request['id']  = $this->offer_id;
					Bus::call('specials', 'updateOffer', $request);
					$response['message'] = tr('specials_message_update_offer_succes');
					$grid_offers = new DefSpecialOffersGrid($this);
					$response['grid'] = $grid_offers->get();
					$response['succes'] = true;
				}
				else 
				{
					Bus::call('specials', 'insertOffer', $request);
					$response['message'] = tr('specials_message_save_offer_succes');
					$grid_offers = new DefSpecialOffersGrid($this);
					$response['grid'] = $grid_offers->get();
					$response['succes'] = true;
				}
			}
			else 
			{
				$error = $form->getFirstErrorCode();
				$response['succes'] = false;
				$response['message'] = tr($error['message']);
				if ($this->offer_id > 0)
				{
					$response['field'] = $error['field'].'_'.$this->offer_id;
				}
				else 
				{
					$response['field'] = $error['field'];
				}
				
				echo (json_encode ($response));
				return false;
			}
			
			
			echo (json_encode ($response));
			return true;
		}
		
		function save_offers($special_id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($special_id);
			$offers = request ('special_offers');
			if(is_array($offers) && count ($offers) > 0)
			{
				foreach ($offers as $offer_id=>$offer)
				{
					$offer['special_id'] = $this->id;
					$form = new DefSpecialOffersForm($this);						
					$form->loadFromArray($offer);
					if(!$form->isValid())
					{
						$error = $form->getFirstErrorCode();
						$response['succes'] = false;
						$response['message'] = tr($error['message']);
						$response['field'] = $error['field'].'_'.$offer_id;
						
						echo (json_encode ($response));
						return false;
					}
				}
				
				foreach ($offers as $offer_id=>$offer)
				{
					$offer['id']  = $offer_id;
					Bus::call('specials', 'updateOffer', $offer);					
				}
				
				$response['message'] = tr('specials_message_update_offers_succes');
				$grid_offers = new DefSpecialOffersGrid($this);
				$response['grid'] = $grid_offers->get();
				
			}
			else 
			{
				$response['message'] = tr('specials_message_update_offers_no_offers');
				$grid_offers = new DefSpecialOffersGrid($this);
				$response['grid'] = $grid_offers->get();				
			}
			
			$response['succes'] = true;
			echo (json_encode ($response));
			return true;
		}
		
		function delete_offer($offer_id, $special_id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			Bus::call('specials', 'deleteOffer', array('id'=>$offer_id));
			$response['succes'] = true;
			$response['message'] = tr('specials_message_delete_offer_succes');
			
			$this->id = $special_id;
			$grid_offers = new DefSpecialOffersGrid($this);
			$response['grid'] = $grid_offers->get();
			
			echo (json_encode ($response));
			return true;
		}
		
		function upload_pic($id)
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
				$folder = Bus::call('pics', 'path', array('target_id'=>$this->id, 'type'=>'specials'));
				$u = new picture_upload ($folder, 'pics_pic');
				if ($u->tmp_name > '')
				{
					$exists = Bus::call('pics', 'exists', array('target_id'=>$this->id, 'type'=>'specials', 'file'=>$u->original_name));
					if (!$exists)
					{
						$fn = $u->save_as ($u->original_name);
						if ($fn !== false)
						{
							$this->type = 'specials';
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
			
			Bus::call('pics', 'delete', array('target_id'=>$id, 'type'=>'specials', 'file'=>$id_pic));
			
			$this->type = 'specials';
			$grid_pics = new DefPicsGrid($this);
			$response['grid'] = $grid_pics->get();
			
			echo (json_encode ($response));
			return true;
		}
		
		function special1($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('specials', 'read', array('id'=>$this->id));
			Bus::call('specials', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('specials', 'read', array('id'=>$this->id));
			Bus::call('specials', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
	}
?>