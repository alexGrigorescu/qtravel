{literal}
	<div id="search-fields-container">
		{/literal}<input type="hidden" id="hid-search-url" value="{$searchUrl}">{literal}
		<div id="autocomplete-destination-container">
			<label for="autocomplete-home-destination">Destinatie: </label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-home-destination">
			<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-home-destination">
		</div>
		<div id="autocomplete-hotel-container">
			<label for="autocomplete-hotel">Nume hotel: </label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-hotel">
			<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-hotel">
		</div>
		<div id="autocomplete-vacancy-type-container">
			<label for="autocomplete-vacancy-type">Tip vacanta: </label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-vacancy-type">
			<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-vacancy-type">
		</div>
		<div id="autocomplete-stars-container">
			<label for="autocomplete-stars">Tip hotel: </label>
			<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-stars">
			<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-stars">
		</div>
	</div>
	<script>
	$(function() {
		$("#btn-autocomplete-stars").click(function() {
			if($("#autocomplete-stars").autocomplete("widget").is(':visible')){
				$("#autocomplete-stars").autocomplete("close");
			} else {
				$("#autocomplete-stars").autocomplete("search");
			}
			
		});	
		$("#btn-autocomplete-vacancy-type").click(function() {
			if($("#autocomplete-vacancy-type").autocomplete("widget").is(':visible')){
				$("#autocomplete-vacancy-type").autocomplete("close");
			} else {
				$("#autocomplete-vacancy-type").autocomplete("search");
			}
			
		});	
		$("#btn-autocomplete-hotel").click(function() {
			if($("#autocomplete-hotel").autocomplete("widget").is(':visible')){
				$("#autocomplete-hotel").autocomplete("close");
			} else {
				$("#autocomplete-hotel").autocomplete("search");
			}		
		});	
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