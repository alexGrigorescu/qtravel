<div style="margin:5px;">
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		<a href="{url o='accommodation' m='index'}">{tr key="layout_accommodation"  class='layout'}</a> &raquo; 
		<a href="{url o='accommodation' m='continent' continent=$continent.code}">{$continent.title}</a>
	</div>
	{foreach from=$continents item=new_continent key=continent_code}
	<div>
		<h3 class="acch3">{tr key="accommodation_title_accommodations"} {$new_continent.title}</h3>
		<table style="width:100%" border="0">
		<tr>
		<td style="vertical-align:top; width:33%;">
			{foreach from=$new_continent.countries item=country name=countries}
				{if not $smarty.foreach.countries.first and $smarty.foreach.countries.iteration mod $new_continent.percolumn == 1}
				    </td><td style="vertical-align:top; width:33%;" >
				{/if}
				<div style="padding-top:2px;"> <a class="country" href="{url o='accommodation' m='country' country=$country.code}"> &raquo; <b>{$country.title}</b> ({$country.count})</a></div>			
			{/foreach}
		</td>
		</tr>
		</table>
	</div>
	{/foreach}

	{if $locations_count > 1}
		<div>	
			<div>
				<h3 class="acch3">{tr key="accommodation_title_country_accommodations"}  {$country.title}, {$country.continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
				<div class="acc">
					<div class="acctitle">
						<div style="float:left; height:16px; width:240px;"><a href="{url o='accommodation' m='location' country=$new_location.country_code region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title}</a></div>
						<div style="float:right;width:80px;"><img src="{$img_path}star_{$new_location.accommodation_type_stars}.gif"/></div>					
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbody">
						<div style="float:left;width:110px;">
							<div class="accthumb"><a href="{url o='accommodation' m='location' country=$new_location.country_code region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price">{tr key="accommodation_price"} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="margin-left: 115px; height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.location_description|strip_tags|truncate:240}</div>
						<div class="clearer"><span></span></div>
					</div>
				</div>
				{/if}
				{/foreach}
			</div>
			<div class="clearer"><span></span></div>
		</div>
	{/if}
	{if $continent.description > ''}
		<div>
			<h3 class="acch3">{tr key="accommodation_title_continent_description"}  {$continent.title}</h3>
			{$continent.description}
		</div>
	{/if}
</div>