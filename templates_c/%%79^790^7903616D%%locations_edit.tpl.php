<?php /* Smarty version 2.6.18, created on 2009-07-12 23:48:40
         compiled from /home/qtravel/public_html/templates/default/locations_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/locations_edit.tpl', 120, false),array('function', 'url', '/home/qtravel/public_html/templates/default/locations_edit.tpl', 122, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  locationsSaveRequest,
				success:	   locationsSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#locations\').ajaxForm(options);
			
			$(\'#locations_title\').keyup(function(event){
			    code (\'locations_title\', \'locations_code\');
			});
		});

	function locationsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function locationsSaveResponse(responseText, statusText)  { 
		var status = responseText.status;
		var message = responseText.message;
		var newlocation = responseText.newlocation;
		if (status == false)
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
	
	function changeCountry()
	{
		var country_id = $(\'#locations_country_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#locations_region_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');
				}			
			}			
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $(\'#locations_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#locations_country_id").append(\'<option value="\'+country_id+\'">\'+data.countries[country_id]+\'</option>\');
				}					
				changeCountry();
			}			
		 }, "json");
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
		<div class="one-upload">
			<form name="form" action="<?php echo smarty_function_url(array('o' => 'locations','m' => 'upload_pic','id' => $this->_tpl_vars['id']), $this);?>
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
		</div>
		<div class="multi-upload">
			<iframe	id="multi-upload-frame" name="multi-upload-frame" src="<?php echo $this->_tpl_vars['upload_bulk_edit_url']; ?>
" style="width:290px;height:290px;border:0"></iframe>
		</div>
		<br/>
		<div id="div_grid_pics_container"><?php echo $this->_tpl_vars['grid_pics']; ?>
</div>
	</div>
<?php endif; ?>