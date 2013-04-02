<?php /* Smarty version 2.6.18, created on 2008-10-13 22:40:51
         compiled from /home/qtravel/public_html/templates/default/domains_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/domains_edit.tpl', 79, false),array('function', 'url', '/home/qtravel/public_html/templates/default/domains_edit.tpl', 80, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  domainsSaveRequest,
				success:	   domainsSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#domains\').ajaxForm(options);
			
			$(\'#domains_title\').keyup(function(event){
			    code (\'domains_title\', \'domains_code\');
			});
		});

	function domainsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function domainsSaveResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		var newlocation = responseText.newlocation;
		if (succes == false)
		{
			alert(message);
			$("#"+responseText.field).focus();
		}
		else
		{
			if (newlocation)
			{
				var url	= responseText.url;
				location.href = url;				
			}
			else
			{
				var url	= responseText.url;
				location.href = url;				
			}
		}
	}
	
	function uploadComplete(response){
		alert(response.message);
		if (!response.error && response.grid.length > 0){
			$("#div_grid_pics_container").html(response.grid)
		}
		$("#frame").html(\'\');
	}
	
	function picsDelete(id_pic, id)
	{
		var url = "'; ?>
<?php echo $this->_tpl_vars['delete_pic_url']; ?>
<?php echo '";
		var vData = {
				id_pic : id_pic,				
				id : id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_pics_container").html(grid);
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
'; ?>
	
</script>
<?php if ($this->_tpl_vars['id'] > 0): ?>
	<iframe	id="frame" name="frame"	src="" style="width:1px;height:1px;border:0"></iframe>
	<div class="form" style="width:100%">
		<h2><?php echo smarty_function_tr(array('key' => 'pics_header_pics'), $this);?>
</h2>
		<form name="form" action="<?php echo smarty_function_url(array('o' => 'domains','m' => 'upload_pic','id' => $this->_tpl_vars['id']), $this);?>
" method="POST" enctype="multipart/form-data" target="frame">
			<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
			<table class="row" cellpadding="2" cellspacing="0">
			<tr>
				<td class="label" colspan="2"><?php echo smarty_function_tr(array('key' => 'pics_label_upload_file'), $this);?>
</td>
				<td class="element"><?php echo $this->_tpl_vars['form_pics_pic']; ?>
<input type="submit" id="pics_upload_save" value="<?php echo smarty_function_tr(array('key' => 'pics_label_upload_save'), $this);?>
"></td>
				<td class="help"></td>
			</tr>
			</table>
		</form>
		<br/>
		<div id="div_grid_pics_container"><?php echo $this->_tpl_vars['grid_pics']; ?>
</div>
	</div>
<?php endif; ?>