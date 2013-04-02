<?php /* Smarty version 2.6.18, created on 2013-03-03 12:16:24
         compiled from D:/wamp/www/qtravel/public_html/templates/default/pages_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', 'D:/wamp/www/qtravel/public_html/templates/default/pages_edit.tpl', 78, false),array('function', 'url', 'D:/wamp/www/qtravel/public_html/templates/default/pages_edit.tpl', 80, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<div class="form">
	<?php echo $this->_tpl_vars['form_header']; ?>

	<?php echo $this->_tpl_vars['form_footer']; ?>

	<br/>
	<?php echo $this->_tpl_vars['form_content']; ?>

	<?php echo $this->_tpl_vars['form_footer']; ?>

</div>
</form>
<script type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = { 
				beforeSubmit:  showRequest,
				success:	   showResponse,
				dataType: 	   \'json\'
		 	}; 
			$(\'#pages\').ajaxForm(options); 
		});
	function uploadComplete(response){
		alert(response.message);
		if (!response.error && response.grid.length > 0){
			$("#div_grid_pics_container").html(response.grid)
		}
		$("#frame").html(\'\');
	}
	function showRequest(formData, jqForm, options) { 
		return true; 
	} 
 
	function showResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		var newpage = responseText.newpage;
		if (succes == false)
		{
			alert(message);
			$("#"+responseText.field).focus();
		}
		else
		{
			if (newpage)
			{
				alert(message);
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
<iframe id="frame" name="frame" src="" style="width:1px;height:1px;border:0"></iframe>
<div class="form" style="width:100%">
<h2><?php echo smarty_function_tr(array('key' => 'pics_header_pics'), $this);?>
</h2>
<?php if ($this->_tpl_vars['id'] > 0): ?> 
	<form name="form" action="<?php echo smarty_function_url(array('o' => 'pages','m' => 'upload_pic','id' => $this->_tpl_vars['id']), $this);?>
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
<?php endif; ?>
<br/>
<div id="div_grid_pics_container"><?php echo $this->_tpl_vars['grid_pics']; ?>
</div>
<br/>
</div>

