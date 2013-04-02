<div>{$form}</div>
<script	type="text/javascript">
{literal}
	$(document).ready(function() { 
			var options = {	
				beforeSubmit:  specialsSaveRequest,
				success:	   specialsSaveResponse,
				dataType:	   'json'
			}; 
			$('#specials').ajaxForm(options);
			
			var options = {	
				beforeSubmit:  specialsOffersSaveRequest,
				success:	   specialsOffersSaveResponse,
				dataType:	   'json'
			}; 
			$('#special_offers').ajaxForm(options);
			
			$('#specials_title').keyup(function(event){
			    code ('specials_title', 'specials_code');
			});
		});

	function specialsSaveRequest(formData,	jqForm,	options) { 
		return true; 
	}
	
	function specialsSaveResponse(responseText, statusText)  { 
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
	
	function specialsOffersSaveRequest(formData, jqForm, options) { 
		return true; 
	}
	
	function specialsOffersSaveResponse(responseText, statusText)  { 
		var succes = responseText.succes;
		var message = responseText.message;
		if (succes == false)
		{
			alert(message);		
			$("#"+responseText.field).focus();
		}
		else
		{
			alert(message);
		}
	}
	
	function offerSave(offer_id, special_id)
	{
		var code = $("#special_offers_code_"+offer_id).val();
		var title = $("#special_offers_title_"+offer_id).val();
		var description = $("#special_offers_description_"+offer_id).val();
		
		var url = "{/literal}{$update_offer_url}{literal}";
		var vData = {
				offer_id : offer_id,								
				special_id : special_id,								
				special_offers_code : code,								
				special_offers_title : title,								
				special_offers_description : description							
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true)
			{
				alert(data.message);
				var grid = data.grid;
				$("#div_grid_offers_container").html(grid);
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
	}
	
	function offerDelete(offer_id, special_id)
	{
		var url = "{/literal}{$delete_offer_url}{literal}";
		var vData = {
				offer_id : offer_id,				
				special_id : special_id				
			};
		$.post(url, vData, function(data){
			var succes = data.succes;
			if(succes == true){
				//alert(data.message);
				var grid = data.grid;
				$("#div_grid_offers_container").html(grid);
			}
			else
			{
				alert(data.message);				
			}
		 }, "json");
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
	<br/><br/>
	<div class="form" style="width:100%">
		<form action="{$smarty.const.INDEX}" method="post" name="special_offers" id="special_offers">
			{$hidden_fields_offers}
			<div id="div_grid_offers_container">{$grid_offers}</div>
		</form>
	</div>
{/if}

{if $id	> 0}
	<iframe	id="frame" name="frame"	src="" style="width:1px;height:1px;border:0"></iframe>
	<div class="form" style="width:100%">
		<h2>{tr	key='pics_header_pics'}</h2>
		<form name="form" action="{url o=specials m=upload_pic	id=$id}" method="POST" enctype="multipart/form-data" target="frame">
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