<?php /* Smarty version 2.6.18, created on 2013-02-07 17:28:03
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/flight_location.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/flight_location.tpl', 6, false),array('modifier', 'count', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/flight_location.tpl', 248, false),)), $this); ?>
<?php echo '
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>'; ?>

			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Bilete </a>
			> <a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'index'), $this);?>
">Avion </a>
			> <a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'region','region' => $this->_tpl_vars['location']['end_region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['end_region_title']; ?>
 </a>
			<?php echo '</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['end_continent_id'] == 1): ?>selected-continent<?php endif; ?>">
							<a href="
								<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/europa/
							">
								<span class="continent-text">EUROPA</span><?php echo '
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['end_continent_id'] == 3): ?>selected-continent<?php endif; ?>">
							<a href="
								<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/africa/
							">
								<span class="continent-text">AFRICA</span><?php echo '
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['end_continent_id'] == 6): ?>selected-continent<?php endif; ?>">
							<a href="
								<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/asia/
							">
								<span class="continent-text">ASIA</span><?php echo '
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['end_continent_id'] == 4 || $this->_tpl_vars['location']['end_continent_id'] == 5): ?>selected-continent<?php endif; ?>">
							<a href="
								<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/america/
							">
								<span class="continent-text">AMERICA</span><?php echo '
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['end_continent_id'] == 7): ?>selected-continent<?php endif; ?>">
							<a href="
								<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/australia/
							">
								<span class="continent-text">AUSTRALIA</span><?php echo '
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
									<h1>Bilet avion '; ?>
<span itemprop="name"><?php echo $this->_tpl_vars['location']['title']; ?>
</span><?php echo '</h1>
								</div>
								<div class="bottom">
									<div class="offer-detail">
										'; ?>
<?php echo $this->_tpl_vars['offer']; ?>
 | <?php echo $this->_tpl_vars['offer_type']; ?>
 | <span itemprop="addressCountry"><?php echo $this->_tpl_vars['location']['end_country_title']; ?>
</span><?php echo '
									</div>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="'; ?>
<?php echo smarty_function_url(array('o' => 'reservation','m' => 'index','type' => 'flights','id' => $this->_tpl_vars['location']['id']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/detail_btn_get_offer.png"></a>
							</div>
						</div>
						<div id="detail-flight-pictures">
							<ul>'; ?>

								<li>
									<div class="left"><?php echo $this->_tpl_vars['location']['flight_operator_1_thumb']; ?>
</div>
									<div class="center">
										<div class="title">
											<?php if ($this->_tpl_vars['location']['flight_operator_1_title'] > ''): ?>
											<span class="description-flight-title">Operator:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_1'] > 0): ?>
											<span class="description-flight-title">Pret Dus:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_1'] > 0): ?>
											<span class="description-flight-title">Pret Dus - Intors:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_1'] > ''): ?>
											<span class="description-flight-title">Escala:</span>
											<?php endif; ?>
										</div>
										<div class="text">
											<?php if ($this->_tpl_vars['location']['flight_operator_1_title'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['flight_operator_1_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_1'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price1_1']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_1'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price2_1']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_1'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['stops_description_1']; ?>
</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="right"></div>
								</li>
								<?php if ($this->_tpl_vars['location']['flight_operator_2_id'] > 0): ?>
								<li>
									<div class="left"><?php echo $this->_tpl_vars['location']['flight_operator_2_thumb']; ?>
</div>
									<div class="center">
										<div class="title">
											<?php if ($this->_tpl_vars['location']['flight_operator_2_title'] > ''): ?>
											<span class="description-flight-title">Operator:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_2'] > 0): ?>
											<span class="description-flight-title">Pret Dus:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_2'] > 0): ?>
											<span class="description-flight-title">Pret Dus - Intors:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_2'] > ''): ?>
											<span class="description-flight-title">Escala:</span>
											<?php endif; ?>
										</div>
										<div class="text">
											<?php if ($this->_tpl_vars['location']['flight_operator_2_title'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['flight_operator_2_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_2'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price1_2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_2'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price2_2']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_2'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['stops_description_2']; ?>
</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="right"></div>
								</li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['location']['flight_operator_3_id'] > 0): ?>
								<li>
									<div class="left"><?php echo $this->_tpl_vars['location']['flight_operator_3_thumb']; ?>
</div>
									<div class="center">
										<div class="title">
											<?php if ($this->_tpl_vars['location']['flight_operator_3_title'] > ''): ?>
											<span class="description-flight-title">Operator:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_3'] > 0): ?>
											<span class="description-flight-title">Pret Dus:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_3'] > 0): ?>
											<span class="description-flight-title">Pret Dus - Intors:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_3'] > ''): ?>
											<span class="description-flight-title">Escala:</span>
											<?php endif; ?>
										</div>
										<div class="text">
											<?php if ($this->_tpl_vars['location']['flight_operator_3_title'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['flight_operator_3_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_3'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price1_3']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_3'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price2_3']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_3'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['stops_description_3']; ?>
</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="right"></div>
								</li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['location']['flight_operator_4_id'] > 0): ?>
								<li>
									<div class="left"><?php echo $this->_tpl_vars['location']['flight_operator_4_thumb']; ?>
</div>
									<div class="center">
										<div class="title">
											<?php if ($this->_tpl_vars['location']['flight_operator_4_title'] > ''): ?>
											<span class="description-flight-title">Operator:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_4'] > 0): ?>
											<span class="description-flight-title">Pret Dus:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_4'] > 0): ?>
											<span class="description-flight-title">Pret Dus - Intors:</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_4'] > ''): ?>
											<span class="description-flight-title">Escala:</span>
											<?php endif; ?>
										</div>
										<div class="text">
											<?php if ($this->_tpl_vars['location']['flight_operator_4_title'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['flight_operator_4_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price1_4'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price1_4']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['price2_4'] > 0): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['price2_4']; ?>
 <?php echo $this->_tpl_vars['location']['currency_title']; ?>
</span>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['location']['stops_description_4'] > ''): ?>
											<span class="description-flight-text"><?php echo $this->_tpl_vars['location']['stops_description_4']; ?>
</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="right"></div>
								</li>
								<?php endif; ?>
							<?php echo '</ul>
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
					'; ?>

					<?php if ($this->_tpl_vars['locationBack']['end_region_code'] != ''): ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['locationBack']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationBack']['code']; ?>
.html"><img class="back" src="<?php echo $this->_tpl_vars['img_path']; ?>
/similar_back.png"></a>
					<?php endif; ?>
					<a rel="nofollow" href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'region','region' => $this->_tpl_vars['location']['end_region_code']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/detail_search_similar_offers.png"></a>
					<?php if ($this->_tpl_vars['locationNext']['end_region_code'] != ''): ?>
						<a href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['locationNext']['end_region_code']; ?>
/<?php echo $this->_tpl_vars['locationNext']['code']; ?>
.html"><img class="next" src="<?php echo $this->_tpl_vars['img_path']; ?>
/similar_next.png"></a>
					<?php endif; ?>
					<?php echo '
				</div>
				
<!--					start get similar offers-->
				'; ?>


				<?php if (count($this->_tpl_vars['similarOffers']) > 0): ?>
					<h2 class="similar">Oferte similare
					<?php if ($this->_tpl_vars['countryRegion'] != ''): ?>in <?php echo $this->_tpl_vars['countryRegion']; ?>
<?php endif; ?></h2>
					<ul style="margin-top:-30px">
					<?php $_from = $this->_tpl_vars['similarOffers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['location_similar']):
?>
					<li  class="hotels-similar" style="background-repeat: no-repeat;height:355px">
						<div itemscope itemtype="http://schema.org/Place">
							<?php if ($this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_bus' || $this->_tpl_vars['object'] == 'accommodation_individual'): ?>
							<a itemprop="url" title="<?php echo $this->_tpl_vars['location_similar']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['location_similar']['region_code']; ?>
/<?php echo $this->_tpl_vars['location_similar']['code']; ?>
.html">
							<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
							<a itemprop="url" title="Bilete avion <?php echo $this->_tpl_vars['location_similar']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['location_similar']['region_code']; ?>
/<?php echo $this->_tpl_vars['location_similar']['code']; ?>
.html">
							<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
							<a itemprop="url" title="<?php echo $this->_tpl_vars['location_similar']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['location_similar']['region_code']; ?>
/<?php echo $this->_tpl_vars['location_similar']['code']; ?>
.html">
							<?php endif; ?>
							 <div class="result-item-container">
							 	<div class="text-stars-container">
								<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['location_similar']['accommodation_type_stars']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = $this->_sections['foo']['loop'];
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?> 
								    <span class="text-stars-symbol">&#9733;</span>
								<?php endfor; endif; ?>
								</div>
								<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
							 		<img src="<?php echo $this->_tpl_vars['location_similar']['location_thumb_url']; ?>
" width="174" height="105" itemprop="contentURL">
							 	</div>
							</div>
							<div class="result-text-container-left">
								<span class="result-promo-value">
								<?php if ($this->_tpl_vars['location_similar']['early_value'] > 0): ?>
								- <?php echo $this->_tpl_vars['location_similar']['early_value']; ?>
%
								<?php endif; ?>
								</span>
								<span class="result-promo-title">
								<?php if ($this->_tpl_vars['location_similar']['early_value'] > 0): ?>
								Early Booking
								<?php endif; ?>
								</span>
							</div>
							<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
								<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<span itemprop="price" class="result-promo-price"><?php echo $this->_tpl_vars['location_similar']['price']; ?>
</span>
								</div>
							</div>
							<div class="result-text-container-right">
								<span class="result-promo-euro">&#8364;</span>
							</div>
							<div class="result-item-title">
								<span itemprop="name"><?php echo $this->_tpl_vars['location_similar']['title']; ?>
</span>
							</div>
							</a>
							<div style="height:30px" class="result-promo-lastoffer-container">
								<span itemprop="description" class="result-promo-lastoffer"><?php echo $this->_tpl_vars['location_similar']['location_description']; ?>
</span>
							</div>
						</div>
					</li>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
				<?php endif; ?>
				<?php echo '
<!--					end get similar offers-->	
			</div>
			</div>
		</div>
	</div>
	<script>
	$(function(){
		$(\'#detail-description\').jScrollPane();

		var api = $(\'#detail-flight-description\').jScrollPane({
						showArrows:false,
						maintainPosition: false
					}).data(\'jsp\');

		$( "#detail-btn-details" ).click(function() {
			api.getContentPane().load(
						\''; ?>
<?php echo smarty_function_url(array('o' => 'flight','m' => 'location'), $this);?>
<?php echo '?new_layout=ajax_vacancy_ticket_details&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '\',
						function(){
							api.reinitialise();
						});
					return false;
		});
		$( "#detail-btn-info" ).click(function() {
			api.getContentPane().load(
						\''; ?>
<?php echo smarty_function_url(array('o' => 'flight','m' => 'location'), $this);?>
<?php echo '?new_layout=ajax_vacancy_ticket_info&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '\',
						function(){
							api.reinitialise();
						});
					return false;
		});

		api.getContentPane().load(
				\''; ?>
<?php echo smarty_function_url(array('o' => 'flight','m' => 'location'), $this);?>
<?php echo '?new_layout=ajax_vacancy_ticket_info_details&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '\',
			function(){
				api.reinitialise();
			});
	});
	$(function() {
		getCountries(\'1\',\'europe\','; ?>
'<?php echo $this->_tpl_vars['object']; ?>
','<?php echo $this->_tpl_vars['method']; ?>
'<?php echo ');
		getCountries(\'3\',\'africa\','; ?>
'<?php echo $this->_tpl_vars['object']; ?>
','<?php echo $this->_tpl_vars['method']; ?>
'<?php echo ');
		getCountries(\'6\',\'asia\','; ?>
'<?php echo $this->_tpl_vars['object']; ?>
','<?php echo $this->_tpl_vars['method']; ?>
'<?php echo ');
		getCountries(\'4,5\',\'america\','; ?>
'<?php echo $this->_tpl_vars['object']; ?>
','<?php echo $this->_tpl_vars['method']; ?>
'<?php echo ');
		getCountries(\'7\',\'australia\','; ?>
'<?php echo $this->_tpl_vars['object']; ?>
','<?php echo $this->_tpl_vars['method']; ?>
'<?php echo ');		
	});
	</script>
'; ?>
