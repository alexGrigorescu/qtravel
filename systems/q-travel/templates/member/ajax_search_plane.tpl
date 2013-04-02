<div id="search-fields-container">
	<input type="hidden" id="hid-search-url" value="{url o='flight' m='index'}">
	<div id="autocomplete-destination-container">
		<label for="autocomplete-home-destination">Destinatie: </label>
		<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
		<img src="{$img_path}/input_margin_bg.png" id="btn-autocomplete-home-destination">
	</div>
</div>
{literal}
<script>
	$(function() {
		$("#btn-autocomplete-home-destination").click(function() {
			if($("#autocomplete-home-destination").autocomplete("widget").is(':visible')){
				$("#autocomplete-home-destination").autocomplete("close");
			} else {
				$("#autocomplete-home-destination").autocomplete("search");
			}
		});	
	});
</script>
{/literal}