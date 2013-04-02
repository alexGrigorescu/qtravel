<div>
	<div class="accnav">
		<a href="{url o='main' m='index'}">Home</a> &raquo; 
		{if $layout_domain.domain == 'oferta-vacanta.ro'}	
		<a href="{url o=$type m='index'}">{$tr.layout_type}</a>&nbsp;&raquo;&nbsp;
		<a href="{url o=$type m='continent' continent=$region.continent_code}">{$region.continent_title}</a>&nbsp;&raquo;&nbsp;
		{/if}
		<a href="{url o=$type m='country' country=$region.country_code}">{$region.country_title}</a>&nbsp;&raquo;&nbsp;
		<a href="{url o=$type m='region' region=$region.code country=$region.country_code}">{$region.title}</a>
	</div>
	<h3 class="acch3">{$tr.title_types} {$region.title}, {$region.country_title}, {$region.continent_title}</h3>
	<div>
		<p><ul>
		{if $subtype == ''}
			<li><a style="font-weight:bold; color:#ff0000; " href="{url o=$type m='region' region=$location.region_code country=$location.country_code}">Toate ofertele</a></li>
		{else}
			<li><a style="font-weight:bold; " href="{url o=$type m='region' region=$location.region_code country=$location.country_code}">Toate ofertele</a></li>
		{/if}
		{foreach from=$subtypes item=subtype_item name=subtypes}
			{if $subtype == $subtype_item.code}
				<li><a style="font-weight:bold; color:#ff0000; " href="{if $subtype_item.count > 0}{url o=$type m='region' region=$location.region_code country=$location.country_code subtype=$subtype_item.code}{else}#{/if}">{$subtype_item.title} ({$subtype_item.count})</a></li>
			{else}
				{if $subtype_item.count > 0}
					<li><a style="font-weight:bold; " href="{if $subtype_item.count > 0}{url o=$type m='region' region=$location.region_code country=$location.country_code subtype=$subtype_item.code}{else}#{/if}">{$subtype_item.title} ({$subtype_item.count})</a></li>
				{/if}
			{/if}			
		{/foreach}
		</ul></p>
	</div>
	<div>
		{foreach from=$locations item=location}
			<div class="acc">
			{if $width_thumb}
				<div class="acctitle">
					<div style="float:left; height:16px; border:0px;"><a href="{url o=$type m='location' location=$location.code country=$location.country_code}" title="{$location.title}">{$location.title}</a></div>					
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbody">
					<div style="float:left;width:110px; text-align:center; padding-top:5px;">
						<div class="accthumb"><a href="{url o=$type m='location' location=$location.code country=$location.country_code}" title="{$location.title}">{$location.location_thumb}</a></div>
					</div>
					<div style="text-align:right; padding:5px;">
						<div style="width:80px; float:left;"><img src="{$img_path}star_{$location.accommodation_type_stars}.gif" alt="{$location.accommodation_type_title}"/></div>
						<span class="price">{$tr.type_price} {$location.price} {$location.currency_title}</span>
					</div>										
					<div style="margin-left: 105px; height:100px; padding:0px; border:0px solid #EBEBEB; ">{$location.location_description|strip_tags|truncate:320}</div>
					<div class="clearer"><span></span></div>
				</div>
			{else}
				<div class="acctitle">
					<div style="float:left; height:16px;"><a href="{url o=$type m='location' location=$location.code country=$location.country_code}" title="{$location.title}">{$location.title|truncate:100}</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodyreg">
					<div style="text-align:right; padding-right:5px;"><span class="price">{$tr.type_price} {$location.price2} {$location.currency_title}</span></div>													
					<div style="height:100px; padding:0px; padding-left:10px; border:0px solid #EBEBEB; ">{$location.description|strip_tags|truncate:400}</div>
					<div class="clearer"><span></span></div>
				</div>
			{/if}
			</div>
		{/foreach}
		<div class="clearer"><span></span></div>
	</div>
	{if $region.description > ''}
		<div>
			<h3 class="acch3">{$tr.title_region_description}  {$region.title}, {$region.country_title}, {$region.continent_title}</h3>
			{$region.description|escape:"br"}
		</div>
	{/if}
	{if $region > '' && $layout_domain.mapkey > ''}
	<div id="map">
		<h3 class="acch3">{tr key='title_map'}  {$region.title}, {$region.country_title}, {$region.continent_title}</h3>
		<div id="map_canvas" style="width: 500px; height: 400px"></div>
	</div>
	{/if}
</div>