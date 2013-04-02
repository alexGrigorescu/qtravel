<?
	class locations
	{
		function locations()
		{
			$this->text = strtolower(request('locations_filter_text'));
			$this->continent_id = request('locations_filter_continent_id');
			$this->country_id = request('locations_filter_country_id');
			$this->region_id = request('locations_filter_region_id');
			$this->accommodation_type_id = request('locations_filter_accommodation_type_id');
		}
	
		function admin()
		{
			$this->page = request('locations_filter_page');
			
			$form = new DefLocationsFilterForm($this);
			$form->loadFromRequest();
			
			$grid = new DefLocationsGrid($this);
		
			$t = new layout ('locations_admin');
			$t->assign('change_country_url', LOCAL_URL.url('locations', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('locations', 'change_continent'));			
			$t->assign('delete_location_url', LOCAL_URL.url('locations', 'delete'));			
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
			$this->info = Bus::call('locations', 'read', array('id'=>$this->id));
			
			$this->continent_id = $this->info['continent_id'];
			$this->country_id = $this->info['country_id'];
			$this->region_id = $this->info['region_id'];

			$this->type = 'locations';
			$form_pics = new DefPicsForm($this);
			$grid_pics = new DefPicsGrid($this);
				
			$form = new DefLocationsForm($this);
			$form->setTargetObject('locations');
			$form->setTargetMethod('save');
			$form->loadFromArray($this->info);				   
			
			$t = new layout('locations_edit');
			$t->assign('id', $this->id);
			$t->assign('grid_pics', $grid_pics->get());
			$t->assign('form_pics_header', $form_pics->getHeader());
			$t->assign('form_pics_pic', $form_pics->elements['pic']->getImage());
			$t->assign('delete_pic_url', url(OBJ, 'delete_pic', array(), false));	
			$t->assign('upload_bulk_edit_url', LOCAL_URL.url(OBJ, 'upload_bulk_edit', array('id'=>$id), false));	
			
			$t->assign('change_country_url', LOCAL_URL.url('locations', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('locations', 'change_continent'));
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
				
			$form = new DefLocationsForm($this);
			$form->setTargetObject('locations');
			$form->setTargetMethod('save');
			
			$t = new layout('locations_edit');
			$t->assign('change_country_url', LOCAL_URL.url('locations', 'change_country'));
			$t->assign('change_continent_url', LOCAL_URL.url('locations', 'change_continent'));
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
			$form = new DefLocationsForm($this);						
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
					$this->info = Bus::call('locations', 'read', array('id'=>$this->id));
					$request['id'] = $this->id;
					
					Bus::call('locations', 'update', $request);
					$response['url'] = LOCAL_URL.url(OBJ, 'admin', array(), false);
					$response['message'] = tr('locations_message_save_succes');
				}
				else 
				{
					$this->id = Bus::call('locations', 'insert', $request);
					$response['newlocation'] = true;
					$response['url'] = LOCAL_URL.url(OBJ, 'edit', array('id'=>$this->id), false);
					$response['message'] = tr('locations_message_add_succes');
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
				$folder = Bus::call('pics', 'path', array('target_id'=>$this->id, 'type'=>'locations'));
				$u = new picture_upload ($folder, 'pics_pic');
				if ($u->tmp_name > '')
				{
					$exists = Bus::call('pics', 'exists', array('target_id'=>$this->id, 'type'=>'locations', 'file'=>$u->original_name));
					if (!$exists)
					{
						$fn = $u->save_as ($u->original_name);
						if ($fn !== false)
						{
							$this->type = 'locations';
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
		
		function upload_bulk_edit($id, $thanks)
		{
			$t = new layout('locations_upload_bulk_edit');
			$t->assign('upload_bulk_url', LOCAL_URL.url(OBJ, 'upload_bulk', array('id'=>$id), false));	
			$t->assign('upload_thanks_url', LOCAL_URL.url(OBJ, 'upload_bulk_edit', array('id'=>$id, 'thanks'=>1), false));	
			$t->assign('thanks', $thanks);	
			$t->assign('id', $id);	
			echo $t->get();
		}
		
		function upload_bulk($id)
	    {
	    	$upload_dir = Bus::call('pics', 'path', array('target_id'=>$id, 'type'=>'locations'));
	    	
	    	$max_size = 1500000000000;
			$createsubfolders = "true";
			$keepalive = "true";
			
			error_reporting(0);
			$message ="";
			if (!is_dir($upload_dir))
			{
			  if (!$this->recursiveMkdir($upload_dir)) die ("cannot access upload directory");
			  if (!chmod($upload_dir,0755)) die ("change permission to 755 failed.");
			}
			
			if ($_POST['todo']=="upload")
			{
			  $account = "";
			  if (isset($_POST['account']))
			  {
			    $account = $_POST['account'];
			    if (substr($account,0,1) != "/") $account = "/".$account;
			  }
			  $target_folder=$upload_dir.$account;
			  // relalivefilename support for folders and subfolders creation.
			  $relative = $_POST['relativefilename'];
			  if(get_magic_quotes_gpc()) $relative = stripslashes($relative);
			  if (($createsubfolders == "true") && ($relative != ""))
			  {
				$file_name = $_FILES['uploadfile']['name'];
				if(get_magic_quotes_gpc()) $file_name = stripslashes($file_name);
				$inda=strlen($relative);
				$indb=strlen($file_name);
				if (($indb > 0) && ($inda > $indb))
				{
					$subfolder = substr($relative,0,($inda-$indb)-1);
			        $subfolder = str_replace("\\","/",$subfolder);
			        $target_folder = $upload_dir.$account."/".$subfolder;
			        $this->recursiveMkdir($target_folder);
			    }
			  }
			  if ($_FILES['uploadfile'])
			  {
			    if ($keepalive == "false")
			    {
			       header("Connection: close");
			    }
			    $message = $this->do_upload($target_folder,$max_size);
			    // Recompose file from chunks (if any).
			    $chunkid = $_POST['chunkid'];
			    $chunkamount = $_POST['chunkamount'];
			    $chunkbaseStr = $_POST['chunkbase'];
			    if(get_magic_quotes_gpc()) $chunkbaseStr = stripslashes($chunkbaseStr);
			    if (($chunkid != "") && ($chunkamount != "") && ($chunkbaseStr != ""))
			    {
					if ($chunkid == $chunkamount)
			        {
						// recompose file.
						$fname = $target_folder."/".$chunkbaseStr;
						if (file_exists($fname)) $fname = $fname.".".time();
						$fout = fopen ($fname, "wb");
			            for ($c=1;$c<=$chunkamount;$c++)
						{
							$filein = $target_folder."/".$chunkbaseStr.".".$c;
							$fin = fopen ($filein, "rb");
						    while (!feof($fin))
						    {
						      $read = fread($fin,4096);
						      fwrite($fout,$read);
						    }
						    fclose($fin);
						    unlink($filein);
						}
						fclose($fout);
			        }
			     }
			  }
			  else
			  {
			     $emptydirectory = $_POST['emptydirectory'];
			     if ($emptydirectory != "")
			     {
			         $this->recursiveMkdir($upload_dir.$account."/".$emptydirectory);
			     }
			     $message = "No uploaded file(s).";
			  }
			}
		}
			
		function do_upload($upload_dir,$max_size)
		{
		    $temp_name = $_FILES['uploadfile']['tmp_name'];
		    $file_name = $_FILES['uploadfile']['name'];
		    $file_size = $_FILES['uploadfile']['size'];
		    $file_type = $_FILES['uploadfile']['type'];
		    if(get_magic_quotes_gpc()) $file_name = stripslashes($file_name);
		    //$file_name = str_replace("\\","/",$file_name);
		    $file_path = $upload_dir."/".$file_name;
		
		    // Check filename.
		    if ($file_name =="" || (substr (strtolower($file_name),  -4) == '.php'))
		    {
		  	  $message = "Error - Invalid filename";
		  	  return $message;
		    }
		
		    // Check file size.
		    if ($file_size > $max_size)
		    {
		      $errormsg = "- File size is over ".$max_size." bytes";
		      header("HTTP/1.1 405");
		      header("custommessage: ".$errormsg);
		      $message = "Error ".$errormsg;
		      return $message;
		    }
		
		    $result = move_uploaded_file($temp_name, $file_path);
		    if ($result)
		    {
		      chmod($file_path,0755);
		      $message = "$file_name uploaded successfully.";
		      return $message;
		    }
		    else
		    {
		      $errormsg = "- PHP upload failed";
		      header("HTTP/1.1 405");
		      header("custommessage: ".$errormsg);
		      $message = "Error ".$errormsg;
		      return $message;
		    }
		}
		
		function recursiveMkdir($path)
		{
			if (!file_exists($path))
		    {
				$this->recursiveMkdir(dirname($path));
		        return mkdir($path, 0755);
		    }
		    else return true;
		}
		
		function delete_pic($id_pic, $id)
		{
			$response = array();
			$response['succes'] = true;
			$response['message'] = '';
			$response['grid'] = '';
			
			$this->id = elementNr($id);
			if ($this->id > 0)
			{
				Bus::call('pics', 'delete', array('target_id'=>$id, 'type'=>'locations', 'file'=>$id_pic));
			}
			$this->type = 'locations';
			$grid_pics = new DefPicsGrid($this);
			$response['grid'] = $grid_pics->get();
			
			echo (json_encode ($response));
			return true;
		}

		function change_continent($continent_id)
		{
			$options = array('0'=>tr('locations_label_any_country'));
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
			$options = array('0'=>tr('locations_label_any_region'));
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
			$this->info = Bus::call('locations', 'read', array('id'=>$this->id));
			Bus::call('locations', 'update', array('id'=>$this->id, 'special1'=>1-$this->info['special1']));
			
			redirect(OBJ, 'admin');
		}
		
		function special2($id)
		{
			$this->id = elementNr($id);
			$this->info = Bus::call('locations', 'read', array('id'=>$this->id));
			Bus::call('locations', 'update', array('id'=>$this->id, 'special2'=>1-$this->info['special2']));
			
			redirect(OBJ, 'admin');
		}
		
		function delete($id)
		{
			$response['error'] = false;
			$response['message'] = '';
			
			$this->id = elementNr($id);
			$accommodations = Bus::call('accommodations', 'getArray', array('location_id'=>$this->id));
			$vacations = Bus::call('vacations', 'getArray', array('location_id'=>$this->id));
			
			if ($accommodations['count'] > 0 || $vacations['count'])
			{
				$response['error'] = true;
				if ($accommodations['count'] > 0)
				{
					$response['message'] .= tr('locations_delete_accommodations_exists').NL;
					foreach ($accommodations['data'] as $k=>$v)
					{
						$response['message'] .= '- '.$v['title'].NL;
					}
				}
				
				if ($vacations['count'] > 0)
				{
					$response['message'] .= tr('locations_delete_vacations_exists').NL;
					foreach ($vacations['data'] as $k=>$v)
					{
						$response['message'] .= '- '.$v['title'].NL;
					}
				}
			}
			else 
			{			
				Bus::call('locations', 'delete', array('id'=>$this->id));				
			}
			
			echo (json_encode ($response));
			return true;
		}
	}
?>