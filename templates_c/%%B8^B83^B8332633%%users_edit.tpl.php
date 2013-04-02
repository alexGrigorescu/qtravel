<?php /* Smarty version 2.6.18, created on 2008-09-23 20:51:55
         compiled from /home/qtravel/public_html/templates/default/users_edit.tpl */ ?>
<?php echo $this->_tpl_vars['form_img']; ?>

<script type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = { 
		        beforeSubmit:  showRequest,
		        success:       showResponse,
		        dataType: 	   \'json\'
		 	}; 
	        $(\'#users\').ajaxForm(options);
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
'; ?>