{literal}	
<div id="page">
		<div id="result-fast-search">
			<div class="div-breadcrumbs">
				<span>{/literal}
				<a href="{url o='main' m='index'}">
					{if $object eq 'flight' || $object eq 'buss'}
						Bilete 
					{else}
						Vacante
					{/if}
				</a>
				
				{if $continentCode neq '' || $countryCode neq '' || $regionCode neq ''}
					{if $object eq 'accommodation_plane'}
						> <a href="{url o=$object m='index'}">Avion </a>
					{elseif $object eq 'accommodation_bus'}
						> <a href="{url o=$object m='index'}">Autocar </a>
					{elseif $object eq 'accommodation_individual'}
						> <a href="{url o=$object m='index'}">Individual </a>
					{elseif $object eq 'flight'}
						> <a href="{url o=$object m='index'}">Avion </a>
					{elseif $object eq 'buss'}
						> <a href="{url o=$object m='index'}">Autocar </a>
					{/if}
					
					{if $regionTitle neq ''}
						> {$regionTitle} 
					{elseif $countryTitle neq ''}
						> {$countryTitle}
					{elseif $continentTitle neq ''}
						> {$continentTitle}
					{/if}
				{else}
					{if $object eq 'accommodation_plane'}
						> Avion 
					{elseif $object eq 'accommodation_bus'}
						> Autocar 
					{elseif $object eq 'accommodation_individual'}
						> Individual 
					{elseif $object eq 'flight'}
						> Avion 
					{elseif $object eq 'buss'}
						> Autocar 
					{/if}
				{/if}

				
				
				{literal}</span>	
			</div>
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
								<a href="{url o='flight' m='index'}"><img src="{$img_path}/rdb_unchecked.png"></a>
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
			<!--<div id="fast-search-slider-active"></div>  background-color:#22246a;-->
			<div id="grid-slider-active"></div>
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
							<li id="europe" class="continent {/literal}{if $continentIdsText eq 1}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/europa/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/europa/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/europa/
									{elseif $object eq 'flight'}
										{$url}bilet-avion/europa/
									{elseif $object eq 'buss'}
										{$url}bilet-autocar/europa/
									{/if}
									">
										<span class="continent-text">EUROPA</span>{literal}
									</a>
								<div id="country-list-europe" class="country-list"></div>
							</li>
							<li id="africa" class="continent {/literal}{if $continentIdsText eq 3}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/africa/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/africa/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/africa/
									{elseif $object eq 'flight'}
										{$url}bilet-avion/africa/
									{elseif $object eq 'buss'}
										{$url}bilet-autocar/africa/
									{/if}
									">
										<span class="continent-text">AFRICA</span>{literal}
									</a>
								<div id="country-list-africa" class="country-list"></div>
							</li>
							<li id="asia" class="continent {/literal}{if $continentIdsText eq 6}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/asia/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/asia/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/asia/
									{elseif $object eq 'flight'}
										{$url}bilet-avion/asia/
									{elseif $object eq 'buss'}
										{$url}bilet-autocar/asia/
									{/if}
								">
									<span class="continent-text">ASIA</span>{literal}
								</a>
								<div id="country-list-asia" class="country-list"></div>
							</li>
							<li id="america" class="continent {/literal}{if $continentIdsText eq '4_5' || $continentIdsText eq '4,5' || $continentIdsText eq '8'}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/america/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/america/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/america/
									{elseif $object eq 'flight'}
										{$url}bilet-avion/america/
									{elseif $object eq 'buss'}
										{$url}bilet-autocar/america/
									{/if}
								">
									<span class="continent-text">AMERICA</span>{literal}
								</a>
								<div id="country-list-america" class="country-list"></div>
							</li>
							<li id="australia" class="continent {/literal}{if $continentIdsText eq 7}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/australia/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/australia/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/australia/
									{elseif $object eq 'flight'}
										{$url}bilet-avion/australia/
									{elseif $object eq 'buss'}
										{$url}bilet-autocar/australia/
								{/if}
								">
									<span class="continent-text">AUSTRALIA</span>{literal}
								</a>
								<div id="country-list-australia" class="country-list"></div>
							</li>
					</ul>
				</div>

				<div id="result-right-advertising-bg" class="cleared-zone"></div>
<!--				<div id="facebook-container" class="cleared-zone"></div>-->
			</div>
			<div id="body-engine-full" class="result" style="float:left;width:675px;position:relative;left:0;">
				<div class="result-header">
					<div class="result-top-paging">
						<div class="paging-container">
							<div class="page-back">
								{/literal}{if $page gt 0}
								<a href="
								{if $continentCode eq ''}
								 	{url o=$object m=$method p=$page-1}
								 {else}
								 	{url o=$object m=$method continent=$continentCode}?p={$page-1}
								 {/if}">
								{/if}	
								<span class="breadcrumbs">&laquo; &laquo;</span>
								<span class="page-text">pagina anterioara</span>
								{if $page gt 0}
								</a>
								{/if}{literal}
							</div>
							<div class="page-middle">

								<ul>
									{/literal}{foreach from=$pageRank item=pageNo}
										 <a href="
										 {if $continentCode eq ''}
										 	{url o=$object m=$method p=$pageNo}
										 {else}
										 	{url o=$object m=$method continent=$continentCode}?p={$pageNo}
										 {/if}
										 "><li class="page-count {if $pageNo eq $page}selected{/if}">{$pageNo+1}</li></a>
									{/foreach}{literal}
								</ul>
							</div>
							<div class="page-next">
								{/literal}{if $page lt $pageTotalCount}
								<a href="
								{if $continentCode eq ''}
								 	{url o=$object m=$method p=$page+1}
								 {else}
								 	{url o=$object m=$method continent=$continentCode}?p={$page+1}
								 {/if}">
								{/if}	
								<span class="page-text">pagina urmatoare</span>
								<span class="breadcrumbs">&raquo; &raquo;</span>
								{if $page lt $pageTotalCount}
								</a>
								{/if}{literal}
							</div>
						</div>
					</div>
					<h1>
						{/literal} 
							{if $object eq 'flight'}
							Oferte bilet avion {$countryRegion}
							{elseif $object eq 'buss'}
							Bilete autocar - Oferte bilete autocar {$countryRegion}
							{elseif $object eq 'accommodation_plane'}
							Oferte vacanta {$countryRegion} | Vacante cu avionul {if $countryRegion != ''}in {$countryRegion}{/if}
							{elseif $object eq 'accommodation_bus'}
							Oferte vacanta {$countryRegion} | Vacante cu autocarul {if $countryRegion != ''}in {$countryRegion}{/if}
							{elseif $object eq 'accommodation_individual'}
							Vacanta {$countryRegion} | Oferte vacanta {$countryRegion}
							{/if}
						{literal}
					</h1>
				</div>
				<div class="result-body">
					<ul>{/literal}
					{if $display_type eq 'hotels'}
						{foreach from=$locations item=location name=offersList}
							<li  class="hotels">
								<div itemscope itemtype="http://schema.org/Place">
									{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
									<a itemprop="url" title="{$location.title}" href="{$url}cazare/{$location.region_code}/{$location.code}.html">
									{elseif $object eq 'flight'}
									<a itemprop="url" title="Bilete avion {$location.title}" href="{$url}bilet-avion/{$location.region_code}/{$location.code}.html">
									{elseif $object eq 'buss'}
									<a itemprop="url" title="{$location.title}" href="{$url}bilet-autocar/{$location.region_code}/{$location.code}.html">
									{/if}
									 <div class="result-item-container">
									 	<div class="text-stars-container">
										{section name=foo loop=$location.accommodation_type_stars} 
										    <span class="text-stars-symbol">&#9733;</span>
										{/section}
										</div>
										<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
									 		<img src="{$location.location_thumb_url}" width="174" height="105" itemprop="contentURL">
									 	</div>
									</div>
									<div class="result-text-container-left">
										<span class="result-promo-value">
										{if $location.early_value gt 0}
										- {$location.early_value}%
										{/if}
										</span>
										<span class="result-promo-title">
										{if $location.early_value gt 0}
										Early Booking
										{/if}
										</span>
									</div>
									<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
										<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<span itemprop="price" class="result-promo-price">{$location.price}</span>
										</div>
									</div>
									<div class="result-text-container-right">
										<span class="result-promo-euro">&#8364;</span>
									</div>
									
									<div class="result-item-title" id="result-item-title">
										<span itemprop="name">{$location.title}</span>
									</div>
									</a>
	
									<span class="result-promo-lastoffer accordion{$smarty.foreach.offersList.index/3|string_format:"%d"}" style="font-weight:bold;cursor:pointer;">Click pentru detalii</span>
									<div id="divDescription{$smarty.foreach.offersList.index}" style="display:none">
										<span itemprop="description" class="result-promo-lastoffer">{$location.location_description}</span>
									</div>
									{if $smarty.foreach.offersList.index%3 eq 0}
										{literal}<script>
											$('#displayDescription{/literal}{$smarty.foreach.offersList.index}{literal}').click(function () {
										 		{/literal}
											 		{if $smarty.foreach.offersList.index%3 eq 0}
											 			{literal}
											 			$('#divDescription{/literal}{$smarty.foreach.offersList.index+2}{literal}').toggle();
											 			$('#divDescription{/literal}{$smarty.foreach.offersList.index}{literal}').toggle();
											 			$('#divDescription{/literal}{$smarty.foreach.offersList.index+1}{literal}').toggle();
											 			{/literal}
												 	{/if}
												{literal}
										    });
										</script>{/literal}
									{/if}
								</div>
							</li>
							
						{/foreach}
					{elseif $display_type eq 'towns'}
						{foreach from=$locations name=locationName item=location}
							<div itemscope itemtype="http://schema.org/Place">
								<a  itemprop="url" 
								{if $object eq 'flight'}
								title="Bilete avion Bucuresti-{$location.region_title}"
								{elseif $object eq 'buss'}
								title="Bilete autocar {if $location.region_title neq ''}Bucuresti-{$location.region_title}{/if}"
								{elseif $object eq 'accommodation_plane'}
								title="Oferte vacanta {$location.region_title} | Vacante cu avionul in {$location.region_title}"
								{elseif $object eq 'accommodation_bus'}
								title="Oferte vacanta {$location.region_title} | Vacante cu autocarul in {$location.region_title}"
								{elseif $object eq 'accommodation_individual'}
								title="Vacanta {$location.region_title} | Oferte vacanta {$location.region_title}"
								{/if}
								 href="{url o=$object m='region' region=$location.region_code}">
								<li class="towns {if $smarty.foreach.locationName.index lt 3}upper{/if}">
									<div class="result-item-title" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<span itemprop="addressLocality">{$location.region_title}</span>
									</div>
								</li>
								</a>
							</div>
						{/foreach}						
					{/if}
					</ul>
					{if ($object eq 'accommodation_plane' || $object eq 'accommodation_individual' || $object eq 'accommodation_bus') && $lastOffers|@count gt 0}
						<h2>Ultimele oferte de vacanta adaugate 
						{if $countryRegion neq ''}in {$countryRegion}{/if}</h2>
						<ul style="margin-top:-30px">
						{foreach from=$lastOffers item=location}
							<li  class="hotels" style="background-repeat: no-repeat;height:340px">
								<div itemscope itemtype="http://schema.org/Place">
									{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
									<a itemprop="url" title="{$location.title}" href="{$url}cazare/{$location.region_code}/{$location.code}.html">
									{elseif $object eq 'flight'}
									<a itemprop="url" title="Bilete avion {$location.title}" href="{$url}bilet-avion/{$location.region_code}/{$location.code}.html">
									{elseif $object eq 'buss'}
									<a itemprop="url" title="{$location.title}" href="{$url}bilet-autocar/{$location.region_code}/{$location.code}.html">
									{/if}
									 <div class="result-item-container">
									 	<div class="text-stars-container">
										{section name=foo loop=$location.accommodation_type_stars} 
										    <span class="text-stars-symbol">&#9733;</span>
										{/section}
										</div>
										<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
									 		<img src="{$location.location_thumb_url}" width="174" height="105" itemprop="contentURL">
									 	</div>
									</div>
									<div class="result-text-container-left">
										<span class="result-promo-value">
										{if $location.early_value gt 0}
										- {$location.early_value}%
										{/if}
										</span>
										<span class="result-promo-title">
										{if $location.early_value gt 0}
										Early Booking
										{/if}
										</span>
									</div>
									<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
										<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<span itemprop="price" class="result-promo-price">{$location.price}</span>
										</div>
									</div>
									<div class="result-text-container-right">
										<span class="result-promo-euro">&#8364;</span>
									</div>
									<div class="result-item-title">
										<span itemprop="name">{$location.title}</span>
									</div>
									</a>
									<div style="height:30px" class="result-promo-lastoffer-container">
										<span itemprop="description" class="result-promo-lastoffer">{$location.location_description}</span>
									</div>
								</div>
							</li>
						{/foreach}
						</ul>
					{/if}
				{literal}
				</div>
				<div class="result-footer">
					<div class="result-top-paging">
						<div class="paging-container">
							<div class="page-back">
								{/literal}{if $page gt 0}
								<a href="
								{if $continentCode eq ''}
								 	{url o=$object m=$method p=$page-1}
								 {else}
								 	{url o=$object m=$method continent=$continentCode}?p={$page-1}
								 {/if}">
								{/if}	
								<span class="breadcrumbs">&laquo; &laquo;</span>
								<span class="page-text">pagina anterioara</span>
								{if $page gt 0}
								</a>
								{/if}{literal}
							</div>
							<div class="page-middle">
								<ul>
									{/literal}{foreach from=$pageRank item=pageNo}
										<a href="
										{if $continentCode eq ''}
										 	{url o=$object m=$method p=$pageNo}
										 {else}
										 	{url o=$object m=$method continent=$continentCode}?p={$pageNo}
										 {/if}"><li class="page-count {if $pageNo eq $page}selected{/if}">{$pageNo+1}</li></a>
									{/foreach}{literal}
								</ul>
							</div>
							<div class="page-next">
								{/literal}{if $page lt $pageTotalCount}
								<a href="
								{if $continentCode eq ''}
								 	{url o=$object m=$method p=$page+1}
								 {else}
								 	{url o=$object m=$method continent=$continentCode}?p={$page+1}
								 {/if}">
								{/if}	
								<span class="page-text">pagina urmatoare</span>
								<span class="breadcrumbs">&raquo; &raquo;</span>
								{if $page lt $pageTotalCount}
								</a>
								{/if}{literal}
							</div>
						</div>
					</div>
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
				source: "{/literal}{url o='accommodation_plane' m='get_code_destinations'}{literal}",
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						var urlParts = $("#hid-ajax-url-prefix").val().split('/');
						var objectParts = urlParts[3].split('?');
						var newUrl = 'http://'+urlParts[2]+'/'+objectParts[0]+'/';
						newUrl = newUrl.replace('.html','');
						var newFilteredUrl ='';

						var filterParts = ui.item.id.split('_');
						if(filterParts[0].length > 0){
							newFilteredUrl = newUrl + filterParts[0]+'.html';
						} else if(filterParts[1].length > 0){
							newFilteredUrl = newUrl + filterParts[1]+'.html';
						}
						if(newFilteredUrl.length > 0){
							$("#hid-ajax-url-prefix").val(newFilteredUrl);
						}

						location.href = $("#hid-ajax-url-prefix").val();
						$( "#grid-slider-active > a" ).html(ui.value);
					}
				}
			});
			$( "#autocomplete-destination" ).change(function() {
				;
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
		$(function() {
			getCountries('1','europe',{/literal}'{$object}','{$method}'{literal});
			getCountries('3','africa',{/literal}'{$object}','{$method}'{literal});
			getCountries('6','asia',{/literal}'{$object}','{$method}'{literal});
			getCountries('4,5','america',{/literal}'{$object}','{$method}'{literal});
			getCountries('7','australia',{/literal}'{$object}','{$method}'{literal});		
		})
	</script>
{/literal}
