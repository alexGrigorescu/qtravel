<?
	class flights
	{
		function flights()
		{
			$this->text = strtolower(request('flights_filter_text'));
			$this->start_continent_id = request('flights_filter_start_continent_id');
			$this->start_country_id = request('flights_filter_start_country_id');
			$this->start_region_id = request('flights_filter_start_region_id');
			$this->end_continent_id = request('flights_filter_end_continent_id');
			$this->end_country_id = request('flights_filter_end_country_id');
			$this->end_region_id = request('flights_filter_end_region_id');
			$this->special1 = request('flights_filter_special1');
			$this->special2 = request('flights_filter_special2');
		}
	
		function admin()
		{
			$this->page = request('flights_page');
			
			$form = new DefFlightsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefFlightsGrid($this);
		
			$t = new layout ('flights_admin');
			$t->assign('change_continent_url', LOCAL_URL.url('flights', 'change_continent'));			
			$t->assign('change_country_url', LOCAL_URL.url('flights', 'change_country'));
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
				$this->info = Bus::call('flights', 'read', array('id'=>$this->id));
			}

			$contents = array();
			$this->start_region_id = $this->info['start_region_id'];
			$this->start_country_id = $this->info['start_country_id'];
			$this->start_continent_id = $this->info['start_continent_id'];
				
			$this->end_region_id = $this->info['end_region_id'];
			$this->end_country_id = $this->info['end_country_id'];
			$this->end_continent_id = $this->info['end_continent_id'];
				
			$form = new DefFlightsForm($this);
			$form->setTargetObject('flights');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('flights_edit');
			$t->assign('id', $this->id);
			$t->assign('change_country_url', LOCAL_URL.url('flights', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('flights', 'change_continent'));
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
			
			$flight_type_info =  Bus::call('flightTypes', 'readByCode', array('code'=>'economic'));
			if (isset($flight_type_info['id']))
			{
				$rec['type_id'] = $flight_type_info['id'];
			}
			
			$rec['start_airport'] = 'Otopeni';
			$rec['stops'] = '1';
			$rec['special1'] = '1';
			
			$form = new DefFlightsForm($this);
			$form->loadFromArray($rec);
			
			$t = new layout('flights_edit');
			$t->assign('change_country_url', LOCAL_URL.url('flights', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('flights', 'change_continent'));
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
			$form = new DefFlightsForm($this);						
			$form->loadFromRequest();
			$request = $form->saveToArray();
			

			$request['code'] = code($request['code']);	
			$request['special1'] = elementNr($request['special1']);
			$request['special2'] = elementNr($request['special2']);
			$request['datem'] = date('Y-m-d H:i:s');
			$request['price1'] = 0+$request['price1'];
			$request['price2'] = 0+$request['price2'];
			$request['price1_2'] = 0+$request['price1_2'];
			$request['price2_2'] = 0+$request['price2_2'];
			$request['price1_3'] = 0+$request['price1_3'];
			$request['price2_3'] = 0+$request['price2_3'];
			$request['price1_4'] = 0+$request['price1_4'];
			$request['price2_4'] = 0+$request['price2_4'];
			
			if($form->isValid())
			{		
				if ($this->id > 0)
				{
					$this->info = Bus::call('flights', 'read', array('id'=>$this->id));
					
					$request['id'] = $this->id;
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					Bus::call('flights', 'update', $request);
					$response['message'] = tr('flights_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('flights', 'insert', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('flights_message_add_succes');
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
			$options = array('0'=>tr('flights_label_any_country'));
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
			$options = array('0'=>tr('flights_label_any_region'));
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
			$this->info = Bus::call('flights', 'read', array('id'=>$this->id));
			Bus::call('flights', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('flights', 'read', array('id'=>$this->id));
			Bus::call('flights', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$this->id = elementNr($id);
			Bus::call('flights', 'delete', array('id'=>$this->id));				
			
			redirect(OBJ, 'admin');
		}
		
		function export()
		{
			require_once LOCAL_PATH.'lib/excel/class.writeexcel_workbook.inc.php';
			require_once LOCAL_PATH.'lib/excel/class.writeexcel_worksheet.inc.php';
			
			$filename = 'flights_'.date('Ymd').'.xls';
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
			
			$j=0;
			$i=0;
			$worksheet->write($j, $i++, 'Code', $header );
			$worksheet->write($j, $i++, 'Title', $header );
			$worksheet->write($j, $i++, 'Price1 1', $header );
			$worksheet->write($j, $i++, 'Price2 1', $header );
			$worksheet->write($j, $i++, 'Operator 1', $header );
			$worksheet->write($j, $i++, 'Escale 1', $header );
			for ($p = 2; $p < 5; $p++)
			{
				$worksheet->write($j, $i++, 'Price1 '.$p, $header );
				$worksheet->write($j, $i++, 'Price2 '.$p, $header );
				$worksheet->write($j, $i++, 'Operator '.$p, $header );
				$worksheet->write($j, $i++, 'Escale '.$p, $header );
			}
			
			$set = array();
			$set['text'] = $this->text;
			$set['start_continent_id'] = $this->start_continent_id;
			$set['start_country_id'] = $this->start_country_id;
			$set['start_region_id'] = $this->start_region_id;
			$set['end_continent_id'] = $this->end_continent_id;
			$set['end_country_id'] = $this->end_country_id;
			$set['end_region_id'] = $this->end_region_id;
			$set['special1'] = $this->special1;
			$set['special2'] = $this->special2;
			$set['sorting'] = '';
			$set['page'] = 0;
			$set['page_size'] = 1000;
			$flights = bus::call('flights', 'getArray', $set);
			foreach ($flights['data'] as $flight)
			{
				$j++;
				$i=0;
				$worksheet->write($j, $i++, $flight['code'], $bordered);
				$worksheet->write($j, $i++, $flight['title'], $bordered);
				$worksheet->write($j, $i++, $flight['price1'], $bordered);
				$worksheet->write($j, $i++, $flight['price2'], $bordered);
				$worksheet->write($j, $i++, $flight['flight_operator_code'], $bordered);
				$worksheet->write($j, $i++, $flight['stops_description'], $bordered);
				
				for ($p = 2; $p < 5; $p++)
				{
					$worksheet->write($j, $i++, $flight['price1_'.$p], $bordered);
					$worksheet->write($j, $i++, $flight['price2_'.$p], $bordered);
					$worksheet->write($j, $i++, $flight['flight_operator_'.$p.'_code'], $bordered);
					$worksheet->write($j, $i++, $flight['stops_description_'.$p], $bordered);
				}
			}
			
			$workbook->close();
			
			header("Content-Type: application/x-msexcel; name=\"".$filename."\"");
			header("Content-Disposition: inline; filename=\"".$filename."\"");
			$fh=fopen($filepath, "rw");
			fpassthru($fh);
		}
		
		function import()
		{
			$form = new DefFlightsImportForm($this);
			
			$t = new layout ('flights_import');
			$t->assign('form', $form->getFullImage());
			$t->display();
		}
		
		function import_save()
		{
			$msg = array();
			require_once LOCAL_PATH.'lib/excel/reader.php';
			if(isset($_FILES) && isset($_FILES['flights_import_upload']))
			{
				
				$headers = array(1=>'name', 2=>'cui_cnp', 3=>'reason');
				$list = array();
				$data = new Spreadsheet_Excel_Reader();
				$data->setOutputEncoding('CP1251');
				$data->read($_FILES['flights_import_upload']['tmp_name']);
				$list = $data->sheets[0]['cells'];
				
				$i = 0;
				foreach ($list as $k=>$v)
				{
					
					if ($i++ === 0) continue;
					$code = $v[1];
					$title = $v[2];
					$set = array();
					$set['price1'] = 0 + elementNr($v[3]);
					$set['price2'] = 0 + elementNr($v[4]);
					$set['operator_code'] = elementStr($v[5]);
					$set['stops_description'] = elementStr($v[6]);
					$operator = bus::call('flightOperators', 'readByCode', array('code'=>$set['operator_code']));
					if (isset($operator['id']) > 0)
					{
						$set['operator_id'] = $operator['id'];
					}
					else 
					{
						$set['operator_id'] = 0;
					}
					
					$o = 7;
					for ($p = 2; $p < 5; $p++)
					{
						$set['price1_'.$p] = 0 + elementNr($v[$o++]);
						$set['price2_'.$p] = 0 + elementNr($v[$o++]);
						$set['operator_'.$p.'_code'] = elementStr($v[$o++]);
						$set['stops_description_'.$p] = elementStr($v[$o++]);
						
						if (strlen(trim($set['operator_'.$p.'_code'])) > 0)
						{
							$operator = bus::call('flightOperators', 'readByCode', array('code'=>$set['operator_'.$p.'_code']));
							if (isset($operator['id']) > 0)
							{
								$set['operator_'.$p.'_id'] = $operator['id'];
							}
							else 
							{
								$set['operator_'.$p.'_id'] = 0;
							}
						}
						else 
						{
							$set['operator_'.$p.'_id'] = 0;
						}
					}
					
					$codeExists = bus::call('flights', 'readByCode', array('code'=>$code));
					if (isset($codeExists['id'])) 
					{
						$set['id'] = $codeExists['id'];
						bus::call('flights', 'update', $set);
						$msg[] = array('succes'=>1, 'msg'=>'Succes: flight `'.$title.'` updated. Price1:'.$set['price1'].'. Price2:'.$set['price2']);
					}
					else 
					{
						$msg[] = array('succes'=>0, 'msg'=>'Error: flight `'.$title.'` does not exists');
					}
				}				
			}
			else 
			{
				$msg[] = array('succes'=>0, 'msg'=>'Error: file uploaded is invalid.');
			}
			
			$t = new layout ('flights_import_save');
			$t->assign('msg', $msg);
			$t->display();
		}
	}
?>