{literal}
<input type="hidden" id="hid-image-count" value="{/literal}{$images_count}{literal}">
<div id="page">
		<div id="contact-clear"></div>
		<div id="page-body">
			<div id="body-engine" class="result">
			
			<div id="detail-content">
				<div id="detail-title">
					<div class="left">
						<div class="top">
							<span>{/literal}Sejur {$location.country_title}, {$location.title} / {$location.region_title}{literal}</span>
						</div>
						<div class="bottom">
							<span>{/literal}{$offer} | {$offer_type} | {$location.country_title}{literal}</span>
						</div>
					</div>
					<div class="right">
						<a href="{/literal}{url o='reservation' m='index' type='accommodations' id=$location.id}"><img src="{$img_path}{literal}/detail_btn_get_offer.png"></a>
					</div>
				</div>
				<div id="detail-pictures">
					<div class="left">
						<div id="detail-image-bg">
							{/literal}{if $pics|@count gt 0}
								<img id="detail-image" src="{$pics.0.thumb_url_vacancy}" width="442" height="331" />
							{else}
								<img id="detail-image" src="{$img_path}/image_not_available.png" width="442" height="331" />
							{/if}{literal}
						</div>
					</div>
					<div class="right">
						{/literal}{if $pics|@count gt 3}
						<div id="image-prev">
						</div>
						{/if}{literal}
						
						<div class="mask">
							<div id="image-slider" style="width:{/literal}{$images_slider_width}{literal}px;margin-top:0px;">
							<ul>
								{/literal}{foreach from=$pics item=pic}
								<li><a href="#" {literal}onclick='$("#detail-image-bg").html("<img src=\"{/literal}{$pic.thumb_url_vacancy}{literal}\" width=\"442\" height=\"331\" /> ");return false;' {/literal}>
									<img src="{$pic.thumb_vacancy}" width="133" height="98" />
								</a></li>
								{/foreach}{literal}
							</ul>
							</div>
						</div>
						
						{/literal}{if $pics|@count gt 3}
						<div id="image-next">
						</div>
						{/if}{literal}
					</div>
				</div>
				<div id="detail-hotel">
					<div class="left">
						<div id="text-container">
							<span class="text-hotel">{/literal}{$location.title}&nbsp;</span>
							<span class="text-stars">{$location.accommodation_type_stars}{literal}&nbsp;</span>
							<span class="text-stars-symbol">&#9733;</span>
							<span class="text-observation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({/literal}{$location.country_title},{$location.region_title}{literal})</span>
						</div>
					</div>
					<div class="right">
						<a href="#"><img src="{/literal}{$img_path}{literal}/detail_btn_get_offer.png"></a>
					</div>
				</div>
				<div id="detail-description"></div>
				<div id="detail-buttons">
					<ul>
						<a href="#"><li id="detail-btn-tarif"></li></a>
						<a href="#"><li id="detail-btn-hotel"></li></a>
						<a href="#"><li id="detail-btn-tarif7"></li></a>
<!--						<a href="#"><li id="detail-btn-info"></li></a>-->
<!--						<a href="#"><li id="detail-btn-impresion"></li></a>-->
					</ul>
				</div>
				<div id="detail-slider">
					<div class="left">
						<img src="{/literal}{$img_path}{literal}/detail_search_label.png">
					</div>
					<div class="right">
						<div id="slider">
							<div class="fast-search-slider-minus">
								<span class="text-stars">2</span>
								<span class="text-stars-symbol">&#9733;</span>
							</div>
							<div id="stars-slider-active"></div>
							<div class="fast-search-slider-plus">
								<span class="text-stars">5</span>
								<span class="text-stars-symbol">&#9733;</span>
							</div>
						</div>
					</div>
				</div>
				<div id="detail-similars">
					{/literal}{if $location.transport eq 0}
					<a href="{url o=accommodation_individual m=index dt="0_"|cat:$location.country_id st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
					{elseif $location.transport eq 1}
					<a href="{url o=accommodation_plane m=index dt="0_"|cat:$location.country_id st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
					{elseif $location.transport eq 2}
					<a href="{url o=accommodation_bus m=index dt="0_"|cat:$location.country_id st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
					{/if}{literal}
				</div>
			</div>
			</div>
			<div id="body-advertising">
				<div id="continents-buttons">
					<ul>
						<li {/literal}{if $location.continent_id eq 1}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=1}"><span class="continent-text">EUROPA</span></a>{literal}
						</li>
						<li {/literal}{if $location.continent_id eq 3}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=3}"><span class="continent-text">AFRICA</span></a>{literal}
						</li>
						<li {/literal}{if $location.continent_id eq 6}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=6}"><span class="continent-text">ASIA</span></a>{literal}
						</li>
						<li {/literal}{if $location.continent_id eq 4 || $ocation.continent_id eq 5}class="selected-continent"{/if}>
							<a href="{url o=$object m='index' c=4_5}"><span class="continent-text">AMERICA</span></a>{literal}
						</li>
						<li {/literal}{if $location.continent_id eq 7}class="selected-continent"{/if}>
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
		var minSlideValue = 2;
		var maxSlideValue = 5;
		$( "#stars-slider-active" ).slider({
			range: "min",
			value: parseInt("{/literal}{$location.accommodation_type_stars}{literal}"),
			min: minSlideValue,
			max: maxSlideValue,
			slide: function( event, ui ) {
				$( "#stars-slider-active > a" ).html(ui.value);
			},
			change: function( event, ui ) {
				var starId;
				switch(ui.value)
				{
				case 1:
					starId=1;
				  	break;
				case 2:
					starId=3;
				  	break;
				case 3:
					starId=5;
					break;
				case 4:
					starId=7;
					break;
				case 5:
					starId=9;
					break;
				default:
					starId=1;
				}
				
				{/literal}{if $offer_type eq 'Individual'}
					location.href = "{url o=accommodation_individual m=index}?dt={$location.region_id}_{$location.country_id}&st="+starId;
				{elseif $offer_type eq 'Avion'}
					location.href = "{url o=accommodation_plane m=index}?dt={$location.region_id}_{$location.country_id}&st="+starId;
				{elseif $offer_type eq 'Autocar'}
					location.href = "{url o=accommodation_bus m=index}?dt={$location.region_id}_{$location.country_id}&st="+starId;
				{/if}{literal}
				$( "#stars-slider-active > a" ).html(ui.value);
			}
		});
		$( "#stars-slider-active > a" ).html($("#stars-slider-active").slider("value"));

		$( "#stars-slider-minus" ).click(function() {
			var currentSliderValue = $( "#stars-slider-active" ).slider("value");
			if(currentSliderValue > minSlideValue){
				$( "#stars-slider-active" ).slider("value",(currentSliderValue-1));
			}
			return false;
		});
		$( "#stars-slider-plus" ).click(function() {
			var currentSliderValue = $( "#stars-slider-active" ).slider("value");
			if(currentSliderValue < maxSlideValue){
				$( "#stars-slider-active" ).slider("value",(currentSliderValue+1));
			}
			return false;
		});
	});
	$(function(){
		$('#detail-description').jScrollPane();

		var api = $('#detail-description').jScrollPane({
						showArrows:false,
						maintainPosition: false
					}).data('jsp');

		$( "#detail-btn-tarif" ).click(function() {
			api.getContentPane().load(
						'{/literal}{url o=accommodation m=location}{literal}?new_layout=ajax_vacancy_detail_tarif&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
						function(){
							api.reinitialise();
						});
					return false;
		});
		$( "#detail-btn-hotel" ).click(function() {
			api.getContentPane().load(
						'{/literal}{url o=accommodation m=location}{literal}?new_layout=ajax_vacancy_detail_hotel&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
						function(){
							api.reinitialise();
						});
					return false;
		});

		$( "#detail-btn-tarif7" ).click(function() {
			api.getContentPane().load(
						'{/literal}{url o=accommodation m=location}{literal}?new_layout=ajax_vacancy_detail_tarif7&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
						function(){
							api.reinitialise();
						});
					return false;
		});

		$( "#detail-btn-tarif" ).click();
	});

	$(function() {
		var bubleWidth = {/literal}{$image_width}{literal}; 
		var currentBubleIndex = 0;
		var bubleCount = parseInt($( "#hid-image-count" ).val());

		
		$( "#image-next" ).click(function() {
			if((currentBubleIndex + 3 + 1) <= bubleCount){
				var currentBubleSlideMarginLeft = parseInt($("#image-slider").css('margin-top'));
				var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + (-bubleWidth);
				if((newBubleSlideMarginLeft%bubleWidth) == 0){
					currentBubleIndex++;
			 		$("#image-slider").animate({'margin-top': newBubleSlideMarginLeft + 'px'});
			 		
			 	}
			} 
			return false;
		});
		$( "#image-prev" ).click(function() {
			if((currentBubleIndex - 1) >= 0){
				var currentBubleSlideMarginLeft = parseInt($("#image-slider").css('margin-top'));
				var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + bubleWidth;
				if((newBubleSlideMarginLeft%bubleWidth) == 0){
					currentBubleIndex--;
					$("#image-slider").animate({'margin-top': newBubleSlideMarginLeft + 'px'});
					
				}		 	
			}
			return false;
		});
	});
	</script>
{/literal}
