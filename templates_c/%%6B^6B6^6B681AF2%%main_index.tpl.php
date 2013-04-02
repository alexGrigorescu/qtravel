<?php /* Smarty version 2.6.18, created on 2013-03-03 10:27:33
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/main_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/main_index.tpl', 13, false),array('modifier', 'count', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/main_index.tpl', 30, false),array('modifier', 'trim', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/main_index.tpl', 187, false),)), $this); ?>
<?php echo '
	
<input type="hidden" id="hid-active-promotion" value="'; ?>
<?php echo $this->_tpl_vars['promotionsVacancyHomeSelected']['code']; ?>
<?php echo '">
<div id="page">
		<div id="bubles">
			<div id="buble-back">
				<a href="#" id="btn-buble-back"><ul><li class="back-active"></li></ul></a>
			</div>
			<div id="buble-container">
				<!-- slider width is set from php as bubleCount * bubleWidth=146px-->
				<div id="buble-slider" style="width:'; ?>
<?php echo $this->_tpl_vars['bubles_slider_width']; ?>
<?php echo 'px;;margin-left:0px;">
					'; ?>
<?php $_from = $this->_tpl_vars['bubles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indexBuble'] => $this->_tpl_vars['buble']):
?>
					<a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['buble']['buble_offer_vacancy_type'],'m' => 'country','country' => $this->_tpl_vars['buble']['code']), $this);?>
" title="Vacante <?php echo $this->_tpl_vars['buble']['title']; ?>
">
					<div class="buble <?php if ($this->_tpl_vars['indexBuble'] == 0): ?>first<?php endif; ?>" itemscope itemtype="http://schema.org/Place">
						<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span class="title" itemprop="addressCountry"><?php echo $this->_tpl_vars['buble']['title']; ?>
</span>
						</div>
						<span class="text">de la</span>
						<div itemprop="event" itemscope itemtype="http://schema.org/Event">
							<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<span class="price" itemprop="price"><?php echo $this->_tpl_vars['buble']['buble_offer_vacancy_value']; ?>
</span>
							</div>
						</div>
						<span class="text">euro</span>
					</div></a>
					<?php endforeach; endif; unset($_from); ?><?php echo '
				</div>
			</div>
			<div id="buble-next">
				<a href="#" id="btn-buble-next"><ul><li class="'; ?>
<?php if (count($this->_tpl_vars['bubles']) < 7): ?>next-inactive<?php else: ?>next-active<?php endif; ?><?php echo '"></li></ul></a>
			</div>
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#fff;">
			<div id="body-engine-full" style="float:left;width:675px;position:relative;left:0;">
				<div id="search">
					<div id="search-header">
						<h1>Oferte vacanta</h1>
						<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/search_text.png">
					</div>
					<div id="search-buttons">
						<ul>
							'; ?>

							<?php if ($this->_tpl_vars['searchVacancyHome']['search_plane']['status'] == 1): ?>
								<li class="btn-search-plane-inactive" id="btn-search-plane"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['searchVacancyHome']['search_bus']['status'] == 1): ?>
								<li class="btn-search-bus-inactive" id="btn-search-bus"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['searchVacancyHome']['search_vacancies']['status'] == 1): ?>
								<li class="btn-search-vacancies-inactive" id="btn-search-vacancies"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['searchVacancyHome']['search_hotels']['status'] == 1): ?>
								<li class="btn-search-hotels-inactive" id="btn-search-hotels"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['searchVacancyHome']['search_rentcar']['status'] == 1): ?>
								<li class="btn-search-rentcar-inactive" id="btn-search-rentcar"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['searchVacancyHome']['search_insurance']['status'] == 1): ?>
								<li class="btn-search-insurance-inactive" id="btn-search-insurance"></li>
							<?php endif; ?>		
							<?php echo '
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
						<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/promo_text.png" class="promo-text">
						<ul>
							'; ?>

							<?php if ($this->_tpl_vars['promotionsVacancyHome']['last_minute']['status'] == 1): ?>
								<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['last_minute']['code']): ?>last-minute-active<?php else: ?>last-minute-inactive<?php endif; ?>" id="last-minute"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['early_booking']['status'] == 1): ?>
								<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['early_booking']['code']): ?> early-booking-active<?php else: ?>early-booking-inactive<?php endif; ?>" id="early-booking"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['easter']['status'] == 1): ?>
								<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['easter']['code']): ?> easter-active <?php else: ?> easter-inactive<?php endif; ?>" id="easter"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['first_may']['status'] == 1): ?>
								<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['first_may']['code']): ?> first-may-active <?php else: ?> first-may-inactive<?php endif; ?>" id="first-may"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['seaside']['status'] == 1): ?>
								<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['seaside']['code']): ?> seaside-active <?php else: ?> seaside-inactive<?php endif; ?>" id="seaside"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['seniors']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['seniors']['code']): ?> seniors-active <?php else: ?> seniors-inactive<?php endif; ?>" id="seniors"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['mountain']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['mountain']['code']): ?> mountain-active <?php else: ?> mountain-inactive<?php endif; ?>" id="mountain"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['events']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['events']['code']): ?> events-active <?php else: ?> events-inactive<?php endif; ?>" id="events"></li>
							<?php endif; ?>	
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['ski']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['ski']['code']): ?> ski-active <?php else: ?> ski-inactive<?php endif; ?>" id="ski"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['noel']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['noel']['code']): ?> noel-active <?php else: ?> noel-inactive<?php endif; ?>" id="noel"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['new_year_eve']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['new_year_eve']['code']): ?> new_year_eve-active <?php else: ?> new_year_eve-inactive<?php endif; ?>" id="new_year_eve"></li>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['promotionsVacancyHome']['spa_balneo']['status'] == 1): ?>
							<li class="<?php if ($this->_tpl_vars['promotionsVacancyHomeSelected']['code'] == $this->_tpl_vars['promotionsVacancyHome']['spa_balneo']['code']): ?> spa_balneo-active <?php else: ?> spa_balneo-inactive<?php endif; ?>" id="spa_balneo"></li>
							<?php endif; ?>
							<?php echo '
						</ul>
					</div>
					<div id="promo-body"></div>
					<div id="promo-footer">
						<a href="#" id="rdb-promo"><img /></a>
						<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/promo_slider_text.png" id="promo-slider-text">
						<a href="#" id="promo-slider-minus"><img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/promo_slider_minus.png"></a>
						<div id="promo-slider-active"></div>
						<a href="#" id="promo-slider-plus"><img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/promo_slider_plus.png"></a>
						<img id="promo-slider-euro" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/promo_slider_euro.png">
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
										'; ?>
<?php $_from = $this->_tpl_vars['locationsAccordion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['locationAccordion']):
?>
											<li>
												<div itemscope itemtype="http://schema.org/Place">
													<a itemprop="url" href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['locationAccordion']['region_code']; ?>
/<?php echo $this->_tpl_vars['locationAccordion']['code']; ?>
.html">
													<div class="promo-item-container" itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
														<img src="<?php echo $this->_tpl_vars['locationAccordion']['location_thumb_url']; ?>
" width="174" height="90" itemprop="contentURL">
													</div>
													</a>
													<div class="promo-text-container">
														<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
															<span class="promo-title-violet" itemprop="addressLocality"><?php echo $this->_tpl_vars['locationAccordion']['region_title']; ?>
</span>
														</div>
														<span itemprop="description" class="promo-text-violet"><?php echo $this->_tpl_vars['locationAccordion']['location_description']; ?>
</span>
													</div>
													<div class="regular-buble" itemprop="event" itemscope itemtype="http://schema.org/Event">
														<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
															<span itemprop="price"><?php echo $this->_tpl_vars['locationAccordion']['price']; ?>
</span>
														</div>
													</div>
												</div>
											</li>
										<?php endforeach; endif; unset($_from); ?><?php echo '
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
						<a target="_new" href="http://www.qtravel.htlrs.net/"><img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/btn_search_external_hotel.png"></a>
					</div>
				</div>
				<div id="right_advertising_bg">
				<ul>
					'; ?>
<?php $_from = $this->_tpl_vars['vacancyOfferAdvertising']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['advertisingList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['advertisingList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['vacancyOffer']):
        $this->_foreach['advertisingList']['iteration']++;
?>
					<?php if (($this->_foreach['advertisingList']['iteration']-1) < 3): ?>
						<?php if ($this->_tpl_vars['vacancyOffer']['offer_type'] == 'accommodations'): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['vacancyOffer']['region_code']; ?>
/<?php echo $this->_tpl_vars['vacancyOffer']['code']; ?>
.html"><li><?php echo $this->_tpl_vars['vacancyOffer']['html_text']; ?>
</li></a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['vacancyOffer']['offer_type'] == 'busses'): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['vacancyOffer']['region_code']; ?>
/<?php echo $this->_tpl_vars['vacancyOffer']['code']; ?>
.html"><li><?php echo $this->_tpl_vars['vacancyOffer']['html_text']; ?>
</li></a>
						<?php endif; ?>
						<?php if (((is_array($_tmp=$this->_tpl_vars['vacancyOffer']['offer_type'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) == 'flights'): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['vacancyOffer']['region_code']; ?>
/<?php echo $this->_tpl_vars['vacancyOffer']['code']; ?>
.html"><li><?php echo $this->_tpl_vars['vacancyOffer']['html_text']; ?>
</li></a>
						<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php echo '
				</ul>
				</div>
				<div id="facebook-container" style="height:430px">
					<div class="like-on-facebook"></div>
					<div class="fb-like-box" data-href="'; ?>
<?php echo $this->_tpl_vars['facebookProfile']; ?>
<?php echo '" data-width="300" data-height="430" data-show-faces="true" data-stream="false" data-header="true"></div>
				</div>
			</div>
		</div>
	</div>
	'; ?>