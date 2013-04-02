<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  circuitsSaveRequest,
				success:	   circuitsSaveResponse,
				dataType:	   'json'
			}; 
			$('#locations').ajaxForm(options); 
		});

	function circuitsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function circuitsSaveResponse(responseText, statusText)  { 
		var status = responseText.status;
		var message = responseText.message;
		var newlocation = responseText.newlocation;
		alert(message);
		
		if (status == false)
		{
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
		$("#frame").html('');
	}
	
	function changeCountry()
	{
		var country_id = $('#locations_country_id').val();
		var url	= "{/literal}{$change_country_url}{literal}";
		var vData = {
				country_id : country_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_region_id").html("");
				var selected = false;
				for (region_id in data.regions)
				{
					var option = document.createElement("OPTION");
					option.value = region_id;
					option.text = data.regions[region_id];
					if (region_id > 0 && !selected){
						option.selected = "selected";
						selected = true;
					}
					$("#locations_region_id").append(option);
					if (data.count == 0){
						break;					
					}
				}			
			}			
		 }, "json");
	}
	
	function changeContinent()
	{
		var continent_id = $('#locations_continent_id').val();
		var url	= "{/literal}{$change_continent_url}{literal}";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#locations_country_id").html("");
				var selected = false;
				for (country_id	in data.countries)
				{
					var option = document.createElement("OPTION");
					option.value = country_id;
					option.text = data.countries[country_id];
					if (country_id > 0 && !selected)
					{
						option.selected = "selected";
						selected = true;
					}
					$("#locations_country_id").append(option);
					if (data.count == 0){
						break;					
					}				
				}					
				changeCountry();
			}			
		 }, "json");
	}
	
{/literal}	
</script>

{if $id	> 0}
	<iframe	id="frame" name="frame"	src="" style="width:1px;height:1px;border:0"></iframe>
	<div class="form" style="width:100%">
		<h2>{tr	key='pics_header_pics'}</h2>
		<form name="form" action="{url o=locations m=upload_pic	id=$id}" method="POST" enctype="multipart/form-data" target="frame">
			<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
			<table class="row" cellpadding="2" cellspacing="0">
			<tr>
				<td class="label" colspan="2">{tr key='pics_label_upload_file'}</td>
				<td class="element">{$form_pics_pic}<input type="submit" id="pics_upload_save" value="{tr key='pics_label_upload_save'}"></td>
				<td class="help"></td>
			</tr>
			</table>
		</form>
		<br/>
		<div id="div_grid_pics_container">{$grid_pics}</div>
	</div>
{/if}
