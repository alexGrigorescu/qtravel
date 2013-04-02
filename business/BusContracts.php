<?
	class BusContracts extends BusTable
	{	
		function BusContracts()
		{
			$this->setTable(TBL_CONTRACTS);
		}
		
		function read ($set)
		{
			$sql  = 
			'
			select contracts.*
			from '.TBL_CONTRACTS.' contracts
			where contracts.id=\''.encode($set['id']).'\'
			';
			$q = new Query($sql);
			$data = $q->fetch();
			
			return $data;
		}
		
		function getArray($set)
		{
			$w = '';
			$set['page'] = elementNr($set['page']);
			$set['page_size'] = elementNr($set['page_size'], 100);
			$set['text'] = elementStr($set['text']);
			$set['sorting'] = elementStr($set['sorting']);
			
			if (strlen(trim($set['text'])) > 0) $w .= ' and ((LOWER(contracts.code) like \'%'.encode($set['text']).'%\') or (LOWER(contracts.name) like \'%'.encode($set['text']).'%\'))';
			if (strlen(trim($set['sorting'])) == 0)	$set['sorting'] = ' contracts.id desc';
			
			$sql  = 
			'
			select contracts.*, users.user_name
			from '.TBL_CONTRACTS.' contracts
			left join '.TBL_USERS.' users on users.id=contracts.user_id
			where contracts.id > 0 '.$w.'
			order by '. $set['sorting'].'
			';
			
			$q = new Query($sql);
			$count = $q->getCount();		
			$data = $q->getArray($set['page'], $set['page_size']);
			
			$response = array();
			$response['count'] = $count;
			$response['data'] = $data;
			return $response;
		}
		
		function readByCode($set)
		{
			$w = '';
			$set['code'] = elementStr($set['code']);
			
			$sql  = 
			'
			select contracts.*
			from '.TBL_CONTRACTS.' contracts
			where contracts.code=\''.encode($set['code']).'\' '.$w.' 
			';
			$q = new Query($sql);
			$data = $q->fetch();
			return $data;
		}
		
		function path ($set)
		{
			$set['target_id'] = elementNr($set['target_id']);
			$set['trail'] = elementStr($set['trail'], '/');
			$path = USR_PATH.'contracts/';
			if (!file_exists($path))
			{
				mkdir($path, 0777);
				chmod($path, 0777);
			}
			$path = USR_PATH.'contracts/'.$set['target_id'].$set['trail'];
			if (!file_exists($path))
			{
				mkdir($path, 0777);
				chmod($path, 0777);
			}
			return $path;
		}
		
		function url ($set)
		{
			$set['target_id'] = elementNr($set['target_id']);
			$set['type'] = elementStr($set['type'], 'pages');
			$set['trail'] = elementStr($set['trail'], '/');
			$url = USR_URL.'contracts/'.$set['target_id'].$set['trail'];
			return $url;
		}
		
		function generate($set)
		{
			$info = Bus::call('contracts', 'read', array('id'=>$set['id']));
			if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$set['id']));

				if ($info['active2'])
				{
					$content = file_get_contents(USR_PATH.'contracts/template2.rtf'); 
				}
				else 
				{
					$file_user = USR_PATH.'contracts/template1_'.$GLOBALS['SECURITY']->user_info['user_name'].'.rtf';
					if (file_exists($file_user))
					{
						$content = file_get_contents($file_user); 
					}
					else
					{
						$content = file_get_contents(USR_PATH.'contracts/template1.rtf'); 
					}
					
				}

				$info['names1'] = str_replace ("\n", "\r\n, ", $info['names1']);
				$info['names2'] = str_replace ("\n", "\r\n, ", $info['names2']);

			    foreach ($info as $field=>$value)
			    {
					$content = str_replace('xxx'.$field.'xxx', $value, $content);
			    }
			    
			    file_put_contents($path.$info['code'].'.rtf', $content); 
			}
		}
		
		function generate_voucher_electronic($set)
		{
			$info = Bus::call('contracts', 'read', array('id'=>$set['id']));
			if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$info['id']));
				
				$pdf = new FPDF('P', 'cm', 'A4');
				$pdf->AddPage();

				
				$pdf->Image(LOCAL_PATH.'systems/'.SYSTEM.'/templates/'.SECTION.'/img/contract/voucher.jpg', 0, 0, 21, 14.8); 

				$pdf->SetLineWidth(.3);
				$pdf->SetTextColor(0);
				
				$pdf->SetFont('Arial','',14);
				$pdf->SetXY(11.1,1.7);
				$pdf->Cell(10,1, $info['number1'], 0, 0, 'L');

				$pdf->SetFont('Arial','',11);

				$pdf->SetXY(9.5,4.6);
				$pdf->Cell(10,1, $info['date'], 0, 0, 'L');

				$parteners = split("\n", $info['partener1']);
				$i = 0;
				foreach ($parteners as $k=>$v)
				{
					$i ++;
					
					if ($i > 1)
					{
						$pdf->SetXY(12.5,4.1+$k*0.4);
					}
					else
					{
						$pdf->SetXY(15.2,3.8+$k*0.4);
					}
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}

				$hotels = split("\n", $info['hotel1']);
				foreach ($hotels as $k=>$v)
				{
					$pdf->SetXY(1.6,5.25+$k*0.4);
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}

				$hotels = split("\n", $info['hotel1']);
				foreach ($hotels as $k=>$v)
				{
					$pdf->SetXY(1.6,5.25+$k*0.4);
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}
				
				$names = split("\n", $info['names1']);
				foreach ($names as $k=>$v)
				{
					$pdf->SetXY(0.8,7.1+$k*0.4);
					$pdf->Cell(10,1, strtoupper($v), 0, 0, 'L');
				}

				$pdf->SetXY(8.4,5.85);
				$pdf->Cell(10,1, $info['city1'], 0, 0, 'L');

				$pdf->SetXY(14.3,5.85);
				$pdf->Cell(10,1, $info['country1'], 0, 0, 'L');


				$pdf->SetXY(9.6,7.1);
				$pdf->Cell(10,1, $info['nrpeople1'], 0, 0, 'L');

				$accommodations = split("\n", $info['accommodation1']);
				foreach ($accommodations as $k=>$v)
				{
					$pdf->SetXY(12.4,7.0+$k*0.3);
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}

				$pdf->SetXY(16.4,7.1);
				$pdf->Cell(10,1, $info['table1'], 0, 0, 'L');


				$pdf->SetXY(9.6,8.5);
				$pdf->Cell(10,1, $info['arrive1'], 0, 0, 'L');

				$pdf->SetXY(13.6,8.5);
				$pdf->Cell(10,1, $info['departure1'], 0, 0, 'L');

				$pdf->SetXY(17.6,8.5);
				$pdf->Cell(10,1, $info['nights1'], 0, 0, 'L');

				$pdf->SetXY(9.6,9.8);
				$pdf->Cell(10,1, $info['transfer1'], 0, 0, 'L');

				$pdf->SetXY(13.6,9.8);
				$pdf->Cell(10,1, $info['flightnumber1'], 0, 0, 'L');

				$pdf->SetXY(16.4,9.8);
				$pdf->Cell(10,1, $info['company1'], 0, 0, 'L');

				$otherservices = split("\n", $info['otherservices1']);
				foreach ($otherservices as $k=>$v)
				{
					$pdf->SetXY(11.6,10.4+$k*0.6);
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}

				$pdf->SetFont('Arial','',9);

				$pdf->SetXY(4.75,12.87);
				$pdf->Cell(10,1, substr($info['user_phone'], strlen($info['user_phone'])-2,2), 0, 0, 'L');
				
				$file = LOCAL_PATH.'systems/'.SYSTEM.'/templates/'.SECTION.'/img/contract/semnatura_'.$GLOBALS['SECURITY']->user_info['user_name'].'_300.jpg';
				if (file_exists($file))
				{
					$pdf->Image($file, 11, 11.92, 3.2, 1.6);
				}

				$pdf->Output($path.$info['code'].'-voucher-electronic.pdf');
			}
		}

		function generate_voucher_print($set)
		{
			$info = Bus::call('contracts', 'read', array('id'=>$set['id']));
			if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$info['id']));
				
				$pdf = new FPDF('L', 'cm', 'A5');
				$pdf->AddPage();
				
				$pdf->SetLineWidth(.3);
				$pdf->SetTextColor(0);
				
				$pdf->SetFont('Arial','',9);

				$pdf->SetXY(9.5,4.6);
				$pdf->Cell(10,1, $info['date'], 0, 0, 'L');

				$pdf->SetXY(12.4, 4.6);
				$pdf->Cell(10,1, $info['name'], 0, 0, 'L');

				$pdf->SetXY(0.8,5.85);
				$pdf->Cell(10,1, $info['hotel1'], 0, 0, 'L');
				
				$pdf->SetFont('Arial','',9);

				$names = split("\n", $info['names1']);
				foreach ($names as $k=>$v)
				{
					$pdf->SetXY(0.8,7.1+$k*0.4);
					$pdf->Cell(10,1, $v, 0, 0, 'L');
				}

				$pdf->SetXY(8.4,5.85);
				$pdf->Cell(10,1, $info['city1'], 0, 0, 'L');

				$pdf->SetXY(14.3,5.85);
				$pdf->Cell(10,1, $info['country1'], 0, 0, 'L');


				$pdf->SetXY(9.6,7.1);
				$pdf->Cell(10,1, $info['nrpeople1'], 0, 0, 'L');

				$pdf->SetXY(12.4,7.1);
				$pdf->Cell(10,1, $info['accommodation1'], 0, 0, 'L');

				$pdf->SetXY(16.4,7.1);
				$pdf->Cell(10,1, $info['table1'], 0, 0, 'L');


				$pdf->SetXY(9.6,8.5);
				$pdf->Cell(10,1, $info['arrive1'], 0, 0, 'L');

				$pdf->SetXY(13.6,8.5);
				$pdf->Cell(10,1, $info['departure1'], 0, 0, 'L');

				$pdf->SetXY(17.6,8.5);
				$pdf->Cell(10,1, $info['nights1'], 0, 0, 'L');


				$pdf->SetXY(9.6,9.8);
				$pdf->Cell(10,1, $info['transfer1'], 0, 0, 'L');

				$pdf->SetXY(13.6,9.8);
				$pdf->Cell(10,1, $info['flightnumber1'], 0, 0, 'L');

				$pdf->SetXY(16.4,9.8);
				$pdf->Cell(10,1, $info['company1'], 0, 0, 'L');

				$pdf->SetXY(9.6,11.1);
				$pdf->Cell(10,1, $info['otherservices1'], 0, 0, 'L');

				$pdf->Output($path.$info['code'].'-voucher-print.pdf');
			}
		}
		
		function get_document($set)
		{
			$content = '';
			$info = Bus::call('contracts', 'readByCode', array('code'=>$set['code']));

            if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$info['id']));

                if (!file_exists($path.$info['code'].'.rtf') || 1)
				{
					Bus::call('contracts', 'generate', array('id'=>$info['id']));
				}
				
				$content = file_get_contents($path.$info['code'].'.rtf');
			}
			return $content;
		}
		
		function get_voucher_electronic($set)
		{
			$content = '';
			$info = Bus::call('contracts', 'readByCode', array('code'=>$set['code']));
			if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$info['id']));
				
				if (!file_exists($path.$info['code'].'-voucher-electronic.pdf') || 1)
				{
					Bus::call('contracts', 'generate_voucher_electronic', array('id'=>$info['id']));
				}
				
				$content = file_get_contents($path.$info['code'].'-voucher-electronic.pdf');
			}
			return $content;
		}

		function get_voucher_print($set)
		{
			$content = '';
			$info = Bus::call('contracts', 'readByCode', array('code'=>$set['code']));
			if (isset($info['id']))
			{
				$path = Bus::call('contracts', 'path', array('target_id'=>$info['id']));
				
				if (!file_exists($path.$info['code'].'-voucher-print.pdf') || 1)
				{
					Bus::call('contracts', 'generate_voucher_print', array('id'=>$info['id']));
				}
				
				$content = file_get_contents($path.$info['code'].'-voucher-print.pdf');
			}
			return $content;
		}
	}
?>