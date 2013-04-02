{literal}
<div id="page">
		<div id="contact-clear"></div>
		<div id="page-body">
			<div id="body-engine" class="result">
			
			<div id="detail-content">
				<div id="detail-title">
					<div class="left">
						<div class="top">
							<span>Bilet avion {/literal}{$location.title}{literal}</span>
						</div>
						<div class="bottom">
							<span>{/literal}{$offer} | {$offer_type} | {$location.end_country_title}{literal}</span>
						</div>
					</div>
					<div class="right">
						<a href="{/literal}{url o='reservation' m='index' type='flights' id=$location.id}"><img src="{$img_path}{literal}/detail_btn_get_offer.png"></a>
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
				<div id="detail-buttons">
					<ul>
						<a href="#"><li id="detail-btn-details"></li></a>					
						<a href="#"><li id="detail-btn-info"></li></a>
					</ul>
				</div>
			
				<div id="detail-similars">
					{/literal}
					<a href="{url o=flight m=index dt="0_"|cat:$location.end_country_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
					{literal}
				</div>
			</div>
			</div>
			<div id="body-advertising">
				<div id="continents-buttons">
					<ul>
						<li {/literal}{if $location.end_continent_id eq 1}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=1}"><span class="continent-text">EUROPA</span></a>{literal}
						</li>
						<li {/literal}{if $location.end_continent_id eq 3}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=3}"><span class="continent-text">AFRICA</span></a>{literal}
						</li>
						<li {/literal}{if $location.end_continent_id eq 6}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=6}"><span class="continent-text">ASIA</span></a>{literal}
						</li>
						<li {/literal}{if $location.end_continent_id eq 4 || $location.end_continent_id eq 5}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=4_5}"><span class="continent-text">AMERICA</span></a>{literal}
						</li>
						<li {/literal}{if $location.end_continent_id eq 7}class="selected-continent"{/if}>
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

		$( "#detail-btn-details" ).click();
	});
	</script>
{/literal}
