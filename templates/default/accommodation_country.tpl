<div>
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo;
		{if $layout_domain.domain == 'oferta-vacanta.ro'}	
			<a href="{url o=$type m='index'}">{$tr.layout_type}</a> &raquo; 
			<a href="{url o=$type m='continent' continent=$country.continent_code}">{$country.continent_title}</a> &raquo;  
		{/if}
		<a href="{url o=$type m='country' country=$country.code}">{$country.title}</a>
	</div>
	{if $regions_count > 0}
	<h3 class="acch3">{$tr.title_types} {$country.title}, {$country.continent_title}</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		{foreach from=$regions item=region name=regions}
			{if not $smarty.foreach.regions.first and $smarty.foreach.regions.iteration mod $percolumn == 1}
			    </td><td style="vertical-align:top; width:33%;" >
			{/if}
			<div style="padding-top:2px;"><a class="country" href="{url o=$type m='region' region=$region.code country=$region.country_code}"> &raquo; <b>{$region.title}</b> ({$region.count})</a></div>
		{/foreach}
	</td>
	</tr>
	</table>
	{/if}
	{if $regions1_count > 0 && false}
	<h3 class="acch3">{$tr.title_types1} {$country.title}, {$country.continent_title}</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		{foreach from=$regions1 item=region name=regions1}
			{if not $smarty.foreach.regions1.first and $smarty.foreach.regions1.iteration mod $percolumn1 == 1}
			    </td><td style="vertical-align:top; width:33%;" >
			{/if}
			<div style="padding-top:2px;"><a class="country" href="{url o=$type1 m='region' region=$region.code country=$region.country_code}"> &raquo; <b>{$region.title}</b> ({$region.count})</a></div>
		{/foreach}
	</td>
	</tr>
	</table>
	{/if}
	{if $regions2_count > 0  && false}
	<h3 class="acch3">{$tr.title_types2} {$country.title}, {$country.continent_title}</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		{foreach from=$regions2 item=region name=regions2}
			{if not $smarty.foreach.regions2.first and $smarty.foreach.regions2.iteration mod $percolumn2 == 1}
			    </td><td style="vertical-align:top; width:33%;" >
			{/if}
			<div style="padding-top:2px;"><a class="country" href="{url o=$type2 m='region' region=$region.code country=$region.country_code}"> &raquo; <b>{$region.title}</b> ({$region.count})</a></div>
		{/foreach}
	</td>
	</tr>
	</table>
	{/if}
	{if $locations_count > 1}
		<div>	
			<div>
				<h3 class="acch3">{$tr.title_country_types}  {$country.title}, {$country.continent_title}</h3>
				{foreach from=$locations item=new_location}
				{if $new_location.code != $location.code}
					<div class="acc">
					{if $width_thumb}
						<div class="acctitle">
							<div style="float:left; height:16px;"><a href="{url o=$type m='location' region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title}</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbody">
							<div style="float:left;width:110px;">
								<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="{$img_path}star_{$new_location.accommodation_type_stars}.gif" alt="{$new_location.accommodation_type_title}"/></div>						
								<div class="accthumb"><a href="{url o=$type m='location' region=$new_location.region_code location=$new_location.code country=$new_location.country_code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
							</div>
							<div style="text-align:right; padding-right:5px;"><span class="price">{$tr.type_price} {$new_location.price} {$new_location.currency_title}</span></div>													
							<div style="margin-left: 112px; height:100px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.location_description|strip_tags|truncate:320}</div>
							<div class="clearer"><span></span></div>
						</div>
					{else}
						<div class="acctitle">
							<div style="float:left; height:16px; width:320px;"><a href="{url o=$type m='location' region=$new_location.end_region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title}</a></div>
							<div class="clearer"><span></span></div>
						</div>
						<div class="accbody">
							<div style="text-align:right; padding-right:5px;"><span class="price">{$tr.type_price} {$new_location.price2} {$new_location.currency_title}</span></div>													
							<div style="height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:300}</div>
							<div class="clearer"><span></span></div>
						</div>
					{/if}
					</div>
				{/if}
				{/foreach}
			</div>
			<div class="clearer"><span></span></div>
		</div>
	{/if}
	{if $country.description > ''}
		<div>
			<h3 class="acch3">{$tr.title_country_description} {$country.title}, {$country.continent_title}</h3>
			{$country.description|escape:"br"}
		</div>
	{/if}
</div>