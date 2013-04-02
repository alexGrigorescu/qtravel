{$form_img}
<script type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = { 
		        beforeSubmit:  showRequest,
		        success:       showResponse,
		        dataType: 	   'json'
		 	}; 
	        $('#users').ajaxForm(options);
	    });
	    
	function showRequest(formData, jqForm, options) { 
	    return true; 
	} 
 
	function showResponse(responseText, statusText)  { 
	    var succes = responseText.succes;
		var message = responseText.message;
	    
		
	    if (!succes)
	    {
	    	alert(message);
	    	$("#"+responseText.field).focus();
	    }
	    else
	    {
	    	location.href=responseText.url;
	    }
	}
</script>
{/literal}