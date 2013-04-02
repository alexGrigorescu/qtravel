{literal}
	<div id="search-fields-container">
		{/literal}<input type="hidden" id="hid-search-url" value="{url o='buss' m='index'}">{literal}
		<div id="autocomplete-destination-container">
			<label for="autocomplete-home-destination">Destinatie: </label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
			<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-home-destination">
		</div>
	</div>
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