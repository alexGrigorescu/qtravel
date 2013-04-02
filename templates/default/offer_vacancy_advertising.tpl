<script type="text/javascript" src="javascript/wysiwyg/scripts/innovaeditor.js"></script>
{$form}
<div>&nbsp;</div>
<script	type="text/javascript">
{literal}


	
	
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


	
	<div class="form" style="width:100%">
		<h2>{tr	key='pics_header_pics'}</h2>
		<div class="one-upload">
			<form name="form" action="{url o=offer_vacancy m=upload_pic}" method="POST" enctype="multipart/form-data">
				<input type="hidden" value="400000000" name="MAX_FILE_SIZE"/>
				<table class="row" cellpadding="2" cellspacing="0">
				<tr>
					<td class="label" colspan="2">{tr key='pics_label_upload_file'}</td>
					<td class="element">{$form_pics_pic}<input type="submit" id="pics_upload_save" value="Adauga reclama" class="button_save"></td>
					<td class="help"></td>
				</tr>
				</table>
			</form>
		</div>
		<br/>
		<div id="div_grid_pics_container">{$grid_pics}</div>
	</div>

