<?php /* Smarty version 2.6.18, created on 2013-02-07 17:26:53
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/main_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/main_list.tpl', 6, false),array('modifier', 'string_format', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/main_list.tpl', 381, false),array('modifier', 'count', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/main_list.tpl', 430, false),)), $this); ?>
<?php echo '	
<div id="page">
		<div id="result-fast-search">
			<div class="div-breadcrumbs">
				<span>'; ?>

				<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">
					<?php if ($this->_tpl_vars['object'] == 'flight' || $this->_tpl_vars['object'] == 'buss'): ?>
						Bilete 
					<?php else: ?>
						Vacante
					<?php endif; ?>
				</a>
				
				<?php if ($this->_tpl_vars['continentCode'] != '' || $this->_tpl_vars['countryCode'] != '' || $this->_tpl_vars['regionCode'] != ''): ?>
					<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
						> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Avion </a>
					<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
						> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Autocar </a>
					<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
						> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Individual </a>
					<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
						> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Avion </a>
					<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
						> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'index'), $this);?>
">Autocar </a>
					<?php endif; ?>
					
					<?php if ($this->_tpl_vars['regionTitle'] != ''): ?>
						> <?php echo $this->_tpl_vars['regionTitle']; ?>
 
					<?php elseif ($this->_tpl_vars['countryTitle'] != ''): ?>
						> <?php echo $this->_tpl_vars['countryTitle']; ?>

					<?php elseif ($this->_tpl_vars['continentTitle'] != ''): ?>
						> <?php echo $this->_tpl_vars['continentTitle']; ?>

					<?php endif; ?>
				<?php else: ?>
					<?php if ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
						> Avion 
					<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
						> Autocar 
					<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
						> Individual 
					<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
						> Avion 
					<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
						> Autocar 
					<?php endif; ?>
				<?php endif; ?>

				
				
				<?php echo '</span>	
			</div>
			<div id="fast-search-top">
				<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_text.png">
			</div>
			<div id="fast-search-middle">
				<div class="left">
					<div class="fast-search-container">
						<img class="fast-search-text" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_pick_vacancy.png">
						'; ?>

						<div id="filter-vacancy">
							<div class="rdb">
							<?php if ($this->_tpl_vars['searchType'] == 'vacancy'): ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
							<?php else: ?>
								<a href="<?php echo smarty_function_url(array('o' => 'accommodation_plane','m' => 'index'), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png"></a>
							<?php endif; ?>
							</div>
							<div class="text">Vacante</div>
							<div class="rdb">
							<?php if ($this->_tpl_vars['searchType'] == 'ticket'): ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
							<?php else: ?>
								<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'index'), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png"></a>
							<?php endif; ?>	
							
							</div>
							<div class="text">Bilete</div>
							<?php if ($this->_tpl_vars['menuList']['submenu_tour']['status'] == 1): ?>
								<div class="rdb">
								<?php if ($this->_tpl_vars['searchType'] == 'tour'): ?>
									<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
								<?php else: ?>
									<a href="<?php echo smarty_function_url(array('o' => 'tour_plane','m' => 'index'), $this);?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png"></a>
								<?php endif; ?>
								</div>
								<div class="text">Circuite</div>
							<?php endif; ?>
						</div>
						<?php echo '
					</div>
				</div>
				<div class="right">
					<div class="fast-search-container">
						<img class="fast-search-text" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_pick_transport.png">
						'; ?>

						<div id="filter-transport">
							<div class="rdb">
							<?php if ($this->_tpl_vars['searchTransport'] == 'plane'): ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
							<?php else: ?>
								<?php if ($this->_tpl_vars['searchType'] == 'vacancy'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'accommodation_plane','m' => 'index'), $this);?>
">
								<?php elseif ($this->_tpl_vars['searchType'] == 'ticket'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'flight','m' => 'index'), $this);?>
">
								<?php elseif ($this->_tpl_vars['searchType'] == 'tour'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'tour_plane','m' => 'index'), $this);?>
">
								<?php endif; ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png"></a>
							<?php endif; ?>
							</div>
							<div class="text">Avion</div>
							<div class="rdb">
							<?php if ($this->_tpl_vars['searchTransport'] == 'buss'): ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
							<?php else: ?>
								<?php if ($this->_tpl_vars['searchType'] == 'vacancy'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'accommodation_bus','m' => 'index'), $this);?>
">
								<?php elseif ($this->_tpl_vars['searchType'] == 'ticket'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'buss','m' => 'index'), $this);?>
">
								<?php elseif ($this->_tpl_vars['searchType'] == 'tour'): ?>
									<a href="<?php echo smarty_function_url(array('o' => 'tour_bus','m' => 'index'), $this);?>
">
								<?php endif; ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png"></a>
							<?php endif; ?>
							
							</a></div>
							<div class="text">Autocar</div>
							<?php if ($this->_tpl_vars['searchType'] == 'vacancy'): ?>
								<div class="rdb"><a href="#">
									<?php if ($this->_tpl_vars['searchTransport'] == 'individual'): ?>
										<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_checked.png">
									<?php else: ?>
										<a href="<?php echo smarty_function_url(array('o' => 'accommodation_individual','m' => 'index'), $this);?>
">
										<img src="<?php echo $this->_tpl_vars['img_path']; ?>
/rdb_unchecked.png">
										</a>
									<?php endif; ?>
								</a></div>
								<div class="text">Individual</div>
							<?php endif; ?>
						</div>
						<?php echo '
					</div>
				</div>
			</div>
			<div id="fast-search-bottom">
				<div class="left">
					<div class="fast-search-container">
						<img class="fast-search-text" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_pick_destination.png">
						<div  id="autocomplete-destination-container">
							<input class=" ui-widget ui-widget-content ui-corner-left" autocomplete="off" id="autocomplete-destination">
							<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/input_margin_bg.png" id="btn-autocomplete-destination">
						</div>
					</div>
				</div>
				<div class="right">
					<div class="fast-search-container">
						<img class="fast-search-text" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_pick_price.png">
						<a href="#" id="grid-slider-minus"><img class="fast-search-slider-minus" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_slider_minus.png"></a>
						<a href="#" id="grid-slider-plus"><img class="fast-search-slider-plus" src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/fast_search_slider_plus.png"></a>
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
							<li id="europe" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 1): ?>selected-continent<?php endif; ?>">
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
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/europa/
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/europa/
									<?php endif; ?>
									">
										<span class="continent-text">EUROPA</span><?php echo '
									</a>
								<div id="country-list-europe" class="country-list"></div>
							</li>
							<li id="africa" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 3): ?>selected-continent<?php endif; ?>">
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
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/africa/
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/africa/
									<?php endif; ?>
									">
										<span class="continent-text">AFRICA</span><?php echo '
									</a>
								<div id="country-list-africa" class="country-list"></div>
							</li>
							<li id="asia" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 6): ?>selected-continent<?php endif; ?>">
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
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/asia/
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/asia/
									<?php endif; ?>
								">
									<span class="continent-text">ASIA</span><?php echo '
								</a>
								<div id="country-list-asia" class="country-list"></div>
							</li>
							<li id="america" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == '4_5' || $this->_tpl_vars['continentIdsText'] == '4,5' || $this->_tpl_vars['continentIdsText'] == '8'): ?>selected-continent<?php endif; ?>">
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
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/america/
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/america/
									<?php endif; ?>
								">
									<span class="continent-text">AMERICA</span><?php echo '
								</a>
								<div id="country-list-america" class="country-list"></div>
							</li>
							<li id="australia" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 7): ?>selected-continent<?php endif; ?>">
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
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/australia/
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
										<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/australia/
								<?php endif; ?>
								">
									<span class="continent-text">AUSTRALIA</span><?php echo '
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
								'; ?>
<?php if ($this->_tpl_vars['page'] > 0): ?>
								<a href="
								<?php if ($this->_tpl_vars['continentCode'] == ''): ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['page']-1), $this);?>

								 <?php else: ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['page']-1; ?>

								 <?php endif; ?>">
								<?php endif; ?>	
								<span class="breadcrumbs">&laquo; &laquo;</span>
								<span class="page-text">pagina anterioara</span>
								<?php if ($this->_tpl_vars['page'] > 0): ?>
								</a>
								<?php endif; ?><?php echo '
							</div>
							<div class="page-middle">

								<ul>
									'; ?>
<?php $_from = $this->_tpl_vars['pageRank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pageNo']):
?>
										 <a href="
										 <?php if ($this->_tpl_vars['continentCode'] == ''): ?>
										 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['pageNo']), $this);?>

										 <?php else: ?>
										 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['pageNo']; ?>

										 <?php endif; ?>
										 "><li class="page-count <?php if ($this->_tpl_vars['pageNo'] == $this->_tpl_vars['page']): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['pageNo']+1; ?>
</li></a>
									<?php endforeach; endif; unset($_from); ?><?php echo '
								</ul>
							</div>
							<div class="page-next">
								'; ?>
<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?>
								<a href="
								<?php if ($this->_tpl_vars['continentCode'] == ''): ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['page']+1), $this);?>

								 <?php else: ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['page']+1; ?>

								 <?php endif; ?>">
								<?php endif; ?>	
								<span class="page-text">pagina urmatoare</span>
								<span class="breadcrumbs">&raquo; &raquo;</span>
								<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?>
								</a>
								<?php endif; ?><?php echo '
							</div>
						</div>
					</div>
					<h1>
						'; ?>
 
							<?php if ($this->_tpl_vars['object'] == 'flight'): ?>
							Oferte bilet avion <?php echo $this->_tpl_vars['countryRegion']; ?>

							<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
							Bilete autocar - Oferte bilete autocar <?php echo $this->_tpl_vars['countryRegion']; ?>

							<?php elseif ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
							Oferte vacanta <?php echo $this->_tpl_vars['countryRegion']; ?>
 | Vacante cu avionul <?php if ($this->_tpl_vars['countryRegion'] != ''): ?>in <?php echo $this->_tpl_vars['countryRegion']; ?>
<?php endif; ?>
							<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
							Oferte vacanta <?php echo $this->_tpl_vars['countryRegion']; ?>
 | Vacante cu autocarul <?php if ($this->_tpl_vars['countryRegion'] != ''): ?>in <?php echo $this->_tpl_vars['countryRegion']; ?>
<?php endif; ?>
							<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
							Vacanta <?php echo $this->_tpl_vars['countryRegion']; ?>
 | Oferte vacanta <?php echo $this->_tpl_vars['countryRegion']; ?>

							<?php endif; ?>
						<?php echo '
					</h1>
				</div>
				<div class="result-body">
					<ul>'; ?>

					<?php if ($this->_tpl_vars['display_type'] == 'hotels'): ?>
						<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['offersList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['offersList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['location']):
        $this->_foreach['offersList']['iteration']++;
?>
							<li  class="hotels">
								<div itemscope itemtype="http://schema.org/Place">
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_bus' || $this->_tpl_vars['object'] == 'accommodation_individual'): ?>
									<a itemprop="url" title="<?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
									<a itemprop="url" title="Bilete avion <?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
									<a itemprop="url" title="<?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php endif; ?>
									 <div class="result-item-container">
									 	<div class="text-stars-container">
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
										</div>
										<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
									 		<img src="<?php echo $this->_tpl_vars['location']['location_thumb_url']; ?>
" width="174" height="105" itemprop="contentURL">
									 	</div>
									</div>
									<div class="result-text-container-left">
										<span class="result-promo-value">
										<?php if ($this->_tpl_vars['location']['early_value'] > 0): ?>
										- <?php echo $this->_tpl_vars['location']['early_value']; ?>
%
										<?php endif; ?>
										</span>
										<span class="result-promo-title">
										<?php if ($this->_tpl_vars['location']['early_value'] > 0): ?>
										Early Booking
										<?php endif; ?>
										</span>
									</div>
									<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
										<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<span itemprop="price" class="result-promo-price"><?php echo $this->_tpl_vars['location']['price']; ?>
</span>
										</div>
									</div>
									<div class="result-text-container-right">
										<span class="result-promo-euro">&#8364;</span>
									</div>
									
									<div class="result-item-title" id="result-item-title">
										<span itemprop="name"><?php echo $this->_tpl_vars['location']['title']; ?>
</span>
									</div>
									</a>
	
									<span class="result-promo-lastoffer accordion<?php echo ((is_array($_tmp=($this->_foreach['offersList']['iteration']-1)/3)) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" style="font-weight:bold;cursor:pointer;">Click pentru detalii</span>
									<div id="divDescription<?php echo ($this->_foreach['offersList']['iteration']-1); ?>
" style="display:none">
										<span itemprop="description" class="result-promo-lastoffer"><?php echo $this->_tpl_vars['location']['location_description']; ?>
</span>
									</div>
									<?php if (($this->_foreach['offersList']['iteration']-1)%3 == 0): ?>
										<?php echo '<script>
											$(\'#displayDescription'; ?>
<?php echo ($this->_foreach['offersList']['iteration']-1); ?>
<?php echo '\').click(function () {
										 		'; ?>

											 		<?php if (($this->_foreach['offersList']['iteration']-1)%3 == 0): ?>
											 			<?php echo '
											 			$(\'#divDescription'; ?>
<?php echo ($this->_foreach['offersList']['iteration']-1)+2; ?>
<?php echo '\').toggle();
											 			$(\'#divDescription'; ?>
<?php echo ($this->_foreach['offersList']['iteration']-1); ?>
<?php echo '\').toggle();
											 			$(\'#divDescription'; ?>
<?php echo ($this->_foreach['offersList']['iteration']-1)+1; ?>
<?php echo '\').toggle();
											 			'; ?>

												 	<?php endif; ?>
												<?php echo '
										    });
										</script>'; ?>

									<?php endif; ?>
								</div>
							</li>
							
						<?php endforeach; endif; unset($_from); ?>
					<?php elseif ($this->_tpl_vars['display_type'] == 'towns'): ?>
						<?php $_from = $this->_tpl_vars['locations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['locationName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['locationName']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['location']):
        $this->_foreach['locationName']['iteration']++;
?>
							<div itemscope itemtype="http://schema.org/Place">
								<a  itemprop="url" 
								<?php if ($this->_tpl_vars['object'] == 'flight'): ?>
								title="Bilete avion Bucuresti-<?php echo $this->_tpl_vars['location']['region_title']; ?>
"
								<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
								title="Bilete autocar <?php if ($this->_tpl_vars['location']['region_title'] != ''): ?>Bucuresti-<?php echo $this->_tpl_vars['location']['region_title']; ?>
<?php endif; ?>"
								<?php elseif ($this->_tpl_vars['object'] == 'accommodation_plane'): ?>
								title="Oferte vacanta <?php echo $this->_tpl_vars['location']['region_title']; ?>
 | Vacante cu avionul in <?php echo $this->_tpl_vars['location']['region_title']; ?>
"
								<?php elseif ($this->_tpl_vars['object'] == 'accommodation_bus'): ?>
								title="Oferte vacanta <?php echo $this->_tpl_vars['location']['region_title']; ?>
 | Vacante cu autocarul in <?php echo $this->_tpl_vars['location']['region_title']; ?>
"
								<?php elseif ($this->_tpl_vars['object'] == 'accommodation_individual'): ?>
								title="Vacanta <?php echo $this->_tpl_vars['location']['region_title']; ?>
 | Oferte vacanta <?php echo $this->_tpl_vars['location']['region_title']; ?>
"
								<?php endif; ?>
								 href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code']), $this);?>
">
								<li class="towns <?php if (($this->_foreach['locationName']['iteration']-1) < 3): ?>upper<?php endif; ?>">
									<div class="result-item-title" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<span itemprop="addressLocality"><?php echo $this->_tpl_vars['location']['region_title']; ?>
</span>
									</div>
								</li>
								</a>
							</div>
						<?php endforeach; endif; unset($_from); ?>						
					<?php endif; ?>
					</ul>
					<?php if (( $this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_individual' || $this->_tpl_vars['object'] == 'accommodation_bus' ) && count($this->_tpl_vars['lastOffers']) > 0): ?>
						<h2>Ultimele oferte de vacanta adaugate 
						<?php if ($this->_tpl_vars['countryRegion'] != ''): ?>in <?php echo $this->_tpl_vars['countryRegion']; ?>
<?php endif; ?></h2>
						<ul style="margin-top:-30px">
						<?php $_from = $this->_tpl_vars['lastOffers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['location']):
?>
							<li  class="hotels" style="background-repeat: no-repeat;height:340px">
								<div itemscope itemtype="http://schema.org/Place">
									<?php if ($this->_tpl_vars['object'] == 'accommodation_plane' || $this->_tpl_vars['object'] == 'accommodation_bus' || $this->_tpl_vars['object'] == 'accommodation_individual'): ?>
									<a itemprop="url" title="<?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
cazare/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php elseif ($this->_tpl_vars['object'] == 'flight'): ?>
									<a itemprop="url" title="Bilete avion <?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-avion/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php elseif ($this->_tpl_vars['object'] == 'buss'): ?>
									<a itemprop="url" title="<?php echo $this->_tpl_vars['location']['title']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
bilet-autocar/<?php echo $this->_tpl_vars['location']['region_code']; ?>
/<?php echo $this->_tpl_vars['location']['code']; ?>
.html">
									<?php endif; ?>
									 <div class="result-item-container">
									 	<div class="text-stars-container">
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
										</div>
										<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
									 		<img src="<?php echo $this->_tpl_vars['location']['location_thumb_url']; ?>
" width="174" height="105" itemprop="contentURL">
									 	</div>
									</div>
									<div class="result-text-container-left">
										<span class="result-promo-value">
										<?php if ($this->_tpl_vars['location']['early_value'] > 0): ?>
										- <?php echo $this->_tpl_vars['location']['early_value']; ?>
%
										<?php endif; ?>
										</span>
										<span class="result-promo-title">
										<?php if ($this->_tpl_vars['location']['early_value'] > 0): ?>
										Early Booking
										<?php endif; ?>
										</span>
									</div>
									<div class="result-text-container-middle" itemprop="event" itemscope itemtype="http://schema.org/Event">
										<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											<span itemprop="price" class="result-promo-price"><?php echo $this->_tpl_vars['location']['price']; ?>
</span>
										</div>
									</div>
									<div class="result-text-container-right">
										<span class="result-promo-euro">&#8364;</span>
									</div>
									<div class="result-item-title">
										<span itemprop="name"><?php echo $this->_tpl_vars['location']['title']; ?>
</span>
									</div>
									</a>
									<div style="height:30px" class="result-promo-lastoffer-container">
										<span itemprop="description" class="result-promo-lastoffer"><?php echo $this->_tpl_vars['location']['location_description']; ?>
</span>
									</div>
								</div>
							</li>
						<?php endforeach; endif; unset($_from); ?>
						</ul>
					<?php endif; ?>
				<?php echo '
				</div>
				<div class="result-footer">
					<div class="result-top-paging">
						<div class="paging-container">
							<div class="page-back">
								'; ?>
<?php if ($this->_tpl_vars['page'] > 0): ?>
								<a href="
								<?php if ($this->_tpl_vars['continentCode'] == ''): ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['page']-1), $this);?>

								 <?php else: ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['page']-1; ?>

								 <?php endif; ?>">
								<?php endif; ?>	
								<span class="breadcrumbs">&laquo; &laquo;</span>
								<span class="page-text">pagina anterioara</span>
								<?php if ($this->_tpl_vars['page'] > 0): ?>
								</a>
								<?php endif; ?><?php echo '
							</div>
							<div class="page-middle">
								<ul>
									'; ?>
<?php $_from = $this->_tpl_vars['pageRank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pageNo']):
?>
										<a href="
										<?php if ($this->_tpl_vars['continentCode'] == ''): ?>
										 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['pageNo']), $this);?>

										 <?php else: ?>
										 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['pageNo']; ?>

										 <?php endif; ?>"><li class="page-count <?php if ($this->_tpl_vars['pageNo'] == $this->_tpl_vars['page']): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['pageNo']+1; ?>
</li></a>
									<?php endforeach; endif; unset($_from); ?><?php echo '
								</ul>
							</div>
							<div class="page-next">
								'; ?>
<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?>
								<a href="
								<?php if ($this->_tpl_vars['continentCode'] == ''): ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'p' => $this->_tpl_vars['page']+1), $this);?>

								 <?php else: ?>
								 	<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => $this->_tpl_vars['method'],'continent' => $this->_tpl_vars['continentCode']), $this);?>
?p=<?php echo $this->_tpl_vars['page']+1; ?>

								 <?php endif; ?>">
								<?php endif; ?>	
								<span class="page-text">pagina urmatoare</span>
								<span class="breadcrumbs">&raquo; &raquo;</span>
								<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['pageTotalCount']): ?>
								</a>
								<?php endif; ?><?php echo '
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
				value: "'; ?>
<?php echo $this->_tpl_vars['price']; ?>
<?php echo '",
				min: minSlideValue,
				max: maxSlideValue,
				slide: function( event, ui ) {
					$( "#grid-slider-active > a" ).html(ui.value);
				},
				change: function( event, ui ) {
					var regex = \'pr=[0-9]*\';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 
					
					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,\'pr=\'+ui.value);
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\\\?";
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
					$( "#rdb-grid > img" ).attr("src","'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/rdb_unchecked.png");
					$( "#hid-rdb-grid" ).val("0");
					$( "#grid-slider-active" ).css("visibility","hidden");
					$( "#grid-slider-inactive" ).css("visibility","visible");
					$("#hid-price-gridtion").val(0);
				} else {
					$( "#rdb-grid > img" ).attr("src","'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/rdb_checked.png");
					$( "#hid-rdb-grid" ).val("1");
					$( "#grid-slider-active" ).css("visibility","visible");
					$( "#grid-slider-inactive" ).css("visibility","hidden");
				}
			 	return false;
			});
			if($( "#hid-rdb-grid" ).val() == 0){
				$( "#rdb-grid > img" ).attr("src","'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/rdb_unchecked.png");
				$( "#rdb-grid > img" ).css("visibility","visible");
				$( "#grid-slider-active" ).css("visibility","hidden");
				$( "#grid-slider-inactive" ).css("visibility","visible");
			} else {
				$( "#rdb-grid > img" ).attr("src","'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/rdb_checked.png");
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
				source: "'; ?>
<?php echo smarty_function_url(array('o' => 'accommodation_plane','m' => 'get_code_destinations'), $this);?>
<?php echo '",
				minLength: 0,
				select: function( event, ui ) {
					if(ui.item){
						var urlParts = $("#hid-ajax-url-prefix").val().split(\'/\');
						var objectParts = urlParts[3].split(\'?\');
						var newUrl = \'http://\'+urlParts[2]+\'/\'+objectParts[0]+\'/\';
						newUrl = newUrl.replace(\'.html\',\'\');
						var newFilteredUrl =\'\';

						var filterParts = ui.item.id.split(\'_\');
						if(filterParts[0].length > 0){
							newFilteredUrl = newUrl + filterParts[0]+\'.html\';
						} else if(filterParts[1].length > 0){
							newFilteredUrl = newUrl + filterParts[1]+\'.html\';
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
			'; ?>

			<?php if ($this->_tpl_vars['regionTitle'] == ''): ?>
				<?php if ($this->_tpl_vars['countryTitle'] != ''): ?>
					<?php echo '$( "#autocomplete-destination" ).val("'; ?>
<?php echo $this->_tpl_vars['countryTitle']; ?>
");
				<?php endif; ?>
			<?php else: ?>
				<?php echo '$( "#autocomplete-destination" ).val("'; ?>
<?php echo $this->_tpl_vars['regionTitle']; ?>
 (<?php echo $this->_tpl_vars['countryTitle']; ?>
)");
			<?php endif; ?>
			<?php echo '

			$( "#btn-autocomplete-destination" ).click(function() {
				if($("#autocomplete-destination").autocomplete("widget").is(\':visible\')){
					$( "#autocomplete-destination" ).autocomplete("close");
				} else {
					$( "#autocomplete-destination" ).autocomplete("search");
				}
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
		})
	</script>
'; ?>
