<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
<div class="form">
	{$form_header}
	{$form_footer}
	<br/>
	{$form_content}
	{$form_footer}
</div>
</form>
<script type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = { 
				beforeSubmit:  showRequest,
				success:	   showResponse,
				dataType: 	   'json'
		 	}; 
			$('#pages').ajaxForm(options); 
		});
	function uploadComplete(response){
		alert(response.message);
		if (!response.error && response.grid.length > 0){
			$("#div_grid_pics_container").html(response.grid)
		}
		$("#frame").html('');
	}
	function showRequest(formData, jqForm, options) { 
		return true; 
	} 
 
	function showResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		var newpage = responseText.newpage;
		if (succes == false)
		{
			alert(message);
			$("#"+responseText.field).focus();
		}
		else
		{
			if (newpage)
			{
				alert(message);
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
	function picsDelete(id_pic, id)
	{
		var url = "{/literal}{$delete_pic_url}{literal}";
		var vData = {
				id_pic : id_pic,				
				id : id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				var grid = data.grid;
				$("#div_grid_pics_container").html(grid);
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
{/literal}	
</script>
<iframe id="frame" name="frame" src="" style="width:1px;height:1px;border:0"></iframe>
<div class="form" style="width:100%">
<h2>{tr key='pics_header_pics'}</h2>
{if $id > 0} 
	<form name="form" action="{url o=pages m=upload_pic id=$id}" method="POST" enctype="multipart/form-data" target="frame">
		<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
		<table class="row" cellpadding="2" cellspacing="0">
		<tr>
			<td class="label" colspan="2">{tr key='pics_label_upload_file'}</td>
			<td class="element">{$form_pics_pic}<input type="submit" id="pics_upload_save" value="{tr key='pics_label_upload_save'}"></td>
			<td class="help"></td>
		</tr>
		</table>
	</form>
{/if}
<br/>
<div id="div_grid_pics_container">{$grid_pics}</div>
<br/>
</div>


