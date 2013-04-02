<?php
/**
 * blacklist_upload.php
 * Upload XLS file to blacklist
 * @todo error message should be in dictionary
 * @package SFA 
 */
include('./functions.php');
require_once "excel/reader.php";
$err_msg = '';
$msg_blacklist = '';
$badchars = array('SRL','S.R.L.','S.R.L','.');
if(isset($_FILES) && isset($_FILES['upload']))
{
	
	$headers = array(1=>'name', 2=>'cui_cnp', 3=>'reason');
	$list = array();
	$data = new Spreadsheet_Excel_Reader();
	$data->setOutputEncoding('CP1251');
	$data->read($_FILES['upload']['tmp_name']);
	
	for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
		$list[$i]['type'] = 0;
		if (isset($data->sheets[0]['cells'][$i][1]) && strlen(trim($data->sheets[0]['cells'][$i][1])) > 0)
		{
			$list[$i]['name'] = $data->sheets[0]['cells'][$i][1];
		}
		else 
		{
			$err_msg .= '<span style="color:#000080;">Name undefined at row '.$i.'</span><br/>';
		}
		if (isset($data->sheets[0]['cells'][$i][2]) && strlen(trim($data->sheets[0]['cells'][$i][2])) > 0)
		{
			$list[$i]['cui_cnp'] = $data->sheets[0]['cells'][$i][2];
		}
		else 
		{
			$err_msg .= '<span style="color:#000080;">Cui/Cnp undefined at row '.$i.'</span><br/>';
		}
		if (isset($data->sheets[0]['cells'][$i][3])  && strlen(trim($data->sheets[0]['cells'][$i][3])) > 0)
		{
			$list[$i]['reason_code'] = $data->sheets[0]['cells'][$i][3];
		}
		else 
		{
			$err_msg .= '<span style="color:#000080;">Reason undefined at row '.$i.'</span><br/>';
		}
		$list[$i]['input_date'] = date('Y-m-d H:i:s');
		$list[$i]['row_number'] = $i;
	}
	
	foreach ($list as $k=>$v){
		if (check_blacklist($v['name'], $$v['cui_cnp'], 0)){
				$err_msg .= '<span style="color:#ff0000;">Already blacklisted name:`<b>'.$v['name'].'</b>` cui:`<b>'.$v['cui_cnp'].'`</b></span><br/>';
				continue;
			}
		
		if (isset($v['reason_code']))
		{
			$nmGeneral = new nmGeneral();
			$item = $nmGeneral->get_item_by_description(array('objectname'=>'blacklist_reason', 'description'=>$v['reason_code']));
			if (!isset($item['objectname']))
			{
				$err_msg .= '<span style="color:#ff0000;">Reason does not exists `<b>'.$v['reason_code'].'</b>` for company `<b>'.$v['name'].'</b>`</span><br/>';
				continue;
			}
			else 
			{
				$v['reason'] = $item['objectvalue'];
			}
		}
		
		$blacklist = new blacklist ();
		$blacklist->save_from($v);
		$err_msg .= '<span style="color:#008000;">Added to blacklist name:`<b>'.$v['name'].'</b>` cui:`<b>'.$v['cui_cnp'].'</b>`</span><br/>';
		$blacklist->insert_row();
	}
}
else 
{
	$err_msg .= 'Upload error';
}

if (strlen(trim($err_msg)) > 0)
{
	$_SESSION['msg'] = $err_msg;
}
else 
{
	$_SESSION['msg'] = 'Blacklist imported with success!';
}
redirect('blacklist_list.php');
?>