<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{if $err}
	<div class="error">
		<h2>{tr key='flights_edit_errors'}</h2>
		<b>{$err}</b>
	</div>
{/if}
{$form}
<div>&nbsp;</div>
<script type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = { 
				beforeSubmit:  flightsSaveRequest,
				success:	   flightsSaveResponse,
				dataType: 	   'json'
		 	}; 
		 	
			$('#flights').ajaxForm(options); 
			
			$('#flights_title').keyup(function(event){
			    code ('flights_title', 'flights_code');
			});
		});
	function flightsSaveRequest(formData, jqForm, options) { 
		return true; 
	}
	function flightsSaveResponse(responseText, statusText)  { 
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
		var country_id = $('#flights_start_country_id').val();
		var url = "{/literal}{$change_country_url}{literal}";
		var vData = {
			country_id : country_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#flights_start_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#flights_start_region_id").append(option);
					}			
				}
				else
				{
					$('#flights_start_region_id').html("");
				}
			}
			else
			{
			}
		 }, "json");
	}
	function changeStartContinent()
	{
		var continent_id = $('#flights_start_continent_id').val();
		var url = "{/literal}{$change_continent_url}{literal}";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#flights_start_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#flights_start_country_id").append(option);
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
		var country_id = $('#flights_end_country_id').val();
		var url = "{/literal}{$change_country_url}{literal}";
		var vData = {
			country_id : country_id				
		};
		
		$.post(url, vData, function(data){
			if(!data.error){
				if (data.count > 0)
				{
					$("#flights_end_region_id").html("");
					for (region_id in data.regions)
					{
						var option = document.createElement("OPTION");
						option.value = region_id;
						option.text = data.regions[region_id];
						$("#flights_end_region_id").append(option);
					}			
				}
				else
				{
					$('#flights_end_region_id').html("");
				}
			}
			else
			{				
			}
		 }, "json");
	}
	
	function changeEndContinent()
	{
		var continent_id = $('#flights_end_continent_id').val();
		var url = "{/literal}{$change_continent_url}{literal}";
		var vData = {
			continent_id : continent_id				
		};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#flights_end_country_id").html("");
				if (data.count > 0)
				{
					
					for (country_id in data.countries)
					{
						var option = document.createElement("OPTION");
						option.value = country_id;
						option.text = data.countries[country_id];
						$("#flights_end_country_id").append(option);
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
	
{/literal}	
</script>
<iframe id="frame" name="frame" src="" style="width:1px;height:1px;border:0"></iframe>