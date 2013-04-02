<div id="search-fields-container">
	<input type="hidden" id="hid-search-url" value="{url o='flight' m='index'}">
	<div id="autocomplete-destination-container">
		<label for="autocomplete-home-destination">Destinatie: </label>
		<label style="font-style: italic;color: #999;cursor: text;position: absolute;padding: 0px 0px 0px 10px;width:180px;height:25px" id="label-autocomplete-home-destination">...alege destinatie</label>
		<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
		<img src="{$img_path}/input_margin_bg.png" id="btn-autocomplete-home-destination">
	</div>
</div>
{literal}
<script>
	$(function() {
		$("#btn-autocomplete-home-destination").click(function() {
			$("#label-autocomplete-home-destination").css('display','none');
			if($("#autocomplete-home-destination").autocomplete("widget").is(':visible')){
				$("#autocomplete-home-destination").autocomplete("close");
			} else {
				$("#autocomplete-home-destination").autocomplete("search");
			}
		});	
		$("#label-autocomplete-home-destination").click(function() {
			$(this).css('display','none');
			$("#autocomplete-home-destination").focus();
		});
	});
</script>
{/literal}