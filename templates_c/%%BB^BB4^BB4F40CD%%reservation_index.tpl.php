<?php /* Smarty version 2.6.18, created on 2013-02-07 17:29:27
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/reservation_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/reservation_index.tpl', 7, false),array('function', 'tr', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/reservation_index.tpl', 73, false),)), $this); ?>
<?php echo '
<input type="hidden" id="hid-image-count" value="'; ?>
<?php echo $this->_tpl_vars['images_count']; ?>
<?php echo '">
<div id="page">
		<div id="contact-clear"></div>
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
		    	> <a href="<?php echo smarty_function_url(array('o' => $this->_tpl_vars['object'],'m' => 'region','region' => $this->_tpl_vars['location']['region_code']), $this);?>
"><?php echo $this->_tpl_vars['location']['region_title']; ?>
 </a>
		    	> <?php echo $this->_tpl_vars['location']['title']; ?>
 
			<?php echo '</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 1): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/europa/">
								<span class="continent-text">EUROPA</span><?php echo '
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 3): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/africa/">
								<span class="continent-text">AFRICA</span><?php echo '
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 6): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/asia/">
								<span class="continent-text">ASIA</span><?php echo '
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 4 || $this->_tpl_vars['location']['continent_id'] == 5 || $this->_tpl_vars['continentIdsText'] == '8'): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/america/">
								<span class="continent-text">AMERICA</span><?php echo '
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent '; ?>
<?php if ($this->_tpl_vars['location']['continent_id'] == 7): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/australia/">
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
			<div id="detail-reservation-content">'; ?>

				<div id="detail-reservation-form">
				<?php if ($this->_tpl_vars['thanks'] == 1): ?>
					<span class="description-text"><?php echo smarty_function_tr(array('key' => 'reservation_thanks_message'), $this);?>
</span>
					<?php echo '
					<!-- Google Code for Rezervare hotel Conversion Page -->
					<script type="text/javascript">
					/* <![CDATA[ */
					var google_conversion_id = 1037578189;
					var google_conversion_language = "ro";
					var google_conversion_format = "2";
					var google_conversion_color = "ffffff";
					var google_conversion_label = "qU56CInxkAIQzd_g7gM";
					var google_conversion_value = 0;
					/* ]]> */
					</script>
					<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
					</script>
					<noscript>
					<div style="display:inline;">
					<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1037578189/?value=0&amp;label=qU56CInxkAIQzd_g7gM&amp;guid=ON&amp;script=0"/>
					</div>
					</noscript>
					'; ?>

				<?php else: ?>
					<span class="description-text-red"><?php echo $this->_tpl_vars['err']; ?>
</span>
					<?php echo $this->_tpl_vars['form']; ?>

				<?php endif; ?>
				</div>
			<?php echo '</div>
			</div>
		</div>
	</div>
	<script>
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
