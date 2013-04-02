<?php
/**
 * raport_excel.php
 * Generates an XLS file about the group and its exposures.
 * @package SFA 
 */
if (isset($_GET['dosarid']))
{
	include('./functions.php');
	//include('./calculare_expunere.php');

	//get company_id from dosar_id for group calculations
	$sql = 'SELECT customer_id FROM af_dosar_analiza WHERE id=?';
	$company_id = $db->GetOne($sql,array($_GET['dosarid']));

	if ($company_id > 0)
	{
		//calculate tree
		$tree = calculate_expunere_client_888($company_id);
		print_p($tree);
		/**
		 * Routine to save files and information about the files
		 * @todo security should be introduced here!
		 * may be restructured, requirements from this part
		 *  - to save every report
		 *  - to know wich one is the last one 
		 *  - to handle separate files for Analiza and BNR, difference for them is to include or not parteners
		 *  - to have the full list for every dosar
		 */
		$cui_cnp = $tree['cui_cnp'];
		$filedate = date('Y.m.d.H.i.s');
		$filename =  $cui_cnp.'-'.$filedate.'.xls';
		$filepath = "Rapoarte/".$filename;
		if(isset($_GET['tip'])){
			if($_GET['tip']=='analist'){
				$title = "Analysis Group Report ".$cui_cnp.'.'.$filedate;
				$analist_report=" WHERE Relation_Type!=3";
			}else{
					$title = "BNR Group Report".$cui_cnp.'.'.$filedate;}
					$analist_report='';
			}
									
			$select_reports_record = "SELECT * FROM reports_analiza_bnr WHERE dosar_id=".$_GET['dosarid'];
			
			$record=$db->GetRow($select_reports_record);
			if(!$record['dosar_id']){
				$query = "INSERT INTO reports_analiza_bnr (dosar_id,";
				if(isset($_GET['tip']))if($_GET['tip']=='analist'){
					$query.="file_name_analiza,generated_analiza";
				}else{
					$query.="file_name_bnr,generated_bnr";
				}
				$query .= ') VALUES ('.$_GET['dosarid'].',"'.$filename."\",getdate())";
			}else{
				$query = "UPDATE reports_analiza_bnr SET ";
				if(isset($_GET['tip']))if($_GET['tip']=='analist'){
					$query.="file_name_analiza='".$filename."',generated_analiza=getdate()";
				}else{
					$query.="file_name_bnr='".$filename."',generated_bnr=getdate()";
				}
				$query.=" WHERE dosar_id=".$_GET['dosarid']."";
			}
			$db->execute($query);
			/************************ Ends file handling here *****************************/

			/**
			 * @todo some test should be made here to enter here the corect time if neccesary or to delete this line
			 */
			set_time_limit(10);

			require_once "excel/class.writeexcel_workbook.inc.php";
			require_once "excel/class.writeexcel_worksheet.inc.php";

			$workbook = &new writeexcel_workbook($filepath);
			$worksheet = &$workbook->addworksheet();

			$worksheet->set_column(0, 0, 30);
			$worksheet->set_column(1, 1, 20);
			$worksheet->set_column(2, 2, 4);
			$worksheet->set_column(3, 8, 13);


			$header =& $workbook->addformat();
			$header->set_bold();
			$header->set_size(10);
			$header->set_color('black');
			$header->set_border_color('black');
			$header->set_top(1);
			$header->set_bottom(1);
			$header->set_left(1);
			$header->set_right(1);

			$Member_CUICNP_format =& $workbook->addformat();
			$Member_CUICNP_format->set_size(10);
			$Member_CUICNP_format->set_color('black');
			$Member_CUICNP_format->set_border_color('black');
			$Member_CUICNP_format->set_top(1);
			$Member_CUICNP_format->set_bottom(1);
			$Member_CUICNP_format->set_left(1);
			$Member_CUICNP_format->set_right(1);
			$Member_CUICNP_format->set_num_format("#################");
			$Member_CUICNP_format->set_align('center');
			$Member_CUICNP_format->set_align('vcenter');

			$j=0;
			$i=0;

			$title_format =& $workbook->addformat();
			$title_format->set_bold();
			$title_format->set_size(18);
			$title_format->set_color('black');

			//$worksheet->insert_bitmap('A1', 'sigla_MA.bmp', 5, 5);
			$worksheet->write($j, 1,  $title ,$title_format );

			$bordered =& $workbook->addformat();
			$bordered->set_size(10);
			$bordered->set_color('black');
			$bordered->set_border_color('black');
			$bordered->set_top(1);
			$bordered->set_bottom(1);
			$bordered->set_left(1);
			$bordered->set_right(1);
			
			$bordered_dosar_own =& $workbook->addformat();
			$bordered_dosar_own->set_size(10);
			$bordered_dosar_own->set_color('green');
			$bordered_dosar_own->set_border_color('green');
			$bordered_dosar_own->set_bg_color('white');
			$bordered_dosar_own->set_top(1);
			$bordered_dosar_own->set_bottom(1);
			$bordered_dosar_own->set_left(1);
			$bordered_dosar_own->set_right(1);

			$bordered_booked_contracts =& $workbook->addformat();
			$bordered_booked_contracts->set_size(10);
			$bordered_booked_contracts->set_color('blue');
			$bordered_booked_contracts->set_border_color('blue');
			$bordered_booked_contracts->set_bg_color('white');
			$bordered_booked_contracts->set_top(1);
			$bordered_booked_contracts->set_bottom(1);
			$bordered_booked_contracts->set_left(1);
			$bordered_booked_contracts->set_right(1);

			$bordered_redacted_contracts =& $workbook->addformat();
			$bordered_redacted_contracts->set_size(10);
			$bordered_redacted_contracts->set_color('orange');
			$bordered_redacted_contracts->set_border_color('orange');
			$bordered_redacted_contracts->set_bg_color('white');
			$bordered_redacted_contracts->set_top(1);
			$bordered_redacted_contracts->set_bottom(1);
			$bordered_redacted_contracts->set_left(1);
			$bordered_redacted_contracts->set_right(1);

			$bordered_dosar_girat =& $workbook->addformat();
			$bordered_dosar_girat->set_size(10);
			$bordered_dosar_girat->set_color('green');
			$bordered_dosar_girat->set_border_color('green');
			$bordered_dosar_girat->set_bg_color('white');
			$bordered_dosar_girat->set_top(1);
			$bordered_dosar_girat->set_bottom(1);
			$bordered_dosar_girat->set_left(1);
			$bordered_dosar_girat->set_right(1);

			$bordered_dosar_girat_old =& $workbook->addformat();
			$bordered_dosar_girat_old->set_size(10);
			$bordered_dosar_girat_old->set_color('red');
			$bordered_dosar_girat_old->set_border_color('red');
			$bordered_dosar_girat_old->set_bg_color('white');
			$bordered_dosar_girat_old->set_top(1);
			$bordered_dosar_girat_old->set_bottom(1);
			$bordered_dosar_girat_old->set_left(1);
			$bordered_dosar_girat_old->set_right(1);

			$merge1 =& $workbook->addformat();
			$merge1->set_bold();
			$merge1->set_size(10);
			$merge1->set_color('black');
			$merge1->set_border_color('black');
			$merge1->set_top(1);
			$merge1->set_bottom(1);
			$merge1->set_left(1);
			$merge1->set_merge();

			$merge2 =& $workbook->addformat();
			$merge2->set_bold();
			$merge2->set_size(10);
			$merge2->set_color('black');
			$merge2->set_border_color('black');
			$merge2->set_top(1);
			$merge2->set_bottom(1);
			$merge2->set_merge();

			$merge3 =& $workbook->addformat();
			$merge3->set_bold();
			$merge3->set_size(10);
			$merge3->set_color('black');
			$merge3->set_border_color('black');
			$merge3->set_top(1);
			$merge3->set_bottom(1);
			$merge3->set_right(1);
			$merge3->set_merge();

			$merge4 =& $workbook->addformat();
			$merge4->set_bold();
			$merge4->set_size(10);
			$merge4->set_color('black');
			$merge4->set_border_color('black');
			$merge4->set_top(1);
			$merge4->set_bottom(1);
			$merge4->set_left(1);
			$merge4->set_align('left');

			//insert header
			
			$j+=1;
			$i = 3;
			$worksheet->write($j, $i++, 'Group Exposure Report '.$tree['cui_cnp'].'.'.date('d/m/Y.H:i:s'), $header );

			
			$j+=3;
			$i=0;
			$worksheet->write($j, $i++, 'Client name', $header );
			$worksheet->write($j, $i++, 'Position in the group', $header );
			$worksheet->write($j, $i++, 'CUI/CNP', $header );
			$worksheet->write($j, $i++, 'TIP', $header );
			$worksheet->write($j, $i++, 'Approval date', $header );
			$worksheet->write($j, $i++, 'DOSAR ID', $header);
			$worksheet->write($j, $i++, 'Approved amount', $header);
			$worksheet->write($j, $i++, 'Approval status', $header);
			$worksheet->write($j, $i++, 'Contract no', $header);
			$worksheet->write($j, $i++, 'Contract date', $header);
			$worksheet->write($j, $i++, 'Contracted amount', $header);
			$worksheet->write($j, $i++, 'Contract status', $header);
			$worksheet->write($j, $i++, 'Contract type', $header);
			$worksheet->write($j, $i++, 'Net Investment', $header);


			raport_excel_worksheet ($tree, $j, $worksheet, 0);
			
			$j++;
			
			$i=0;
			$worksheet->write($j, $i++, "Owner exposure",$header);
			$Total_Exposure = calculate_expunere_client_888_total_tree($tree, false);
			$worksheet->write($j, $i++, '', $header);
			for ($ii = 0; $ii<11;$ii++){
				$worksheet->write($j, $i++, '', $header);
			}
			$worksheet->write($j, $i++, ($Total_Exposure), $header);
			
			$j++;
			
			$i=0;
			$worksheet->write($j, $i++, "Group exposure",$header);
			$Total_Exposure = calculate_expunere_client_888_total_tree($tree, true);
			$worksheet->write($j, $i++, '', $header);
			for ($ii = 0; $ii<11;$ii++){
				$worksheet->write($j, $i++, '', $header);
			}
			$worksheet->write($j, $i++, ($Total_Exposure), $header);
			
			

			$workbook->close();

			/**
			 * @todo the file name should not be variable here, should be taken from above, already introduced intro db, if changes a sec, the file will be inaccessible
			 */
			echo ('<a href="http://snmg:83/analiza/'.$filepath.'">For the generated raport click here</a>');
			//header("Content-Type: application/x-msexcel; name=\"".$filename."\"");
			//header("Content-Disposition: inline; filename=\"".$filename."\"");
			//$fh=fopen($filepath, "rw");
			//fpassthru($fh);
		}
	}
	
	function raport_excel_worksheet ($tree, &$j, &$worksheet, $shareholder = 0)
	{
		$has_header_firma = false;
		$has_header_group_members = false;
		if (isset($tree['expunere_dosar_own']) && is_array($tree['expunere_dosar_own']) && count($tree['expunere_dosar_own']) > 0){
			$has_header_firma = true;
			foreach ($tree['expunere_dosar_own'] as $dosar_index=>$dosar_info){
				$j++;
				raport_exel_add_dosar ($tree, $worksheet, $j, $shareholder, $dosar_info, 'bordered_dosar_own');
			}
		}

		if (isset($tree['expunere_booked_contracts']) && is_array($tree['expunere_booked_contracts']) && count($tree['expunere_booked_contracts']) > 0){
			$has_header_firma = true;
			foreach ($tree['expunere_booked_contracts'] as $dosar_index=>$dosar_info){
				$j++;
				raport_exel_add_dosar ($tree, $worksheet, $j, $shareholder, $dosar_info, 'bordered_booked_contracts');
			}
		}
			
		if (isset($tree['expunere_redacted_contracts']) && is_array($tree['expunere_redacted_contracts']) && count($tree['expunere_redacted_contracts']) > 0){
			$has_header_firma = true;
			foreach ($tree['expunere_redacted_contracts'] as $dosar_index=>$dosar_info){
				$j++;
				raport_exel_add_dosar ($tree, $worksheet, $j, $shareholder, $dosar_info, 'bordered_redacted_contracts');
			}
		}
		
		if (!$has_header_firma){
			$j++;
			$i=0;
			$worksheet->write($j, $i++, $tree['company_name'], $GLOBALS['header']);
			if ($shareholder === 1){
				$worksheet->write($j, $i++, 'shareholder', $GLOBALS['bordered']);
			} else {
				$worksheet->write($j, $i++, 'owner', $GLOBALS['bordered']);
			}
			$worksheet->write($j, $i++, $tree['cui_cnp'], $GLOBALS['Member_CUICNP_format']);
			$worksheet->write($j, $i++, $tree['org_type'], $GLOBALS['bordered']);
		}
		
		if (isset($tree['expunere_dosar_girat']) && is_array($tree['expunere_dosar_girat'])){
			if ($shareholder === 0){
				$j++;
				$i=0;
				$has_header_group_members = true;
				$worksheet->write($j, $i++, "Group members", $GLOBALS['header']);				
			}

			foreach ($tree['expunere_dosar_girat'] as $dosar_index=>$dosar_info){
				$j++;
				if (isset($dosar_info['old_garanted']) && $dosar_info['old_garanted'] > 0){
					$dosar_girat_header = $GLOBALS['bordered_dosar_girat_old'];
				} else {
					$dosar_girat_header = $GLOBALS['bordered_dosar_girat'];
				}
					
				$i=0;
				$worksheet->write($j, $i++, $dosar_info['guarantor'], $GLOBALS['bordered']);
				$worksheet->write($j, $i++, 'garantor', $GLOBALS['bordered']);
				$worksheet->write($j, $i++, $dosar_info['guarantor_cui_cnp'], $GLOBALS['Member_CUICNP_format']);
				$worksheet->write($j, $i++, $dosar_info['guarantor_type'], $GLOBALS['bordered']);
				
				if (strlen(trim($dosar_info['approval_date'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $GLOBALS['bordered_dosar_girat']);
				}
				else{
					$worksheet->write($j, $i++, $dosar_info['approval_date'], $dosar_girat_header);
				}
				
				if (strlen(trim($dosar_info['dosar_id'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['dosar_id'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['dosar_value'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['dosar_value'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['status_dosar'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['status_dosar'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['contract_id'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['contract_id'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['signature_date'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['signature_date'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['contract_value'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['contract_value'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['contract_status'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['contract_status'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['contracttype'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['contracttype'], $dosar_girat_header);
				}

				if (strlen(trim($dosar_info['NET_INVEST'])) == 0){
					$worksheet->write($j, $i++, 'n/a', $dosar_girat_header);
				} else {
					$worksheet->write($j, $i++, $dosar_info['NET_INVEST'], $dosar_girat_header);
				}
			}
		}
		else{
			
		}
		
		if ($shareholder === 0 && !$has_header_group_members){
			$j++;
			$i=0;
			$worksheet->write($j, $i++, "Group members", $GLOBALS['header']);				
		}
		if(isset($tree['expunere_shareholders']) && is_array($tree['expunere_shareholders']) && count($tree['expunere_shareholders']) > 0){
			foreach($tree['expunere_shareholders'] as $expunere_shareholder){	
				raport_excel_worksheet ($expunere_shareholder, $j, $worksheet, 1);
			}
		}
	}
	
	function raport_exel_add_dosar(&$tree, &$worksheet, &$j, $shareholder, $dosar_info, $header)
	{
		// add header company
		$i=0;
		
		if ($shareholder === 1){
			$worksheet->write($j, $i++, $tree['company_name'], $GLOBALS['bordered']);
			$worksheet->write($j, $i++, 'shareholder', $GLOBALS['bordered']);
		}
		else{
			$worksheet->write($j, $i++, $tree['company_name'], $GLOBALS['header']);
			$worksheet->write($j, $i++, 'owner', $GLOBALS['bordered']);
		}
		$worksheet->write($j, $i++, $tree['cui_cnp'], $GLOBALS['Member_CUICNP_format']);
		$worksheet->write($j, $i++, $tree['org_type'], $GLOBALS['bordered']);
		
		// add dosar info
		if (strlen(trim($dosar_info['approval_date'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['approval_date'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['dosar_id'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['dosar_id'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['dosar_value'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['dosar_value'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['status_dosar'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			if (strlen(trim($dosar_info['refusal_motive'])) == 0){
				$worksheet->write($j, $i++, $dosar_info['status_dosar'], $GLOBALS[$header]);
			}
			else{
				$worksheet->write($j, $i++, $dosar_info['status_dosar'].' - '.$dosar_info['refusal_motive'], $GLOBALS[$header]);
			}
		}
		
		if (strlen(trim($dosar_info['contract_id'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['contract_id'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['signature_date'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['signature_date'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['contract_value'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['contract_value'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['contract_status'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['contract_status'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['contracttype'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		
		else{
			$worksheet->write($j, $i++, $dosar_info['contracttype'], $GLOBALS[$header]);
		}
		
		if (strlen(trim($dosar_info['NET_INVEST'])) == 0){
			$worksheet->write($j, $i++, 'n/a', $GLOBALS[$header]);
		}
		else{
			$worksheet->write($j, $i++, $dosar_info['NET_INVEST'], $GLOBALS[$header]);
		}
	}
?>