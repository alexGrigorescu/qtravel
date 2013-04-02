<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  domainsSaveRequest,
				success:	   domainsSaveResponse,
				dataType:	   'json'
			}; 
			$('#domains').ajaxForm(options);
			
			$('#domains_title').keyup(function(event){
			    code ('domains_title', 'domains_code');
			});
		});

	function domainsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function domainsSaveResponse(responseText, statusText)  { 
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
	
	function uploadComplete(response){
		alert(response.message);
		if (!response.error && response.grid.length > 0){
			$("#div_grid_pics_container").html(response.grid)
		}
		$("#frame").html('');
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
{if $id	> 0}
	<iframe	id="frame" name="frame"	src="" style="width:1px;height:1px;border:0"></iframe>
	<div class="form" style="width:100%">
		<h2>{tr	key='pics_header_pics'}</h2>
		<form name="form" action="{url o=domains m=upload_pic	id=$id}" method="POST" enctype="multipart/form-data" target="frame">
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