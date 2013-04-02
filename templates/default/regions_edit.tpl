<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  regionsSaveRequest,
				success:	   regionsSaveResponse,
				dataType:	   'json'
			}; 
			$('#regions').ajaxForm(options);
			
			$('#regions_title').keyup(function(event){
			    code ('regions_title', 'regions_code');
			});
		});

	function regionsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function regionsSaveResponse(responseText, statusText)  { 
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
	
	function changeContinent()
	{
		var continent_id = $('#regions_continent_id').val();
		var url	= "{/literal}{$change_continent_url}{literal}";
		var vData = {
				continent_id : continent_id				
			};
		$.post(url, vData, function(data){
			if(!data.error){
				$("#regions_country_id").html("");
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
					$("#regions_country_id").append(option);
					if (data.count == 0){
						break;					
					}				
				}
			}			
		 }, "json");
	}
{/literal}	
</script>