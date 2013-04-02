{literal}
<input type="hidden" id="hid-image-count" value="{/literal}{$images_count}{literal}">
<div id="page">
		<div id="contact-clear"></div>
		<div class="div-breadcrumbs">
			<span>{/literal}
			<a href="{url o='main' m='index'}">
				{if $object eq 'flight' || $object eq 'buss'}
					Bilete 
				{else}
					Vacante
				{/if}
			</a>
			
			{if $object eq 'accommodation_plane'}
				> <a href="{url o=$object m='index'}">Avion </a>
			{elseif $object eq 'accommodation_bus'}
				> <a href="{url o=$object m='index'}">Autocar </a>
			{elseif $object eq 'accommodation_individual'}
				> <a href="{url o=$object m='index'}">Individual </a>
			{elseif $object eq 'flight'}
				> <a href="{url o=$object m='index'}">Avion </a>
			{elseif $object eq 'buss'}
				> <a href="{url o=$object m='index'}">Autocar </a>
		    {/if}
		    	> <a href="{url o=$object m=region region=$location.region_code}">{$location.region_title} </a>
		    	> {$location.title} 
			{literal}</span>	
		</div>
		<div id="page-body" style="float:left;width:100%;position:relative;right:0;background:#22246a;">
			<div id="body-advertising" style="float:left;width:300px;position:relative;left:0;">
				<div id="continents-buttons">
					<ul class="continent">
						<li id="europe" class="continent {/literal}{if $location.continent_id eq 1}selected-continent{/if}">
							<a href="{$url}vacanta-avion/europa/">
								<span class="continent-text">EUROPA</span>{literal}
							</a>
							<div id="country-list-europe" class="country-list"></div>
						</li>
						<li id="africa" class="continent {/literal}{if $location.continent_id eq 3}selected-continent{/if}">
							<a href="{$url}vacanta-avion/africa/">
								<span class="continent-text">AFRICA</span>{literal}
							</a>
							<div id="country-list-africa" class="country-list"></div>
						</li>
						<li id="asia" class="continent {/literal}{if $location.continent_id eq 6}selected-continent{/if}">
							<a href="{$url}vacanta-avion/asia/">
								<span class="continent-text">ASIA</span>{literal}
							</a>
							<div id="country-list-asia" class="country-list"></div>
						</li>
						<li id="america" class="continent {/literal}{if $location.continent_id eq 4 || $location.continent_id eq 5 || $continentIdsText eq '8'}selected-continent{/if}">
							<a href="{$url}vacanta-avion/america/">
								<span class="continent-text">AMERICA</span>{literal}
							</a>
							<div id="country-list-america" class="country-list"></div>
						</li>
						<li id="australia" class="continent {/literal}{if $location.continent_id eq 7}selected-continent{/if}">
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
			<div id="detail-reservation-content">{/literal}
				<div id="detail-reservation-form">
				{if $thanks eq 1}
					<span class="description-text">{tr key='reservation_thanks_message'}</span>
					{literal}
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
					{/literal}
				{else}
					<span class="description-text-red">{$err}</span>
					{$form}
				{/if}
				</div>
			{literal}</div>
			</div>
		</div>
	</div>
	<script>
	$(function() {
		getCountries('1','europe',{/literal}'{$object}','{$method}'{literal});
		getCountries('3','africa',{/literal}'{$object}','{$method}'{literal});
		getCountries('6','asia',{/literal}'{$object}','{$method}'{literal});
		getCountries('4,5','america',{/literal}'{$object}','{$method}'{literal});
		getCountries('7','australia',{/literal}'{$object}','{$method}'{literal});		
	});
	</script>
{/literal}
