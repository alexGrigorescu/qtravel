{literal}
<input type="hidden" id="hid-image-count" value="{/literal}{$images_count}{literal}">
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>{/literal}
			<a href="{url o='main' m='index'}">Vacante </a>
			{if $object eq 'accommodation_plane'}
				> <a href="{url o=$object m='index'}">Avion </a>
			{elseif $object eq 'accommodation_bus'}
				> <a href="{url o=$object m='index'}">Autocar </a>
			{elseif $object eq 'accommodation_individual'}
				> <a href="{url o=$object m='index'}">Individual </a>
		    {/if}
		    	> <a href="{url o=$object m=region region=$location.region_code}">{$location.region_title} </a>
			{literal}</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">				
				<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
					<div id="continents-buttons">
						<ul class="continent">
							<li id="europe" class="continent {/literal}{if $location.continent_id eq 1}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/europa/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/europa/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/europa/
									{/if}
								">
									<span class="continent-text">EUROPA</span>{literal}
								</a>
								<div id="country-list-europe" class="country-list"></div>
							</li>
							<li id="africa" class="continent {/literal}{if $location.continent_id eq 3}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/africa/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/africa/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/africa/
									{/if}
								">
									<span class="continent-text">AFRICA</span>{literal}
								</a>
								<div id="country-list-africa" class="country-list"></div>
							</li>
							<li id="asia" class="continent {/literal}{if $location.continent_id eq 6}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/asia/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/asia/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/asia/
									{/if}
								">
									<span class="continent-text">ASIA</span>{literal}
								</a>
								<div id="country-list-asia" class="country-list"></div>
							</li>
							<li id="america" class="continent {/literal}{if $location.continent_id eq 4 || $location.continent_id eq 5}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/america/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/america/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/america/
									{/if}
								">
									<span class="continent-text">AMERICA</span>{literal}
								</a>
								<div id="country-list-america" class="country-list"></div>
							</li>
							<li id="australia" class="continent {/literal}{if $location.continent_id eq 7}selected-continent{/if}">
								<a href="
									{if $object eq 'accommodation_plane'}
										{$url}vacanta-avion/australia/
									{elseif $object eq 'accommodation_bus'}
										{$url}vacanta-autocar/australia/
									{elseif $object eq 'accommodation_individual'}
										{$url}vacanta-individual/australia/
									{/if}
								">
									<span class="continent-text">AUSTRALIA</span>{literal}
								</a>
								<div id="country-list-australia" class="country-list"></div>
							</li>
						</ul>
					</div>
					
				</div>				
				<div id="body-engine-full-height" style="float:left;width:675px;position:relative;left:0;">
				<div id="detail-content-full-height">
					<div itemscope itemtype="http://schema.org/Place">
						<div id="detail-title">
							<div class="left" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
								<div class="top">
									<h1>{/literal}<span itemprop="name">{$location.title}</span> / <span itemprop="addressLocality">{$location.region_title}</span>{literal}</h1>
								</div>
								<div class="bottom">
									<div class="offer-detail">
										{/literal}{$offer} | {$offer_type} | <span itemprop="addressCountry">{$location.country_title}</span>{literal}
									</div>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="{/literal}{url o='reservation' m='index' type='accommodations' id=$location.id}"><img src="{$img_path}{literal}/detail_btn_get_offer.png"></a>
							</div>
						</div>
						<div id="detail-pictures">
							<div class="left">
								<div id="detail-image-bg">
									{/literal}{if $pics|@count gt 0}
										<img alt="{$location.title}" id="detail-image" src="{$pics.0.thumb_url_vacancy}" width="442" height="331" />
									{else}
										<img alt="{$location.title}" id="detail-image" src="{$img_path}/image_not_available.png" width="442" height="331" />
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
									<h2>{/literal}{$location.title}{literal}&nbsp;</h2>
		<!--							<span class="text-stars">{$location.accommodation_type_stars}{literal}&nbsp;</span>-->
									{/literal}
									{section name=foo loop=$location.accommodation_type_stars} 
									    <span class="text-stars-symbol">&#9733;</span>
									{/section}
									{literal}
									<span class="text-observation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({/literal}{$location.country_title},{$location.region_title}{literal})</span>
								</div>
							</div>
							<div class="right">
							</div>
						</div>
						<div id="detail-description-full"></div>
					</div>
					<div id="detail-buttons">
						<ul>
							<a href="#"><li id="detail-btn-hotel"></li></a>
							<a href="#"><li id="detail-btn-tarif"></li></a>
							{/literal}
							{if $location.accommodation_period eq 21}
								<a href="#"><li id="detail-btn-tarif7"></li></a>
							{/if}
							{literal}
	<!--						<a href="#"><li id="detail-btn-info"></li></a>-->
	<!--						<a href="#"><li id="detail-btn-impresion"></li></a>-->
						</ul>
					</div>
					<div id="detail-similars">
						{/literal}
							{if $locationBack.region_code neq ''}
							<a href="{$url}cazare/{$locationBack.region_code}/{$locationBack.code}.html"><img class="back" src="{$img_path}/similar_back.png"></a>
							{/if}
							{if $location.transport eq 0}
							<a rel="nofollow" href="{url o=accommodation_individual m=region region=$location.region_code st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
							{elseif $location.transport eq 1}
							<a rel="nofollow" href="{url o=accommodation_plane m=region region=$location.region_code st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
							{elseif $location.transport eq 2}
							<a rel="nofollow" href="{url o=accommodation_bus m=region region=$location.region_code st=$location.accommodation_type_stars_id}"><img src="{$img_path}/detail_search_similar_offers.png"></a>
							{/if}
							{if $locationNext.region_code neq ''}
							<a href="{$url}cazare/{$locationNext.region_code}/{$locationNext.code}.html"><img class="next" src="{$img_path}/similar_next.png"></a>
							{/if}
						{literal}
					</div>
<!--					start get similar offers-->
					{/literal}
					{if ($object eq 'accommodation_plane' || $object eq 'accommodation_individual' || $object eq 'accommodation_bus') && $similarOffers|@count gt 0}
						<h2>Oferte similare
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
//		$('#detail-description-full').jScrollPane();

//		var api = $('#detail-description-full').jScrollPane({
//						showArrows:false,
//						maintainPosition: false
//					}).data('jsp');

//		$( "#detail-btn-tarif" ).click(function() {
//			api.getContentPane().load(
//						'{/literal}{url o=accommodation m=location location=$location.code}{literal}?new_layout=ajax_vacancy_detail_tarif&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}',
//						function(){
//							api.reinitialise();
//						});
//					return false;
//		});
		$( "#detail-btn-tarif" ).click(function() {
			$.ajax({
				  type: "POST",
				  url: "{/literal}{url o=accommodation m=location location=$location.code}{literal}?new_layout=ajax_vacancy_detail_tarif&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}",
				  data: "val=11",
				  success: function(html){
				   $("#detail-description-full").html(html);
				  }
				});
			return false;
		});
		$( "#detail-btn-hotel" ).click(function() {
			$.ajax({
				  type: "POST",
				  url: "{/literal}{url o=accommodation m=location location=$location.code}{literal}?new_layout=ajax_vacancy_detail_hotel&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}",
				  data: "val=11",
				  success: function(html){
				   $("#detail-description-full").html(html);
				  }
				});
			return false;
		});

		$( "#detail-btn-tarif7" ).click(function() {
			$.ajax({
				  type: "POST",
				  url: "{/literal}{url o=accommodation m=location location=$location.code}{literal}?new_layout=ajax_vacancy_detail_tarif7&location={/literal}{$location.code}{literal}&region={/literal}{$location.region_code}{literal}",
				  data: "val=11",
				  success: function(html){
				   $("#detail-description-full").html(html);
				  }
				});
			return false;
		});

		$( "#detail-btn-hotel" ).click();
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
	$(function() {
		getCountries('1','europe',{/literal}'{$object}','{$method}'{literal});
		getCountries('3','africa',{/literal}'{$object}','{$method}'{literal});
		getCountries('6','asia',{/literal}'{$object}','{$method}'{literal});
		getCountries('4,5','america',{/literal}'{$object}','{$method}'{literal});
		getCountries('7','australia',{/literal}'{$object}','{$method}'{literal});	
	});
	</script>
{/literal}
