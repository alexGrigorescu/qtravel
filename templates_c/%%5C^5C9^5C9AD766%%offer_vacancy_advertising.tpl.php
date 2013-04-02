<?php /* Smarty version 2.6.18, created on 2012-11-18 22:50:48
         compiled from /home/qtravel/public_html/templates/default/offer_vacancy_advertising.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/offer_vacancy_advertising.tpl', 45, false),array('function', 'url', '/home/qtravel/public_html/templates/default/offer_vacancy_advertising.tpl', 47, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '


	
	
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


	
	<div class="form" style="width:100%">
		<h2><?php echo smarty_function_tr(array('key' => 'pics_header_pics'), $this);?>
</h2>
		<div class="one-upload">
			<form name="form" action="<?php echo smarty_function_url(array('o' => 'offer_vacancy','m' => 'upload_pic'), $this);?>
" method="POST" enctype="multipart/form-data">
				<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
				<table class="row" cellpadding="2" cellspacing="0">
				<tr>
					<td class="label" colspan="2"><?php echo smarty_function_tr(array('key' => 'pics_label_upload_file'), $this);?>
</td>
					<td class="element"><?php echo $this->_tpl_vars['form_pics_pic']; ?>
<input type="submit" id="pics_upload_save" value="Adauga reclama" class="button_save"></td>
					<td class="help"></td>
				</tr>
				</table>
			</form>
		</div>
		<br/>
		<div id="div_grid_pics_container"><?php echo $this->_tpl_vars['grid_pics']; ?>
</div>
	</div>
