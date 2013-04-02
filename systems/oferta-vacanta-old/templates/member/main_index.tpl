<div class="ofertespeciale"></div>
<div style="margin:5px;">
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
	{if $regions1_count > 0}
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
	{if $regions2_count > 0}
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
	
	{if $regions3_count > 0}
	<h3 class="acch3">{$tr.title_types3} {$country.title}, {$country.continent_title}</h3>
	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td style="vertical-align:top; width:33%;">
		{foreach from=$regions3 item=region name=regions3}
			{if not $smarty.foreach.regions2.first and $smarty.foreach.regions3.iteration mod $percolumn3 == 1}
			    </td><td style="vertical-align:top; width:33%;" >
			{/if}
			<div style="padding-top:2px;"><a class="country" href="{url o=$type3 m='region' region=$region.code country=$region.country_code}"> &raquo; <b>{$region.title}</b> ({$region.count})</a></div>
		{/foreach}
	</td>
	</tr>
	</table>
	{/if}
	
	{if $specials_count > 0}		
		<div>
			{foreach from=$specials item=special}
			<div class="acc">
				<div class="acctitle">
					<div style="float:left; height:16px; overflow:hidden;"><a href="{$special.info.url}">{$special.info.title|escape:amp}</a></div>
					<div class="clearer"><span></span></div>
				</div>
				<div class="accbodymain">
					<div>
						<div class="accthumb"><a href="{$special.info.url}">{$special.info.thumb}</a></div>						
					</div>
					<div>
					{foreach from=$special.offers item=offer}
						<div style="float:left; height:16px; width:100%; overflow:hidden; padding-left:5px; padding-top:5px;">
							<a href="{$offer.url}">{$offer.title|escape:amp}</a>
						</div>
						<div style="float:left; height:28px; width:100%; overflow:hidden; padding-left:7px;">
						{if $offer.description > ''}
							{$offer.description|strip_tags|truncate:180}
						{else}
							{$offer.description2|strip_tags|truncate:180}
						{/if}
						</div>					
					{/foreach}
					</div>
					<div class="clearer"><span></span></div>
				</div>
			</div>
			{/foreach}
		</div>
		<div class="clearer"><span></span></div>
	{/if}
	{if $domain.description > ''}
		<div>
			<h3 class="acch3">{$domain.title}</h3>
			{$domain.description}
		</div>
	{/if}
	{if $geolocation.description > ''}
		<div>
			<h3 class="acch3">{tr key='title_geolocation_description'} {$geolocation.title}</h3>
			{$geolocation.description}
		</div>
	{/if}
	{if $news_count > 0}
		<div>
			<h3 class="acch3">{tr key='layout_news' class="layout"}</h3></div>
			<div class="news-list">
			{foreach from=$news item=news_item}
				<div class="subpage">
					<div class="header"><h2 title="{$news_item.title}"><a href="{url o='news' m='details' code=$news_item.code}" title="{$news_item.title}">{$news_item.title}</a></h2></div>
					<div class="leadtext">{$news_item.description}</div>				
					<div class="permalink">
						<span class="feed_title">Sursa: <a href="{$news_item.permalink}" title="{$news_item.title}" rel="nofollow"> {$news_item.feed_title}</span></a>
						|
						<span class="date">Publicat: {$news_item.date_format}</span>			
					</div>
				</div>
			{/foreach}
			</div>
		</div>
	{/if}
</div>