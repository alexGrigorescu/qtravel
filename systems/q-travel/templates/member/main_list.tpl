{literal}
<div id="page">
		<div id="result-fast-search">
			<div id="fast-search-top">
				<img src="{/literal}{$img_path}{literal}/fast_search_text.png">
			</div>
			<div id="fast-search-middle">
				<div class="left">
					<div class="fast-search-container">
						<img class="fast-search-text" src="{/literal}{$img_path}{literal}/fast_search_pick_vacancy.png">
						{/literal}
						<div id="filter-vacancy">
							<div class="rdb">
							{if $searchType eq 'vacancy'}
								<img src="{$img_path}/rdb_checked.png">
							{else}
								<a href="{url o='accommodation_plane' m='index'}"><img src="{$img_path}/rdb_unchecked.png"></a>
							{/if}
							</div>
							<div class="text">Vacante</div>
							<div class="rdb">
							{if $searchType eq 'ticket'}
								<img src="{$img_path}/rdb_checked.png">
							{else}
								<a href="{url o='flight' m='index'}"><img src="{$img_path}/rdb_unchecked.png">
							{/if}	
							
							</div>
							<div class="text">Bilete</div>
							{if $menuList.submenu_tour.status eq 1}
								<div class="rdb">
								{if $searchType eq 'tour'}
									<img src="{$img_path}/rdb_checked.png">
								{else}
									<a href="{url o='tour_plane' m='index'}"><img src="{$img_path}/rdb_unchecked.png"></a>
								{/if}
								</div>
								<div class="text">Circuite</div>
							{/if}
						</div>
						{literal}
					</div>
				</div>
				<div class="right">
					<div class="fast-search-container">
						<img class="fast-search-text" src="{/literal}{$img_path}{literal}/fast_search_pick_transport.png">
						{/literal}
						<div id="filter-transport">
							<div class="rdb">
							{if $searchTransport eq 'plane'}
								<img src="{$img_path}/rdb_checked.png">
							{else}
								{if $searchType eq 'vacancy'}
									<a href="{url o='accommodation_plane' m='index'}">
								{elseif $searchType eq 'ticket'}
									<a href="{url o='flight' m='index'}">
								{elseif $searchType eq 'tour'}
									<a href="{url o='tour_plane' m='index'}">
								{/if}
								<img src="{$img_path}/rdb_unchecked.png"></a>
							{/if}
							</div>
							<div class="text">Avion</div>
							<div class="rdb">
							{if $searchTransport eq 'buss'}
								<img src="{$img_path}/rdb_checked.png">
							{else}
								{if $searchType eq 'vacancy'}
									<a href="{url o='accommodation_bus' m='index'}">
								{elseif $searchType eq 'ticket'}
									<a href="{url o='buss' m='index'}">
								{elseif $searchType eq 'tour'}
									<a href="{url o='tour_bus' m='index'}">
								{/if}
								<img src="{$img_path}/rdb_unchecked.png"></a>
							{/if}
							
							</a></div>
							<div class="text">Autocar</div>
							{if $searchType eq 'vacancy'}
								<div class="rdb"><a href="#">
									{if $searchTransport eq 'individual'}
										<img src="{$img_path}/rdb_checked.png">
									{else}
										<a href="{url o='accommodation_individual' m='index'}">
										<img src="{$img_path}/rdb_unchecked.png">
										</a>
									{/if}
								</a></div>
								<div class="text">Individual</div>
							{/if}
						</div>
						{literal}
					</div>
				</div>
			</div>
			<div id="fast-search-bottom">
				<div class="left">
					<div class="fast-search-container">
						<img class="fast-search-text" src="{/literal}{$img_path}{literal}/fast_search_pick_destination.png">
						<div  id="autocomplete-destination-container">
							<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-destination">
							<img src="{/literal}{$img_path}{literal}/input_margin_bg.png" id="btn-autocomplete-destination">
						</div>
					</div>
				</div>
				<div class="right">
					<div class="fast-search-container">
						<img class="fast-search-text" src="{/literal}{$img_path}{literal}/fast_search_pick_price.png">
						<a href="#" id="grid-slider-minus"><img class="fast-search-slider-minus" src="{/literal}{$img_path}{literal}/fast_search_slider_minus.png"></a>
						<a href="#" id="grid-slider-plus"><img class="fast-search-slider-plus" src="{/literal}{$img_path}{literal}/fast_search_slider_plus.png"></a>
					</div>
				</div>
			</div>
			<!--<div id="fast-search-slider-active"></div>-->
			<div id="grid-slider-active"></div>
		</div>
		<div id="page-body">
			<div id="body-engine" class="result">
				<div class="result-header">
					<div class="result-title">
						<img src="{/literal}{$img_path}{literal}/result_title.png">
					</div>
					<div class="result-top-paging">
						<div class="paging-container">
							<div class="page-back">
								{/literal}{if $page gt 0}
								<a href="{url o=$object m='index' p=$page-1}">
								{/if}	
								<img src="{$img_path}/result_page_back.png">	
								<span class="page-text">pagina anterioara</span>
								{if $page gt 0}
								</a>
								{/if}{literal}
							</div>
							<div class="page-middle">
								<ul>
									{/literal}{foreach from=$pageRank item=pageNo}
										<a href="{url o=$object m='index' p=$pageNo}"><li class="page-count {if $pageNo eq $page}selected{/if}">{$pageNo+1}</li></a>
									{/foreach}{literal}
								</ul>
							</div>
							<div class="page-next">
								{/literal}{if $page lt $pageTotalCount}
								<a href="{url o=$object m='index' p=$page+1}">
								{/if}	
								<span class="page-text">pagina urmatoare</span>
								<img src="{$img_path}/result_page_next.png">
								{if $page lt $pageTotalCount}
								</a>
								{/if}{literal}
							</div>
						</div>
					</div>
				</div>
				<div class="result-body">
					<ul>{/literal}
					{foreach from=$locations item=location}
						{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
						<a href="{$url}cazare/{$location.region_code}/{$location.code}.html">
						{elseif $object eq 'flight'}
						<a href="{$url}bilet-avion/{$location.region_code}/{$location.code}.html">
						{elseif $object eq 'buss'}
						<a href="{$url}bilet-autocar/{$location.region_code}/{$location.code}.html">
						{/if}
						<li>
							 <div class="result-item-container">
								<img src="{$img_path}/result_item1.png">
							</div>
							<div class="result-text-container-left">
								<span class="result-promo-value"><!---30%--></span>
								<span class="result-promo-title"><!--Last Minute--></span>
							</div>
							<div class="result-text-container-middle">
								<span class="result-promo-price">{$location.price}</span>
							</div>
							<div class="result-text-container-right">
								<span class="result-promo-euro">&#8364;</span>
							</div>
							<div class="result-item-title">
								<span>{$location.region_title} ({$location.country_title})</span>
							</div>
						</li>
						</a>
					{/foreach}{literal}
				</div>
				<div class="result-footer">
					<div class="result-top-paging">
						<div class="paging-container">
							<div class="page-back">
								{/literal}{if $page gt 0}
								<a href="{url o=$object m='index' p=$page-1}">
								{/if}	
								<img src="{$img_path}/result_page_back.png">	
								<span class="page-text">pagina anterioara</span>
								{if $page gt 0}
								</a>
								{/if}{literal}
							</div>
							<div class="page-middle">
								<ul>
									{/literal}{foreach from=$pageRank item=pageNo}
										<a href="{url o=$object m='index' p=$pageNo}"><li class="page-count {if $pageNo eq $page}selected{/if}">{$pageNo+1}</li></a>
									{/foreach}{literal}
								</ul>
							</div>
							<div class="page-next">
								{/literal}{if $page lt $pageTotalCount}
								<a href="{url o=$object m='index' p=$page+1}">
								{/if}	
								<span class="page-text">pagina urmatoare</span>
								<img src="{$img_path}/result_page_next.png">
								{if $page lt $pageTotalCount}
								</a>
								{/if}{literal}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="body-advertising">
				<div id="continents-buttons">
					<ul>
						<li {/literal}{if $continentIdsText eq 1}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=1}"><span class="continent-text">EUROPA</span></a>{literal}
						</li>
						<li {/literal}{if $continentIdsText eq 3}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=3}"><span class="continent-text">AFRICA</span></a>{literal}
						</li>
						<li {/literal}{if $continentIdsText eq 6}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=6}"><span class="continent-text">ASIA</span></a>{literal}
						</li>
						<li {/literal}{if $continentIdsText eq '4_5'}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=4_5}"><span class="continent-text">AMERICA</span></a>{literal}
						</li>
						<li {/literal}{if $continentIdsText eq 7}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=7}"><span class="continent-text">AUSTRALIA / OCEANIA</span></a>{literal}
						</li>
					</ul>
				</div>
				<div id="result-right-advertising-bg">
				<ul>
					{/literal}{foreach from=$vacancyOfferAdvertising name=advertisingList item=vacancyOffer}
					{if $smarty.foreach.advertisingList.index lt 2}
						{if $vacancyOffer.offer_type eq 'accommodations'}
							<a href="{$url}cazare/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li><img src="{$vacancyOfferAdvertisingUrl}advertising_{$vacancyOffer.id}.{$vacancyOffer.ext}"></li></a>
						{/if}
						{if $vacancyOffer.offer_type eq 'busses'}
							<a href="{$url}bilet-autocar/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li><img src="{$vacancyOfferAdvertisingUrl}advertising_{$vacancyOffer.id}.{$vacancyOffer.ext}"></li></a>
						{/if}
						{if $vacancyOffer.offer_type|trim eq 'flights'}
							<a href="{$url}bilet-avion/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li><img src="{$vacancyOfferAdvertisingUrl}advertising_{$vacancyOffer.id}.{$vacancyOffer.ext}"></li></a>
						{/if}
					{/if}
					{/foreach}{literal}
				</ul>
				</div>
				<div id="facebook-container">
					<div class="like-on-facebook"></div>
					<div class="fb-like-box" data-href="{/literal}{$facebookProfile}{literal}" data-width="300" data-height="373" data-show-faces="true" data-stream="false" data-header="true"></div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(function() {
			var minSlideValue = 1;
			var maxSlideValue = 400;
			$( "#grid-slider-active" ).slider({
				range: "min",
				value: "{/literal}{$price}{literal}",
				min: minSlideValue,
				max: maxSlideValue,
				slide: function( event, ui ) {
					$( "#grid-slider-active > a" ).html(ui.value);
				},
				change: function( event, ui ) {
					var regex = 'pr=[0-9]*';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 
					
					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'pr='+ui.value);
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\?";
					    var replacedValueIsSetGet = $("#hid-ajax-url-prefix").val().match(regexIsSetGet); 

					    if(replacedValueIsSetGet){
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"&pr="+ui.value;
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    } else {
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"?pr="+ui.value;
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    }
					}

					location.href = $("#hid-ajax-url-prefix").val();
					$( "#grid-slider-active > a" ).html(ui.value);
				}
			});
			$( "#grid-slider-active > a" ).html($("#grid-slider-active").slider("value"));

			$( "#rdb-grid" ).click(function() {
				if($( "#hid-rdb-grid" ).val() == 1){
					$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
					$( "#hid-rdb-grid" ).val("0");
					$( "#grid-slider-active" ).css("visibility","hidden");
					$( "#grid-slider-inactive" ).css("visibility","visible");
					$("#hid-price-gridtion").val(0);
				} else {
					$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
					$( "#hid-rdb-grid" ).val("1");
					$( "#grid-slider-active" ).css("visibility","visible");
					$( "#grid-slider-inactive" ).css("visibility","hidden");
				}
			 	return false;
			});
			if($( "#hid-rdb-grid" ).val() == 0){
				$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
				$( "#rdb-grid > img" ).css("visibility","visible");
				$( "#grid-slider-active" ).css("visibility","hidden");
				$( "#grid-slider-inactive" ).css("visibility","visible");
			} else {
				$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
				$( "#rdb-grid > img" ).css("visibility","visible");
				$( "#grid-slider-active" ).css("visibility","visible");
				$( "#grid-slider-inactive" ).css("visibility","hidden");
			}
			$( "#grid-slider-minus" ).click(function() {
				var currentSliderValue = $( "#grid-slider-active" ).slider("value");
				if(currentSliderValue > minSlideValue){
					$( "#grid-slider-active" ).slider("value",(currentSliderValue-1));
				}
				return false;
			});
			$( "#grid-slider-plus" ).click(function() {
				var currentSliderValue = $( "#grid-slider-active" ).slider("value");
				if(currentSliderValue < maxSlideValue){
					$( "#grid-slider-active" ).slider("value",(currentSliderValue+1));
				}
				return false;
			});
		});
		$(function() {
			$( "#autocomplete-destination" ).autocomplete({
				source: "{/literal}{url o='accommodation_plane' m='get_destinations'}{literal}",
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						var regex = 'dt=[0-9_]*';
						var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

						if(replacedValue){
							var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'dt='+ui.item.id);
							$("#hid-ajax-url-prefix").val(newUrl);
						} else {
							var regexIsSetGet = "\\?";
						    var replacedValueIsSetGet = $("#hid-ajax-url-prefix").val().match(regexIsSetGet); 

						    if(replacedValueIsSetGet){
						    	var newUrl = $("#hid-ajax-url-prefix").val()+"&dt="+ui.item.id;
						    	$("#hid-ajax-url-prefix").val(newUrl);
						    } else {
						    	var newUrl = $("#hid-ajax-url-prefix").val()+"?dt="+ui.item.id;
						    	$("#hid-ajax-url-prefix").val(newUrl);
						    }
						}

						location.href = $("#hid-ajax-url-prefix").val();
						$( "#grid-slider-active > a" ).html(ui.value);
					}
				}
			});
			$( "#autocomplete-destination" ).change(function() {
				if($(this).val() == ''){
					var regex = 'dt=[0-9_]*';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'dt=');
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\?";
					    var replacedValueIsSetGet = $("#hid-ajax-url-prefix").val().match(regexIsSetGet); 

					    if(replacedValueIsSetGet){
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"&dt=";
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    } else {
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"?dt=";
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    }
					}

					location.href = $("#hid-ajax-url-prefix").val();
					$( "#grid-slider-active > a" ).html(ui.value);	
				}
			});
			{/literal}
			{if $regionTitle eq ''}
				{if $countryTitle neq ''}
					{literal}$( "#autocomplete-destination" ).val("{/literal}{$countryTitle}");
				{/if}
			{else}
				{literal}$( "#autocomplete-destination" ).val("{/literal}{$regionTitle} ({$countryTitle})");
			{/if}
			{literal}

			$( "#btn-autocomplete-destination" ).click(function() {
				if($("#autocomplete-destination").autocomplete("widget").is(':visible')){
					$( "#autocomplete-destination" ).autocomplete("close");
				} else {
					$( "#autocomplete-destination" ).autocomplete("search");
				}
			});
		});
	</script>
{/literal}
