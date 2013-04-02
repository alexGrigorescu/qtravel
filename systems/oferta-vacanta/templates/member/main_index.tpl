{literal}
	
<input type="hidden" id="hid-active-promotion" value="{/literal}{$promotionsVacancyHomeSelected.code}{literal}">
<div id="page">
		<div id="bubles">
			<div id="buble-back">
				<a href="#" id="btn-buble-back"><ul><li class="back-active"></li></ul></a>
			</div>
			<div id="buble-container">
				<!-- slider width is set from php as bubleCount * bubleWidth=146px-->
				<div id="buble-slider" style="width:{/literal}{$bubles_slider_width}{literal}px;;margin-left:0px;">
					{/literal}{foreach from=$bubles key=indexBuble item=buble}
					<a href="{url o=$buble.buble_offer_vacancy_type m=country country=$buble.code}" title="Vacante {$buble.title}">
					<div class="buble {if $indexBuble eq 0}first{/if}" itemscope itemtype="http://schema.org/Place">
						<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span class="title" itemprop="addressCountry">{$buble.title}</span>
						</div>
						<span class="text">de la</span>
						<div itemprop="event" itemscope itemtype="http://schema.org/Event">
							<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<span class="price" itemprop="price">{$buble.buble_offer_vacancy_value}</span>
							</div>
						</div>
						<span class="text">euro</span>
					</div></a>
					{/foreach}{literal}
				</div>
			</div>
			<div id="buble-next">
				<a href="#" id="btn-buble-next"><ul><li class="{/literal}{if $bubles|@count lt 7}next-inactive{else}next-active{/if}{literal}"></li></ul></a>
			</div>
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#fff;">
			<div id="body-engine-full" style="float:left;width:675px;position:relative;left:0;">
				<div id="search">
					<div id="search-header">
						<h1>Oferte vacanta</h1>
						<img src="{/literal}{$img_path}{literal}/search_text.png">
					</div>
					<div id="search-buttons">
						<ul>
							{/literal}
							{if $searchVacancyHome.search_plane.status eq 1}
								<li class="btn-search-plane-inactive" id="btn-search-plane"></li>
							{/if}
							{if $searchVacancyHome.search_bus.status eq 1}
								<li class="btn-search-bus-inactive" id="btn-search-bus"></li>
							{/if}
							{if $searchVacancyHome.search_vacancies.status eq 1}
								<li class="btn-search-vacancies-inactive" id="btn-search-vacancies"></li>
							{/if}
							{if $searchVacancyHome.search_hotels.status eq 1}
								<li class="btn-search-hotels-inactive" id="btn-search-hotels"></li>
							{/if}
							{if $searchVacancyHome.search_rentcar.status eq 1}
								<li class="btn-search-rentcar-inactive" id="btn-search-rentcar"></li>
							{/if}
							{if $searchVacancyHome.search_insurance.status eq 1}
								<li class="btn-search-insurance-inactive" id="btn-search-insurance"></li>
							{/if}		
							{literal}
						</ul>
					</div>
					<div id="search-filter">
						<div id="search-fields">
						</div>
						<div id="search-action">
							<div id="btn-search-container">
								<a href="#"><ul><li id="btn-search"></li></ul></a>
							</div>
						</div>
					</div>
				</div>
				<!-- -->
				<div id="promo-container">
					<div id="promo-header">
						<h2>De ce Oferta-vacanta.ro?</h2>
						<img src="{/literal}{$img_path}{literal}/promo_text.png" class="promo-text">
						<ul>
							{/literal}
							{if $promotionsVacancyHome.last_minute.status eq 1}
								<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.last_minute.code }last-minute-active{else}last-minute-inactive{/if}" id="last-minute"></li>
							{/if}
							{if $promotionsVacancyHome.early_booking.status eq 1}
								<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.early_booking.code } early-booking-active{else}early-booking-inactive{/if}" id="early-booking"></li>
							{/if}
							{if $promotionsVacancyHome.easter.status eq 1}
								<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.easter.code } easter-active {else} easter-inactive{/if}" id="easter"></li>
							{/if}
							{if $promotionsVacancyHome.first_may.status eq 1}
								<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.first_may.code } first-may-active {else} first-may-inactive{/if}" id="first-may"></li>
							{/if}
							{if $promotionsVacancyHome.seaside.status eq 1}
								<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.seaside.code } seaside-active {else} seaside-inactive{/if}" id="seaside"></li>
							{/if}
							{if $promotionsVacancyHome.seniors.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.seniors.code } seniors-active {else} seniors-inactive{/if}" id="seniors"></li>
							{/if}
							{if $promotionsVacancyHome.mountain.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.mountain.code } mountain-active {else} mountain-inactive{/if}" id="mountain"></li>
							{/if}
							{if $promotionsVacancyHome.events.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.events.code } events-active {else} events-inactive{/if}" id="events"></li>
							{/if}	
							{if $promotionsVacancyHome.ski.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.ski.code } ski-active {else} ski-inactive{/if}" id="ski"></li>
							{/if}
							{if $promotionsVacancyHome.noel.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.noel.code } noel-active {else} noel-inactive{/if}" id="noel"></li>
							{/if}
							{if $promotionsVacancyHome.new_year_eve.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.new_year_eve.code } new_year_eve-active {else} new_year_eve-inactive{/if}" id="new_year_eve"></li>
							{/if}
							{if $promotionsVacancyHome.spa_balneo.status eq 1}
							<li class="{if $promotionsVacancyHomeSelected.code eq $promotionsVacancyHome.spa_balneo.code } spa_balneo-active {else} spa_balneo-inactive{/if}" id="spa_balneo"></li>
							{/if}
							{literal}
						</ul>
					</div>
					<div id="promo-body"></div>
					<div id="promo-footer">
						<a href="#" id="rdb-promo"><img /></a>
						<img src="{/literal}{$img_path}{literal}/promo_slider_text.png" id="promo-slider-text">
						<a href="#" id="promo-slider-minus"><img src="{/literal}{$img_path}{literal}/promo_slider_minus.png"></a>
						<div id="promo-slider-active"></div>
						<a href="#" id="promo-slider-plus"><img src="{/literal}{$img_path}{literal}/promo_slider_plus.png"></a>
						<img id="promo-slider-euro" src="{/literal}{$img_path}{literal}/promo_slider_euro.png">
						<div id="promo-slider-inactive"></div>
					</div>
				</div>
			<div id="accordion-home-promo" style="padding:10px 10px 10px 12px;border:0 !important;">
				<div>
					<div class="title accordion-title"><h2>Ultimele oferte de vacanta adaugate</h2></div>
						<div id="promo-accordion" style="display:none">
							<div id="promo-body">
								<div id="promo-offers">
									<ul>
										{/literal}{foreach from=$locationsAccordion item=locationAccordion}
											<li>
												<div itemscope itemtype="http://schema.org/Place">
													<a itemprop="url" href="{$url}cazare/{$locationAccordion.region_code}/{$locationAccordion.code}.html">
													<div class="promo-item-container" itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
														<img src="{$locationAccordion.location_thumb_url}" width="174" height="90" itemprop="contentURL">
													</div>
													</a>
													<div class="promo-text-container">
														<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
															<span class="promo-title-violet" itemprop="addressLocality">{$locationAccordion.region_title}</span>
														</div>
														<span itemprop="description" class="promo-text-violet">{$locationAccordion.location_description}</span>
													</div>
													<div class="regular-buble" itemprop="event" itemscope itemtype="http://schema.org/Event">
														<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
															<span itemprop="price">{$locationAccordion.price}</span>
														</div>
													</div>
												</div>
											</li>
										{/foreach}{literal}
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
			</div>
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="search-external-hotel">
					<div id="search-external-advertising">
						<h3>REZERVARI HOTELURI</h3>
						<div class="hotels-reservation">Te ajutam sa-ti gasesti hotelul potrivit oriunde pe mapamond cu ajutorul aplicatiei noastre extrem de usor de folosit.</div>
					</div>
					<div id="search-external-button">
						<a target="_new" href="http://www.qtravel.htlrs.net/"><img src="{/literal}{$img_path}{literal}/btn_search_external_hotel.png"></a>
					</div>
				</div>
				<div id="right_advertising_bg">
				<ul>
					{/literal}{foreach from=$vacancyOfferAdvertising name=advertisingList item=vacancyOffer}
					{if $smarty.foreach.advertisingList.index lt 3}
						{if $vacancyOffer.offer_type eq 'accommodations'}
							<a href="{$url}cazare/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li>{$vacancyOffer.html_text}</li></a>
						{/if}
						{if $vacancyOffer.offer_type eq 'busses'}
							<a href="{$url}bilet-autocar/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li>{$vacancyOffer.html_text}</li></a>
						{/if}
						{if $vacancyOffer.offer_type|trim eq 'flights'}
							<a href="{$url}bilet-avion/{$vacancyOffer.region_code}/{$vacancyOffer.code}.html"><li>{$vacancyOffer.html_text}</li></a>
						{/if}
					{/if}
					{/foreach}{literal}
				</ul>
				</div>
				<div id="facebook-container" style="height:430px">
					<div class="like-on-facebook"></div>
					<div class="fb-like-box" data-href="{/literal}{$facebookProfile}{literal}" data-width="300" data-height="430" data-show-faces="true" data-stream="false" data-header="true"></div>
				</div>
			</div>
		</div>
	</div>
	{/literal}