<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  countriesSaveRequest,
				success:	   countriesSaveResponse,
				dataType:	   'json'
			}; 
			$('#countries').ajaxForm(options);
			
			$('#countries_title').keyup(function(event){
			    code ('countries_title', 'countries_code');
			});
		});

	function countriesSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function countriesSaveResponse(responseText, statusText)  { 
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