<?php /* Smarty version 2.6.18, created on 2009-02-25 21:15:27
         compiled from /home/qtravel/public_html/templates/default/continents_edit.tpl */ ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  continentsSaveRequest,
				success:	   continentsSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#continents\').ajaxForm(options);
			
			$(\'#continents_title\').keyup(function(event){
			    code (\'continents_title\', \'continents_code\');
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
'; ?>
	
</script>