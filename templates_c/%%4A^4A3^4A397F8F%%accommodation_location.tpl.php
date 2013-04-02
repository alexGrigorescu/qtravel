<?php /* Smarty version 2.6.18, created on 2013-03-04 17:43:28
         compiled from D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/accommodation_location.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/accommodation_location.tpl', 7, false),array('modifier', 'count', 'D:/wamp/www/qtravel/public_html/systems/oferta-vacanta/templates/member/accommodation_location.tpl', 117, false),)), $this); ?>
<?php echo '
<input type="hidden" id="hid-image-count" value="'; ?>
<?php echo $this->_tpl_vars['images_count']; ?>
<?php echo '">
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>'; ?>

			<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Vacante </a>
			<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
				> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Avion </a>
			<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
				> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Autocar </a>
			<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
				> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Individual </a>
		    <?php endif; ?>
		    	> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
 </a>
			<?php echo '</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">				
				<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
					<div id="continents-buttons">
						<ul class="continent">
							<li id="europe" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 1): ?>selected-continent<?php endif; ?>">
								<a href="
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/europa/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-autocar/europa/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-individual/europa/
									<?php endif; ?>
								">
									<span class="continent-text">EUROPA</span><?php echo '
								</a>
								<div id="country-list-europe" class="country-list"></div>
							</li>
							<li id="africa" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 3): ?>selected-continent<?php endif; ?>">
								<a href="
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/africa/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-autocar/africa/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-individual/africa/
									<?php endif; ?>
								">
									<span class="continent-text">AFRICA</span><?php echo '
								</a>
								<div id="country-list-africa" class="country-list"></div>
							</li>
							<li id="asia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 6): ?>selected-continent<?php endif; ?>">
								<a href="
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/asia/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-autocar/asia/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-individual/asia/
									<?php endif; ?>
								">
									<span class="continent-text">ASIA</span><?php echo '
								</a>
								<div id="country-list-asia" class="country-list"></div>
							</li>
							<li id="america" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 4 || $this->_tpl_vars['location']['continent_id'] == 5): ?>selected-continent<?php endif; ?>">
								<a href="
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/america/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-autocar/america/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-individual/america/
									<?php endif; ?>
								">
									<span class="continent-text">AMERICA</span><?php echo '
								</a>
								<div id="country-list-america" class="country-list"></div>
							</li>
							<li id="australia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 7): ?>selected-continent<?php endif; ?>">
								<a href="
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/australia/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-autocar/australia/
									<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
vacanta-individual/australia/
									<?php endif; ?>
								">
									<span class="continent-text">AUSTRALIA</span><?php echo '
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
									<h1>'; ?>
<span itemprop="name"><?php echo $this->_tpl_vars['location']['title']; ?>
</span> / <span itemprop="addressLocality"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</span><?php echo '</h1>
								</div>
								<div class="bottom">
									<div class="offer-detail">
										'; ?>
<?php echo $this->_tpl_vars['offer']; ?>
 | <?php echo $this->_tpl_vars['offer_type']; ?>
 | <span itemprop="addressCountry"><?php echo $this->_tpl_vars['location']['country_title']; ?>
</span><?php echo '
									</div>
								</div>
							</div>
							<div class="right">
								<a rel="nofollow" href="'; ?>
<?php echo smarty_function_url(array('o' => 'reservation','m' => 'index','type' => 'accommodations','id' => $this->_tpl_vars['location']['id']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/detail_btn_get_offer.png"></a>
							</div>
						</div>
						<div id="detail-pictures">
							<div class="left">
								<div id="detail-image-bg">
									'; ?>
<?php if (count($this->_tpl_vars['pics']) > 0): ?>
										<img alt="<?php echo $this->_tpl_vars['location']['title']; ?>
" id="detail-image" src="<?php echo $this->_tpl_vars['pics']['0']['thumb_url_vacancy']; ?>
" width="442" height="331" />
									<?php else: ?>
										<img alt="<?php echo $this->_tpl_vars['location']['title']; ?>
" id="detail-image" src="<?php echo $this->_tpl_vars['img_path']; ?>
/image_not_available.png" width="442" height="331" />
									<?php endif; ?><?php echo '
								</div>
							</div>
							<div class="right">
								'; ?>
<?php if (count($this->_tpl_vars['pics']) > 3): ?>
								<div id="image-prev">
								</div>
								<?php endif; ?><?php echo '
								
								<div class="mask">
									<div id="image-slider" style="width:'; ?>
<?php echo $this->_tpl_vars['images_slider_width']; ?>
<?php echo 'px;margin-top:0px;">
									<ul>
										'; ?>
<?php $_from = $this->_tpl_vars['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
										<li><a href="#" <?php echo 'onclick=\'$("#detail-image-bg").html("<img src=\\"'; ?>
<?php echo $this->_tpl_vars['pic']['thumb_url_vacancy']; ?>
<?php echo '\\" width=\\"442\\" height=\\"331\\" /> ");return false;\' '; ?>
>
											<img src="<?php echo $this->_tpl_vars['pic']['thumb_vacancy']; ?>
" width="133" height="98" />
										</a></li>
										<?php endforeach; endif; unset($_from); ?><?php echo '
									</ul>
									</div>
								</div>
								
								'; ?>
<?php if (count($this->_tpl_vars['pics']) > 3): ?>
								<div id="image-next">
								</div>
								<?php endif; ?><?php echo '
							</div>
						</div>
						<div id="detail-hotel">
							<div class="left">
								<div id="text-container">
									<h2>'; ?>
<?php echo $this->_tpl_vars['location']['title']; ?>
<?php echo '&nbsp;</h2>
		<!--							<span class="text-stars">{$location.accommodation_type_stars}{literal}&nbsp;</span>-->
									'; ?>

									<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['location']['accommodation_type_stars']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<?php echo '
									<span class="text-observation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('; ?>
<?php echo $this->_tpl_vars['location']['country_title']; ?>
,<?php echo $this->_tpl_vars['location']['region_title']; ?>
<?php echo ')</span>
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
							'; ?>

							<?php if ($this->_tpl_vars['location']['accommodation_period'] == 21): ?>
								<a href="#"><li id="detail-btn-tarif7"></li></a>
							<?php endif; ?>
							<?php echo '
	<!--						<a href="#"><li id="detail-btn-info"></li></a>-->
	<!--						<a href="#"><li id="detail-btn-impresion"></li></a>-->
						</ul>
					</div>
					<div id="detail-similars">
						'; ?>

							<?php if ($this->_tpl_vars['locationBack']['region_code'] != ''): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['locationBack']['region_code']; ?>
/<?php echo $this->_tpl_vars['locationBack']['code']; ?>
.html"><img class="back" src="<?php echo $this->_tpl_vars['img_path']; ?>
/similar_back.png"></a>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['location']['transport'] == 0): ?>
							<a rel="nofollow" href="<?php echo smarty_function_url(array('o' => 'accommodation_individual','m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'st' => $this->_tpl_vars['location']['accommodation_type_stars_id']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/detail_search_similar_offers.png"></a>
							<?php elseif ($this->_tpl_vars['location']['transport'] == 1): ?>
							<a rel="nofollow" href="<?php echo smarty_function_url(array('o' => 'accommodation_plane','m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'st' => $this->_tpl_vars['location']['accommodation_type_stars_id']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/detail_search_similar_offers.png"></a>
							<?php elseif ($this->_tpl_vars['location']['transport'] == 2): ?>
							<a rel="nofollow" href="<?php echo smarty_function_url(array('o' => 'accommodation_bus','m' => 'region','region' => $this->_tpl_vars['location']['region_code'],'st' => $this->_tpl_vars['location']['accommodation_type_stars_id']), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/detail_search_similar_offers.png"></a>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['locationNext']['region_code'] != ''): ?>
							<a href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['locationNext']['region_code']; ?>
/<?php echo $this->_tpl_vars['locationNext']['code']; ?>
.html"><img class="next" src="<?php echo $this->_tpl_vars['img_path']; ?>
/similar_next.png"></a>
							<?php endif; ?>
						<?php echo '
					</div>
<!--					start get similar offers-->
					'; ?>

					<?php if (( $this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_individual' || $this->_tpl_vars['object'] == 'accommodation_bus' ) && count($this->_tpl_vars['similarOffers']) > 0): ?>
						<h2>Oferte similare
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
//		$(\'#detail-description-full\').jScrollPane();

//		var api = $(\'#detail-description-full\').jScrollPane({
//						showArrows:false,
//						maintainPosition: false
//					}).data(\'jsp\');

//		$( "#detail-btn-tarif" ).click(function() {
//			api.getContentPane().load(
//						\''; ?>
<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['location']['code']), $this);?>
<?php echo '?new_layout=ajax_vacancy_detail_tarif&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '\',
//						function(){
//							api.reinitialise();
//						});
//					return false;
//		});
		$( "#detail-btn-tarif" ).click(function() {
			$.ajax({
				  type: "POST",
				  url: "'; ?>
<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['location']['code']), $this);?>
<?php echo '?new_layout=ajax_vacancy_detail_tarif&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '",
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
				  url: "'; ?>
<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['location']['code']), $this);?>
<?php echo '?new_layout=ajax_vacancy_detail_hotel&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '",
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
				  url: "'; ?>
<?php echo smarty_function_url(array('o' => 'accommodation','m' => 'location','location' => $this->_tpl_vars['location']['code']), $this);?>
<?php echo '?new_layout=ajax_vacancy_detail_tarif7&location='; ?>
<?php echo $this->_tpl_vars['location']['code']; ?>
<?php echo '&region='; ?>
<?php echo $this->_tpl_vars['location']['region_code']; ?>
<?php echo '",
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
		var bubleWidth = '; ?>
<?php echo $this->_tpl_vars['image_width']; ?>
<?php echo '; 
		var currentBubleIndex = 0;
		var bubleCount = parseInt($( "#hid-image-count" ).val());

		
		$( "#image-next" ).click(function() {
			if((currentBubleIndex + 3 + 1) <= bubleCount){
				var currentBubleSlideMarginLeft = parseInt($("#image-slider").css(\'margin-top\'));
				var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + (-bubleWidth);
				if((newBubleSlideMarginLeft%bubleWidth) == 0){
					currentBubleIndex++;
			 		$("#image-slider").animate({\'margin-top\': newBubleSlideMarginLeft + \'px\'});
			 		
			 	}
			} 
			return false;
		});
		$( "#image-prev" ).click(function() {
			if((currentBubleIndex - 1) >= 0){
				var currentBubleSlideMarginLeft = parseInt($("#image-slider").css(\'margin-top\'));
				var newBubleSlideMarginLeft = currentBubleSlideMarginLeft + bubleWidth;
				if((newBubleSlideMarginLeft%bubleWidth) == 0){
					currentBubleIndex--;
					$("#image-slider").animate({\'margin-top\': newBubleSlideMarginLeft + \'px\'});
					
				}		 	
			}
			return false;
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
