<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  continentsSaveRequest,
				success:	   continentsSaveResponse,
				dataType:	   'json'
			}; 
			$('#continents').ajaxForm(options);
			
			$('#continents_title').keyup(function(event){
			    code ('continents_title', 'continents_code');
			});
		});

	function continentsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function continentsSaveResponse(responseText, statusText)  { 
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
{/literal}	
</script>