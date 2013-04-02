<?php /* Smarty version 2.6.18, created on 2013-02-07 22:43:20
         compiled from /home/qtravel/public_html/systems/oferta-vacanta/templates/member/contact_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', '/home/qtravel/public_html/systems/oferta-vacanta/templates/member/contact_index.tpl', 5, false),)), $this); ?>
<?php echo '
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>'; ?>
<a href="<?php echo smarty_function_url(array('o' => 'main','m' => 'index'), $this);?>
">Contact </a><?php echo '</span>
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 1): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/europa/">
								<span class="continent-text">EUROPA</span><?php echo '
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 3): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/africa/">
								<span class="continent-text">AFRICA</span><?php echo '
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 6): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/asia/">
								<span class="continent-text">ASIA</span><?php echo '
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == '4_5' || $this->_tpl_vars['continentIdsText'] == '4,5' || $this->_tpl_vars['continentIdsText'] == '8'): ?>selected-continent<?php endif; ?>">
							<a href="<?php echo $this->_tpl_vars['url']; ?>
vacanta-avion/america/">
								<span class="continent-text">AMERICA</span><?php echo '
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent '; ?>
<?php if ($this->_tpl_vars['continentIdsText'] == 7): ?>selected-continent<?php endif; ?>">
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
				<div id="contact-header-text-container">
					<br /><br /><div id="contact-header-text"></div>
				</div>
				<div id="contact-newsletter">
				<form action='; ?>
<?php echo smarty_function_url(array('o' => 'contact','m' => 'save_newsletter_info'), $this);?>
<?php echo ' name="form_newsletter" id="form_newsletter">
					<div id="top">
						<div id="top-left">
							<span class="input-label-newsletter">Nume:</span>
						</div>
						<div id="top-center">
							<div id="input-text-container" class="input-text-container-border">
								<input type="text" class="txt-search" id="txt-newsl-name" name="txt-newsl-name" />
							</div>
							<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/contact_input_text_bg.png" class="input-text-bg">
						</div>
						<div id="top-right"></div>
					</div>
					<div id="middle">
						<div id="middle-left">
							<span class="input-label-newsletter">Email:</span>
						</div>
						<div id="middle-center">
							<div id="input-text-container" class="input-text-container-border">
								<input type="text" class="txt-search" id="txt-newsl-email" name="txt-newsl-email" />
							</div>
							<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/contact_input_text_bg.png" class="input-text-bg">
						</div>
						<div id="middle-right"></div>
					</div>
					<div id="bottom">
						<div id="bottom-left">
							<span class="input-label-newsletter">Telefon:</span>
						</div>
						<div id="bottom-center">
							<div id="input-text-container" class="input-text-container-border">
								<input type="text" class="txt-search" id="txt-newsl-phone" name="txt-newsl-phone" />
							</div>
							<img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/contact_input_text_bg.png" class="input-text-bg">
						</div>
						<div id="bottom-right">
							<a href="#" id="btn-newsletter-submit"><img src="'; ?>
<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo '/contact_newsletter.png" class="btn-newsletter"></a>
						</div>
					</div>
				</form>
				</div>
				<div id="contact-middle-text-container">
					<br /><br /><div id="contact-middle-text"></div>
				</div>
				<div id="contact-map">
					<div id="left" itemscope itemtype="http://schema.org/Place">
						<div class="top">
							<span class="title">Email:</span>
							<a href="mailto:office@q-travel.ro"><span class="text">office@q-travel.ro</span></a>
						</div>
						<div class="middle">
							<span class="title">Telefon:</span>
							<span class="text" itemprop="telephone">021 310 00 15</span>
							<span class="text" itemprop="telephone">021 310 31 51</span>
							<span class="text" itemprop="telephone">031 100 59 30</span>	
							<span class="title">Fax:</span>
							<span class="text">031 100 59 29</span>
						</div>
						<div class="bottom" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span class="title">Adresa:</span>
							<span class="text" itemprop="streetAddress">Str Caderea Bastiliei nr. 66</span>
							<span class="text" itemprop="addressRegion">Sector 1 </span>
							<span class="text" itemprop="addressLocality">Bucuresti</span>
						</div>
					</div>
					<div id="right">
						<div id="map"></div>
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
<?php echo smarty_function_url(array('o' => 'accommodation_plane','m' => 'get_destinations'), $this);?>
<?php echo '",
				minLength: 2,
				select: function( event, ui ) {
					if(ui.item){
						var regex = \'dt=[0-9_]*\';
						var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

						if(replacedValue){
							var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,\'dt=\'+ui.item.id);
							$("#hid-ajax-url-prefix").val(newUrl);
						} else {
							var regexIsSetGet = "\\\\?";
						    var replacedValueIsSetGet = $("#hid-ajax-url-prefix").val().match(regexIsSetGet); 

						    if(replacedValueIsSetGet){
						    	var newUrl = $("#hid-ajax-url-prefix").val()+"&dt="+ui.item.id;
						    	$("#hid-ajax-url-prefix").val(newUrl);
						    } else {
						    	var newUrl = $("#hid-ajax-url-prefix").val()+"?dt="+ui.item.id;
						    	$("#hid-ajax-url-prefix").val(newUrl);
						    }
						}

						location.href = $("#hid-ajax-url-prefix").val();
						$( "#grid-slider-active > a" ).html(ui.value);
					}
				}
			});
			$( "#autocomplete-destination" ).change(function() {
				if($(this).val() == \'\'){
					var regex = \'dt=[0-9_]*\';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,\'dt=\');
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\\\?";
					    var replacedValueIsSetGet = $("#hid-ajax-url-prefix").val().match(regexIsSetGet); 

					    if(replacedValueIsSetGet){
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"&dt=";
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    } else {
					    	var newUrl = $("#hid-ajax-url-prefix").val()+"?dt=";
					    	$("#hid-ajax-url-prefix").val(newUrl);
					    }
					}

					location.href = $("#hid-ajax-url-prefix").val();
					$( "#grid-slider-active > a" ).html(ui.value);	
				}
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

			$( "#btn-newsletter-submit" ).click(function() {
				$.ajax({
		          url: "'; ?>
<?php echo smarty_function_url(array('o' => 'contact','m' => 'save_newsletter_info'), $this);?>
<?php echo '",
		          dataType: "json",
		          data: $(\'#form_newsletter\').serialize(),
		          success: function(data) {
		        	  alert(data.message);
			          if(!data.is_error){
				          location.href="'; ?>
<?php echo smarty_function_url(array('o' => 'contact','m' => 'index'), $this);?>
<?php echo '";
			          } 
		          }
		        });
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
