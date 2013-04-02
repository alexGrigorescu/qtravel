<?php /* Smarty version 2.6.18, created on 2013-03-03 11:30:33
         compiled from D:/wamp/www/qtravel/public_html/templates/default/contracts_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tr', 'D:/wamp/www/qtravel/public_html/templates/default/contracts_edit.tpl', 3, false),array('function', 'url', 'D:/wamp/www/qtravel/public_html/templates/default/contracts_edit.tpl', 57, false),)), $this); ?>
<?php if ($this->_tpl_vars['err']): ?>
	<div class="error">
		<h2><?php echo smarty_function_tr(array('key' => 'contracts_edit_errors'), $this);?>
</h2>
		<b><?php echo $this->_tpl_vars['err']; ?>
</b>
	</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['form']; ?>

<div>&nbsp;</div>
<script type='text/javascript' src='/javascript/jquery/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="/javascript/jquery/jquery.autocomplete.css" />
<script type="text/javascript">
<?php echo '
	$(document).ready(function() { 
			var options = { 
				beforeSubmit:  contractsSaveRequest,
				success:	   contractsSaveResponse,
				dataType: 	   \'json\'
		 	}; 
		 	
			$(\'#contracts\').ajaxForm(options); 

			$("#contracts_name").autocomplete(
				"contracts_name_autocomplete.php",
				{
					delay:10,
					minChars:2,
					matchSubset:1,
					matchContains:1,
					cacheLength:10,
					onItemSelect:selectItem,
					onFindValue:findValue,
					formatItem:formatItem,
					autoFill:true
				}
			);

		});
	function contractsSaveRequest(formData, jqForm, options) { 
		return true; 
	}
	function contractsSaveResponse(responseText, statusText)  { 
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
	
	function findValue(li) {
		var id = li.extra[0];
		var url = "'; ?>
<?php echo smarty_function_url(array('o' => 'contracts','m' => 'name_autocomplete_data'), $this);?>
<?php echo '";
		var vData = {
			id : id				
		};
		$.post(url, vData, function(data){
			$("#contracts_number").val(data.number);
			$("#contracts_date").val(data.date);
			$("#contracts_address").val(data.address);
			$("#contracts_phone").val(data.phone);
			$("#contracts_document_sn").val(data.document_sn);
			$("#contracts_document_nr").val(data.document_nr);
			$("#contracts_document_po").val(data.document_po);
			$("#contracts_price").val(data.price);
			$("#contracts_advance").val(data.advance);
			$("#contracts_date_price").val(data.date_price);
			$("#contracts_user_phone").val(data.user_phone);
		 }, "json");
	}

	function selectItem(li) {
		findValue(li);
	}

	function formatItem(row) {
		return row[0] + " (id: " + row[1] + ")";
	}

	function lookupAjax(){
		var oSuggest = $("#contracts_name")[0].autocompleter;
		oSuggest.findValue();
		return false;
	}
'; ?>
	
</script>
<iframe id="frame" name="frame" src="" style="width:1px;height:1px;border:0"></iframe>