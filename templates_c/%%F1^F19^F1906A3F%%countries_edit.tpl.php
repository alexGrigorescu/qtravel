<?php /* Smarty version 2.6.18, created on 2008-10-02 10:28:24
         compiled from /home/qtravel/public_html/templates/default/countries_edit.tpl */ ?>
<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script	type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  countriesSaveRequest,
				success:	   countriesSaveResponse,
				dataType:	   \'json\'
			}; 
			$(\'#countries\').ajaxForm(options);
			
			$(\'#countries_title\').keyup(function(event){
			    code (\'countries_title\', \'countries_code\');
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
'; ?>
	
</script>