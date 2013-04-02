<?php /* Smarty version 2.6.18, created on 2009-02-25 21:18:58
         compiled from /home/qtravel/public_html/templates/default/busses_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/busses_edit.tpl', 4, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php if ($this->_tpl_vars['err']): ?>
	<div class="error">
		<h2><?php echo smarty_function_tr(array('key' => 'busses_edit_errors'), $this);?>
</h2>
		<b><?php echo $this->_tpl_vars['err']; ?>
</b>
	</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = { 
				beforeSubmit:  bussesSaveRequest,
				success:	   bussesSaveResponse,
				dataType: 	   \'json\'
		 	}; 
		 	
			$(\'#busses\').ajaxForm(options); 
			
			$(\'#busses_title\').keyup(function(event){
			    code (\'busses_title\', \'busses_code\');
			});
		});
	function bussesSaveRequest(formData, jqForm, options) { 
		return true; 
	}
	function bussesSaveResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		if (succes == false)
		{
			alert(message);
			$("#"+responseText.field).focus();
		} 
		else
		{
			location.href=responseText.url;
		}
	}
	function changeStartCountry()
	{
		var country_id = $(\'#busses_start_country_id\').val();
		var url = "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
			country_id : country_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#busses_start_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#busses_start_region_id").append(option);
					}			
				}
				else
				{
					$(\'#busses_start_region_id\').html("");
				}
			}
			else
			{
			}
		 }, "json");
	}
	function changeStartContinent()
	{
		var continent_id = $(\'#busses_start_continent_id\').val();
		var url = "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#busses_start_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#busses_start_country_id").append(option);
					}
					
				}
				else
				{
					
				}
				changeStartCountry();
			}
			else
			{
			}
		 }, "json");
	}
	function changeEndCountry()
	{
		var country_id = $(\'#busses_end_country_id\').val();
		var url = "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
			country_id : country_id				
		};
		
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#busses_end_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#busses_end_region_id").append(option);
					}			
				}
				else
				{
					$(\'#busses_end_region_id\').html("");
				}
			}
			else
			{				
			}
		 }, "json");
	}
	
	function changeEndContinent()
	{
		var continent_id = $(\'#busses_end_continent_id\').val();
		var url = "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#busses_end_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#busses_end_country_id").append(option);
					}
					
				}
				else
				{
					
				}
				changeEndCountry();
			}
			else
			{				
			}
		 }, "json");
	}
	
'; ?>
	
</script>
<iframe id="frame" name="frame" src="" style="width:1px;height:1px;border:0"></iframe>