<?
	class vacations
	{
		function vacations()
		{
			$this->text = strtolower(request('vacations_filter_text'));
			$this->continent_id = request('vacations_filter_continent_id');
			$this->country_id = request('vacations_filter_country_id');
			$this->region_id = request('vacations_filter_region_id');
			$this->accommodation_type_id = request('vacations_filter_accommodation_type_id');
			$this->special1 = request('vacations_filter_special1');
			$this->special2 = request('vacations_filter_special2');
			$this->specialc = request('vacations_filter_specialc');
		}
	
		function admin()
		{
			$this->page = request('vacations_filter_page');
			
			$form = new DefVacationsFilterForm($this);
			$form->loadFromRequest();
			
			$form2 = new DefVacationsFilter2Form($this);
			$form2->loadFromRequest();
			
			$grid = new DefVacationsGrid($this);
		
			$t = new layout ('vacations_admin');
			$t->assign('change_continent_url', LOCAL_URL.url('vacations', 'change_continent'));			
			$t->assign('change_country_url', LOCAL_URL.url('vacations', 'change_country'));
			$t->assign('form', $form->getFullImage());
			$t->assign('form2_header', $form2->getHeader());
			$t->assign('grid', $grid->get());
			$t->assign('generate_vacation_url', LOCAL_URL.url('vacations', 'vacation'));
			$t->assign('save_price_val_url', LOCAL_URL.url('vacations', 'save_price_val'));
			$t->assign('save_price_proc_url', LOCAL_URL.url('vacations', 'save_price_proc'));
			$t->display();
		}
		
		function edit($id)
		{
			$this->id = elementNr($id);
			$this->info = array();
			$this->continent_id = 0;
			$this->country_id = 0;
			$this->region_id = 0;
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			
			if (isset($this->info['date_start']))
			{
				$d = new Dt($this->info['date_start'], 'mysql');
				$this->info['date_start'] = $d->getDate();
			}
			
			if (isset($this->info['date_end']))
			{
				$d = new Dt($this->info['date_end'], 'mysql');
				$this->info['date_end'] = $d->getDate();
			}
			
			$this->info['price_extrav'] = 0 + elementNr($this->info['price_extrav']);
			$this->info['price_extrap'] = 0 + elementNr($this->info['price_extrap']);
			
			$this->continent_id = $this->info['continent_id'];
			$this->country_id = $this->info['country_id'];
			$this->region_id = $this->info['region_id'];
			$this->location_id = $this->info['location_id'];
			

			$this->type = 'vacations';
			$form_prices = new DefPricesForm($this);
			$grid_prices = new DefPricesGrid($this);
			
			$form = new DefVacationsForm($this);
			$form->setTargetObject('vacations');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('vacations_edit');
			$t->assign('id', $this->id);
			$t->assign('grid_prices', $grid_prices->get());
			$t->assign('form_prices', $form_prices->getFullImage());
			
			$t->assign('delete_price_url', LOCAL_URL.url('vacations', 'delete_price'));			
			$t->assign('delete_prices_url', LOCAL_URL.url('vacations', 'delete_prices'));			
			$t->assign('change_continent_url', LOCAL_URL.url('vacations', 'change_continent'));			
			$t->assign('change_country_url', LOCAL_URL.url('vacations', 'change_country'));
			$t->assign('change_region_url', LOCAL_URL.url('vacations', 'change_region'));			
			$t->assign('hidden_fields_prices', getHiddenFields(OBJ, 'save_price'));			
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function vacation ()
		{
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			
			$accommodation_id = request ('id');
			$mult = request ('mult');
			$cat = request ('cat');
			$accommodation_info = Bus::call('vacations', 'read', array('id'=>$accommodation_id));
			
			$specialo = '';
			$title = $accommodation_info['location_title'];
			$code = code($title);
			if ($cat != '-') 
			{
				$code = $cat.'-'.code($title);
				$title = $GLOBALS['ACCOMCAT'][$cat].'-'.$title;
				$specialo = $cat;
			}
			
			$vacation = Bus::call('vacations', 'readByCode', array('code'=>$code, 'region_id'=>$accommodation_info['region_id']));
			if (!isset($vacation['id']))
			{
				$rec = $accommodation_info;
				unset ($rec['id']);
				$rec['title'] = $title;
				$rec['code'] = $code;
				$rec['specialo'] = $specialo;
				$rec['price'] *= $mult;
				$rec['price_extrav'] *= $mult;
				$rec['price_extrap'] *= 1;
				
				$vacation_id = 0;
				$vacation_id = Bus::call('vacations', 'insert', $rec);
				
				$prices = Bus::call('prices', 'getArray', array('type'=>'vacations', 'target_id'=>$accommodation_id, 'page_size'=>1000));
				foreach($prices['data'] as $k=>&$v)
				{
					unset ($v['id']);
					$v['target_id'] = $vacation_id;
					$v['type'] = 'vacations';
					if ($v['price_single'] > 0) $v['price_single'] *= $mult;
                    if ($v['price_double'] > 0) $v['price_double'] *= $mult;
                    if ($v['price_3adult'] > 0) $v['price_3adult'] *= $mult;
                    if ($v['price_triple'] > 0) $v['price_triple'] *= $mult;
                    if ($v['price_1child'] > 0) $v['price_1child'] *= $mult;
                    if ($v['price_2child'] > 0) $v['price_2child'] *= $mult;
                    if ($v['price_extra1'] > 0) $v['price_extra1'] *= $mult;
                    if ($v['price_extra2'] > 0) $v['price_extra2'] *= $mult;
                    if ($v['price_extra3'] > 0) $v['price_extra3'] *= $mult;
                    
                   Bus::call('prices', 'insert', $v);
				}
				echo (json_encode ($response));
				return true;
			}
			else
			{
				echo (json_encode ($response));
				return true;
			}
		}
		
		function save_price_val ()
		{
			$rec = array();
			$rec['id'] = 0 + request('id');
			$rec['price_extrav'] = 0 + request('price_val');
			
			Bus::call('vacations', 'update', $rec);
			
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			
			echo (json_encode ($response));
			return true;
		}
		
		function save_price_proc ()
		{
			$rec = array();
			$rec['id'] = 0 + request('id');
			$rec['price_extrap'] = 0 + request('price_proc');
			
			Bus::call('vacations', 'update', $rec);
			
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			
			echo (json_encode ($response));
			return true;
		}
		
		function add()
		{
			$this->id = 0;
			$this->info = array();
			$this->continent_id = 0;
			$this->country_id = 0;
			$this->region_id = 0;
				
			$form = new DefVacationsForm($this);
			$form->setTargetObject('vacations');
			$form->setTargetMethod('save');
			
			$t = new layout('vacations_edit');
			$t->assign('change_continent_url', LOCAL_URL.url('vacations', 'change_continent'));			
			$t->assign('change_country_url', LOCAL_URL.url('vacations', 'change_country'));
			$t->assign('change_region_url', LOCAL_URL.url('vacations', 'change_region'));			
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
			$form = new DefVacationsForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			
			$request['code'] = code($request['code']);	
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['specialc'] = elementNr($request['specialc']);
			$request['datem'] = date('Y-m-d H:i:s');
			
			$d = new Dt($request['date_start']);
			$request['date_start'] = $d->getDate('mysql');
			
			$d = new Dt($request['date_end']);
			$request['date_end'] = $d->getDate('mysql');
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					Bus::call('vacations', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('vacations_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('vacations', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('vacations_message_add_succes');
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
		
		function save_price($id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$this->type = 'vacations';
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			$form = new DefPricesForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			
			$d = new Dt($request['date_start']);
			$request['date_start'] = $d->getDate('mysql');
			
			$d = new Dt($request['date_end']);
			$request['date_end'] = $d->getDate('mysql');
			
			$this->price_value ($request['price_single']);
			$this->price_value ($request['price_double']);
			$this->price_value ($request['price_3adult']);
			$this->price_value ($request['price_triple']);
			$this->price_value ($request['price_1child']);
			$this->price_value ($request['price_2child']);
			$this->price_value ($request['price_extra1']);
			$this->price_value ($request['price_extra2']);
			$this->price_value ($request['price_extra3']);
			
			$request['target_id'] = $id;
			$request['type'] = 'vacations';
			
			if($form->isValid())
			{		
				$this->id = Bus::call('prices', 'insert', $request);
				$response['message'] = tr('vacations_message_save_price_succes');
				$grid_prices = new DefPricesGrid($this);
				$response['grid'] = $grid_prices->get();
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
			
			echo (json_encode ($response));
			return true;
		}
		
		function price_value(&$value)
		{
			if ($value == '-')
			{
				$value = -1;
			}
			else 
			{
				$value = 0 + $value;
			}
		}
		
		function delete_price($price_id, $vacation_id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			Bus::call('prices', 'delete', array('id'=>$price_id));
			$response['succes'] = true;
			$response['message'] = tr('vacations_message_delete_price_succes');
			
			$this->id = $vacation_id;
			$this->type = 'vacations';
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			$grid_prices = new DefPricesGrid($this);
			$response['grid'] = $grid_prices->get();
			
			echo (json_encode ($response));
			return true;
		}
		
		function delete_prices($vacation_id)
		{
			$response = array();
			$response['succes'] = false;
			$response['message'] = '';
			
			Bus::call('prices', 'deleteBy', array('type'=>'vacations', 'target_id'=>$vacation_id));
			$response['succes'] = true;
			$response['message'] = tr('vacations_message_delete_price_succes');
			
			$this->id = $vacation_id;
			$this->type = 'vacations';
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			$grid_prices = new DefPricesGrid($this);
			$response['grid'] = $grid_prices->get();
			
			echo (json_encode ($response));
			return true;
		}

		function change_continent($continent_id)
		{
			$options = array('0'=>tr('vacations_label_any_country'));
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
			$options = array('0'=>tr('vacations_label_any_region'));
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

		function change_region($region_id)
		{
			$options = array('0'=>tr('vacations_label_any_location'));
			$count = 0;
			if ($region_id > 0)
			{
				$r = Bus::call('locations', 'getList', array('region_id' => $region_id));
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
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			Bus::call('vacations', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			Bus::call('vacations', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function specialc($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('vacations', 'read', array('id'=>$this->id));
			Bus::call('vacations', 'update', array('id'=>$this->id, 'specialc'=>1-$this->info['specialc']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$this->id = elementNr($id);
			Bus::call('vacations', 'delete', array('id'=>$this->id));				
			
			redirect(OBJ, 'admin');
		}

		function delete_all()
		{
			$ids = request('vacations2_ids');
			foreach ($ids as $idk => $idv)
			{
				Bus::call('vacations', 'delete', array('id'=>$idk));
			}
			redirect(OBJ, 'admin');
		}
		
		function export()
		{
			require_once LOCAL_PATH.'lib/excel/class.writeexcel_workbook.inc.php';
			require_once LOCAL_PATH.'lib/excel/class.writeexcel_worksheet.inc.php';
			ob_end_clean();

			$filename = 'vacations_'.date('Ymd').'.xls';
			$filepath = USR_PATH.'excel/'.$filename;
			
			$workbook = &new writeexcel_workbook($filepath);
			$workbook->_tempdir = USR_PATH.'/excel/';
			$worksheet = &$workbook->addworksheet();
			
			$header =& $workbook->addformat();
			$header->set_bold();
			$header->set_size(10);
			$header->set_color('black');
			$header->set_border_color('black');
			$header->set_top(1);
			$header->set_bottom(1);
			$header->set_left(1);
			$header->set_right(1);
			
			$bordered =& $workbook->addformat();
			$bordered->set_size(10);
			$bordered->set_color('black');
			$bordered->set_border_color('black');
			$bordered->set_top(1);
			$bordered->set_bottom(1);
			$bordered->set_left(1);
			$bordered->set_right(1);
			
			$bordered100 =& $workbook->addformat();
			$bordered100->set_size(10);
			$bordered100->set_color('black');
			$bordered100->set_border_color('black');
			$bordered100->set_top(1);
			$bordered100->set_bottom(1);
			$bordered100->set_left(1);
			$bordered100->set_right(1);
			
			$j=0;
			$i=0;
			$worksheet->write($j, $i++, 'Code', $header );
			$worksheet->write($j, $i++, 'Title', $header );
			$worksheet->write($j, $i++, 'Country', $header );
			$worksheet->write($j, $i++, 'Region', $header );
			$worksheet->write($j, $i++, 'Subtype', $header );
			$worksheet->write($j, $i++, 'Start', $header );
			$worksheet->write($j, $i++, 'End', $header );
			$worksheet->write($j, $i++, 'Single', $header );
			$worksheet->write($j, $i++, 'Double', $header );
			$worksheet->write($j, $i++, 'Al 3-lea adult', $header );
			$worksheet->write($j, $i++, 'Triple', $header );
			$worksheet->write($j, $i++, 'Primul copil', $header );
			$worksheet->write($j, $i++, 'Al doilea copil', $header );
			$worksheet->write($j, $i++, 'Extra1', $header );
			$worksheet->write($j, $i++, 'Extra2', $header );
			$worksheet->write($j, $i++, 'Extra3', $header );
			
			$set = array();
			$set['prices'] = 1;
			$set['text'] = $this->text;
			$set['region_id'] = $this->region_id;
			$set['continent_id'] = $this->continent_id;
			$set['country_id'] = $this->country_id;
			$set['accommodation_type_id'] = $this->accommodation_type_id;
			$set['special1'] = $this->special1;
			$set['special2'] = $this->special2;
			$set['sorting'] = ' continents.title asc, countries.title asc, regions.title asc, vacations.title asc';
			$set['page'] = 0;
			$set['page_size'] = 1000;
			$prices = bus::call('vacations', 'getArray', $set);
			
			$accommodation_code = '';
			foreach ($prices['data'] as $price)
			{
				
				if ($accommodation_code != $price['code'])
				{
					$accommodation_code = $price['code'];
					$j++;
					$i=0;
					$worksheet->write($j, $i++, $price['code'], $bordered100);
					$worksheet->write($j, $i++, $price['title'], $bordered100);
					$worksheet->write($j, $i++, $price['country_code'], $bordered);
					$worksheet->write($j, $i++, $price['region_code'], $bordered);
					$worksheet->write($j, $i++, '####', $bordered);
					$worksheet->write($j, $i++, '####', $bordered);
					$worksheet->write($j, $i++, '####', $bordered);
					$worksheet->write($j, $i++, $price['price_single'], $bordered);
					$worksheet->write($j, $i++, $price['price_double'], $bordered);
					$worksheet->write($j, $i++, $price['price_3adult'], $bordered);
					$worksheet->write($j, $i++, $price['price_triple'], $bordered);
					$worksheet->write($j, $i++, $price['price_1child'], $bordered);
					$worksheet->write($j, $i++, $price['price_2child'], $bordered);
					$worksheet->write($j, $i++, $price['price_extra1'], $bordered);
					$worksheet->write($j, $i++, $price['price_extra2'], $bordered);
					$worksheet->write($j, $i++, $price['price_extra3'], $bordered);
					
				}
				
				$d = new dt($price['price_date_start'], 'mysql');
				$date_start = $d->getDate();
				$d = new dt($price['price_date_end'], 'mysql');
				$date_end = $d->getDate();
				
				$j++;
				$i=0;
				$worksheet->write($j, $i++, $price['code'], $bordered100);
				$worksheet->write($j, $i++, $price['title'], $bordered100);
				$worksheet->write($j, $i++, $price['country_code'], $bordered);
				$worksheet->write($j, $i++, $price['region_code'], $bordered);
				$worksheet->write($j, $i++, $price['price_subtype'], $bordered);
				$worksheet->write($j, $i++, $date_start, $bordered);
				$worksheet->write($j, $i++, $date_end, $bordered);
				$worksheet->write($j, $i++, $price['price_price_single'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_double'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_3adult'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_triple'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_1child'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_2child'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_extra1'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_extra2'], $bordered);
				$worksheet->write($j, $i++, $price['price_price_extra3'], $bordered);
			}
			
			$workbook->close();
			
			header("Content-Type: application/x-msexcel; name=\"".$filename."\"");
			header("Content-Disposition: inline; filename=\"".$filename."\"");
			$fh=fopen($filepath, "rw");
			fpassthru($fh);
		}
		
		function import()
		{
			$form = new DefImportForm($this);
			
			$t = new layout ('import');
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function import_save()
		{
			$msg = array();
			require_once LOCAL_PATH.'lib/excel/reader.php';
			if(isset($_FILES) && isset($_FILES['import_upload']))
			{
				
				$headers = array(1=>'name', 2=>'cui_cnp', 3=>'reason');
				$list = array();
				$data = new Spreadsheet_Excel_Reader();
				$data->setOutputEncoding('CP1251');
				$data->read($_FILES['import_upload']['tmp_name']);
				$list = $data->sheets[0]['cells'];
				
				$i = 0;
				foreach ($list as $k=>$v)
				{
					if ($i++ === 0) continue;
					
					$code = elementStr($v[1]);
					$title = elementStr($v[2]);
					$country = elementStr($v[3]);
					$region = elementStr($v[4]);
					$subtype = elementStr($v[5]);
					$codeExists = bus::call('vacations', 'readByCode', array('code'=>$code, 'region_code'=>$region));
					if (isset($codeExists['id'])) 
					{
						$date_start_format = elementStr($v[6]);
						$d = new dt($date_start_format);
						$date_start = $d->getDate('mysql');
						
						$date_end_format = elementStr($v[7]);
						$d = new dt($date_end_format);
						$date_end = $d->getDate('mysql');
						
						if (trim($date_start_format) == '####' && trim($date_end_format) == '####')
						{
							$set = array();
							$set['id'] = $codeExists['id'];
							$i = 8;
							$set['price_single'] = elementStr($v[$i++]);
							$set['price_double'] = elementStr($v[$i++]);
							$set['price_3adult'] = elementStr($v[$i++]);
							$set['price_triple'] = elementStr($v[$i++]);
							$set['price_1child'] = elementStr($v[$i++]);
							$set['price_2child'] = elementStr($v[$i++]);
							$set['price_extra1'] = elementStr($v[$i++]);
							$set['price_extra2'] = elementStr($v[$i++]);
							$set['price_extra3'] = elementStr($v[$i++]);
							
							bus::call('vacations', 'update', $set);
							$msg[] = array('succes'=>1, 'msg'=>'Succes: cazare `'.$title.'` updatata.');

						}
						else 
						{
							$set = array();
							$set['target_id'] = $codeExists['id'];
							$set['type'] = 'vacations';
							$set['subtype'] = elementStr($v[5]);
							$set['date_start'] = $date_start;
							$set['date_end'] = $date_end;
							$i = 8;
							$set['price_single'] = 0 + elementNr($v[$i++]);
							$set['price_double'] = 0 + elementNr($v[$i++]);
							$set['price_3adult'] = 0 + elementNr($v[$i++]);
							$set['price_triple'] = 0 + elementNr($v[$i++]);
							$set['price_1child'] = 0 + elementNr($v[$i++]);
							$set['price_2child'] = 0 + elementNr($v[$i++]);
							$set['price_extra1'] = 0 + elementNr($v[$i++]);
							$set['price_extra2'] = 0 + elementNr($v[$i++]);
							$set['price_extra3'] = 0 + elementNr($v[$i++]);
							
							$priceExists = bus::call('prices', 'readByTargetDate', $set);
							if(strlen(trim($set['date_start'])) != 0 && strlen(trim($set['date_end'])) != 0)
							{
								if (isset($priceExists['id'])) 
								{
									$set['id'] = $priceExists['id'];
									bus::call('prices', 'update', $set);
									$msg[] = array('succes'=>1, 'msg'=>'Succes: Pret cazare `'.$title.'` updatat. De la:'.$date_start_format.'. Pana la:'.$date_end_format);
								}
								else 
								{
									bus::call('prices', 'insert', $set);
									$msg[] = array('succes'=>1, 'msg'=>'Succes: Pret cazare `'.$title.'` inserat. De la:'.$date_start_format.'. Pana la:'.$date_end_format);
								}
							}
							else 
							{
								$msg[] = array('succes'=>0, 'msg'=>'Error: cazare `'.$title.'` data start sau end invalida.');
							}
						}
					}
					else 
					{
						$msg[] = array('succes'=>0, 'msg'=>'Error: cazare `'.$title.'` nu exista.');
					}
				}				
			}
			else 
			{
				$msg[] = array('succes'=>0, 'msg'=>'Error: fisierul de import este invalid.');
			}
			
			$t = new layout ('import_save');
			$t->assign('msg', $msg);
			$t->display();
		}
	}
?>