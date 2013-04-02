{literal}
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>{/literal}
			<a href="{url o='main' m='index'}">Bilete </a>
			> <a href="{url o='flight' m='index'}">Avion </a>
			> <a href="{url o='flight' m='region' region=$location.end_region_code}">{$location.end_region_title} </a>
			{literal}</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent {/literal}{if $location.end_continent_id eq 1}selected-continent{/if}">
							<a href="
								{$url}bilet-avion/europa/
							">
								<span class="continent-text">EUROPA</span>{literal}
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent {/literal}{if $location.end_continent_id eq 3}selected-continent{/if}">
							<a href="
								{$url}bilet-avion/africa/
							">
								<span class="continent-text">AFRICA</span>{literal}
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent {/literal}{if $location.end_continent_id eq 6}selected-continent{/if}">
							<a href="
								{$url}bilet-avion/asia/
							">
								<span class="continent-text">ASIA</span>{literal}
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent {/literal}{if $location.end_continent_id eq 4 || $location.end_continent_id eq 5}selected-continent{/if}">
							<a href="
								{$url}bilet-avion/america/
							">
								<span class="continent-text">AMERICA</span>{literal}
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent {/literal}{if $location.end_continent_id eq 7}selected-continent{/if}">
							<a href="
								{$url}bilet-avion/australia/
							">
								<span class="continent-text">AUSTRALIA</span>{literal}
							</a>
							<div id="country-list-australia" class="country-list"></div>
						</li>
					</ul>
				</div>
				<div id="result-right-advertising-bg" class="cleared-zone"></div>
				<div id="facebook-container" class="cleared-zone"></div>
			</div>
			<div id="body-engine-full" class="result" style="float:left;width:675px;position:relative;left:0;">
			<div id="detail-content">
				<div itemscope itemtype="http://schema.org/Place">
						<div id="detail-title">
							<div class="left" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
								<div class="top">
									<h1>Bilet avion {/literal}<span itemprop="name">{$location.title}</span>{literal}</h1>
								</div>
								<div class="bottom">
									<div class="offer-detail">
										{/literal}{$offer} | {$offer_type} | <span itemprop="addressCountry">{$location.end_country_title}</span>{literal}
									</div>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="{/literal}{url o='reservation' m='index' type='flights' id=$location.id}"><img src="{$img_path}{literal}/detail_btn_get_offer.png"></a>
							</div>
						</div>
						<div id="detail-flight-pictures">
							<ul>{/literal}
								<li>
									<div class="left">{$location.flight_operator_1_thumb}</div>
									<div class="center">
										<div class="title">
											{if $location.flight_operator_1_title > ''}
											<span class="description-flight-title">Operator:</span>
											{/if}
											{if $location.price1_1 > 0}
											<span class="description-flight-title">Pret Dus:</span>
											{/if}
											{if $location.price2_1 > 0}
											<span class="description-flight-title">Pret Dus - Intors:</span>
											{/if}
											{if $location.stops_description_1 > ''}
											<span class="description-flight-title">Escala:</span>
											{/if}
										</div>
										<div class="text">
											{if $location.flight_operator_1_title > ''}
											<span class="description-flight-text">{$location.flight_operator_1_title}</span>
											{/if}
											{if $location.price1_1 > 0}
											<span class="description-flight-text">{$location.price1_1} {$location.currency_title}</span>
											{/if}
											{if $location.price2_1 > 0}
											<span class="description-flight-text">{$location.price2_1} {$location.currency_title}</span>
											{/if}
											{if $location.stops_description_1 > ''}
											<span class="description-flight-text">{$location.stops_description_1}</span>
											{/if}
										</div>
									</div>
									<div class="right"></div>
								</li>
								{if $location.flight_operator_2_id > 0}
								<li>
									<div class="left">{$location.flight_operator_2_thumb}</div>
									<div class="center">
										<div class="title">
											{if $location.flight_operator_2_title > ''}
											<span class="description-flight-title">Operator:</span>
											{/if}
											{if $location.price1_2 > 0}
											<span class="description-flight-title">Pret Dus:</span>
											{/if}
											{if $location.price2_2 > 0}
											<span class="description-flight-title">Pret Dus - Intors:</span>
											{/if}
											{if $location.stops_description_2 > ''}
											<span class="description-flight-title">Escala:</span>
											{/if}
										</div>
										<div class="text">
											{if $location.flight_operator_2_title > ''}
											<span class="description-flight-text">{$location.flight_operator_2_title}</span>
											{/if}
											{if $location.price1_2 > 0}
											<span class="description-flight-text">{$location.price1_2} {$location.currency_title}</span>
											{/if}
											{if $location.price2_2 > 0}
											<span class="description-flight-text">{$location.price2_2} {$location.currency_title}</span>
											{/if}
											{if $location.stops_description_2 > ''}
											<span class="description-flight-text">{$location.stops_description_2}</span>
											{/if}
										</div>
									</div>
									<div class="right"></div>
								</li>
								{/if}
								{if $location.flight_operator_3_id > 0}
								<li>
									<div class="left">{$location.flight_operator_3_thumb}</div>
									<div class="center">
										<div class="title">
											{if $location.flight_operator_3_title > ''}
											<span class="description-flight-title">Operator:</span>
											{/if}
											{if $location.price1_3 > 0}
											<span class="description-flight-title">Pret Dus:</span>
											{/if}
											{if $location.price2_3 > 0}
											<span class="description-flight-title">Pret Dus - Intors:</span>
											{/if}
											{if $location.stops_description_3 > ''}
											<span class="description-flight-title">Escala:</span>
											{/if}
										</div>
										<div class="text">
											{if $location.flight_operator_3_title > ''}
											<span class="description-flight-text">{$location.flight_operator_3_title}</span>
											{/if}
											{if $location.price1_3 > 0}
											<span class="description-flight-text">{$location.price1_3} {$location.currency_title}</span>
											{/if}
											{if $location.price2_3 > 0}
											<span class="description-flight-text">{$location.price2_3} {$location.currency_title}</span>
											{/if}
											{if $location.stops_description_3 > ''}
											<span class="description-flight-text">{$location.stops_description_3}</span>
											{/if}
										</div>
									</div>
									<div class="right"></div>
								</li>
								{/if}
								{if $location.flight_operator_4_id > 0}
								<li>
									<div class="left">{$location.flight_operator_4_thumb}</div>
									<div class="center">
										<div class="title">
											{if $location.flight_operator_4_title > ''}
											<span class="description-flight-title">Operator:</span>
											{/if}
											{if $location.price1_4 > 0}
											<span class="description-flight-title">Pret Dus:</span>
											{/if}
											{if $location.price2_4 > 0}
											<span class="description-flight-title">Pret Dus - Intors:</span>
											{/if}
											{if $location.stops_description_4 > ''}
											<span class="description-flight-title">Escala:</span>
											{/if}
										</div>
										<div class="text">
											{if $location.flight_operator_4_title > ''}
											<span class="description-flight-text">{$location.flight_operator_4_title}</span>
											{/if}
											{if $location.price1_4 > 0}
											<span class="description-flight-text">{$location.price1_4} {$location.currency_title}</span>
											{/if}
											{if $location.price2_4 > 0}
											<span class="description-flight-text">{$location.price2_4} {$location.currency_title}</span>
											{/if}
											{if $location.stops_description_4 > ''}
											<span class="description-flight-text">{$location.stops_description_4}</span>
											{/if}
										</div>
									</div>
									<div class="right"></div>
								</li>
								{/if}
							{literal}</ul>
						</div>
					<div id="detail-flight-description"></div>
				</div>
				<!-- <div id="detail-buttons">
					<ul>
						<a href="#"><li id="detail-btn-details"></li></a>					
						<a href="#"><li id="detail-btn-info"></li></a>
					</ul>
				</div>-->
			
				<div id="detail-similars">
					{/literal}
					{if $locationBack.end_region_code neq ''}
						<a href="{$url}bilet-avion/{$locationBack.end_region_code}/{$locationBack.code}.html"><img class="back" src="{$img_path}/similar_back.png"></a>
					{/if}
					<a rel="nofollow" href="{url o=flight m=region region=$location.end_region_code}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
					{if $locationNext.end_region_code neq ''}
						<a href="{$url}bilet-avion/{$locationNext.end_region_code}/{$locationNext.code}.html"><img class="next" src="{$img_path}/similar_next.png"></a>
					{/if}
					{literal}
				</div>
				
<!--					start get similar offers-->
				{/literal}

				{if $similarOffers|@count gt 0}
					<h2 class="similar">Oferte similare
					{if $countryRegion neq ''}in {$countryRegion}{/if}</h2>
					<ul style="margin-top:-30px">
					{foreach from=$similarOffers item=location_similar}
					<li  class="hotels-similar" style="background-repeat: no-repeat;height:355px">
						<div itemscope itemtype="http://schema.org/Place">
							{if $object eq 'accommodation_plane' || $object eq 'accommodation_bus' || $object eq 'accommodation_individual'}
							<a itemprop="url" title="{$location_similar.title}" href="{$url}cazare/{$location_similar.region_code}/{$location_similar.code}.html">
							{elseif $object eq 'flight'}
							<a itemprop="url" title="Bilete avion {$location_similar.title}" href="{$url}bilet-avion/{$location_similar.region_code}/{$location_similar.code}.html">
							{elseif $object eq 'buss'}
							<a itemprop="url" title="{$location_similar.title}" href="{$url}bilet-autocar/{$location_similar.region_code}/{$location_similar.code}.html">
							{/if}
							 <div class="result-item-container">
							 	<div class="text-stars-container">
								{section name=foo loop=$location_similar.accommodation_type_stars} 
								    <span class="text-stars-symbol">&#9733;</span>
								{/section}
								</div>
								<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
							 		<img src="{$location_similar.location_thumb_url}" width="174" height="105" itemprop="contentURL">
							 	</div>
							</div>
							<div class="result-text-container-left">
								<span class="result-promo-value">
								{if $location_similar.early_value gt 0}
								- {$location_similar.early_value}%
								{/if}
								</span>
								<span class="result-promo-title">
								{if $location_similar.early_value gt 0}
								Early Booking
								{/if}
								</span>
							</div>
							<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
								<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<span itemprop="price" class="result-promo-price">{$location_similar.price}</span>
								</div>
							</div>
							<div class="result-text-container-right">
								<span class="result-promo-euro">&#8364;</span>
							</div>
							<div class="result-item-title">
								<span itemprop="name">{$location_similar.title}</span>
							</div>
							</a>
							<div style="height:30px" class="result-promo-lastoffer-container">
								<span itemprop="description" class="result-promo-lastoffer">{$location_similar.location_description}</span>
							</div>
						</div>
					</li>
					{/foreach}
					</ul>
				{/if}
				{literal}
<!--					end get similar offers-->	
			</div>
			</div>
		</div>
	</div>
	<script>
	$(function(){
		$('#detail-description').jScrollPane();

		var api = $('#detail-flight-description').jScrollPane({
						showArrows:false,
						maintainPosition: false
					}).data('jsp');

		$( "#detail-btn-details" ).click(function() {
			api.getContentPane().load(
						'{/literal}{url o=flight m=location}{literal}?new_layout=ajax_vacancy_ticket_details&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
						function(){
							api.reinitialise();
						});
					return false;
		});
		$( "#detail-btn-info" ).click(function() {
			api.getContentPane().load(
						'{/literal}{url o=flight m=location}{literal}?new_layout=ajax_vacancy_ticket_info&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
						function(){
							api.reinitialise();
						});
					return false;
		});

		api.getContentPane().load(
				'{/literal}{url o=flight m=location}{literal}?new_layout=ajax_vacancy_ticket_info_details&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
			function(){
				api.reinitialise();
			});
	});
	$(function() {
		getCountries('1','europe',{/literal}'{$object}','{$method}'{literal});
		getCountries('3','africa',{/literal}'{$object}','{$method}'{literal});
		getCountries('6','asia',{/literal}'{$object}','{$method}'{literal});
		getCountries('4,5','america',{/literal}'{$object}','{$method}'{literal});
		getCountries('7','australia',{/literal}'{$object}','{$method}'{literal});		
	});
	</script>
{/literal}
