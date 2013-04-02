<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  vacationsSaveRequest,
				success:	   vacationsSaveResponse,
				dataType:	   'json'
			}; 
			$('#vacations').ajaxForm(options);
			
			var options = {	
				beforeSubmit:  pricesSaveRequest,
				success:	   pricesSaveResponse,
				dataType:	   'json'
			}; 
			$('#prices').ajaxForm(options);
			
			$('#vacations_title').keyup(function(event){
			    code ('vacations_title', 'vacations_code');
			});
			
			$.datepicker.regional['ro'] = {clearText: 'Curat', clearStatus: 'Sterge data curenta',
				closeText: 'Inchide', closeStatus: 'Inchide fara schimbare',
				prevText: '&#x3c;Anterior', prevStatus: 'Arata luna trecuta',
				nextText: 'Urmator&#x3e;', nextStatus: 'Arata luna urmatoare',
				currentText: 'Azi', currentStatus: 'Arata luna curenta',
				monthNames: ['Ianuarie','Februarie','Martie','Aprilie','Mai','Junie',
				'Julie','August','Septembrie','Octobrie','Noiembrie','Decembrie'],
				monthNamesShort: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun',
				'Jul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
				monthStatus: 'Arata o luna diferita', yearStatus: 'Arat un an diferit',
				weekHeader: 'Sapt', weekStatus: 'Saptamana anului',
				dayNames: ['Duminica', 'Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata'],
				dayNamesShort: ['Dum', 'Lun', 'Mar', 'Mie', 'Joi', 'Vin', 'Sam'],
				dayNamesMin: ['Du','Lu','Ma','Mi','Jo','Vi','Sa'],
				dayStatus: 'Seteaza DD ca prima saptamana zi', dateStatus: 'Selecteaza D, M d',
				dateFormat: 'dd/mm/yy', firstDay: 0, 
				initStatus: 'Selecteaza o data', isRTL: false};
			$.datepicker.setDefaults($.datepicker.regional['ro']);
			
			$.datepicker.setDefaults({showOn: 'button', buttonImageOnly: true, buttonImage: '{/literal}{$img_path}{literal}calendar.gif', buttonText: 'Calendar'});
			
			$('#vacations_date_start').datepicker({defaultDate: +7, beforeShow: customRangeVacation});
			$('#vacations_date_end').datepicker({defaultDate: +7, beforeShow: customRangeVacation});
			
			$('#prices_date_start').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			$('#prices_date_end').datepicker({defaultDate: +7, beforeShow: customRangePrice});
		});
	
	function customRangePrice(input) {
		return {minDate: (input.id == 'prices_date_end' ? $('#prices_date_start').datepicker('getDate') : null), 
	        maxDate: (input.id == 'prices_date_start' ? $('#prices_date_end').datepicker('getDate') : null)}; 
	} 	
		
	function customRangeVacation(input) {
		return {minDate: (input.id == 'vacations_date_end' ? $('#vacations_date_start').datepicker('getDate') : null), 
	        maxDate: (input.id == 'vacations_date_start' ? $('#vacations_date_end').datepicker('getDate') : null)}; 
	} 	
		
	function vacationsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function vacationsSaveResponse(responseText, statusText)  { 
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
			$.datepicker.setDefaults({showOn: 'button', buttonImageOnly: true, buttonImage: '{/literal}{$img_path}{literal}calendar.gif', buttonText: 'Calendar'});
			$('#prices_date_start').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			$('#prices_date_end').datepicker({defaultDate: +7, beforeShow: customRangePrice});
		}
	}
	
	function priceDelete(price_id, vacation_id)
	{
		var url = "{/literal}{$delete_price_url}{literal}";
		var vData = {
				price_id : price_id,				
				vacation_id : vacation_id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_prices_container").html(grid);
				$.datepicker.setDefaults({showOn: 'button', buttonImageOnly: true, buttonImage: '{/literal}{$img_path}{literal}calendar.gif', buttonText: 'Calendar'});
				$('#prices_date_start').datepicker({defaultDate: +7, beforeShow: customRangePrice});
				$('#prices_date_end').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
	
	function pricesDelete(vacation_id)
	{
		var url = "{/literal}{$delete_prices_url}{literal}";
		var vData = {
				vacation_id : vacation_id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_prices_container").html(grid);
				$.datepicker.setDefaults({showOn: 'button', buttonImageOnly: true, buttonImage: '{/literal}{$img_path}{literal}calendar.gif', buttonText: 'Calendar'});
				$('#prices_date_start').datepicker({defaultDate: +7, beforeShow: customRangePrice});
				$('#prices_date_end').datepicker({defaultDate: +7, beforeShow: customRangePrice});
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $('#vacations_continent_id').val();
		var url	= "{/literal}{$change_continent_url}{literal}";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#vacations_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					$("#vacations_country_id").append('<option value="'+country_id+'">'+data.countries[country_id]+'</option>');
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
		var country_id = $('#vacations_country_id').val();
		var url	= "{/literal}{$change_country_url}{literal}";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#vacations_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#vacations_region_id").append('<option value="'+region_id+'">'+data.regions[region_id]+'</option>');
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
		var region_id = $('#vacations_region_id').val();
		var url	= "{/literal}{$change_region_url}{literal}";
		var vData = {
				region_id : region_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#vacations_location_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					$("#vacations_location_id").append('<option value="'+region_id+'">'+data.regions[region_id]+'</option>');
					if (data.count == 0){
						break;					
					}
				}			
			}			
		 }, "json");
	}
	
	function calculateDateEnd()
	{
		var nr_days = $('#prices_nr_days').val();
		var date_start = $('#prices_date_start').val();
		alert(nr_days);
	}
{/literal}	
</script>

{if $id	> 0}
	<br/><br/>
	<div class="form" style="width:100%">
		<form action="{$smarty.const.INDEX}" method="post" name="prices" id="prices">
			{$hidden_fields_prices}
			<!--<input id="prices_nr_days" value="7"/><a href="#" onClick="calculateDateEnd(); return false;">{tr key='prices_calculate_date_end'}</a>-->
			<div id="div_grid_prices_container">{$grid_prices}</div>
		</form>
	</div>
{/if}