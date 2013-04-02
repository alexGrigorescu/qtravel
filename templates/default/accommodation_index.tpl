<div style="margin:5px;">
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		<a href="{url o=$type m='index'}">{$tr.layout_type}</a>
		{if $continent} 
			&raquo;  <a href="{url o=$type m='continent' continent=$continent.code}">{$continent.title}</a>
		{/if}
	</div>
	{foreach from=$continents item=continent key=continent_code}
	<div>
		<h3 class="acch3">{$tr.title_types} {$continent.title}</h3>
		<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td style="vertical-align:top; white-space: nowrap;" width="33%">
			{foreach from=$continent.countries item=country name=countries}
				{if not $smarty.foreach.countries.first and $smarty.foreach.countries.iteration mod $continent.percolumn == 1}
				    </td><td style="vertical-align:top; width:33%;" >
				{/if}
				<div style="padding-top:2px;"><a class="country" href="{url o=$type m='country' country=$country.code}"> &raquo; <b>{$country.title}</b> ({$country.count})</a></div>			
			{/foreach}
		</td>
		</tr>
		</table>
	</div>
	{/foreach}
	{if $locations_count > 1}
		<div>
			<h3 class="acch3">{$tr.title_index_types}</h3>
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
							<div style="width:80px;margin:auto;margin-bottom:3px;margin-top:6px;"><img src="{$img_path}star_{$new_location.accommodation_type_stars}.gif"  alt="{$new_location.accommodation_type_title}"/></div>						
							<div class="accthumb"><a href="{url o=$type m='location' region=$new_location.region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.location_thumb}</a></div>
						</div>
						<div style="text-align:right; padding-right:5px;"><span class="price">{$tr.type_price} {$new_location.price} {$new_location.currency_title}</span></div>													
						<div style="margin-left: 115px; height:100px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.location_description|strip_tags|truncate:320}</div>
						<div class="clearer"><span></span></div>
					</div>
				{else}
					<div class="acctitle">
						<div style="float:left; height:16px; width:320px;"><a href="{url o=$type m='location' region=$new_location.end_region_code location=$new_location.code}" title="{$new_location.title}">{$new_location.title|truncate:100}</a></div>
						<div class="clearer"><span></span></div>
					</div>
					<div class="accbody">
						<div style="text-align:right; padding-right:5px;"><span class="price">{$tr.type_price} {$new_location.price2} {$new_location.currency_title}</span></div>													
						<div style="height:75px; padding:0px; border:0px solid #EBEBEB; ">{$new_location.description|strip_tags|truncate:400}</div>
						<div class="clearer"><span></span></div>
					</div>
				{/if}
			</div>
			{/if}
			{/foreach}
		</div>
	{/if}
	{if $continent.description > ''}
		<div>
			<h3 class="acch3">{$tr.type_title_continent_description}  {$continent.title}</h3>
			{$continent.description|escape:"br"}
		</div>
	{/if}
</div>