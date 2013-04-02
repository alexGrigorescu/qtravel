<?php /* Smarty version 2.6.18, created on 2012-06-06 03:26:25
         compiled from /home/qtravel/public_html/templates/default/accommodations_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', '/home/qtravel/public_html/templates/default/accommodations_edit.tpl', 268, false),array('function', 'url', '/home/qtravel/public_html/templates/default/accommodations_edit.tpl', 269, false),)), $this); ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  accommodationsSaveRequest,
				success:	   accommodationsSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#accommodations\').ajaxForm(options);
			
			var options = {	
				beforeSubmit:  pricesSaveRequest,
				success:	   pricesSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#prices\').ajaxForm(options);
			
			$(\'#accommodations_title\').keyup(function(event){
			    code (\'accommodations_title\', \'accommodations_code\');
			});
			
			$.datepicker.regional[\'ro\'] = {clearText: \'Curat\', clearStatus: \'Sterge data curenta\',
				closeText: \'Inchide\', closeStatus: \'Inchide fara schimbare\',
				prevText: \'&#x3c;Anterior\', prevStatus: \'Arata luna trecuta\',
				nextText: \'Urmator&#x3e;\', nextStatus: \'Arata luna urmatoare\',
				currentText: \'Azi\', currentStatus: \'Arata luna curenta\',
				monthNames: [\'Ianuarie\',\'Februarie\',\'Martie\',\'Aprilie\',\'Mai\',\'Junie\',
				\'Julie\',\'August\',\'Septembrie\',\'Octobrie\',\'Noiembrie\',\'Decembrie\'],
				monthNamesShort: [\'Ian\', \'Feb\', \'Mar\', \'Apr\', \'Mai\', \'Jun\',
				\'Jul\', \'Aug\', \'Sep\', \'Oct\', \'Noi\', \'Dec\'],
				monthStatus: \'Arata o luna diferita\', yearStatus: \'Arat un an diferit\',
				weekHeader: \'Sapt\', weekStatus: \'Saptamana anului\',
				dayNames: [\'Duminica\', \'Luni\', \'Marti\', \'Miercuri\', \'Joi\', \'Vineri\', \'Sambata\'],
				dayNamesShort: [\'Dum\', \'Lun\', \'Mar\', \'Mie\', \'Joi\', \'Vin\', \'Sam\'],
				dayNamesMin: [\'Du\',\'Lu\',\'Ma\',\'Mi\',\'Jo\',\'Vi\',\'Sa\'],
				dayStatus: \'Seteaza DD ca prima saptamana zi\', dateStatus: \'Selecteaza D, M d\',
				dateFormat: \'dd/mm/yy\', firstDay: 0, 
				initStatus: \'Selecteaza o data\', isRTL: false};
			$.datepicker.setDefaults($.datepicker.regional[\'ro\']);
			
			$.datepicker.setDefaults({showOn: \'button\', buttonImageOnly: true, buttonImage: \''; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo 'calendar.gif\', buttonText: \'Calendar\'});
			
			$(\'#accommodations_date_start\').datepicker({defaultDate: +7, beforeShow: customRangeAccommodation});
			$(\'#accommodations_date_end\').datepicker({defaultDate: +7, beforeShow: customRangeAccommodation});
			
			$(\'#prices_date_start\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			$(\'#prices_date_end\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
		});
		
	function customRangePrice(input) {
		return {minDate: (input.id == \'prices_date_end\' ? $(\'#prices_date_start\').datepicker(\'getDate\') : null), 
	        maxDate: (input.id == \'prices_date_start\' ? $(\'#prices_date_end\').datepicker(\'getDate\') : null)}; 
	} 	
		
	function customRangeAccommodation(input) {
		return {minDate: (input.id == \'accommodations_date_end\' ? $(\'#accommodations_date_start\').datepicker(\'getDate\') : null), 
	        maxDate: (input.id == \'accommodations_date_start\' ? $(\'#accommodations_date_end\').datepicker(\'getDate\') : null)}; 
	}
	
	function accommodationsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function accommodationsSaveResponse(responseText, statusText)  { 
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
	
	function pricesSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function pricesSaveResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		var newlocation = responseText.newlocation;
		if (succes == false)
		{
			$("#"+responseText.field).focus();
		}
		else
		{
			var grid = responseText.grid;
			$("#div_grid_prices_container").html(grid);
			$.datepicker.setDefaults({showOn: \'button\', buttonImageOnly: true, buttonImage: \''; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo 'calendar.gif\', buttonText: \'Calendar\'});
			$(\'#prices_date_start\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			$(\'#prices_date_end\').datepicker({defaultDate: +7, beforeShow: customRangePrice});		
		}
	}
	
	function priceDelete(price_id, accommodation_id)
	{
		var url = "'; ?>
<?php echo $this->_tpl_vars['delete_price_url']; ?>
<?php echo '";
		var vData = {
				price_id : price_id,				
				accommodation_id : accommodation_id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_prices_container").html(grid);
				$.datepicker.setDefaults({showOn: \'button\', buttonImageOnly: true, buttonImage: \''; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo 'calendar.gif\', buttonText: \'Calendar\'});
				$(\'#prices_date_start\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
				$(\'#prices_date_end\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
	
	function pricesDelete(accommodation_id)
	{
		var url = "'; ?>
<?php echo $this->_tpl_vars['delete_prices_url']; ?>
<?php echo '";
		var vData = {
				accommodation_id : accommodation_id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_prices_container").html(grid);
				$.datepicker.setDefaults({showOn: \'button\', buttonImageOnly: true, buttonImage: \''; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo 'calendar.gif\', buttonText: \'Calendar\'});
				$(\'#prices_date_start\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
				$(\'#prices_date_end\').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $(\'#accommodations_continent_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_continent_url']; ?>
<?php echo '";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#accommodations_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#accommodations_country_id").append(\'<option value="\'+country_id+\'">\'+data.countries[country_id]+\'</option>\');
					if (data.count == 0){
						break;					
					}				
				}					
				changeCountry();
			}			
		 }, "json");
	}
	
	function changeCountry()
	{
		var country_id = $(\'#accommodations_country_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_country_url']; ?>
<?php echo '";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#accommodations_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#accommodations_region_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');
					if (data.count == 0){
						break;					
					}
				}
				changeRegion();			
			}			
		 }, "json");
	}
	
	function changeRegion()
	{
		var region_id = $(\'#accommodations_region_id\').val();
		var url	= "'; ?>
<?php echo $this->_tpl_vars['change_region_url']; ?>
<?php echo '";
		var vData = {
				region_id : region_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#accommodations_location_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#accommodations_location_id").append(\'<option value="\'+region_id+\'">\'+data.regions[region_id]+\'</option>\');
					if (data.count == 0){
						break;					
					}
				}			
			}			
		 }, "json");
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
	<br/><br/>
	<div class="form">
		<form action="<?php echo @INDEX; ?>
" method="post" name="prices" id="prices">
			<?php echo $this->_tpl_vars['hidden_fields_prices']; ?>

			<div id="div_grid_prices_container"><?php echo $this->_tpl_vars['grid_prices']; ?>
</div>
		</form>
	</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['id'] > 0): ?>
	<iframe	id="frame" name="frame"	src="" style="width:1px;height:1px;border:0"></iframe>
	<div class="form" style="width:100%">
		<h2><?php echo smarty_function_tr(array('key' => 'pics_header_pics'), $this);?>
</h2>
		<form name="form" action="<?php echo smarty_function_url(array('o' => 'accommodations','m' => 'upload_pic','id' => $this->_tpl_vars['id']), $this);?>
" method="POST" enctype="multipart/form-data" target="frame">
			<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
			<table class="row" cellpadding="2" cellspacing="0">
			<tr>
				<td class="label" colspan="2"><?php echo smarty_function_tr(array('key' => 'pics_label_upload_file'), $this);?>
</td>
				<td class="element">
				<?php echo $this->_tpl_vars['form_pics_pic']; ?>

				<select id="pics_type_pic" name="pics_type_pic">
				<option value="21">Noapte</option>
				<option value="22">7 Nopti</option>
				</select>
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