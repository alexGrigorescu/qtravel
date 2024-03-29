{literal}
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>{/literal}<a href="{url o='main' m='index'}">Contact </a>{literal}</span>
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent {/literal}{if $continentIdsText eq 1}selected-continent{/if}">
							<a href="{$url}vacanta-avion/europa/">
								<span class="continent-text">EUROPA</span>{literal}
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent {/literal}{if $continentIdsText eq 3}selected-continent{/if}">
							<a href="{$url}vacanta-avion/africa/">
								<span class="continent-text">AFRICA</span>{literal}
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent {/literal}{if $continentIdsText eq 6}selected-continent{/if}">
							<a href="{$url}vacanta-avion/asia/">
								<span class="continent-text">ASIA</span>{literal}
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent {/literal}{if $continentIdsText eq '4_5' || $continentIdsText eq '4,5' || $continentIdsText eq '8'}selected-continent{/if}">
							<a href="{$url}vacanta-avion/america/">
								<span class="continent-text">AMERICA</span>{literal}
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent {/literal}{if $continentIdsText eq 7}selected-continent{/if}">
							<a href="{$url}vacanta-avion/australia/">
								<span class="continent-text">AUSTRALIA</span>{literal}
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
				<form action={/literal}{url o='contact' m='save_newsletter_info'}{literal} name="form_newsletter" id="form_newsletter">
					<div id="top">
						<div id="top-left">
							<span class="input-label-newsletter">Nume:</span>
						</div>
						<div id="top-center">
							<div id="input-text-container" class="input-text-container-border">
								<input type="text" class="txt-search" id="txt-newsl-name" name="txt-newsl-name" />
							</div>
							<img src="{/literal}{$img_path}{literal}/contact_input_text_bg.png" class="input-text-bg">
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
							<img src="{/literal}{$img_path}{literal}/contact_input_text_bg.png" class="input-text-bg">
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
							<img src="{/literal}{$img_path}{literal}/contact_input_text_bg.png" class="input-text-bg">
						</div>
						<div id="bottom-right">
							<a href="#" id="btn-newsletter-submit"><img src="{/literal}{$img_path}{literal}/contact_newsletter.png" class="btn-newsletter"></a>
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
				value: "{/literal}{$price}{literal}",
				min: minSlideValue,
				max: maxSlideValue,
				slide: function( event, ui ) {
					$( "#grid-slider-active > a" ).html(ui.value);
				},
				change: function( event, ui ) {
					var regex = 'pr=[0-9]*';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 
					
					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'pr='+ui.value);
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\?";
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
					$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
					$( "#hid-rdb-grid" ).val("0");
					$( "#grid-slider-active" ).css("visibility","hidden");
					$( "#grid-slider-inactive" ).css("visibility","visible");
					$("#hid-price-gridtion").val(0);
				} else {
					$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
					$( "#hid-rdb-grid" ).val("1");
					$( "#grid-slider-active" ).css("visibility","visible");
					$( "#grid-slider-inactive" ).css("visibility","hidden");
				}
			 	return false;
			});
			if($( "#hid-rdb-grid" ).val() == 0){
				$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_unchecked.png");
				$( "#rdb-grid > img" ).css("visibility","visible");
				$( "#grid-slider-active" ).css("visibility","hidden");
				$( "#grid-slider-inactive" ).css("visibility","visible");
			} else {
				$( "#rdb-grid > img" ).attr("src","{/literal}{$img_path}{literal}/rdb_checked.png");
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
				source: "{/literal}{url o='accommodation_plane' m='get_destinations'}{literal}",
				minLength: 2,
				select: function( event, ui ) {
					if(ui.item){
						var regex = 'dt=[0-9_]*';
						var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

						if(replacedValue){
							var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'dt='+ui.item.id);
							$("#hid-ajax-url-prefix").val(newUrl);
						} else {
							var regexIsSetGet = "\\?";
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
				if($(this).val() == ''){
					var regex = 'dt=[0-9_]*';
					var replacedValue = $("#hid-ajax-url-prefix").val().match(regex); 

					if(replacedValue){
						var newUrl = $("#hid-ajax-url-prefix").val().replace(replacedValue,'dt=');
						$("#hid-ajax-url-prefix").val(newUrl);
					} else {
						var regexIsSetGet = "\\?";
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
			{/literal}
			{if $regionTitle eq ''}
				{if $countryTitle neq ''}
					{literal}$( "#autocomplete-destination" ).val("{/literal}{$countryTitle}");
				{/if}
			{else}
				{literal}$( "#autocomplete-destination" ).val("{/literal}{$regionTitle} ({$countryTitle})");
			{/if}
			{literal}

			$( "#btn-autocomplete-destination" ).click(function() {
				if($("#autocomplete-destination").autocomplete("widget").is(':visible')){
					$( "#autocomplete-destination" ).autocomplete("close");
				} else {
					$( "#autocomplete-destination" ).autocomplete("search");
				}
			});

			$( "#btn-newsletter-submit" ).click(function() {
				$.ajax({
		          url: "{/literal}{url o='contact' m='save_newsletter_info'}{literal}",
		          dataType: "json",
		          data: $('#form_newsletter').serialize(),
		          success: function(data) {
		        	  alert(data.message);
			          if(!data.is_error){
				          location.href="{/literal}{url o='contact' m='index'}{literal}";
			          } 
		          }
		        });
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
